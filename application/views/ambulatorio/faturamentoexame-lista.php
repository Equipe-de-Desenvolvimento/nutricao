
<div class="content"> <!-- Inicio da DIV content -->
    <div id="accordion">
        <link href="<?= base_url() ?>css/form.css" rel="stylesheet" type="text/css" />
        <? $tipoempresa = ""; ?>
        <table>
            <thead>

                <? if (count($empresa) > 0) { ?>
                    <tr>
                        <th style='text-align: left; font-family: serif; font-size: 12pt;' colspan="7"><?= $empresa[0]->razao_social; ?></th>
                    </tr>
                    <?
                    $tipoempresa = $empresa[0]->razao_social;
                } else {
                    ?>
                    <tr>
                        <th style='text-align: left; font-family: serif; font-size: 12pt;' colspan="7">TODAS AS CLINICAS</th>
                    </tr>
                    <?
                    $tipoempresa = 'TODAS';
                }
                ?>
                <tr>
                    <th style='text-align: left; font-family: serif; font-size: 12pt;' colspan="7">FATURAMENTO POR PER&Iacute;ODO DE COMPET&Ecirc;NCIA</th>
                </tr>
                <tr>
                    <th style='width:10pt;border:solid windowtext 1.0pt;
                        border-bottom:none;mso-border-top-alt:none;border-left:
                        none;border-right:none;' colspan="8">&nbsp;</th>
                </tr>
                <tr>
                    <th style='text-align: left; font-family: serif; font-size: 12pt;' colspan="7">EMPRESA: <?= $tipoempresa ?></th>
                </tr>

                <? if ($convenio == "0") { ?>
                    <tr>
                        <th style='text-align: left; font-family: serif; font-size: 12pt;' colspan="7">CONVENIO:TODOS OS CONVENIOS</th>
                    </tr>
                <? } elseif ($convenio == "-1") { ?>
                    <tr>
                        <th style='text-align: left; font-family: serif; font-size: 12pt;' colspan="7">CONVENIO:PARTICULARES</th>
                    </tr>
                <? } elseif ($convenio == "") { ?>
                    <tr>
                        <th style='text-align: left; font-family: serif; font-size: 12pt;' colspan="7">CONVENIO: CONVENIOS</th>
                    </tr>
                <? } else { ?>
                    <tr>
                        <th style='text-align: left; font-family: serif; font-size: 12pt;' colspan="7">CONVENIO: <?= $convenios[0]->nome; ?></th>
                    </tr>
                <? } ?>

                <tr>
                    <th style='text-align: left; font-family: serif; font-size: 12pt;' colspan="7">PERIODO: <?= $txtdata_inicio; ?> ate <?= $txtdata_fim; ?></th>
                </tr>
                <tr>
                    <th style='width:10pt;border:solid windowtext 1.0pt;
                        border-bottom:none;mso-border-top-alt:none;border-left:
                        none;border-right:none;' colspan="8">&nbsp;</th>
                </tr>

            <thead>
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
                        Codigo
                    </th>
                    <th class="tabela_header">
                        Volume
                    </th>

                    <th class="tabela_header">
                        Vazão
                    </th>
                    <th colspan="3"><center>A&ccedil;&otilde;es</center></th>
            </tr>
            <tr>
                <th style='width:10pt;border:solid windowtext 1.0pt;
                    border-bottom:none;mso-border-top-alt:none;border-left:
                    none;border-right:none;' colspan="8">&nbsp;</th>
            </tr>
            </thead>
            <?php
            $financeiro = 'f';
            $valortotal = 0;
            $faturado = 0;
            $pendente = 0;
            $guia = "";
            $total = count($listar);
//                $consulta = $this->exame->listarguiafaturamento($_GET);
//                $total = $consulta->count_all_results();
            if (count($listar) > 0) {
                ?>
                <tbody>
                    <?php
                    foreach ($listar as $item) {

                        ?>
                        <tr>
                            <td ><?= $item->data; ?></td>
                            <td ><?= $item->etapas; ?></td>
                            <td ><?= $item->nome; ?></td>
                            <td class="<?php echo $estilo_linha; ?>"><?= $item->volume; ?></td>
                            <td class="<?php echo $estilo_linha; ?>"><?= $item->vasao; ?></td>
                            <td><font color="green"><?= $item->paciente; ?></td>
                                <td width="40px;"><div class="bt_link">
                                        <a onclick="javascript:window.open('<?= base_url() . "ambulatorio/guia/faturarconvenio/" . $item->internacao_precricao_id; ?> ', '_blank', 'toolbar=no,Location=no,menubar=no,width=600,height=250');">Faturar
                                        </a></div>
                                </td>
                            <td width="40px;"><div class="bt_link_new">
                                    <a onclick="javascript:window.open('<?= base_url() ?>ambulatorio/exame/faturarguia/<?= $item->internacao_precricao_id;?>');" >
                                        Faturar guia</a></div>
                            </td>
                            <td width="50px;"><div class="bt_link">
                                    <a href="<?= base_url() ?>ambulatorio/exame/impressaospsadt/<?= $internacao_id ?>" >
                                        Imprimir</a></div>
                            </td>
                        </tr>

                    </tbody>
                    <?php
                }
            }
            ?>

            <tfoot>
                <tr>
                    <th colspan="2" >
                        Registros: <?php echo $total; ?>
                    </th>
                    <th colspan="3" >
                        Valor Total: <?php echo number_format($valortotal, 2, ',', '.'); ?>
                    </th>
                    <? if ($faturado == 0 && $financeiro == 'f' && $convenios != 0) { ?>
                <form name="form_caixa" id="form_caixa" action="<?= base_url() ?>ambulatorio/exame/fecharfinanceiro" method="post">
                    <input type="hidden" class="texto3" name="dinheiro" value="<?= number_format($valortotal, 2, ',', '.'); ?>" readonly/>
                    <input type="hidden" class="texto3" name="relacao" value="<?= $convenios[0]->credor_devedor_id; ?>"/>
                    <input type="hidden" class="texto3" name="conta" value="<?= $convenios[0]->conta_id; ?>"/>
                    <input type="hidden" class="texto3" name="data1" value="<?= $txtdata_inicio; ?>"/>
                    <input type="hidden" class="texto3" name="data2" value="<?= $txtdata_fim; ?>"/>
                    <input type="hidden" class="texto3" name="convenio" value="<?= $convenio; ?>"/>
                    <th colspan="3" align="center"><center>
                        <button type="submit" name="btnEnviar">Financeiro</button></center></th>
                </form>
            <? } else { ?>
                <th colspan="3" >PENDENTE DE FATURAMENTO
                </th>
            <? } ?>
            </tr>
            </tfoot>

        </table>
        <br>
        <table border="1">
            <tr>
                <td bgcolor="c60000" width="4px;"></td>
                <td width="40px;">&nbsp;Em Aberto</td>
                <td bgcolor="green" width="4px;"></td>
                <td width="40px;">&nbsp;Faturado</td>
            </tr>
        </table>
    </div>

</div> <!-- Final da DIV content -->
<script type="text/javascript" src="<?= base_url() ?>js/scripts.js" ></script>
<script type="text/javascript">


</script>

