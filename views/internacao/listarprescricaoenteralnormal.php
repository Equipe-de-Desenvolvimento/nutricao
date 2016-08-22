<?
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
                Convenio
            </th>
            <th >
                Hospital
            </th>
            <th >
                Leito
            </th>
            <th colspan="2">
                Paciente/Prescricao
            </th>
            <th >
                Equipo
            </th>
            <th >
                Vaz&atildeo
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
            $i = "";
            $b = 0;
            $equipo = "";
            $verificaprimeiro = 2;
            $produto = "";
            $vazao = "";
            $kcal="";
            $volume = "";
            $frasco = "";
            $hospital = "";
            $convenio = "";
            $leito = "";
            $diagnostico = "";
            $totalregistros = count($prescricao);

            foreach ($prescricoes as $valor) {
                $totalpacientes++;
                $hospital = $valor->hospital;
                $leito = $valor->leito;
                $convenio = $valor->convenio;
                $paciente = $valor->paciente;
                $internacao_precricao_id = $valor->internacao_precricao_id;


                foreach ($prescricao as $item) {
                    
                    if ($internacao_precricao_id == $item->internacao_precricao_id) {
                        $b++;
                    $vazao = $item->vasao;
                    if ($item->volume != "") {
                        $volume = $item->volume . " ml ";
                    }else{
                        $volume ="";
                    }
                    if ($item->frasco != 0) {
                        $frasco = $item->frasco . "ml";
                    }else{
                        $frasco = "";
                    }
                    if ($item->etapas != 0) {
                        $i = $item->etapas;
                    }else{
                        $i = "";
                        $frasco = "";
                    }
                    if ($item->kcal != "") {
                        $kcal = $item->kcal . " med ";
                    }else{
                        $kcal = "";
                    }
                    
                    
                    
                    if($b == 1){
                       $produto = $i . "(" . $volume. $kcal . $item->nome. ")" . $frasco; 
                    }else{
                    $produto = $produto . "+" . $i . "(" . $volume.  $kcal .  $item->nome. ")" . $frasco;
                    }
                    }
                    
//                    $data = substr($item->data, 8, 2) . '/' . substr($item->data, 5, 2) . '/' . substr($item->data, 0, 4);
                    foreach ($prescricaoequipo as $value) {
                        if ($internacao_precricao_id == $value->internacao_precricao_id) {
                            $equipo = $value->nome;
                        }
                    }
                    
                }
                $b=0;
                ?>
            <tr>
                <?
                if ($vazao == "") {
                    $vazao = '&nbsp;';
                }
                if ($leito == "") {
                    $leito = '&nbsp;';
                }
                ?>
                <td ><?= utf8_decode($convenio); ?></td>
                <td ><?= utf8_decode($hospital); ?></td>
                <td ><?= utf8_decode($leito); ?></td>
                <td ><?= utf8_decode($paciente); ?></td>
                <td ><?= utf8_decode($produto) ?></td>
                <td ><?= $equipo; ?></td>
                <td ><?= $vazao . " ml/h"; ?></td>
            </tr>
            <?$produto = "";
            ?>

            <?
        }
        ?>
        <tr><th colspan="2" class="tabela_header">Total de Pacientes: <?= $totalpacientes; ?></th><th colspan="5" class="tabela_header">Total de etapas: <?= $totaletapas; ?></th></tr>
    </table>
<? }
?>


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