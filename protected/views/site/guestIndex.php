<?php $this->renderPartial('/site/_carusel'); ?>
<div class="hero-unit">
    <h3>Добро пожаловать в клуб выпускников!</h3>
    <p>Клуб Выпускников МГТУ им. Баумана представляет собой организацию, которая призвана
        объединить выпускников университета как в России так и за рубежом.</p>
    <p>
        Членство в клубе предусмотрено для всех, кто закончил мгту или его филиалы.</p>
    <p>Основной целью клуба является установление взаимовыгодных отношений между
        университетом и его выпускниками а также повышение «богатства» МГТУ. Клуб
        Выпускников МГТУ им Баумана помогает его выпускникам оставаться на связи с
        университетом и его студентами посредством организации регулярных встреч и клубных
        мероприятий. Отдельно стоит подчеркнуть он-лайн сервис сбора «пожертвований»,
        который призван предоставить выпускникам возможность привнести свой вклад в
        развитие родной кафедры, университета или научного сообщества.</p>
    <p>
        На данный момент Клуб Выпускников работает в тесном сотрудничестве с
        благотворительным фондом «Поддержки и Развития МГТУ». Однако основной задачей мы
        ставим перед собой создание собственной некоммерческой организации, которая смогла
        бы динамично развиваться и плодотворно сотрудничать с университетом.</p>
    <div style="text-align: right;">
        <a class="btn btn-primary btn-normal" href="<?php echo Yii::app()->createUrl('alumni/singup'); ?>">Зарегистрироваться
        </a>
        или 
        <a class="btn btn-primary btn-normal" href="<?php echo Yii::app()->createUrl('site/login'); ?>">
            Войти
        </a>
    </div>
</div>