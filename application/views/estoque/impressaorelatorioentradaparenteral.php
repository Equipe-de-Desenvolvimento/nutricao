<?
//echo var_dump($listar); 
//die; 
$dataatual = date("Y-m-d");
?>
<?
$anoatual = substr($dataatual, 0, 4);
$mesatual = substr($dataatual, 5, 2);
$diaatual = substr($dataatual, 8, 2);
$datafinal = $diaatual . '/' . $mesatual . '/' . $anoatual;
?>

<?
if ($mesatual == '01') {
    $mesatual = 'JANEIRO';
} elseif ($mesatual == '02') {
    $mesatual = 'FEVEREIRO';
} elseif ($mesatual == '03') {
    $mesatual = 'MARÇO';
} elseif ($mesatual == '04') {
    $mesatual = 'ABRIL';
} elseif ($mesatual == '05') {
    $mesatual = 'MAIO';
} elseif ($mesatual == '06') {
    $mesatual = 'JUNHO';
} elseif ($mesatual == '07') {
    $mesatual = 'JULHO';
} elseif ($mesatual == '08') {
    $mesatual = 'AGOSTO';
} elseif ($mesatual == '09') {
    $mesatual = 'SETEMBRO';
} elseif ($mesatual == '10') {
    $mesatual = 'OUTUBRO';
} elseif ($mesatual == '11') {
    $mesatual = 'NOVEMBRO';
} elseif ($mesatual == '11') {
    $mesatual = 'DEZEMBRO';
}
?>

<html>
    <head>
        <meta charset="utf-8">
        <link href="<?= base_url() ?>/css/tabelarae.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="<?php base_url() ?>css/jquery-ui-1.8.5.custom.css">
        <title>Relatório entrada parenteral</title>
    </head>

    <body>
        <table id="tabelaspec" width="80%" border="0" align="center" cellpadding="0" cellspacing="0" class="tipp">
            <tr>
                <td width="58" height="80" style="font-size: 15px;"><p class="tisemborda"><strong style="text-align: center;"><img src="<?= base_url() ?>/img/logofichadeavaliacao.jpg"  width="180" height="80" class="ttr"/></strong></p></td>


        </table>


        <table id="tabelaspec"  width="80%" border="0" align="center" cellpadding="0" cellspacing="0" class="tipp">
            <tbody>


                <tr class="tic">
                    <td height="13" colspan="7" class="tisemsublinhadogrande"> <? echo $empresa[0]->razao_social; ?></td>
                </tr>

                <tr class="tic">
                    <td height="16" colspan="7" class="tisemsublinhadogrande">Relatório de entrada estoque parenteral</td>
                </tr>
                <tr>
                    <td height="16" colspan="7" class="tisemsublinhadogrande" >PERÍODO:&nbsp;&nbsp;<? echo $_POST['txtdata_inicio'] ?> A&nbsp;<? echo $_POST['txtdata_fim']; ?></td>
                </tr>
                <tr>
                    <td height="16" colspan="7" class="tisemsublinhadogrande" >



                    </td>
                </tr>


        </table>
        <table id="tabelaspec" width="100%" border="1" align="left" cellpadding="0" cellspacing="0" class="tipp">
            <br>
            <br>
            <br>
            <br>



            <tr>
                <td width="15%" height="35"  align="center" style="text-align:center;font-size: 9px;"><strong>DATA E HORA DE ENTRADA</strong></td>
                <td width="30%" height="35"  align="center" style="text-align:center;font-size: 9px;"><strong>NOME DO PRODUTO</strong></td>
                <td width="20%" height="35" align="center" style="text-align:center;font-size: 9px;"><strong>FORNECEDOR</strong></td>
                <td width="10%" height="35" align="center" style="text-align:center;font-size: 9px;"><strong>QUANTIDADE</td>
                <td width="10%" height="35" align="center" style="text-align:center;font-size: 9px;"><strong>LOTE</td>
                <td width="10%" height="35" align="center" style="text-align:center;font-size: 9px;"><strong>VALIDADE</td>

            </tr> 
            <? if ($listar != null) { ?>

                <?
                foreach ($listar as $item) {
                    ?>
                    <tr>
                        <td height="19"  align="center" style="text-align: center; font-size: 10px;"> <?
            $ano = substr($item->data_cadastro, 0, 4);
            $mes = substr($item->data_cadastro, 5, 2);
            $dia = substr($item->data_cadastro, 8, 2);
            $hora = substr($item->data_cadastro, 11, 9);
            $datafinal = $dia . '/' . $mes . '/' . $ano . " " . $hora;
            echo $datafinal;
                    ?></td>
                        <td height="19"  align="center" style="text-align:center;font-size: 10px;"><?= $item->produto; ?></td>
                        <td height="19" align="center" style="text-align:center;font-size: 10px;"><?= $item->fornecedor; ?></td>
                        <td height="19" align="center" style="text-align:center;font-size: 10px;"><?= $item->quantidade; ?></td>
                        <td height="19" align="center" style="text-align:center;font-size: 10px;"><?= $item->lote; ?></td>
                        <td height="19" align="center" style="text-align:center;font-size: 10px;"><?
                            $ano = substr($item->validade, 0, 4);
                            $mes = substr($item->validade, 5, 2);
                            $dia = substr($item->validade, 8, 2);
                            $datafinal = $dia . '/' . $mes . '/' . $ano;
                            echo $datafinal;
                            ?></td>

                    </tr> 
                    <?
                }
                ?>


<? } else { ?>
                    <td height="19" colspan="4" align="center" style="text-align:center;font-size: 10px;">Sem entrada de produtos no periodo pesquisado</td>
                
<? } ?>         

        </table>

        <table id="tabelaspec" width="80%" border="0" align="center" cellpadding="0" cellspacing="0" class="tipp">


   

    <tbody>


        <tr>

            <td height="100" colspan="7" class="sembordadireita">



                <p style="text-align: center;"><strong>
                        <? echo $empresa[0]->logradouro; ?>,N° <? echo $empresa[0]->numero; ?>&nbsp;&nbsp; &nbsp;CEP&nbsp; <? echo $empresa[0]->cep; ?><br>
                        &nbsp;&nbsp; Fortaleza &nbsp;-&nbsp; CE <br>
                       CNPJ:  <? echo $empresa[0]->cnpj; ?><br>
                      Fone: (85) <? echo $empresa[0]->telefone; ?>
                        

                    </strong></p>






            </td>

        </tr>

    </tbody>

</table>



    </body>
</html>