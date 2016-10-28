<?php

require_once APPPATH . 'controllers/base/BaseController.php';

/**
 * Esta parenteral é o controler de Servidor. Responsável por chamar as funções e views, efetuando as chamadas de models
 * @author Equipe de desenvolvimento APH
 * @version 1.0
 * @copyright Prefeitura de Fortaleza
 * @access public
 * @package Model
 * @subpackage GIAH
 */
class Parenteral extends BaseController {

    function Parenteral() {
        parent::Controller();
        $this->load->model('estoque/parenteral_model', 'parenteral');
        $this->load->model('estoque/cliente_model', 'cliente');
        $this->load->model('ambulatorio/guia_model', 'guia');
        $this->load->model('cadastro/convenio_model', 'convenio');
        $this->load->library('mensagem');
        $this->load->library('utilitario');
        $this->load->library('pagination');
        $this->load->library('validation');
    }

    function index() {
        $this->pesquisar();
    }

//    function pesquisar($args = array()) {
//
//        $this->loadView('estoque/entradaparenteral-lista', $args);
//
//    }
    
    function pesquisarestoqueparenteral($args = array()) {

        $this->loadView('estoque/entradaparenteralhigienizacao-lista', $args);

    }
    
    function pesquisarestoqueparenteralgeladeira($args = array()) {

        $this->loadView('estoque/geladeira-lista', $args);

    }
    
    function novageladeira() {

        $this->loadView('estoque/geladeira-form');

    }
    
    function relatorioentradaparenteral() {
        $this->loadView('estoque/relatorioentradaparenteral');
    }
    
     function impressaorelatorioentradaparenteral() {
        $data['listar'] = $this->parenteral->impressaorelatorioentradaparenteral();
        $data['empresa'] = $this->parenteral->empresa();
//          echo var_dump($data['listar']);
//        die;

        $this->load->View('estoque/impressaorelatorioentradaparenteral', $data);

    }
    
    function relatoriotemperaturaparenteral() {

        $this->loadView('estoque/relatoriotemperaturaparenteral');

    }

    function impressaorelatoriotemperaturaparenteral() {
        $data['listar'] = $this->parenteral->impressaorelatoriotemperaturaparenteral();
        $data['empresa'] = $this->parenteral->empresa();
//          echo var_dump($data['listar']);
//        die;

        $this->load->View('estoque/impressaorelatoriotemperaturaparenteral', $data);

    }
    
    function relatoriotemperaturaumidadeparenteral() {

        $this->loadView('estoque/relatoriotemperaturaumidadeparenteral');

    }

    function impressaorelatoriotemperaturaumidadeparenteral() {
        $data['listar'] = $this->parenteral->impressaorelatoriotemperaturaumidadeparenteral();
        $data['empresa'] = $this->parenteral->empresa();
//          echo var_dump($data['listar']);
//        die;

        $this->load->View('estoque/impressaorelatoriotemperaturaumidadeparenteral', $data);

    }
    
    function relatoriohigienizacaoparenteral() {

        $this->loadView('estoque/relatoriohigienizacaoparenteral');

    }

    function impressaorelatoriohigienizacaoparenteral() {
        $data['listar'] = $this->parenteral->impressaorelatoriohigienizacaoparenteral();
        $data['empresa'] = $this->parenteral->empresa();
//          echo var_dump($data['listar']);
//        die;

        $this->load->View('estoque/impressaorelatoriohigienizacaoparenteral', $data);

    }

    function gravargeladeiraparenteral() {

         $this->parenteral->gravargeladeiraparenteral();
         
        if ($teste == 0) {
            $data['mensagem'] = 'Sucesso ao gravar Geladeira';
        } else {
            $data['mensagem'] = 'Erro ao gravar Geladeira';
        }
        $this->session->set_flashdata('message', $data['mensagem']);
        redirect(base_url() . "estoque/parenteral/pesquisarestoqueparenteralgeladeira");

    }
    
    function alterargeladeiraparenteral($estoque_parenteral_geladeira_id) {
        $data['geladeira']= $this->parenteral->carregargeladeira($estoque_parenteral_geladeira_id);
         
        $this->loadView('estoque/alterargeladeira', $data);

    }
    
    function gravaralterargeladeiraparenteral($estoque_parenteral_geladeira_id) {

         $this->parenteral->gravaralterargeladeiraparenteral($estoque_parenteral_geladeira_id);
         
        if ($teste == 0) {
            $data['mensagem'] = 'Sucesso ao alterar Geladeira';
        } else {
            $data['mensagem'] = 'Erro ao alterar Geladeira';
        }
        $this->session->set_flashdata('message', $data['mensagem']);
        redirect(base_url() . "estoque/parenteral/pesquisarestoqueparenteralgeladeira");

    }
    
    function excluirgeladeiraparenteral($estoque_parenteral_geladeira_id) {

         $this->parenteral->excluirgeladeiraparenteral($estoque_parenteral_geladeira_id);
         
        if ($teste == 0) {
            $data['mensagem'] = 'Sucesso ao excluir Geladeira';
        } else {
            $data['mensagem'] = 'Erro ao excluir Geladeira';
        }
        $this->session->set_flashdata('message', $data['mensagem']);
        redirect(base_url() . "estoque/parenteral/pesquisarestoqueparenteralgeladeira");

    }
    
    
    function checagemtemperaturaparenteral() {

        $this->loadView('estoque/checagemtemperaturaparenteral');

    }
    
    function listarchecagemtemperaturaparenteral($estoque_parenteral_geladeira_id) {
        
        $data['estoque_parenteral_geladeira_id']= $estoque_parenteral_geladeira_id;
        $data['lista']= $this->parenteral->listartemperaturas($estoque_parenteral_geladeira_id);

        $this->loadView('estoque/listartemperatura', $data);

    }
    
    function listarumidadeambienteparenteral() {

        $data['lista']= $this->parenteral->listarumidadeambienteparenteral();

        $this->loadView('estoque/umidadeambienteparenteral', $data);

    }
    
    function registrarumidadeambienteparenteral() {

        $this->loadView('estoque/registrarumidadeambienteparenteral');

    }
    
    function gravarumidadeambienteparenteral() {
        
        $this->parenteral->gravarumidadeambienteparenteral();
         
        if ($teste == 0) {
            $data['mensagem'] = 'Sucesso ao gravar umidade e temperatura';
        } else {
            $data['mensagem'] = 'Erro ao gravar umidade e temperatura';
        }
        $this->session->set_flashdata('message', $data['mensagem']);
        redirect(base_url() . "estoque/parenteral/listarumidadeambienteparenteral");

    }
    
    function registrartemperatura($estoque_parenteral_geladeira_id) {
        
        $data['estoque_parenteral_geladeira_id']= $estoque_parenteral_geladeira_id;
        
        $this->loadView('estoque/registrartemperatura', $data);

    }
    
    function gravarregistrartemperatura($estoque_parenteral_geladeira_id) {
        $data['estoque_parenteral_geladeira_id']= $estoque_parenteral_geladeira_id;
        
        $this->parenteral->gravarregistrartemperatura($estoque_parenteral_geladeira_id);
         
        if ($teste == 0) {
            $data['mensagem'] = 'Sucesso ao gravar temperatura';
        } else {
            $data['mensagem'] = 'Erro ao gravar temperatura';
        }
        $this->session->set_flashdata('message', $data['mensagem']);
        redirect(base_url() . "estoque/parenteral/listarchecagemtemperaturaparenteral/$estoque_parenteral_geladeira_id");

    }

    function entradaestoqueparenteralhigienizacao($estoque_entrada_parenteral_id) {

        $data['listar'] = $this->parenteral->entradaparenteralhigienizacao($estoque_entrada_parenteral_id);
        
//        echo var_dump($data['listar']);
//        die;
        
        
        $this->loadView('estoque/entradaparenteralhigienizacao-form', $data);
    }
    
    function gravarentradaestoqueparenteralhigienizacao($estoque_entrada_parenteral_id) {
        
        $this->parenteral->gravarentradaestoqueparenteralhigienizacao($estoque_entrada_parenteral_id);
        if ($teste == 0) {
            $data['mensagem'] = 'Sucesso ao gravar entrada de produto na sala de higienização';
        } else {
            $data['mensagem'] = 'Erro ao gravar entrada de produto na sala de higienização.';
        }
        $this->session->set_flashdata('message', $data['mensagem']);
        redirect(base_url() . "estoque/parenteral/pesquisarestoqueparenteral");
   
       
    }
    
    function entradaestoqueparenteral($estoque_saida_id) {

        $data['listar'] = $this->parenteral->entradaparenteral($estoque_saida_id);
        
//        echo var_dump($data['listar']);
//        die;
        
        
        $this->loadView('estoque/entradaparenteral-form', $data);
    }

    

    function gravarentradaestoqueparenteral($estoque_saida_id) {
        
        $this->parenteral->gravarentradaestoqueparenteral($estoque_saida_id);
        if ($teste == 0) {
            $data['mensagem'] = 'Sucesso ao gravar entrada de produto no estoque parenteral';
        } else {
            $data['mensagem'] = 'Erro ao gravar entrada de produto no estoque parenteral.';
        }
        $this->session->set_flashdata('message', $data['mensagem']);
        redirect(base_url() . "estoque/parenteral");
   
       
    }

    function gerarelatoriosaldo() {
        $armazem = $_POST['armazem'];
        $estoque_fornecedor_id = $_POST['txtfornecedor'];
        $estoque_produto_id = $_POST['txtproduto'];
        if ($armazem == 0) {
            $data['armazem'] = 0;
        } else {
            $data['armazem'] = $this->parenteral->listararmazemcada($armazem);
        }
        if ($estoque_fornecedor_id == '') {
            $data['fornecedor'] = 0;
        } else {
            $data['fornecedor'] = $this->parenteral->listarfornecedorcada($estoque_fornecedor_id);
        }
        if ($estoque_produto_id == '') {
            $data['produto'] = 0;
        } else {
            $data['produto'] = $this->parenteral->listarprodutocada($estoque_produto_id);
        }

        $data['empresa'] = $this->guia->listarempresa($_POST['empresa']);
        $data['contador'] = $this->parenteral->relatoriosaldocontador();
        $data['relatorio'] = $this->parenteral->relatoriosaldo();
        $this->load->View('estoque/impressaorelatoriosaldo', $data);
    }

    function relatoriominimo() {
        $data['armazem'] = $this->parenteral->listararmazem();
        $data['empresa'] = $this->guia->listarempresas();
        $this->loadView('estoque/relatoriominimo', $data);
    }

    function gerarelatoriominimo() {
        $armazem = $_POST['armazem'];
        if ($armazem == 0) {
            $data['armazem'] = 0;
        } else {
            $data['armazem'] = $this->parenteral->listararmazemcada($armazem);
        }
        $data['empresa'] = $this->guia->listarempresa($_POST['empresa']);
        $data['contador'] = $this->parenteral->relatoriominimoarmazemcontador();
        $data['relatorio'] = $this->parenteral->relatoriominimoarmazem();
        $this->load->View('estoque/impressaorelatoriominimo', $data);
    }

    function relatorioprodutos() {
        $data['empresa'] = $this->guia->listarempresas();
        $this->loadView('estoque/relatorioprodutos', $data);
    }

    function gerarelatorioprodutos() {
        $data['empresa'] = $this->guia->listarempresa($_POST['empresa']);
        $data['contador'] = $this->parenteral->relatorioprodutocontador();
        $data['relatorio'] = $this->parenteral->relatorioproduto();
        $this->load->View('estoque/impressaorelatorioprodutos', $data);
    }

    function relatoriofornecedores() {
        $data['empresa'] = $this->guia->listarempresas();
        $this->loadView('estoque/relatoriofornecedores', $data);
    }

    function gerarelatoriofornecedores() {
        $data['empresa'] = $this->guia->listarempresa($_POST['empresa']);
        $data['contador'] = $this->parenteral->relatoriofornecedorescontador();
        $data['relatorio'] = $this->parenteral->relatoriofornecedores();
        $this->load->View('estoque/impressaorelatoriofornecedores', $data);
    }

    function relatorioparenteralarmazem() {
        $data['armazem'] = $this->parenteral->listararmazem();
        $data['empresa'] = $this->guia->listarempresas();
        $this->loadView('estoque/relatorioparenteralarmazem', $data);
    }

    function gerarelatorioparenteralarmazem() {
        $armazem = $_POST['armazem'];
        $estoque_fornecedor_id = $_POST['txtfornecedor'];
        $estoque_produto_id = $_POST['txtproduto'];
        $data['txtdata_inicio'] = $_POST['txtdata_inicio'];
        $data['txtdata_fim'] = $_POST['txtdata_fim'];
        if ($armazem == 0) {
            $data['armazem'] = 0;
        } else {
            $data['armazem'] = $this->parenteral->listararmazemcada($armazem);
        }
        if ($estoque_fornecedor_id == '') {
            $data['fornecedor'] = 0;
        } else {
            $data['fornecedor'] = $this->parenteral->listarfornecedorcada($estoque_fornecedor_id);
        }
        if ($estoque_produto_id == '') {
            $data['produto'] = 0;
        } else {
            $data['produto'] = $this->parenteral->listarprodutocada($estoque_produto_id);
        }

        $data['empresa'] = $this->guia->listarempresa($_POST['empresa']);
        $data['contador'] = $this->parenteral->relatorioparenteralarmazemcontador();
        $data['relatorio'] = $this->parenteral->relatorioparenteralarmazem();
        $this->load->View('estoque/impressaorelatorioparenteralarmazem', $data);
    }

    function relatoriosaidaarmazem() {
        $data['armazem'] = $this->parenteral->listararmazem();
        $data['empresa'] = $this->guia->listarempresas();
        $data['cliente'] = $this->cliente->listarclientes();
        $this->loadView('estoque/relatoriosaidaarmazem', $data);
    }

    function gerarelatoriosaidaarmazem() {
        $armazem = $_POST['armazem'];
        $data['txtdata_inicio'] = $_POST['txtdata_inicio'];
        $data['txtdata_fim'] = $_POST['txtdata_fim'];
        $estoque_fornecedor_id = $_POST['txtfornecedor'];
        $estoque_produto_id = $_POST['txtproduto'];
        if ($armazem == 0) {
            $data['armazem'] = 0;
        } else {
            $data['armazem'] = $this->parenteral->listararmazemcada($armazem);
        }
        if ($estoque_fornecedor_id == '') {
            $data['fornecedor'] = 0;
        } else {
            $data['fornecedor'] = $this->parenteral->listarfornecedorcada($estoque_fornecedor_id);
        }
        if ($estoque_produto_id == '') {
            $data['produto'] = 0;
        } else {
            $data['produto'] = $this->parenteral->listarprodutocada($estoque_produto_id);
        }

        $data['empresa'] = $this->guia->listarempresa($_POST['empresa']);
        $data['contador'] = $this->parenteral->relatoriosaidaarmazemcontador();
        $data['relatorio'] = $this->parenteral->relatoriosaidaarmazem();
        $this->load->View('estoque/impressaorelatoriosaidaarmazem', $data);
    }

    function excluir($estoque_parenteral_id) {
        $valida = $this->parenteral->excluir($estoque_parenteral_id);
        if ($valida == 0) {
            $data['mensagem'] = 'Sucesso ao excluir a Parenteral';
        } else {
            $data['mensagem'] = 'Erro ao excluir a parenteral. Opera&ccedil;&atilde;o cancelada.';
        }
        $this->session->set_flashdata('message', $data['mensagem']);
        redirect(base_url() . "estoque/parenteral");
    }

    function gravar() {
        $exame_parenteral_id = $this->parenteral->gravar();
        if ($exame_parenteral_id == "-1") {
            $data['mensagem'] = 'Erro ao gravar a Parenteral. Opera&ccedil;&atilde;o cancelada.';
        } else {
            $data['mensagem'] = 'Sucesso ao gravar a Parenteral.';
        }
        $this->session->set_flashdata('message', $data['mensagem']);
        redirect(base_url() . "estoque/parenteral");
    }

    private function carregarView($data = null, $view = null) {
        if (!isset($data)) {
            $data['mensagem'] = '';
        }

        if ($this->utilitario->autorizar(2, $this->session->userdata('modulo')) == true) {
            $this->load->view('header', $data);
            if ($view != null) {
                $this->load->view($view, $data);
            } else {
                $this->load->view('giah/servidor-lista', $data);
            }
        } else {
            $data['mensagem'] = $this->mensagem->getMensagem('login005');
            $this->load->view('header', $data);
            $this->load->view('home');
        }
        $this->load->view('footer');
    }
 
    function anexarimagemparenteral($estoque_parenteral_id) {

        $this->load->helper('directory');
        $data['arquivo_pasta'] = directory_map("./upload/parenteraldenota/$estoque_parenteral_id/");
//        $data['arquivo_pasta'] = directory_map("/home/vivi/projetos/clinica/upload/consulta/$paciente_id/");
        if ($data['arquivo_pasta'] != false) {
            sort($data['arquivo_pasta']);
        }
        $data['estoque_parenteral_id'] = $estoque_parenteral_id;
        $this->loadView('estoque/importacao-imagemparenteral', $data);
    }

    function importarimagemparenteral() {
        $estoque_parenteral_id = $_POST['paciente_id'];
//        $data = $_FILES['userfile'];
//        var_dump($data);
//        die;
        if (!is_dir("./upload/parenteraldenota/$estoque_parenteral_id")) {
            mkdir("./upload/parenteraldenota/$estoque_parenteral_id");
            $destino = "./upload/parenteraldenota/$estoque_parenteral_id";
            chmod($destino, 0777);
        }

//        $config['upload_path'] = "/home/vivi/projetos/clinica/upload/consulta/" . $paciente_id . "/";
        $config['upload_path'] = "./upload/parenteraldenota/" . $estoque_parenteral_id . "/";
        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx|xls|xlsx|ppt|zip|rar';
        $config['max_size'] = '0';
        $config['overwrite'] = FALSE;
        $config['encrypt_name'] = FALSE;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $error = null;
            $data = array('upload_data' => $this->upload->data());
        }
        $data['estoque_parenteral_id'] = $estoque_parenteral_id;
        $this->anexarimagemparenteral($estoque_parenteral_id);
    }
    
    
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
