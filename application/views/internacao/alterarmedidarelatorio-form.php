<meta charset="utf-8">
<body bgcolor="#C0C0C0">
    <div class="content"> <!-- Inicio da DIV content -->
        <h3 class="singular">Alterar</h3>
        <div>
            <form name="form_faturar" id="form_faturar" action="<?= base_url() ?>internacao/internacao/gravaralterarmedidaprescricao/<?= $produto['0']->internacao_precricao_produto_id; ?>" method="post">
                <fieldset>
                    <table>
                        <tr>

                            <td style="text-align: left">
                                Medida 
                            </td>
                        </tr>

                        <tr>

                            <td style="text-align: left">
                                <input type="text" name="valorafaturar" id="valorafaturar" size="7" class="texto01" value="<?= $produto['0']->kcal; ?>" readonly />
                                <input type="hidden" name="produto" id="valorafaturar" size="7" class="texto01" value="<?= $produto['0']->produto_id; ?>" readonly />

                            </td>

                        </tr>


                    </table>
                    <br>
                    <br>
                  
                    <table>


                        <tr>
                            
                            
                            <td style="text-align: center">
                               Medida  
                            </td>
                            <td style="text-align: center">
                                Kcal 
                            </td>
                            
                        </tr>

                        <tr>
                            

                            <td style="text-align: left" >
                                <input type="text" name="medida" id="valorajuste1" size="4" value="<? //= $valor;   ?>" />
                            </td>
                            <td style="text-align: left" >
                                <input type="text" name="peso" id="valorajuste1" size="4" value="<? //= $valor;   ?>" />
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