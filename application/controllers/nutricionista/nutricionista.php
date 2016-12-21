<?php

require_once APPPATH . 'controllers/base/BaseController.php';

class nutricionista extends BaseController {

    function __construct() {
        parent::__construct();
        $this->load->model('emergencia/solicita_acolhimento_model', 'acolhimento');
        $this->load->model('cadastro/paciente_model', 'paciente');
        $this->load->model('seguranca/operador_model', 'operador_m');
        $this->load->model('cadastro/convenio_model', 'convenio');
        $this->load->model('ambulatorio/procedimentoplano_model', 'procedimentoplano');
        $this->load->model('ambulatorio/exame_model', 'exame');
        $this->load->model('nutricionista/nutricionista_model', 'nutricionista');
        $this->load->model('nutricionista/unidade_model', 'unidade_m');
        $this->load->model('nutricionista/enfermaria_model', 'enfermaria_m');
        $this->load->model('nutricionista/leito_model', 'leito_m');
        $this->load->library('utilitario');
    }

    public function index() {
        $this->pesquisar();
    }

    public function pesquisar($args = array()) {
        $this->loadView('nutricionista/listarinternacao');
    }

    public function listarprescrever($args = array()) {
        $this->loadView('nutricionista/listarpacientesprescricao');
    }

    public function listarmotoqueiro($args = array()) {
        $this->loadView('nutricionista/listarpacientesmotoqueiro');
    }

    public function pesquisarunidade($args = array()) {
        $this->loadView('nutricionista/listarunidade');
    }

    public function pesquisarenfermaria($args = array()) {
        $this->loadView('nutricionista/listarenfermaria');
    }

    public function pesquisarleito($args = array()) {
        $this->loadView('nutricionista/listarleito');
    }

    public function pesquisarsolicitacaointernacao($args = array()) {
        $this->loadView('nutricionista/listarsolicitacaointernacao');
    }

    function listarevolucaonutricional($internacao_id) {
        $data['internacao_id'] = $internacao_id;
        $data['lista'] = $this->nutricionista->listarevolucaoprescricao($internacao_id);
        $data['teste'] = $this->nutricionista->listarevolucaoprescricaoteste($internacao_id);


        $this->loadView('nutricionista/listarevolucaonutricional', $data);
    }

    function imprimirrevolucaonutricional($internacao_evolucao_id) {
        $data['listar'] = $this->nutricionista->imprimirevolucaoprescricao($internacao_evolucao_id);
        $data['prescricao'] = $this->nutricionista->imprimirprodutoevolucaoprescricao($internacao_evolucao_id);
        $data['empresa'] = $this->nutricionista->empresa();

        $this->load->View('nutricionista/impressaoevolucaonutricional', $data);
    }

    function novoevolucaonutricional($internacao_id) {
        $data['internacao_id'] = $internacao_id;

        $this->loadView('nutricionista/evolucaonutricional', $data);
    }

    function formularioevolucaonutricional($internacao_id) {

        $data['internacao_id'] = $internacao_id;
        $data['prescricao'] = $this->nutricionista->formularioevolucaonutricional($internacao_id);
        $data['prescricoes'] = $this->nutricionista->formularioevolucaonutricional($internacao_id);
        $data['prescricaoequipo'] = $this->nutricionista->formularioevolucaonutricionalequipo($internacao_id);

//      echo  var_dump($data['listar']);
//      die;

        $this->loadView('nutricionista/formularioevolucaonutricional', $data);
    }

    function gravarevolucaonutricional($internacao_id) {


        $this->nutricionista->gravarevolucaoprescricao($internacao_id);
        if ($return == 0) {
            $data['mensagem'] = 'Evolução gravada com sucesso';
            $this->session->set_flashdata('message', $data['mensagem']);
        } else {
            $data['mensagem'] = 'Erro ao gravar evolução';
            $this->session->set_flashdata('message', $data['mensagem']);
        }
        redirect(base_url() . "nutricionista/nutricionista/listarevolucaonutricional/$internacao_id", $data);
    }

    function excluirevolucaonutricional($internacao_evolucao_id) {


        $data['internacao_id'] = $this->nutricionista->idinternacaoevolucaoprescricao($internacao_evolucao_id);
        $internacao_id = $data['internacao_id'][0]->internacao_id;
//       echo var_dump ($data['internacao_id'][0]);
//       die;
        $this->nutricionista->excluirevolucaoprescricao($internacao_evolucao_id);
        if ($return == 0) {
            $data['mensagem'] = 'Evolução excluida com sucesso';
            $this->session->set_flashdata('message', $data['mensagem']);
        } else {
            $data['mensagem'] = 'Erro ao excluir evolução';
            $this->session->set_flashdata('message', $data['mensagem']);
        }
        redirect(base_url() . "nutricionista/nutricionista/listarevolucaonutricional/$internacao_id", $data);
    }

    function alterarprodutoprescricao($internacao_precricao_produto_id) {

        $data['produto'] = $this->nutricionista->produtoexamefaturamento($internacao_precricao_produto_id);
        $internacao_id = $data['produto'][0]->internacao_id;
        $data['enteral'] = $this->nutricionista->listaprodutosenteral($internacao_id);
        $data['equipo'] = $this->nutricionista->listaprodutosequipo($internacao_id);
        $data['internacao_precricao_produto_id'] = $data['produto'][0]->internacao_precricao_produto_id;
//        echo var_dump($data['produto']);
//        die;
        $this->loadView('nutricionista/alterarprodutoprescricao', $data);
    }

    function gravaralterarprodutoprescricao($internacao_precricao_produto_id) {


        $data['antigo'] = $this->nutricionista->alterarprodutoexamefaturamento($internacao_precricao_produto_id);
        $this->nutricionista->gravarprodutoantigoprescricao($data['antigo']);

//       echo var_dump($data['antigo']);
//        die;

        $this->nutricionista->gravaralterarprodutoprescricao($internacao_precricao_produto_id);

        echo '<html>
    <script type="text/javascript">
        alert("Produto Alterado Com Sucesso");
        window.onunload = fechaEstaAtualizaAntiga;
        function fechaEstaAtualizaAntiga() {
            window.opener.location.reload();
        }
        window.close();
    </script>
</html>';
    }

    function gravarsaida($internacao_id) {
        $internacao_saida_id = $_POST['saida'];
        $this->nutricionista->gravarsaida($internacao_id, $internacao_saida_id);
        redirect(base_url() . "nutricionista/internacao");
    }

    function cancelarsuspensao($internacao_id) {
        $this->nutricionista->cancelarsuspensao($internacao_id);
        $this->loadView('nutricionista/listarinternacao');
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
        $data['internacao'] = $this->nutricionista->listarinternacao($paciente_id);
        $data['leitos'] = $this->nutricionista->listarleitosinternacao($paciente_id);
//        echo '<pre>';
//        var_dump($data['internacao']);
//        die;
        $data['paciente_id'] = $paciente_id;
        $horario = date(" Y-m-d H:i:s");

        $hour = substr($horario, 11, 3);
        $minutes = substr($horario, 15, 2);
        $seconds = substr($horario, 18, 4);

        $this->loadView('nutricionista/acoes-paciente', $data);
    }

    function novointernacao($paciente_id) {
        $data['numero'] = $this->nutricionista->verificainternacao($paciente_id);
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
            $this->loadView('nutricionista/cadastrarinternacao', $data);
        } else {
            $data['mensagem'] = 'Paciente ja possui internacao';
            $this->session->set_flashdata('message', $data['mensagem']);
            redirect(base_url() . "nutricionista/nutricionista/pesquisar");
        }
    }

    function novointernacaonutricao($paciente_id) {
        $obj_internacao = new nutricionistaodel($paciente_id);
        $data['obj'] = $obj_internacao;
        $data['numero'] = $this->nutricionista->verificainternacao($paciente_id);
//        var_dump($data['numero']);
//        die;
        $data['paciente'] = $this->paciente->listardados($paciente_id);
        $data['unidade'] = $this->nutricionista->listaunidade();
//            if ($data['paciente'][0]->cep == '' || $data['paciente'][0]->cns == '') {
//                $data['mensagem'] = 'CEP ou CNS obrigatorio';
//                $this->session->set_flashdata('message', $data['mensagem']);
//                redirect(base_url() . "emergencia/filaacolhimento/novo/$paciente_id");
//            }
        $data['paciente_id'] = $paciente_id;
        $this->loadView('nutricionista/cadastrarinternacaonutricao', $data);
    }

    function movimentacao($paciente_id) {

        $data['paciente'] = $this->paciente->listardados($paciente_id);
        $leito = $this->nutricionista->listarleitosinternacao($paciente_id);

        $p = count($leito);
        $i = $p - 1;
        $data['leito'] = $leito["$i"]->leito_id;

        $data['paciente_id'] = $paciente_id;
        $this->loadView('nutricionista/movimentacao', $data);
    }

    function cadastrarprocedimentounidade($internacao_unidade_id) {

        $data['unidade'] = $this->unidade_m->buscarunidades($internacao_unidade_id);
        $data['procedimento'] = $this->procedimentoplano->listarprocedimentoativo();
        $data['procedimentounidade'] = $this->procedimentoplano->listarprocedimentoconveniounidade($internacao_unidade_id);
        $data['internacao_unidade_id'] = $internacao_unidade_id;
        $this->loadView('nutricionista/cadastrarprocedimentounidade', $data);
    }

    function gravarcadastrarprocedimentounidade() {
        $internacao_unidade_id = $_POST['internacao_unidade_id'];
        $this->nutricionista->gravarcadastrarprocedimentounidade();
        redirect(base_url() . "nutricionista/nutricionista/cadastrarprocedimentounidade/$internacao_unidade_id");
    }

    function excluircadastrarprocedimentounidade($internacao_unidade_id, $procedimento_convenio_unidade_id) {
        $this->nutricionista->excluircadastrarprocedimentounidade($procedimento_convenio_unidade_id);
        redirect(base_url() . "nutricionista/nutricionista/cadastrarprocedimentounidade/$internacao_unidade_id");
    }

    function novounidade() {

        $this->loadView('nutricionista/cadastrarunidade');
    }

    function novoenfermaria() {

        $this->loadView('nutricionista/cadastrarenfermaria');
    }

    function novoleito() {

        $this->loadView('nutricionista/cadastrarleito');
    }

    function novosolicitacaointernacao($paciente_id) {
        $data['numero'] = $this->solicitacaonutricionista->verificasolicitacao($paciente_id);
//        var_dump($data['numero']);
//        die;
        if ($data['numero'] == 0) {
            $data['paciente'] = $this->paciente->listardados($paciente_id);
            $data['paciente_id'] = $paciente_id;
            $this->loadView('nutricionista/cadastrarsolicitacaointernacao', $data);
        } else {
            $data['mensagem'] = 'Paciente ja possui solicitacao';
            $this->session->set_flashdata('message', $data['mensagem']);
            redirect(base_url() . "nutricionista/nutricionista/pesquisarsolicitacaointernacao");
        }
    }

    function gravarleito() {

        if ($this->leito_m->gravarleito($_POST)) {
            $data['mensagem'] = 'Leito gravada com sucesso';
        } else {
            $data['mensagem'] = 'Erro ao gravar leito';
        }
        $this->session->set_flashdata('message', $data['mensagem']);
        redirect(base_url() . "nutricionista/nutricionista/pesquisarleito");
    }

    function gravarenfermaria() {

        if ($this->enfermaria_m->gravarenfermaria($_POST)) {
            $data['mensagem'] = 'Enfermaria gravada com sucesso';
        } else {
            $data['mensagem'] = 'Erro ao gravar enfermaria';
        }
        $this->session->set_flashdata('message', $data['mensagem']);
        redirect(base_url() . "nutricionista/nutricionista/pesquisarenfermaria");
    }

    function gravarunidade() {

        if ($this->unidade_m->gravarunidade($_POST)) {
            $data['mensagem'] = 'Unidade gravada com sucesso';
        } else {
            $data['mensagem'] = 'Erro ao gravar unidade';
        }
        $this->session->set_flashdata('message', $data['mensagem']);
        redirect(base_url() . "nutricionista/nutricionista/pesquisarunidade");
    }

    function gravarinternacao($paciente_id) {

        if ($this->nutricionista->gravar($paciente_id)) {
            $data['mensagem'] = 'Internacao gravada com sucesso';
        } else {
            $data['mensagem'] = 'Erro ao gravar movimentacao';
        }
        $this->session->set_flashdata('message', $data['mensagem']);
        redirect(base_url() . "nutricionista/nutricionista/pesquisar");
    }

    function gravarinternacaonutricao($paciente_id) {
        if ($_POST['leito'] != "" || $_POST['unidade'] != "") {
            $internacao_id = $this->nutricionista->gravarinternacaonutricao($paciente_id);
        } else {
            $internacao_id = 0;
        }
        if ($internacao_id > 0) {
            $data['mensagem'] = 'Internacao gravada com sucesso';
        } else {
            $data['mensagem'] = 'Erro ao gravar movimentacao';
        }
        $this->session->set_flashdata('message', $data['mensagem']);
        redirect(base_url() . "nutricionista/nutricionista/selecionarprescricao/$internacao_id");
    }

    function gravarmovimentacao($paciente_id, $leito_id) {

        if ($this->nutricionista->gravarmovimentacao($paciente_id, $leito_id)) {
            $data['mensagem'] = 'Movimentacao gravada com sucesso';
        } else {
            $data['mensagem'] = 'Erro ao gravar movimentacao';
        }
        $this->session->set_flashdata('message', $data['mensagem']);
        redirect(base_url() . "nutricionista/nutricionista/acoes/$paciente_id");
    }

    function gravarsolicitacaointernacao($paciente_id) {

        if ($this->solicitacaonutricionista->gravarsolicitacaointernacao($paciente_id)) {
            $data['mensagem'] = 'Solicitacao gravada com sucesso';
        } else {
            $data['mensagem'] = 'Erro ao gravar solicitacao';
        }
        $this->session->set_flashdata('message', $data['mensagem']);
        redirect(base_url() . "nutricionista/nutricionista/pesquisarsolicitacaointernacao");
    }

    function carregarsolicitacaointernacao($internacao_solicitacao_id) {
        $obj_paciente = new solicitanutricionistaodel($internacao_solicitacao_id);
        $data['obj'] = $obj_paciente;
        $this->loadView('nutricionista/cadastrarsolicitacaointernacao', $data);
    }

    function selecionarprescricao($internacao_id) {
        $data['internacao_id'] = $internacao_id;
        $data['saida'] = $this->nutricionista->listarmotivosaida();
        $this->loadView('nutricionista/selecionarprescricao', $data);
    }

    function excluiritemprescicao($item_id, $internacao_id) {
        $internacao_precricao_produto_id = $item_id;
        $this->nutricionista->gravarprodutoantigoprescricao($internacao_precricao_produto_id);
        $this->nutricionista->excluiritemprescicao($item_id);

        $this->prescricaonormalenteral($internacao_id);
    }

    function repetirultimaprescicaoenteralnormal($internacao_id) {
        $this->nutricionista->repetirultimaprescicaoenteralnormal($internacao_id);
        redirect(base_url() . "seguranca/operador/pesquisarrecepcao");
    }

    function finalizarprescricaoenteralnormal($internacao_id) {
        $this->nutricionista->repetirultimaprescicaoenteralnormal($internacao_id);
        redirect(base_url() . "seguranca/operador/pesquisarrecepcao");
    }

    function repetirultimaprescicaoenteralnormalealterar($internacao_id) {
        $internacao_precricao_id = $this->nutricionista->repetirultimaprescicaoenteralnormal($internacao_id);
        $this->prescricaonormalenteral($internacao_id, $internacao_precricao_id);
    }

    function prescricaonormalenteraltrabalho($internacao_id) {
        $data['internacao_id'] = $internacao_id;
//        $data['prescricao'] = $this->nutricionista->listaultimaprescricaoenteral($internacao_id);
//        $data['prescricaoatual'] = $this->nutricionista->listaprescricoesenteral($internacao_id);
        $data['paciente_id'] = $this->nutricionista->listapacienteid($internacao_id);
        $paciente_id = $data['paciente_id'][0]->paciente_id;
        $data['paciente'] = $this->nutricionista->listainternao($internacao_id);
        $this->loadView('nutricionista/repetirprescricaonormalenteral', $data);
    }

    function listafichadeavaliacao($internacao_id) {

        $data['lista'] = $this->nutricionista->listafichadeavaliacao($internacao_id);

        $data['ficha'] = isset($data['lista'][0]->internacao_fichadeavaliacao_id) ? $data['lista'][0]->internacao_fichadeavaliacao_id : '';

        $data['internacao_id'] = $internacao_id;
//        echo var_dump($data['ficha']);
//        die;
        $this->loadView('nutricionista/listarfichadeavaliacao', $data);
    }

    function novofichadeavaliacao($internacao_id) {
        $data['internacao_id'] = $internacao_id;
//        $data['prescricao'] = $this->nutricionista->listaultimaprescricaoenteral($internacao_id);
//        $data['prescricaoatual'] = $this->nutricionista->listaprescricoesenteral($internacao_id);
        $data['paciente_id'] = $this->nutricionista->listapacienteid($internacao_id);
        $paciente_id = $data['paciente_id'][0]->paciente_id;
        $data['paciente'] = $this->nutricionista->listainternacaofichadeavaliacao($internacao_id);
        $this->loadView('nutricionista/novofichadeavaliacao', $data);
    }

    function gravarfichadeavaliacao($internacao_id) {
//      echo  var_dump($_POST);
//      die;
        $data['paciente_id'] = $this->nutricionista->listapacienteid($internacao_id);
        $data['paciente'] = $this->nutricionista->listainternacaofichadeavaliacao($internacao_id);
        $data['empresa'] = $this->nutricionista->empresa();
        $this->nutricionista->gravarfichadeavaliacao($internacao_id);
        if ($return == 0) {
            $data['mensagem'] = 'Ficha de avaliação gravada com sucesso';
        } else {
            $data['mensagem'] = 'Erro ao gravar Ficha de avaliação';
        }
        $this->session->set_flashdata('message', $data['mensagem']);

//        echo var_dump($data['diagnostico']);
//        die;
//        $data['impressao'] = $this->nutricionista->imprimirfichadeavaliacao($internacao_id);
//        $this->load->View('nutricionista/listarfichadeavaliacao/', $data);
        redirect(base_url() . "nutricionista/nutricionista/listafichadeavaliacao/$internacao_id", $data);
    }

    function imprimirfichadeavaliacao($internacao_fichadeavaliacao_id) {
        $data['impressao'] = $this->nutricionista->imprimirfichadeavaliacao($internacao_fichadeavaliacao_id);
        $data['empresa'] = $this->nutricionista->empresa();
//        echo var_dump($data['impressao'][0]);
//        die;


        $this->load->View('nutricionista/imprimirfichadeavaliacao', $data);
    }

    function diagnosticofichadeavaliacao($internacao_fichadeavaliacao_id) {
        $data['internacao_fichadeavaliacao_id'] = $internacao_fichadeavaliacao_id;
        $data['diagnostico'] = $this->nutricionista->diagnosticofichadeavaliacao($internacao_fichadeavaliacao_id);

        $this->loadView('nutricionista/diagnosticofichadeavaliacao', $data);
    }

    function gravardiagnosticofichadeavaliacao($internacao_fichadeavaliacao_id) {
//       echo var_dump($internacao_fichadeavaliacao_id);
//        die;
        $data['internacao_id'] = $this->nutricionista->diagnosticofichadeavaliacao($internacao_fichadeavaliacao_id);
        $internacao_id = $data['internacao_id'][0]->internacao_id;
//               echo var_dump($data['internacao_id'][0]->internacao_id);
//        die;
        $this->nutricionista->gravardiagnosticofichadeavaliacao($internacao_fichadeavaliacao_id);
        if ($return == 0) {
            $data['mensagem'] = 'Diagnostico gravado com sucesso';
        } else {
            $data['mensagem'] = 'Erro ao gravar Diagnostico';
        }
        $this->session->set_flashdata('message', $data['mensagem']);


        redirect(base_url() . "nutricionista/nutricionista/listafichadeavaliacao/$internacao_id", $data);
    }

    function relatorioentrega($internacao_id) {
        $data['internacao_id'] = $internacao_id;
        $data['paciente'] = $this->nutricionista->listainternao($internacao_id);
        $data['empresa'] = $this->nutricionista->empresa();
        $this->load->View('nutricionista/relatorioentrega', $data);
    }

    function alterarnormalenteral($internacao_id) {
        $data['internacao_id'] = $internacao_id;
        $data['paciente'] = $this->nutricionista->listainternao($internacao_id);
        $data['empresa'] = $this->nutricionista->empresa();
        $this->loadView('nutricionista/alterarprescricaonormalenteral', $data);
    }

    function geraralterarnormalenteral($internacao_precricao_id) {

        $data['teste'] = $this->nutricionista->formularioevolucaonutricionalteste($internacao_precricao_id);

        $internacao_id = $data['teste'][0]->internacao_id;
        $data['internacao_id'] = $internacao_id;
        $teste = $data['teste'];
        $data['medico'] = $this->operador_m->listarmedicos();
        $data['enteral'] = $this->nutricionista->listaprodutosenteral($internacao_id);
        $data['equipo'] = $this->nutricionista->listaprodutosequipo($internacao_id);
        $data['prescricao'] = $this->nutricionista->listaprescricoesenteralalterar($teste);

        $this->loadView('nutricionista/prescricaonormalenteral', $data);
    }
    
    function geraralterarnormalenteralrelatorio($internacao_precricao_id) {

        $data['teste'] = $this->nutricionista->formularioevolucaonutricionalteste($internacao_precricao_id);

        $internacao_id = $data['teste'][0]->internacao_id;
        $data['internacao_id'] = $internacao_id;
        $teste = $data['teste'];
        $data['medico'] = $this->operador_m->listarmedicos();
        $data['enteral'] = $this->nutricionista->listaprodutosenteral($internacao_id);
        $data['equipo'] = $this->nutricionista->listaprodutosequipo($internacao_id);
        $data['prescricao'] = $this->nutricionista->listaprescricoesenteralalterar($teste);

        $this->loadView('nutricionista/prescricaonormalenteral', $data);
    }

    function prescricaonormalenteral($internacao_precricao_id) {
        $data['teste'] = $this->nutricionista->formularioevolucaonutricionalteste($internacao_precricao_id);
        $data['internacao_precricao_id'] = $internacao_precricao_id;
        $internacao_id = $data['teste'][0]->internacao_id;
        $data['internacao_id'] = $internacao_id;
        $teste = $data['teste'];
        $data['medico'] = $this->operador_m->listarmedicos();
        $data['enteral'] = $this->nutricionista->listaprodutosenteral($internacao_id);
        $data['equipo'] = $this->nutricionista->listaprodutosequipo($internacao_id);
        $data['prescricao'] = $this->nutricionista->listaprescricoesenteralalterar($teste);

//        echo var_dump($data['equipo']); die;
        $this->loadView('nutricionista/prescricaonormalenteral', $data);
    }

    function prescricaoemergencialenteral($internacao_id) {
        $data['internacao_id'] = $internacao_id;
        $data['enteral'] = $this->nutricionista->listaprodutosenteral($internacao_id);
        $data['equipo'] = $this->nutricionista->listaprodutosequipo($internacao_id);
        $data['prescricao'] = $this->nutricionista->listaprescricoesenteralemergencial($internacao_id);
        $data['paciente_id'] = $this->nutricionista->listapacienteid($internacao_id);
        $paciente_id = $data['paciente_id'][0]->paciente_id;
        $data['paciente'] = $this->paciente->listardados($paciente_id);
        $this->loadView('nutricionista/prescricaoemergencialenteral', $data);
    }

    function listarprescricaopaciente($internacao_id) {
        $data['internacao_id'] = $internacao_id;
        $data['prescricao'] = $this->nutricionista->listaprescricoespaciente($internacao_id);
        $data['prescricaoequipo'] = $this->nutricionista->listaprescricoespacienteequipo($internacao_id);
        $this->loadView('nutricionista/listarprescricaoenteral', $data);
    }

    function etiquetapaciente($internacao_precricao_id) {
        $data['internacao_precricao_id'] = $internacao_precricao_id;
        $data['prescricao'] = $this->nutricionista->etiquetapaciente($internacao_precricao_id);
//        echo '<pre>';
//        var_dump($data['prescricao']);
//        die;
        $data['prescricaoequipo'] = $this->nutricionista->etiquetapacienteequipo($internacao_precricao_id);

        if ($data['prescricao'][0]->sf == 'f') {
            $this->load->View('nutricionista/impressaoetiquetapacienteenteral', $data);
        } else {
            $this->load->View('nutricionista/impressaoetiquetapacienteenteralsf', $data);
        }
    }

    function listarprescricao() {
        $data['unidade'] = $this->nutricionista->listaunidade();
        $this->loadView('nutricionista/relatorioprescricao', $data);
    }

    function gerarelatoriointernacao() {
        $data['prescricao'] = $this->nutricionista->listaprescricoesdata();
//        echo '<pre>';
//        var_dump($data['prescricao']);
//        echo '<pre>';
//        die;
        $data['empresa'] = $this->nutricionista->empresa();
        $data['data_inicio'] = $_POST['txtdata_inicio'];
        $data['data_fim'] = $_POST['txtdata_fim'];
        $data['tipo'] = $_POST['tipo'];
        $relatorio = $_POST['relatorio'];
        if ($_POST['unidade'] != 0) {
            $unidade = $this->nutricionista->pesquisarunidade($_POST['unidade']);
            $data['unidade'] = $unidade[0]->nome;
        } else {
            $data['unidade'] = 'TODOS';
        }
        $data['prescricaoequipo'] = $this->nutricionista->listaprescricoesequipodata();
        if ($relatorio == 'VISUALIZAR') {
            $this->load->View('nutricionista/listarprescricoes', $data);
        }
        if ($relatorio == 'IMPRESSAONORMAL') {
            $data['prescricoes'] = $this->nutricionista->listaprescricoesdataproducao();
//            var_dump($data['prescricoes']);
//            die;
            $this->load->View('nutricionista/listarprescricaoenteralnormal', $data);
        }
        if ($relatorio == 'IMPRESSAOPEQUENA') {
            $data['prescricoes'] = $this->nutricionista->listaprescricoesdataproducao();
            $this->load->View('nutricionista/listarprescricaoenteralresumo', $data);
        }
    }

    function gerarelatoriohoraentrega($hospital) {

        $data['prescricao'] = $this->nutricionista->listarrelatoriohoraentrega($hospital);
        $data['empresa'] = $this->nutricionista->empresa();
        $this->load->View('nutricionista/listarhoraentrega', $data);
    }

    function gravarprescricaoenteralnormal($internacao_id) {
        $data['internacao_precricao_etapa_id'] = $this->nutricionista->gravarprescricaoenteralnormal($internacao_id);
        $i = 0;
        $etapa = $_POST['etapas'];
        $volume = 0;
        foreach ($_POST['produto'] as $produto) {
            $c = 0;
            $i++;

            foreach ($_POST['volume'] as $itemvolume) {
                $c++;
                if ($i == $c) {
                    if ($itemvolume != "") {
                        $volume = $volume + $itemvolume;
                    }
                    break;
                }
            }
        }
        $data['volume'] = $volume / $etapa;
        $data['internacao_id'] = $internacao_id;
        $this->loadView('nutricionista/confirmarvolume', $data);
//        redirect(base_url() . "nutricionista/nutricionista/prescricaonormalenteral/$internacao_id");
    }

    function gravarvolume($internacao_id) {
        $internacao_precricao = $this->nutricionista->gravaretapa($internacao_id);
        $internacao_precricao_id = $internacao_precricao[0]->internacao_precricao_id;
//        echo "chegou aqui";
//        die;
        echo '<html>
    <head>
    <meta charset="UTF-8">
    </head> 
    <script type="text/javascript">
        alert("Prescrição alterada com sucesso");
        window.onunload = fechaEstaAtualizaAntiga;
        function fechaEstaAtualizaAntiga() {
            window.opener.location.reload();
        }
        window.close();
    </script>
</html>';
    }

    function gravarprescricaoenteralemergencial($internacao_id) {
        $this->nutricionista->gravarprescricaoenteralemergencial($internacao_id);
        redirect(base_url() . "nutricionista/nutricionista/prescricaoemergencialenteral/$internacao_id");
    }

    function carregar($emergencia_solicitacao_acolhimento_id) {
        $obj_paciente = new paciente_model($emergencia_solicitacao_acolhimento_id);
        $data['obj'] = $obj_paciente;
        $this->loadView('emergencia/solicita-acolhimento-ficha', $data);
    }

    function carregarunidade($internacao_unidade_id) {
        $obj_paciente = new unidade_model($internacao_unidade_id);
        $data['obj'] = $obj_paciente;
        $this->loadView('nutricionista/cadastrarunidade', $data);
    }

    function adicionarprocedimentoconvenio($internacao_unidade_id) {
        $this->nutricionista->gravarprescricaoenteralemergencial($internacao_unidade_id);
        $this->nutricionista->gravarprescricaoenteralemergencial($internacao_unidade_id);
        $this->loadView('nutricionista/cadastrarunidade', $data);
    }

    function carregarenfermaria($internacao_enfermaria_id) {
        $obj_paciente = new enfermaria_model($internacao_enfermaria_id);
        $data['obj'] = $obj_paciente;
        $this->loadView('nutricionista/cadastrarenfermaria', $data);
    }

    function carregarleito($internacao_leito_id) {
        $obj_paciente = new leito_model($internacao_leito_id);
        $data['obj'] = $obj_paciente;
        $this->loadView('nutricionista/cadastrarleito', $data);
    }

}

?>
