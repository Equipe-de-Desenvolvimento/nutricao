
<div class="content"> <!-- Inicio da DIV content -->
    <div class="bt_link_new">
        <a href="<?= base_url() ?>estoque/parenteral/novageladeira/">
            Nova Geladeira
        </a>
            </div>
    
    <div id="accordion">
        
        <h3 class="singular"><a href="#">Manter Entrada Parenteral</a></h3>
        <div>
            <table>
                
            </table>
            
            <table>
                <thead>
                
                    
                </form>
                
                <tr>
                    <th class="tabela_header">ID</th>
                    <th class="tabela_header">Geladeira Descrição</th>
                    <th class="tabela_header">&nbsp;</th>
                    <th class="tabela_header"> &nbsp;</th>
                    <th class="tabela_header"></th>
                    <th class="tabela_header" width="70px;" colspan="3"><center>Detalhes</center></th>
                </tr>
                </thead>
                <?php
                $url = $this->utilitario->build_query_params(current_url(), $_GET);
                $consulta = $this->parenteral->listargeladeira($_GET);
                $total = $consulta->count_all_results();
                $limit = 10;
                isset($_GET['per_page']) ? $pagina = $_GET['per_page'] : $pagina = 0;

                if ($total > 0) {
                    ?>
                    <tbody>
                        <?php
                        $lista = $this->parenteral->listargeladeira($_GET)->limit($limit, $pagina)->get()->result();
                        $estilo_linha = "tabela_content01";
                        foreach ($lista as $item) {
                            ($estilo_linha == "tabela_content01") ? $estilo_linha = "tabela_content02" : $estilo_linha = "tabela_content01";
                            ?>
                            <tr>
                                <td class="<?php echo $estilo_linha; ?>"><?= $item->estoque_parenteral_geladeira_id; ?></td>
                                <td class="<?php echo $estilo_linha; ?>"><?= $item->descricao; ?></td>
                                <td class="<?php echo $estilo_linha; ?>">&nbsp;</td>
                                <td class="<?php echo $estilo_linha; ?>">&nbsp;</td>
                                <td class="<?php echo $estilo_linha; ?>">&nbsp;</td>
                                <td class="<?php echo $estilo_linha; ?>" width="70px;"></td>
                                <td class="<?php echo $estilo_linha; ?>" width="70px;">
                                <div class="bt_link_new">                                  
                                    <a href="<?= base_url() ?>estoque/parenteral/alterargeladeiraparenteral/<?= $item->estoque_parenteral_geladeira_id; ?>">Editar</a></div>
                                </td>
                                <td class="<?php echo $estilo_linha; ?>" width="50px;">
                                    <div class="bt_link_new">                                  
                                        <a onclick="return confirm('Você deseja realmente excluir a geladeira?');" href="<?= base_url() ?>estoque/parenteral/excluirgeladeiraparenteral/<?= $item->estoque_parenteral_geladeira_id; ?>">Excluir</a></div>
                                </td>
                            </tr>

                        </tbody>
                        <?php
                    }
                }
                ?>
                <tfoot>
                    <tr>
                        <th class="tabela_footer" colspan="8">
                            <?php $this->utilitario->paginacao($url, $total, $pagina, $limit); ?>
                            Total de registros: <?php echo $total; ?>
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

</div> <!-- Final da DIV content -->
<script type="text/javascript">

                                $(function() {
                                    $("#accordion").accordion();
                                });

</script>
