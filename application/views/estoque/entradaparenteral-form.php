
<div class="content ficha_ceatox">
    <h3 class="h3_title">Entrada de Produtos Parenteral</h3>
    <form name="parenteral_form" id="parenteral_form" action="<?= base_url() ?>estoque/parenteral/gravarentradaestoqueparenteral/<?=$listar[0]->estoque_saida_id;?>" method="post">
        <fieldset>
            <legend>Dados</legend>
            <div>
                <label>Produto</label>
                <input type="text" name="txtPeso" id="txtPeso"  class="size3" value="<?=$listar[0]->produto;?>"  readonly/>
            </div>
            <div> 
                <label>Fornecedor</label>
                <input type="text" name="txtPesoHabitual" id="txtPesoHabitual"  class="size4" value="<?=$listar[0]->fornecedor;?>" readonly/>
            </div>
            
            <div> 
                <label>Quantidade</label>
                <input type="text" name="txtAlturaPerna" id="txtAlturaPerna"  class="size1" value="<?=$listar[0]->quantidade;?>" readonly/>
            </div>

            <div>
                <label>Validade</label>
                <input type="text" name="txtCB" id="txtCB"  class="size2" value="<?echo $validade = substr($listar[0]->validade, 8, 2) . '/' . substr($listar[0]->validade, 5, 2) . '/' . substr($listar[0]->validade, 0, 4);?>" readonly/>
            </div>   
            
            
            
        </fieldset>
        
        <fieldset>
            <legend>Entrada Parenteral</legend>
            <div>
                <label>Data/hora de Entrada ex.( 20/01/2016 14:30:21)</label>
                <input type="text" name="data_entrada" id="data_entrada"  class="size3" alt="39/19/9999 29:59:59" value=""  />
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
