
<div class="content ficha_ceatox"> <!-- Inicio da DIV content -->
    <h3 class="h3_title">Produto Prescrição</h3>
    <form name="form_exame" id="form_exame" action="<?= base_url() ?>ambulatorio/exame/gravaralterarprodutoprescricao/<?= $internacao_precricao_produto_id; ?>" method="post">
        <fieldset>
            <legend>Produto Selecionado</legend>
            <div>
                                  
                <input type="hidden" id="txtinternacao" name="internacao_id"  class="texto06" value="<?= $produto['0']->internacao_id; ?>" readonly/>
            </div>
            <div>
                                  
                <input type="hidden" id="txtinternacao" name="etapa_id"  class="texto06" value="<?= $produto['0']->internacao_precricao_etapa_id; ?>" readonly/>
            </div>
            <div>
                <label>Nome</label>                      
                <input type="text" id="txtNome" name="nome"  class="texto05" value="<?= $produto['0']->nome; ?>" readonly/>
            </div>
            <div>
                <label>Etapas</label>
                <input type="text" name="nascimento" id="txtNascimento" class="texto02" alt="date" value="<?= $produto['0']->etapas; ?>"  readonly/>
            </div>
            <div>
                <label>Volume(ml)</label>
                <input type="text" name="nascimento" id="txtNascimento" class="texto02" alt="date" value="<?= $produto['0']->volume; ?>"  readonly/>
            </div>
            <div>
                <label>Vasão</label>
                <input type="text" name="nascimento" id="txtNascimento" class="texto02" alt="date" value="<?= $produto['0']->vasao; ?>"  readonly/>
            </div>
            <div>
                <label>Kcal</label>
                <input type="text" name="nascimento" id="txtNascimento" class="texto02" alt="date" value="<?= $produto['0']->kcal; ?>"  readonly/>
            </div>
            <div>
                <label>Medida</label>
                <input type="text" name="nascimento" id="txtNascimento" class="texto02" alt="date" value="<?= $produto['0']->peso; ?>"  readonly/>
            </div>
             
           

        </fieldset>
        
        
       
        <fieldset>
            <legend>ETAPAS</legend>
            <table>
                <tr>
                    <td>
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

                </tr>

            </table>
        </fieldset>
        
        
        
        <fieldset id="produtoid">
            <legend>PRODUTOS</legend>

            <!-- Início da tabela de Infusão de Drogas -->
            <table id="table_infusao_drogas" border="0">
                <thead>
                    
                       <tr>
                        <td>Produto</td>
                        <td>Medida</td>
                        <td>Descrição</td>
                        <td>Kcal </td>
                        <td>Volume(ml)</td>
                        <td>Vazão</td>
                        <td>&nbsp;</td>
                    </tr>
                </thead>
                <tfoot>
                   
                </tfoot>

                <tbody>
                    <tr class="linha1">
                        <td>
                            
                            <select  name="produto" id="produto" class="size4" >
                                <option  value="-1">Selecione</option>
                                <? foreach ($enteral as $item) : ?>
                                    <option  value="<?= $item->procedimento_convenio_id; ?>"><?= $item->nome; ?></option>
                                <? endforeach; ?>
                            </select>
                        </td>
                        
                        <td><input type="text" name="medida" class="size1" value='' /></td>
                        <td><input type="text" name="descricao" class="size1" value='' /></td>
                        <td><input type="text" name="peso" class="size1" value='' /></td>
                        <td><input type="text" name="volume" class="size1" value='' /></td>
                        <td><input type="text" name="vazao" class="size1" value='' /></td>
                        <td>
                            <a href="#" class="delete">Excluir</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- Fim da tabela de Infusão de Drogas -->
        </fieldset>
       
                                
                            
 <fieldset id="equipoid">
            <legend>EQUIPO</legend>
            <table>
                <tr>
                    <td>&nbsp;</td>
                    <td><label>Observa&ccedil;&atilde;o</label></td>
                </tr>
                <tr>
                    <td>
                        <select name="equipo" id="equipo" class="size4">
                            <option> Selecione</option>
                            <? foreach ($equipo as $item) : ?>
                                <option  value="<?= $item->procedimento_convenio_id; ?>"><?= $item->nome; ?></option>
                            <? endforeach; ?>
                        </select>
                    </td>
                    <td><input type="text" name="observacao" class="size10" /></td>
                </tr>


            </table>
        </fieldset>




        <hr/>
        <button type="submit" name="btnEnviar">Enviar</button>

    </form>





</table>

         

<!--<div class="bt_link_new">
    <a id="finalizar"  href="<?= base_url() ?>internacao/internacao/finalizarprescricaoenteralnormal/<?= $internacao_id; ?>">Finalizar Prescricao

    </a></div>-->



</div> 
<link rel="stylesheet" href="<?= base_url() ?>css/jquery-ui-1.8.5.custom.css">
<script type="text/javascript" src="<?= base_url() ?>js/jquery-1.4.2.min.js" ></script>
<script type="text/javascript" src="<?= base_url() ?>js/jquery-1.9.1.js" ></script>
<script type="text/javascript" src="<?= base_url() ?>js/jquery-ui-1.10.4.js" ></script>
<script type="text/javascript" src="<?= base_url() ?>js/jquery.validate.js"></script>


<? 
if ($produto[0]->grupo!='EQUIPO'){?>
    
 <body onload="deixarOcultoEquipo()">
    
    <?
 
}
else {?>
    
<body onload="deixarOcultoProduto()">
    <?
    
}
?>
<script>
function deixarOcultoEquipo(){
 document.getElementById('produtoid').style.display = "inline";
 document.getElementById('equipoid').style.display = "none";
}

function deixarOcultoProduto(){
 document.getElementById('produtoid').style.display = "none";
 document.getElementById('equipoid').style.display = "inline";
}

</script>


<script type="text/javascript">
    

                    document.form_exame.equipo.focus()

                    $(document).ready(function () {
                        $("body").keypress(function (event) {

                            if (event.keyCode == 118)   // se a tecla apertada for 13 (enter)
                            {
                                document.getElementById('plusInfusao').click();
                            }
                            if (event.keyCode == 119)   // se a tecla apertada for 13 (enter)
                            {
                                document.form_exame.submit()
                            }
                            if (event.keyCode == 121)   // se a tecla apertada for 13 (enter)
                            {
                                document.form_exame.produto.focus()
                            }
                            if (event.keyCode == 120)   // se a tecla apertada for 13 (enter)
                            {
                                document.getElementById('finalizar').click();
                            }
                        });
                    });

                    $(function () {
                        $("#data_solicitacao").datepicker({
                            autosize: true,
                            changeYear: true,
                            changeMonth: true,
                            monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                            dayNamesMin: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
                            buttonImage: '<?= base_url() ?>img/form/date.png',
                            dateFormat: 'dd/mm/yy'
                        });
                    });

                    var idlinha = 2;
                    var classe = 2;

                    $(document).ready(function () {

                        $('#plusInfusao').click(function () {

                            var linha = "<tr class='linha" + classe + "'>";
                            linha += "<td>";
                            linha += "<select  name='produto[" + idlinha + "]' class='size4'>";
                            linha += "<option value='-1'>Selecione</option>";

<?
foreach ($enteral as $item) {
    echo 'linha += "<option value=\'' . $item->procedimento_convenio_id . '\'>' . $item->nome . '</option>";';
}
?>

                            linha += "</select>";
                            linha += "</td>";
                            linha += "<td><input type='text' name='medida[" + idlinha + "]' class='size1' /></td>";
                            linha += "<td><input type='text' name='peso[" + idlinha + "]' class='size1' /></td>";
                            linha += "<td><input type='text' name='volume[" + idlinha + "]' class='size1' /></td>";
                            linha += "<td><input type='text' name='vazao[" + idlinha + "]' class='size1' /></td>";
                            linha += "<td>";
                            linha += "<a href='#' class='delete'>Excluir</a>";
                            linha += "</td>";
                            linha += "</tr>";

                            idlinha++;
                            classe = (classe == 1) ? 2 : 1;
                            $('#table_infusao_drogas').append(linha);
                            addRemove();
                            return false;
                        });

                        $('#plusObs').click(function () {
                            var linha2 = '';
                            idlinha2 = 0;
                            classe2 = 1;

                            linha2 += '<tr class="classe2"><td>';
                            linha2 += '<input type="text" name="DataObs[' + idlinha2 + ']" />';
                            linha2 += '</td><td>';
                            linha2 += '<input type="text" name="DataObs[' + idlinha2 + ']" />';
                            linha2 += '</td><td>';
                            linha2 += '<input type="text" name="DataObs[' + idlinha2 + ']" />';
                            linha2 += '</td><td>';
                            linha2 += '<input type="text" name="DataObs[' + idlinha2 + ']" class="size4" />';
                            linha2 += '</td><td>';
                            linha2 += '<a href="#" class="delete">X</a>';
                            linha2 += '</td></tr>';

                            idlinha2++;
                            classe2 = (classe2 == 1) ? 2 : 1;
                            $('#table_obsserv').append(linha2);
                            addRemove();
                            return false;
                        });

                        function addRemove() {
                            $('.delete').click(function () {
                                $(this).parent().parent().remove();
                                return false;
                            });

                        }
                    });

</script>


