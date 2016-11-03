<div class="content ficha_ceatox"> <!-- Inicio da DIV content -->

    <div class="clear"></div>
    <h3 class="h3_title">Cadastro de Unidade</h3>
    <form name="form_volume" id="form_volume" action="<?= base_url() ?>nutricionista/nutricionista/gravarvolume/<?= $internacao_id ?>" method="post">
         <fieldset>
            <legend>Dados do Pacienete</legend>
            <div>
                <label>Volume</label>                      
                <input type ="hidden" name ="tb_internacao_precricao_etapa" value ="<?= $internacao_precricao_etapa_id; ?>" id ="txtinternacao_unidade_id"/>
                <input type="text" id="volume" name="volume"  class="texto09" value="<?= $volume; ?>" />
            </div>

        </fieldset>
        <button type="submit">Enviar</button>
        <button type="reset">Limpar</button>
    </form>


</div> <!-- Final da DIV content -->
<link rel="stylesheet" href="<?= base_url() ?>css/jquery-ui-1.8.5.custom.css">
<script type="text/javascript" src="<?= base_url() ?>js/jquery-1.4.2.min.js" ></script>
<script type="text/javascript" src="<?= base_url() ?>js/jquery-1.9.1.js" ></script>
<script type="text/javascript" src="<?= base_url() ?>js/jquery-ui-1.10.4.js" ></script>
<script type="text/javascript" src="<?= base_url() ?>js/jquery.validate.js"></script>
<script type="text/javascript">

 
    $(document).ready(function() {
        $("body").keypress(function(event) {
            if (event.keyCode == 119)   // se a tecla apertada for 13 (enter)
            {
                document.form_volume.submit()
            }

        });
    });


</script>