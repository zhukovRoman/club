<?php

class AlumniController extends Controller {
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    //public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'SingUp', 'Passrecovery'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('list', 'EditProfile', 'ChangeFaculty', 'changePass', 'uploadAvatar', 'upload', "History",'profile'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionUploadAvatar() {
        $this->render('uploadAvatar');
    }

    public function actionUpload() {

        Yii::import("ext.EAjaxUpload.qqFileUploader");
        $folder = 'users/' . Yii::app()->user->getId() . "/"; // folder for uploaded files
        if (!is_dir($folder)) {
            mkdir($folder, 0745);
        }
        //$folder="users/";
        $allowedExtensions = array("jpg", 'jpeg'); //array("jpg","jpeg","gif","exe","mov" and etc...
        $sizeLimit = 10 * 1024 * 1024; // maximum file size in bytes
        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
        $result = $uploader->handleUploadAvatar($folder);
        $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);

        $fileSize = filesize($result['filename']); //GETTING FILE SIZE
        $fileName = $result['filename']; //GETTING FILE NAME

        echo $return; // it's array
    }

    public function actionchangePass() {
        $model = Alumni::model()->findByPk(Yii::app()->user->getId());

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Alumni'])) {

            if ($model->validatePassword($_POST['Alumni']['oldpass'])) {
                $model->newpass = $_POST['Alumni']['newpass'];
                if ($model->validate()) {

                    $model->pass = md5($_POST['Alumni']['newpass']);
                    if ($model->save(false)) {
                        Yii::app()->user->setFlash('success', 'Ваш профиль успешно обновлен!');
                        $this->redirect(array('view', 'id' => $model->ID));
                    }
                }
            } else {
                $model->addError('oldpass', 'Неверный текущий пароль');
            }
        }

        $this->render('changePass', array(
            'model' => $model,
        ));
    }

    public function actionChangeFaculty() {


        $selectedFac = $_POST['Alumni']['facultyId'];
        $data = Department::getDepartmentsOfFacultyForForm($selectedFac);

        foreach ($data as $value => $subcategory) {
            echo CHtml::tag
                    ('option', array('value' => $value), CHtml::encode($subcategory), true);
        }
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionProfile()
    {
            $this->render('view_own', array(
                'model' => $this->loadModel(Yii::app()->user->getId()),
            ));
    }
    public function actionView($id) {

        if (Yii::app()->user->getId() != $id)
            $this->render('view', array(
                'model' => $this->loadModel($id),
            ));
        else
            $this->render('view_own', array(
                'model' => $this->loadModel($id),
            ));
    }

    public function actionPassrecovery() {
        $model = new Alumni(Alumni::SCENARIO_PASSRECOVERY);

        if (isset($_POST['Alumni'])) {
            // print_r($_POST[])
            $model->attributes = $_POST['Alumni'];

            if ($model->validate()) {

                $query = new Alumni(Alumni::SCENARIO_PASSRECOVERY);
                $query = Alumni::model()->find('mail=?', array($model->mail));

                if ($query != NULL) {
                    $pass = substr(md5($query->mail . time()), 26);
                    $query->pass = md5($pass);
                    $query->save();

                    $this->sendNewPass($query, $pass);

                    $this->render('send_newpasskey');
                    return;
                    //Yii::app()->user->setFlash('success', "На указанный email было отправленно письмо для подтверждения регистрации!");
                } else {
                    throw new CHttpException(403, 'Пользователь с таким адресом электронной почты не найден.');
                }
            }
        }
        $this->render('passrecovery', array('model' => $model));
    }

    public function actionSingUp() {
        $model = new Alumni(Alumni::SCENARIO_SIGNUP);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Alumni'])) {
            $model->attributes = $_POST['Alumni'];
            $model->diplomId="aaaaaa";
            if ($model->validate()) {
                //запись прошла валидацию.
                $model->pass = md5($model->pass);
//                $model->status=  Alumni::NEW_STATUS;
                $model->status=  Alumni::ACTIVATE_STATUS;
                $model->registerDate = date("Y-m-d H:i:s");
                $model->save(false);

                $this->sendMailToAdmin($model);
                $this->sendMailToUser($model);

                $this->render('singup_OK');
                return;
            }
        }

        $this->render('singup_form', array(
            'model' => $model,
        ));
    }

    private function sendNewPass($model, $pass) {
        $to = $model->mail;

        // Тема 
        $subject = 'Смена пароля на BAA';

        // Ссылки
        $main = Yii::app()->createAbsoluteUrl('site/index');            // на главную страницу
        $message = "
			<html>
				<head><title>Регистрация</title></head>
				<body>
					Вы успешно сменили пароль на портале <a href='$main' target='_blank'>" . Yii::app()->name . "</a>
					<br>
                                        Ваш новый пароль: $pass<br><br>
					<i>С уважением, администрация <a href='$main' target='_blank'>" . Yii::app()->name . "</a></i>
				</body>
			</html>
		";

        // To send HTML mail, the Content-type header must be set
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

        // Additional headers
        $headers .= 'From: ' . Yii::app()->name . ' <zhrovl@gmail.com>' . "\r\n";

        // Отправляем письмо 
        mail($to, $subject, $message, $headers);

        return;
    }

    private function sendMailToAdmin($model) {
        // Получатель
        $to = 'zhrovl@gmail.com';

        // Тема 
        $subject = 'Новый аккаунт на сайте';

        // Ссылки
        // на главную страницу
        $message = "
			<html>
				<head><title>Регистрация</title></head>
				<body>
					Новый пользователь:
                                        мыло:$model->mail <br>
                                        диплом: $model->diplomId;
				</body>
			</html>
		";

        // To send HTML mail, the Content-type header must be set
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

        // Additional headers
        $headers .= 'From: ' . Yii::app()->name . ' <zhrovl@gmail.com>' . "\r\n";

        // Отправляем письмо 
        mail($to, $subject, $message, $headers);

        return;
    }

    private function sendMailToUser($model) {
        // Получатель
        $to = $model->mail;

        // Тема 
        $subject = 'Регистрация аккаунта на BAA';

        // Ссылки
        $main = Yii::app()->createAbsoluteUrl('site/index');            // на главную страницу
        $message = "
			<html>
				<head><title>Регистрация</title></head>
				<body>
					Вы успешно зарегистрировались на портале <a href='$main' target='_blank'>" . Yii::app()->name . "</a>
					<br><br>
					<i>С уважением, администрация <a href='$main' target='_blank'>" . Yii::app()->name . "</a></i>
				</body>
			</html>
		";

        // To send HTML mail, the Content-type header must be set
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

        // Additional headers
        $headers .= 'From: ' . Yii::app()->name . ' <zhrovl@gmail.com>' . "\r\n";

        // Отправляем письмо 
        mail($to, $subject, $message, $headers);

        return;
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Alumni');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionfirstLogin()
    {
        $model = Alumni::model()->findByPk(Yii::app()->user->getId());
        $model->setScenario("first_login");
        
    }


    public function actionList($faculty = 0, $letter = '') {

        // if (!isset($faculty)) {
        $criteria = new CDbCriteria;
        $status = Alumni::ACTIVATE_STATUS;
        $criteria->order = 'surname, name, forename   DESC';
        $criteria->addCondition("status=$status");
        //$criteria->addCondition("time_add > now() - interval $d day");
        if ($faculty != 0) {
            $criteria->addCondition('facultyId=:faculty');

            if ($letter != '') {
                $criteria->addCondition('surname like :letter');
                $criteria->params = array(':faculty' => $faculty,
                    ':letter' => "$letter%");
            } else {
                $criteria->params = array(':faculty' => $faculty,);
            }
        }
        if ($letter != '' && $faculty == 0) {
            $criteria->addCondition('surname like :letter');
            $criteria->params = array(':letter' => "$letter%");
        }
        $dataProvider = new CActiveDataProvider('Alumni', array(
                    'criteria' => $criteria,
                    'pagination' => array(
                        'pageSize' => 30,
                    ),
                ));
        $this->render('index', array(
            'dataProvider' => $dataProvider,
            'letter' => $letter,
            'faculty' => $faculty,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Alumni('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Alumni']))
            $model->attributes = $_GET['Alumni'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Alumni::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function actionEditProfile() {
        $model = Alumni::model()->findByPk(Yii::app()->user->getId());
        $model->setScenario(Alumni::SCENARIO_UPDATE);
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Alumni'])) {
            $model->attributes = $_POST['Alumni'];
            if ($model->save()) {
                Yii::app()->user->setFlash('success', 'Ваш профиль успешно обновлен!');
                $this->redirect(array('view', 'id' => $model->ID));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'alumni-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
