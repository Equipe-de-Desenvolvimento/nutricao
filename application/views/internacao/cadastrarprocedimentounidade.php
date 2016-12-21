<div class="content ficha_ceatox"> <!-- Inicio da DIV content -->
    <div class="clear"></div>
    <form name="form_menuitens" id="form_menuitens" action="<?= base_url() ?>internacao/internacao/gravarcadastrarprocedimentounidade" method="post">
        <fieldset>
            <legend>Hospital</legend>
            <div>
                <label>Nome</label>
                <input type="hidden" name="internacao_unidade_id" value="<?= $unidade[0]->internacao_unidade_id; ?>" />
                <input type="text" name="txtNome" class="texto10 bestupper" value="<?= $unidade[0]->nome; ?>"  readonly />
            </div>
        </fieldset>
        <fieldset>
            <legend>Cadastrar procedimento</legend>
            <div>
                <label>Procedimento</label>
                <select name="procedimento" id="procedimento" class="size4">
                    <? foreach ($procedimento as $value) : ?>
                        <option value="<?= $value->procedimento_convenio_id; ?>"><?php echo $value->convenio . " - " . $value->procedimento; ?></option>
                    <? endforeach; ?>
                </select>
            </div>
            <div>
                <label>&nbsp;</label>
                <button type="submit" name="btnEnviar">Adicionar</button>
            </div>
    </form>
                </fieldset>
            
        <fieldset>
    <?
    $contador = count($procedimentounidade);
    if ($contador > 0) {
        ?>
        <table id="table_agente_toxico" border="0">
            <thead>

                <tr>
                    <th class="tabela_header">Convenio</th>
                    <th class="tabela_header">Procedimento</th>
                    <th class="tabela_header" colspan="2">&nbsp;</th>
                </tr>
            </thead>
            <?
            $estilo_linha = "tabela_content01";
            foreach ($procedimentounidade as $item) {
                ($estilo_linha == "tabela_content01") ? $estilo_linha = "tabela_content02" : $estilo_linha = "tabela_content01";
                ?>
                <tbody>
                    <tr>
                        <td class="<?php echo $estilo_linha; ?>"><?= $item->convenio; ?></td>
                        <td class="<?php echo $estilo_linha; ?>"><?= $item->procedimento; ?></td>
                        <td class="<?php echo $estilo_linha; ?>" width="100px;"><div class="bt_link">
                            <a href="<?= base_url() ?>internacao/internacao/excluircadastrarprocedimentounidade/<?= $item->internacao_unidade_id; ?>/<?= $item->procedimento_convenio_unidade_id; ?>">excluir
                            </a></div>

                        </td>
                    </tr>

                </tbody>
                <?
            }
        }
        ?>
        <tfoot>
            <tr>
                <th class="tabela_footer" colspan="4">
                </th>
            </tr>
        </tfoot>
    </table> 

</fieldset>
</div> <!-- Final da DIV content -->

<script type="text/javascript" src="<?= base_url() ?>js/jquery.validate.js"></script>
<script type="text/javascript">






    //$(function(){     
    //    $('#exame').change(function(){
    //        exame = $(this).val();
    //        if ( exame === '')
    //            return false;
    //        $.getJSON( <?= base_url() ?>autocomplete/horariosambulatorio, exame, function (data){
    //            var option = new Array();
    //            $.each(data, function(i, obj){
    //                console.log(obl);
    //                option[i] = document.createElement('option');
    //                $( option[i] ).attr( {value : obj.id} );
    //                $( option[i] ).append( obj.nome );
    //                $("select[name='horarios']").append( option[i] );
    //            });
    //        });
    //    });
    //});





    $(function() {
        $( "#accordion" ).accordion();
    });


    $(document).ready(function(){
        jQuery('#form_exametemp').validate( {
            rules: {
                txtNome: {
                    required: true,
                    minlength: 3
                },
                nascimento: {
                    required: true
                },
                idade: {
                    required: true
                }
            },
            messages: {
                txtNome: {
                    required: "*",
                    minlength: "!"
                },
                nascimento: {
                    required: "*"
                },
                idade: {
                    required: "*"
                }
            }
        });
    });

</script>