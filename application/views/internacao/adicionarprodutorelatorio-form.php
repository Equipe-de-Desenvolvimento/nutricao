<meta charset="utf-8">
<body bgcolor="#C0C0C0">
    <div class="content"> <!-- Inicio da DIV content -->
        <h3 class="singular">Alterar</h3>
        <div>
            <form name="form_faturar" id="form_faturar" action="<?= base_url() ?>internacao/internacao/gravaralterarprodutoprescricao/<?= $produto['0']->internacao_precricao_produto_id; ?>" method="post">
                <fieldset>

                    <table>
                       <tr>
                            <td style="text-align: center;">
                                Etapas 
                            </td>
                            <td style="text-align: center">
                                Produto 
                            </td>

                            <td style="text-align: center">
                                Medida 
                            </td>
                            <td style="text-align: center">
                                Descrição 
                            </td>
                            <td style="text-align: center">
                                Kcal 
                            </td>
                            <td style="text-align: center">
                                Volume(ml) 
                            </td>
                            <td style="text-align: center">
                                Vazão 
                            </td>
                            <td style="text-align: center">
                                &nbsp;
                            </td>
                        </tr>

                        <tr>
                            <td style="text-align: left">
                                <select name="etapas" id="etapas" class="size1" >
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                </select>
                            </td>
                            <td style="text-align: left" >
                                <select  name="produto" id="produto" class="size4" >
                                    <option  value="-1">Selecione</option>
                                    <? foreach ($enteral as $item) : ?>
                                        <option  value="<?= $item->procedimento_convenio_id; ?>"><?= $item->nome; ?></option>
                                    <? endforeach; ?>
                                </select>
                            </td>
                            <td style="text-align: left">
                                <input type="text" name="medida" id="ajuste1" size="3" value="<? //= $valor;   ?>" />
                            </td>
                            <td style="text-align: left" >
                                <input type="text" name="descricao" id="valorajuste1" size="4" value="<? //= $valor;   ?>" />
                            </td>
                            <td style="text-align: left" >
                                <input type="text" name="peso" id="valorajuste1" size="4" value="<? //= $valor;   ?>" />
                            </td>
                            <td style="text-align: left" >
                                <input type="text" name="volume" id="valorajuste1" size="4" value="<? //= $valor;   ?>" />
                            </td>
                            <td style="text-align: left" >
                                <input type="text" name="vazao" id="valorajuste1" size="4" value="<? //= $valor;   ?>" />
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