<meta charset="utf-8">
<? 
//echo '<pre>';
//var_dump($prescricao);
//die;
IF ($tipo == 'ENTERALNORMAL') {
    $impressaotipo = 'ENTERAL NORMAL';
} else {
    $impressaotipo = 'ENTERAL EMERGENCIA';
    
}
?>

<div class="content ficha_ceatox"> <!-- Inicio da DIV content -->
    <h4 class="title_relatorio">Pacientes Hospitais</h4>
    <p></p>
    <h4 class="title_relatorio">Inicio: <?= $data_inicio; ?> - Fim: <?= $data_fim; ?> </h4>
    <h4 class="title_relatorio">TIPO: <?= $impressaotipo; ?> </h4>

</table>
<? if (count($prescricao) > 0) { ?>
    <hr/>
    <table border="1">
        <tr>
            <th >
                <font size = -3>Convenio</font>
            </th>
            <th >
                <font size = -3>Hospital</font>
            </th>
            <th >
                <font size = -3>Leito</font>
            </th>
            <th >
                <font size = -3>Nascimento</font>
            </th>
            <th >
                <font size = -3> Paciente</font>
            </th>
            <th >
                <font size = -3> Dt de Prescrição</font>
            </th>
            <th >
                <font size = -3> Prescricao</font>
            </th>
            <th >
                <font size = -3> ml p/ frasco</font>
            </th>
            <th >
                <font size = -3> Equipo</font>
            </th>
<!--            <th >
                <font size = -3> Observação</font>
            </th>-->
            <th >
                <font size = -3> Vaz&atildeo</font>
            </th>

        </tr>
        <tr>
            <?
            $totaletapas = 0;
            $totalpacientes = 0;
            $paciente = "";
            $internacao_id = "";
            $etapas = "";
            $internacao_precricao_id = "";
            $estilo_linha = "tabela_content01";
            $teste = 0;
            foreach ($prescricao as $item) {
//                echo '<pre>';
//                var_dump($prescricao); die; 
                $i = $item->etapas;
                if ($item->internacao_precricao_id != $internacao_precricao_id) {
                    $paciente = $item->paciente;
                    $internacao_id = $item->internacao_id;
                    $totalpacientes ++;
                    $data = substr($item->data, 8, 2) . '/' . substr($item->data, 5, 2) . '/' . substr($item->data, 0, 4);
                    $internacao_precricao_id = $item->internacao_precricao_id;
                    foreach ($prescricaoequipo as $value) {
                        if ($value->internacao_precricao_id == $internacao_precricao_id) {
                        $equipo = $value->nome;
                        $equipo_id = $value->internacao_precricao_produto_id;
                        }
                    }
                     $frasco = $item->frasco . "ml";
                }
 
                 else {
                    $frasco = '&nbsp;';
                    
                }
               
                    $paciente = $item->paciente;
                    $convenio = $item->convenio;
                    $hospital = $item->hospital;
                    $leito = $item->leito;
                    if ($item->volume != ''){
                        $produto =  $item->etapas . " "  .  "Etapas de  "  .  $item->nome . " " . " " . $item->volume . "ml " ;
                    }
                    else {
                        $produto =  $item->etapas . " "  .  "Etapas de  "  .  $item->nome . " " . " " . $item->volume ;
                    }
//                    $internacao_id = $item->internacao_id;
//                    $totalpacientes ++;
                    $data_prescricao = substr($item->data, 8, 2) . '/' . substr($item->data, 5, 2) . '/' . substr($item->data, 0, 4);
//                    $data = substr($item->nascimento, 8, 2) . '/' . substr($item->nascimento, 5, 2) . '/' . substr($item->nascimento, 0, 4);
//                    $internacao_precricao_id = $item->internacao_precricao_id;
//                    foreach ($prescricaoequipo as $value) {
//                        if ($value->$internacao_precricao_id != $internacao_id$internacao_precricao_id) {
//                        $equipo = $value->nome;
//                        $equipo_id = $value->internacao_precricao_produto_id;
//                        }
//                    }
 
                $totaletapas = $totaletapas + $i;
                ?>
            <tr>
                <td ><font size = -3><?= $convenio ?></font></td>
                <td ><font size = -3><?= $hospital; ?></font></td>
                <td ><font size = -3><?= $leito; ?></font></td>
                <td ><font size = -3><?= $data; ?></font></td>
                <td ><font size = -3><?= $paciente; ?></font></td>
                <td ><font size = -3><?= $data_prescricao; ?></font></td>
                
                <td ><a style="cursor: pointer;" onclick="javascript:window.open('<?= base_url() . "internacao/internacao/alterarprodutorelatorio/$item->internacao_id/$item->internacao_precricao_produto_id"; ?> ', '_blank', 'toolbar=no,Location=no,menubar=no,width=1000,height=600');"><font size = -3><?= $produto; ?></font></a></td>
                <td ><a style="cursor: pointer;" onclick="javascript:window.open('<?= base_url() . "internacao/internacao/alterarvolumerelatorio/$item->internacao_id/$item->internacao_precricao_produto_id"; ?> ', '_blank', 'toolbar=no,Location=no,menubar=no,width=1000,height=600');"><font size = -3><?= $frasco  ?></font></a></td>
                <td ><a style="cursor: pointer;" onclick="javascript:window.open('<?= base_url() . "internacao/internacao/alterarequiporelatorio/$item->internacao_id/$equipo_id"; ?> ', '_blank', 'toolbar=no,Location=no,menubar=no,width=1000,height=600');"><font size = -3><?= $equipo  ?></font></a></td>
                <!--<td ><font size = -3><?= $item->observacao; ?></font></td>-->
                <td ><font size = -3><?= $item->vasao; ?></font></td>
            </tr>
            <?
            $i++;
            $etapas = $item->internacao_precricao_etapa_id;
            $equipo = "";
        }
      
          
        }
        ?>
        <tr><th colspan="9" class="tabela_header">Total de Prescrições: <?= $totalpacientes; ?></th></tr>
    </table>



</div> 
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<!-- Reset de CSS para garantir o funcionamento do layout em todos os brownsers -->
<!--<link href="<?= base_url() ?>css/reset.css" rel="stylesheet" type="text/css" />


<link href="<?= base_url() ?>css/form.css" rel="stylesheet" type="text/css" />

<link href="<?= base_url() ?>css/jquery-ui-1.8.5.custom.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>css/jquery-treeview.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?= base_url() ?>css/jquery-ui-1.8.5.custom.css">-->
<script type="text/javascript" src="<?= base_url() ?>js/jquery-1.9.1.js" ></script>
<script type="text/javascript" src="<?= base_url() ?>js/jquery-ui-1.10.4.js" ></script>
<script type="text/javascript" src="<?= base_url() ?>js/jquery.validate.js"></script>
<script type="text/javascript">

</script>