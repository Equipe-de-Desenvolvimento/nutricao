<?
//Calculos necessários por enquanto
$ano = (int) date("Y");
$nascimento = (int) substr($impressao[0]->nascimento, 0, 4);
$idade = $ano - $nascimento;
$cen = (int) $impressao[0]->cen;
?>
<?
// Calculos para o Diagnostico Nutricional na parte inferior
$mulhern = ((int) $impressao[0]->altura_perna * 1.24) + ((int) $impressao[0]->cb * 2.81) - 82.48;
$mulherb = ((int) $impressao[0]->altura_perna * 1.01) + ((int) $impressao[0]->cb * 2.81) - 66.04;
$homemn = ((int) $impressao[0]->altura_perna * 1.09) + ((int) $impressao[0]->cb * 3.14) - 83.72;
$homemb = ((int) $impressao[0]->altura_perna * 1.19) + ((int) $impressao[0]->cb * 3.21) - 86.82;
?>
<?
if ($idade > 60) {
    if ($impressao[0]->panturrilha != '') {
        if ($impressao[0]->panturrilha <= 31) {
            $panturrilha = 'Desnutrição';
        } else {
            $panturrilha = 'Eutrofia';
        }
    }
    else {
       $panturrilha = ''; 
    }
} else {
    $panturrilha = '';
}
?>


<html>
    <head>
        <meta charset="utf-8">
        <link href="<?= base_url() ?>css/tabelarae.css" rel="stylesheet" type="text/css">
        <title>Impressão Ficha de Avaliação</title>
    </head>

    <body>
        <table id="tabelaspec" width="92%" border="1" align="center" cellpadding="0" cellspacing="0" class="tipp">
            <tbody>
                <tr>
                    <td width="58" height="51" style="font-size: 9px;"><p class="ttr"><strong style="font-weight: normal; text-align: center;"><strong style="font-weight: normal; text-align: left;"><img src="<?= base_url() ?>img/logofichadeavaliacao.jpg" alt="" width="58" height="49" class="ttr"/></strong></strong></p></td>
                    <td width="127" class="ttrl" style="font-size: 9px;">&nbsp;</td>
                    <td height="51" colspan="4" class="ttrl" style="font-size: 10px; font-weight: normal; text-align: center;"><strong><? echo $empresa[0]->nome; ?> <br>
<? echo $empresa[0]->razao_social; ?><br>
                            <? echo $empresa[0]->logradouro; ?> &nbsp;N:&nbsp;<? echo $empresa[0]->numero; ?>&nbsp;-<? echo $empresa[0]->bairro; ?> <br>
                            Telefone:<? echo $empresa[0]->telefone; ?> </strong></td>
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
                    <td height="16" colspan="6" class="tc"><strong><? echo $impressao[0]->nome; ?></strong></td>
                    <td colspan="2" class="tc"><strong><? $ano = substr($impressao[0]->data_internacao, 0, 4); ?>
<? $mes = substr($impressao[0]->data_internacao, 5, 2); ?>
                            <? $dia = substr($impressao[0]->data_internacao, 8, 2); ?>
                            <? $datafinal = $dia . '/' . $mes . '/' . $ano; ?>
                            <?php echo$datafinal ?></strong></td>
                </tr>
                <tr>
                    <td colspan="6" class="ti">DATA NASCIMENTO</td>
                    <td colspan="2" class="ti">DATA DE SAÍDA</td>
                </tr>
                <tr>
                    <td height="16" colspan="6" class="tc"><strong><? $ano = substr($impressao[0]->nascimento, 0, 4); ?>
<? $mes = substr($impressao[0]->nascimento, 5, 2); ?>
                            <? $dia = substr($impressao[0]->nascimento, 8, 2); ?>
                            <? $datafinal = $dia . '/' . $mes . '/' . $ano; ?>
                            <?php echo$datafinal ?></strong></td>
                    <td colspan="2" class="tc"><strong><? $ano = substr($impressao[0]->data_saida, 0, 4); ?>
                            <? $mes = substr($impressao[0]->data_saida, 5, 2); ?>
                            <? $dia = substr($impressao[0]->data_saida, 8, 2); ?>
                            <? $datafinal = $dia . '/' . $mes . '/' . $ano; ?>
                            <?php echo$datafinal ?></strong></td>
                </tr>
                <tr>
                    <td colspan="6" class="ti">IDADE</td>
                    <td colspan="2" class="ti">LEITO</td>
                </tr>
                <tr>
                    <td height="16" colspan="6" class="tc"><strong><? echo $idade; ?></strong></td>
                    <td colspan="2" class="tc"><strong><? echo $impressao[0]->leito; ?></strong></td>
                </tr>
                <tr>
                    <td colspan="6" class="ti">HOSPITAL</td>
                    <td colspan="2" class="ti">CONVÊNIO</td>
                </tr>
                <tr>
                    <td height="16" colspan="6" class="tc"><strong><? echo $impressao[0]->hospital; ?></strong></td>
                    <td colspan="2" class="tc"><strong><? echo $impressao[0]->convenio; ?></strong></td>
                </tr>
                <tr>
                    <td colspan="6" class="ti">DATA DA PRIMEIRA AVALIAÇÃO</td>
                    <td colspan="2" class="ti">DATA DA REAVALIAÇÃO</td>
                </tr>
                <tr>
                    <td height="16" colspan="6" class="tc"><strong>
<? echo $primeira = substr($primeira->data_cadastro, 8, 2) . '/' . substr($primeira->data_cadastro, 5, 2) . '/' . substr($primeira->data_cadastro, 0, 4); ?>
                        </strong></td>
                    <td colspan="2" class="tc"><strong><? $ano = substr($impressao[0]->data_cadastro, 0, 4); ?>
<? $mes = substr($impressao[0]->data_cadastro, 5, 2); ?>
                            <? $dia = substr($impressao[0]->data_cadastro, 8, 2); ?>
                            <? $datafinal = $dia . '/' . $mes . '/' . $ano; ?>
                            <?php echo$datafinal ?></strong></td>
                </tr>

                <tr>
                    <td colspan="8" align="center" style="text-align:center;font-size: 9px;"><strong> DADOS CLINICOS</strong></td>
                </tr>

                <tr>
                    <td colspan="6" class="ti">DIAGNÓSTICO    </td>
                    <td colspan="2" class="ti">PATOLOGIAS ASSOCIADAS</td>
                </tr>
                <tr>
                    <td height="16" colspan="6" class="tc"><strong><? echo $impressao[0]->diagnostico; ?></strong></td>
                    <td colspan="2" class="tc"><strong><? echo $impressao[0]->patologias_associadas; ?>  </strong></td>
                </tr>
                <tr>
                    <td colspan="6" class="ti">MÉDICO ASSISTENTE</td>
                    <td colspan="2" class="ti">INICIO DA TNE</td>
                </tr>
                <tr>
                    <td height="16" colspan="6" class="tc"><strong><? echo $impressao[0]->solicitante; ?></strong></td>
                    <td colspan="2" class="tc"><strong><? $ano = substr($impressao[0]->data_solicitacao, 0, 4); ?>
<? $mes = substr($impressao[0]->data_solicitacao, 5, 2); ?>
                            <? $dia = substr($impressao[0]->data_solicitacao, 8, 2); ?>
                            <? $datafinal = $dia . '/' . $mes . '/' . $ano; ?>
                            <?php echo$datafinal ?></strong></td>
                </tr>
                <tr>
                    <td colspan="8" class="ti">TNE:</td>
                </tr>
<? if ($impressao[0]->tne == 'SNG') { ?>
                    <tr>
                        <td height="27" colspan="8" class="tc"><strong> SNG (x ) SNE ( ) Gastrostomia ( ) Jejunostomia ( ) </strong></td>
                    </tr>
<? } elseif ($impressao[0]->tne == 'SNE') {
    ?>
                    <tr>
                        <td height="27" colspan="8" class="tc"><strong> SNG ( ) SNE (x ) Gastrostomia ( ) Jejunostomia ( ) </strong></td>
                    </tr>
<? } elseif ($impressao[0]->tne == 'Gastrostomia') {
    ?>
                    <tr>
                        <td height="27" colspan="8" class="tc"><strong> SNG ( ) SNE ( ) Gastrostomia ( X) Jejunostomia ( ) </strong></td>
                    </tr>
<? } elseif ($impressao[0]->tne == 'Jejunostomia') {
    ?>
                    <tr>
                        <td height="27" colspan="8" class="tc"><strong> SNG ( ) SNE ( ) Gastrostomia ( ) Jejunostomia (X ) </strong></td>
                    </tr>
<? } ?>

                <tr>
                    <td colspan="8" align="center" style="text-align:center;font-size: 9px;"><strong> DADOS ANTROPOMÉTRICOS</strong></td>
                </tr>
                <tr>
                    <td height="13" colspan="4" class="ti">PESO ATUAL (KG)</td>
                    <td colspan="2" class="ti">PESO IDEAL</td>
                    <td colspan="2" class="ti">PESO HABITUAL</td>
                </tr>
                <tr>
                    <td height="16" colspan="4" class="tc"><strong><? if ($impressao[0]->peso_atual != '') {
    echo ($impressao[0]->peso_atual) / 1 . 'Kg';
} ?></strong></td>
                    <td colspan="2" class="tc"><strong><? echo substr(($impressao[0]->peso_ideal),0,5); ?>Kg</strong></td>
                    <td colspan="2" class="tc"><strong><? if ($impressao[0]->peso_habitual != '') {
    echo (int) ($impressao[0]->peso_habitual) / 1 . 'Kg';
} ?> </strong></td>
                </tr>
                <tr>
                    <td height="13" colspan="4" class="ti">CIRCUNFERÊNCIA DO BRAÇO (EM Cm)</td>
                    <td colspan="4" class="ti">COMPLEIÇÃO</td>
                </tr>
                <tr>
                    <td height="16" colspan="4" class="tc"><strong><? echo $impressao[0]->cb; ?>cm</strong></td>
                    <td colspan="4" class="tc"><strong><? echo $impressao[0]->compleicao; ?></strong></td>
                </tr>

                <tr>
                    <td colspan="3" class="ti"><em class="ti" style="font-size: 7pt">ALTURA DO JOELHO</em></td>
                    <td width="331" class="ti"><em>ALTURA </em></td>
                    <td colspan="2" class="ti"><em>IMC</em><em></em></td>
                    <td colspan="2" class="ti">PANTURRILHA</td>
                </tr>
                <tr>
                    <td colspan="3" class="tc"><strong><? echo $impressao[0]->altura_perna; ?>cm</strong></td>
                    <td class="tc"><strong><? echo (int) ($impressao[0]->altura_estimada) / 100; ?>m</strong></td>
                    <td colspan="2" class="tc"><strong><? if ($impressao[0]->imc != '') {
    echo $impressao[0]->imc . 'Kg/m²';
} ?></strong><strong></strong></td>
                    <td colspan="2" class="tc"><strong><? echo $panturrilha ?></strong></td>
                </tr>
                <tr>
                    <td height="14" colspan="8" align="center" style="text-align:center;font-size: 9px;"><strong style="text-transform: uppercase;"> Circunferência Braquial(CB cm): Valores de normalidade(De frisancho,1981)</strong></td>
                </tr>

                <tr>
                    <td colspan="2" rowspan="2" align="center" class="tm" ><em>Idade (Anos)</em><em></em></td>
                    <td height="22" colspan="3" class="tm"><em>Homens</em></td>
                    <td colspan="3" class="tm">Mulheres</td>

                </tr>

                <tr>
                    <td width="93" height="20" class="ticb"><span style="font-size: 10px" >5</span></td>
                    <td width="225" class="tm"><em>50</em></td>
                    <td class="ticb">95</td>
                    <td class="ticb">5</td>
                    <td class="tm">50</td>
                    <td class="ticb">95</td>

                </tr>

                <tr>
                    <td height="20" colspan="2" class="tm"><em>19 - 24,9</em></td>
                    <td width="93" class="ticb">26,2</td>
                    <td width="225" class="tm"><em>30,8</em></td>
                    <td class="ticb">37,2</td>
                    <td class="ticb"><em>22,1</em></td>
                    <td class="tm">26,5</td>
                    <td class="ticb">34,5</td>
                </tr>

                <tr>
                    <td height="20" colspan="2" class="tm"><em>25 - 34,9</em></td>
                    <td width="93" class="ticb">27,1</td>
                    <td width="225" class="tm">31,9</td>
                    <td class="ticb">37,5</td>
                    <td class="ticb"><em>23,3</em></td>
                    <td class="tm">27,7</td>
                    <td class="ticb">36,8</td>
                </tr>

                <tr>
                    <td height="20" colspan="2" class="tm"><em>35 - 44,9</em></td>
                    <td width="93" class="ticb">27,8</td>
                    <td width="225" class="tm">32,6</td>
                    <td class="ticb">37,4</td>
                    <td class="ticb"><em>24,1</em></td>
                    <td class="tm">29</td>
                    <td class="ticb">37,8</td>
                </tr>
                <tr>
                    <td height="20" colspan="2" class="tm"><em>45 - 54,9</em></td>
                    <td width="93" class="ticb">26,7</td>
                    <td width="225" class="tm">32,2</td>
                    <td class="ticb">37,6</td>
                    <td class="ticb"><em>24,2</em></td>
                    <td class="tm">29,9</td>
                    <td class="ticb">38,4</td>
                </tr>
                <tr>
                    <td height="20" colspan="2" class="tm"><em>55 - 64,9</em></td>
                    <td width="93" class="ticb">25,8</td>
                    <td width="225" class="tm">31,7</td>
                    <td class="ticb">36,9</td>
                    <td class="ticb"><em>24,3</em></td>
                    <td class="tm">30,3</td>
                    <td class="ticb">38,5</td>
                </tr>
                <tr>
                    <td height="20" colspan="2" class="tm"><em>65 - ...</em></td>
                    <td width="93" class="ticb">24,8</td>
                    <td width="225" class="tm">30,7</td>
                    <td class="ticb">35,5</td>
                    <td class="ticb"><em>24</em></td>
                    <td class="tm">29,9</td>
                    <td class="ticb">37,3</td>
                </tr>
                <tr>
                    <td colspan="8" class="ti">P50 BASEADO NO SEXO E NA IDADE</td>

                </tr>
                <tr>
                    <td height="16" colspan="8" class="tc"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<? echo $impressao[0]->p50; ?></strong></td>

                </tr>
                <tr>
                    <td height="14" colspan="8" align="center" style="text-align:center;font-size: 9px;"><strong style="text-transform: uppercase;">  Classificação do Estado Nutricional, segundo CB:</strong></td>
                </tr>

                <?
                //echo var_dump($diagnostico[0]);
                $cen = (int) $impressao[0]->cen;
// Classificação do Estado Nutricional Segundo o CB
                if ($cen > 120) {
                    ?>

                    <?
                    $classificacao = 'Obesidade >120%';
                } elseif ($cen < 110 && $cen > 90) {
                    $classificacao = 'Eutrofia 110-90%';
                } elseif ($cen < 80 && $cen > 70) {
                    $classificacao = 'DPC Moderada 80-70%';
                } elseif ($cen < 120 && $cen > 110) {
                    $classificacao = 'Sobrepeso 120-110%';
                } elseif ($cen < 90 && $cen > 80) {
                    $classificacao = 'DPC Leve 90-80%';
                } else {
                    $classificacao = 'DPC grave </= 70%';
                }
                ?>
<? if ($cen > 120) { ?>
                    <tr>
                        <td height="20" colspan="3" class="tm2"><strong>Obesidade &gt; 120%</strong></td>
                        <td colspan="2" class="tm2">Eutrofia 110 - 90%</td>
                        <td colspan="3" class="tm2"><em></em>DPC moderada 80 - 70%</td>
                    </tr>
                    <tr>
                        <td height="20" colspan="3" class="tm2"><em>Sobrepeso  120 - 110%</em></td>
                        <td colspan="2" class="tm2">DPC leve 90 - 80%</td>
                        <td colspan="3" class="tm2"><em>DPC grave &lt;/= 70%</em></td>
                    </tr>
<? } elseif ($cen < 110 && $cen > 90) { ?>
                    <tr>
                        <td height="20" colspan="3" class="tm2">Obesidade &gt; 120%</td>
                        <td colspan="2" class="tm2"><strong>Eutrofia 110 - 90%</strong></td>
                        <td colspan="3" class="tm2"><em></em>DPC moderada 80 - 70%</td>
                    </tr>
                    <tr>
                        <td height="20" colspan="3" class="tm2"><em>Sobrepeso  120 - 110%</em></td>
                        <td colspan="2" class="tm2">DPC leve 90 - 80%</td>
                        <td colspan="3" class="tm2"><em>DPC grave &lt;/= 70%</em></td>
                    </tr>
<? } elseif ($cen < 80 && $cen > 70) { ?>
                    <tr>
                        <td height="20" colspan="3" class="tm2">Obesidade &gt; 120%</td>
                        <td colspan="2" class="tm2">Eutrofia 110 - 90%</td>
                        <td colspan="3" class="tm2"><em></em><strong>DPC moderada 80 - 70%</strong></td>
                    </tr>
                    <tr>
                        <td height="20" colspan="3" class="tm2"><em>Sobrepeso  120 - 110%</em></td>
                        <td colspan="2" class="tm2">DPC leve 90 - 80%</td>
                        <td colspan="3" class="tm2"><em>DPC grave &lt;/= 70%</em></td>
                    </tr>
<? } elseif ($cen < 120 && $cen > 110) { ?>
                    <tr>
                        <td height="20" colspan="3" class="tm2">Obesidade &gt; 120%</td>
                        <td colspan="2" class="tm2">Eutrofia 110 - 90%</td>
                        <td colspan="3" class="tm2"><em></em>DPC moderada 80 - 70%</td>
                    </tr>
                    <tr>
                        <td height="20" colspan="3" class="tm2"><em><strong>Sobrepeso  120 - 110%</strong></em></td>
                        <td colspan="2" class="tm2">DPC leve 90 - 80%</td>
                        <td colspan="3" class="tm2"><em>DPC grave &lt;/= 70%</em></td>
                    </tr>
<? } elseif ($cen < 90 && $cen > 80) { ?>
                    <tr>
                        <td height="20" colspan="3" class="tm2">Obesidade &gt; 120%</td>
                        <td colspan="2" class="tm2">Eutrofia 110 - 90%</td>
                        <td colspan="3" class="tm2"><em></em>DPC moderada 80 - 70%</td>
                    </tr>
                    <tr>
                        <td height="20" colspan="3" class="tm2"><em>Sobrepeso  120 - 110%</em></td>
                        <td colspan="2" class="tm2"><strong>DPC leve 90 - 80%</strong></td>
                        <td colspan="3" class="tm2"><em>DPC grave &lt;/= 70%</em></td>
                    </tr>
<? } else { ?>
                    <tr>
                        <td height="20" colspan="3" class="tm2">Obesidade &gt; 120%</td>
                        <td colspan="2" class="tm2">Eutrofia 110 - 90%</td>
                        <td colspan="3" class="tm2"><em></em>DPC moderada 80 - 70%</td>
                    </tr>
                    <tr>
                        <td height="20" colspan="3" class="tm2"><em>Sobrepeso  120 - 110%</em></td>
                        <td colspan="2" class="tm2">DPC leve 90 - 80%</td>
                        <td colspan="3" class="tm2"><em><strong>DPC grave &lt;/= 70%</strong></em></td>
                    </tr>

<? } ?>



                <tr>
                    <td height="14" colspan="8" align="center" style="text-align:center;font-size: 9px;"><strong style="text-transform: uppercase;">  Estimativa de altura pela altura do joelho (Chumlea e col., 1985)</strong></td>
                </tr>
                <tr>
                    <td height="20" colspan="3" class="tm">Sexo</td>
                    <td colspan="5" class="tm">Fórmula<em></em></td>
                </tr>
                <tr>
                    <td height="20" colspan="3" class="tm2"><em>Feminino:</em></td>
                    <td colspan="2" class="tm2">84,88 - 0,24 x (idade) + 1,83 x (altura do joelho)</td>
                    <td colspan="3" rowspan="2" class="tm"><em>Altura Estimada: <? echo $impressao[0]->altura_estimada; ?>cm </em></td>
                </tr>
                <tr>
                    <td height="20" colspan="3" class="tm2"><em>Masculino:</em></td>
                    <td colspan="2" class="tm2">64,19 - 0,04 x (idade) + 2,02 x (altura do joelho)</td>
                </tr>
                <tr>
                    <td height="14" colspan="8" align="center" style="text-align:center;font-size: 9px;"><strong style="text-transform: uppercase;">  Determinação do peso ideal pela altura (West)</strong></td>
                </tr>
                <tr>
                    <td height="20" colspan="3" class="tm">Sexo</td>
                    <td colspan="5" class="tm">Fórmula<em></em></td>
                </tr>
                <tr>
                    <td height="20" colspan="3" class="tm2"><em>Feminino:</em></td>
                    <td colspan="2" class="tm2">Peso ideal: altura 2 x 20,6</td>
                    <td colspan="3" rowspan="2" class="tm"><em>Peso Ideal: <? echo substr($impressao[0]->peso_ideal,0,5); ?>Kg </em></td>
                </tr>
                <tr>
                    <td height="20" colspan="3" class="tm2"><em>Masculino:</em></td>
                    <td colspan="2" class="tm2">Peso ideal: altura 2 x 22,1</td>
                </tr>
                <tr>
                    <td height="14" colspan="8" align="center" style="text-align:center;font-size: 9px;"><strong style="text-transform: uppercase;">  Determinação do gasto energético total</strong></td>
                </tr>
                <tr>
                    <td height="20" colspan="3" class="tm">GET</td>
                    <td colspan="5" class="tm">Fórmula<em></em></td>
                </tr>
                <tr>
                    <? if ($impressao[0]->tipoget == 'GET C/Presença de SIRS') { ?>
                        <td height="20" colspan="3" class="tm2"><em><strong>Presença SIRS</strong></em></td>
                        <td colspan="2" class="tm2"><strong>25 Kcal/Kg(Griffiths, 2001)</strong> </td>
<? } else { ?>
                        <td height="20" colspan="3" class="tm2"><em>Presença SIRS</em></td>
                        <td colspan="2" class="tm2">25 Kcal/Kg (Griffiths, 2001)</td>
                    <? } ?>

                    <td colspan="3" rowspan="3" class="tm"><em><? echo $impressao[0]->tipoget; ?>:&nbsp;<? echo $impressao[0]->get; ?>Kcal </em></td>
                </tr>
                <tr>
                    <? if ($impressao[0]->tipoget == 'GET C/Ausência de SIRS') { ?>
                        <td height="20" colspan="3" class="tm2"><em><strong>Ausência SIRS</strong></em></td>
                        <td colspan="2" class="tm2"><strong>30 a 35 Kcal/Kg</strong></td>
                    <? } else { ?>
                        <td height="20" colspan="3" class="tm2"><em>Ausência SIRS</em></td>
                        <td colspan="2" class="tm2">30 a 35 Kcal/Kg</td>
                    <? } ?>
                </tr>
                <tr>
                    <? if ($impressao[0]->tipoget == 'GET C/Repleção') { ?>
                        <td height="20" colspan="3" class="tm2"><em><strong>Repleção</strong></em></td>
                        <td colspan="2" class="tm2"><strong>40 Kcal/Kg</strong></td>
<? } else { ?>
                        <td height="20" colspan="3" class="tm2"><em>Repleção</em></td>
                        <td colspan="2" class="tm2">40 Kcal/Kg</td>
<? } ?>
                </tr>
                <tr>
                    <td colspan="8" align="center" style="text-align:center;font-size: 9px;"><strong> DIAGNÓSTICO NUTRICIONAL E CONDUTA DIETOTERÁPICA</strong></td>
                </tr>
                <tr>
                    <td colspan="8" class="ti">DIAGNÓSTICO</td>
                </tr>
                <tr>
                    <td height="50" colspan="8" class="tc"><? echo substr($impressao[0]->diagnostico_nutricional, 0, 61); ?>
                        <br>
                        <? echo substr($impressao[0]->diagnostico_nutricional, 61, 131); ?>
                        <br>
                        <? echo substr($impressao[0]->diagnostico_nutricional, 131, 200); ?>
                        <br>
<? echo substr($impressao[0]->diagnostico_nutricional, 200, 300); ?>
                        <br>
<? echo substr($impressao[0]->diagnostico_nutricional, 300, 400); ?>
                        <br>
<? echo substr($impressao[0]->diagnostico_nutricional, 400, 500); ?>
                        <br>

                        <strong>    CD: Evoluir até atingir necessidade de acordo com tolerância do paciente.
                        </strong>
                    </td>
                </tr>

<? if ($impressao[0]->sexo == 'M') { ?>

                    <tr bgcolor="#96D783">
                        <td colspan="8" style="text-align: center">HOMEM BRANCO</td>
                    </tr>
                    <tr>

                        <td rowspan="2" style="text-align: center"><? echo $impressao[0]->altura_perna; ?> * 1,19</td>
                        <td rowspan="2" style="text-align: center">+</td>

                        <td  rowspan="2" style="text-align: center"><? echo $impressao[0]->cb; ?> * 3,21</td>
                        <td  rowspan="2" style="text-align: center">-</td>
                        <td  rowspan="2" style="text-align: center">86,82</td>
                        <td  rowspan="2" style="text-align: center">=</td>
                        <td  rowspan="2" style="text-align: center"><? echo $homemb; ?></td>
                    </tr>
                    <tr>
                        <td height="23" style="text-align: center">&nbsp;</td>

                    </tr>

                    <tr>
                        <td bgcolor="#96D783" colspan="8" style="text-align: center">HOMEM NEGRO</td>
                    </tr>
                    <tr>
                        <td  rowspan="2" style="text-align: center"><? echo $impressao[0]->altura_perna; ?> * 1,09</td>
                        <td rowspan="2" style="text-align: center">+</td>
                        <td  rowspan="2" style="text-align: center"><? echo $impressao[0]->cb; ?> * 3,14</td>
                        <td  rowspan="2" style="text-align: center">-</td>
                        <td  rowspan="2" style="text-align: center">83,72</td>
                        <td  rowspan="2" style="text-align: center">=</td>
                        <td  rowspan="2" style="text-align: center"><? echo $homemn; ?></td>
                    </tr>
                    <tr>
                        <td height="23" style="text-align: center">&nbsp;</td>

                    </tr>

<? } else {
    ?>

                    <tr bgcolor="#96D783">
                        <td colspan="8" style="text-align: center">MULHER BRANCA</td>
                    </tr>
                    <tr>
                        <td rowspan="2" style="text-align: center"><? echo $impressao[0]->altura_perna; ?> * 1,01</td>
                        <td rowspan="2" style="text-align: center">+</td>
                        <td  rowspan="2" style="text-align: center"><? echo $impressao[0]->cb; ?> * 2,81</td>
                        <td  rowspan="2" style="text-align: center">-</td>
                        <td  rowspan="2" style="text-align: center">66,04</td>
                        <td  rowspan="2" style="text-align: center">=</td>
                        <td  rowspan="2" style="text-align: center"><? echo $mulherb; ?></td>
                    </tr>
                    <tr>
                        <td height="23" style="text-align: center">&nbsp;</td>
                    </tr>


                    <tr>
                        <td bgcolor="#96D783" colspan="8" style="text-align: center">MULHER NEGRA</td>
                    </tr>
                    <tr>
                        <td  rowspan="2" style="text-align: center"><? echo $impressao[0]->altura_perna; ?> * 1,24</td>
                        <td  rowspan="2" style="text-align: center">+</td>
                        <td  rowspan="2" style="text-align: center"><? echo $impressao[0]->cb; ?> * 2,81</td>
                        <td  rowspan="2" style="text-align: center">-</td>
                        <td  rowspan="2" style="text-align: center">82,48</td>
                        <td  rowspan="2" style="text-align: center">=</td>
                        <td  rowspan="2" style="text-align: center"><? echo $mulhern; ?></td>
                    </tr>
                    <tr>
                        <td height="23" style="text-align: center">&nbsp;</td>
                    </tr>


<? } ?>
            </tbody>
        </table>
    </body>
</html>

<script type="text/javascript">



</script>