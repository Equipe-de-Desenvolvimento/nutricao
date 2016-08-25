
<?
//Calculos necessários por enquanto
$ano = (int) date("Y");
$nascimento = (int) substr($_POST['txtIdade'], 0, 4);
$idade = $ano - $nascimento;
$cen = (int) $impressao[0]->cen;
?>

<?
if ($cen > 120) {
    $cen1 = 'Obesidade';
} elseif ($cen < 110 && $cen > 90) {
    $cen1 = 'Eutrofia';
} elseif ($cen < 80 && $cen > 70) {
    $cen1 = 'DPC Moderada';
} elseif ($cen < 120 && $cen > 110) {
    $cen1 = 'Sobrepeso';
} elseif ($cen < 90 && $cen > 80) {
    $cen1 = 'DPC Leve';
} else {
    $cen1 = 'DPC grave';
}
?>



<html>
    <head>
        <meta charset="utf-8">
        <link href="<?= base_url() ?>css/tabelarae.css" rel="stylesheet" type="text/css">
        <title>Impressão RAE</title>
    </head>

    <body>
        <table id="tabelaspec" width="92%" border="1" align="center" cellpadding="0" cellspacing="0" class="tipp">
            <tbody>
                <tr>
                    <td width="58" height="51" style="font-size: 9px;"><p class="ttr"><strong style="font-weight: normal; text-align: center;"><strong style="font-weight: normal; text-align: left;"><img src="<?= base_url() ?>img/logofichadeavaliacao.jpg" alt="" width="58" height="49" class="ttr"/></strong></strong></p></td>
                    <td width="127" class="ttrl" style="font-size: 9px;">&nbsp;</td>
                    <td height="51" colspan="4" class="ttrl" style="font-size: 10px; font-weight: normal; text-align: center;"><strong><?echo $empresa[0]->nome;?> <br>
                            <?echo $empresa[0]->razao_social;?><br>
                            <?echo $empresa[0]->logradouro;?> &nbsp;N:&nbsp;<?echo $empresa[0]->numero;?>&nbsp;-<?echo $empresa[0]->bairro;?> <br>
                            Telefone:<?echo $empresa[0]->telefone;?> </strong></td>
                    <td height="51" colspan="2" class="ttl" style="font-size: 15px; font-weight: normal; text-align: right;"><strong></strong></td>
                </tr>
                <tr>
                    <td height="27" colspan="8" align="center" style="text-align: center; font-size: 15px; font-weight: normal;"><strong>FICHA DE AVALIAÇÃO NUTRICIONAL</strong></td>
                </tr>
                <tr>
                    <td colspan="8" align="center" style="text-align:center;font-size: 9px;"><strong> DADOS DE IDENTIFICACÃO</strong></td>
                </tr>

                <tr>
                    <td colspan="6" class="ti">NOME</td>
                    <td colspan="2" class="ti">DATA DE INTERNAÇÃO</td>
                </tr>
                <tr>
                    <td height="16" colspan="6" class="tc"><strong><? echo $paciente[0]->nome; ?></strong></td>
                    <td colspan="2" class="tc"><strong><?$ano= substr($paciente[0]->data_internacao,0,4);?>
                                                            <?$mes= substr($paciente[0]->data_internacao,5,2);?>
                                                            <?$dia= substr($paciente[0]->data_internacao,8,2);?>
                                                            <?$datafinal= $dia . '/' . $mes . '/' . $ano; ?>
                                                            <?php echo$datafinal?></strong></td>
                </tr>
                <tr>
                    <td colspan="6" class="ti">DATA NASCIMENTO</td>
                    <td colspan="2" class="ti">DATA DE SAÍDA</td>
                </tr>
                <tr>
                    <td height="16" colspan="6" class="tc"><strong><?$ano= substr($paciente[0]->nascimento,0,4);?>
                                                            <?$mes= substr($paciente[0]->nascimento,5,2);?>
                                                            <?$dia= substr($paciente[0]->nascimento,8,2);?>
                                                            <?$datafinal= $dia . '/' . $mes . '/' . $ano; ?>
                                                            <?php echo$datafinal?></strong></td>
                    <td colspan="2" class="tc"><strong><?$ano= substr($paciente[0]->data_saida,0,4);?>
                                                            <?$mes= substr($paciente[0]->data_saida,5,2);?>
                                                            <?$dia= substr($paciente[0]->data_saida,8,2);?>
                                                            <?$datafinal= $dia . '/' . $mes . '/' . $ano; ?>
                                                            <?php echo$datafinal?></strong></td>
                </tr>
                <tr>
                    <td colspan="6" class="ti">IDADE</td>
                    <td colspan="2" class="ti">LEITO</td>
                </tr>
                <tr>
                    <td height="16" colspan="6" class="tc"><strong><? echo $idade; ?></strong></td>
                    <td colspan="2" class="tc"><strong><? echo $paciente[0]->leito; ?></strong></td>
                </tr>
                <tr>
                    <td colspan="6" class="ti">HOSPITAL</td>
                    <td colspan="2" class="ti">CONVÊNIO</td>
                </tr>
                <tr>
                    <td height="16" colspan="6" class="tc"><strong>NI</strong></td>
                    <td colspan="2" class="tc"><strong><? echo $paciente[0]->convenio; ?></strong></td>
                </tr>

                <tr>
                    <td colspan="8" align="center" style="text-align:center;font-size: 9px;"><strong> DADOS CLINICOS</strong></td>
                </tr>

                <tr>
                    <td colspan="6" class="ti">DIAGNÓSTICO    </td>
                    <td colspan="2" class="ti">PATOLOGIAS ASSOCIADAS</td>
                </tr>
                <tr>
                    <td height="16" colspan="6" class="tc"><strong><? echo $paciente[0]->diagnostico; ?></strong></td>
                    <td colspan="2" class="tc"><strong>NI  </strong></td>
                </tr>
                <tr>
                    <td colspan="6" class="ti">MÉDICO ASSISTENTE</td>
                    <td colspan="2" class="ti">INICIO DA TNE</td>
                </tr>
                <tr>
                    <td height="16" colspan="6" class="tc"><strong><? echo $paciente[0]->solicitante; ?></strong></td>
                    <td colspan="2" class="tc"><strong><?$ano= substr($paciente[0]->data_solicitacao,0,4);?>
                                                            <?$mes= substr($paciente[0]->data_solicitacao,5,2);?>
                                                            <?$dia= substr($paciente[0]->data_solicitacao,8,2);?>
                                                            <?$datafinal= $dia . '/' . $mes . '/' . $ano; ?>
                                                            <?php echo$datafinal?></strong></td>
                </tr>

                <tr>
                    <td colspan="8" class="ti">TNE:</td>
                </tr>
                <tr>
                    <td height="27" colspan="8" class="tc"><strong>( ) SNG ( ) SNE ( ) Gastrostomia ( ) Jejunostomia ( ) </strong></td>
                </tr>


                <tr>
                    <td colspan="8" align="center" style="text-align:center;font-size: 9px;"><strong> DADOS ANTROPOMÉTRICOS</strong></td>
                </tr>
                <tr>
                    <td height="13" colspan="4" class="ti">PESO ATUAL (KG)</td>
                    <td colspan="2" class="ti">PESO IDEAL</td>
                    <td colspan="2" class="ti">PESO HABITUAL</td>
                </tr>
                <tr>
                    <td height="16" colspan="4" class="tc"><strong><? echo $_POST['txtPeso']; ?>Kg</strong></td>
                    <td colspan="2" class="tc"><strong><? echo (int) ($impressao[0]->peso_ideal) / 1; ?>Kg</strong></td>
                    <td colspan="2" class="tc"><strong>NI </strong></td>
                </tr>
                <tr>
                    <td height="13" colspan="4" class="ti">CIRCUNFERÊNCIA DO BRAÇO (EM Cm)</td>
                    <td colspan="4" class="ti">COMPLEIÇÃO</td>
                </tr>
                <tr>
                    <td height="16" colspan="4" class="tc"><strong><? echo $_POST['txtCB']; ?>cm</strong></td>
                    <td colspan="4" class="tc"><strong>NI</strong></td>
                </tr>

                <tr>
                    <td colspan="3" class="ti"><em class="ti" style="font-size: 7pt">ALTURA DO JOELHO</em></td>
                    <td width="331" class="ti"><em>ALTURA </em></td>
                    <td colspan="2" class="ti"><em>IMC</em><em></em></td>
                    <td colspan="2" class="ti">PANTURRILHA</td>
                </tr>
                <tr>
                    <td colspan="3" class="tc"><strong><? echo $_POST['txtAlturaPerna']; ?>cm</strong></td>
                    <td class="tc"><strong><? echo (int) ($impressao[0]->altura_estimada) / 100; ?>m</strong></td>
                    <td colspan="2" class="tc"><strong><? echo $impressao[0]->imc; ?>Kg/m²</strong><strong></strong></td>
                    <td colspan="2" class="tc"><strong>NI</strong></td>
                </tr>

                <tr>
                    <td colspan="8" align="center" style="text-align:center;font-size: 9px;"><strong> DIAGNÓSTICO NUTRICIONAL E CONDUTA DIETOTERÁPICA</strong></td>
                </tr>
                <tr>
                    <td colspan="8" class="ti">DIAGNÓSTICO</td>
                </tr>
                <tr>
                    <td height="50" colspan="8" class="tc">Paciente com diagnóstico nutricional de <strong><? echo $cen1; ?></strong> conforme percentual de adequação da CB.
                        <br>
                        Segue com necessidades nutricionais de <strong><? echo $impressao[0]->get; ?></strong> Kcal.
                        <br>
                        <strong>    CD: Evoluir até atingir necessidade de acordo com tolerância do paciente.
                        </strong>
                    </td>


                </tr>


<? if ($_POST['txtSexo'] == 'M') { ?>
    <? if ($_POST['txtEtnia'] == 1) { ?>
                        <tr bgcolor="#96D783">
                            <td colspan="8" style="text-align: center">HOMEM BRANCO</td>
                        </tr>
                        <tr>

                            <td rowspan="2" style="text-align: center"><? echo $_POST['txtAlturaPerna']; ?> * 1,19</td>
                            <td rowspan="2" style="text-align: center">+</td>

                            <td  rowspan="2" style="text-align: center"><? echo $_POST['txtCB']; ?> * 3,21</td>
                            <td  rowspan="2" style="text-align: center">-</td>
                            <td  rowspan="2" style="text-align: center">86,82</td>
                            <td  rowspan="2" style="text-align: center">=</td>
                            <td  rowspan="2" style="text-align: center"><? echo $impressao[0]->dncd; ?></td>
                        </tr>
                        <tr>
                            <td height="23" style="text-align: center">&nbsp;</td>

                        </tr>
    <? } else {
        ?>
                        <tr>
                            <td bgcolor="#96D783" colspan="8" style="text-align: center">HOMEM NEGRO</td>
                        </tr>
                        <tr>
                            <td  rowspan="2" style="text-align: center"><? echo $_POST['txtAlturaPerna']; ?> * 1,09</td>
                            <td rowspan="2" style="text-align: center">+</td>
                            <td  rowspan="2" style="text-align: center"><? echo $_POST['txtCB']; ?> * 3,14</td>
                            <td  rowspan="2" style="text-align: center">-</td>
                            <td  rowspan="2" style="text-align: center">83,72</td>
                            <td  rowspan="2" style="text-align: center">=</td>
                            <td  rowspan="2" style="text-align: center"><? echo $impressao[0]->dncd; ?></td>
                        </tr>
                        <tr>
                            <td height="23" style="text-align: center">&nbsp;</td>

                        </tr>
    <? } ?>
<? } else {
    ?>
    <? if ($_POST['txtEtnia'] == 1) { ?>
                        <tr bgcolor="#96D783">
                            <td colspan="8" style="text-align: center">MULHER BRANCA</td>
                        </tr>
                        <tr>

                            <td rowspan="2" style="text-align: center"><? echo $_POST['txtAlturaPerna']; ?> * 1,01</td>
                            <td rowspan="2" style="text-align: center">+</td>

                            <td  rowspan="2" style="text-align: center"><? echo $_POST['txtCB']; ?> * 2,81</td>
                            <td  rowspan="2" style="text-align: center">-</td>
                            <td  rowspan="2" style="text-align: center">66,04</td>
                            <td  rowspan="2" style="text-align: center">=</td>
                            <td  rowspan="2" style="text-align: center"><? echo $impressao[0]->dncd; ?></td>
                        </tr>
                        <tr>
                            <td height="23" style="text-align: center">&nbsp;</td>

                        </tr>
    <? } else {
        ?>
                        <tr>
                            <td bgcolor="#96D783" colspan="8" style="text-align: center">MULHER NEGRA</td>
                        </tr>
                        <tr>
                            <td  rowspan="2" style="text-align: center"><? echo $_POST['txtAlturaPerna']; ?> * 1,24</td>
                            <td  rowspan="2" style="text-align: center">+</td>
                            <td  rowspan="2" style="text-align: center"><? echo $_POST['txtCB']; ?> * 2,81</td>
                            <td  rowspan="2" style="text-align: center">-</td>
                            <td  rowspan="2" style="text-align: center">82,48</td>
                            <td  rowspan="2" style="text-align: center">=</td>
                            <td  rowspan="2" style="text-align: center"><? echo $impressao[0]->dncd; ?></td>
                        </tr>
                        <tr>
                            <td height="23" style="text-align: center">&nbsp;</td>

                        </tr>
    <? } ?>

<? } ?>
            </tbody>
        </table>
    </body>
</html>