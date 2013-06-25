<?php

class SiteController extends Controller {

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
//        if (Yii::app()->user->isGuest)
//            $this->render('guestIndex');
//        else {

            $this->render('index', array('news' => News::getLast(),));
//        }
    }

    public function actionPageView($view) {
        $this->render("page", array('vote_id' => $view, 'page_name' => $view));
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    public function actionVote() {
        if (Yii::app()->user->isGuest)
            throw new CHttpException(403, 'Недостаточно прав для указанного действия');
      
        if (isset($_POST['vote_id'])) {
            //все параметры заданы
            $vote = ($_POST['vote_id']); 
            if (Votes::setVote($vote)) {
                $return = array(
                    'status' => "success",     
                );
                echo json_encode($return);
                return;
            } else {
                $return = array(
                    'status' => "error",
                    'description' => "Ошбика!",
                );
                echo json_encode($return);
                return;
            }
        } else {
            $return = array(
                'status' => "error",
                'description' => "Ошбика! Не все данные заданы!",
            );
            echo json_encode($return);
            return;
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact() {
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
                $headers = "From: $name <{$model->email}>\r\n" .
                        "Reply-To: {$model->email}\r\n" .
                        "MIME-Version: 1.0\r\n" .
                        "Content-type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        $model = new LoginForm;
        $this->loginform = false;

        if (isset($_POST['LoginForm'])) {
            print_r($_POST);
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login()) {
                $alum = Alumni::model()->findByPk(Yii::app()->user->getId());
                $alum->setNewVisitDate();
                if ($alum->itIsFirtsVisit()) {
                    $this->redirect(Yii::app()->createUrl('alumni/EditProfile'));
                }
                else
                    $this->redirect(Yii::app()->createUrl('site/index'));
            }
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

}