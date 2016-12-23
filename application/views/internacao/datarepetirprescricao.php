<div class="content"> <!-- Inicio da DIV content -->
    <div id="accordion">
        <h3><a href="#">Repetir</a></h3>
        <div>
            <form method="post" action="<?= base_url() ?>internacao/internacao/repetirultimaprescicaoenteralnormaltodas">
                <dl>
                    <dt>
                    <label>Data</label>
                    </dt>
                    <dd>
                        <input type="text" name="txtdata_repetir" id="txtdata_repetir" alt="date"/>
                    </dd>
                    
                <button type="submit" >Pesquisar</button>

            </form>

        </div>
    </div>


</div> <!-- Final da DIV content -->
<link rel="stylesheet" href="<?php base_url() ?>css/jquery-ui-1.8.5.custom.css">
<script type="text/javascript">
    $(function() {
        $("#txtdata_repetir").datepicker({
            autosize: true,
            changeYear: true,
            changeMonth: true,
            monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
            dayNamesMin: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
            buttonImage: '<?= base_url() ?>img/form/date.png',
            dateFormat: 'dd/mm/yy'
        });
    });

    


    $(function() {
        $("#accordion").accordion();
    });

</script>