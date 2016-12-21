<table border="1">
    <tr>
        <th colspan="4"><?= utf8_decode($empresa['0']->razao_social); ?></th>
    </tr>
    <tr>
        <th width="300px">Nome</th>
        <th width="150px">Convenio</th>
        <th width="150px">Hospital</th>
        <th width="95px">Leito</th>
    </tr>
    <tr>
        <td><?= utf8_decode($paciente['0']->nome); ?> </td>
        <td><?= utf8_decode($paciente['0']->convenio); ?> </td>
        <td><?= utf8_decode($paciente['0']->hospital); ?></td>
        <td><?= utf8_decode($paciente['0']->leito); ?> </td>
    </tr>
    </table>
<br>
    <table border="1">
    <tr>
        <td ><center>Nutri&ccedil;&atilde;o</center></td>
        <td><center>Responsavel</center></td>
        <td><center>Data/Hora</center></td>
    </tr>
   <?for ($index = 1; $index <= 16; $index++) {?>
    <tr>
        <td width="400px" height="60px">&nbsp;</td>
        <td width="150px" >&nbsp;</td>
        <td width="150px" >&nbsp;</td>
    </tr>
   <?}?>
</table>
