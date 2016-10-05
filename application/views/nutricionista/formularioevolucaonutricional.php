<div class="content ficha_ceatox"> <!-- Inicio da DIV content -->
    <h3 class="h3_title">Evolução Nutricional</h3>

</table>
<? if (count($prescricao) > 0) { ?>
    <br>
    <br>
    <hr/>
    <table>
        <tr>
            <th class="tabela_header">
                Prescricao
            </th>
            <th class="tabela_header">
                Etapas
            </th>
            <th class="tabela_header">
                Produto
            </th>
            <th class="tabela_header">
                Volume
            </th>
            <th class="tabela_header">
                Vazão
            </th>
            <th class="tabela_header">
                Equipo
            </th>
            <th class="tabela_header">&nbsp;</th>
        </tr>
        <tr>
            <?
            $etapas = "";
            $internacao_precricao_id = "";
            $estilo_linha = "tabela_content01";
            $contador = 0;

            foreach ($prescricao as $item) {
                $i = $item->etapas;

                if ($item->internacao_precricao_id != $internacao_precricao_id) {
                    $data = substr($item->data, 8, 2) . '/' . substr($item->data, 5, 2) . '/' . substr($item->data, 0, 4);
                    $internacao_precricao_id = $item->internacao_precricao_id;
                    foreach ($prescricaoequipo as $value) {
                        if ($value->internacao_precricao_id == $item->internacao_precricao_id) {
                            $equipo = $value->nome;
                            $equipo_id = $value->internacao_precricao_produto_id;
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
                <td class="<?php echo $estilo_linha; ?>"><?= $data; ?></td>
                <td class="<?php echo $estilo_linha; ?>"><?= $i; ?></td>
                <td class="<?php echo $estilo_linha; ?>" style="cursor: pointer;"><a onclick="javascript:window.open('<?= base_url() ?>nutricionista/nutricionista/alterarprodutoprescricao/<?= $item->internacao_precricao_produto_id ?>');"> <?= $item->nome; ?></a></td>
                <td class="<?php echo $estilo_linha; ?>"><?= $item->volume; ?></td>
                <td class="<?php echo $estilo_linha; ?>"><?= $item->vasao; ?></td>
                <td  class="<?php echo $estilo_linha; ?>" style="cursor: pointer;"><a onclick="javascript:window.open('<?= base_url() ?>nutricionista/nutricionista/alterarprodutoprescricao/<?= $equipo_id ?>');"> <?= $equipo; ?></a> </td>
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
        </tr>
    <? } 
    
    $internacao_id= $prescricao[0]->internacao_id;
    ?>
</table>

    <form name="form_exame" id="form_exame" action="<?= base_url() ?>nutricionista/nutricionista/impressaoevolucaonutricional/<?=$internacao_id?>" method="post">
        <fieldset>
            <legend>Nutricionista</legend>
            <div>
                                  
                <input type="hidden" id="txtinternacao" name="internacao_id"  class="texto06" value="<?=$internacao_id?>" readonly/>
            </div>
            <div>
                                  
                <input type="hidden" id="txtdata_fim" name="txtdata_fim"  class="texto06" value="<?= $_POST['txtdata_fim']?>" readonly/>
            </div>
            <div>
                                  
                <input type="hidden" id="txtdata_inicio" name="txtdata_inicio"  class="texto06" value="<?= $_POST['txtdata_inicio']?>" readonly/>
            </div>
            <div>
                <label>Nome</label>                      
                <input type="text" id="nutricionista" name="nutricionista"  class="texto05" value="" />
            </div>
            
             
           

        </fieldset>
        
        
       
       
        


        <hr/>
        <button type="submit" name="btnEnviar">Enviar</button>

    </form>
    
</div> 


         

<!--<div class="bt_link_new">
    <a id="finalizar"  href="<?= base_url() ?>internacao/internacao/finalizarprescricaoenteralnormal/<?= $internacao_id; ?>">Finalizar Prescricao

    </a></div>-->



</div> 
<link rel="stylesheet" href="<?= base_url() ?>css/jquery-ui-1.8.5.custom.css">
<script type="text/javascript" src="<?= base_url() ?>js/jquery-1.4.2.min.js" ></script>
<script type="text/javascript" src="<?= base_url() ?>js/jquery-1.9.1.js" ></script>
<script type="text/javascript" src="<?= base_url() ?>js/jquery-ui-1.10.4.js" ></script>
<script type="text/javascript" src="<?= base_url() ?>js/jquery.validate.js"></script>