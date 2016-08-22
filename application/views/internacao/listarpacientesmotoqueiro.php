<div class="content"> <!-- Inicio da DIV content -->
    <?
    $unidade = $this->unidade_m->listaunidades();
    ?>

    <div id="accordion">
        <h3><a href="#">Manter Pacientes Internados</a></h3>
        <div>
            <table>
                <thead>
                    <tr>
                        <th class="tabela_title" colspan="2">

                        </th>
                        <th class="tabela_title" >Hospital</th>
                    </tr>
                    <tr>
                        <th class="tabela_title" colspan="2">
                            Lista de Internacoes</th>
                <form method="get" action="<?php echo base_url() ?>internacao/internacao/listarmotoqueiro">
                    <th class="tabela_title">
                        <select name="hospital" id="sala" class="size2">
                            <option value=""></option>
                            <? foreach ($unidade as $value) : ?>
                                <option value="<?= $value->internacao_unidade_id; ?>" <?
                                if (@$_GET['hospital'] == $value->internacao_unidade_id):echo 'selected';
                                endif;
                                ?>><?php echo $value->nome; ?></option>
                                    <? endforeach; ?>
                        </select>
                    </th>
                    <th class="tabela_title" > <button type="submit" name="enviar">Pesquisar</button>
                </form>
                </th>
                </tr>
                <tr>
                    <th class="tabela_header">Prontuario</th>
                    <th class="tabela_header">Nome</th>
                    <th class="tabela_header">Data da internacao</th>
                    <th class="tabela_header" width="30px;"><center></center></th>

                </tr>
                </thead>
                <?php
                $url = $this->utilitario->build_query_params(current_url(), $_GET);
                $consulta = $this->internacao_m->listarpacientesprescricao($_GET);
                $total = $consulta->count_all_results();
                $limit = 10;
                isset($_GET['per_page']) ? $pagina = $_GET['per_page'] : $pagina = 0;

                if ($total > 0) {
                    ?>
                    <tbody>
                        <?php
                        $lista = $this->internacao_m->listarpacientesprescricao($_GET)->orderby('p.nome')->limit($limit, $pagina)->get()->result();
                        $estilo_linha = "tabela_content01";
                        foreach ($lista as $item) {
                            ($estilo_linha == "tabela_content01") ? $estilo_linha = "tabela_content02" : $estilo_linha = "tabela_content01";
                            ?>
                            <tr>
                                <td class="<?php echo $estilo_linha; ?>"><?php echo $item->paciente_id; ?></td>
                                <td class="<?php echo $estilo_linha; ?>"><?php echo $item->nome; ?></td>
                                <td class="<?php echo $estilo_linha; ?>"><?php echo substr($item->data_internacao, 8, 2) . '-' . substr($item->data_internacao, 5, 2) . '-' . substr($item->data_internacao, 0, 4) . ' ' . substr($item->data_internacao, 11, 8); ?></td>
                                <td class="<?php echo $estilo_linha; ?>" width="60px;"><div class="bt_link_new">
                                        <a href="<?= base_url() ?>internacao/internacao/relatorioentrega/<?= $item->internacao_id ?>">Rel. Entrega</a></div>
                                </td>
                            </tr>
                        </tbody>
                        <?php
                    }
                }
                ?>
                <tfoot>
                    <tr>
                        <th class="tabela_footer" colspan="7">
                            <?php $this->utilitario->paginacao($url, $total, $pagina, $limit); ?>
                            Total de registros: <?php echo $total; ?>
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <?if(@$_GET['hospital'] != ""){?>
    <div class="bt_link_new">
        <a href="<?= base_url() ?>internacao/internacao/gerarelatoriohoraentrega/<?= @$_GET['hospital'] ?>">Rel. Hora Entrega</a></div>
    <?}?>
</div> <!-- Final da DIV content -->
<link rel="stylesheet" href="<?php base_url() ?>css/jquery-ui-1.8.5.custom.css">
<script type="text/javascript">

                        $(function() {
                            $("#accordion").accordion();
                        });

</script>