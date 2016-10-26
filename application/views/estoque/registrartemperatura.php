
<div class="content ficha_ceatox">
    <h3 class="h3_title">Registrar Temperatura da Geladeira Parenteral</h3>
    <form name="parenteral_form" id="parenteral_form" action="<?= base_url() ?>estoque/parenteral/gravarregistrartemperatura/<?=$estoque_parenteral_geladeira_id?>" method="post">
        
        
        <fieldset>
            <legend>Temperatura</legend>
            <div>
                <label>Temperatura</label>
                <input type="text" name="temperatura" id="temperatura"  class="size1"   />C°
            </div>
            <div>
                <label>Data/hora de Checagem ex.( 20/01/2016 14:30:21)</label>
                <input type="text" name="data_checagem" id="data_checagem"  class="size3" alt="39/19/9999 29:59:59" value=""  />
            </div>
            
            
            
            
        </fieldset>
        
        <fieldset>
            <legend>Observação</legend>
            <div>
                <label>Observações</label>
                <input type="text" name="observacao" id="observacao"  class="size4" value=""  />
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
