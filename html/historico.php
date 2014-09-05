<!DOCTYPE html>
<html lang="pt-br">
<?php require_once("inc/head.php"); 

$pag_atual = "historico";
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
          <h1 class="page-header">Remessas</h1>
          <p>Consultie aqui o registro dos lotes das carteirinhas.</p>
          <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default">
                  <div class="panel-heading"><h3 class="panel-title"><i class="fa fa-calendar"></i> Lotes</h3> </div>
                  <div class="panel-body">
                    <div class="qa-message-list" id="wallmessages">

                      <!-- repeat time line -->

                  <div class="message-item ">
                        <div class="message-inner">
                          <div class="message-head clearfix">
                            <div class="avatar pull-left"><i class="fa fa-folder-o fa-2x"></i></div>
                            <div class="user-detail">
                              <h4 class="handle"><a href="#" class="btn_historico">Lote 7</a></h4>
                              <input type="hidden" class="historico" value="007">
                              <div class="post-meta">
                              </div>
                            </div>
                          </div>
                          <div class="qa-message-content" style="display: none;">
                            <ul>
                              <li>Data de envio: 27/03/2014</li>
                              <li><a href="#" class="todos">Alunos enviados: <span class="cor-info">76</span></a></li>
                              <li><a href="#" class="ok">Alunos processados: <span class="cor-success">30</span></a></li>
                              <li><a href="#" class="error">Alunos com erro: <span class="cor-danger">46</span></a></li>
                            </ul>
                          </div>
                        </div>
                </div>
                <div class="message-item ativo-msg">
                        <div class="message-inner">
                          <div class="message-head clearfix">
                            <div class="avatar pull-left"><i class="fa fa-folder-o fa-2x"></i></div>
                            <div class="user-detail">
                            <div class="pull-right"> 
                               <button class="btn btn-xs btn-info " type="button" data-toggle="tooltip" data-original-title="Confirmar Fotos" onclick="deleteUser()"><i class="fa fa-picture-o"></i></button>
                              <button class="btn btn-xs btn-primary" type="button" data-toggle="tooltip" data-original-title="Confirmar chegada"><i class="fa fa-thumbs-o-up"></i></button>
                             
                            </div>
                              <h4 class="handle"><a href="#" class="btn_historico">Lote 5</a></h4>
                              <input type="hidden" class="historico" value="005">
                              <div class="post-meta">
                              </div>
                            </div>
                          </div>
                          <div class="qa-message-content">
                            <ul>
                              <li>Data de envio: 24/03/2014</li>
                              <li><a href="#" class="todos">Alunos enviados: <span class="cor-info">7835</span></a></li>
                              <li><a href="#" class="ok">Alunos processados: <span class="cor-success">7330</span></a></li>
                              <li><a href="#" class="error">Alunos com erro: <span class="cor-danger">505</span></a></li>
                            </ul>
                          </div>
                        </div>
                </div>  
                <div class="message-item " >
                        <div class="message-inner">
                          <div class="message-head clearfix">
                            <div class="avatar pull-left"><i class="fa fa-folder-o fa-2x"></i></div>
                            <div class="user-detail">
                              <h4 class="handle"><a href="#" class="btn_historico">Lote 7</a></h4>
                              <input type="hidden" class="historico" value="007">
                              <div class="post-meta">
                              </div>
                            </div>
                          </div>
                          <div class="qa-message-content" style="display: none;">
                            <ul>
                              <li>Data de envio: 27/03/2014</li>
                              <li><a href="#" class="todos">Alunos enviados: <span class="cor-info">76</span></a></li>
                              <li><a href="#" class="ok">Alunos processados: <span class="cor-success">30</span></a></li>
                              <li><a href="#" class="error">Alunos com erro: <span class="cor-danger">46</span></a></li>
                            </ul>
                          </div>
                        </div>
                </div>

                <div class="message-item " >
                        <div class="message-inner">
                          <div class="message-head clearfix">
                            <div class="avatar pull-left"><i class="fa fa-folder-o fa-2x"></i></div>
                            <div class="user-detail">
                              <h4 class="handle"><a href="#" class="btn_historico">Lote 7</a></h4>
                              <input type="hidden" class="historico" value="007">
                              <div class="post-meta">
                              </div>
                            </div>
                          </div>
                          <div class="qa-message-content" style="display: none;">
                            <ul>
                              <li>Data de envio: 27/03/2014</li>
                              <li><a href="#" class="todos">Alunos enviados: <span class="cor-info">76</span></a></li>
                              <li><a href="#" class="ok">Alunos processados: <span class="cor-success">30</span></a></li>
                              <li><a href="#" class="error">Alunos com erro: <span class="cor-danger">46</span></a></li>
                            </ul>
                          </div>
                        </div>
                </div>  
                  </div>  
                </div>
              </div>
            </div>  

            <div class="col-md-8">
              <h3> Lote 5 </h3>
              <hr/>
              <div class="alert alert-success card-aluno "> 

                    <div class="foto-aluno" style="background-image: url(img/avatar.jpg);"></div>
                    <h4><i class="fa fa-credit-card"></i> Carteirinha produzida</h4> 
                      
                      <ul>
                        <li><b>Aluno:</b> ALEXANDRE DE ALCANTARA CAETANO </li>
                        <li><b>Matrícula:</b> <b class="highlight">2012</b>52879</li>
                        <li><b>Lote:</b> 000005</li>
                        <li>Procurar a secretaria de apoio do seu curso</li>
                      </ul>
                      <div style="clear:both;"></div>
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

                  
            </div>

          </div>  <!-- row -->
                 
          </div>  <!-- corpo -->
      </div> <!-- roow top -->
<?php require_once("inc/footer.php"); ?>
</div><!-- container -->
</body>

</html>