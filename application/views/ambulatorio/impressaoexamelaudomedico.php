<html>
    <head>
        <meta charset="utf-8">
        <link href="<?= base_url() ?>/css/tabelarae.css" rel="stylesheet" type="text/css">
        <title>Laudo Médico</title>
    </head>

    <body>
<table id="tabelaspec" width="80%" border="1" align="center" cellpadding="0" cellspacing="0" class="tipp">
     <tr>
                    <td width="58" height="70" style="font-size: 9px;"><p class="ttr"><strong style="font-weight: normal; text-align: center;"><strong style="font-weight: normal; text-align: left;"><img src="<?= base_url() ?>/img/convenios/<? echo $listar[0]->convenio_id; ?>.jpg" alt="" width="100" height="60" class="ttr"/></strong></strong></p></td>
                    
                    <td height="70" colspan="4" class="ttrl" style="font-size: 10px; font-weight: normal; text-align: center;"><strong><?echo $listar[0]->convenio;?> <br>
                            <?echo $listar[0]->razao_social;?><br>
                            <?echo $listar[0]->logradouro;?> &nbsp;N:&nbsp;<?echo $listar[0]->numero;?>&nbsp;-<?echo $listar[0]->bairro;?> <br>
                            Telefone:<?echo $listar[0]->telefone;?> </strong></td>
                    <td height="70" colspan="2" class="ttl" style="font-size: 15px; font-weight: normal; text-align: right;"><strong><img src="<?= base_url() ?>/img/logofichadeavaliacao.jpg"  width="100" height="40" class="ttr"/></strong></td>
                </tr>
</table>

        <table id="tabelaspec" width="80%" border="1" align="center" cellpadding="0" cellspacing="0" class="tipp">
            <tbody>
                 
               
                <tr class="tic">
                    <td height="13" colspan="7" class="tic"></td>
                </tr>
<!--                <tr>
                    <td height="70" colspan="3" class="sembordadireita"><p class="ttr"><strong style="font-weight: normal; text-align: center;"><strong style="font-weight: normal; text-align: left;"><img src="<?= base_url() ?>/img/convenios/<? echo $listar[0]->convenio_id; ?>.jpg"  width="133" height="49" class="ttr"/></strong></strong></p></td>
                    <td height="70" colspan="3" class="sembordadireitaesquerda"><p style="font-weight: normal; text-align: center;"><strong><? echo $listar[0]->convenio; ?> <br>
                                <? echo $listar[0]->razao_social; ?><br>
                                <? echo $listar[0]->logradouro; ?> &nbsp;N:&nbsp;<? echo $listar[0]->numero; ?>&nbsp;-<? echo $listar[0]->bairro; ?> <br>
                                Telefone:<? echo $listar[0]->telefone; ?></strong>
                            <br></p>
                    </td>
                    <td height="70" colspan="1" class="sembordaesquerda" ><p style="font-weight: normal; text-align: right;"><img src="<?= base_url() ?>/img/logofichadeavaliacao.jpg"  width="100" height="40" class="ttr"/></p></td>
                </tr>-->
                <tr class="tic">
                    <td height="16" colspan="7" class="tisublinhado">LAUDO MÉDICO PARA SOLICITAÇÃO</td>
                </tr>
                <tr>
                    <td height="90" colspan="5" class="sembordadireita">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(&nbsp;&nbsp;)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DIÁRIA DE UTI 
                        <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(&nbsp;&nbsp;)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MUDANÇA DE PROCEDIMENTO
                        <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(&nbsp;&nbsp;)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PRORROGAÇÃO DE INTERNAMENTO
                        <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(&nbsp;&nbsp;)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OUTROS
                    </td>
                    <td height="90" colspan="2" class="sembordaesquerda">(&nbsp;&nbsp;)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;USO DE OXIGENADORES
                        <br>
                        (&nbsp;&nbsp;)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NUTRIÇÃO PARENTAL
                        <br>
                        (&nbsp;&nbsp;)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PROCEDIMENTO DE ALTO CUSTO
                        <br>
                        (<strong>X</strong>)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NUTRIÇÃO ENTERAL <? $ano = substr($listar[0]->data_solicitacao, 0, 4); ?>
                        <? $mes = substr($listar[0]->data_solicitacao, 5, 2); ?>
                        <? $dia = substr($listar[0]->data_solicitacao, 8, 2); ?>
                        <? $datafinal = $dia . '/' . $mes . '/' . $ano; ?>
                        <strong><?php echo$datafinal ?></strong>
                        <br>
                    </td>
                </tr>

            </tbody>

            <tbody>

                <tr>
                    <td height="70" colspan="7" class="sembordadireita"><br>NOME DO PACIENTE: <strong style="text-decoration: underline;"><? echo $listar[0]->nome; ?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N°GIHC: <strong style="text-decoration: underline;"><? echo $listar[0]->aih; ?></strong>
                        <br>
                        <br>
                        CÓDIGO DO USUÁRIO: <strong style="text-decoration: underline;"><? echo $listar[0]->convenionumero; ?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;HOSPITAL: <strong style="text-decoration: underline;"><? echo $listar[0]->hospital; ?></strong>
                        <br>
                        <br>
                        DATA DE INTERNACÃO: <strong style="text-decoration: underline;"><? $ano = substr($listar[0]->data_internacao, 0, 4); ?>
                            <? $mes = substr($listar[0]->data_internacao, 5, 2); ?>
                            <? $dia = substr($listar[0]->data_internacao, 8, 2); ?>
                            <? $datafinal = $dia . '/' . $mes . '/' . $ano; ?>
                            <?php echo$datafinal ?></strong>
                        <br>
                        <br>
                    </td>
            <!--     <td height="70" colspan="1" class="sembordaesquerda">N°GIHC: <strong style="text-decoration: underline;"><? echo $listar[0]->aih; ?></strong>
                        <br>
                        <br>
                        HOSPITAL: <strong style="text-decoration: underline;"><? //echo $listar[0]->hospital; ?></strong>
                        <br></td>-->

                </tr>

            </tbody>
            <tbody>


                <tr>
                    <td height="150" colspan="4" class="sembordadireita"><br>INDICAÇÃO CLINICA:<strong><? echo $listar[0]->diagnostico; ?></strong>
                        <br>
                        <br>
                        INDICAÇÃO P/NE: <strong><? echo $listar[0]->diagnostico_nutricional; ?></strong>
                        <br>
                        <br>
                        DIETA:
                        <? foreach ($listar as $item){?>
                        <?=$item->produto;?>
                        <br>
                        <br>
                            <?}?>
                        
                        
                        <strong><? echo $listar[0]->pla; ?></strong> REGULAMENTADO EM: <? $ano = substr($listar[0]->reg, 0, 4); ?>
                        <? $mes = substr($listar[0]->reg, 5, 2); ?>
                        <? $dia = substr($listar[0]->reg, 8, 2); ?>
                        <? $datafinal = $dia . '/' . $mes . '/' . $ano; ?>
                        <strong><?php echo$datafinal ?></strong>
                        <br>
                        <br>
                        ATENDENTE: <strong><? echo $listar[0]->atendente; ?></strong>
                        <br>
                        <br>
                        PERÍODO: 10/07/16 A 13/07/16
                        <br>
                        <br>
                        DATA: ____/____/_______
                            <br>
                        <br>
                    </td>
                    <td height="150" colspan="3" class="sembordaesquerda"><br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        _________________________________________________
                        <br>
                        ASS.MÉDICO SOLICITANTE
                        <br>

                    </td>


                </tr>

            </tbody>
            <tbody>

                <tr>
                    <td height="16" colspan="7" class="tisemsublinhado" style="text-align: left;">AUDITOR<br><br></td>
                </tr>
                <tr>

                    <td height="100" colspan="5" class="sembordadireita">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  (&nbsp;)BIC (&nbsp;)GRAV&nbsp; &nbsp;<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  (&nbsp;)BIC (&nbsp;)GRAV&nbsp; &nbsp;<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  (&nbsp;)BIC (&nbsp;)GRAV&nbsp; &nbsp;<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  (&nbsp;)BIC (&nbsp;)GRAV&nbsp; &nbsp;<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  (&nbsp;)BIC (&nbsp;)GRAV&nbsp; &nbsp;<br>



                        <br>
                        DATA: ____/____/_______
                        <br>
                        <br>
                        <br>

                    </td>
                    <td height="100" colspan="2" class="sembordaesquerda"><br>
                        <br>
                        <br>
                        <br>
                        <br>
                        _________________________________________________
                        <br>
                        ASS.MÉDICO AUDITOR
                        <br>
                        <br>
                        <br>

                    </td>
                </tr>

            </tbody>

        </table>



    </body>
</html>