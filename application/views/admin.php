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
            	<ul class="nav navbar-nav navbar-right">
            		<li class="dropdown">
                		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Olá, <?= $this->session->userdata('username'); ?> <b class="caret"></b></a>
            			<ul class="dropdown-menu dropdown-form">                	
                    		<li><a href="<?=base_url();?>user/detail">Ver Meus Detalhes</a></li>
                        	<li class="divider"></li>
                        	<li><a href="<?=base_url();?>signout">Logout</a></li>               
           				</ul>
                	</li><!--/.dropdown -->
            	</ul>
          	</div><!--/.nav-collapse -->
      </div>  
    </nav>
    <div class="container">
	  <div class="row">
      <div class="col-md-12">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
          <li id="consulta_li" class="active"><a href="#Consulta" data-toggle="tab">Consulta</a></li>
          <li id="listagem_li"><a href="#Listagem" data-toggle="tab">Pendências</a></li>
          <li id="lotes_li"><a href="#Lotes" data-toggle="tab">Histórico de remessas</a></li>
          <li id="config_li"><a href="#config" data-toggle="tab">Configurações</a></li>
          <li id="acesso_li"><a href="#acesso" data-toggle="tab">Acesso</a></li>
        </ul>
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

   
   	
	  <div class="tab-pane active" id="Consulta">
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