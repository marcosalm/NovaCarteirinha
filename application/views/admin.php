<?php include 'template/modal_consulta.php'; ?>

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
<a href="<?= base_url();?>signout" class="btn btn-default">Logout</a>
               
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
      
		<div>
		<?= $this->load->view('template/menu'); ?>
		</div>

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
             
<!--                 <div class="alert alert-limbo card-aluno "> 

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
                       <a class="btn btn-danger pull-right" role="button" data-toggle="modal" data-target="#myModal"> <i class="fa fa-eye"></i> Visualizar</a>              <p>Ainda restam <span class="cor-danger numero-destaque "><?= $ERROR;?></span> alunos com erros. </p>
                            
                    </div>

                     <!--//////////////// -->
                    <div class="bs-callout bs-callout-info">
                      <h4 class="cor-info "><i class="fa fa-credit-card"></i> Alunos com dados ajustados (Próximo lote)</h4>
                     <!--<a href="#Lotes" data-toggle="tab" class="btn btn-info pull-right" role="button" onclick="$('#lotes_li').addClass('active');$('#consulta_li').removeClass('active')"> <i class="fa fa-eye"></i> Visualizar</a>-->
                      <p>Estão prontos para processar <span class="cor-info numero-destaque "><?= $A_ENVIAR;?></span> alunos. </p>
                      <p>Saída do próximo lote: <span></span> <span class="cor-info numero-destaque "><?= date("d/m/Y", strtotime("next friday"));?></span> </p>
                    </div> 
                              
                      
                      <!--//////////////// -->
                      <div class="bs-callout bs-callout-warning">
                      <h4 class="cor-warning "><i class="fa fa-credit-card"></i> Carteirinhas em processamento pelo Santander</h4>
                      <p>No momento estão sendo produzidos <span class="cor-warning numero-destaque "><?= $PROCESS?></span> Carteirinhas. </p>
                      <p>Previsão de entrega: <span></span><?= $PREVISAO;?></p>
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