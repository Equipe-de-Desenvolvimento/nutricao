<?
//echo var_dump($listar); 
//die; 
$dataatual = date("Y-m-d");
?>
<? $anoatual = substr($dataatual, 0, 4); ?>
<? $mesatual = substr($dataatual, 5, 2); ?>
<? $diaatual = substr($dataatual, 8, 2); ?>
<? $datafinal = $diaatual . '/' . $mesatual . '/' . $anoatual; ?>  
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
$data_entrada = substr($listar[0]->data_internacao, 8, 2) . '/' . substr($listar[0]->data_internacao, 5, 2) . '/' . substr($listar[0]->data_internacao, 0, 4);
if($listar[0]->data_saida != null ){}
$data_saida = substr($listar[0]->data_saida, 8, 2) . '/' . substr($listar[0]->data_saida, 5, 2) . '/' . substr($listar[0]->data_saida, 0, 4);
$nascimento = (int) substr($listar[0]->nascimento, 0, 4);
$idade = (int) $anoatual - $nascimento;
$dieta= "";
$via= $listar[0]->via;

?>

<html>
    <head>
        <meta charset="utf-8">
        <link href="<?= base_url() ?>/css/tabelarae.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="<?php base_url() ?>css/jquery-ui-1.8.5.custom.css">
        <title>Evolução Nutricional</title>
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
                    <td height="16" colspan="7" class="tisemsublinhadogrande">NUTRIÇÃO PARENTERAL E ENTERAL LTDA.</td>
                </tr>

                <tr>
                    <td height="16" colspan="7" class="tisemsublinhadogrande" > EVOLUÇÃO NUTRICIONAL



                    </td>
                </tr>


        </table>

        <table id="tabelaspec" width="100%" border="1" align="left" cellpadding="0" cellspacing="0" class="tipp">
            <br>
            <br>
            <br>
            <br>
            <tbody>
               
                
                <tr>
                    <td height="19"  colspan="6" align="center" style="text-align: left; font-size: 11px;"><strong> NOME: </strong> <? echo $listar[0]->paciente; ?>  </td>
                    <td height="19"  colspan="2" align="center" style="text-align:left;font-size: 11px;"> <strong>IDADE:</strong> <?echo $idade;?> Anos</td>

                </tr>

                <tr>
                    <td height="19" colspan="8" align="center" style="text-align: left; font-size: 11px;"><strong> HOSPITAL:</strong> <? echo $listar[0]->hospital; ?></td>
                </tr>

                <tr>
                    <td height="19" colspan="6" align="center" style="text-align: left; font-size: 11px;"><strong> DATA DE ENTRADA:</strong> <? echo $data_entrada; ?> </td>
                    <td height="19" colspan="2" align="center" style="text-align:left;font-size: 11px;"><strong>DATA DE SAÍDA: </strong> <? echo $data_saida; ?>  </td>     
                </tr>

                <tr>
                    <td height="19" colspan="6" align="center" style="text-align: left; font-size: 11px;"><strong> CONVENIO:</strong> <? echo $listar[0]->convenio; ?></td>
                    <td height="19" colspan="2" align="center" style="text-align:left;font-size: 11px;"><strong> VIA DE ADMINISTRAÇÃO: </strong> <?=$via?> </td>     
                </tr>

                <tr>
                    <td height="19" colspan="8" align="center" style="text-align: left; font-size: 11px;"><strong> DIAGNÓSTICO:</strong> <? echo $listar[0]->diagnostico_nutricional; ?></td>
                </tr>

            </tbody>


        </table>
        <br>
        <br>
        <br>

        <table id="tabelaspec"  width="80%" border="0" align="center" cellpadding="0" cellspacing="0" class="tipp">
            <tbody>


                <tr class="tic">

                </tr>

                <tr class="tic">

                </tr>

                <tr>



                </tr>


        </table>

        <table id="tabelaspec" width="100%" border="1" align="left" cellpadding="0" cellspacing="0" class="tipp">
            <br>
            <br>
 <tr>
                    <td height="19" colspan="8" align="center" style="text-align: center; font-size: 14px;"><strong> EVOLUÇÃO</strong></td>
                </tr>


            <?foreach ($prescricao as $item){?>
                <tr>
                    <td height="19" colspan="9" style="text-align: center; font-size: 13px;">
                        <p style="text-align:justify;">
                <strong>DATA: <?=$item->texto_evolucao?>
                </strong>
                        
                  </p>  
                    </td>

                </tr>
                <tr>
                    <td height="19" colspan="9" align="center" class="semborda" style="text-align:center;font-size: 13px;"> </td>
                </tr>
                <tr>
                    <td height="19" colspan="9" align="center" class="semborda" style="text-align:center;font-size: 13px;"> </td>
                </tr>

                
                <?
            }?>
                
             <? if ($listar[0]->data_saida!= null){?>
                 
                 
                 <tr>
                     <td height="19" colspan="9" align="center"  style="text-align:center;font-size: 13px;"><strong>DATA: <?=$data_saida?> </strong><strong> <?=$listar[0]->saida;?></strong>  </td>
                </tr>
                <tr>
                    <td height="19" colspan="9" align="center" class="semborda" style="text-align:center;font-size: 13px;"> </td>
                </tr>
                 
                 
                 <?
                 
             }?>   
              


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
                                CEP&nbsp; <? echo $empresa[0]->cep; ?>&nbsp;-&nbsp; Fortaleza &nbsp;-&nbsp; CE

                            </strong></p>






                    </td>

                </tr>

            </tbody>

        </table>



    </body>
</html>
