<div class="content ficha_ceatox"> <!-- Inicio da DIV content -->
    <h3 class="h3_title">Prescri&ccedil;&atilde;o</h3>
    <form name="form_exame" id="form_exame" action="<?= base_url() ?>internacao/internacao/gravarprescricaoenteralemergencial/<?= $internacao_id ?>" method="post">
        <fieldset>
            <legend>Dados do Pacienete</legend>
            <div>
                <label>Nome</label>                      
                <input type="text" id="txtNome" name="nome"  class="texto09" value="<?= $paciente['0']->nome; ?>" readonly/>
            </div>
            <div>
                <label>Nascimento</label>
                <input type="text" name="nascimento" id="txtNascimento" class="texto02" alt="date" value="<?php echo substr($paciente['0']->nascimento, 8, 2) . '/' . substr($paciente['0']->nascimento, 5, 2) . '/' . substr($paciente['0']->nascimento, 0, 4); ?>" onblur="retornaIdade()" readonly/>
            </div>

            <div>
                <label>Nome da M&atilde;e</label>
                <input type="text" name="nome_mae" id="txtNomeMae" class="texto08" value="<?= $paciente['0']->nome_mae; ?>" readonly/>
            </div>
            <div>
                <label>Nome do Pai</label>
                <input type="text"  name="nome_pai" id="txtNomePai" class="texto08" value="<?= $paciente['0']->nome_pai; ?>" readonly/>
            </div>
            <div>
                <label>CNS</label>
                <input type="text" id="txtCns" name="cns"  class="texto04" value="<?= $paciente['0']->cns; ?>" readonly/>
            </div>

        </fieldset>
        <fieldset>
            <legend>ETAPAS</legend>
            <table>
                <tr>
                    <td>
                        <select name="etapas" id="etapas" class="size1" >
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                        </select>
                    </td>

                </tr>

            </table>
        </fieldset>
        <fieldset>
            <legend>PRODUTOS</legend>

            <!-- Início da tabela de Infusão de Drogas -->
            <table id="table_infusao_drogas" border="0">
                <thead>
                    <tr>
                        <td>Produto</td>
                        <td>Volume</td>
                        <td>Vazão</td>
                        <td>&nbsp;</td>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <td colspan="3">
                            <div class="bt_link_new mini_bt">
                                <a href="#" id="plusInfusao">Adicionar Ítem</a>
                            </div>
                        </td>
                    </tr>
                </tfoot>

                <tbody>
                    <tr class="linha1">
                        <td>
                            <select  name="produto[1]" class="size4" >
                                <option value="-1">Selecione</option>
                                <? foreach ($enteral as $item) : ?>
                                    <option value="<?= $item->procedimento_convenio_id; ?>"><?= $item->nome; ?></option>
                                <? endforeach; ?>
                            </select>
                        </td>
                        <td><input type="text" name="volume[1]" class="size1" /></td>
                        </td>
                        <td><input type="text" name="vazao[1]" class="size1" /></td>
                        <td>
                            <a href="#" class="delete">Excluir</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- Fim da tabela de Infusão de Drogas -->
        </fieldset>
        <fieldset>
            <legend>EQUIPO</legend>
            <table>
                <tr>
                    <td>
                        <select name="equipo" id="equipo" class="size4">
                            <option>Selecione</option>
                            <? foreach ($equipo as $item) : ?>
                                <option value="<?= $item->procedimento_convenio_id; ?>"><?= $item->nome; ?></option>
                            <? endforeach; ?>
                        </select>
                    </td>
                </tr>

            </table>
        </fieldset>




        <hr/>
        <button type="submit" name="btnEnviar">Enviar</button>
        <button type="reset" name="btnLimpar">Limpar</button>
        <button type="button" id="btnVoltar" name="btnVoltar">Voltar</button>
    </form>





</table>
<? if (count($prescricao) > 0) { ?>
    <br>
    <br>
    <hr/>
    <table>
        <tr>
            <th class="tabela_header">
                qtde
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
            <th class="tabela_header">&nbsp;</th>
        </tr>
        <tr>
            <?
            $etapas = "";

            $estilo_linha = "tabela_content01";
            foreach ($prescricao as $item) {
                $i = $item->etapas;

                if ($item->internacao_precricao_etapa_id == $etapas) {
                    $i = '&nbsp;';
                    ($estilo_linha == "tabela_content01") ? $estilo_linha = "tabela_content01" : $estilo_linha = "tabela_content02";
                } else {
                    ($estilo_linha == "tabela_content01") ? $estilo_linha = "tabela_content02" : $estilo_linha = "tabela_content01";
                }
                ?>
            <tr>
                <td class="<?php echo $estilo_linha; ?>"><?= $i; ?></td>
                <td class="<?php echo $estilo_linha; ?>"><?= $item->nome; ?></td>
                <td class="<?php echo $estilo_linha; ?>"><?= $item->volume; ?></td>
                <td class="<?php echo $estilo_linha; ?>"><?= $item->vasao; ?></td>
                <td ><div class="bt_link">
                        <a href="<?= base_url() ?>internacao/internacao/excluiritemprescicao/<?= $item->internacao_precricao_produto_id; ?>/<?= $internacao_id; ?>">EXCLUIR

                        </a></div>
                </td>
            </tr>
            <?
            $i++;
            $etapas = $item->internacao_precricao_etapa_id;
        }
        ?>
        </tr>

    </table>
<? } ?>



</div> 
<link rel="stylesheet" href="<?= base_url() ?>css/jquery-ui-1.8.5.custom.css">
<script type="text/javascript" src="<?= base_url() ?>js/jquery-1.9.1.js" ></script>
<script type="text/javascript" src="<?= base_url() ?>js/jquery-ui-1.10.4.js" ></script>
<script type="text/javascript" src="<?= base_url() ?>js/jquery.validate.js"></script>
<script type="text/javascript">

                    var idlinha = 2;
                    var classe = 2;

                    $(document).ready(function() {

                        $('#plusInfusao').click(function() {

                            var linha = "<tr class='linha" + classe + "'>";
                            linha += "<td>";
                            linha += "<select  name='produto[" + idlinha + "]' class='size4'>";
                            linha += "<option value='-1'>Selecione</option>";

<?
foreach ($enteral as $item) {
    echo 'linha += "<option value=\'' . $item->procedimento_convenio_id . '\'>' . $item->nome . '</option>";';
}
?>

                            linha += "</select>";
                            linha += "</td>";
                            linha += "<td><input type='text' name='volume[" + idlinha + "]' class='size1' /></td>";
                            linha += "<td><input type='text' name='vazao[" + idlinha + "]' class='size1' /></td>";
                            linha += "<td>";
                            linha += "<a href='#' class='delete'>Excluir</a>";
                            linha += "</td>";
                            linha += "</tr>";

                            idlinha++;
                            classe = (classe == 1) ? 2 : 1;
                            $('#table_infusao_drogas').append(linha);
                            addRemove();
                            return false;
                        });

                        $('#plusObs').click(function() {
                            var linha2 = '';
                            idlinha2 = 0;
                            classe2 = 1;

                            linha2 += '<tr class="classe2"><td>';
                            linha2 += '<input type="text" name="DataObs[' + idlinha2 + ']" />';
                            linha2 += '</td><td>';
                            linha2 += '<input type="text" name="DataObs[' + idlinha2 + ']" />';
                            linha2 += '</td><td>';
                            linha2 += '<input type="text" name="DataObs[' + idlinha2 + ']" class="size4" />';
                            linha2 += '</td><td>';
                            linha2 += '<a href="#" class="delete">X</a>';
                            linha2 += '</td></tr>';

                            idlinha2++;
                            classe2 = (classe2 == 1) ? 2 : 1;
                            $('#table_obsserv').append(linha2);
                            addRemove();
                            return false;
                        });

                        function addRemove() {
                            $('.delete').click(function() {
                                $(this).parent().parent().remove();
                                return false;
                            });

                        }
                    });

</script>