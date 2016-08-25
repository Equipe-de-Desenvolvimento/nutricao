<div class="content ficha_ceatox">
    <h3 class="h3_title">Ficha de avaliação Nutricional</h3>
    <form name="avaliacao_form" id="avaliacao_form" action="<?= base_url() ?>internacao/internacao/imprimirfichadeavaliacao/<?= $internacao_id; ?>" method="post">
        <fieldset>
            <legend>Dados</legend>
            <div>
                <label>Peso Atual (Em Kg)</label>
                <input type="text" name="txtPeso" id="txtPeso" alt="999" class="size1" value="" />
            </div>
            <div>
                <input type="hidden" name="txtIdade" id="txtIdade"  class="size1" value=<? echo $paciente[0]->nascimento;?> />
            </div>
            <div>
                <input type="hidden" name="txtSexo" id="txtSexo"  class="size1" value=<? echo $paciente[0]->sexo;?> />
            </div>

            <div> 
                <label>Altura do Joelho (Em cm)</label>
                <input type="text" name="txtAlturaPerna" id="txtAlturaPerna" alt="numeromask" class="size1" value=""/>
            </div>

            <div>
                <label>Circunferência do Braço (Em cm)</label>
                <input type="text" name="txtCB" id="txtCB" alt="numeromask" class="size2" value=""/>
            </div>   
            <div> 
                <label>Informe o P50</label>
                <input type="text" name="txtP50" id="txtP50" alt="99.9" class="size2" value=""/>
            </div>
        </fieldset>
        <fieldset>
            <legend>Determinação do gasto energético total</legend>

            <div>
                <label><input type="radio" value="25" name="txtget2" id="txtget2" class="txtget2" /> GET c/ Presença de SIRS:</label>
                <label><input type="radio" value="30" name="txtget2" id="txtget2" class="txtget2" /> GET c/ Ausência de SIRS:</label>
                <label><input type="radio" value="40" name="txtget2" id="txtget2" class="txtget2" /> GET c/ Repleção:</label>

            </div>

        </fieldset>
        <fieldset>
            <legend>Etnia</legend>
            <div>
                <label><input type="radio" value="1" name="txtEtnia" id="txtEtnia" class="txtget2" /> Mulher/Homem Branco(a)</label>
                <label><input type="radio" value="0" name="txtEtnia" id="txtEtnia" class="txtget2" /> Mulher/Homem Negro(a)</label>
            </div>
        </fieldset>
       
        <button type="submit" name="btnEnviar">Enviar</button>
        <button type="reset" name="btnLimpar">Limpar</button>
    </form>
</div>
<div class="clear"></div>

<link rel="stylesheet" href="<?= base_url() ?>css/jquery-ui-1.8.5.custom.css">
<script type="text/javascript" src="<?= base_url() ?>js/jquery.validate.js"></script>
<script type="text/javascript">

</script>
<script>
$(document).ready(function(){
        jQuery('#avaliacao_form').validate( {
            rules: {
                txtPeso: {
                    required: true
                },
                txtAltura: {
                    required: true
                },
                txtCB: {
                    required: true
                },
                txtAlturaPerna: {
                    required: true
                },
                txtP50: {
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
                txtPeso: {
                    required: "*"
                },
                txtAltura: {
                    required: "*"
                },
                txtCB: {
                    required: "*"
                },
                txtAlturaPerna: {
                    required: "*"
                },
                txtP50: {
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