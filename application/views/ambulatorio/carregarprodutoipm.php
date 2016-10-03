
<div class="content ficha_ceatox">
    <h3 class="h3_title">Cadastro de Produto IPM</h3>
    <form name="avaliacao_form" id="avaliacao_form" action="<?= base_url() ?>ambulatorio/exame/gravarprodutoipm/<?=$internacao_precricao_produto_ipm_id?>" method="post">
        <fieldset>
            <legend>Dados</legend>
             

             <div> 
                <label>Descriçao do Produto</label>
                <input type="text" name="descricao" id="descricao"  class="size4" value="<?=$listar[0]->descricao?>"/>
            </div>
             <div> 
                <label>Quantidade</label>
                <input type="text" name="quantidade" id="quantidade" alt="999" class="size1" value="<?=$listar[0]->quantidade?>"/>
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
                
                txtAltura: {
                    required: true
                },
                txtCB: {
                    required: true
                },
                txtAlturaPerna: {
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
                
                txtAltura: {
                    required: "*"
                },
                txtCB: {
                    required: "*"
                },
                txtAlturaPerna: {
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