<meta charset="utf-8">
<body bgcolor="#C0C0C0">
    <div class="content"> <!-- Inicio da DIV content -->
        <h3 class="singular">Alterar </h3>
        <div>
            <form name="form_faturar" id="form_faturar" action="<?= base_url() ?>internacao/internacao/gravaralterarhospitalrelatorio/<?= $paciente['0']->internacao_id; ?>" method="post">
                <fieldset>
                    <table>
                        <tr>
                            <td style="text-align: left">
                                Hospital 
                            </td>

                        </tr>

                        <tr>
                            <td style="text-align: left">
                                <input type="hidden" id="txtinternacao" name="etapa_id"  class="texto06" value="<?= $produto['0']->internacao_id; ?>" readonly/>
                                <select  name="hospital" id="hospital" class="size8" >
                                    <option value="-1">Selecione</option>
                                    <? foreach ($unidade as $item) : ?>
                                        <option value="<?= $item->internacao_unidade_id; ?>"<?
                                        if ($paciente['0']->hospital_id == $item->internacao_unidade_id):echo 'selected';
                                        endif;
                                        ?>><?= $item->nome; ?></option>
                                            <? endforeach; ?>
                                </select>

                            </td>

                        </tr>


                    </table>
                    <br>
                    <br>


                    <dl class="dl_desconto_lista">




                        <dd>

                        </dd>
                    </dl>    

                    <hr/>
                    <button type="submit" name="btnEnviar" >Enviar</button>
            </form>
            </fieldset>
        </div>
    </div> <!-- Final da DIV content -->
</body>
<script type="text/javascript" src="<?= base_url() ?>js/jquery-1.4.2.min.js" ></script>
<script type="text/javascript" src="<?= base_url() ?>js/jquery-ui-1.8.5.custom.min.js" ></script>
<script type="text/javascript" src="<?= base_url() ?>js/jquery-meiomask.js" ></script>
<script type="text/javascript" src="<?= base_url() ?>js/jquery.validate.js"></script>
<script type="text/javascript" src="<?= base_url() ?>js/jquery-1.9.1.js" ></script>
<script type="text/javascript" src="<?= base_url() ?>js/jquery-ui-1.10.4.js" ></script>
<script type="text/javascript">

    //    (function($){
    //        $(function(){
    //            $('input:text').setMask();
    //        });
    //    })(jQuery);



</script>