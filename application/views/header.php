<?
//Da erro no home

if ($this->session->userdata('autenticado') != true) {
    redirect(base_url() . "login/index/login004", "refresh");
}
$perfil_id = $this->session->userdata('perfil_id');

function alerta($valor) {
    echo "<script>alert('$valor');</script>";
}

function debug($object) {
    echo "<pre>";
    var_dump($object);
    echo "</pre>";
}
?>
<!DOCTYPE html PUBLIC "-//carreW3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd" >
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="pt-BR" >
    <head>
        <title>STG - SISTEMA DE GESTAO DE NUTRICAO v1.0</title>
        <meta http-equiv="Content-Style-Type" content="text/css" />
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <!-- Reset de CSS para garantir o funcionamento do layout em todos os brownsers -->
        <link href="<?= base_url() ?>css/reset.css" rel="stylesheet" type="text/css" />

        <link href="<?= base_url() ?>css/estilo.css" rel="stylesheet" type="text/css" />

        <link href="<?= base_url() ?>css/form.css" rel="stylesheet" type="text/css" />

        <link href="<?= base_url() ?>css/jquery-ui-1.8.5.custom.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>css/jquery-treeview.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="<?= base_url() ?>js/jquery-1.4.2.min.js" ></script>
        <script type="text/javascript" src="<?= base_url() ?>js/jquery-ui-1.8.5.custom.min.js" ></script>
        <script type="text/javascript" src="<?= base_url() ?>js/jquery-cookie.js" ></script>
        <script type="text/javascript" src="<?= base_url() ?>js/jquery-treeview.js" ></script>
        <script type="text/javascript" src="<?= base_url() ?>js/jquery-meiomask.js" ></script>
        <script type="text/javascript" src="<?= base_url() ?>js/jquery.bestupper.min.js"  ></script>
        <script type="text/javascript" src="<?= base_url() ?>js/scripts.js" ></script>
        <script type="text/javascript">
            (function ($) {
                $(function () {
                    $('input:text').setMask();
                });
            })(jQuery);

        </script>

    </head>
    <script type="text/javascript" src="<?= base_url() ?>js/funcoes.js"></script>

    <?php
    $this->load->library('utilitario');
    Utilitario::pmf_mensagem($this->session->flashdata('message'));
    ?>


    <div class="container">
        <div class="header">
            <div id="imglogo">
                <img src="<?= base_url(); ?>img/stg - logo.jpg" alt="Logo"
                     title="Logo" height="70" id="Insert_logo"
                     style="display:block;" />
            </div>
            <div id="login">
                <div id="user_info">
                    <label style='font-family: serif; font-size: 8pt;'>Seja bem vindo <?= $this->session->userdata('login'); ?>! </label>
                    <label style='font-family: serif; font-size: 8pt;'>Empresa: <?= $this->session->userdata('empresa'); ?> </label>
                </div>
                <div id="login_controles">
                    <!--
                    <a href="#" alt="Alterar senha" id="login_pass">Alterar Senha</a>
                    -->
                    <a id="login_sair" title="Sair do Sistema" onclick="javascript: return confirm('Deseja realmente sair da aplicação?');"
                       href="<?= base_url() ?>login/sair">Sair</a>
                </div>
                <!--<div id="user_foto">Imagem</div>-->

            </div>
        </div>
        <div class="decoration_header">&nbsp;</div>
        <!-- Fim do Cabeçalho -->
        <div class="barraMenus" style="float: left;">
            <ul id="menu" class="filetree">
<!--                <li><span class="folder">Ponto</span>
                    <ul>
                        <li><span class="file"><a href="<?= base_url() ?>ponto/funcionario">Funcionario</a></span></li>
                        <li><span class="file"><a href="<?= base_url() ?>ponto/funcionario/relatorio">Funcionario lista</a></span></li>
                        <li><span class="file"><a href="<?= base_url() ?>ponto/setor">Setor</a></span></li>
                        <li><span class="file"><a href="<?= base_url() ?>ponto/funcao">Fun&ccedil;&atilde;o</a></span></li>
                        <li><span class="file"><a href="<?= base_url() ?>ponto/cargo">Cargo</a></span></li>
                        <li><span class="file"><a href="<?= base_url() ?>ponto/horariostipo">Horarios Tipo</a></span></li>
                        <li><span class="file"><a href="<?= base_url() ?>ponto/horariostipo/virada">Virada</a></span></li>
                        <li><span class="file"><a href="<?= base_url() ?>ponto/competencia">Competencia</a></span></li>
                        <li><span class="file"><a href="<?= base_url() ?>ponto/ocorrenciatipo">Ocorrencia tipo</a></span></li>
                        <li><span class="file"><a href="<?= base_url() ?>ponto/processaponto">processar</a></span></li>
                        <li><span class="file"><a href="<?= base_url() ?>ponto/importarponto">importar ponto</a></span></li>
                        <li><span class="file"><a href="<?= base_url() ?>ponto/importarponto/importarpontobatida">importar batida</a></span></li>
                        <li><span class="file"><a href="<?= base_url() ?>ponto/relatorio/impressaocartaofixo">ponto Fixo</a></span></li>
                        <li><span class="file"><a href="<?= base_url() ?>ponto/relatorio/impressaocartaovariavel">ponto Variavel</a></span></li>
                        <li><span class="file"><a href="<?= base_url() ?>ponto/relatorio/impressaocartaosemiflexivel">ponto Semiflexivel</a></span></li>
                        <li><span class="file"><a href="<?= base_url() ?>ponto/processaponto">processar</a></span></li>
                    </ul>
                </li>-->


                <li><span class="folder">Recep&ccedil;&atilde;o</span>
                    <ul>
                        <? if ($perfil_id == 1 || $perfil_id == 2 || $perfil_id == 3 || $perfil_id == 4 || $perfil_id == 5 || $perfil_id == 6 || $perfil_id == 7) { ?>
                            <li><span class="file"><a href="<?= base_url() ?>cadastros/pacientes">Cadastro</a></span></li>
                        <? } ?>
                    </ul>
                </li>
                <li><span class="folder">Faturamento</span>
                    <ul>
                        <? if ($perfil_id == 1 || $perfil_id == 3) { ?>
                            <li><span class="folder">Rotinas </span>
                                <ul><span class="file"><a href="<?= base_url() ?>ambulatorio/exame/faturamentoexame">Faturar</a></span></ul>
                                <ul><span class="file"><a href="<?= base_url() ?>ambulatorio/exame/faturamentoexamexml">Gerar xml</a></span></ul>
                                <ul><span class="file"><a href="<?= base_url() ?>ambulatorio/guia/relatoriovalorprocedimento">Ajustar valores</a></span></ul>
                            </li>            
                            <li><span class="folder">Relatórios </span>   
                                <ul><span class="file"><a href="<?= base_url() ?>ambulatorio/guia/relatorioexame">Relatorio Conferencia</a></span></ul>
                                <ul><span class="file"><a href="<?= base_url() ?>ambulatorio/exame/relacaodepacientes">Relação de Pacientes</a></span></ul>
                                <ul><span class="file"><a href="<?= base_url() ?>ambulatorio/exame/relacaodepacienteshospital">Repasse Hospitalar</a></span></ul>
                                <ul><span class="file"><a href="<?= base_url() ?>ambulatorio/exame/relatorioresumoconvenio">Relatório Resumo Convenio</a></span></ul>
                            </li> 
                        <? } ?>
                    </ul>
                </li>
                <li><span class="folder">Estoque</span>
                    <ul><? if ($perfil_id == 1 || $perfil_id == 8) { ?>
                            <li><span class="folder">Rotinas </span>
                                <ul><span class="file"><a href="<?= base_url() ?>estoque/solicitacao">Manter Solicitacao</a></span></ul>
                                <ul><span class="file"><a href="<?= base_url() ?>estoque/entrada">Manter Entrada</a></span></ul>
                                <ul><span class="file"><a href="<?= base_url() ?>estoque/inventario">Manter Inventario</a></span></ul>
                                <ul><span class="file"><a href="<?= base_url() ?>estoque/menu">Manter Menu</a></span></ul>
                                <ul><span class="file"><a href="<?= base_url() ?>estoque/tipo">Manter Tipo</a></span></ul>
                                <ul><span class="file"><a href="<?= base_url() ?>estoque/classe">Manter Classe</a></span></ul>
                                <ul><span class="file"><a href="<?= base_url() ?>estoque/subclasse">Manter Sub-Classe</a></span></ul>
                                <ul><span class="file"><a href="<?= base_url() ?>estoque/unidade">Manter Medida</a></span></ul>
                                <ul><span class="file"><a href="<?= base_url() ?>estoque/armazem">Manter Armazem</a></span></ul>
                                <ul><span class="file"><a href="<?= base_url() ?>estoque/fornecedor">Manter Fornecedor</a></span></ul>
                                <ul><span class="file"><a href="<?= base_url() ?>estoque/produto">Manter Produto</a></span></ul>
                                <ul><span class="file"><a href="<?= base_url() ?>estoque/cliente">Manter Setor</a></span></ul>
                            </li>

                            <li><span class="folder">Estoque Parenteral </span>

                                <ul><span class="file"><a href="<?= base_url() ?>estoque/parenteral">Manter Entrada Estoque Parenteral</a></span></ul>
                                <ul><span class="file"><a href="<?= base_url() ?>estoque/parenteral/pesquisarestoqueparenteral">Entrada Sala de Higienização Parenteral</a></span></ul>

                            </li>

                            <li><span class="folder">Checagem de Temperatura </span>
                                <ul><span class="file"><a href="<?= base_url() ?>estoque/parenteral/pesquisarestoqueparenteralgeladeira">Manter Geladeiras</a></span></ul>
                                <ul><span class="file"><a href="<?= base_url() ?>estoque/parenteral/checagemtemperaturaparenteral">Checagem Temperatura Parenteral</a></span></ul>
                                <ul><span class="file"><a href="<?= base_url() ?>estoque/parenteral/listarumidadeambienteparenteral">Temperatura e Umidade do Estoque Parenteral</a></span></ul>
                            </li>

                            <li><span class="folder">Relatórios </span>
                                <ul><span class="file"><a href="<?= base_url() ?>estoque/parenteral/relatoriotemperaturaumidadeparenteral">Relatorio Temp. Umid. Estoque Parenteral</a></span></ul>
                                <ul><span class="file"><a href="<?= base_url() ?>estoque/parenteral/relatoriotemperaturaparenteral">Relatorio Temperatura Geladeira</a></span></ul>
                                <ul><span class="file"><a href="<?= base_url() ?>estoque/parenteral/relatorioentradaparenteral">Relatorio Entrada Parenteral</a></span></ul>
                                <ul><span class="file"><a href="<?= base_url() ?>estoque/parenteral/relatoriohigienizacaoparenteral">Relatorio Entrada Higienização Parenteral</a></span></ul>
                                <ul><span class="file"><a href="<?= base_url() ?>estoque/entrada/relatorioentradaarmazem">Relatorio Entrada Produtos</a></span></ul>
                                <ul><span class="file"><a href="<?= base_url() ?>estoque/entrada/relatoriosaidaarmazem">Relatorio Saida Produtos</a></span></ul>
                                <ul><span class="file"><a href="<?= base_url() ?>estoque/entrada/relatoriosaldoarmazem">Relatorio Saldo Produtos/Entrada</a></span></ul>
                                <ul><span class="file"><a href="<?= base_url() ?>estoque/entrada/relatoriosaldo">Relatorio Saldo Produtos</a></span></ul>
                                <ul><span class="file"><a href="<?= base_url() ?>estoque/entrada/relatoriominimo">Relatorio Estoque Minimo</a></span></ul>
                                <ul><span class="file"><a href="<?= base_url() ?>estoque/entrada/relatorioprodutos">Relatorio Produtos</a></span></ul>
                                <ul><span class="file"><a href="<?= base_url() ?>estoque/entrada/relatoriofornecedores">Relatorio Fornecedores</a></span></ul>
                            </li>
                            <li><span class="folder">Operadores </span>
                                <ul><span class="file"><a href="<?= base_url() ?>seguranca/operador/operadorsetor">Listar Operadores</a></span></ul>
                            </li>
                        <? } ?>
                    </ul>
                </li>
                <li><span class="folder">Financeiro</span>
                    <ul>
                        <? if ($perfil_id == 1) { ?>
                            <li><span class="folder">Rotinas</span>
                                <ul><span class="file"><a href="<?= base_url() ?>cadastros/caixa">Manter Entrada</a></span></ul>
                                <ul><span class="file"><a href="<?= base_url() ?>cadastros/caixa/pesquisar2">Manter Saida</a></span></ul>
                                <ul><span class="file"><a href="<?= base_url() ?>cadastros/contaspagar">Manter Contas a pagar</a></span></ul>
                                <ul><span class="file"><a href="<?= base_url() ?>cadastros/contasreceber">Manter Contas a Receber</a></span></ul>
                                <ul><span class="file"><a href="<?= base_url() ?>cadastros/tipo">Manter Tipo</a></span></ul>
                                <ul><span class="file"><a href="<?= base_url() ?>cadastros/forma">Manter Conta</a></span></ul>
                                <ul><span class="file"><a href="<?= base_url() ?>cadastros/fornecedor">Manter Credor/Devedor</a></span></ul>
                            </li>    

                            <?
                        }
//
                        if ($perfil_id == 1) {
                            ?>
                            <li><span class="folder">Relatórios</span>
                                <ul><span class="file"><a href="<?= base_url() ?>cadastros/caixa/relatoriosaida">Relatorio Saida</a></span></ul>
                                <ul><span class="file"><a href="<?= base_url() ?>cadastros/caixa/relatoriosaidagrupo">Relatorio Saida Tipo</a></span></ul>
                                <ul><span class="file"><a href="<?= base_url() ?>cadastros/caixa/relatorioentrada">Relatorio Entrada</a></span></ul>
                                <ul><span class="file"><a href="<?= base_url() ?>cadastros/caixa/relatorioentradagrupo">Relatorio Entrada Conta</a></span></ul>
                                <ul><span class="file"><a href="<?= base_url() ?>cadastros/contaspagar/relatoriocontaspagar">Relatorio Contas a pagar</a></span></ul>
                                <ul><span class="file"><a href="<?= base_url() ?>cadastros/contasreceber/relatoriocontasreceber">Relatorio Contas a Receber</a></span></ul>
                                <ul><span class="file"><a href="<?= base_url() ?>cadastros/caixa/relatoriomovitamentacao">Relatorio Moviten&ccedil;&atilde;o</a></span></ul>
                            </li>     
                        <? }
                        ?>
                    </ul>
                </li>
                <li><span class="folder">Nutricionista</span>
                    <ul>
                        <? if ($perfil_id == 4 || $perfil_id == 1) { ?>
                            <li><span class="file"><a href="<?= base_url() ?>nutricionista/nutricionista">Evolução Nutricional</a></span></li>

                            <?
                        }
                        ?>

                    </ul>
                </li>
                <li><span class="folder">Internacao</span>
                    <ul>
                        <li><span class="folder">Rotinas</span> 
                            <!--<li><span class="file"><a href="<?= base_url() ?>internacao/internacao/pesquisarsolicitacaointernacao">Listar Solicitacoes</a></span></li>-->
                            <ul><span class="file"><a href="<?= base_url() ?>internacao/internacao">Listar Internacoes</a></span></ul>
                            <ul><span class="file"><a href="<?= base_url() ?>internacao/internacao/listarprescreverenteral">Listar Pacientes prescri&ccedil;&atilde;o enteral</a></span></ul>
                            <ul><span class="file"><a href="<?= base_url() ?>internacao/internacao/listarprescreverparenteral">Listar Pacientes prescri&ccedil;&atilde;o parenteral</a></span></ul>
                            <ul><span class="file"><a href="<?= base_url() ?>internacao/internacao/listarmotoqueiro">Listar Internacoes Rota</a></span></ul>
                        </li>  
                        <li><span class="folder">Checagem de Temperatura</span> 
                            <ul><span class="file"><a href="<?= base_url() ?>internacao/internacao/listarprescreverparenteralbolsa">Checagem Temp. Bolsa Parenteral</a></span></ul>
                            <ul><span class="file"><a href="<?= base_url() ?>internacao/internacao/listarprescreverparenteralbolsaentrega">Checagem Temp. Bolsa Parenteral Entrega</a></span></ul>
                        </li>

                        <li><span class="folder">Relatórios</span> 
<!--<li><span class="file"><a href="<?= base_url() ?>internacao/internacao/listarmotoqueiro">Etiqueta de Entrega Paciente</a></span></li>-->
                            <ul><span class="file"><a href="<?= base_url() ?>internacao/internacao/listarprescricao">Relatorio Prescricao</a></span></ul>
                            <ul><span class="file"><a href="<?= base_url() ?>internacao/internacao/relatoriotemperaturabolsaparenteral">Relatorio Temperatura Bolsa parenteral</a></span></ul>
                            <ul><span class="file"><a href="<?= base_url() ?>internacao/internacao/relatoriotemperaturabolsaparenteralentrega">Relatorio Temperatura Bolsa parenteral entrega</a></span></ul>
                        </li>
                    </ul>
                </li>

                <li><span class="folder">Configura&ccedil;&atilde;o</span>
                    <ul>
                        <? if ($perfil_id == 1 || $perfil_id == 5) { ?>

                            <li><span class="folder">Profissionais</span>  
                                <ul><span class="file"><a href="<?= base_url() ?>seguranca/operador">Listar Profissionais</a></span></ul>
                            </li>    
                        <? } ?>
                        <li><span class="folder">Internação</span>        
                            <ul><span class="file"><a href="<?= base_url() ?>internacao/internacao/pesquisarunidade">Listar Unidades</a></span></ul>
                            <ul><span class="file"><a href="<?= base_url() ?>internacao/internacao/pesquisarenfermaria">Lista Enfermarias</a></span></ul>
                            <ul><span class="file"><a href="<?= base_url() ?>internacao/internacao/pesquisarleito">Listar Leitos</a></span></ul>
                        </li>    
    <!--                                                <li><span class="file"><a href="<?= base_url() ?>ambulatorio/agenda">Manter Agendas</a></span></li>-->
                        <? if ($perfil_id == 1 || $perfil_id == 3) { ?>

                            <li><span class="folder">Procedimentos</span>     
                                <ul><span class="file"><a href="<?= base_url() ?>ambulatorio/procedimento">Manter Procedimentos</a></span></ul>
                                <ul><span class="file"><a href="<?= base_url() ?>ambulatorio/procedimento/relatorioprocedimento">Relatorio Procedimentos</a></span></ul>
                                <ul><span class="file"><a href="<?= base_url() ?>ambulatorio/procedimento/pesquisartuss">Manter Procedimentos TUSS</a></span></ul>
                                <ul><span class="file"><a href="<?= base_url() ?>ambulatorio/procedimento/gerarelatorioprocedimentotuss">Relatorio Procedimentos TUSS</a></span></ul>
                                <ul><span class="file"><a href="<?= base_url() ?>ambulatorio/classificacao">Manter Classificacao</a></span></ul>
                                <li><span class="folder">Convenio</span>        
                                    <ul><span class="file"><a href="<?= base_url() ?>cadastros/convenio">Manter convenio</a></span></ul>
                                    <ul><span class="file"><a href="<?= base_url() ?>ambulatorio/exame/produtoipm">Manter Produto IPM</a></span></ul>
                                    <ul><span class="file"><a href="<?= base_url() ?>ambulatorio/procedimentoplano">Manter Procedimentos Convenio</a></span></ul>
                                </li>    
                            </li>    
                        <? } ?>
                    </ul>
                </li>
                <li><span class="file"><a onclick="javascript: return confirm('Deseja realmente sair da aplicação?');"
                                          href="<?= base_url() ?>login/sair">Sair</a></span>
                </li>
            </ul>
            <!-- Fim da Barra Lateral -->
        </div>
        <div class="mensagem"><?
            if (isset($mensagem)): echo $mensagem;
            endif;
            ?></div>
        <script type="text/javascript">
            $("#menu").treeview({
                animated: "normal",
                persist: "cookie",
                collapsed: true,
                unique: true
            });
        </script>