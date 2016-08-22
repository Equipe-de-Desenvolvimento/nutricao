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
                Hospital
            </th>
            <th >
                Leito
            </th>
            <th colspan="5">
                Paciente/Prescricao
            </th>
            <th >
                Diagnostico
            </th>
            <th >
                GET
            </th>
            <th >
                PI(Kg)
            </th>
            <th >
                PTN(g)
            </th>
            <th >
                Na+(mg)
            </th>
            <th >
                K+(MG)
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
            $volume = "";
            $hospital = "";
            $convenio = "";
            $leito = "";
            $diagnostico = "";
            $totalregistros = count($prescricao);
            foreach ($prescricao as $item) {
                $b++;
                if ($verificaprimeiro == 0) {
                    ?>
                <tr>
                    <td ><?= utf8_decode($hospital); ?></td>
                    <td ><?= utf8_decode($leito); ?></td>
                    <td ><?= utf8_decode($paciente); ?></td>
                    <td ><?= utf8_decode($produto); ?></td>
                    <td ><?= $volume; ?></td>
                    <td ><?= $vazao; ?></td>
                    <td ><?= utf8_decode($convenio); ?></td>
                    <td ><?= utf8_decode($diagnostico); ?></td>
                    <td ></td>
                </tr>


                <?
            }
            if ($internacao_precricao_id == "") {
                $verificaprimeiro = 0;
                $i = $item->etapas;
                $paciente = $item->paciente;
                $internacao_id = $item->internacao_id;
                $internacao_precricao_id = $item->internacao_precricao_id;
                $totalpacientes++;
                $produto = $i . " " . $item->nome;
                $vazao = $item->vasao;
                $volume = $item->volume;
                $hospital = $item->hospital;
                $leito = $item->leito;
                $convenio = $item->convenio;
                $diagnostico = $item->diagnostico;
//                    $data = substr($item->data, 8, 2) . '/' . substr($item->data, 5, 2) . '/' . substr($item->data, 0, 4);
                foreach ($prescricaoequipo as $value) {
                    if ($value->internacao_id == $internacao_id) {
                        $equipo = $value->nome;
                    }
                }
            }

            if ($item->internacao_precricao_id != $internacao_precricao_id) {

                if ($verificaprimeiro == 1) {
                    ?>
                    <tr>
                    <td ><?= utf8_decode($hospital); ?></td>
                    <td ><?= utf8_decode($leito); ?></td>
                    <td ><?= utf8_decode($paciente); ?></td>
                    <td ><?= utf8_decode($produto); ?></td>
                    <td ><?= $volume; ?></td>
                    <td ><?= $vazao; ?></td>
                    <td ><?= utf8_decode($convenio); ?></td>
                    <td ><?= utf8_decode($diagnostico); ?></td>
                        <td ></td>
                    </tr>
                    <?
                }
                $verificaprimeiro = 1;
                $i = $item->etapas;
                $internacao_precricao_id = $item->internacao_precricao_id;
                $produto = $i . " " . $item->nome;
                $vazao = $item->vasao;
                $volume = $item->volume;
                $paciente = $item->paciente;
                $internacao_id = $item->internacao_id;
                $hospital = $item->hospital;
                $leito = $item->leito;
                $convenio = $item->convenio;
                $diagnostico = $item->diagnostico;
                $totalpacientes++;
                foreach ($prescricaoequipo as $value) {
                    if ($value->internacao_id == $internacao_id) {
                        $equipo = $value->nome;
                    }
                }
            } elseif ($verificaprimeiro != 0) {
                $i = $item->etapas;
                if ($item->internacao_precricao_etapa_id == $etapas) {
                    $produto = $produto . " + " . $item->nome;
                } else {

                    $produto = $produto . " + " . $i . " " . $item->nome;
                }
            }
            $internacao_precricao_id = $item->internacao_precricao_id;
//        if ($item->internacao_precricao_etapa_id == $etapas) {
//            $i = '&nbsp;';
//            ($estilo_linha == "tabela_content01") ? $estilo_linha = "tabela_content01" : $estilo_linha = "tabela_content02";
//        } else {
//            ($estilo_linha == "tabela_content01") ? $estilo_linha = "tabela_content02" : $estilo_linha = "tabela_content01";
//        }
            if ($b == $totalregistros) {
                ?>
                <tr>
                    <td ><?= utf8_decode($hospital); ?></td>
                    <td ><?= utf8_decode($leito); ?></td>
                    <td ><?= utf8_decode($paciente); ?></td>
                    <td ><?= utf8_decode($produto); ?></td>
                    <td ><?= $volume; ?></td>
                    <td ><?= $vazao; ?></td>
                    <td ><?= utf8_decode($convenio); ?></td>
                    <td ><?= utf8_decode($diagnostico); ?></td>
                    <td ></td>
                </tr>


                <?
            }
            $etapas = $item->internacao_precricao_etapa_id;
        }
        ?>
        <tr><th colspan="2" class="tabela_header">Total de Pacientes: <?= $totalpacientes; ?></th><th colspan="5" class="tabela_header">Total de etapas: <?= $totaletapas; ?></th></tr>
    </table>
<? } ?>


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