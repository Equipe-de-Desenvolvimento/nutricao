<div class="content ficha_ceatox"> <!-- Inicio da DIV content -->
    <table>
        <tbody>
            <? $i = 0; ?>
            <tr>
                <td  width="300px;"><div class="bt_link_newgrande">
                        <a href="<?= base_url() ?>internacao/internacao/prescricaoemergencialenteral/<?= $internacao_id; ?>">SOBRE AVISO</a>

                    </div>
                </td>

                <td  width="300px;"><div class="bt_link_newgrande">
                        <a id="normal" href="<?= base_url() ?>internacao/internacao/prescricaonormalenteraltrabalho/<?= $internacao_id; ?>">NORMAL

                        </a></div>
                </td>
                <td  width="300px;"><div class="bt_link_newgrande">
                        <a id="normal" href="<?= base_url() ?>internacao/internacao/fichadeavaliacao/<?= $internacao_id; ?>">FICHA DE AVALIAÇÃO

                        </a></div>
                </td>
            </tr>
            <tr>
                <?
                foreach ($saida as $item) :
                    $i++;
                    ?>
                    <td  width="300px;"><div class="bt_link_newgrande">
                            <a href="<?= base_url() ?>internacao/internacao/gravarsaida/<?= $internacao_id; ?>/<?= $item->internacao_saida_id; ?>"><?= $item->nome; ?></a>

                        </div>
                    </td>
                    <?
                    if ($i == 3) {
                        $i = 0;
                        ?>
                    </tr>
                <? } ?>
            <? endforeach; ?>
        </tbody>
    </table>
    <br>
    <br>
    <br>
    <table border="1">
        <tr>
            <th>Tecla</th>
            <th>Fun&ccedil;&atilde;o</th>
        </tr>
        <tr>
            <td>F8</td>
            <td>Bot&atilde;o Normal</td>
        </tr>
    </table>

</div> <!-- Final da DIV content -->
<link rel="stylesheet" href="<?= base_url() ?>css/jquery-ui-1.8.5.custom.css">
<script type="text/javascript" src="<?= base_url() ?>js/jquery-1.4.2.min.js" ></script>
<script type="text/javascript" src="<?= base_url() ?>js/jquery-1.9.1.js" ></script>
<script type="text/javascript" src="<?= base_url() ?>js/jquery-ui-1.10.4.js" ></script>
<script type="text/javascript" src="<?= base_url() ?>js/jquery.validate.js"></script>
<script type="text/javascript">

    $(document).ready(function () {
        $("body").keypress(function (event) {

            if (event.keyCode == 119)   // se a tecla apertada for 13 (enter)
            {
                document.getElementById('normal').click();
//                                
            }

        });
    });



</script>