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
  
	  <div class="row">
      <div>
		<?= $this->load->view('template/menu'); ?>
		</div>
    <!--div class="row">
        <div class="col-md-12"-->


   	  <div class="col-md-12 corpo">
  <h1 class="page-header">Alunos Inativos</h1>
  <div class="row">
    <div class="col-md-12"> 

      <p>Consulte aqui a listagem dos alunos inativos no sistema</p>
      
      <div class="row">
        <div class="col-md-6">

<div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title"><i class="fa fa-user"></i> Alunos inativos de pós-graduação e pesquisa : <span class="numero-destaque ">216</span>
              
                </h3>
              </div>
              <div class="panel-body" id="painel-erro">
   <h3 class="centralizado">Procure o aluno pelo <br><span class="cor-info">Nome</span> ou <span class="cor-info">Número de matrícula</span></h3>
                  <div class="input-group input-group-lg">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                    <input type="text" class="form-control posepesquisa" placeholder="Nome ou matrícula...">
                    <span class="input-group-btn">
                      <button class="btn btn-default btn_limbo" type="button">Procurar</button>
                    </span>
                  </div>
                  <p></p>
                  <div class="qa-message-list" id="wallmessages">
<span id="results_l">

    </span>
                  </div>

             </div>
           </div>

        </div>
        <div class="col-md-6"> 
        
          <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title"><i class="fa fa-user"></i> Total de alunos inativos : <span class="numero-destaque ">976</span>
              
                </h3>
              </div>
                  <div class="panel-body" id="painel-erro" >
 <div class="alert alert-warning"><b>Observações:</b> Estes alunos só poderão ser reativados através do phidelis.</div>

                    <!-- data table aqui -->
                    <table class="table" cellpadding="0" cellspacing="0" border="0" id="table_limbo">
                      <thead>
                        <tr>
                         <th></th>
                         <th>Nome</th>
                         <th>Matrícula</th>
                         <th>Erros</th>
                       </tr>
                     </thead>
                     <tbody>
                       <tr>
                         <td colspan="5" class="dataTables_empty">Carregando informações do Servidor</td>
                       </tr>
                     </tbody>

                   </table>

                 </div>
             <div class="panel-footer"><a href="#" id="print" class="btn btn-default" rel="painel-erro"><i class="fa fa-print"></i> Imprimir Resultado</a>
             </div>
           </div>
        </div>
        

 

          </div><!-- row -->

</div><!-- col 12 -->
</div><!-- row -->
         </div>
    
    
    <!--------------------------------OLD----------------------------------------->
	   