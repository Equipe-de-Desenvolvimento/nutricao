<?php

require_once APPPATH . 'models/base/BaseModel.php';

//require_once APPPATH . 'models/base/ConvertXml.php';



class internacao_model extends BaseModel {

    var $_internacao_id = null;
    var $_leito = null;
    var $_codigo = null;
    var $_aih = null;
    var $_hospital = null;
    var $_data_internacao = null;
    var $_data_solicitacao = null;
    var $_carater_internacao = null;
    var $_diagnostico = null;
    var $_cid1solicitado = null;
    var $_justificativa = null;
    var $_solicitante = null;
    var $_atendente = null;
    var $_reg = null;
    var $_val = null;
    var $_pla = null;
    var $_rx = null;
    var $_acesso = null;
    var $_paciente_id = null;

    function internacao_model($paciente_id = null) {
        parent::Model();
        if (isset($paciente_id)) {
            $this->instanciar($paciente_id);
        }
    }

    function gravar($paciente_id) {

        try {
            $this->db->set('leito', $_POST['leitoID']);
            $this->db->set('codigo', $_POST['sisreg']);
            $this->db->set('aih', $_POST['aih']);
            $this->db->set('prelaudo', $_POST['central']);
            $this->db->set('medico_id', $_POST['operadorID']);
            $this->db->set('data_internacao', $_POST['data']);
            $this->db->set('forma_de_entrada', $_POST['forma']);
            $this->db->set('estado', $_POST['estado']);
            $this->db->set('carater_internacao', $_POST['carater']);
            $this->db->set('procedimentosolicitado', $_POST['procedimentoID']);
            $this->db->set('cid1solicitado', $_POST['cid1ID']);
            $this->db->set('cid2solicitado', $_POST['cid2ID']);
            $this->db->set('justificativa', $_POST['observacao']);
            $this->db->set('paciente_id', $paciente_id);
            $horario = date("Y-m-d H:i:s");
            $operador_id = $this->session->userdata('operador_id');
            // $this->db->set('paciente_id',$_POST['txtPacienteId'] );

            if ($_POST['internacao_id'] == "") {// insert
                $this->db->set('data_cadastro', $horario);
                $this->db->set('operador_cadastro', $operador_id);
                $this->db->insert('tb_internacao');
                $erro = $this->db->_error_message();
                if (trim($erro) != "") { // erro de banco
                    return false;
                } else
                    $internacao_id = $this->db->insert_id();
                $this->db->set('ativo', 'false');
                $this->db->where('internacao_leito_id', $_POST['leitoID']);
                $this->db->update('tb_internacao_leito');
                $this->db->set('paciente_id', $paciente_id);
                $this->db->set('leito_id', $_POST['leitoID']);
                $this->db->set('data_cadastro', $horario);
                $this->db->set('operador_cadastro', $operador_id);
                $this->db->insert('tb_internacao_ocupacao');
            }
            else { // update
                $internacao_id = $_POST['internacao_id'];
                $this->db->set('data_atualizacao', $horario);
                $this->db->set('operador_atualizacao', $operador_id);
                $this->db->where('internacao_id', $internacao_id);
                $this->db->update('tb_internacao');
            }


            return $internacao_id;
        } catch (Exception $exc) {
            return false;
        }
    }

    function gravarinternacaonutricao($paciente_id) {

        try {
            if ($_POST['leito'] != "") {
                $this->db->set('leito', $_POST['leito']);
            }
            $this->db->set('codigo', $_POST['sisreg']);
            $this->db->set('aih', $_POST['aih']);
            if ($_POST['unidade'] != "") {
                $this->db->set('hospital', $_POST['unidade']);
            }
            if ($_POST['data_internacao'] != "") {
                $this->db->set('data_internacao', $_POST['data_internacao']);
            }
            if ($_POST['data_solicitacao'] != "") {
                $this->db->set('data_solicitacao', $_POST['data_solicitacao']);
            }
            $this->db->set('carater_internacao', $_POST['carater']);
//            $this->db->set('procedimentosolicitado', $_POST['procedimentoID']);
            $this->db->set('diagnostico', $_POST['txtdiagnostico']);
            $this->db->set('cid1solicitado', $_POST['cid1ID']);
            $this->db->set('justificativa', $_POST['observacao']);
            $this->db->set('solicitante', $_POST['solicitante']);
            $this->db->set('atendente', $_POST['atendente']);
            $this->db->set('reg', $_POST['reg']);
            $this->db->set('val', $_POST['val']);
            $this->db->set('pla', $_POST['pla']);
            $this->db->set('rx', $_POST['rx']);
            $this->db->set('acesso', $_POST['acesso']);
            $this->db->set('paciente_id', $paciente_id);
            $horario = date("Y-m-d H:i:s");
            $operador_id = $this->session->userdata('operador_id');
            // $this->db->set('paciente_id',$_POST['txtPacienteId'] );

            if ($_POST['internacao_id'] == "") {// insert
                $this->db->set('data_cadastro', $horario);
                $this->db->set('operador_cadastro', $operador_id);
                $this->db->insert('tb_internacao');
                $internacao_id = $this->db->insert_id();
                $erro = $this->db->_error_message();
                if (trim($erro) != "") { // erro de banco
                    return 0;
                } elseif ($_POST['leito'] != "") {
                    $this->db->set('ativo', 'false');
                    $this->db->set('condicao', 'Ocupado');
                    $this->db->where('internacao_leito_id', $_POST['leito']);
                    $this->db->update('tb_internacao_leito');

                    $this->db->set('paciente_id', $paciente_id);
                    $this->db->set('leito_id', $_POST['leito']);
                    $this->db->set('ocupado', 'false');
                    $this->db->set('data_cadastro', $horario);
                    $this->db->set('operador_cadastro', $operador_id);
                    $this->db->insert('tb_internacao_ocupacao');
                }
            } else { // update
                $internacao_id = $_POST['internacao_id'];
                $this->db->set('data_atualizacao', $horario);
                $this->db->set('operador_atualizacao', $operador_id);
                $this->db->where('internacao_id', $internacao_id);
                $this->db->update('tb_internacao');
            }


            return $internacao_id;
        } catch (Exception $exc) {
            return 0;
        }
    }

    function gravaretapa() {

        $this->db->set('volume', $_POST['volume']);
        $this->db->where('internacao_precricao_etapa_id', $_POST['tb_internacao_precricao_etapa']);
        $this->db->update('tb_internacao_precricao_etapa');

        $this->db->select('internacao_precricao_id');
        $this->db->from('tb_internacao_precricao_etapa');
        $this->db->where('internacao_precricao_etapa_id', $_POST['tb_internacao_precricao_etapa']);
        $query = $this->db->get();
        return $return = $query->result();
    }

    function gravarprescricaoenteralnormal($internacao_id) {

        $empresa_id = $this->session->userdata('empresa_id');
        $horario = date("Y-m-d H:i:s");
        $dataprescricao = $_POST['data_solicitacao'];
        $operador_id = $this->session->userdata('operador_id');

        $this->db->select('internacao_precricao_id');
        $this->db->from('tb_internacao_precricao');
        $this->db->where("internacao_id", $internacao_id);
        $this->db->where("data", $dataprescricao);
        $query = $this->db->get();
        $return = $query->result();


        $numero = count($return);

        if ($numero == 0) {
            $this->db->set('data', $dataprescricao);
            $this->db->set('internacao_id', $internacao_id);
            $this->db->set('empresa_id', $empresa_id);
            if ($_POST['medico'] != '') {
                $this->db->set('nutricionista', $_POST['medico']);
            }
            if ($_POST['preparo'] != '') {
                $this->db->set('preparo', $_POST['preparo']);
            }
            if ($_POST['validade'] != '') {
                $this->db->set('validade', $_POST['validade']);
            }
            $this->db->set('data_cadastro', $horario);
            $this->db->set('operador_cadastro', $operador_id);
            $this->db->insert('tb_internacao_precricao');
            $internacao_precricao_id = $this->db->insert_id();
        } else {
            $internacao_precricao_id = $return[0]->internacao_precricao_id;
            if ($_POST['medico'] != '') {
                $this->db->set('nutricionista', $_POST['medico']);
            }
            if ($_POST['preparo'] != '') {
                $this->db->set('preparo', $_POST['preparo']);
            }
            if ($_POST['validade'] != '') {
                $this->db->set('validade', $_POST['validade']);
            }
            $this->db->where('internacao_precricao_id', $internacao_precricao_id);
            $this->db->update('tb_internacao_precricao');
        }
        if ($_POST['produto'] != "Selecione") {

            $this->db->set('etapas', $_POST['etapas']);
            $this->db->set('internacao_precricao_id', $internacao_precricao_id);
            $this->db->set('empresa_id', $empresa_id);
            $this->db->set('data_cadastro', $horario);
            $this->db->set('operador_cadastro', $operador_id);
            $this->db->insert('tb_internacao_precricao_etapa');
            $internacao_precricao_etapa_id = $this->db->insert_id();

            $i = 0;
            foreach ($_POST['produto'] as $produto) {
                $z = 0;
                $c = 0;
                $b = 0;
                $p = 0;
                $i++;


                foreach ($_POST['peso'] as $itempeso) {
                    $p++;
                    if ($i == $p) {
                        if ($itempeso != '') {
                            $this->db->select('medida');
                            $this->db->from('tb_procedimento_tuss_caloria ptc');
                            $this->db->join('tb_procedimento_convenio pc', 'pc.procedimento_tuss_id = ptc.procedimento_tuss_id');
                            $this->db->where('pc.procedimento_convenio_id', $produto);
                            $this->db->where('ptc.kcal', $itempeso);
                            $this->db->where('ptc.ativo', 't');
                            $querys = $this->db->get();
                            $returns = $querys->result();
                            $kcal = $returns[0]->medida;
                        }
                        $peso = $itempeso;
                        break;
                    }
                }
                foreach ($_POST['volume'] as $itemvolume) {
                    $c++;
                    if ($i == $c) {
                        $volume = $itemvolume;
                        break;
                    }
                }
                foreach ($_POST['medida'] as $itemmedida) {
                    $b++;

                    if ($i == $b) {

                        $medida = $itemmedida;
                        break;
                    }
                }
                foreach ($_POST['vazao'] as $itemvazao) {
                    $z++;
                    if ($i == $z) {
                        $vazao = $itemvazao;
                        break;
                    }
                }

                $this->db->set('internacao_precricao_etapa_id', $internacao_precricao_etapa_id);
                $this->db->set('internacao_precricao_id', $internacao_precricao_id);
                $this->db->set('internacao_id', $internacao_id);

                $this->db->set('tipo', 'ENTERALNORMAL');
                if ($produto != "Selecione") {
                    $this->db->set('produto_id', $produto);
                }
                if ($peso != null) {
                    $this->db->set('peso', $peso);
                    $this->db->set('kcal', $kcal);
                    $this->db->set('etapas', $_POST['etapas']);
                }
                if ($medida != null) {
                    $this->db->set('kcal', $medida);
                }
                if ($volume != null) {
                    $this->db->set('volume', $volume);
                    $this->db->set('etapas', $_POST['etapas']);
                } else {
                    $this->db->set('etapas', 0);
                }
                if ($vazao != null) {
                    $this->db->set('vasao', $vazao);
                }
                $this->db->set('empresa_id', $empresa_id);
                $this->db->set('data_cadastro', $horario);
                $this->db->set('operador_cadastro', $operador_id);
                $this->db->insert('tb_internacao_precricao_produto');
                $internacao_precricao_produto_id = $this->db->insert_id();
            }
        }

        if ($_POST['equipo'] != "Selecione") {

            $this->db->set('etapas', 1);
            $this->db->set('internacao_precricao_id', $internacao_precricao_id);
            $this->db->set('empresa_id', $empresa_id);
            $this->db->set('data_cadastro', $horario);
            $this->db->set('operador_cadastro', $operador_id);
            $this->db->insert('tb_internacao_precricao_etapa');
            $internacao_precricao_etapa_id_equipo = $this->db->insert_id();

            $this->db->set('internacao_precricao_etapa_id', $internacao_precricao_etapa_id_equipo);
            $this->db->set('internacao_precricao_id', $internacao_precricao_id);
            $this->db->set('internacao_id', $internacao_id);
            $this->db->set('etapas', 1);
            $this->db->set('tipo', 'ENTERALNORMAL');
            $this->db->set('produto_id', $_POST['equipo']);
            $this->db->set('observacao', $_POST['observacao']);
            $this->db->set('empresa_id', $empresa_id);
            $this->db->set('data_cadastro', $horario);
            $this->db->set('operador_cadastro', $operador_id);
            $this->db->insert('tb_internacao_precricao_produto');
        }
        return $internacao_precricao_etapa_id;
    }

    function gravarprescricaoenteralemergencial($internacao_id) {

        $empresa_id = $this->session->userdata('empresa_id');
        $horario = date("Y-m-d H:i:s");
        $dataprescricao = date("Y-m-d");
        $operador_id = $this->session->userdata('operador_id');

        $this->db->select('internacao_precricao_id');
        $this->db->from('tb_internacao_precricao');
        $this->db->where("internacao_id", $internacao_id);
        $this->db->where("data", $dataprescricao);
        $query = $this->db->get();
        $return = $query->result();

        $numero = count($return);

        if ($numero == 0) {
            $this->db->set('data', $dataprescricao);
            $this->db->set('internacao_id', $internacao_id);
            $this->db->set('empresa_id', $empresa_id);
            $this->db->set('data_cadastro', $horario);
            $this->db->set('operador_cadastro', $operador_id);
            $this->db->insert('tb_internacao_precricao');
            $internacao_precricao_id = $this->db->insert_id();
        } else {
            $internacao_precricao_id = $return[0]->internacao_precricao_id;
        }

        if ($_POST['produto'] != "Selecione") {

            $this->db->set('etapas', $_POST['etapas']);
            $this->db->set('internacao_precricao_id', $internacao_precricao_id);
            $this->db->set('empresa_id', $empresa_id);
            $this->db->set('data_cadastro', $horario);
            $this->db->set('operador_cadastro', $operador_id);
            $this->db->insert('tb_internacao_precricao_etapa');
            $internacao_precricao_etapa_id = $this->db->insert_id();

            $i = 0;
            foreach ($_POST['produto'] as $produto) {
                $z = 0;
                $c = 0;
                $i++;
                foreach ($_POST['volume'] as $itemvolume) {
                    $c++;
                    if ($i == $c) {
                        $volume = $itemvolume;
                        break;
                    }
                }
                foreach ($_POST['vazao'] as $itemvazao) {
                    $z++;
                    if ($i == $z) {
                        $vazao = $itemvazao;
                        break;
                    }
                }

                $this->db->set('internacao_precricao_etapa_id', $internacao_precricao_etapa_id);
                $this->db->set('internacao_precricao_id', $internacao_precricao_id);
                $this->db->set('internacao_id', $internacao_id);
                $this->db->set('etapas', $_POST['etapas']);
                $this->db->set('tipo', 'ENTERALEMERGENCIAL');
                if ($produto != "Selecione") {
                    $this->db->set('produto_id', $produto);
                }
                if ($volume != null) {
                    $this->db->set('volume', $volume);
                }
                if ($vazao != null) {
                    $this->db->set('vasao', $vazao);
                }
                $this->db->set('empresa_id', $empresa_id);
                $this->db->set('data_cadastro', $horario);
                $this->db->set('operador_cadastro', $operador_id);
                $this->db->insert('tb_internacao_precricao_produto');
                $internacao_precricao_produto_id = $this->db->insert_id();
            }
        }

        if ($_POST['equipo'] != "Selecione") {

            $this->db->set('etapas', 1);
            $this->db->set('internacao_precricao_id', $internacao_precricao_id);
            $this->db->set('empresa_id', $empresa_id);
            $this->db->set('data_cadastro', $horario);
            $this->db->set('operador_cadastro', $operador_id);
            $this->db->insert('tb_internacao_precricao_etapa');
            $internacao_precricao_etapa_id_equipo = $this->db->insert_id();

            $this->db->set('internacao_precricao_etapa_id', $internacao_precricao_etapa_id_equipo);
            $this->db->set('internacao_precricao_id', $internacao_precricao_id);
            $this->db->set('internacao_id', $internacao_id);
            $this->db->set('etapas', 1);
            $this->db->set('tipo', 'ENTERALEMERGENCIAL');
            $this->db->set('produto_id', $_POST['equipo']);
            $this->db->set('empresa_id', $empresa_id);
            $this->db->set('data_cadastro', $horario);
            $this->db->set('operador_cadastro', $operador_id);
            $this->db->insert('tb_internacao_precricao_produto');
        }
    }

    function repetirultimaprescicaoenteralnormal($internacao_id) {

        $empresa_id = $this->session->userdata('empresa_id');
        $horario = date("Y-m-d H:i:s");
        $dataprescricao = date("Y-m-d");
        $operador_id = $this->session->userdata('operador_id');

        $this->db->select('internacao_precricao_id, nutricionista, preparo, validade');
        $this->db->from('tb_internacao_precricao');
        $this->db->where("internacao_id", $internacao_id);
        $this->db->where("data !=", $dataprescricao);
        $query = $this->db->get();
        $row = $query->last_row();
//        var_dump($row);
//        die;
        $numero = count($row->internacao_precricao_id);
        if ($numero > 0) {
            $this->db->set('data', $dataprescricao);
            $this->db->set('internacao_id', $internacao_id);
            $this->db->set('empresa_id', $empresa_id);
            $this->db->set('data_cadastro', $horario);
            if ($row->nutricionista != '') {
                $this->db->set('nutricionista', $row->nutricionista);
            }
            if ($row->preparo != '') {
            $this->db->set('preparo', $row->preparo);
            }
            if ($row->validade != '') {
            $this->db->set('validade', $row->validade);
            }
            $this->db->set('operador_cadastro', $operador_id);
            $this->db->insert('tb_internacao_precricao');
            $internacao_precricao_id = $this->db->insert_id();

            $this->db->select('internacao_precricao_etapa_id, etapas, volume');
            $this->db->from('tb_internacao_precricao_etapa');
            $this->db->where("internacao_precricao_id", $row->internacao_precricao_id);
            $query = $this->db->get();
            $returno = $query->result();
            $numeroetapa = count($returno);

            if ($numeroetapa > 0) {
                foreach ($returno as $item) {
                    $this->db->set('etapas', $item->etapas);
                    $this->db->set('volume', $item->volume);
                    $this->db->set('internacao_precricao_id', $internacao_precricao_id);
                    $this->db->set('empresa_id', $empresa_id);
                    $this->db->set('data_cadastro', $horario);
                    $this->db->set('operador_cadastro', $operador_id);
                    $this->db->insert('tb_internacao_precricao_etapa');
                    $internacao_precricao_etapa_id = $this->db->insert_id();

                    $this->db->select('internacao_precricao_id, internacao_id, etapas, produto_id, volume, vasao');
                    $this->db->from('tb_internacao_precricao_produto');
                    $this->db->where("internacao_precricao_etapa_id", $item->internacao_precricao_etapa_id);
                    $this->db->where("ativo", 'true');
                    $query = $this->db->get();
                    $return = $query->result();
                    $numeroproduto = count($return);



                    if ($numeroproduto > 0) {
                        foreach ($return as $value) {
                            $this->db->set('internacao_precricao_etapa_id', $internacao_precricao_etapa_id);
                            $this->db->set('internacao_precricao_id', $internacao_precricao_id);
                            $this->db->set('internacao_id', $value->internacao_id);
                            $this->db->set('etapas', $value->etapas);
                            $this->db->set('tipo', 'ENTERALNORMAL');
                            if ($value->produto_id != "") {
                                $this->db->set('produto_id', $value->produto_id);
                            }
                            if ($value->volume != "") {
                                $this->db->set('volume', $value->volume);
                            }
                            if ($value->vasao != "") {
                                $this->db->set('vasao', $value->vasao);
                            }
                            $this->db->set('empresa_id', $empresa_id);
                            $this->db->set('data_cadastro', $horario);
                            $this->db->set('operador_cadastro', $operador_id);
                            $this->db->insert('tb_internacao_precricao_produto');
                        }
                    }
                }
            }
            return $row->internacao_precricao_id;
        }
    }

    function gravarmovimentacao($paciente_id, $leito_id) {

        try {
            $this->db->set('leito_id', $_POST['leitoID']);
            $this->db->set('paciente_id', $paciente_id);
            $horario = date("Y-m-d H:i:s");
            $operador_id = $this->session->userdata('operador_id');


            $this->db->set('paciente_id', $paciente_id);
            $this->db->set('leito_id', $_POST['leitoID']);
            $this->db->set('data_cadastro', $horario);
            $this->db->set('operador_cadastro', $operador_id);
            $this->db->insert('tb_internacao_ocupacao');
            $erro = $this->db->_error_message();
            if (trim($erro) != "") { // erro de banco
                return false;
            } else {
                $internacao_ocupacao_id = $this->db->insert_id();

                $this->db->set('ativo', 'false');
                $this->db->where('internacao_leito_id', $_POST['leitoID']);
                $this->db->update('tb_internacao_leito');

                $this->db->set('ativo', 'true');
                $this->db->where('internacao_leito_id', $leito_id);
                $this->db->update('tb_internacao_leito');
            }
            return $internacao_ocupacao_id;
        } catch (Exception $exc) {
            return false;
        }
    }

    function gravarcadastrarprocedimentounidade() {

        try {
            $operador_id = $this->session->userdata('operador_id');
            $horario = date("Y-m-d H:i:s");

            $this->db->set('internacao_unidade_id', $_POST['internacao_unidade_id']);
            $this->db->set('procedimento_convenio_id', $_POST['procedimento']);
            $this->db->set('data_cadastro', $horario);
            $this->db->set('operador_cadastro', $operador_id);
            $this->db->insert('tb_procedimento_convenio_unidade');
            $erro = $this->db->_error_message();
            if (trim($erro) != "") { // erro de banco
                return false;
            }
            return true;
        } catch (Exception $exc) {
            return false;
        }
    }

    function excluircadastrarprocedimentounidade($procedimento_convenio_unidade_id) {

        try {
            $operador_id = $this->session->userdata('operador_id');
            $horario = date("Y-m-d H:i:s");

            $this->db->set('ativo', 'f');
            $this->db->set('data_excluir', $horario);
            $this->db->set('operador_excluir', $operador_id);
            $this->db->where('procedimento_convenio_unidade_id', $procedimento_convenio_unidade_id);
            $this->db->update('tb_procedimento_convenio_unidade');
            $erro = $this->db->_error_message();
            if (trim($erro) != "") { // erro de banco
                return false;
            }
            return true;
        } catch (Exception $exc) {
            return false;
        }
    }

    function excluiritemprescicao($item_id) {

        try {
            $horario = date("Y-m-d H:i:s");
            $operador_id = $this->session->userdata('operador_id');
            $this->db->set('data_atualizacao', $horario);
            $this->db->set('operador_atualizacao', $operador_id);
            $this->db->set('ativo', 'false');
            $this->db->where('internacao_precricao_produto_id', $item_id);
            $this->db->update('tb_internacao_precricao_produto');
            return $item_id;
        } catch (Exception $exc) {
            return false;
        }
    }

    private function instanciar($paciente_id) {



        $this->db->select('i.internacao_id,
                               i.paciente_id,
                               i.leito,
                               i.codigo,
                               i.aih,
                               i.hospital,
                               iu.nome as hospitalpaciente,
                               i.data_internacao,
                               i.data_solicitacao,
                               i.carater_internacao,
                               i.diagnostico,
                               i.cid1solicitado,
                               c.no_cid,
                               i.justificativa,
                               i.atendente,
                               i.solicitante,
                               i.reg,
                               i.val,
                               i.pla,
                               i.rx,
                               i.acesso,
                               i.paciente_id');
        $this->db->from('tb_internacao i');
        $this->db->join('tb_paciente p', 'p.paciente_id = i.paciente_id', 'left');
        $this->db->join('tb_internacao_unidade iu', 'iu.internacao_unidade_id = i.hospital', 'left');
        $this->db->join('tb_cid c', 'c.co_cid = i.cid1solicitado', 'left');
        $this->db->where("i.paciente_id", $paciente_id);
        $this->db->where("i.ativo", 't');
        $query = $this->db->get();
        $return = $query->result();
        $contador = count($return);
        if ($contador > 0) {
            $this->_internacao_id = $return[0]->internacao_id;
            $this->_leito = $return[0]->leito;
            $this->_codigo = $return[0]->codigo;
            $this->_aih = $return[0]->aih;
            $this->_hospital = $return[0]->hospital;
            $this->_data_internacao = substr($return[0]->data_internacao, 0, 10);
            $this->_data_solicitacao = $return[0]->data_solicitacao;
            $this->_carater_internacao = $return[0]->carater_internacao;
            $this->_diagnostico = $return[0]->diagnostico;
            $this->_cid1solicitado = $return[0]->cid1solicitado;
            $this->_justificativa = $return[0]->justificativa;
            $this->_solicitante = $return[0]->solicitante;
            $this->_atendente = $return[0]->atendente;
            $this->_reg = $return[0]->reg;
            $this->_val = $return[0]->val;
            $this->_pla = $return[0]->pla;
            $this->_rx = $return[0]->rx;
            $this->_acesso = $return[0]->acesso;
            $this->_paciente_id = $paciente_id;
        }
    }

    function listaunidade() {
        $this->db->select(' internacao_unidade_id,
                            nome');
        $this->db->from('tb_internacao_unidade');
        $this->db->where('ativo', 't');
        $this->db->orderby('nome');
        $return = $this->db->get();
        return $return->result();
    }

    function pesquisarunidade($unidade_id) {
        $this->db->select(' internacao_unidade_id,
                            nome');
        $this->db->from('tb_internacao_unidade');
        $this->db->where('internacao_unidade_id', $unidade_id);
        $return = $this->db->get();
        return $return->result();
    }

    function listaprodutosenteral($internacao_id) {
        $this->db->select(' pc.procedimento_convenio_id,
                            pt.nome');
        $this->db->from('tb_procedimento_convenio pc');
        $this->db->join('tb_procedimento_tuss pt', 'pt.procedimento_tuss_id = pc.procedimento_tuss_id ');
        $this->db->join('tb_paciente p', 'p.convenio_id = pc.convenio_id ');
        $this->db->join('tb_internacao i', 'i.paciente_id = p.paciente_id ');
        $this->db->where('i.internacao_id', $internacao_id);
        $this->db->where('pt.grupo', 'ENTERAL');
        $this->db->where('pc.ativo', 't');
        $this->db->orderby('pt.nome');
        $return = $this->db->get();
        return $return->result();
    }

    function listainternao($internacao_id) {
        $this->db->select(' pc.nome as convenio,
                            i.leito,
                            u.nome as hospital,
                            p.nascimento,
                            p.nome,
                            p.paciente_id,
                            p.convenionumero,
                            i.aih');
        $this->db->from('tb_internacao i');
        $this->db->join('tb_paciente p', 'p.paciente_id = i.paciente_id');
        $this->db->join('tb_convenio pc', 'pc.convenio_id = p.convenio_id', 'left');
        $this->db->join('tb_internacao_unidade u', 'u.internacao_unidade_id = i.hospital', 'left');
        $this->db->where('i.internacao_id', $internacao_id);
        $return = $this->db->get();
        return $return->result();
    }

    function listaprodutosequipo($internacao_id) {
        $this->db->select(' pc.procedimento_convenio_id,
                            pt.nome');
        $this->db->from('tb_procedimento_convenio pc');
        $this->db->join('tb_procedimento_tuss pt', 'pt.procedimento_tuss_id = pc.procedimento_tuss_id ');
        $this->db->join('tb_paciente p', 'p.convenio_id = pc.convenio_id ');
        $this->db->join('tb_internacao i', 'i.paciente_id = p.paciente_id ');
        $this->db->where('i.internacao_id', $internacao_id);
        $this->db->where('pt.grupo', 'EQUIPO');
        $this->db->where('pc.ativo', 't');
        $this->db->orderby('pt.nome');
        $return = $this->db->get();
        return $return->result();
    }

    function listaultimaprescricaoenteral($internacao_id) {
        $this->db->select('internacao_precricao_id');
        $this->db->from('tb_internacao_precricao');
        $this->db->where("internacao_id", $internacao_id);
        $query = $this->db->get();
        $row = $query->last_row();
        $teste = count($row);
        if (count($row) > 0) {
            $numero = $row->internacao_precricao_id;
        } else {
            $numero = 0;
        }
        $data = date("Y-m-d");
        $this->db->select(' ipp.internacao_precricao_produto_id,
                            ipe.internacao_precricao_etapa_id,
                            ipp.etapas,
                            ipp.volume,
                            ipp.vasao,
                            pt.nome');
        $this->db->from('tb_internacao_precricao_produto ipp');
        $this->db->join('tb_internacao_precricao_etapa ipe', 'ipe.internacao_precricao_etapa_id = ipp.internacao_precricao_etapa_id ', 'left');
        $this->db->join('tb_procedimento_convenio pc', 'pc.procedimento_convenio_id = ipp.produto_id ', 'left');
        $this->db->join('tb_procedimento_tuss pt', 'pt.procedimento_tuss_id = pc.procedimento_tuss_id ', 'left');
        $this->db->join('tb_internacao_precricao ip', 'ip.internacao_precricao_id = ipp.internacao_precricao_id ', 'left');
        $this->db->where('ipp.internacao_id', $internacao_id);
        $this->db->where('ipp.tipo', 'ENTERALNORMAL');
        $this->db->where('ipp.internacao_precricao_id', $numero);
        $this->db->where('ipp.ativo', 't');
        $this->db->orderby('pt.grupo');
        $this->db->orderby('ipe.internacao_precricao_etapa_id');
        $return = $this->db->get();
        return $return->result();
    }

    function listaprescricoesenteral($internacao_id, $internacao_precricao_id) {
        $data = date("Y-m-d");
        $this->db->select(' ipp.internacao_precricao_produto_id,
                            ipe.internacao_precricao_etapa_id,
                            ipp.etapas,
                            ipp.volume,
                            ipp.kcal,
                            ipp.vasao,
                            ipp.internacao_precricao_id,
                            pt.nome');
        $this->db->from('tb_internacao_precricao_produto ipp');
        $this->db->join('tb_internacao_precricao_etapa ipe', 'ipe.internacao_precricao_etapa_id = ipp.internacao_precricao_etapa_id ', 'left');
        $this->db->join('tb_procedimento_convenio pc', 'pc.procedimento_convenio_id = ipp.produto_id ', 'left');
        $this->db->join('tb_procedimento_tuss pt', 'pt.procedimento_tuss_id = pc.procedimento_tuss_id ', 'left');
        $this->db->join('tb_internacao_precricao ip', 'ip.internacao_precricao_id = ipp.internacao_precricao_id ', 'left');
        $this->db->where('ipp.internacao_id', $internacao_id);
        $this->db->where('ip.internacao_precricao_id', $internacao_precricao_id);
        $this->db->where('ipp.tipo', 'ENTERALNORMAL');
//        $this->db->where('ip.data', $data);
        $this->db->where('ipp.ativo', 't');
        $this->db->orderby('pt.grupo');
        $this->db->orderby('ipe.internacao_precricao_etapa_id');
        $return = $this->db->get();
        return $return->result();
    }

    function listaprescricoesenteralalterar($internacao_id) {
        $data = date("d/m/Y");
        if ($_POST['data_solicitacao'] >= $data) {
            $data = $_POST['data_solicitacao'];
        }
        $this->db->select(' ipp.internacao_precricao_produto_id,
                            ipe.internacao_precricao_etapa_id,
                            ipp.etapas,
                            ipp.volume,
                            ipp.vasao,
                            ipp.kcal,
                            ipp.internacao_precricao_id,
                            pt.nome');
        $this->db->from('tb_internacao_precricao_produto ipp');
        $this->db->join('tb_internacao_precricao_etapa ipe', 'ipe.internacao_precricao_etapa_id = ipp.internacao_precricao_etapa_id ', 'left');
        $this->db->join('tb_procedimento_convenio pc', 'pc.procedimento_convenio_id = ipp.produto_id ', 'left');
        $this->db->join('tb_procedimento_tuss pt', 'pt.procedimento_tuss_id = pc.procedimento_tuss_id ', 'left');
        $this->db->join('tb_internacao_precricao ip', 'ip.internacao_precricao_id = ipp.internacao_precricao_id ', 'left');
        $this->db->where('ipp.internacao_id', $internacao_id);
        $this->db->where('ipp.tipo', 'ENTERALNORMAL');
        $this->db->where('ip.data', $data);
        $this->db->where('ipp.ativo', 't');
        $this->db->orderby('pt.grupo');
        $this->db->orderby('ipe.internacao_precricao_etapa_id');
        $return = $this->db->get();
        return $return->result();
    }

    function listapacienteid($internacao_id) {
        $this->db->select('paciente_id');
        $this->db->from('tb_internacao');
        $this->db->where('internacao_id', $internacao_id);
        $return = $this->db->get();
        return $return->result();
    }

    function listaprescricoesenteralemergencial($internacao_id) {
        $data = date("Y-m-d");
        $this->db->select(' ipp.internacao_precricao_produto_id,
                            ipe.internacao_precricao_etapa_id,
                            ipp.etapas,
                            ipp.volume,
                            ipp.vasao,
                            pt.nome');
        $this->db->from('tb_internacao_precricao_produto ipp');
        $this->db->join('tb_internacao_precricao_etapa ipe', 'ipe.internacao_precricao_etapa_id = ipp.internacao_precricao_etapa_id ', 'left');
        $this->db->join('tb_procedimento_convenio pc', 'pc.procedimento_convenio_id = ipp.produto_id ', 'left');
        $this->db->join('tb_procedimento_tuss pt', 'pt.procedimento_tuss_id = pc.procedimento_tuss_id ', 'left');
        $this->db->join('tb_internacao_precricao ip', 'ip.internacao_precricao_id = ipp.internacao_precricao_id ', 'left');
        $this->db->where('ipp.internacao_id', $internacao_id);
        $this->db->where('ipp.tipo', 'ENTERALEMERGENCIAL');
        $this->db->where('ip.data', $data);
        $this->db->where('ipp.ativo', 't');
        $this->db->orderby('pt.grupo');
        $this->db->orderby('ipe.internacao_precricao_etapa_id');
        $return = $this->db->get();
        return $return->result();
    }

    function listaprescricoespaciente($internacao_id) {
        $data = date("Y-m-d");
        $this->db->select(' ip.data,
                            ip.internacao_precricao_id,
                            ipp.internacao_precricao_produto_id,
                            ipe.internacao_precricao_etapa_id,
                            ipp.etapas,
                            ipp.volume,
                            ipp.vasao,
                            pt.nome');
        $this->db->from('tb_internacao_precricao_produto ipp');
        $this->db->join('tb_internacao_precricao_etapa ipe', 'ipe.internacao_precricao_etapa_id = ipp.internacao_precricao_etapa_id ');
        $this->db->join('tb_procedimento_convenio pc', 'pc.procedimento_convenio_id = ipp.produto_id ');
        $this->db->join('tb_procedimento_tuss pt', 'pt.procedimento_tuss_id = pc.procedimento_tuss_id ');
        $this->db->join('tb_internacao_precricao ip', 'ip.internacao_precricao_id = ipp.internacao_precricao_id ');
        $this->db->where('ipp.internacao_id', $internacao_id);
        $this->db->where('pt.grupo !=', 'EQUIPO');
        $this->db->where('ipp.ativo', 't');
        $this->db->orderby('ipp.internacao_precricao_produto_id');
        $this->db->orderby('pt.grupo');
        $this->db->orderby('ipe.internacao_precricao_etapa_id');
        $return = $this->db->get();
        return $return->result();
    }

    function listaprescricoespacienteequipo($internacao_id) {
        $data = date("Y-m-d");
        $this->db->select(' ipp.internacao_precricao_id,
                            ipp.internacao_precricao_produto_id,
                            ipe.internacao_precricao_etapa_id,
                            ipe.internacao_precricao_etapa_id,
                            ipp.etapas,
                            ipp.volume,
                            ipp.vasao,
                            pt.nome');
        $this->db->from('tb_internacao_precricao_produto ipp');
        $this->db->join('tb_internacao_precricao_etapa ipe', 'ipe.internacao_precricao_etapa_id = ipp.internacao_precricao_etapa_id ');
        $this->db->join('tb_procedimento_convenio pc', 'pc.procedimento_convenio_id = ipp.produto_id ');
        $this->db->join('tb_procedimento_tuss pt', 'pt.procedimento_tuss_id = pc.procedimento_tuss_id ');
        $this->db->join('tb_internacao_precricao ip', 'ip.internacao_precricao_id = ipp.internacao_precricao_id ');
        $this->db->where('ipp.internacao_id', $internacao_id);
        $this->db->where('pt.grupo', 'EQUIPO');
        $this->db->where('ipp.ativo', 't');
        $this->db->orderby('pt.grupo');
        $this->db->orderby('ipe.internacao_precricao_etapa_id');
        $return = $this->db->get();
        return $return->result();
    }

    function etiquetapaciente($internacao_precricao_id) {
        $data = date("Y-m-d");
        $this->db->select(' ip.data,
                            ip.internacao_precricao_id,
                            ipp.internacao_precricao_produto_id,
                            ipe.internacao_precricao_etapa_id,
                            ipp.etapas,
                            ipe.volume,
                            p.nome as paciente,
                            p.nascimento,
                            pt.proteinas,
                            pt.lipidios,
                            pt.kcal,
                            pt.sf,
                            ip.data,
                            pt.carboidratos,
                            pt.dencidade_calorica,
                            pt.nome as produto,
                            i.leito,
                            tc.nome as classificacao,
                            iu.nome as hospital,
                            i.diagnostico,
                            o.nome as nutricionista,
                            o.conselho,
                            ip.preparo,
                            ip.validade,
                            ipp.vasao,
                            pt.nome');
        $this->db->from('tb_internacao_precricao_produto ipp');
        $this->db->join('tb_internacao_precricao_etapa ipe', 'ipe.internacao_precricao_etapa_id = ipp.internacao_precricao_etapa_id ');
        $this->db->join('tb_procedimento_convenio pc', 'pc.procedimento_convenio_id = ipp.produto_id ');
        $this->db->join('tb_procedimento_tuss pt', 'pt.procedimento_tuss_id = pc.procedimento_tuss_id ');
        $this->db->join('tb_tuss t', 't.tuss_id = pt.tuss_id ');
        $this->db->join('tb_tuss_classificacao tc', 'tc.tuss_classificacao_id = t.classificacao ');
        $this->db->join('tb_internacao_precricao ip', 'ip.internacao_precricao_id = ipp.internacao_precricao_id ');
        $this->db->join('tb_internacao i', 'i.internacao_id = ip.internacao_id ');
        $this->db->join('tb_paciente p', 'p.paciente_id = i.paciente_id ');
        $this->db->join('tb_internacao_unidade iu', 'iu.internacao_unidade_id = i.hospital');
        $this->db->join('tb_operador o', 'o.operador_id = ip.nutricionista', 'left');
        $this->db->where('ip.internacao_precricao_id', $internacao_precricao_id);
        $this->db->where('pt.grupo !=', 'EQUIPO');
        $this->db->where('ipp.ativo', 't');
        $this->db->orderby('ipp.internacao_precricao_produto_id');
        $this->db->orderby('ipe.internacao_precricao_etapa_id');
        $return = $this->db->get();
        return $return->result();
    }

    function etiquetapacienteequipo($internacao_precricao_id) {
        $data = date("Y-m-d");
        $this->db->select(' ipp.internacao_precricao_id,
                            ipp.internacao_precricao_produto_id,
                            ipe.internacao_precricao_etapa_id,
                            ipe.internacao_precricao_etapa_id,
                            ipp.etapas,
                            ipp.volume,
                            ipp.vasao,
                            pt.nome');
        $this->db->from('tb_internacao_precricao_produto ipp');
        $this->db->join('tb_internacao_precricao_etapa ipe', 'ipe.internacao_precricao_etapa_id = ipp.internacao_precricao_etapa_id ');
        $this->db->join('tb_procedimento_convenio pc', 'pc.procedimento_convenio_id = ipp.produto_id ');
        $this->db->join('tb_procedimento_tuss pt', 'pt.procedimento_tuss_id = pc.procedimento_tuss_id ');
        $this->db->join('tb_internacao_precricao ip', 'ip.internacao_precricao_id = ipp.internacao_precricao_id ');
        $this->db->where('ip.internacao_precricao_id', $internacao_precricao_id);
        $this->db->where('pt.grupo', 'EQUIPO');
        $this->db->where('ipp.ativo', 't');
        $this->db->orderby('pt.grupo');
        $this->db->orderby('ipe.internacao_precricao_etapa_id');
        $return = $this->db->get();
        return $return->result();
    }

    function listaprescricoesdata() {
        $data = date("Y-m-d");
        $this->db->select(' ip.data,
                            ip.internacao_precricao_id,
                            ipp.internacao_precricao_produto_id,
                            ipe.internacao_precricao_etapa_id,
                            ipp.etapas,
                            ipp.volume,
                            ipp.kcal,
                            ip.internacao_id,
                            ipp.vasao,
                            ipe.volume as frasco,
                            pt.nome,
                            iu.nome as hospital,
                            i.leito,
                            c.nome as convenio,
                            i.diagnostico,
                            p.nome as paciente');
        $this->db->from('tb_internacao_precricao_produto ipp');
        $this->db->join('tb_internacao_precricao_etapa ipe', 'ipe.internacao_precricao_etapa_id = ipp.internacao_precricao_etapa_id ');
        $this->db->join('tb_procedimento_convenio pc', 'pc.procedimento_convenio_id = ipp.produto_id ');
        $this->db->join('tb_procedimento_tuss pt', 'pt.procedimento_tuss_id = pc.procedimento_tuss_id ');
        $this->db->join('tb_internacao_precricao ip', 'ip.internacao_precricao_id = ipp.internacao_precricao_id ', 'left');
        $this->db->join('tb_internacao i', 'i.internacao_id = ip.internacao_id');
        $this->db->join('tb_paciente p', 'p.paciente_id = i.paciente_id');
        $this->db->join('tb_convenio c', 'c.convenio_id = p.convenio_id', 'left');
        $this->db->join('tb_internacao_unidade iu', 'iu.internacao_unidade_id = i.hospital', 'left');
        $this->db->where('ip.data >=', $_POST['txtdata_inicio']);
        $this->db->where('ip.data <=', $_POST['txtdata_fim']);
        $this->db->where('ipp.tipo', $_POST['tipo']);
        if ($_POST['unidade'] != 0) {
            $this->db->where('i.hospital', $_POST['unidade']);
        }
        $this->db->where('pt.grupo !=', 'EQUIPO');
        $this->db->where('ipp.ativo', 't');
//        $this->db->orderby('pt.grupo');
        $this->db->orderby('i.leito');
        $this->db->orderby('ipp.internacao_precricao_produto_id');
        $this->db->orderby('ipe.internacao_precricao_etapa_id');
        $return = $this->db->get();
        return $return->result();
    }

    function listaprescricoesdataproducao() {
        $data = date("Y-m-d");
        $this->db->select(' ip.data,
                            ip.internacao_precricao_id,
                            ip.internacao_id,
                            iu.nome as hospital,
                            i.leito,
                            c.nome as convenio,
                            i.diagnostico,
                            p.nascimento,
                            p.nome as paciente');
        $this->db->from('tb_internacao_precricao ip');
//        $this->db->join('tb_internacao_precricao_produto ipp', 'ipp.internacao_precricao_id = ip.internacao_precricao_id');
        $this->db->join('tb_internacao i', 'i.internacao_id = ip.internacao_id');
        $this->db->join('tb_paciente p', 'p.paciente_id = i.paciente_id');
        $this->db->join('tb_convenio c', 'c.convenio_id = p.convenio_id', 'left');
        $this->db->join('tb_internacao_unidade iu', 'iu.internacao_unidade_id = i.hospital', 'left');
        $this->db->where('ip.data >=', $_POST['txtdata_inicio']);
        $this->db->where('ip.data <=', $_POST['txtdata_fim']);
        if ($_POST['unidade'] != 0) {
            $this->db->where('i.hospital', $_POST['unidade']);
        }
        $this->db->orderby('i.leito');
        $this->db->orderby('iu.nome');
        $return = $this->db->get();
        return $return->result();
    }

    function listaprescricoesequipodata() {
        $data = date("Y-m-d");
        $this->db->select(' ipp.internacao_precricao_produto_id,
                            ipp.internacao_precricao_id,
                            ipe.internacao_precricao_etapa_id,
                            ipe.internacao_precricao_etapa_id,
                            ipp.etapas,
                            ipp.observacao,
                            ip.internacao_id,
                            ipp.volume,
                            ipp.vasao,
                            pt.nome');
        $this->db->from('tb_internacao_precricao_produto ipp');
        $this->db->join('tb_internacao_precricao_etapa ipe', 'ipe.internacao_precricao_etapa_id = ipp.internacao_precricao_etapa_id', 'left');
        $this->db->join('tb_procedimento_convenio pc', 'pc.procedimento_convenio_id = ipp.produto_id', 'left');
        $this->db->join('tb_procedimento_tuss pt', 'pt.procedimento_tuss_id = pc.procedimento_tuss_id', 'left');
        $this->db->join('tb_internacao_precricao ip', 'ip.internacao_precricao_id = ipp.internacao_precricao_id', 'left');
        $this->db->join('tb_internacao i', 'i.internacao_id = ip.internacao_id', 'left');
        $this->db->where('ip.data >=', $_POST['txtdata_inicio']);
        $this->db->where('ip.data <=', $_POST['txtdata_fim']);
        $this->db->where('ipp.tipo', $_POST['tipo']);
        if ($_POST['unidade'] != 0) {
            $this->db->where('i.hospital', $_POST['unidade']);
        }
        $this->db->where('pt.grupo', 'EQUIPO');
        $this->db->where('ipp.ativo', 't');
        $this->db->orderby('pt.grupo');
        $this->db->orderby('ipe.internacao_precricao_etapa_id');
        $return = $this->db->get();
        return $return->result();
    }

    function listaleitointarnacao($unidade_id) {
        $this->db->select(' il.internacao_leito_id,
                            il.nome');
        $this->db->from('tb_internacao_leito il');
        $this->db->join('tb_internacao_enfermaria ie', 'ie.internacao_enfermaria_id = il.enfermaria_id ');
        $this->db->join('tb_internacao_unidade iu', 'iu.internacao_unidade_id = ie.unidade_id ');
        $this->db->where('il.ativo', 't');
        $this->db->where('il.condicao', 'Vago');
        $this->db->where('iu.internacao_unidade_id', $unidade_id);
        $return = $this->db->get();
        return $return->result();
    }

    function buscaPaciente($pacienteId) {

        $this->db->from('tb_paciente')
                ->select('nome');
        $this->db->where('paciente_id', pacienteId);
        return $this->db;
    }

    function listar($args = array()) {
        $this->db->select(' i.internacao_id,
                            i.paciente_id,
                            i.data_solicitacao,
                            p.nome,
                            i.motivo_saida,
                            i.leito,
                            c.nome as convenio,
                            tis.tipo,
                            i.prescricao,
                            iu.nome as hospital,
                            i.data_internacao');
        $this->db->from('tb_internacao i');
        $this->db->join('tb_paciente p', 'p.paciente_id = i.paciente_id ');
        $this->db->join('tb_internacao_saida tis', 'tis.internacao_saida_id = i.motivo_saida', 'left');
        $this->db->join('tb_internacao_unidade iu', 'iu.internacao_unidade_id = i.hospital', 'left');
        $this->db->join('tb_convenio c', 'c.convenio_id = p.convenio_id', 'left');
        $this->db->where('i.ativo', 't');
        if ($args) {
            if (isset($args['nome']) && strlen($args['nome']) > 0) {
                $this->db->where('p.nome ilike', "%" . $args['nome'] . "%", 'left');
            }
            if (isset($args['hospital']) && strlen($args['hospital']) > 0) {
                $this->db->where('i.hospital', $args['hospital']);
            }
        }
        return $this->db;
    }

    function listarpacientesprescricao($args = array()) {
        $this->db->select(' i.internacao_id,
                            i.paciente_id,
                            i.data_solicitacao,
                            p.nome,
                            i.motivo_saida,
                            i.leito,
                            c.nome as convenio,
                            tis.tipo,
                            iu.nome as hospital,
                            i.data_internacao');
        $this->db->from('tb_internacao i');
        $this->db->join('tb_paciente p', 'p.paciente_id = i.paciente_id ');
        $this->db->join('tb_internacao_saida tis', 'tis.internacao_saida_id = i.motivo_saida', 'left');
        $this->db->join('tb_internacao_unidade iu', 'iu.internacao_unidade_id = i.hospital', 'left');
        $this->db->join('tb_convenio c', 'c.convenio_id = p.convenio_id', 'left');
        $this->db->where('i.ativo', 't');
        $this->db->where('i.prescricao', 't');
        if ($args) {
            if (isset($args['nome']) && strlen($args['nome']) > 0) {
                $this->db->where('p.nome ilike', "%" . $args['nome'] . "%", 'left');
            }
            if (isset($args['hospital']) && strlen($args['hospital']) > 0) {
                $this->db->where('i.hospital', $args['hospital']);
            }
        }
        return $this->db;
    }

    function listarrelatoriohoraentrega($hospital) {
        $this->db->select(' i.internacao_id,
                            i.paciente_id,
                            p.nome as paciente,
                            i.motivo_saida,
                            tis.tipo,
                            i.data_internacao');
        $this->db->from('tb_internacao i');
        $this->db->join('tb_paciente p', 'p.paciente_id = i.paciente_id ');
        $this->db->join('tb_internacao_unidade iu', 'iu.internacao_unidade_id = i.hospital', 'left');
        $this->db->join('tb_internacao_saida tis', 'tis.internacao_saida_id = i.motivo_saida', 'left');
        $this->db->where('i.ativo', 't');
        $this->db->where('i.motivo_saida', null);
        $this->db->where('i.hospital', $hospital);

        $return = $this->db->get();
        return $return->result();
    }

    function listarinternacao($parametro) {
        $this->db->select('p.descricao,
                           cid.no_cid as nomecid,
                           cid.co_cid as codcid,
                           i.data_internacao,
                           o.nome as medico,
                           i.procedimentosolicitado,
                           i.estado');
        $this->db->from('tb_internacao i ');
        $this->db->join('tb_cid cid', 'cid.co_cid = i.cid1solicitado');
        $this->db->join('tb_procedimento p', 'p.procedimento = i.procedimentosolicitado');
        $this->db->join('tb_operador o', 'o.operador_id = i.medico_id');
        $this->db->where('i.ativo', 't');
        if ($parametro != null) {
            $this->db->where('paciente_id', $parametro);
        }
        $return = $this->db->get();
        return $return->result();
    }

    function listarmotivosaida() {
        $this->db->select('internacao_saida_id,
                            nome,
                            tipo');
        $this->db->from('tb_internacao_saida');
        $return = $this->db->get();
        return $return->result();
    }

    function gravarsaida($internacao_id, $internacao_saida_id) {
        $this->db->select('internacao_saida_id');
        $this->db->from('tb_internacao_saida');
        $this->db->where('internacao_saida_id', $internacao_saida_id);
        $this->db->where('tipo', 'ALTA');
        $return = $this->db->get();
        $resultado = $return->result();
        $qtderesultado = count($resultado);

        try {
            $horario = date("Y-m-d H:i:s");
            $operador_id = $this->session->userdata('operador_id');
            $this->db->set('data_saida', $horario);
            $this->db->set('operador_saida', $operador_id);
            $this->db->set('motivo_saida', $internacao_saida_id);
            if ($qtderesultado > 0) {
                $this->db->set('ativo', 'f');
                $this->db->set('prescricao', 'f');
            } else {
                $this->db->set('prescricao', 'f');
            }
            $this->db->where('internacao_id', $internacao_id);
            $this->db->update('tb_internacao');
            return $internacao_id;
        } catch (Exception $exc) {
            return false;
        }
    }

    function cancelarsuspensao($internacao_id) {

        try {
            $horario = date("Y-m-d H:i:s");
            $operador_id = $this->session->userdata('operador_id');
            $this->db->set('data_saida', $horario);
            $this->db->set('operador_saida', $operador_id);
            $this->db->set('prescricao', 't');
            $this->db->where('internacao_id', $internacao_id);
            $this->db->update('tb_internacao');
            return $internacao_id;
        } catch (Exception $exc) {
            return false;
        }
    }

    function listarleitosinternacao($parametro) {
        $this->db->select('io.leito_id,
                           io.data_cadastro,
                           io.operador_cadastro,
                           io.internacao_ocupacao_id,
                           il.nome as leito,
                           ie.nome as enfermaria,
                           iu.nome as unidade,
                           o.nome as operador');
        $this->db->from('tb_internacao_ocupacao io');
        $this->db->join('tb_internacao_leito il', 'il.internacao_leito_id = io.leito_id');
        $this->db->join('tb_internacao_enfermaria ie', 'ie.internacao_enfermaria_id = il.enfermaria_id ');
        $this->db->join('tb_internacao_unidade iu', 'iu.internacao_unidade_id = ie.unidade_id ');
        $this->db->join('tb_operador o', 'o.operador_id = io.operador_cadastro');
        $this->db->where('paciente_id', $parametro);
        $this->db->orderby('io.data_cadastro');
        $return = $this->db->get();
        return $return->result();
    }

    function listaleito($args = array()) {
        $this->db->select(' il.internacao_leito_id,
                            il.nome,
                            ienome as enfermaria,
                            iu.nome as unidade,
                            il.tipo');
        $this->db->from('tb_internacao_leito il');
        $this->db->join('tb_internacao_enfermaria ie', 'ie.internacao_enfermaria_id = il.enfermaria_id ');
        $this->db->join('tb_internacao_unidade iu', 'iu.internacao_unidade_id = ie.unidade_id ');
        $this->db->where('ie.ativo', 't');
        if ($args) {
            if (isset($args['nome']) && strlen($args['nome']) > 0) {
                $this->db->where('il.nome ilike', "%" . $args['nome'] . "%");
                $this->db->orwhere('ie.nome ilike', "%" . $args['nome'] . "%");
                $this->db->orwhere('iu.nome ilike', "%" . $args['nome'] . "%");
            }
        }
        return $this->db;
    }

    function listaprocedimentoautocomplete($parametro = null) {
        $this->db->select(' procedimento,
                            descricao');
        $this->db->from('tb_procedimento');
        if ($parametro != null) {
            $this->db->where('descricao ilike', "%" . $parametro . "%");
            $this->db->orwhere('procedimento ilike', "%" . $parametro . "%");
        }
        $return = $this->db->get();
        return $return->result();
    }

    function listacidautocomplete($parametro = null) {
        $this->db->select(' co_cid,
                            no_cid');
        $this->db->from('tb_cid');
        if ($parametro != null) {
            $this->db->where('no_cid ilike', "%" . $parametro . "%");
            $this->db->orwhere('co_cid ilike', "%" . $parametro . "%");
        }
        $return = $this->db->get();
        return $return->result();
    }

    function verificainternacao($paciente_id) {
        $this->db->select();
        $this->db->from('tb_internacao');
        $this->db->where("ativo", 'true');
        $this->db->where("paciente_id", $paciente_id);
        $return = $this->db->count_all_results();
        return $return;
    }

    function listainternacaofichadeavaliacao($internacao_id) {
        $this->db->select(' pc.nome as convenio,
                            i.leito,
                            u.nome as hospital,
                            p.nascimento,
                            p.nome,
                            p.sexo,
                            i.data_saida,
                            i.data_internacao,
                            i.leito,
                            i.data_solicitacao,
                            i.diagnostico,
                            i.solicitante,
                            p.paciente_id,
                            p.convenionumero,
                            i.aih');
        $this->db->from('tb_internacao i');
        $this->db->join('tb_paciente p', 'p.paciente_id = i.paciente_id');
        $this->db->join('tb_convenio pc', 'pc.convenio_id = p.convenio_id', 'left');
        $this->db->join('tb_internacao_unidade u', 'u.internacao_unidade_id = i.hospital', 'left');
        $this->db->where('i.internacao_id', $internacao_id);
        $return = $this->db->get();
        return $return->result();
    }

    function listafichadeavaliacao($internacao_id) {
//       echo var_dump($internacao_id);
//       die;
        $this->db->select(' internacao_fichadeavaliacao_id,
                            data_atualizacao,
                            ');
        $this->db->from('tb_internacao_fichadeavaliacao');
        $this->db->where('internacao_id', $internacao_id);

        $return = $this->db->get();
        return $return->result();
    }

    function empresa() {
        $empresa = $this->session->userdata('empresa_id');
        $this->db->select('empresa_id,
                            nome,
                            cnpj,
                            razao_social,
                            logradouro,
                            bairro,
                            telefone,
                            numero');
        $this->db->from('tb_empresa');
        $this->db->where('empresa_id', $empresa);
        $return = $this->db->get();
        return $return->result();
    }

    function imprimirfichadeavaliacao($internacao_fichadeavaliacao_id) {
        $this->db->select(' pc.nome as convenio,
                            i.leito,
                            u.nome as hospital,
                            p.nascimento,
                            p.nome,
                            p.sexo,
                            i.data_saida,
                            i.data_internacao,
                            i.leito,
                            i.data_solicitacao,
                            i.diagnostico,
                            i.solicitante,
                            p.paciente_id,
                            p.convenionumero,
                            if.imc,
                            if.cen,
                            if.tipoget,
                            if.get,
                            if.peso_ideal,
                            if.peso_atual,
                            if.peso_habitual,
                            if.panturrilha,
                            if.altura_estimada,
                            if.altura_perna,
                            if.cb,
                            if.tne,
                            if.p50,
                            if.patologias_associadas,
                            if.diagnostico_nutricional,
                            if.dncd,
                            if.etnia,
                            i.aih');
        $this->db->from('tb_internacao_fichadeavaliacao if');
        $this->db->join('tb_internacao i', 'i.internacao_id = if.internacao_id');
        $this->db->join('tb_paciente p', 'p.paciente_id = i.paciente_id');
        $this->db->join('tb_convenio pc', 'pc.convenio_id = p.convenio_id', 'left');
        $this->db->join('tb_internacao_unidade u', 'u.internacao_unidade_id = i.hospital', 'left');
        $this->db->where('if.internacao_fichadeavaliacao_id', $internacao_fichadeavaliacao_id);

        $return = $this->db->get();
        return $return->result();
    }

    function diagnosticofichadeavaliacao($internacao_fichadeavaliacao_id) {
        $this->db->select('internacao_fichadeavaliacao_id,
                 dncd,
                 tipoget,
                 get,
                 cen,
                 internacao_id,
                 diagnostico_nutricional,
                ');
        $this->db->from('tb_internacao_fichadeavaliacao');
        $this->db->where('internacao_fichadeavaliacao_id', $internacao_fichadeavaliacao_id);
        $return = $this->db->get();
        return $return->result();
    }

    function gravardiagnosticofichadeavaliacao($internacao_fichadeavaliacao_id) {
        try {
            $this->db->set('diagnostico_nutricional', $_POST['txtDiag']);
            $this->db->where('internacao_fichadeavaliacao_id', $internacao_fichadeavaliacao_id);
            $this->db->update('tb_internacao_fichadeavaliacao');
        } catch (Exception $exc) {
            $return = 0;
            return $return;
        }
    }

    function gravarfichadeavaliacao($internacao_id) {
//        echo var_dump($_POST);
//        die;
        try {
            $horario = date("Y-m-d H:i:s");
            $operador_id = $this->session->userdata('operador_id');
            $ano = (int) date("Y");
            $patologias_associadas = $_POST['txtPatologiasAssociadas'];
            $etnia = $_POST['txtEtnia'];
            $txtget2 = (int) $_POST['txtget2'];
            if ($txtget2 == 25) {
                $tipoget = 'GET C/Presença de SIRS';
            } elseif ($txtget2 == 30) {
                $tipoget = 'GET C/Ausência de SIRS';
            } elseif ($txtget2 == 40) {
                $tipoget = 'GET C/Repleção';
            }

            $tne = $_POST['txtTne'];
            //Se for homem
            if ($_POST['txtSexo'] == 'M') {
                // Calculos 
                $nascimento = (int) substr($_POST['txtIdade'], 0, 4);
                $idade = $ano - $nascimento;
                $altura_perna = (int) $_POST['txtAlturaPerna'];
                $cb = (int) $_POST['txtCB'];
                if ($idade >= 19 && $idade < 25) {
                    $p50 = 30.8;
                } elseif ($idade >= 25 && $idade < 35) {
                    $p50 = 31.9;
                } elseif ($idade >= 35 && $idade < 45) {
                    $p50 = 32.6;
                } elseif ($idade >= 45 && $idade < 55) {
                    $p50 = 32.2;
                } elseif ($idade >= 55 && $idade < 65) {
                    $p50 = 31.7;
                } elseif ($idade >= 55) {
                    $p50 = 30.7;
                }
                $panturrilha = $_POST['txtPanturrilha'];
                $peso_habitual = $_POST['txtPesoHabitual'];



                $altura_estimada = 64.19 - (0.04 * $idade) + (2.02 * $altura_perna);
                $peso_ideal = (float) substr((($altura_estimada / 100) * ($altura_estimada / 100)) * 22.1, 0, 5);
                $get = $txtget2 * $peso_ideal;
                if ($_POST['txtPeso'] != '') {
                    $peso_atual = (int) $_POST['txtPeso'];
                    $imc = (float) substr($peso_atual / (($altura_estimada / 100) * ($altura_estimada / 100)), 0, 5);
                } else {
                    $imc = 'NI';
                    $peso_atual = 'NI';
                }
                $cen = (float) substr(($cb * 100) / $p50, 0, 5);
                if ($_POST['txtEtnia'] == 1) {
                    $dncd = ($altura_perna * 1.19) + ($cb * 3.21) - 86.82;
                } else {
                    $dncd = ($altura_perna * 1.09) + ($cb * 3.14) - 83.72;
                }
            }
            //Se for Mulher
            else {
                $nascimento = (int) substr($_POST['txtIdade'], 0, 4);
                $idade = $ano - $nascimento;
                $altura_perna = (int) $_POST['txtAlturaPerna'];
                $cb = (int) $_POST['txtCB'];
                if ($idade >= 19 && $idade < 25) {
                    $p50 = 26.5;
                } elseif ($idade >= 25 && $idade < 35) {
                    $p50 = 27.7;
                } elseif ($idade >= 35 && $idade < 45) {
                    $p50 = 29;
                } elseif ($idade >= 45 && $idade < 55) {
                    $p50 = 29.9;
                } elseif ($idade >= 55 && $idade < 65) {
                    $p50 = 30.3;
                } elseif ($idade >= 55) {
                    $p50 = 29.9;
                }
                $panturrilha = $_POST['txtPanturrilha'];
                $peso_habitual = $_POST['txtPesoHabitual'];


                $altura_estimada = 84.88 - (0.24 * $idade) + (1.83 * $altura_perna);
                $peso_ideal = (float) substr((($altura_estimada / 100) * ($altura_estimada / 100)) * 20.6, 0, 5);
                $get = $txtget2 * $peso_ideal;
                if ($_POST['txtPeso'] != '') {
                    $peso_atual = (int) $_POST['txtPeso'];
                    $imc = (float) substr($peso_atual / (($altura_estimada / 100) * ($altura_estimada / 100)), 0, 5);
                } else {
                    $imc = 'NI';
                    $peso_atual = 'NI';
                }
                $cen = (float) substr(($cb * 100) / $p50, 0, 5);
                if ($_POST['txtEtnia'] == 1) {
                    $dncd = ($altura_perna * 1.01) + ($cb * 2.81) - 66.04;
                } else {
                    $dncd = ($altura_perna * 1.24) + ($cb * 2.81) - 82.48;
                }
            }




//        echo var_dump($cen);
//        die;
// Inserindo dados na tabela
            $this->db->set('internacao_id', $internacao_id);
            $this->db->set('peso_atual', $peso_atual);
            $this->db->set('cen', $cen);
            $this->db->set('peso_habitual', $peso_habitual);
            $this->db->set('peso_ideal', $peso_ideal);
            $this->db->set('cb', $cb);
            $this->db->set('get', $get);
            $this->db->set('tipoget', $tipoget);
            $this->db->set('tne', $tne);
            $this->db->set('altura_perna', $altura_perna);
            $this->db->set('panturrilha', $panturrilha);
            $this->db->set('patologias_associadas', $patologias_associadas);
            $this->db->set('altura_estimada', $altura_estimada);
            $this->db->set('dncd', $dncd);
            $this->db->set('imc', $imc);
            $this->db->set('p50', $p50);
            $this->db->set('etnia', $etnia);
            $this->db->set('data_atualizacao', $horario);
            $this->db->set('operador_atualizacao', $operador_id);
            $this->db->insert('tb_internacao_fichadeavaliacao');
        } catch (Exception $exc) {
            $return = 0;
            return $return;
        }
    }

}

?>
