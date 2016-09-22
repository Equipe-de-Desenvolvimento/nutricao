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
            <th colspan="2">
                <font size = -3> Paciente/Prescricao</font>
            </th>
            <th >
                <font size = -3> Equipo</font>
            </th>
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
            $internacao_precricao_etapa_id = "";
            $estilo_linha = "tabela_content01";
            $teste = 0;
            $i = "";
            $b = 0;
            $w = 0;
            $equipo = "";
            $verificaprimeiro = 2;
            $produto = "";
            $vazao = "";
            $kcal = "";
            $volume = "";
            $frasco = "";
            $hospital = "";
            $convenio = "";
            $leito = "";
            $nascimento = "";
            $diagnostico = "";
            $totalregistros = count($prescricao);

            foreach ($prescricoes as $valor) {

                $hospital = $valor->hospital;
                $leito = $valor->leito;
                $nascimento = $valor->nascimento;
                $convenio = $valor->convenio;
                $paciente = $valor->paciente;
                $internacao_precricao_id = $valor->internacao_precricao_id;


                foreach ($prescricao as $item) {

                    if ($internacao_precricao_id == $item->internacao_precricao_id) {
                        $b++;
                        $vazao = $item->vasao;
                        if ($item->volume != "") {
                            $volume = $item->volume . " ml ";
                        } else {
                            $volume = "";
                        }
                        if ($item->frasco != 0) {
                            $frasco = $item->frasco . "ml";
                        } else {
                            $frasco = "";
                        }
                        if ($item->etapas != 0) {
                            $i = $item->etapas;
                        } else {
                            $i = "";
//                        $frasco = "";
                        }
                        if ($item->kcal != "") {
                            $kcal = $item->kcal . " med ";
                        } else {
                            $kcal = "";
                        }



                        if ($b == 1) {
                            $produto = $i . "(" . $volume . $kcal . $item->nome;
                        } else {
                            if ($internacao_precricao_etapa_id == $item->internacao_precricao_etapa_id) {
                                $produto = $produto . "+" . $volume . $kcal . $item->nome . ") " . $frasco;
                                $w++;
                            } elseif($w >0) {
                                $produto = $produto . "+" . $i . "(" . $volume . $kcal . $item->nome . ") " . $frasco;
                            }else{
                                $produto = $produto  . ") " . $frasco2 . "+" . $i . "(" . $volume . $kcal . $item->nome . ") " . $frasco;
                            }
                        }
                        if ($item->frasco != 0) {
                            $frasco2 = $item->frasco . "ml";
                        } else {
                            $frasco2 = "";
                        }
                        $internacao_precricao_etapa_id = $item->internacao_precricao_etapa_id;
                    }

//                    $data = substr($item->data, 8, 2) . '/' . substr($item->data, 5, 2) . '/' . substr($item->data, 0, 4);
                    foreach ($prescricaoequipo as $value) {
                        if ($internacao_precricao_id == $value->internacao_precricao_id) {
                            $equipo = $value->nome;
                        }
                    }
                }
                if($b == 1){
                $produto = $produto  . ") " . $frasco2;
                }
                $b = 0;
                $w = 0;
                ?>
            <tr>
                <?
                if ($vazao == "") {
                    $vazao = '&nbsp;';
                }
                if ($leito == "") {
                    $leito = '&nbsp;';
                }
                if ($produto != '') {
                    $totalpacientes++;
                    ?>
                    <td ><font size = -3><?= utf8_decode($convenio); ?></font></td>
                    <td ><font size = -3><?= utf8_decode($hospital); ?></font></td>
                    <td ><font size = -3><?= utf8_decode($leito); ?></font></td>
                    <td ><font size = -3><?= substr($nascimento, 8, 2) . "/" . substr($nascimento, 5, 2) . "/" . substr($nascimento, 0, 4); ?></font></td>
                    <td ><font size = -3><?= utf8_decode($paciente); ?></font></td>
                    <td ><font size = -3><?= utf8_decode($produto) ?></font></td>
                    <td ><font size = -3><?= $equipo; ?></font></td>
                    <td ><font size = -3><?= $vazao . " ml/h"; ?></font></td>
                </tr>
                <?
            }
            $produto = "";
            ?>

            <?
        }
        ?>
        <tr><th colspan="2" class="tabela_header">Total de Pacientes: <?= $totalpacientes; ?></th><th colspan="6" class="tabela_header">&nbsp;</th></tr>
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