<div class="content ficha_ceatox"> <!-- Inicio da DIV content -->
    <div>
        <h3 class="h3_title">Prescri&ccedil;&atilde;o</h3>
        <form name="form_exame" id="form_exame" action="<?= base_url() ?>internacao/internacao/gravarprescricaoenteralnormal/<?= $internacao_id ?>" method="post">
            <fieldset>
                <legend>Dados do Pacienete</legend>
                <div>
                    <label>Nome</label>                      
                    <input type="text" id="txtNome" name="nome"  class="texto09" value="<?= $paciente['0']->nome; ?>" readonly/>
                </div>
                <div>
                    <label>Convenio</label>
                    <input type="text" name="nome_mae" id="txtNomeMae" class="texto08" value="<?= $paciente['0']->convenio; ?>" readonly/>
                </div>
                <div>
                    <label>Numero da Carteira</label>
                    <input type="text"  name="nome_pai" id="txtNomePai" class="texto08" value="<?= $paciente['0']->convenionumero; ?>" readonly/>
                </div>
                <div>
                    <label>Leito</label>
                    <input type="text" id="txtCns" name="cns"  class="texto04" value="<?= $paciente['0']->leito; ?>" readonly/>
                </div>
                <div>
                    <label>Hospital</label>
                    <input type="text" id="txtCns" name="cns"  class="texto04" value="<?= $paciente['0']->hospital; ?>" readonly/>
                </div>
                <div>
                    <label>GIH</label>
                    <input type="text" id="txtCns" name="cns"  class="texto04" value="<?= $paciente['0']->aih; ?>" readonly/>
                </div>
                <div class="bt_link">
                    <a onclick="javascript:window.open('<?= base_url() ?>cadastros/pacientes/carregar/<?= $paciente['0']->paciente_id; ?>');">
                        <b>Editar</b>
                    </a></div>
            </fieldset>

                <div class="bt_link_new">
                    <a id="rep" href="<?= base_url() ?>internacao/internacao/repetirultimaprescicaoenteralnormal/<?= $internacao_id; ?>">Rep. Ultima Prescricao

                    </a></div>
                <div class="bt_link_new">
                    <a id="nova" href="<?= base_url() ?>internacao/internacao/prescricaonormalenteral/<?= $internacao_id; ?>">NOVA PRESCRICAO

                    </a></div>
                <div class="bt_link_new">
                    <a id="repaltera" href="<?= base_url() ?>internacao/internacao/repetirultimaprescicaoenteralnormalealterar/<?= $internacao_id; ?>">Ult. Prescricao / Alterar

                    </a></div>
                <div class="bt_link_new">
                    <a id="alterar" href="<?= base_url() ?>internacao/internacao/alterarnormalenteral/<?= $internacao_id; ?>">ALTERAR PRESCRICAO

                    </a></div>

            <br>
            <br>
            <br>

            <table border="1">
                <tr>
                    <th>Tecla</th>
                    <th>Bot&atilde;o Fun&ccedil;&atilde;o</th>
                </tr>
                <tr>
                    <td>F7</td>
                    <td>Bot&atilde;o Rep. Ultima Prescricao</td>
                </tr>
                <tr>
                    <td>F8</td>
                    <td>Bot&atilde;o NOVA PRESCRICAO</td>
                </tr>
                <tr>
                    <td>F9</td>
                    <td>Bot&atilde;o Ult. Prescricao / Alterar</td>
                </tr>
                <tr>
                    <td>F10</td>
                    <td>Bot&atilde;o ALTERAR PRESCRICAO</td>
                </tr>
            </table>
    </div>
</div> 
<link rel="stylesheet" href="<?= base_url() ?>css/jquery-ui-1.8.5.custom.css">
<script type="text/javascript" src="<?= base_url() ?>js/jquery-1.4.2.min.js" ></script>
<script type="text/javascript" src="<?= base_url() ?>js/jquery-1.9.1.js" ></script>
<script type="text/javascript" src="<?= base_url() ?>js/jquery-ui-1.10.4.js" ></script>
<script type="text/javascript" src="<?= base_url() ?>js/jquery.validate.js"></script>
<script type="text/javascript">

                        $(document).ready(function() {
                            $("body").keypress(function(event) {
                                if (event.keyCode == 118)   // se a tecla apertada for 13 (enter)
                                {
                                    document.getElementById('rep').click();
                                }
                                if (event.keyCode == 119)   // se a tecla apertada for 13 (enter)
                                {
                                    document.getElementById('nova').click();
                                }
                                if (event.keyCode == 120)   // se a tecla apertada for 13 (enter)
                                {
                                    document.getElementById('repaltera').click();
                                }
                                if (event.keyCode == 121)   // se a tecla apertada for 13 (enter)
                                {
                                    document.getElementById('alterar').click();
                                }
                            });
                        });


</script>