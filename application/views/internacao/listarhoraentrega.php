

<? if (count($prescricao) > 0) { ?>
    <hr/>
    <table border="1">
    <tr>
        <th colspan="4"><?= $empresa['0']->razao_social; ?></th>
    </tr>

        <tr>
            <th >
                Paciente
            </th>
            <th >
                Sa&iacute;da
            </th>
            <th >
                Chegada
            </th>
        </tr>
            <?

            foreach ($prescricao as $item) {
                ?>

            <tr>
                <td ><?= $item->paciente; ?></td>
                <td width="400px" height="60px">&nbsp;</td>
                <td >&nbsp;</td>

            </tr>
        <? }
        ?>
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