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
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-3">
         
			  <?php 
			  $attributes = array('class' => 'navbar-form navbar-right', 'role' => 'search');
						echo form_open('signin',$attributes); 
						
								echo ' <div class="form-group">
                  <input type="text" class="form-control" name="username" placeholder="Usuário">
              </div>
              <div class="form-group">
                  <input type="password" class="form-control" name="password" placeholder="Senha">
              </div>
              <button type="submit" class="btn btn-default">Entrar</button>';								
														                    
                          	echo form_close(); ?>
              
       
        </div>
      </div>  
    </nav>
    <div class="container">
	
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
     
   
   	
	<div class="row" > 	
	 <div class="col-md-12 corpo">
              <h1  class="page-header">Consulta</h1>
              <div class="row" >
                <div class="col-md-6" >
                  <h3 class="centralizado">Procure o aluno pelo <br><span class="cor-info">Nome</span> ou <span class="cor-info">Número de matrícula</span></h3>
                    <div class="input-group input-group-lg">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                    <input type="text" class="form-control" placeholder="Nome ou matrícula..." id="search" autocomplete="off">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button" id="btn_search">Procurar</button>
                    </span>
                  </div>
                  <p class="centralizado help-block">Consulte aqui o status de produção da carteirinha do aluno.</p>
 <span id="results">

            </span>
                 <!-- <div class="alert alert-success card-aluno "> 

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
                    <h4><i class="fa fa-share"></i> Pedido enviado ao Santander</h4> 
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
         -->    
                
                </div>
                <div class="col-md-6" >
                  <div class="panel panel-default">
                    <div class="panel-heading">

                      <h3 class="panel-title"><i class="fa fa-tachometer"></i> Status </h3>


                     </div>
                    <div class="panel-body">
                     <div class="bs-callout bs-callout-danger">
                      <!--//////////////// -->
                      <h4 class="cor-danger "><i class="fa fa-exclamation-circle"></i> Alunos com dados incorretos</h4>
                        <p>Ainda restam <span class="cor-danger numero-destaque "><?= $ERROR;?></span> alunos com erros. </p>
                    </div>

                     <!--//////////////// 
                              <div class="bs-callout bs-callout-info">
                      <h4 class="cor-info "><i class="fa fa-credit-card"></i> Alunos com dados ajustados (Próximo lote)</h4>
                      <a href="#Lotes" data-toggle="tab" class="btn btn-info pull-right" role="button" onclick="$('#lotes_li').addClass('active');$('#consulta_li').removeClass('active')"> <i class="fa fa-eye"></i> Visualizar</a>
                      <p>Estão prontos para processar <span class="cor-info numero-destaque ">
                          
                          </span> alunos. </p>
                      <p>Saída do próximo lote: <span></span> <span class="cor-info numero-destaque ">29/08/2014</span> </p>
                    </div> 
                              
                      
                      <!--//////////////// -->
                      <div class="bs-callout bs-callout-warning">
                      <h4 class="cor-warning "><i class="fa fa-credit-card"></i> Carteirinhas em processamento pelo Santander</h4>
                      <p>No momento estão sendo produzidos <span class="cor-warning numero-destaque "><?= $PROCESS;?></span> Carteirinhas. </p>
                      <p>Previsão de entrega: <span></span> <?= $PREVISAO;?></p>
                    </div> 

                    <!--//////////////// -->
                    <div class="bs-callout bs-callout-success">
                      <h4 class="cor-success "><i class="fa fa-credit-card"></i> Carteirinhas disponíveis para entrega</h4>
                      <p>Já foram entregues <span class="cor-success numero-destaque "><?= $OK;?></span> carteirinhas. </p>
                    </div> 
                    
                    
                  </div>
                  </div>                   
                </div>
              </div>   
        </div>