<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<div class="content ficha_ceatox">


    <?
    $etapas = "";
    $i = 0;
    $b = 0;
    $c = 0;
    $pro = "";
    $hc = "";
    $lip = "";
    $vct = "";
    $volume = "";
    $kcal = "";
    $dtpreparo = "";
    $hrpreparo = "09h";
    $dtvalidade = "";
    $hrvalidade = "12h";
    $taxadeinfusao = "";
    $dieta = "";
    $total = count($prescricao);
    $repetidor = 0;
    
    foreach ($prescricao as $key => $item) :
        $i++;
        $c++;
        if ($item->internacao_precricao_etapa_id == $etapas || $i == 1) {
            $dieta = $item->classificacao;
            if ($c == 1) {
                $pro = $item->proteinas;
                $qtdeetapa = $item->etapas;
                $hc = $item->carboidratos;
                $lip = $item->lipidios;
                $vct = $item->kcal;
                $taxadeinfusao = $item->vasao;
                $volume = $item->volume;
                $kcal = $item->kcal;
                $dtpreparo = substr($item->data, 8, 2) . "-" . substr($item->data, 5, 2) . "-" . substr($item->data, 0, 4);
                $dtvalidade = date('d-m-Y', strtotime("+1 days", strtotime($item->data)));
            }

            $etapas = $item->internacao_precricao_etapa_id;
        } else {
            $etapas = $item->internacao_precricao_etapa_id;
            $c = 0;
            $b++;
            for ($repetidor = 1; $repetidor <= $qtdeetapa; $repetidor++) {
                ?>
                <table>
                    <tbody>
                        <tr>
                            <td colspan="2" ><font size = -2><center><b>Nutri&ccedil;&atilde;o Enteral</b></center></td>
                    </tr>
                    <tr>
                        <td  ><font size = -2><b>Paciente: </b><?= $prescricao['0']->paciente; ?></td>
                    </tr>
                    <tr>
                        <td ><font size = -2><b>Hospital: <?= $prescricao['0']->hospital; ?></b></td>
                        <td ><font size = -2><b>Leito/Apto: <?= $prescricao['0']->leito; ?></b></td>
                    </tr>
                    </tbody>
                </table>
                <table>
                    <tbody>
                        <tr>
                            <td colspan="2" ><font size = -2><b>Dieta</b></td>
                            <td colspan="2"><font size = -2><?= $dieta; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2" ><font size = -2><b>Distribui&ccedil;&atilde;o Cal&oacute;rica</b></td>
                            <td ><font size = -2><b>Pro</b></td>
                            <td ><font size = -2><?= $pro; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2" ><font size = -2><b>&nbsp;</b></td>
                            <td ><font size = -2><b>HC</b></td>
                            <td ><font size = -2><?= $hc; ?></td>
                        </tr>
                        <tr>
                            <td ><font size = -2><b>VCT</b></td>
                            <td ><font size = -2><?= $vct; ?></td>
                            <td ><font size = -2><b>Lip</b></td>
                            <td ><font size = -2><?= $lip; ?></td>
                        </tr>
                        <tr>
                            <td ><font size = -2><b>Volume</b></td>
                            <td ><font size = -2><?= $volume; ?></td>
                            <td ><font size = -2><b>Kcal/N2</b></td>
                            <td ><font size = -2><?= $kcal; ?></td>
                        </tr>
                        <tr>
                            <td ><font size = -2><b>Taxa de Infus&atilde;o</b></td>
                            <td ><font size = -2><?= $taxadeinfusao; ?></td>
                            <td ><font size = -2><b>Via de Acesso</b></td>
                            <td ><font size = -2></td>
                        </tr>
                        <tr>
                            <td ><font size = -2><b>Data Preparo</b></td>
                            <td ><font size = -2><?= $dtpreparo; ?></td>
                            <td ><font size = -2><b>Hora Preparo</b></td>
                            <td ><font size = -2><?= $hrpreparo; ?></td>
                        </tr>
                        <tr>
                            <td ><font size = -2><b>Data Validade</b></td>
                            <td ><font size = -2><?= $dtvalidade; ?></td>
                            <td ><font size = -2><b>Hora Validade</b></td>
                            <td ><font size = -2><?= $hrvalidade; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2" ><font size = -2><b>Conservar sob refrigera&ccedil;&atilde;o de 2&SmallCircle; a 8&SmallCircle;</b></td>
                        </tr>

                    </tbody>
                </table>

                <?
            }
            $dieta = $item->classificacao;
            $pro = $item->proteinas;
            $qtdeetapa = $item->etapas;
            $hc = $item->carboidratos;
            $lip = $item->lipidios;
            $vct = $item->kcal;
            $taxadeinfusao = $item->vasao;
            $volume = $item->volume;
            $kcal = $item->kcal;
            $dtpreparo = substr($item->data, 8, 2) . "-" . substr($item->data, 5, 2) . "-" . substr($item->data, 0, 4);
            $dtvalidade = date('d-m-Y', strtotime("+1 days", strtotime($item->data)));
            if ($total == $i) {
                for ($repetidor = 1; $repetidor <= $qtdeetapa; $repetidor++) {
                    ?>
                    <table>
                        <tbody>
                            <tr>
                                <td colspan="2" ><font size = -2><center><b>Nutri&ccedil;&atilde;o Enteral</b></center></td>
                        </tr>
                        <tr>
                            <td  ><font size = -2><b>Paciente: </b><?= $prescricao['0']->paciente; ?></td>
                        </tr>
                        <tr>
                            <td ><font size = -2><b>Hospital: <?= $prescricao['0']->hospital; ?></b></td>
                            <td ><font size = -2><b>Leito/Apto: <?= $prescricao['0']->leito; ?></b></td>
                        </tr>
                        </tbody>
                    </table>
                    <table>
                        <tbody>
                            <tr>
                                <td colspan="2" ><font size = -2><b>Dieta</b></td>
                                <td colspan="2"><font size = -2><?= $dieta; ?></td>
                            </tr>
                            <tr>
                                <td colspan="2" ><font size = -2><b>Distribui&ccedil;&atilde;o Cal&oacute;rica</b></td>
                                <td ><font size = -2><b>Pro</b></td>
                                <td ><font size = -2><?= $pro; ?></td>
                            </tr>
                            <tr>
                                <td colspan="2" ><font size = -2><b>&nbsp;</b></td>
                                <td ><font size = -2><b>HC</b></td>
                                <td ><font size = -2><?= $hc; ?></td>
                            </tr>
                            <tr>
                                <td ><font size = -2><b>VCT</b></td>
                                <td ><font size = -2><?= $vct; ?></td>
                                <td ><font size = -2><b>Lip</b></td>
                                <td ><font size = -2><?= $lip; ?></td>
                            </tr>
                            <tr>
                                <td ><font size = -2><b>Volume</b></td>
                                <td ><font size = -2><?= $volume; ?></td>
                                <td ><font size = -2><b>Kcal/N2</b></td>
                                <td ><font size = -2><?= $kcal; ?></td>
                            </tr>
                            <tr>
                                <td ><font size = -2><b>Taxa de Infus&atilde;o</b></td>
                                <td ><font size = -2><?= $taxadeinfusao; ?></td>
                                <td ><font size = -2><b>Via de Acesso</b></td>
                                <td ><font size = -2></td>
                            </tr>
                            <tr>
                                <td ><font size = -2><b>Data Preparo</b></td>
                                <td ><font size = -2><?= $dtpreparo; ?></td>
                                <td ><font size = -2><b>Hora Preparo</b></td>
                                <td ><font size = -2><?= $hrpreparo; ?></td>
                            </tr>
                            <tr>
                                <td ><font size = -2><b>Data Validade</b></td>
                                <td ><font size = -2><?= $dtvalidade; ?></td>
                                <td ><font size = -2><b>Hora Validade</b></td>
                                <td ><font size = -2><?= $hrvalidade; ?></td>
                            </tr>
                            <tr>
                                <td colspan="2" ><font size = -2><b>Conservar sob refrigera&ccedil;&atilde;o de 2&SmallCircle; a 8&SmallCircle;</b></td>
                            </tr>

                        </tbody>
                    </table>

                    <?
                }
            }
        }
        if ($b == 0 & $item->internacao_precricao_etapa_id == $etapas & $total == $i) {
            for ($repetidor = 1; $repetidor <= $qtdeetapa; $repetidor++) {
                ?>
                <table>
                    <tbody>
                        <tr>
                            <td colspan="2" ><font size = -2><center><b>Nutri&ccedil;&atilde;o Enteral</b></center></td>
                    </tr>
                    <tr>
                        <td  ><font size = -2><b>Paciente: </b><?= $prescricao['0']->paciente; ?></td>
                    </tr>
                    <tr>
                        <td ><font size = -2><b>Hospital: <?= utf8_decode($prescricao['0']->hospital); ?></b></td>
                        <td ><font size = -2><b>Leito/Apto: <?= utf8_decode($prescricao['0']->leito); ?></b></td>
                    </tr>
                    </tbody>
                </table>
                <table>
                    <tbody>
                        <tr>
                            <td colspan="2" ><font size = -2><b>Dieta</b></td>
                            <td colspan="2"><font size = -2><?= $dieta; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2" ><font size = -2><b>Distribui&ccedil;&atilde;o Cal&oacute;rica</b></td>
                            <td ><font size = -2><b>Pro</b></td>
                            <td ><font size = -2><?= $pro; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2" ><font size = -2><b>&nbsp;</b></td>
                            <td ><font size = -2><b>HC</b></td>
                            <td ><font size = -2><?= $hc; ?></td>
                        </tr>
                        <tr>
                            <td ><font size = -2><b>VCT</b></td>
                            <td ><font size = -2><?= $vct; ?></td>
                            <td ><font size = -2><b>Lip</b></td>
                            <td ><font size = -2><?= $lip; ?></td>
                        </tr>
                        <tr>
                            <td ><font size = -2><b>Volume</b></td>
                            <td ><font size = -2><?= $volume; ?></td>
                            <td ><font size = -2><b>Kcal/N2</b></td>
                            <td ><font size = -2><?= $kcal; ?></td>
                        </tr>
                        <tr>
                            <td ><font size = -2><b>Taxa de Infus&atilde;o</b></td>
                            <td ><font size = -2><?= $taxadeinfusao; ?></td>
                            <td ><font size = -2><b>Via de Acesso</b></td>
                            <td ><font size = -2></td>
                        </tr>
                        <tr>
                            <td ><font size = -2><b>Data Preparo</b></td>
                            <td ><font size = -2><?= $dtpreparo; ?></td>
                            <td ><font size = -2><b>Hora Preparo</b></td>
                            <td ><font size = -2><?= $hrpreparo; ?></td>
                        </tr>
                        <tr>
                            <td ><font size = -2><b>Data Validade</b></td>
                            <td ><font size = -2><?= $dtvalidade; ?></td>
                            <td ><font size = -2><b>Hora Validade</b></td>
                            <td ><font size = -2><?= $hrvalidade; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2" ><font size = -2><b>Conservar sob refrigera&ccedil;&atilde;o de 2&SmallCircle; a 8&SmallCircle;</b></td>
                        </tr>

                    </tbody>
                </table>

                <?
            }
        }
        $b = 0;
    endforeach;
    ?>
</div>
