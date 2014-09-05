<!DOCTYPE html>
<html lang="pt-br">
<?php require_once("inc/head.php"); 

$pag_atual = "config";
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
<h1 class="page-header">Configurações</h1>
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">
              <div class="list-group">
                <a href="#" class="list-group-item active">
                  <i class="fa fa-picture-o"></i>  Envio de fotos
                </a>
                <a href="#" class="list-group-item">
                  <i class="fa fa-envelope"></i>  E-mails de retorno
                </a>
                <a href="#" class="list-group-item">
                  <i class="fa fa-user"></i> Minha conta
                </a>
                <a href="#" class="list-group-item">
                  <i class="fa fa-users"></i>  Usuários
                </a>


              </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
              
                <!-- train section -->
                <div class="bhoechie-tab-content active">
                    <div class="panel panel-default">
                      <div class="panel-heading"><h3 class="panel-title"> <i class="fa fa-picture-o"></i>  Envio de fotos</h3></div>
                      <div class="panel-body">
                        <div class="form-group">
                         <form enctype="multipart/form-data" method="POST" id="form-retorno" action="retorno_read.php">
                           <input type="hidden" name="MAX_FILE_SIZE" value="300000">
                           <label for="exampleInputFile">Selecione o arquivo que deseja enviar:</label>
                           <input type="file" id="exampleInputFile" name="file">
                           <p class="help-block">As imagens devem estar no formato .jpg</p>
                           <input type="submit" class="btn btn-success btn-lg btn-block" value="Enviar">
                         </form>
                       </div>
                      </div>
                    </div>
                </div>
    
                <!-- hotel search -->
                <div class="bhoechie-tab-content">
                   <div class="panel panel-default">
                    <div class="panel-heading"><h3 class="panel-title"><i class="fa fa-envelope"></i> E-mails de retorno</h3></div>
                    <div class="panel-body">
                      <form class="form-horizontal col-md-12" method="POST" id="form-options" role="form">
                        <fieldset>

                          
                          <div class="form-group">
                            <label for="InputEmail">E-mail de confirmação do envio das fotos</label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                              <input type="email" class="form-control" id="Inputfoto" name="Inputfoto" value="marcos.almeida@uvv.br,lucas.coradini@uvv.br">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="InputEmail">E-mail para enviar a remessa</label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                              <input type="email" class="form-control" id="InputEmail" name="InputEmail" value="marcos.almeida@uvv.br,lucas.coradini@uvv.br">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="InputEmail">E-mail para reportar erros</label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                              <input type="email" class="form-control" id="Inputerro" name="Inputerro" value="marcos.almeida@uvv.br,lucas.coradini@uvv.br">
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="pull-right">
                              <button type="submit" class="btn btn-primary" onclick="sendOptions()">Salvar</button>
                            </div>
                          </div>
       
                        </fieldset>
                      </form>         
                    </div>
                  </div>
                </div>

                <!-- train section -->
                <div class="bhoechie-tab-content">
                    <div class="panel panel-default">
                    <div class="panel-heading">
                      <h3 class="panel-title"><i class="fa fa-user"></i> Informações do usuário</h3>
                    </div>
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-xs-10 col-sm-10 hidden-md hidden-lg">
                          <strong></strong><br>
                          <dl>
                            <dt>User level:</dt>
                            <dd>Administrator</dd>
                            <dt>Registered since:</dt>
                            <dd>11/12/2013</dd>
                            <dt>Topics</dt>
                            <dd>15</dd>
                            <dt>Warnings</dt>
                            <dd>0</dd>
                          </dl>
                        </div>
                        <div class=" col-md-9 col-lg-9 hidden-xs hidden-sm">
                          <strong>Marcos</strong><br>
                          <table class="table table-user-information">
                            <tbody>
                              <tr>
                                <td>Tipo:</td>
                                <td><span id="the-tipo-admin">Administrador</span></td>
                              </tr>
                              <tr>
                                <td>E-mail:</td>
                                <td><span id="the-email-admin">marcos.almeida@uvv.br</span></td>
                              </tr>
                              <tr>
                                <td>Login</td>
                                <td><span id="the-login-admin">admin</span></td>
                              </tr>
                              <tr>
                                <td>Senha</td>
                                <td> *********** </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="panel-footer">

                        <button class="btn btn-sm btn-warning" type="button" data-toggle="tooltip" data-original-title="Editar este usuário"><i class="glyphicon glyphicon-edit"></i></button>
                       
                      </span>
                   </div>
                 </div>
                </div>


                <!-- hotel search -->
                <div class="bhoechie-tab-content">

                    <div class="panel panel-default">
                      <div class="panel-heading">
                         <button class="btn btn-xs btn-success pull-right" data-toggle="modal" data-target="#myModal">
                           <i class="fa fa-plus"></i> Novo
                      </button>
                        <h3 class="panel-title"> <i class="fa fa-users"></i>  Usuários Cadastrados</h3></div>
                      <div class="panel-body">
                          <table class="table table-striped">
                        <thead>
                          <tr>
                            <th width="65%">Nome</th>
                            <th width="20%">Permissão</th>
                            <th width="15%">Opções</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Nome do usuário</td>
                            <td>Administrador</td>
                            <td> <button class="btn btn-xs btn-primary" type="button" data-toggle="tooltip" data-original-title="Enviar mensagem"><i class="glyphicon glyphicon-envelope"></i></button> 
                            <button class="btn btn-xs btn-warning" type="button" data-toggle="tooltip" data-original-title="Editar este usuário"><i class="glyphicon glyphicon-edit"></i></button>
                            <button class="btn btn-xs btn-danger" type="button" data-toggle="tooltip" data-original-title="Remover este usuário" onclick="deleteUser()"><i class="glyphicon glyphicon-remove"></i></button></td>
                          </tr>
                           <tr>
                            <td>Nome do usuário</td>
                            <td>Administrador</td>
                            <td> <button class="btn btn-xs btn-primary" type="button" data-toggle="tooltip" data-original-title="Enviar mensagem"><i class="glyphicon glyphicon-envelope"></i></button> 
                            <button class="btn btn-xs btn-warning" type="button" data-toggle="tooltip" data-original-title="Editar este usuário"><i class="glyphicon glyphicon-edit"></i></button>
                            <button class="btn btn-xs btn-danger" type="button" data-toggle="tooltip" data-original-title="Remover este usuário" onclick="deleteUser()"><i class="glyphicon glyphicon-remove"></i></button></td>
                          </tr>
                           <tr>
                            <td>Nome do usuário</td>
                            <td>Administrador</td>
                            <td> <button class="btn btn-xs btn-primary" type="button" data-toggle="tooltip" data-original-title="Enviar mensagem"><i class="glyphicon glyphicon-envelope"></i></button> 
                            <button class="btn btn-xs btn-warning" type="button" data-toggle="tooltip" data-original-title="Editar este usuário"><i class="glyphicon glyphicon-edit"></i></button>
                            <button class="btn btn-xs btn-danger" type="button" data-toggle="tooltip" data-original-title="Remover este usuário" onclick="deleteUser()"><i class="glyphicon glyphicon-remove"></i></button></td>
                          </tr>
                           <tr>
                            <td>Nome do usuário</td>
                            <td>Administrador</td>
                            <td> <button class="btn btn-xs btn-primary" type="button" data-toggle="tooltip" data-original-title="Enviar mensagem"><i class="glyphicon glyphicon-envelope"></i></button> 
                            <button class="btn btn-xs btn-warning" type="button" data-toggle="tooltip" data-original-title="Editar este usuário"><i class="glyphicon glyphicon-edit"></i></button>
                            <button class="btn btn-xs btn-danger" type="button" data-toggle="tooltip" data-original-title="Remover este usuário" onclick="deleteUser()"><i class="glyphicon glyphicon-remove"></i></button></td>
                          </tr>


                        </tbody>
                      </table>
                       </div>
                      </div>
                    </div>


            </div>
        </div>

    </div><!-- col 12 -->
  </div><!-- row-->

<div class="modal fade in" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">Inserir novo usuário</h4>
        </div>
        <div class="modal-body">
          <span id="status_add"></span>
          <form accept-charset="UTF-8" role="form" id="form-newuser">
            <fieldset>
              <div class="form-group">
                <input class="form-control" placeholder="Nome" name="nome" type="text">
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="E-mail" name="email" type="text">
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="login" name="login" type="text">
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="senha" name="senha" type="password" value="">
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Confirmar senha" name="senha2" type="password" value="">
              </div>

            </fieldset>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" id="modal-dismiss">Cancelar</button>
          <button type="button" class="btn btn-success" onclick="sendNewUser()">Inserir</button>
            </script>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>

  <?php require_once("inc/footer.php"); ?>
</div><!-- container -->
</body>

</html>