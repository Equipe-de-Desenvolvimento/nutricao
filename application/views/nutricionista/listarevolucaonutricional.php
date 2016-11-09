<?
//echo var_dump($internacao_id);
//die;
?>
<div class="content"> <!-- Inicio da DIV content -->

    <div class="bt_link_new">
        <a href="<?php echo base_url() ?>nutricionista/nutricionista/novoevolucaonutricional/<?= $internacao_id ?>">
            Nova Evolução
        </a>
    </div>
    <div id="accordion">
        <h3><a href="#">Evolução Selecionada:</a></h3>
        <div>
            <table><!-- Início da lista de pensionistas -->

                <thead>
                    <tr>
                        <th class="tabela_header">Evolução Prescrição</th>
                        <th class="tabela_header">Período Solicitado</th>
                        <th class="tabela_header"></th>
                        <th class="tabela_header" colspan="3" width="70px"><center>A&ccedil;&otilde;es</center></th>
                </tr>
                </thead>
                <tbody>
           
  

<?
                    
                    if (count($lista) > 0) :
                        $i = 0;
                        $c=0;
                        foreach ($teste as $valor) {
                            if ($i % 2 == 0) : $classe = "tabela_content01";
                            else: $classe = "tabela_content02";
                            endif;
                            //$ficha_id = $item->ficha_id;

                                foreach ($lista as $item) {
                                    if ($valor->internacao_evolucao_id == $item->internacao_evolucao_id) {
                                        
                                        $internacao_evolucao_id = $valor->internacao_evolucao_id;
                                        $data_inicio = $item->data_inicio;
                                        $data_fim = $item->data_fim;
                                        $c++;
                                    }
                                }
                                ?>

                           
                            <tr>
                                <td class="<?= $classe; ?>"><?= $internacao_evolucao_id; ?></td>
                                <td class="<?= $classe; ?>"><?echo $data_inicio1 = substr($data_inicio, 8, 2) . '/' . substr($data_inicio, 5, 2) . '/' . substr($data_inicio, 0, 4);?> A <?echo $data_fim1 = substr($data_fim, 8, 2) . '/' . substr($data_fim, 5, 2) . '/' . substr($data_fim, 0, 4);?></td>
                                <td class="<?= $classe; ?>"></td>
                                <td class="<?= $classe; ?>" width="50px;" ><div class="bt_link_new">
                                        <a  href="<?= base_url() ?>nutricionista/nutricionista/imprimirrevolucaonutricional/<?= $internacao_evolucao_id ?>">Imprimir</a>
                                    </div>
                                </td>
                                <td class="<?= $classe; ?>" width="50px;" ><div class="bt_link_new">
                                        <a onclick="javascript: return confirm('Deseja realmente excluir a Evolução?');" href="<?= base_url() ?>nutricionista/nutricionista/excluirevolucaonutricional/<?= $internacao_evolucao_id; ?>">
                                            <b>Excluir</b>
                                        </a>
                                    </div>    
                                </td>
                            </tr>
                            <?
                            $i++;
                        }
                    else :
                        ?>
                        <tr>
                            <td class="tabela_content01" colspan="4">Sem Avaliação cadastrada.</td>
                        </tr>
                    <? endif; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th class="tabela_footer" colspan="6">Evoluções </th>
                    </tr>
                </tfoot>
            </table><!-- Fim da lista de pensionistas -->
        </div>
        
    
    

  

    </div>
</div> <!-- Final da DIV content -->
<link rel="stylesheet" href="<?= base_url() ?>css/jquery-ui-1.8.5.custom.css">
<script type="text/javascript">

    $(function () {
        $("#servidor").accordion();
        $("#accordion").accordion();
    });

</script>
