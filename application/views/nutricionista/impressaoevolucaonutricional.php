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
?>

<html>
    <head>
        <meta charset="utf-8">
        <link href="<?= base_url() ?>/css/tabelarae.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="<?php base_url() ?>css/jquery-ui-1.8.5.custom.css">
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
               <td height="19" colspan="6" align="center" style="text-align: center; font-size: 10px;"><strong> Paciente em TNE com formula polimérica e hiperproteica</strong>  </td>
               <td height="19" rowspan="3" colspan="2" align="center" style="text-align:center;font-size: 9px;"> <?= $item->nutricionista?></td>
                    
                </tr>
                <tr>
               <td height="19" colspan="6" align="center" style="text-align: center; font-size: 10px;"> em BIC 45ml/h e VCT <strong><?= (int) $item->kcal?>Kcal</strong></td>
                    
                </tr>
            
           <tr>
               <td height="19" colspan="6" align="center" style="text-align: center; font-size: 10px;"><strong>DATA: <?= $data?></strong> <?=$i?> Etapas de <?= $item->nome?> + <?= $equipo?>  </td>
                    
                </tr>
            <?
            $i++;
            $etapas = $item->internacao_precricao_etapa_id;
        }
        ?>


            
               


                <tr>
                    <td height="35" colspan="5" align="center" style="text-align:center;font-size: 9px;"><strong> TOTAL GERAL</strong></td>
                    <td height="35" align="center" style="text-align:center;font-size: 9px;"><strong>0</strong></td>
                    <td height="35" colspan="2" align="center" style="text-align:center;font-size: 9px;"><strong>R$</strong></td>
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
