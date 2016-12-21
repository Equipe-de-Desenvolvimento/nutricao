<div class="content"> <!-- Inicio da DIV content -->

    <div id="accordion">
        <h3 class="singular"><a href="#">Cadastro de valor Procedimento</a></h3>
        <div>
            <form name="form_procedimentoplano" id="form_procedimentoplano" action="<?= base_url() ?>ambulatorio/procedimentoplano/gravar" method="post">

                <dl class="dl_desconto_lista">
                    <input type="hidden" name="txtprocedimentoplanoid" value="<?= @$obj->_procedimento_convenio_id; ?>" />
                    <dt>
                    <label>Procedimento *</label>
                    </dt>
                    <dd>
                        <select name="procedimento" id="procedimento" class="size4">
                            <option value="">Selecione</option>
                            <? foreach ($procedimento as $value) : ?>
                                <option value="<?= $value->procedimento_tuss_id; ?>"<?
                            if (@$obj->_procedimento_tuss_id == $value->procedimento_tuss_id):echo'selected';
                            endif;
                                ?>><?php echo $value->nome; ?></option>
                                    <? endforeach; ?>
                        </select>
                    </dd>
                    <dt>
                    <label>Convenio *</label>
                    </dt>
                    <dd>
                        <select name="convenio" id="convenio" class="size4">
                            <? foreach ($convenio as $value) : ?>
                                <option value="<?= $value->convenio_id; ?>"<?
                            if (@$obj->_convenio_id == $value->convenio_id):echo'selected';
                            endif;
                                ?>><?php echo $value->nome; ?></option>
                                    <? endforeach; ?>
                        </select>
                    </dd>
                    <dt>
                    <label>BRASINDICE</label>
                    </dt>
                    <dd>
                        <input type="text" name="qtdech" id="qtdech" class="texto02" value="<?=@$obj->_qtdech; ?>"/>
                    </dd>
                    <dt>
                    <label>Deflator</label>
                    </dt>
                    <dd>
                        <input type="text" name="valorch" id="valorch" onblur="history.go(0)" class="texto02" value="<?=@$obj->_valorch; ?>"/>
                    </dd>
                    <dt>
                    <label>Volume</label>
                    </dt>
                    <dd>
                        <input type="text" name="volume" id="volume" class="texto02" value="<?=@$obj->_volume; ?>"/>
                    </dd>
                    <dt>
                    <label>Valor TOTAL</label>
                    </dt>
                    <dd>
                        <input type="text" name="valortotal" onkeyup="multiplica()" id="valortotal" class="texto02" value="<?= @$obj->valortotal; ?>" />
                    </dd>

                </dl>    

                <hr/>
                <button type="submit" name="btnEnviar">Enviar</button>
                <button type="reset" name="btnLimpar">Limpar</button>
            </form>
        </div>
    </div>
</div> <!-- Final da DIV content -->
<!--<link rel="stylesheet" href="<?= base_url() ?>css/jquery-ui-1.8.5.custom.css">-->
<!--<script type="text/javascript" src="<?= base_url() ?>js/jquery.validate.js"></script>-->
<!--<script type="text/javascript" src="<?= base_url() ?>js/jquery-verificaCPF.js"></script>-->
<script type="text/javascript" src="<?= base_url() ?>js/jquery-1.9.1.js" ></script>
<script type="text/javascript" src="<?= base_url() ?>js/jquery-ui-1.10.4.js" ></script>
<script type="text/javascript" src="<?= base_url() ?>js/jquery.validate.js"></script>
<script type="text/javascript">
   
            $(function() {
                $('#procedimento').change(function() {
                    if ($(this).val()) {
                        $('.carregando').show();
                        $.getJSON('<?= base_url() ?>autocomplete/procedimentotussvalor', {procedimento: $(this).val(), ajax: true}, function(j) {
                            options = "";
                            options += j[0].valor;
                            document.getElementById("qtdech").value = options;
                            $('.carregando').hide();
                        });
                    } else {
                        $('#qtdech').html('value=""');
                    }
                });
            });

    $(function() {
        $( "#accordion" ).accordion();
    });

//$(document).ready(function(){
//
//    function multiplica()
//    {
//        total=0;
//        numer1 = parseFloat(document.form_procedimentoplano.qtdech.value);
//        numer2 = parseFloat(document.form_procedimentoplano.valorch.value);
//        soma = numer1 * ((100 - numer2)/100);
//        total+= soma;
//        y=total.toFixed(2);
//        $('#valortotal').val(y);
//        //document.form_procedimentoplano.valortotal.value = total;
//    }
//            multiplica();
//           
//            
//    });
    
 

</script>