

<?
//echo var_dump($listar); 
//die; 
$dataatual= date("Y-m-d");
?>
  <? $anoatual = substr($dataatual, 0, 4); ?>
                        <? $mesatual = substr($dataatual, 5, 2); ?>
                        <? $diaatual = substr($dataatual, 8, 2); ?>
                        <? $datafinal = $diaatual . '/' . $mesatual . '/' . $anoatual; ?>  
<?
if($mesatual == '01'){
    $mesatual= 'JANEIRO';
}
elseif($mesatual == '02'){
    $mesatual= 'FEVEREIRO';
}
elseif($mesatual == '03'){
    $mesatual= 'MARÇO';
}
elseif($mesatual == '04'){
    $mesatual= 'ABRIL';
}
elseif($mesatual == '05'){
    $mesatual= 'MAIO';
}
elseif($mesatual == '06'){
    $mesatual= 'JUNHO';
}
elseif($mesatual == '07'){
    $mesatual= 'JULHO';
}
elseif($mesatual == '08'){
    $mesatual= 'AGOSTO';
}
elseif($mesatual == '09'){
    $mesatual= 'SETEMBRO';
}
elseif($mesatual == '10'){
    $mesatual= 'OUTUBRO';
}
elseif($mesatual == '11'){
    $mesatual= 'NOVEMBRO';
}
elseif($mesatual == '11'){
    $mesatual= 'DEZEMBRO';
}

?>    


    <?

$mes= substr($_POST['txtdata_inicio'], 3,2);
$ano= substr($_POST['txtdata_inicio'], 5,5);

if($mes == '01'){
    $mes= 'JANEIRO';
}
elseif($mes == '02'){
    $mes= 'FEVEREIRO';
}
elseif($mes == '03'){
    $mes= 'MARÇO';
}
elseif($mes == '04'){
    $mes= 'ABRIL';
}
elseif($mes == '05'){
    $mes= 'MAIO';
}
elseif($mes == '06'){
    $mes= 'JUNHO';
}
elseif($mes == '07'){
    $mes= 'JULHO';
}
elseif($mes == '08'){
    $mes= 'AGOSTO';
}
elseif($mes == '09'){
    $mes= 'SETEMBRO';
}
elseif($mes == '10'){
    $mes= 'OUTUBRO';
}
elseif($mes == '11'){
    $mes= 'NOVEMBRO';
}
elseif($mes == '11'){
    $mes= 'DEZEMBRO';
}
//echo $ano; die;

?>﻿

<html>
    <head>
        <meta charset="utf-8">
        <link href="<?= base_url() ?>/css/tabelarae.css" rel="stylesheet" type="text/css">
        <title>Relação dos Pacientes</title>
    </head>

    <body>



        <table id="tabelaspec"  width="80%" border="0" align="center" cellpadding="0" cellspacing="5" class="tipp">
            <tbody>


                <tr class="tic">
                    <td height="13" colspan="7" class="tic"></td>
                </tr>
                <tr>
                    <td height="16" colspan="7" class="tisemsublinhadogrande" style="text-align: left;"> <?
                        if ($listar == '') {

                            echo 'SEM PACIENTES NESSE PERÍODO';
                        } else {

                            echo $banco[0]->convenio;
                        }
                        ?>



                    </td>
                </tr>
           
            <tr class="tic">
                <td height="16" colspan="7" class="tisemsublinhadogrande" style="text-align: left;"><? echo $banco[0]->razao_social; ?></td>
                 
            </tr>
           
            <tr>
                <td height="16" colspan="7" class="tisemsublinhadogrande" style="text-align: left;">PERÍODO:&nbsp;&nbsp;<? echo $_POST['txtdata_inicio'] ?> A&nbsp;<? echo $_POST['txtdata_fim']; ?></td>
            </tr>



        </table>
        <table id="tabelaspec" width="100%" border="0" align="left" cellpadding="0" cellspacing="0" class="tipp">
            <br>
            
          




           
 <tr class="tic">
     <td height="16" colspan="7" class="tisemsublinhado" style="text-align: left;"><strong style="text-decoration: underline;"><? echo $empresa[0]->nome; ?> - <? echo $empresa[0]->razao_social; ?> ,</strong> EMPRESA CREDENCIADA POR ESTE INSTITUTO</td>
                 
            </tr>
           
            <tr>
                <td height="16" colspan="7" class="tisemsublinhado" style="text-align: left;"><strong>VEM MUI RESPEITOSAMENTE, SOLICITAR O PAGAMENTO REFERENTE AO PROCESSO DO MÊS DE <?echo $mes?><?echo $ano;?></strong> </td>
            </tr>
            <tr>
                <td height="16" colspan="7" class="tisemsublinhado" style="text-align: left;">NO VALOR DE <strong>R$<?echo number_format($totalgeral,2,",","."); ?> (<?echo strtoupper($extenso);?>)</strong></td>
            </tr>






        </table>

        <table id="tabelaspec" width="80%" border="0" align="center" cellpadding="0" cellspacing="0" class="tipp">


            <tbody>

               

            </tbody>

            <tbody>


                <tr>

                    <td height="100" colspan="7" class="sembordadireita">

                        <br>
                        <br>
                        <p style="text-align: center;"> N. TERMOS <br>
                                <br>
                                 <br>
                                PEDE DEFERIMENTO. <br>
                                <br>
                                 <br>
                                Fortaleza, <?echo $diaatual;?> DE <? echo $mesatual;?> DE <? echo $anoatual;?><br>
                                 <br>
                                 <br>
                                CNPJ/CPF: <?echo $empresa[0]->cnpj;?> <br>
                                

                            </p>




                       


                    </td>

                </tr>

            </tbody>

        </table>
      
<table id="tabelaspec" width="80%" border="0" align="center" cellpadding="0" cellspacing="0" class="tipp">


    <tbody>

     

    </tbody>

    <tbody>


        <tr>

            <td height="100" colspan="7" class="sembordadireita">



                <p style="text-align: left;"><strong>DADOS INFORMATIVOS: <br>
                        <br>
                        <br>
                       
                        Conta Bancária: <? echo $banco[0]->banco; ?>&nbsp;<br>
                        AGÊNCIA: <? echo $banco[0]->agencia; ?>&nbsp;<br>
                        C/C: <? echo $banco[0]->conta; ?>&nbsp;<br>

                    </strong></p>






            </td>

        </tr>

    </tbody>

</table>
        
<table id="tabelaspec" width="80%" border="0" align="center" cellpadding="0" cellspacing="0" class="tipp">


   

    <tbody>


        <tr>

            <td height="100" colspan="7" class="sembordadireita">



                <p style="text-align: center;"><strong>
                        <? echo $empresa[0]->logradouro; ?>,N° <? echo $empresa[0]->numero; ?>&nbsp;Fone:&nbsp; <? echo $empresa[0]->telefone; ?><br>
                        &nbsp;CEP&nbsp; <? echo $empresa[0]->cep; ?>&nbsp;-&nbsp; Fortaleza &nbsp;-&nbsp; CE

                    </strong></p>






            </td>

        </tr>

    </tbody>

</table>





    </body>
</html>

