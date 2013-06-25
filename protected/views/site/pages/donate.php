<h2>Стипендия</h2>

<?php
$this->widget('bootstrap.widgets.TbMenu', array(
    'type' => 'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked' => false, // whether this is a stacked menu
    'items' => array(
        array('label' => 'Описание', 'url' => Yii::app()->createUrl("site/pageview", array('view' => 'grand'))),
        array('label' => 'Участники', 'url' => Yii::app()->createUrl("site/page", array('view' => 'member'))),
        array('label' => 'Перевести средства', 'url' => Yii::app()->createUrl("site/page", array('view' => 'donate')), 'active' => true),
    ),
));
?>
<br>

<p>
    Уважаемые члены клуба! <br>
    В настоящий момент мы вынуждены ограничить число систем приема платежей в связи 
    с юридическими трудностями при оформлении договора обслуживания. 
    Однако Вы можете сделать свой вклад в проект через платежную систему Яндекс.Деньги.
    <br><br>
    <b>Это можно сделать одним из следющих методов:</b><br>
 </p>
 <p>
    1) Перевод средств внутри системы Я.Деньги. Идельно подходит, если Вы уже 
    пользуетесь этой системой и обладаете на счете суммой, которую хотите перевести. 
    <br>
    Просто введити необходимую сумму в форме ниже, нажмите на кнопку и следуйте требованиям системы. 
    <br>


    <iframe frameborder="0" allowtransparency="true" scrolling="no" src="https://money.yandex.ru/embed/donate.xml?uid=410011796716817&amp;default-sum=1000&amp;targets=%D0%A1%D1%82%D0%B8%D0%BF%D0%B5%D0%BD%D0%B4%D0%B8%D0%B0%D0%BB%D1%8C%D0%BD%D1%8B%D0%B9+%D1%84%D0%BE%D0%BD%D0%B4&amp;project-name=%D0%A1%D1%82%D0%B8%D0%BF%D0%B5%D0%BD%D0%B4%D0%B8%D0%B0%D0%BB%D1%8C%D0%BD%D1%8B%D0%B9+%D1%84%D0%BE%D0%BD%D0%B4&amp;project-site=http%3A%2F%2Fbmstuclub.org&amp;button-text=03&amp;hint=" width="450" height="107"></iframe>

</p>
<p>
    2)Банковский перевод. <br>
    Вы модете перевести средства со счета любого банка. <br>
    Реквезиты для перевода можно скачать <a href="yamoney.pdf" target="blank">здесь</a> или ознакомиться ниже: 
<div class="accordion" id="accordion2">
    <div class="accordion-group">
        <div class="accordion-heading">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                Реквезиты для перевода
            </a>
        </div>
        <div id="collapseOne" class="accordion-body collapse">
            <div class="accordion-inner">
                
                <i>Реквизиты для пополнения счета пользователя <b>bmstualamniclub</b>.</i>
                <div class="topup-list-block topup-field-list">
				<div class="topup-field-list-header">ООО НКО «Яндекс.Деньги»</div>
				<div class="topup-field-row"><div class="topup-field-name">Получатель</div><div class="topup-field-value">ООО НКО «Яндекс.Деньги»</div></div>
				<div class="topup-field-row"><div class="topup-field-name">ИНН</div><div class="topup-field-value">7750005725</div></div>
				<div class="topup-field-row"><div class="topup-field-name">КПП</div><div class="topup-field-value">775001001</div></div>
				<div class="topup-field-row"><div class="topup-field-name">Лицевой счет</div><div class="topup-field-value">30232810400000000003 в ООО НКО «Яндекс.Деньги»</div></div>
				<div class="topup-field-row"><div class="topup-field-name">Кор. счет</div><div class="topup-field-value">30103810800000000444 в Отделении № 4 Московского ГТУ Банка России </div></div>
				<div class="topup-field-row"><div class="topup-field-name">БИК</div><div class="topup-field-value">044579444</div></div>
				<div class="topup-field-row"><div class="topup-field-name">Место нахождения</div><div class="topup-field-value">119021, г. Москва, ул. Льва Толстого, д. 16.</div></div>
				<div class="topup-field-row"><div class="topup-field-name">Почтовый адрес</div><div class="topup-field-value">119021, г. Москва, а/я 57</div></div>
				<div class="topup-field-row"><div class="topup-field-name">Назначение платежа</div><div class="topup-field-value">Платеж по договору № 410011796716817, без НДС.
                                        <div class="section topup-notice">Обязательно укажите эти&nbsp;данные в&nbsp;поле&nbsp;«Назначение платежа» (Payment details), иначе&nbsp;платеж не&nbsp;будет&nbsp;зачислен на&nbsp;ваш&nbsp;счет.</div></div></div>
			</div>
            </div>
        </div>
    </div>
</div>
</p>

<p>
    3) Интернет-банкинг. <br>
    Более подробно данный метод описан на <a href="https://money.yandex.ru/doc.xml?id=242314" target="blank">этой</a> страничке.
    Номер кошелька для пополнения - 410011796716817.
</p>


<p>
    3) Перевод через терминалы. <br>
    Более подробно данный метод описан на <a href="https://money.yandex.ru/doc.xml?id=522781" target="blank">этой</a> страничке.
    Номер кошелька для пополнения - 410011796716817.
</p>
