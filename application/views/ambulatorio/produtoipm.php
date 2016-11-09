<?//echo var_dump();
//die;
?>
<div class="content"> <!-- Inicio da DIV content -->

    <div class="bt_link_new">
        <a href="<?php echo base_url() ?>ambulatorio/exame/novoprodutoipm/">
            Novo Produto IPM
        </a>
    </div>
    <div id="accordion">
        <h3><a href="#">Produtos cadastrados:</a></h3>
        <div>
            <table><!-- Início da lista de pensionistas -->

                <thead>
                    <tr>
                        <th class="tabela_header">Descricao Produto</th>
                        <th class="tabela_header">Quantidade</th>
                        <th class="tabela_header"></th>
                        <th class="tabela_header" colspan="3" width="70px"><center>A&ccedil;&otilde;es</center></th>
                    </tr>
                </thead>
                <tbody>
                    <?
                    
                             $classe = "tabela_content01";
                           
                            foreach($listar as $item){
                                
                            
                            ?>
                    <tr>
                        <td class="<?=$classe;?>"><?=$item->descricao?></td>
                        <td class="<?=$classe;?>"><?=$item->quantidade?></td>
                        <td class="<?=$classe;?>"></td>
                        <td class="<?=$classe;?>" width="50px;" ><div class="bt_link_new">
                            <a 
                               href="<?=  base_url()?>ambulatorio/exame/carregarprodutoipm/<?=$item->internacao_precricao_produto_ipm_id?>">
                                <b>Editar</b>
                            </a>
                            </div>
                        </td>
                        <td class="<?=$classe;?>" width="50px;" ><div class="bt_link_new">
                            <a onclick="javascript: return confirm('Deseja realmente excluir o produto?');"
                               href="<?=  base_url()?>ambulatorio/exame/excluirprodutoipm/<?=$item->internacao_precricao_produto_ipm_id?>"><b>Excluir</b>
                                    </a>
                            </div>    
                        </td>
                    </tr>
                          
                   <?
                   }
                   ?>
                   
              </tbody>
                <tfoot>
                    <tr>
                        <th class="tabela_footer" colspan="6">Produtos </th>
                    </tr>
                </tfoot>
            </table><!-- Fim da lista de pensionistas -->
        </div>
     </div>
</div> <!-- Final da DIV content -->
<link rel="stylesheet" href="<?= base_url()?>css/jquery-ui-1.8.5.custom.css">
<script type="text/javascript">

    $(function() {
        $( "#servidor" ).accordion();
        $( "#accordion" ).accordion();
    });

  </script>
