<?
//echo var_dump($listar[0]); 
//die;
?>﻿

<html>
    <head>
        <meta charset="utf-8">
        <link href="<?= base_url() ?>/css/tabelarae.css" rel="stylesheet" type="text/css">
        <title>Relação dos Pacientes</title>
    </head>

    <body>
        <table id="tabelaspec" width="80%" border="0" align="center" cellpadding="0" cellspacing="0" class="tipp">
            <tr>
                <td width="58" height="80" style="font-size: 15px;"><p class="tisemborda"><strong style="text-align: center;"><img src="<?= base_url() ?>/img/logofichadeavaliacao.jpg"  width="180" height="80" class="ttr"/></strong></p></td>


        </table>


        <table id="tabelaspec"  width="80%" border="0" align="center" cellpadding="0" cellspacing="0" class="tipp">
            <tbody>


                <tr class="tic">
                    <td height="13" colspan="7" class="tic"></td>
                </tr>

                <tr class="tic">
                    <td height="16" colspan="7" class="tisemsublinhadogrande">RELAÇÃO DOS PACIENTES-NUTRIÇÃO ENTERAL E PARENTERAL</td>
                </tr>
                <tr>
                    <td height="16" colspan="7" class="tisemsublinhadogrande" >CONVÊNIO: <? echo $listar[0]->convenio; ?></td>
                </tr>
                <tr>
                    <td height="16" colspan="7" class="tisemsublinhadogrande" >PERÍODO:&nbsp;&nbsp;<? echo $_POST['txtdata_inicio'] ?> A&nbsp;<? echo $_POST['txtdata_fim']; ?></td>
                </tr>

        </table>
        <table id="tabelaspec" width="100%" border="1" align="left" cellpadding="0" cellspacing="0" class="tipp">
            <br>
            <br>
            <br>
            <br>



            <tr>
                <td height="35" colspan="2" align="center" style="text-align:center;font-size: 9px;"><strong>NOME DO PACIENTE</strong></td>
                <td height="35" colspan="2" align="center" style="text-align:center;font-size: 9px;"><strong>PERIODO</strong></td>
                <td width="22%" height="35" align="center" style="text-align:center;font-size: 9px;"><strong>PROC</strong></td>
                <td width="18%" height="35" align="center" style="text-align:center;font-size: 9px;"><strong>QUANT.DIAS</strong></td>
                <td height="35" align="center" style="text-align:center;font-size: 9px;"><strong>VALOR TOTAL</td>
            </tr> 
            <?
            $totalgeral = 0;
            $diasgerais = 0;
            ?>
            <?
            foreach ($listarpacientes as $valor) {
                $i = 0;


                foreach ($listar as $item) {
                    if ($valor->paciente_id == $item->paciente_id) {
                        $i++;
                        $paciente = $item->paciente;
                        $total = $i * $item->valor_diaria;
                    }
                }
                $diasgerais = $diasgerais + $i;
                $totalgeral = $totalgeral + $total;
                ?>
                <tr>
                    <td height="19" colspan="2" align="center" style="text-align: center; font-size: 10px;"><?= $paciente ?></td>
                    <td height="19" colspan="2" align="center" style="text-align:center;font-size: 9px;"><? echo $_POST['txtdata_inicio'] ?> A&nbsp;<? echo $_POST['txtdata_fim']; ?></td>
                    <td height="19" align="center" style="text-align:center;font-size: 9px;">NE</td>
                    <td height="19" align="center" style="text-align:center;font-size: 9px;"><?= $i ?></td>
                    <td height="19" align="center" style="text-align:center;font-size: 9px;">R$<?= $total ?></td>
                </tr> 
    <? }
?>

            <tr>
                <td height="35" colspan="5" align="center" style="text-align:center;font-size: 9px;"><strong> TOTAL GERAL</strong></td>
                <td height="35" align="center" style="text-align:center;font-size: 9px;"><strong><?= $diasgerais ?></strong></td>
                <td height="35" align="center" style="text-align:center;font-size: 9px;"><strong>R$<?= $totalgeral ?></strong></td>
            </tr> 


        </table>

        <table id="tabelaspec" width="80%" border="0" align="center" cellpadding="0" cellspacing="0" class="tipp">


            <tbody>

                <tr>
                    <td height="70" colspan="7" class="sembordadireita"><br>


                    </td>

                </tr>

            </tbody>

            <tbody>


                <tr>

                    <td height="100" colspan="7" class="sembordadireita">

                        <br>
                        <br>
                        <p style="text-align: center;"><strong> Fortaleza &nbsp;-&nbsp; 12 DE SETEMBRO DE 2016

                            </strong></p>




                        <br>
                        <br>


                    </td>

                </tr>

            </tbody>

        </table>



    </body>
</html>