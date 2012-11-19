<form class="form-horizontal" id="payForm" action="/index.php?r=gift/pay1&amp;id=1" method="post" onChange="StatusSelect();"> 
    <fieldset>

        <legend>Пожалуйста, выберите сумму, которую Вы готовы пожертвовать:</legend>

        <label>Сумма пожертвований</label>
        <label class="radio">
            <input id="Fact_trsSum_0" value="500" type="radio" name="summ">
            <label>500</label> 
        </label>
        <label class="radio">
            <input id="Fact_trsSum_1" value="5000" type="radio" name="summ">
            <label>1000</label> 
        </label>
        <label class="radio">
            <input id="Fact_trsSum_2" value="5000" type="radio" name="summ">
            <label>2000</label> 
        </label>
        <label class="radio">
            <input id="Fact_trsSum_3" value="5000" type="radio" name="summ">
            <label>5000</label> 
        </label>
        <label class="radio">
            <input id="4" value="5000" type="radio" name="summ">
            <label>10000</label> 
        </label>
        <label class="radio">
            <input id="5" value="another" type="radio" name="summ">
            <label>Другая:</label>
            <input class="input-small" 
                   id="disabledInput" 
                   type="text" 
                   disabled
                   >
        </label>
    </fieldset>
    <button class="btn btn-warning" type="submit" name="ya">Яндекс Деньги</button> 
    <button class="btn btn-warning" type="submit" name="visa">Visa</button>   

    <script type="text/javascript">
        function StatusSelect(){

            var selected = $('#payForm').find('option[selected]');

            if(selected.attr('id') == '5'){ alert('да')};

            if(selected.attr('id') == '4'){ alert('нет')};

        };

    </script>


</form>