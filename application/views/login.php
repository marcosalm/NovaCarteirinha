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
          <ul class="nav navbar-nav navbar-right">
         
          
             <li class="dropdown"> <a class="dropdown-toggle" href="#" data-toggle="dropdown">Área Restrita<strong class="caret"></strong></a>
              <div class="dropdown-menu" style="padding: 10px;min-width:240px;">
			  <?php 
						echo form_open('signin'); 
						
								echo ' <div class="input-group" style="margin-bottom:.5em">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>';
								echo '<input type="text" class="form-control" placeholder="Login" name="username">';
								echo '</div> ';
								
								echo '  <div class="input-group" style="margin-bottom:.5em">
                    <span class="input-group-addon"><i class="fa fa-lock"></i> </span>';
								echo '<input type="password" class="form-control" placeholder="Senha" name="password">';
								echo '</div>';
							
								echo '<input class="btn btn-primary" style="margin-top:.75em;width: 100%; height: 32px; font-size: 13px;" type="submit" name="commit" value="Entrar">';									
														                    
                          	echo form_close(); ?>
              
              </div>
            </li>
            <!-- fim deslogado -->
          </ul>
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
      <!--div class="row">
        <div class="col-md-12"-->

   
   	
	<div class="row-fluid" > 
	 <h1 class="page-header"> Consulta</h1>
	 	 <div class="row" >
            <div class="col-md-6" >
              <h3 class="centralizado">Procure o aluno pelo <br><span class="cor-info">Nome</span> ou <span class="cor-info">Número de matrícula</span></h3>
              <div class="input-group input-group-lg">
               <input type="text" class="form-control" placeholder="Digite aqui o nome ou matrícula..." id="search" autocomplete="off">
               <span class="input-group-btn">
                <button class="btn btn-default" type="button" id="btn_search"><i class="glyphicon glyphicon-search"></i></button>
              </span>
            </div>

            <p class="centralizado help-block">Consulte aqui o status de produção da carteirinha do aluno.</p>
            <span id="results">

            </span>
       </div>
	   
	     <div class="col-md-6" >
        <div class="panel panel-default">
          <div class="panel-heading"><h3 class="panel-title">   <i class="fa fa-tachometer"></i> Status </h3> </div>
          <div class="panel-body">
           <div class="bs-callout bs-callout-danger">
            <!--//////////////// -->
            <h4 class="cor-danger "><i class="fa fa-exclamation-circle"></i> Alunos com dados incorretos</h4>
          
            <p>Ainda restam <span class="cor-danger numero-destaque ">500</span> alunos com erros. </p>
          </div>

        
          
            
            <!--//////////////// -->
            <div class="bs-callout bs-callout-warning">
            <h4 class="cor-warning "><i class="fa fa-credit-card"></i> Carteirinhas em processamento pelo Santander</h4>
            <p>No momento estão sendo produzidos <span class="cor-warning numero-destaque ">500</span> Carteirinhas. </p>
            <p>Previsão de entrega: <span></span> <?php
			
			echo "<br>Lote nº: XXX enviado dia ".date("d/m/Y",strtotime('today'))." previsão para <span class='cor-warning numero-destaque '>". date("d/m/Y",strtotime('today +15 days'))."</span>";
		
			?> </p>
          </div> 

          <!--//////////////// -->
          <div class="bs-callout bs-callout-success">
            <h4 class="cor-success "><i class="fa fa-credit-card"></i> Carteirinhas disponíveis para entrega</h4>
            <p>Já foram entregues <span class="cor-success numero-destaque ">500</span> carteirinhas. </p>
          </div> 
          
          
        </div>
      </div>                   
    </div>
	   </div>