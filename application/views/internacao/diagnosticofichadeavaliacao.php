<? //echo var_dump($diagnostico[0]);
$cen= (int) $diagnostico[0]->cen;
// Classificação do Estado Nutricional Segundo o CB
if ($cen > 120) {
    $classificacao = 'Obesidade >120%';
} elseif ($cen < 110 && $cen > 90) {
    $classificacao = 'Eutrofia 110-90%';
} elseif ($cen < 80 && $cen > 70) {
    $classificacao = 'DPC Moderada 80-70%';
} elseif ($cen < 120 && $cen > 110) {
    $classificacao = 'Sobrepeso 120-110%';
} elseif ($cen < 90 && $cen > 80) {
    $classificacao = 'DPC Leve 90-80%';
} else {
    $classificacao = 'DPC grave </= 70%';
}

?>
<div class="content ficha_ceatox">
    <h3 class="h3_title">Ficha de avaliação Nutricional</h3>
    <form name="avaliacao_form" id="avaliacao_form" action="<?= base_url() ?>internacao/internacao/gravardiagnosticofichadeavaliacao/<?=$internacao_fichadeavaliacao_id;?>" method="post">
        <fieldset>
            <legend>Dados</legend>
            <div>
                <label>Percentual de Adequação a CB</label>
                <input type="text" name="txtPeso" id="txtPeso"  class="size2" value="<?echo $diagnostico[0]->cen;?>%" readonly />
            </div>
           
           
            <div>
                <label>Classificação do Estado Nutricional Segundo o CB</label>
                <input type="text" name="txtPeso" id="txtPeso"  class="size2" value="<?echo $classificacao;?>" readonly/>
            </div>
            <div> 
                <label>Tipo de GET</label>
                <input type="text" name="txtPesoHabitual" id="txtPesoHabitual"  class="size2" value="<?echo $diagnostico[0]->tipoget;?>" readonly/>
            </div>
            <div> 
                <label>GET</label>
                <input type="text" name="txtPesoHabitual" id="txtPesoHabitual"  class="size2" value="<?echo $diagnostico[0]->get;?>"  readonly/>
            </div>
        
        </fieldset>
        <fieldset>
            <legend>Diagnostico</legend>
             <div>
                <label>Diagnóstico Nutricional e Conduta Dioterápica</label>
                <textarea cols="" rows="" name="txtDiag" id="txtDiag" class="texto_area" ><?echo $diagnostico[0]->diagnostico_nutricional;?></textarea>
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
                
                txtDiag: {
                    required: true
                }
               
   
            },
            messages: {
                
                txtDiag: {
                    required: "* Campo Requirido"
                }
                
            }
        });
    });

</script>