<div class="content ficha_ceatox"> <!-- Inicio da DIV content -->
    <h3 class="h3_title">Evolução Nutricional</h3>

<form name="form_exame" id="form_exame" action="<?= base_url() ?>nutricionista/nutricionista/gravarevolucaonutricional/<?= $internacao_id ?>" method="post">
    
<? if (count($prescricao) > 0) { ?>
    <br>
    <br>
    
    
    <table>
        <tr>
            <th class="tabela_header">
                Data
            </th>
            <th class="tabela_header">
               
            </th>
            <th class="tabela_header">
                &nbsp;
            </th>
            
            <th class="tabela_header">
               &nbsp;
            </th>
            <th class="tabela_header">&nbsp;</th>
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
            $c=0;

            foreach ($prescricao as $item) {
                $i = $item->etapas;

                $teste = $this->nutricionista->etiquetapacienteclassificacao($item->internacao_precricao_etapa_id);
                
                
//        var_dump($teste);
//        die;
                $classificacaototal = count($teste);
        if ($classificacaototal == 1) {
            $dieta = $teste[0]->classificacao;
        } else {
//                foreach ($teste as $key => $value) :
//                    $verificador++;
//                    if ($item->internacao_precricao_etapa_id == $etapas || $i == 1) {
//                        if ($classificacaototal >= $verificador) {
//                            $dieta = $dieta . " + " . $value->classificacao;
//                        }
//                    }
//
//                endforeach;
}
                if ($item->internacao_precricao_id != $internacao_precricao_id) {
                    $data = substr($item->data, 8, 2) . '/' . substr($item->data, 5, 2) . '/' . substr($item->data, 0, 4);
                    $internacao_precricao_id = $item->internacao_precricao_id;
                    $classificacao = $item->classificacao;

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
                <td class="<?php echo $estilo_linha; ?>"> <?= $data; ?></td>
                <td class="<?php echo $estilo_linha; ?>" style="cursor: pointer;">
                    <input type="text" name="formula[<?=$c?>]" id="formula" class="texto10" value="<?=$data;?> Paciente em  TNE com formula <? echo $classificacao; ?> em BIC <?=$taxadeinfusao?> e VCT <?= $vct ?> Dieta: <?=$i?> Frasco(s) de <?= $item->nome; ?> + <?= $equipo; ?>"/>
                    <a onclick="javascript:window.open('<?= base_url() ?>nutricionista/nutricionista/alterarprodutoprescricao/<?= $item->internacao_precricao_produto_id ?>');">  <?= $item->nome; ?> + </a>
                    
                    
                     </td>
                     <?
                     //Do POST
                     $c++;
                     ?>
                
                <td  class="<?php echo $estilo_linha; ?>" style="cursor: pointer;"><a onclick="javascript:window.open('<?= base_url() ?>nutricionista/nutricionista/alterarprodutoprescricao/<?= $equipo_id ?>');"> <?= $equipo; ?></a>
                
                
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

    $internacao_id = $prescricao[0]->internacao_id;
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