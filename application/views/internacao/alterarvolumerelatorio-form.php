<meta charset="utf-8">
<body bgcolor="#C0C0C0">
    <div class="content"> <!-- Inicio da DIV content -->
        <h3 class="singular">Faturar</h3>
        <div>
            <form name="form_faturar" id="form_faturar" action="<?= base_url() ?>internacao/internacao/gravarvolumerelatorio/<?= $internacao_id; ?>" method="post">
                <fieldset>
                    <table>
                        <tr>
                            <td style="text-align: left">
                                Volume por Frasco 
                            </td>

                        </tr>

                        <tr>
                            <td style="text-align: left">
                                <input type ="hidden" name ="tb_internacao_precricao_etapa" value ="<?= $internacao_precricao_etapa_id; ?>" id ="txtinternacao_unidade_id"/>
                                <input type="text" id="volume" name="volume"  class="texto09" value="<?= $volume; ?>" />
                            </td>


                        </tr>


                    </table>
            

                    
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