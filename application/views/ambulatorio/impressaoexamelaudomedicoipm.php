<? //echo var_dump($listar[0]); die;?>﻿
<html>
    <head>
        <meta charset="utf-8">
        <link href="<?= base_url() ?>/css/tabelarae.css" rel="stylesheet" type="text/css">
        <title>Relatorio médico IPM</title>
    </head>

    <body>
<table id="tabelaspec" width="80%" border="1" align="center" cellpadding="0" cellspacing="0" class="tipp">
     <tr>
                    <td width="58" height="50" style="font-size: 15px;"><p class="ttr"><strong style="text-align: center;">IPM- INSTITUTO DE PREVIDÊNCIA DO MUNICIPIO</strong></p></td>
                    
                   
</table>
<br>

        <table id="tabelaspec" width="80%" border="1" align="center" cellpadding="0" cellspacing="0" class="tipp">
            <tbody>
                 
               
                <tr class="tic">
                    <td height="13" colspan="7" class="tic"></td>
                </tr>

                <tr class="tic">
                    <td height="16" colspan="7" class="tisemsublinhadogrande">LAUDO MÉDICO PARA SOLICITAÇÃO DE:</td>
                </tr>
                <tr>
                    <td height="90" colspan="5" class="sembordadireitabaixo">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[&nbsp;]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DIÁRIA DE UTI 
                        <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[&nbsp;]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VACINA ANTI Rh
                        <br>
                        
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[&nbsp;]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;USO DE PRÓTESE, ÓRTESE
                        <br>
                        
                    </td>
                    <td height="90" colspan="2" class="sembordaesquerdabaixo">[&nbsp;]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;USO DE OXIGENADORES
                        <br>
                        [&nbsp;]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NUTRIÇÃO PARENTAL
                        <br>
                        [&nbsp;]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;USO DE FATORES DE COAGULAÇÃO
                        <br>
                        
                        
                    </td>
                </tr>
                <tr>
                    <td height="16" colspan="7" class="tisemsublinhadogrande" style="text-decoration: underline;">NUTRIÇÃO ENTERAL</td>
                </tr>
                <tr>
                    <td height="90" colspan="7" class="sembordadireitabaixo">
                        <p style="text-align: center;font-weight: bold;">
                        ____________________________________________________________________________________
                        <br>
                        <br>
                        OUTROS PROCEDIMENTOS DE ALTO CUSTO
                        </p>
                    </td>
                    
                        
                        
                   
                </tr>

            </tbody>

            <tbody>

                <tr>
                    <td height="70" colspan="7" class="sembordadireita"><br>
                        <br>
                        <br>
                    </td>
           
                </tr>

            </tbody>
            <tbody>

                
                <tr>
                    
                    <td height="150" colspan="4" class="sembordadireita">
                        
                        <br>
                        HOSPITAL: <strong style="text-decoration: underline;"><? echo $listar[0]->hospital; ?></strong>
                        <br>
                        <br>
                        NOME DO PACIENTE: <strong style="text-decoration: underline;"><? echo $listar[0]->nome; ?></strong>
                        <br>
                        <br>
                        DIAGNÓSTICO:<strong><? echo $listar[0]->diagnostico; ?></strong>
                        <br>
                        <br>
                        CARTEIRA:<strong><? echo $listar[0]->convenionumero; ?></strong>
                        <br>
                        <br>
                        CID:<strong><? echo $listar[0]->cid1solicitado; ?></strong>
                        <br>
                        
                        
                       
                    </td>
                    <td height="150" colspan="3" class="sembordaesquerda">
                     

                    </td>


                </tr>

            </tbody>
            <tbody>

                <tr class="tic">
                    <td height="16" colspan="7" class="tisemsublinhadogrande"><p style="text-align: left;font-size: 9pt;">&nbsp;&nbsp;JUSTIFICATIVA:</p></td>
                </tr>
                <tr>

                    <td height="100" colspan="7" class="sembordadireita">
                        
                        <br>
                        <br>
                        <p style="text-align: center;"><strong>SOLICITO NUTRIÇÃO NUTRIÇÃO ENTERAL PARA PACIENTE COM <br>
                                <u>PNEUMONIA</u>, IMPOSSIBILITADA DE SE ALIMENTAR POR VIA ORAL</strong></p>
                        
                        
                        <p style="text-align: center;"><strong >Período: 27/07/16</strong></p>
                        
                       
                        <br>
                        <br>
                        <p style="text-align: center;"><strong >_________________________________________________</strong></p>
                        
                        <p style="text-align: center;"><strong>ASSINATURA - CREMEC</strong><p>
                        <br>
                        <p style="text-align: right;"><strong>DATA: _____/_____/_______</strong></p>
                        
                        
                        <br>
                        <br>

                    </td>

                </tr>

            </tbody>

        </table>



    </body>
</html>