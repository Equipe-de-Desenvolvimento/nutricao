<?php

require_once APPPATH . 'controllers/base/BaseController.php';

class internacao extends BaseController {

    function __construct() {
        parent::__construct();
        $this->load->model('emergencia/solicita_acolhimento_model', 'acolhimento');
        $this->load->model('cadastro/paciente_model', 'paciente');
        $this->load->model('seguranca/operador_model', 'operador_m');
        $this->load->model('cadastro/convenio_model', 'convenio');
        $this->load->model('ambulatorio/procedimentoplano_model', 'procedimentoplano');
        $this->load->model('internacao/internacao_model', 'internacao_m');
        $this->load->model('internacao/unidade_model', 'unidade_m');
        $this->load->model('ambulatorio/guia_model', 'guia');
        $this->load->model('internacao/enfermaria_model', 'enfermaria_m');
        $this->load->model('internacao/leito_model', 'leito_m');
        $this->load->model('internacao/solicitainternacao_model', 'solicitacaointernacao_m');
        $this->load->library('utilitario');
    }

    public function index() {
        $this->pesquisar();
    }

    public function pesquisar($args = array()) {
        $this->loadView('internacao/listarinternacao');
    }

    public function listarprescreverenteral($args = array()) {
        $this->loadView('internacao/listarpacientesprescricaoenteral');
    }
    
    public function listarprescreverparenteral($args = array()) {
        $this->loadView('internacao/listarpacientesprescricaoparenteral');
    }
    
    public function listarprescreverparenteralbolsa($args = array()) {
        $this->loadView('internacao/listarprescreverparenteralbolsa');
    }
    
    public function listarprescreverparenteralbolsaentrega($args = array()) {
        $this->loadView('internacao/listarprescreverparenteralbolsaentrega');
    }

    public function listarmotoqueiro($args = array()) {
        $this->loadView('internacao/listarpacientesmotoqueiro');
    }

    public function pesquisarunidade($args = array()) {
        $this->loadView('internacao/listarunidade');
    }

    public function pesquisarenfermaria($args = array()) {
        $this->loadView('internacao/listarenfermaria');
    }

    public function pesquisarleito($args = array()) {
        $this->loadView('internacao/listarleito');
    }
   

    public function pesquisarsolicitacaointernacao($args = array()) {
        $this->loadView('internacao/listarsolicitacaointernacao');
    }

    function saida($internacao_id, $paciente_id) {
        $data['internacao_id'] = $internacao_id;
        $data['paciente'] = $this->paciente->listardados($paciente_id);
        $data['saida'] = $this->internacao_m->listarmotivosaida();
        $this->loadView('internacao/saidainternacao', $data);
    }

    function gravarsaida($internacao_id) {
        $internacao_saida_id = $_POST['saida'];
        $this->internacao_m->gravarsaida($internacao_id, $internacao_saida_id);
        redirect(base_url() . "internacao/internacao");
    }

    function cancelarsuspensao($internacao_id) {
        $this->internacao_m->cancelarsuspensao($internacao_id);
        $this->loadView('internacao/listarinternacao');
    }

    function novo($paciente_id) {
        $data['paciente'] = $this->paciente->listardados($paciente_id);

        $horario = date(" Y-m-d H:i:s");

        $hour = substr($horario, 11, 3);
        $minutes = substr($horario, 15, 2);
        $seconds = substr($horario, 18, 4);

        $this->loadView('emergencia/solicitacoes-paciente', $data);
    }

    function acoes($paciente_id) {
        $data['paciente'] = $this->paciente->listardados($paciente_id);
        $data['internacao'] = $this->internacao_m->listarinternacao($paciente_id);
        $data['leitos'] = $this->internacao_m->listarleitosinternacao($paciente_id);
//        echo '<pre>';
//        var_dump($data['internacao']);
//        die;
        $data['paciente_id'] = $paciente_id;
        $horario = date(" Y-m-d H:i:s");

        $hour = substr($horario, 11, 3);
        $minutes = substr($horario, 15, 2);
        $seconds = substr($horario, 18, 4);

        $this->loadView('internacao/acoes-paciente', $data);
    }

    function novointernacao($paciente_id) {
        $data['numero'] = $this->internacao_m->verificainternacao($paciente_id);
//        var_dump($data['numero']);
//        die;
        if ($data['numero'] == 0) {
            $data['paciente'] = $this->paciente->listardados($paciente_id);
//            if ($data['paciente'][0]->cep == '' || $data['paciente'][0]->cns == '') {
//                $data['mensagem'] = 'CEP ou CNS obrigatorio';
//                $this->session->set_flashdata('message', $data['mensagem']);
//                redirect(base_url() . "emergencia/filaacolhimento/novo/$paciente_id");
//            }
            $data['paciente_id'] = $paciente_id;
            $this->loadView('internacao/cadastrarinternacao', $data);
        } else {
            $data['mensagem'] = 'Paciente ja possui internacao';
            $this->session->set_flashdata('message', $data['mensagem']);
            redirect(base_url() . "internacao/internacao/pesquisar");
        }
    }

    function novointernacaonutricao($paciente_id) {
        $obj_internacao = new internacao_model($paciente_id);
        $data['obj'] = $obj_internacao;
        $data['numero'] = $this->internacao_m->verificainternacao($paciente_id);
//        var_dump($data['numero']);
//        die;
            $data['paciente'] = $this->paciente->listardados($paciente_id);
            $data['unidade'] = $this->internacao_m->listaunidade();
//            if ($data['paciente'][0]->cep == '' || $data['paciente'][0]->cns == '') {
//                $data['mensagem'] = 'CEP ou CNS obrigatorio';
//                $this->session->set_flashdata('message', $data['mensagem']);
//                redirect(base_url() . "emergencia/filaacolhimento/novo/$paciente_id");
//            }
            $data['paciente_id'] = $paciente_id;
            $this->loadView('internacao/cadastrarinternacaonutricao', $data);

    }

    function movimentacao($paciente_id) {

        $data['paciente'] = $this->paciente->listardados($paciente_id);
        $leito = $this->internacao_m->listarleitosinternacao($paciente_id);

        $p = count($leito);
        $i = $p - 1;
        $data['leito'] = $leito["$i"]->leito_id;

        $data['paciente_id'] = $paciente_id;
        $this->loadView('internacao/movimentacao', $data);
    }

    function cadastrarprocedimentounidade($internacao_unidade_id) {

        $data['unidade'] = $this->unidade_m->buscarunidades($internacao_unidade_id);
        $data['procedimento'] = $this->procedimentoplano->listarprocedimentoativo();
        $data['procedimentounidade'] = $this->procedimentoplano->listarprocedimentoconveniounidade($internacao_unidade_id);
        $data['internacao_unidade_id'] = $internacao_unidade_id;
        $this->loadView('internacao/cadastrarprocedimentounidade', $data);
    }

    function gravarcadastrarprocedimentounidade() {
        $internacao_unidade_id = $_POST['internacao_unidade_id'];
        $this->internacao_m->gravarcadastrarprocedimentounidade();
        redirect(base_url() . "internacao/internacao/cadastrarprocedimentounidade/$internacao_unidade_id");
    }

    function excluircadastrarprocedimentounidade($internacao_unidade_id, $procedimento_convenio_unidade_id) {
        $this->internacao_m->excluircadastrarprocedimentounidade($procedimento_convenio_unidade_id);
        redirect(base_url() . "internacao/internacao/cadastrarprocedimentounidade/$internacao_unidade_id");
    }

    function novounidade() {

        $this->loadView('internacao/cadastrarunidade');
    }

    function novoenfermaria() {

        $this->loadView('internacao/cadastrarenfermaria');
    }

    function novoleito() {

        $this->loadView('internacao/cadastrarleito');
    }
    
    function listartemperaturabolsaparenteral($internacao_id) {
        $data['internacao_id']= $internacao_id;
        $data['lista']= $this->internacao_m->listartemperaturabolsaparenteral($internacao_id);

        $this->loadView('internacao/listartemperaturaparenteral', $data);
    }
    
    function listartemperaturabolsaparenteralentrega($internacao_id) {
        $data['internacao_id']= $internacao_id;
        $data['lista']= $this->internacao_m->listartemperaturabolsaparenteralentrega($internacao_id);

        $this->loadView('internacao/listartemperaturaparenteralentrega', $data);
    }
    
    function novotemperaturabolsaparenteralentrega($internacao_id) {
        $data['internacao_id']= $internacao_id;
        $data['hospital']= $this->internacao_m->listarpacientesprescricaoparenteralhospital($internacao_id);
        
        $this->loadView('internacao/novotemperaturabolsaparenteralentrega', $data);
    }
    
    function gravartemperaturabolsaparenteralentrega($internacao_id) {

         $this->internacao_m->gravartemperaturabolsaparenteralentrega($internacao_id);
         
        if ($teste == 0) {
            $data['mensagem'] = 'Sucesso ao gravar Geladeira';
        } else {
            $data['mensagem'] = 'Erro ao gravar Geladeira';
        }
        $this->session->set_flashdata('message', $data['mensagem']);
        redirect(base_url() . "internacao/internacao/listartemperaturabolsaparenteralentrega/$internacao_id");

    }
    
    function novotemperaturabolsaparenteral($internacao_id) {
        $data['internacao_id']= $internacao_id;
        $data['hospital']= $this->internacao_m->listarpacientesprescricaoparenteralhospital($internacao_id);
        
        $this->loadView('internacao/novotemperaturabolsaparenteral', $data);
    }
    
    function gravartemperaturabolsaparenteral($internacao_id) {

         $this->internacao_m->gravartemperaturabolsaparenteral($internacao_id);
         
        if ($teste == 0) {
            $data['mensagem'] = 'Sucesso ao gravar Geladeira';
        } else {
            $data['mensagem'] = 'Erro ao gravar Geladeira';
        }
        $this->session->set_flashdata('message', $data['mensagem']);
        redirect(base_url() . "internacao/internacao/listartemperaturabolsaparenteral/$internacao_id");

    }
    

    function novosolicitacaointernacao($paciente_id) {
        $data['numero'] = $this->solicitacaointernacao_m->verificasolicitacao($paciente_id);
//        var_dump($data['numero']);
//        die;
        if ($data['numero'] == 0) {
            $data['paciente'] = $this->paciente->listardados($paciente_id);
            $data['paciente_id'] = $paciente_id;
            $this->loadView('internacao/cadastrarsolicitacaointernacao', $data);
        } else {
            $data['mensagem'] = 'Paciente ja possui solicitacao';
            $this->session->set_flashdata('message', $data['mensagem']);
            redirect(base_url() . "internacao/internacao/pesquisarsolicitacaointernacao");
        }
    }

    function gravarleito() {

        if ($this->leito_m->gravarleito($_POST)) {
            $data['mensagem'] = 'Leito gravada com sucesso';
        } else {
            $data['mensagem'] = 'Erro ao gravar leito';
        }
        $this->session->set_flashdata('message', $data['mensagem']);
        redirect(base_url() . "internacao/internacao/pesquisarleito");
    }

    function gravarenfermaria() {

        if ($this->enfermaria_m->gravarenfermaria($_POST)) {
            $data['mensagem'] = 'Enfermaria gravada com sucesso';
        } else {
            $data['mensagem'] = 'Erro ao gravar enfermaria';
        }
        $this->session->set_flashdata('message', $data['mensagem']);
        redirect(base_url() . "internacao/internacao/pesquisarenfermaria");
    }

    function gravarunidade() {

        if ($this->unidade_m->gravarunidade($_POST)) {
            $data['mensagem'] = 'Unidade gravada com sucesso';
        } else {
            $data['mensagem'] = 'Erro ao gravar unidade';
        }
        $this->session->set_flashdata('message', $data['mensagem']);
        redirect(base_url() . "internacao/internacao/pesquisarunidade");
    }

    function gravarinternacao($paciente_id) {

        if ($this->internacao_m->gravar($paciente_id)) {
            $data['mensagem'] = 'Internacao gravada com sucesso';
        } else {
            $data['mensagem'] = 'Erro ao gravar movimentacao';
        }
        $this->session->set_flashdata('message', $data['mensagem']);
        redirect(base_url() . "internacao/internacao/pesquisar");
    }

    function gravarinternacaonutricao($paciente_id) {
        if ($_POST['leito'] != "" || $_POST['unidade'] != "") {
            $internacao_id = $this->internacao_m->gravarinternacaonutricao($paciente_id);
        } else {
            $internacao_id = 0;
        }
        if ($internacao_id > 0) {
            $data['mensagem'] = 'Internacao gravada com sucesso';
        } else {
            $data['mensagem'] = 'Erro ao gravar movimentacao';
        }
        $this->session->set_flashdata('message', $data['mensagem']);
        redirect(base_url() . "internacao/internacao/selecionarprescricao/$internacao_id");
    }

    function gravarmovimentacao($paciente_id, $leito_id) {

        if ($this->internacao_m->gravarmovimentacao($paciente_id, $leito_id)) {
            $data['mensagem'] = 'Movimentacao gravada com sucesso';
        } else {
            $data['mensagem'] = 'Erro ao gravar movimentacao';
        }
        $this->session->set_flashdata('message', $data['mensagem']);
        redirect(base_url() . "internacao/internacao/acoes/$paciente_id");
    }

    function gravarsolicitacaointernacao($paciente_id) {

        if ($this->solicitacaointernacao_m->gravarsolicitacaointernacao($paciente_id)) {
            $data['mensagem'] = 'Solicitacao gravada com sucesso';
        } else {
            $data['mensagem'] = 'Erro ao gravar solicitacao';
        }
        $this->session->set_flashdata('message', $data['mensagem']);
        redirect(base_url() . "internacao/internacao/pesquisarsolicitacaointernacao");
    }

    function carregarsolicitacaointernacao($internacao_solicitacao_id) {
        $obj_paciente = new solicitainternacao_model($internacao_solicitacao_id);
        $data['obj'] = $obj_paciente;
        $this->loadView('internacao/cadastrarsolicitacaointernacao', $data);
    }

    function selecionarprescricao($internacao_id) {
        $data['internacao_id'] = $internacao_id;
        $data['saida'] = $this->internacao_m->listarmotivosaida();
        $this->loadView('internacao/selecionarprescricao', $data);
    }

    function excluiritemprescicao($item_id, $internacao_id) {
        $this->internacao_m->excluiritemprescicao($item_id);
        $this->prescricaonormalenteral($internacao_id);
    }

    function repetirultimaprescicaoenteralnormal($internacao_id) {
        $this->internacao_m->repetirultimaprescicaoenteralnormal($internacao_id);
        redirect(base_url() . "seguranca/operador/pesquisarrecepcao");
    }

    function finalizarprescricaoenteralnormal($internacao_id) {
        $this->internacao_m->repetirultimaprescicaoenteralnormal($internacao_id);
        redirect(base_url() . "seguranca/operador/pesquisarrecepcao");
    }

    function repetirultimaprescicaoenteralnormalealterar($internacao_id) {
        $internacao_precricao_id = $this->internacao_m->repetirultimaprescicaoenteralnormal($internacao_id);
        $this->prescricaonormalenteral($internacao_id, $internacao_precricao_id);
    }

    function prescricaonormalenteraltrabalho($internacao_id) {
        $data['internacao_id'] = $internacao_id;
//        $data['prescricao'] = $this->internacao_m->listaultimaprescricaoenteral($internacao_id);
//        $data['prescricaoatual'] = $this->internacao_m->listaprescricoesenteral($internacao_id);
        $data['paciente_id'] = $this->internacao_m->listapacienteid($internacao_id);
        $paciente_id = $data['paciente_id'][0]->paciente_id;
        $data['paciente'] = $this->internacao_m->listainternao($internacao_id);
        $this->loadView('internacao/repetirprescricaonormalenteral', $data);
    }
    function listafichadeavaliacao($internacao_id) {
        
        $data['lista'] = $this->internacao_m->listafichadeavaliacao($internacao_id);

        $data['ficha'] = isset($data['lista'][0]->internacao_fichadeavaliacao_id)?$data['lista'][0]->internacao_fichadeavaliacao_id:'';

        $data['internacao_id'] = $internacao_id;
//        echo var_dump($data['ficha']);
//        die;
        $this->loadView('internacao/listarfichadeavaliacao', $data);
    }
    
    function novofichadeavaliacao($internacao_id) {
        $data['internacao_id'] = $internacao_id;
//        $data['prescricao'] = $this->internacao_m->listaultimaprescricaoenteral($internacao_id);
//        $data['prescricaoatual'] = $this->internacao_m->listaprescricoesenteral($internacao_id);
        $data['paciente_id'] = $this->internacao_m->listapacienteid($internacao_id);
        $paciente_id = $data['paciente_id'][0]->paciente_id;
        $data['paciente'] = $this->internacao_m->listainternacaofichadeavaliacao($internacao_id);
        $this->loadView('internacao/novofichadeavaliacao', $data);
    }
    
    function gravarfichadeavaliacao($internacao_id) {
//      echo  var_dump($_POST);
//      die;
        $data['paciente_id'] = $this->internacao_m->listapacienteid($internacao_id);
        $data['paciente'] = $this->internacao_m->listainternacaofichadeavaliacao($internacao_id);
        $data['empresa'] = $this->internacao_m->empresa();
        $this->internacao_m->gravarfichadeavaliacao($internacao_id);
        if ($return==0) {
            $data['mensagem'] = 'Ficha de avaliação gravada com sucesso';
        } else {
            $data['mensagem'] = 'Erro ao gravar Ficha de avaliação';
        }
        $this->session->set_flashdata('message', $data['mensagem']);
        
//        echo var_dump($data['diagnostico']);
//        die;
//        $data['impressao'] = $this->internacao_m->imprimirfichadeavaliacao($internacao_id);
        
//        $this->load->View('internacao/listarfichadeavaliacao/', $data);
        redirect(base_url() . "internacao/internacao/listafichadeavaliacao/$internacao_id", $data);
    }
    function imprimirfichadeavaliacao($internacao_fichadeavaliacao_id) {
        $data['impressao'] = $this->internacao_m->imprimirfichadeavaliacao($internacao_fichadeavaliacao_id);
        $data['empresa'] = $this->internacao_m->empresa();
//        echo var_dump($data['impressao'][0]);
//        die;
        
        
        $this->load->View('internacao/imprimirfichadeavaliacao', $data);

    }
    
    
    
    function diagnosticofichadeavaliacao($internacao_fichadeavaliacao_id) {
       $data['internacao_fichadeavaliacao_id'] = $internacao_fichadeavaliacao_id;
       $data['diagnostico'] = $this->internacao_m->diagnosticofichadeavaliacao($internacao_fichadeavaliacao_id);
//        $data['diagnostico'] = $this->internacao_m->gravardiagnosticofichadeavaliacao($internacao_fichadeavaliacao_id);
        //Criar outra função apenas para mostrar a tela e depois entrar em gravar
//        echo var_dump($data['diagnostico']);
//        die;
        $this->loadView('internacao/diagnosticofichadeavaliacao', $data);
//        redirect(base_url() . "internacao/internacao/listafichadeavaliacao/$internacao_id");
    }
    function gravardiagnosticofichadeavaliacao($internacao_fichadeavaliacao_id) {
//       echo var_dump($internacao_fichadeavaliacao_id);
//        die;
        $data['internacao_id'] = $this->internacao_m->diagnosticofichadeavaliacao($internacao_fichadeavaliacao_id);
        $internacao_id= $data['internacao_id'][0]->internacao_id;
//               echo var_dump($data['internacao_id'][0]->internacao_id);
//        die;
       $this->internacao_m->gravardiagnosticofichadeavaliacao($internacao_fichadeavaliacao_id);
       if ($return==0) {
            $data['mensagem'] = 'Diagnostico gravado com sucesso';
        } else {
            $data['mensagem'] = 'Erro ao gravar Diagnostico';
        }
        $this->session->set_flashdata('message', $data['mensagem']);


        redirect(base_url() . "internacao/internacao/listafichadeavaliacao/$internacao_id", $data);
    }
    
    
    function relatoriotemperaturabolsaparenteral() {

        $this->loadView('internacao/relatoriotemperaturabolsaparenteral');

    }

    function impressaorelatoriotemperaturabolsaparenteral() {
        $data['listar'] = $this->internacao_m->impressaorelatoriotemperaturabolsaparenteral();
        $data['empresa'] = $this->internacao_m->empresa();
//          echo var_dump($data['listar']);
//        die;

        $this->load->View('internacao/impressaorelatoriotemperaturabolsaparenteral', $data);

    }
    
    function relatoriotemperaturabolsaparenteralentrega() {

        $this->loadView('internacao/relatoriotemperaturabolsaparenteralentrega');

    }

    function impressaorelatoriotemperaturabolsaparenteralentrega() {
        $data['listar'] = $this->internacao_m->impressaorelatoriotemperaturabolsaparenteralentrega();
        $data['empresa'] = $this->internacao_m->empresa();
//          echo var_dump($data['listar']);
//        die;

        $this->load->View('internacao/impressaorelatoriotemperaturabolsaparenteralentrega', $data);

    }

    function relatorioentrega($internacao_id) {
        $data['internacao_id'] = $internacao_id;
        $data['paciente'] = $this->internacao_m->listainternao($internacao_id);
        $data['empresa'] = $this->internacao_m->empresa();
        $this->load->View('internacao/relatorioentrega', $data);
    }

    function alterarnormalenteral($internacao_id) {
        $data['internacao_id'] = $internacao_id;
        $data['paciente'] = $this->internacao_m->listainternao($internacao_id);
        $data['empresa'] = $this->internacao_m->empresa();
        $this->loadView('internacao/alterarprescricaonormalenteral', $data);
    }

    function geraralterarnormalenteral($internacao_id) {
        $data['internacao_id'] = $internacao_id;
        $data['enteral'] = $this->internacao_m->listaprodutosenteral($internacao_id);
        $data['equipo'] = $this->internacao_m->listaprodutosequipo($internacao_id);
        $data['prescricao'] = $this->internacao_m->listaprescricoesenteralalterar($internacao_id);
        $data['paciente_id'] = $this->internacao_m->listapacienteid($internacao_id);
        $paciente_id = $data['paciente_id'][0]->paciente_id;
        $data['paciente'] = $this->paciente->listardados($paciente_id);
        $this->loadView('internacao/prescricaonormalenteral', $data);
    }

    function prescricaonormalenteral($internacao_id, $internacao_precricao_id=null) {
        $data['internacao_id'] = $internacao_id;
        $data['medico'] = $this->operador_m->listarmedicos();
        $data['enteral'] = $this->internacao_m->listaprodutosenteral($internacao_id);
        $data['equipo'] = $this->internacao_m->listaprodutosequipo($internacao_id);
        $data['prescricao'] = $this->internacao_m->listaprescricoesenteral($internacao_id, $internacao_precricao_id);
        $data['paciente_id'] = $this->internacao_m->listapacienteid($internacao_id);
        $paciente_id = $data['paciente_id'][0]->paciente_id;
        $data['paciente'] = $this->paciente->listardados($paciente_id);
//        echo var_dump($data['equipo']); die;
        $this->loadView('internacao/prescricaonormalenteral', $data);
        
    }

    function prescricaoemergencialenteral($internacao_id) {
        $data['internacao_id'] = $internacao_id;
        $data['enteral'] = $this->internacao_m->listaprodutosenteral($internacao_id);
        $data['equipo'] = $this->internacao_m->listaprodutosequipo($internacao_id);
        $data['prescricao'] = $this->internacao_m->listaprescricoesenteralemergencial($internacao_id);
        $data['paciente_id'] = $this->internacao_m->listapacienteid($internacao_id);
        $paciente_id = $data['paciente_id'][0]->paciente_id;
        $data['paciente'] = $this->paciente->listardados($paciente_id);
        $this->loadView('internacao/prescricaoemergencialenteral', $data);
    }

    function listarprescricaopaciente($internacao_id) {
        $data['internacao_id'] = $internacao_id;
        $data['prescricao'] = $this->internacao_m->listaprescricoespaciente($internacao_id);
        $data['prescricaoequipo'] = $this->internacao_m->listaprescricoespacienteequipo($internacao_id);
        $this->loadView('internacao/listarprescricaoenteral', $data);
    }

    function etiquetapaciente($internacao_precricao_id) {
        $data['internacao_precricao_id'] = $internacao_precricao_id;
        $data['prescricao'] = $this->internacao_m->etiquetapaciente($internacao_precricao_id);
//        echo '<pre>';
//        var_dump($data['prescricao']);
//        die;
        $data['prescricaoequipo'] = $this->internacao_m->etiquetapacienteequipo($internacao_precricao_id);

        if($data['prescricao'][0]->sf == 'f'){
        $this->load->View('internacao/impressaoetiquetapacienteenteral', $data);
        }else{
        $this->load->View('internacao/impressaoetiquetapacienteenteralsf', $data);
        }
    }

    function listarprescricao() {
        $data['unidade'] = $this->internacao_m->listaunidade();
        $this->loadView('internacao/relatorioprescricao', $data);
    }

    function gerarelatoriointernacao() {
        $data['prescricao'] = $this->internacao_m->listaprescricoesdata();
//        echo '<pre>';
//        var_dump($data['prescricao']);
//        echo '<pre>';
//        die;
        $data['empresa'] = $this->internacao_m->empresa();
        $data['data_inicio'] = $_POST['txtdata_inicio'];
        $data['data_fim'] = $_POST['txtdata_fim'];
        $data['tipo'] = $_POST['tipo'];
        $relatorio = $_POST['relatorio'];
        if ($_POST['unidade'] != 0) {
            $unidade = $this->internacao_m->pesquisarunidade($_POST['unidade']);
            $data['unidade'] = $unidade[0]->nome;
        } else {
            $data['unidade'] = 'TODOS';
        }
        $data['prescricaoequipo'] = $this->internacao_m->listaprescricoesequipodata();
        if ($relatorio == 'VISUALIZAR') {
            $this->load->View('internacao/listarprescricoes', $data);
        }
        if ($relatorio == 'IMPRESSAONORMAL') {
            $data['prescricoes'] = $this->internacao_m->listaprescricoesdataproducao();
//            var_dump($data['prescricoes']);
//            die;
            $this->load->View('internacao/listarprescricaoenteralnormal', $data);
        }
        if ($relatorio == 'IMPRESSAOPEQUENA') {
            $data['prescricoes'] = $this->internacao_m->listaprescricoesdataproducao();
            $this->load->View('internacao/listarprescricaoenteralresumo', $data);
        }
    }

    function gerarelatoriohoraentrega($hospital) {

        $data['prescricao'] = $this->internacao_m->listarrelatoriohoraentrega($hospital);
        $data['empresa'] = $this->internacao_m->empresa();
        $this->load->View('internacao/listarhoraentrega', $data);
    }

    function gravarprescricaoenteralnormal($internacao_id) {
        $data['internacao_precricao_etapa_id'] = $this->internacao_m->gravarprescricaoenteralnormal($internacao_id);
        $i = 0;
        $etapa = $_POST['etapas'];
        $volume = 0;
        foreach ($_POST['produto'] as $produto) {
            $c = 0;
            $i++;

            foreach ($_POST['volume'] as $itemvolume) {
                $c++;
                if ($i == $c) {
                    if($itemvolume != ""){
                      $volume = $volume + $itemvolume;  
                    }
                    break;
                }
            }
        }
        $data['volume'] = $volume / $etapa;
        $data['internacao_id'] = $internacao_id;
        $this->loadView('internacao/confirmarvolume', $data);
//        redirect(base_url() . "internacao/internacao/prescricaonormalenteral/$internacao_id");
    }

    function gravarvolume($internacao_id) {
        $internacao_precricao = $this->internacao_m->gravaretapa($internacao_id);
        $internacao_precricao_id = $internacao_precricao[0]->internacao_precricao_id;
        redirect(base_url() . "internacao/internacao/prescricaonormalenteral/$internacao_id/$internacao_precricao_id");
    }

    function gravarprescricaoenteralemergencial($internacao_id) {
        $this->internacao_m->gravarprescricaoenteralemergencial($internacao_id);
        redirect(base_url() . "internacao/internacao/prescricaoemergencialenteral/$internacao_id");
    }

    function carregar($emergencia_solicitacao_acolhimento_id) {
        $obj_paciente = new paciente_model($emergencia_solicitacao_acolhimento_id);
        $data['obj'] = $obj_paciente;
        $this->loadView('emergencia/solicita-acolhimento-ficha', $data);
    }

    function carregarunidade($internacao_unidade_id) {
        $obj_paciente = new unidade_model($internacao_unidade_id);
        $data['obj'] = $obj_paciente;
        $this->loadView('internacao/cadastrarunidade', $data);
    }

    function adicionarprocedimentoconvenio($internacao_unidade_id) {
        $this->internacao_m->gravarprescricaoenteralemergencial($internacao_unidade_id);
        $this->internacao_m->gravarprescricaoenteralemergencial($internacao_unidade_id);
        $this->loadView('internacao/cadastrarunidade', $data);
    }

    function carregarenfermaria($internacao_enfermaria_id) {
        $obj_paciente = new enfermaria_model($internacao_enfermaria_id);
        $data['obj'] = $obj_paciente;
        $this->loadView('internacao/cadastrarenfermaria', $data);
    }

    function carregarleito($internacao_leito_id) {
        $obj_paciente = new leito_model($internacao_leito_id);
        $data['obj'] = $obj_paciente;
        $this->loadView('internacao/cadastrarleito', $data);
    }

}

?>
