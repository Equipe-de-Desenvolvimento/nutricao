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
                    $dieta = '';
                    $via = $prescricao[0]->via;
                    $c = 0;
                    $b = 1;

                    foreach ($prescricao as $key => $item) {
                        $classificacao = "";
                        $i = $item->etapas;
                        $d = $item->etapas;
//                        echo $item->volume;
                        $vctgeral = 0;
                        $dieta = '';
                        $z = 0;
                        $y = 0;
                        if ($item->internacao_precricao_id != $internacao_precricao_id) {
//                            $b = 0;
                            $teste = $this->nutricionista->etiquetapacienteclassificacao($item->internacao_precricao_id);
                            $volumetotal = $this->nutricionista->formularioevolucaonutricionalteste($item->internacao_precricao_id);
                            
                            foreach ($volumetotal as $value) {
                                if($value->sf == 't' && $z == 0){
                                    $z= 1;
                                }
                                if($value->volume != null) {
                                    if($z==1 && $y == 0){
                                        if($value->bic != null){
                                            $dieta = "BIC " . $value->bic. "ml/h ";
                                            $y=1;
                                        }
                                    }
                                    else{
                                        
                                    $dieta = $dieta . "+ " .  $value->etapas . " " .  "Etapa(s) de" ." ".$value->frasco . "ml". " ";
                                    }
                                }
                                
                                
                            }

                            foreach ($volumetotal as $value) {
                                $vctgeral = (float) $vctgeral + (($value->frasco * $value->etapas) * ($value->dencidade_calorica));
                            }
                            
                            $dieta = $dieta . "e VCT de " .$vctgeral . "Kcal/d ";
                            
                            foreach ($volumetotal as $value) {
                                if($value->volume == null) {
//                                    echo 'morra';
                                    $dieta = $dieta . "+" .$value->medida . " " . $value->descricao . " de " .$value->produto ;
                                }
                                
                            }
                            
//                            var_dump($volumetotal);die;
//                            var_dump($dieta);die;
                            $classificacaogeral = '';
                            // Classificação 
                            foreach ($teste as $value2) {
                                $classificacaogeral = $classificacaogeral . " +" . $value2->nome;
                            }
//                             var_dump($volumetotal); die;
//                            
//                            $vct = (float) $item->dencidade_calorica * ($item->volume * $i);
                            $data = substr($item->data, 8, 2) . '/' . substr($item->data, 5, 2) . '/' . substr($item->data, 0, 4);
                            $internacao_precricao_id = $item->internacao_precricao_id;
                            $internacao_precricao_etapa_id = $item->internacao_precricao_etapa_id;


//                            echo '<pre>';
//                            $dieta = $dieta +  $teste[0]->classificacao;
//                            var_dump($teste);
                            $classificacao = $item->classificacao;
                            $produto_id = $item->internacao_precricao_produto_id;

                            foreach ($prescricaoequipo as $value) {
                                if ($value->internacao_precricao_id == $item->internacao_precricao_id) {
                                    $equipo = $value->nome;
                                    $equipo_id = $value->internacao_precricao_produto_id;
//                                    $d++;


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

                        ?>


                    <tr>
                        <td  class="<?php echo $estilo_linha; ?> "> 
                                <? if ($data != '&nbsp;') { ?>
                                <textarea  type="text" name="formula[<?= $c ?>]" id="formula" class="textarea" cols="60" rows="6" value=" "><?= $data; ?> Paciente em  TNE com formula<?= $classificacaogeral ?> em <?= $dieta?> Dieta:
                                                
                                </textarea>

                                <?
                            }
                            $b++;
                            ?>

                        </td>

                        <td class="<?php echo $estilo_linha; ?>" >

                            <a  style="cursor: pointer; color: #f00;" onclick="javascript:window.open('<?= base_url() ?>nutricionista/nutricionista/alterarprodutoprescricao/<?= $item->internacao_precricao_produto_id ?>');">  <?= $item->nome; ?> </a> Formula (<?= $item->classificacao; ?>) 


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
