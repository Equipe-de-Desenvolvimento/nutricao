<?//echo var_dump($internacao_id);
//die;
?>
<div class="content"> <!-- Inicio da DIV content -->

    <div class="bt_link_new">
        <a href="<?php echo base_url() ?>estoque/parenteral/registrarumidadeambienteparenteral">
            Registrar Temp/Umidade
        </a>
    </div>
    <div id="accordion">
        <h3><a href="#">Temp/Umidade:</a></h3>
        <div>
            <table><!-- Início da lista de pensionistas -->

                <thead>
                    <tr>
                        <th class="tabela_header">ID</th>
                        <th class="tabela_header">Data e Hora</th>
                        <th class="tabela_header">Temp. e Umidade </th>
                        <th class="tabela_header" colspan="3" width="50px"><center> Observação</center></th>
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
                        <td class="<?=$classe;?>"><?=$item->estoque_parenteral_ambiente_temperatura_id;?></td>
                        <td class="<?=$classe;?>"><?$ano= substr($item->data_checagem,0,4);?>
                                                            <?$mes= substr($item->data_checagem,5,2);?>
                                                            <?$dia= substr($item->data_checagem,8,2);?>
                                                            <?$hora= substr($item->data_checagem,10,10);?>
                                                            <?$datafinal= $dia . '/' . $mes . '/' . $ano . $hora; ?>
                                                            <?php echo$datafinal?></td>
                        <td class="<?=$classe;?>"><?=$item->temperatura;?> C° &nbsp;&nbsp;&nbsp; <?=$item->umidade;?>%</td>
                        <td class="<?=$classe;?>" width="70px;" > 
                            <?=$item->observacao;?>
                        </td>
                        <td class="<?=$classe;?>" width="50px;" >
                        </td>
                    </tr>
                            <?
                            $i++;
                        }
                    else :
                        ?>
                    <tr>
                        <td class="tabela_content01" colspan="4">Sem checagens cadastradas.</td>
                    </tr>
                    <? endif; ?>
              </tbody>
                <tfoot>
                    <tr>
                        <th class="tabela_footer" colspan="6">Checagens <?=count($lista); ?></th>
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
