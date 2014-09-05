<?php include 'template/modal.php'; ?>
 <nav class="navbar navbar-default" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-3">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <span class="navbar-brand"> <img src="img/logo-uvv.jpg"> | Controle de carteirinhas </span>
        </div>
       <div class="nav-collapse">
	   <div class="navbar-form navbar-right" role="search">
                <div class="form-group p-top">
                    <p>Olá, <?= $this->session->userdata('username'); ?> </p>
                </div>
<a href="<?=base_url();?>signout" class="btn btn-default">Logout</a>
               
          </div>
	   
          	</div><!--/.nav-collapse -->
      </div>  
    </nav>
    <div class="container">
	  <div class="row">
     
        <!-- Nav tabs -->
     
<?php 
	if($this->session->flashdata('msg') != ''){
		echo '
		<div class="row-fluid">
        	<div class="span12 alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>'.$this->session->flashdata('msg').'</div>
        </div>';
	}
	if($this->session->flashdata('success') != ''){
		echo '
		<div class="row-fluid">
        	<div class="span12 alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>'.$this->session->flashdata('success').'</div>
        </div>';
	}    
?>  
      <!--div class="row">
        <div class="col-md-12"-->
		<div>
		<?= $this->load->view('template/menu'); ?>
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
                        <?php
                            $attributes = array('id' => 'upload');
			echo form_open_multipart('configuracao/multiupload',$attributes); 
				?>
			<div id="drop">
				Arrastar as Fotos Aqui ou

				<a>Navegar</a>
				<input type="file" name="upl" multiple />
			</div>

			<ul>
				<!-- The file uploads will be shown here -->
			</ul>

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
                      <?= form_open('configuracao/emailRetorno'); ?>
                        <fieldset>

                          
                          <div class="form-group">
                            <label for="InputEmail">E-mail de confirmação do envio das fotos</label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                              <input type="text" class="form-control" id="Inputfoto" name="Inputfoto" value="<?php echo $Inputfoto;?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="InputEmail">E-mail para enviar a remessa</label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                              <input type="text" class="form-control" id="InputEmail" name="InputEmail" value="<?php echo $InputEmail;?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="InputEmail">E-mail para reportar erros</label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                              <input type="text" class="form-control" id="Inputerro" name="Inputerro" value="<?php echo $Inputerro;?>">
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="pull-right">
                              <input type="submit" class="btn btn-primary" value="Salvar">
                            </div>
                          </div>
       
                        </fieldset>
                     <?= form_close();?>       
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
                                <td><span id="the-tipo-admin"><?= $account['tipo']; ?></span></td>
                              </tr>
                              <tr>
                                <td>E-mail:</td>
                                <td><span id="the-email-admin"><?= $account['email_address']; ?></span></td>
                              </tr>
                              <tr>
                                <td>Login</td>
                                <td><span id="the-login-admin"><?= $account['username']; ?></span></td>
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
		</div>