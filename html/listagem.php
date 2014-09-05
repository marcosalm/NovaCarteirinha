<!DOCTYPE html>
<html lang="pt-br">
<?php require_once("inc/head.php"); 

$pag_atual = "listagem";
?>
<body>
<?php require_once("inc/nav.php"); ?>
    <div class="container">
      <div class="row">
        <div>
        <!-- Nav tabs -->
        <?php require_once("inc/menu.php"); ?>
         </div>

        

  <div class="col-md-12 corpo">
  <h1 class="page-header">Pendências</h1>
  <div class="row">
    <div class="col-md-12"> 

      <p>Consulte aqui a listagem dos alunos com dados incorretos ou incompletos para o processo de confecção das carteirinhas.</p>
      <div class="alert alert-warning ver_erro"><b>Dica:</b> Clique em <img src="img/details_open.png"> para visualizar os erros e suas respectivas correções.</div>
      <p></p>
      <div class="panel panel-danger">
        <div class="panel-heading"><h3 class="panel-title"><i class="fa fa-user"></i> Alunos com erro : <span class="numero-destaque ">976</span>
          <div class="btn-group pull-right">
                        <!--button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" id="">
                          Filtro <span class="caret"></span>
                        </button-->

                        <select class="filtro-alunos" id="renderingEngineFilter">
                          <option>Filtre por erro</option>
                          <option value="D008">  Data de nascimento inválida ou não informada. </option>
                          <option value="D009">  Código da nacionalidade inválida ou não informada.</option>
                          <option value=" D010">  Código do sexo diferente de ‘M’ e ‘F’.</option>
                          <option value="D012">  Logradouro não informado.</option>
                          <option value="D013">  Número do logradouro não informado.</option>
                          <option value="D014">  Bairro do logradouro não informado.</option>
                          <option value="D015">  Município do logradouro não informado.</option>
                          <option value="D016">  U.F. do logradouro não informada.</option>
                          <option value="D017">  CEP do logradouro inválido ou não informado.</option>
                          <option value="D018">  País não informado.</option>
                          <option value=" D019">  Tipo do vínculo com a IES inválido ou não informado.</option>
                          <option value=" D020">  Código de barras inválido ou não informado.</option>
                          <option value=" D023">  Foto não registrada.</option>
                          <option value=" D025">  Número do CNPJ inválido ou não informado no CHIP01.</option>
                          <option value=" D026">  Código da filial inválido ou não informado no CHIP01.</option>
                          <option value=" D027">  Código de barras inválido ou não informado no CHIP01.</option>
                          <option value=" D028">  Código da matrícula inválido ou não informado no CHIP01.</option>
                          <option value=" D029">  Nome do universitário inválido ou não informado no CHIP01.</option>
                          <option value=" D031">  Nome do universitário com caracteres inválidos.</option>
                          <option value=" D032">  Campos alfanuméricos obrigatórios com caracteres inválidos.</option>
                          <option value=" D033">  Parâmetros administrativos não cadastrados para este CNPJ/ Filial/ Vínculo/ Tipo Cartão</option>
                          <option value=" D034">  Código de estação dos parâmetros administrativos difere do cadastrado no Home Banking</option>


                        </select>

                        <!--ul class="dropdown-menu" role="menu">
                          <li><a href="#" onClick="$('input[aria-controls=table_error]').val('D023')">Sem foto</a></li>
                          <li><a href="#">Falta dados</a></li>
                          <li><a href="#">Outro erro</a></li>  
                        </ul-->

                      </div>
                    </h3>
                  </div>
                  <div class="panel-body" id="painel-erro">


                    <!-- data table aqui -->
                    <div id="table_error_wrapper" class="dataTables_wrapper" role="grid"><div id="table_error_length" class="dataTables_length"><label>Mostrar <select size="1" name="table_error_length" aria-controls="table_error"><option value="10" selected="selected">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> registos</label></div><div class="dataTables_filter" id="table_error_filter"><label>Procurar: <input type="text" aria-controls="table_error"></label></div><div id="table_error_processing" class="dataTables_processing" style="visibility: hidden;">A processar...</div><table class="table dataTable" cellpadding="0" cellspacing="0" border="0" id="table_error" aria-describedby="table_error_info">
                      <thead>
                        <tr role="row"><th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="" style="width: 0px;"></th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table_error" rowspan="1" colspan="1" aria-label="Nome: activate to sort column ascending" style="width: 0px;">Nome</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table_error" rowspan="1" colspan="1" aria-label="Matrícula: activate to sort column ascending" style="width: 0px;">Matrícula</th><th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="Erros" style="width: 0px;">Erros</th></tr>
                     </thead>
                     

                   <tbody role="alert" aria-live="polite" aria-relevant="all"><tr class="odd"><td class=" sorting_1"><img src="img/details_open.png" id="open_erro" style="min-height:20px !important;"></td><td class="">DANIEL BUENO PETERSEN</td><td class="">201042960</td><td class="">D023           </td></tr><tr class="even"><td class=" sorting_1"><img src="img/details_open.png" id="open_erro" style="min-height:20px !important;"></td><td class="">THAIS LANDES MENDEWALD</td><td class="">201355432</td><td class="">D023           </td></tr><tr class="odd"><td class=" sorting_1"><img src="img/details_open.png" id="open_erro" style="min-height:20px !important;"></td><td class="">BARBARA TERRA QUEIROZ</td><td class="">201042057</td><td class="">D023           </td></tr><tr class="even"><td class=" sorting_1"><img src="img/details_open.png" id="open_erro" style="min-height:20px !important;"></td><td class="">CLARA ATHAYDE DE MENEZES</td><td class="">201043131</td><td class="">D023           </td></tr><tr class="odd"><td class=" sorting_1"><img src="img/details_open.png" id="open_erro" style="min-height:20px !important;"></td><td class="">GEORGEA OLIVEIRA FURTADO</td><td class="">201043390</td><td class="">D023           </td></tr><tr class="even"><td class=" sorting_1"><img src="img/details_open.png" id="open_erro" style="min-height:20px !important;"></td><td class="">MARCOS CORREIA SILVA JUNIOR</td><td class="">201355958</td><td class="">D023           </td></tr><tr class="odd"><td class=" sorting_1"><img src="img/details_open.png" id="open_erro" style="min-height:20px !important;"></td><td class="">MARCUS VINICIUS MENDES DE ALBUQUERQUE</td><td class="">201043357</td><td class="">D023           </td></tr><tr class="even"><td class=" sorting_1"><img src="img/details_open.png" id="open_erro" style="min-height:20px !important;"></td><td class="">RENATA BELARMINO SIQUEIRA</td><td class="">201147380</td><td class="">D023           </td></tr><tr class="odd"><td class=" sorting_1"><img src="img/details_open.png" id="open_erro" style="min-height:20px !important;"></td><td class="">RICARDO DA HORA SOBRINHO</td><td class="">201042212</td><td class="">D023           </td></tr><tr class="even"><td class=" sorting_1"><img src="img/details_open.png" id="open_erro" style="min-height:20px !important;"></td><td class="">LEONARDO CHAVES COMARU</td><td class="">201042847</td><td class="">D023           </td></tr></tbody></table><div class="dataTables_info" id="table_error_info">Mostrando de 1 até 10 de 976 registos</div><div class="dataTables_paginate paging_two_button" id="table_error_paginate"><a class="paginate_disabled_previous" tabindex="0" role="button" id="table_error_previous" aria-controls="table_error">Anterior</a><a class="paginate_enabled_next" tabindex="0" role="button" id="table_error_next" aria-controls="table_error">Seguinte</a></div></div>

                 </div>
                 <div class="panel-footer"><a href="#" id="print" class="btn btn-default" rel="painel-erro"><i class="fa fa-print"></i> Imprimir Resultado</a>
                 </div>
               </div>
               <div class="alert alert-warning"><b>Observações:</b> Caracteres permitidos para campos alfanuméricos: letras maiúsculas (A a Z), números (0 a 9), espaço (   ), dois pontos ( : ), ponto ( . ), barra normal ( / ), barra invertida ( \ ), traço ( - ), underscore ( _ ), apóstrofe ( ' ), e comercial ( &amp; ), arroba ( @ ) e vírgula ( , ).
                Caracteres permitidos para campos numéricos: números (0 a 9).</div>

              </div>

            </div> 
          </div>

      </div><!-- row-->
<?php require_once("inc/footer.php"); ?>
</div><!-- container -->
</body>

</html>