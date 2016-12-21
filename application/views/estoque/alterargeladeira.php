
<div class="content ficha_ceatox">
    <h3 class="h3_title">Nova Geladeira Parenteral</h3>
    <form name="parenteral_form" id="parenteral_form" action="<?= base_url() ?>estoque/parenteral/gravaralterargeladeiraparenteral/<?=$geladeira[0]->estoque_parenteral_geladeira_id;?>" method="post">
        <fieldset>
            <legend>Dados</legend>
            <div>
                <label>Descrição</label>
                <input type="text" name="descricao" id="descricao"  class="size3" value="<?=$geladeira[0]->descricao;?>"  />
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
