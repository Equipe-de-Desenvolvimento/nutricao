<div class="content ficha_ceatox"> <!-- Inicio da DIV content -->
    <h3 class="h3_title">Evolução Nutricional</h3>

    <form name="form_exame" id="form_exame" action="<?= base_url() ?>nutricionista/nutricionista/gravarevolucaonutricional/<?= $internacao_id ?>" method="post">

        <? if (count($prescricao) > 0) { ?>
            <br>
            <br>


            <table>
                <tr>
                    <th class="tabela_header">
                        Texto da Evolução
                    </th>
                    <th class="tabela_header">
                        Produto (Formula)
                    </th>
                    <th class="tabela_header">
                        Equipo
                    </th>

                    <th class="tabela_header">

                    </th>
                    <th class="tabela_header"></th>
                </tr>
                <tr>
                    <?
                    $etapas = "";
                    $internacao_precricao_id = "";
                    $estilo_linha = "tabela_content01";
                    $contador = 0;
                    $verificador = 0;
                    $dieta = "";
                    $via = $prescricao[0]->via;
                    $c = 0;
                    $b;
                    

                    foreach ($prescricao as $item) {
                        $classificacao= "";
                        $i = $item->etapas;

                        if ($item->internacao_precricao_id != $internacao_precricao_id) {
                            $data = substr($item->data, 8, 2) . '/' . substr($item->data, 5, 2) . '/' . substr($item->data, 0, 4);
                            $internacao_precricao_id = $item->internacao_precricao_id;
                            $classificacao= $item->classificacao;
                            $produto_id= $item->internacao_precricao_produto_id;
                            
                          

                            foreach ($prescricaoequipo as $value) {
                                if ($value->internacao_precricao_id == $item->internacao_precricao_id) {
                                    $equipo = $value->nome;
                                    $equipo_id = $value->internacao_precricao_produto_id;
                                    

                                    if ($item->vasao != null) {
                                        $taxadeinfusao = $item->vasao . "ml/h";
                                    } else {
                                        $taxadeinfusao = "Gravitacional";
                                    }
                                }
                            }
                        } else {
                            $data = '&nbsp;';
                            $equipo = '&nbsp;';
                        }
                        if ($item->internacao_precricao_etapa_id == $etapas) {
                            $i = '&nbsp;';
                            ($estilo_linha == "tabela_content01") ? $estilo_linha = "tabela_content01" : $estilo_linha = "tabela_content02";
                        } else {
                            ($estilo_linha == "tabela_content01") ? $estilo_linha = "tabela_content02" : $estilo_linha = "tabela_content01";
                        }

                        if ($item->dencidade_calorica != 0.00) {
                            $vct = (float) $item->dencidade_calorica * $item->volume . "Kcal";
                        } else {
                            $vct = "";
                        }
                        ?>


                    <tr>
                        <td  class="<?php echo $estilo_linha; ?> "> 
                            <? if ($data != '&nbsp;') { ?>
                            <textarea  type="text" name="formula[<?= $c ?>]" id="formula" class="textarea" cols="60" rows="6" value=" "><?=$data;?> Paciente em  TNE em BIC <?=$taxadeinfusao?> e VCT <?=$vct?> Dieta: <?= $item->etapas; ?> Etapa(s) </textarea>
                            
                                <?
                            }
                            ?>

                        </td>
                        
                        <td class="<?php echo $estilo_linha; ?>" >

                            <a  style="cursor: pointer; color: #f00;" onclick="javascript:window.open('<?= base_url() ?>nutricionista/nutricionista/alterarprodutoprescricao/<?= $item->internacao_precricao_produto_id ?>');">  <?= $item->nome; ?> </a> Formula (<?= $item->classificacao; ?>) +


                        </td>
                        <?
                        //Do POST
                        $c++;
                        ?>

                        <td  class="<?php echo $estilo_linha; ?>" style="cursor: pointer;color: #f00;"><a onclick="javascript:window.open('<?= base_url() ?>nutricionista/nutricionista/alterarprodutoprescricao/<?= $equipo_id ?>');"> <?= $equipo; ?></a>


                        </td>
                        <? if ($data != '&nbsp;') { ?>
                            <td class="<?php echo $estilo_linha; ?>"></td>
                        <? } else { ?>
                            <td class="<?php echo $estilo_linha; ?>"></td>
                        <? } ?>
                    </tr>
                    <?
                    $i++;
                    $etapas = $item->internacao_precricao_etapa_id;
                    
                }
                ?>

                <?
            }

//    $internacao_id = $prescricao[0]->internacao_id;
            
            ?>
        </table>




        <div>

            <input type="hidden" id="txtinternacao" name="internacao_id"  class="texto06" value="<?= $internacao_id ?>" readonly/>
        </div>
        <div>

            <input type="hidden" id="txtinternacao" name="txtdata_fim"  class="texto06" value="<?= $_POST['txtdata_fim'] ?>" readonly/>
        </div>
        <div>

            <input type="hidden" id="txtinternacao" name="txtdata_inicio"  class="texto06" value="<?= $_POST['txtdata_inicio'] ?>" readonly/>
        </div>















        <hr/>
        <button type="submit" name="btnEnviar">Enviar</button>

    </form>
     
</div> 




<!--<div class="bt_link_new">
    <a id="finalizar"  href="<?= base_url() ?>internacao/internacao/finalizarprescricaoenteralnormal/<?= $internacao_id; ?>">Finalizar Prescricao

    </a></div>-->




<link rel="stylesheet" href="<?= base_url() ?>css/jquery-ui-1.8.5.custom.css">
<script type="text/javascript" src="<?= base_url() ?>js/jquery-1.4.2.min.js" ></script>
<script type="text/javascript" src="<?= base_url() ?>js/jquery-1.9.1.js" ></script>
<script type="text/javascript" src="<?= base_url() ?>js/jquery-ui-1.10.4.js" ></script>
<script type="text/javascript" src="<?= base_url() ?>js/jquery.validate.js"></script>
