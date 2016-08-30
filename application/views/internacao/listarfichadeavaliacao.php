<?//echo var_dump($internacao_id);
//die;
?>
<div class="content"> <!-- Inicio da DIV content -->

    <div class="bt_link_new">
        <a href="<?php echo base_url() ?>internacao/internacao/novofichadeavaliacao/<?=$internacao_id?>">
            Nova Ficha de Avaliação
        </a>
    </div>
    <div id="accordion">
        <h3><a href="#">Ficha de avaliação  selecionada:</a></h3>
        <div>
            <table><!-- Início da lista de pensionistas -->

                <thead>
                    <tr>
                        <th class="tabela_header">Ficha de Avaliação</th>
                        <th class="tabela_header">Data de Cadastro</th>
                        <th class="tabela_header"></th>
                        <th class="tabela_header" colspan="3" width="70px"><center>A&ccedil;&otilde;es</center></th>
                    </tr>
                </thead>
                <tbody>
                    <?
                    if (count($lista) > 0) :
                        $i=0;
                        foreach ($lista as $item) {
                            if ($i%2 == 0) : $classe = "tabela_content01";
                            else: $classe = "tabela_content02";
                            endif;
                            //$ficha_id = $item->ficha_id;
                            ?>
                    <tr>
                        <td class="<?=$classe;?>"><?=$item->internacao_fichadeavaliacao_id;?></td>
                        <td class="<?=$classe;?>"><?$ano= substr($item->data_atualizacao,0,4);?>
                                                            <?$mes= substr($item->data_atualizacao,5,2);?>
                                                            <?$dia= substr($item->data_atualizacao,8,2);?>
                                                            <?$hora= substr($item->data_atualizacao,10,10);?>
                                                            <?$datafinal= $dia . '/' . $mes . '/' . $ano . $hora; ?>
                                                            <?php echo$datafinal?></td>
                        <td class="<?=$classe;?>"></td>
                        <td class="<?=$classe;?>" width="50px;" ><div class="bt_link_new">
                            <a 
                               href="<?=  base_url()?>internacao/internacao/diagnosticofichadeavaliacao/<?=$item->internacao_fichadeavaliacao_id;?>">
                                <b>Diagnóstico</b>
                            </a>
                            </div>
                        </td>
                        <td class="<?=$classe;?>" width="50px;" ><div class="bt_link_new">
                            <a  href="<?=  base_url()?>internacao/internacao/imprimirfichadeavaliacao/<?=$item->internacao_fichadeavaliacao_id;?>">
                                <b>Imprimir</b>
                            </a>
                            </div>    
                        </td>
                    </tr>
                            <?
                            $i++;
                        }
                    else :
                        ?>
                    <tr>
                        <td class="tabela_content01" colspan="4">Sem Avaliação cadastrada.</td>
                    </tr>
                    <? endif; ?>
              </tbody>
                <tfoot>
                    <tr>
                        <th class="tabela_footer" colspan="6">Avaliações <?=count($lista); ?></th>
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
