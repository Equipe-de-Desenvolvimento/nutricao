<?
//echo var_dump($listar);
//die;
//Subtração dos dias
$contagemdias = count($dias);

//echo $contardias; 
//die;

$valor_diaria = $listar[0]->valor_diaria;
$total_diaria = $valor_diaria * $contagemdias;

?>﻿

<html>
    <head>
        <meta charset="utf-8">
        <link href="<?= base_url() ?>/css/tabelarae.css" rel="stylesheet" type="text/css">
        <title>Relatório de Custos</title>
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
                    <td height="16" colspan="7" class="tisemsublinhadogrande">RELATÓRIO DE CUSTOS</td>
                </tr>
                <tr>
                    <td height="16" colspan="7" class="tisemsublinhadogrande" style="text-decoration: underline;">NUTRIÇÃO ENTERAL - <? echo $listar[0]->convenio; ?></td>
                </tr>
                <tr>

                    <td height="150" colspan="4" class="sembordadireita">

                        <br>
                        <strong>PACIENTE:</strong> <? echo $listar[0]->nome; ?>
                        <br>
                        <br>
                        <strong>HOSPITAL:</strong> <? echo $listar[0]->hospital; ?>
                        <br>
                        <br>
                        <strong>PERÍODO:</strong>&nbsp;&nbsp;<? echo $_POST['txtdata_inicio'] ?> A&nbsp;<? echo $_POST['txtdata_fim']; ?>

                        <br>
                        <br>
                        <br>
                        <br>


                        <strong>Preparo de Nutrição Enteral</strong> 
                        <br>
                        <br>



                    </td>
                </tr>
        </table>

        <table id="tabelaspec" width="80%" border="1" align="center" cellpadding="0" cellspacing="0" class="tipp">
            <tbody>

                <tr class="semborda">
                    <td width="16%" height="13" class="semborda"><strong>DIETA UTILIZADA</strong></td>
                    <td width="14%" class="semborda"><strong>QTDE.</strong> </td>



                </tr>

                
                <? foreach ($listar as $item) { ?>
                    <tr>
                        <?$volume=$item->volume/$item->etapas;
                        ?>
                        <td class="semborda"><?= $item->produto; ?>&nbsp;&nbsp;<?echo $volume; ?> ML</td>
                        <td height="16" class="semborda"><?= $item->etapas; ?></td>


                    </tr>
                    
                <? } ?>
                    <? foreach ($listar as $item) { ?>
                        <tr>
                            <td class="semborda">FRASCO P/ NUTRIÇÃO ENTERAL 300ML C/ LACRE</td>
                            <td height="16" class="semborda"><?= $item->etapas; ?></td>


                        </tr>

                    <? } ?>
                    <? foreach ($equipo as $item) { ?>
                    <tr>
                        <td class="semborda"><?= $item->produto; ?></td>
                        <td height="16" class="semborda"><?= $item->etapas; ?></td>


                    </tr>
                    
                <? } ?>
                    


            </tbody>

        </table>

        <br>

        <table id="tabelaspec" width="80%" border="1" align="left" cellpadding="0" cellspacing="0" class="tipp">


            <tr>

                <td height="20" colspan="4" class="sembordadireita">

                    <strong>VALOR DA DIÁRIA:</strong> R$&nbsp;&nbsp; <? echo $listar[0]->valor_diaria; ?>







                </td>
            </tr>


        </table>

        <table id="tabelaspec" width="80%" border="1" align="center" cellpadding="0" cellspacing="0" class="tipp">
            <br>

            <tr>
            <br> 
            <td height="20" colspan="3" class="tm"></td>
            <td colspan="2" class="tm">N° DIAS</td>
            <td colspan="2" class="tm"><em></em>VALOR DA DIÁRIA</td>
            <td colspan="2" class="tm"><em></em>VALOR TOTAL</td>
        </tr>
        <tr>
            <td height="20" colspan="3" class="tm"><em></em></td>
            <td colspan="2" class="tm"></td>
            <td colspan="2" class="tm"><em></em></td>
            <td colspan="2" class="tm"><em></em></td>
        </tr>
        <tr>
            <td height="20" colspan="3" class="tm">TOTAL DA FATURA</td>
            <td colspan="2" class="tm"><? echo $contagemdias; ?></td>
            <td colspan="2" class="tm"><em>R$&nbsp;&nbsp; <? echo $listar[0]->valor_diaria; ?></em></td>
            <td colspan="2" class="tm"><em>R$&nbsp;&nbsp; <? echo $total_diaria; ?></em></td>
        </tr>
    </table>
    <table id="tabelaspec" width="80%" border="0" align="center" cellpadding="0" cellspacing="0" class="tipp">


        <tr>

            <td height="20" colspan="3" class="tm"><strong>PARA CRÉD</strong> </td>
            <td colspan="6" class="tmtextoesquerdo"><? echo $empresa[0]->razao_social; ?></td>

        </tr>
        <tr>
        <br> 
        <td height="20" colspan="3" class="tm"><strong></strong> </td>
        <td colspan="6" class="tmtextoesquerdo">CNPJ:<? echo $empresa[0]->cnpj; ?></td>

    </tr>
    <tr>
    <br> 
    <td height="20" colspan="3" class="tm"><strong>BANCO:</strong> </td>
    <td colspan="6" class="tmtextoesquerdo"><? echo $listar[0]->banco; ?></td>

</tr>
<tr>
<br> 
<td height="20" colspan="3" class="tm"><strong></strong> </td>
<td colspan="6" class="tmtextoesquerdo">Agência:<? echo $listar[0]->agencia; ?></td>

</tr>
<tr>
<br> 
<td height="20" colspan="3" class="tm"><strong></strong> </td>
<td colspan="6" class="tmtextoesquerdo">Conta:<? echo $listar[0]->conta; ?></td>

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



                <p style="text-align: center;"><strong><? echo $empresa[0]->razao_social; ?> <br>
                        <? echo $empresa[0]->logradouro; ?>,N° <? echo $empresa[0]->numero; ?>&nbsp;Fone:&nbsp; <? echo $empresa[0]->telefone; ?><br>
                        CNPJ:&nbsp;<? echo $empresa[0]->cnpj; ?>&nbsp;-CEP&nbsp; <? echo $empresa[0]->cep; ?>&nbsp;-&nbsp; Fortaleza &nbsp;-&nbsp; CE

                    </strong></p>






            </td>

        </tr>

    </tbody>

</table>



</body>
</html>