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
    $nascimento = "";
    $total = count($prescricao);
    $repetidor = 0;
    $classificacao = "";
    $verificador = 0;

    foreach ($prescricao as $key => $item) :
        $i++;
        $c++;
        $teste = $this->internacao_m->etiquetapacienteclassificacao($item->internacao_precricao_etapa_id);
        $classificacaototal = count($teste);
        foreach ($teste as $key => $value) :
            $verificador++;
            if ($classificacaototal >= $verificador) {
                $dieta = $dieta . " + " . $value->classificacao;
            }
        endforeach;
        if ($item->internacao_precricao_etapa_id == $etapas || $i == 1) {

            if ($c == 1) {
                if ($item->etapas != 0) {
                    $qtdeetapa = $item->etapas;
                }
                $nutricionista = $item->nutricionista;
                $conselho = $item->conselho;
                if ($item->dencidade_calorica != 0.00) {
                    $pro = $item->proteinas;
                    $hc = $item->carboidratos;
                    $lip = $item->lipidios;
                    $via = $item->via;
                    $vct = (float) $item->dencidade_calorica * $item->volume;
//                $vct = 0;
                    $taxadeinfusao = $item->vasao;
                    $volume = $item->volume;
                    $kcal = $item->kcal;
                    $hrpreparo = $item->preparo;
                    $hrvalidade = $item->validade;
                    $nascimento = substr($item->nascimento, 8, 2) . "-" . substr($item->nascimento, 5, 2) . "-" . substr($item->nascimento, 0, 4);
                    $dtpreparo = substr($item->data, 8, 2) . "-" . substr($item->data, 5, 2) . "-" . substr($item->data, 0, 4);
                    $dtvalidade = date('d-m-Y', strtotime("+1 days", strtotime($item->data)));
                }
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
                            <td colspan="2" ><font size = -1><img src="<?= base_url() ?>/img/logonvtro.jpg"  width="133" height="40" class="ttr"/></td>
                        </tr>
                        <tr>
                            <td  ><font size = -1><b>Paciente: </b><?= $prescricao['0']->paciente; ?></td>
                            <td  ><font size = -1><b>   DN: </b><?= $nascimento ?></td>
                        </tr>
                        <tr>
                            <td ><font size = -1><b>Hospital: <?= $prescricao['0']->hospital; ?></b></td>
                            <td ><font size = -1><b>Leito/Apto: <?= $prescricao['0']->leito; ?></b></td>
                        </tr>
                    </tbody>
                </table>
                <table>
                    <tbody>
                        <tr>
                            <td colspan="2" ><font size = -1><b>Dieta</b></td>
                            <td colspan="2"><font size = -1><?= $dieta; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2" ><font size = -1><b>Distribui&ccedil;&atilde;o Cal&oacute;rica</b></td>
                            <td ><font size = -1><b>Pro</b></td>
                            <td ><font size = -1><?= $pro; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2" ><font size = -1><b>&nbsp;</b></td>
                            <td ><font size = -1><b>HC</b></td>
                            <td ><font size = -1><?= $hc; ?></td>
                        </tr>
                        <tr>
                            <td ><font size = -1><b>VCT</b></td>
                            <td ><font size = -1><?= $vct; ?> Kcal</td>
                            <td ><font size = -1><b>Lip</b></td>
                            <td ><font size = -1><?= $lip; ?></td>
                        </tr>
                        <tr>
                            <td ><font size = -1><b>Volume</b></td>
                            <td ><font size = -1><?= $volume; ?> ml</td>
                            <td ><font size = -1><b>Kcal/N2</b></td>
                            <td ><font size = -1><?= $kcal; ?></td>
                        </tr>
                        <tr>
                            <td ><font size = -1><b>Taxa de Infus&atilde;o</b></td>
                            <td ><font size = -1><?= $taxadeinfusao; ?></td>
                            <td ><font size = -1><b>Via de Acesso</b></td>
                            <td ><font size = -1><?= $via; ?></td>
                        </tr>
                        <tr>
                            <td ><font size = -1><b>Validade</b></td>
                            <td ><font size = -1>Ap&oacute;s aberto, 24horas</td>
                            <td ><font size = -1><b></b></td>
                            <td ><font size = -1></td>
                        </tr>
                        <tr>
                            <td ><font size = -1><b></b></td>
                            <td ><font size = -1></td>
                            <td ><font size = -1><b></b></td>
                            <td ><font size = -1></td>
                        </tr>
                        <tr>
                            <td colspan="2" ><font size = -1><b></b></td>
                        </tr>
                        <tr>
                            <td colspan="3" ><font size = -1><b>Nutricionista/CRN <?= $nutricionista . '  ' . $conselho; ?> </b></td>
                        </tr>
                        <tr>
                            <td colspan="3" ><font size = -1>&nbsp; </b></td>
                        </tr>

                    </tbody>
                </table>

                <?
            }
            $dieta = "";
            $verificador = 0;
            $teste = $this->internacao_m->etiquetapacienteclassificacao($item->internacao_precricao_etapa_id);
            $classificacaototal = count($teste);
            if ($classificacaototal == 1) {
                $dieta = $teste[0]->classificacao;
            } else {
                foreach ($teste as $key => $value) :
                    $verificador++;
                    if ($item->internacao_precricao_etapa_id == $etapas) {
                        if ($classificacaototal >= $verificador) {
                            $dieta = $dieta . " + " . $value->classificacao;
                        }
                    }
                endforeach;
            }
            if ($item->etapas != 0) {
                $qtdeetapa = $item->etapas;
            }
            $nutricionista = $item->nutricionista;
            $conselho = $item->conselho;
            if ($item->dencidade_calorica != 0.00) {
                $pro = $item->proteinas;
                $hc = $item->carboidratos;
                $lip = $item->lipidios;
                $via = $item->via;
                $vct = (float) $item->dencidade_calorica * $item->volume;
//                $vct = 0;
                $taxadeinfusao = $item->vasao;
                $volume = $item->volume;
                $kcal = $item->kcal;
                $hrpreparo = $item->preparo;
                $hrvalidade = $item->validade;
                $nascimento = substr($item->nascimento, 8, 2) . "-" . substr($item->nascimento, 5, 2) . "-" . substr($item->nascimento, 0, 4);
                $dtpreparo = substr($item->data, 8, 2) . "-" . substr($item->data, 5, 2) . "-" . substr($item->data, 0, 4);
                $dtvalidade = date('d-m-Y', strtotime("+1 days", strtotime($item->data)));
            } else {
                $pro = '';
                $hc = '';
                $lip = '';
                $via = '';
                $vct = '';
//                $vct = 0;
                $taxadeinfusao = '';
                $volume = '';
                $kcal = '';
                $hrpreparo = '';
                $hrvalidade = '';
                $nascimento = substr($item->nascimento, 8, 2) . "-" . substr($item->nascimento, 5, 2) . "-" . substr($item->nascimento, 0, 4);
                $dtpreparo = substr($item->data, 8, 2) . "-" . substr($item->data, 5, 2) . "-" . substr($item->data, 0, 4);
                $dtvalidade = date('d-m-Y', strtotime("+1 days", strtotime($item->data)));
            }
            if ($total == $i) {
                for ($repetidor = 1; $repetidor <= $qtdeetapa; $repetidor++) {
                    ?>
                    <table>
                        <tbody>
                            <tr>
                                <td colspan="2" ><font size = -1><img src="<?= base_url() ?>/img/logonvtro.jpg"  width="133" height="40" class="ttr"/></td>
                            </tr>
                            <tr>
                                <td  ><font size = -1><b>Paciente: </b><?= $prescricao['0']->paciente; ?></td>
                                <td  ><font size = -1><b>   DN: </b><?= $nascimento ?></td>
                            </tr>
                            <tr>
                                <td ><font size = -1><b>Hospital: <?= $prescricao['0']->hospital; ?></b></td>
                                <td ><font size = -1><b>Leito/Apto: <?= $prescricao['0']->leito; ?></b></td>
                            </tr>
                        </tbody>
                    </table>
                    <table>
                        <tbody>
                            <tr>
                                <td colspan="2" ><font size = -1><b>Dieta</b></td>
                                <td colspan="2"><font size = -1><?= $dieta; ?></td>
                            </tr>
                            <tr>
                                <td colspan="2" ><font size = -1><b>Distribui&ccedil;&atilde;o Cal&oacute;rica</b></td>
                                <td ><font size = -1><b>Pro</b></td>
                                <td ><font size = -1><?= $pro; ?></td>
                            </tr>
                            <tr>
                                <td colspan="2" ><font size = -1><b>&nbsp;</b></td>
                                <td ><font size = -1><b>HC</b></td>
                                <td ><font size = -1><?= $hc; ?></td>
                            </tr>
                            <tr>
                                <td ><font size = -1><b>VCT</b></td>
                                <td ><font size = -1><?= $vct; ?> Kcal</td>
                                <td ><font size = -1><b>Lip</b></td>
                                <td ><font size = -1><?= $lip; ?></td>
                            </tr>
                            <tr>
                                <td ><font size = -1><b>Volume</b></td>
                                <td ><font size = -1><?= $volume; ?> ml</td>
                                <td ><font size = -1><b>Kcal/N2</b></td>
                                <td ><font size = -1><?= $kcal; ?></td>
                            </tr>
                            <tr>
                                <td ><font size = -1><b>Taxa de Infus&atilde;o</b></td>
                                <td ><font size = -1><?= $taxadeinfusao; ?></td>
                                <td ><font size = -1><b>Via de Acesso</b></td>
                                <td ><font size = -1><?= $via; ?></td>
                            <tr>
                                <td ><font size = -1><b>Validade</b></td>
                                <td ><font size = -1>Ap&oacute;s aberto, 24horas</td>
                                <td ><font size = -1>></td>
                                <td ><font size = -1></td>
                            </tr>
                            <tr>
                                <td ><font size = -1><b></b></td>
                                <td ><font size = -1></td>
                                <td ><font size = -1><b></b></td>
                                <td ><font size = -1></td>
                            </tr>
                            <tr>
                                <td colspan="2" ><font size = -1><b></b></td>
                            </tr>
                        <tr>
                            <td colspan="3" ><font size = -1><b>Nutricionista/CRN <?= $nutricionista . '  ' . $conselho; ?> </b></td>
                        </tr>
                        <tr>
                            <td colspan="3" ><font size = -1>&nbsp; </b></td>
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
                            <td colspan="2" ><font size = -1><img src="<?= base_url() ?>/img/logonvtro.jpg"  width="133" height="40" class="ttr"/></td>
                        </tr>
                        <tr>
                            <td  ><font size = -1><b>Paciente: </b><?= $prescricao['0']->paciente; ?></td>
                            <td  ><font size = -1><b>    DN: </b><?= $nascimento ?></td>
                        </tr>
                        <tr>
                            <td ><font size = -1><b>Hospital: <?= $prescricao['0']->hospital; ?></b></td>
                            <td ><font size = -1><b>Leito/Apto: <?= $prescricao['0']->leito; ?></b></td>
                        </tr>
                    </tbody>
                </table>
                <table>
                    <tbody>
                        <tr>
                            <td colspan="2" ><font size = -1><b>Dieta</b></td>
                            <td colspan="2"><font size = -1><?= $dieta; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2" ><font size = -1><b>Distribui&ccedil;&atilde;o Cal&oacute;rica</b></td>
                            <td ><font size = -1><b>Pro</b></td>
                            <td ><font size = -1><?= $pro; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2" ><font size = -1><b>&nbsp;</b></td>
                            <td ><font size = -1><b>HC</b></td>
                            <td ><font size = -1><?= $hc; ?></td>
                        </tr>
                        <tr>
                            <td ><font size = -1><b>VCT</b></td>
                            <td ><font size = -1><?= $vct; ?> Kcal</td>
                            <td ><font size = -1><b>Lip</b></td>
                            <td ><font size = -1><?= $lip; ?></td>
                        </tr>
                        <tr>
                            <td ><font size = -1><b>Volume</b></td>
                            <td ><font size = -1><?= $volume; ?> ml</td>
                            <td ><font size = -1><b>Kcal/N2</b></td>
                            <td ><font size = -1><?= $kcal; ?></td>
                        </tr>
                        <tr>
                            <td ><font size = -1><b>Taxa de Infus&atilde;o</b></td>
                            <td ><font size = -1><?= $taxadeinfusao; ?></td>
                            <td ><font size = -1><b>Via de Acesso</b></td>
                            <td ><font size = -1><?= $via; ?></td>
                        </tr>
                        <tr>
                            <td ><font size = -1><b>Validade</b></td>
                            <td ><font size = -1>Ap&oacute;s aberto, 24horas</td>
                            <td ><font size = -1><b></b></td>
                            <td ><font size = -1></td>
                        </tr>
                        <tr>
                            <td ><font size = -1><b></b></td>
                            <td ><font size = -1></td>
                            <td ><font size = -1><b></b></td>
                            <td ><font size = -1></td>
                        </tr>
                        <tr>
                            <td colspan="2" ><font size = -1><b></b></td>
                        </tr>
                        <tr>
                            <td colspan="3" ><font size = -1><b>Nutricionista/CRN <?= $nutricionista . '  ' . $conselho; ?> </b></td>
                        </tr>
                        <tr>
                            <td colspan="3" ><font size = -1>&nbsp; </b></td>
                        </tr>

                    </tbody>
                </table>

                <?
            }
        }
        $classificacao = $item->classificacao;
        $b = 0;
    endforeach;
    ?>
</div>
