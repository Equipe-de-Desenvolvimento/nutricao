<div class="content"> <!-- Inicio da DIV content -->
    <div id="accordion">
        <h3><a href="#">Período</a></h3>
        <div>

           

            <form name="relatorio_form" id="relatorio_form" action="<?= base_url() ?>nutricionista/nutricionista/formularioevolucaonutricional/<?=$internacao_id;?>" method="post" >
                <dl>
               
                    <dt>
                    <label>Data Inicio</label>
                    </dt>
                    <dd>
                        <input type="text" name="txtdata_inicio" id="txtdata_inicio" alt="date"/>
                    </dd>
                    <dt>
                    
                    <dt>
                    <label>Data Fim</label>
                    </dt>
                    <dd>
                        <input type="text" name="txtdata_fim" id="txtdata_fim" alt="date"/>
                    </dd>
                    
                    <dt>
                </dl>
                <button type="submit" >Pesquisar</button>

            </form>

        </div>
    </div>


</div> <!-- Final da DIV content -->
<link rel="stylesheet" href="<?php base_url() ?>css/jquery-ui-1.8.5.custom.css">
<script type="text/javascript">
    $(function() {
        $("#txtdata_inicio").datepicker({
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
        $("#txtdata_fim").datepicker({
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
<script>
$(document).ready(function(){
        jQuery('#relatorio_form').validate( {
            rules: {
                
                txtdata_inicio: {
                    required: true
                },
                txtdata_fim: {
                    required: true
                },
                nome: {
                    required: true
                },
                
                txtget2: {
                    required: true
                },
                txtEtnia: {
                    required: true
                }
   
            },
            messages: {
                
                txtdata_inicio: {
                    required: "*"
                },
                txtdata_fim: {
                    required: "*"
                },
                nome: {
                    required: "*"
                },
                
                txtget2: {
                    required: "*"
                },
                txtEtnia: {
                    required: "*"
                }
            }
        });
    });

</script>