<!DOCTYPE html>
<html lang="pt-br">
<?php require_once("inc/head.php"); 

$pag_atual = "consulta";
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
              <h1  class="page-header">Consulta</h1>
              <div class="row" >
                <div class="col-md-6" >
                  <h3 class="centralizado">Procure o aluno pelo <br><span class="cor-info">Nome</span> ou <span class="cor-info">Número de matrícula</span></h3>
                  <div class="input-group input-group-lg">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                    <input type="text" class="form-control" placeholder="Nome ou matrícula...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Procurar</button>
                    </span>
                  </div>
                  <p class="centralizado help-block">Consulte aqui o status de produção da carteirinha do aluno.</p>

                  <div class="alert alert-success card-aluno "> 

                    <div class="foto-aluno" style="background-image: url(img/avatar.jpg);"></div>
                    <a href="#" id="segvia-201252879" class="btn btn-success pull-right" role="button"> Solicitar 2º via</a> <h4><i class="fa fa-credit-card"></i> Carteirinha produzida</h4> 
                      
                      <ul>
                        <li><b>Aluno:</b> ALEXANDRE DE ALCANTARA CAETANO </li>
                        <li><b>Matrícula:</b> <b class="highlight">2012</b>52879</li>
                        <li><b>Lote:</b> 000005</li>
                        <li>Procurar a secretaria de apoio do seu curso</li>
                      </ul>
                      <div style="clear:both;"></div>
                  </div>


                  <div class="alert alert-warning">
                   <p><i class="fa fa-search"></i> <b> Aluno não encontrato!</b> Tente outra busca.</p>
                  </div> 


                  <div class="alert alert-warning card-aluno "> 

                   <div class="foto-aluno" style="background-image: url(img/avatar.jpg);"></div>
                    <h4><i class="fa fa-cogs"></i> Em processamento pelo Santander</h4> 
                      <ul>
                        <li><b>Aluno:</b> DORYELLE TAYENE PORTELA LAGO </li>
                        <li><b>Matrícula:</b> <b class="highlight">2012</b>49542</li>
                        <li>lote nº 000018 enviado dia 13/08/2014 previsão para entrega 28/08/2014</li>
                      </ul>
                      <div style="clear:both;"></div>
                  </div>



                  <div class="alert alert-danger card-aluno "> 

                   <div class="foto-aluno" style="background-image: url(img/avatar.jpg);"></div>
                    <h4><i class="fa fa-exclamation-circle"></i> Ocorreram os erros:</h4> 
                      <ul>
                        <li><b>Aluno:</b> Lucas coradini <br></li>
                         <li> <b>Matrícula:</b> 201425864 <br></li>
                          <li><b>Erros:</b> 
                            <ul>
                              <li>#29292 - Erro tal</li>
                              <li>#29292 - Erro tal</li>
                              <li>#29292 - Erro tal</li>
                            </ul>
                          </li>
                      </ul>
                      <div style="clear:both;"></div>
                  </div>

                  <div class="alert alert-info card-aluno "> 

                   <div class="foto-aluno" style="background-image: url(img/avatar.jpg);"></div>
                    <h4><i class="fa fa-share"></i> Pronta para o envio</h4> 
                      <ul>
                        <li><b>Aluno:</b> DORYELLE TAYENE PORTELA LAGO </li>
                        <li><b>Matrícula:</b> <b class="highlight">2012</b>49542</li>
                        <li>lote nº: Dados prontos para emissão da Carteirinha.</li>
                      </ul>
                      <div style="clear:both;"></div>
                  </div>

                  <div class="alert alert-limbo card-aluno "> 

                    <div class="foto-aluno" style="background-image: url(img/avatar.jpg);"></div>
                    <h4><i class="fa fa-times"></i> Aluno inativo</h4> 
                      <ul>
                        <li><b>Aluno:</b> DORYELLE TAYENE PORTELA LAGO </li>
                        <li><b>Matrícula:</b> <b class="highlight">2012</b>49542</li>
                        
                      </ul>
                      <div style="clear:both;"></div>
                  </div>
             
                
                </div>
                <div class="col-md-6" >
                  <div class="panel panel-default">
                    <div class="panel-heading">
<button type="button" data-toggle="modal" data-backdrop="static" data-target="#atualizar_sis" class="btn btn-primary btn-xs pull-right " id="btn_refresh" onclick="location.href='filter.php'"><i class="fa fa-refresh"></i> Atualizar dados</button>
                      <h3 class="panel-title"><i class="fa fa-tachometer"></i> Status </h3>


                     </div>
                    <div class="panel-body">
                     <div class="bs-callout bs-callout-danger">
                      <!--//////////////// -->
                      <h4 class="cor-danger "><i class="fa fa-exclamation-circle"></i> Alunos com dados incorretos</h4>
                       <a class="btn btn-danger pull-right" role="button" data-toggle="modal" data-target="#myModal"> <i class="fa fa-eye"></i> Visualizar</a>              <p>Ainda restam <span class="cor-danger numero-destaque ">976</span> alunos com erros. </p>
                    </div>

                     <!--//////////////// -->
                              <div class="bs-callout bs-callout-info">
                      <h4 class="cor-info "><i class="fa fa-credit-card"></i> Alunos com dados ajustados (Próximo lote)</h4>
                      <a href="#Lotes" data-toggle="tab" class="btn btn-info pull-right" role="button" onclick="$('#lotes_li').addClass('active');$('#consulta_li').removeClass('active')"> <i class="fa fa-eye"></i> Visualizar</a>
                      <p>Estão prontos para processar <span class="cor-info numero-destaque ">1496</span> alunos. </p>
                      <p>Saída do próximo lote: <span></span> <span class="cor-info numero-destaque ">29/08/2014</span> </p>
                    </div> 
                              
                      
                      <!--//////////////// -->
                      <div class="bs-callout bs-callout-warning">
                      <h4 class="cor-warning "><i class="fa fa-credit-card"></i> Carteirinhas em processamento pelo Santander</h4>
                      <p>No momento estão sendo produzidos <span class="cor-warning numero-destaque ">187</span> Carteirinhas. </p>
                      <p>Previsão de entrega: <span></span> <br>Lote nº:18 enviado dia 13/08/2014 previsão para <span class="cor-warning numero-destaque ">28/08/2014</span> </p>
                    </div> 

                    <!--//////////////// -->
                    <div class="bs-callout bs-callout-success">
                      <h4 class="cor-success "><i class="fa fa-credit-card"></i> Carteirinhas disponíveis para entrega</h4>
                      <p>Já foram entregues <span class="cor-success numero-destaque ">11205</span> carteirinhas. </p>
                    </div> 
                    
                    
                  </div>
                  </div>                   
                </div>
              </div>   
        </div><!-- col 12 -->
      </div><!-- row-->
<?php require_once("inc/footer.php"); ?>
</div><!-- container -->



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fechar</span></button>
        <h4 class="modal-title" id="myModalLabel">Pendências</h4>
      </div>
      <div class="modal-body">


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
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

</body>

</html>