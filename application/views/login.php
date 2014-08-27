<?php include 'template/modal.php'; 

//$this->load->library('libfunction');
?>
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
	 <h1 class="page-header"> Consulta</h1>
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
       </div>
	   
	   <div class="col-md-6" >
        <div class="panel panel-default">
          <div class="panel-heading"><h3 class="panel-title">   <i class="fa fa-tachometer"></i> Status </h3> </div>
          <div class="panel-body">
           <div class="bs-callout bs-callout-danger">
            <!--//////////////// -->
            <h4 class="cor-danger "><i class="fa fa-exclamation-circle"></i> Alunos com dados incorretos</h4>
          
            <p>Ainda restam <span class="cor-danger numero-destaque "><?php 
	$query = $this->db->query("SELECT * FROM crt_status WHERE situacao_cart = 'ERROR'");
	if ($query->num_rows() > 0)
		{
			echo $query->num_rows();
		} else{
		
			echo 0;
			}
	?></span> alunos com erros. </p>
          </div>

        
          
            
            <!--//////////////// -->
            <div class="bs-callout bs-callout-warning">
            <h4 class="cor-warning "><i class="fa fa-credit-card"></i> Carteirinhas em processamento pelo Santander</h4>
            <p>No momento estão sendo produzidos <span class="cor-warning numero-destaque "><?php $query = $this->db->query("SELECT * FROM crt_status WHERE situacao_cart = 'PROCESS'");
		if ($query->num_rows() > 0)
		{
			echo $query->num_rows();
		} else{
		
			echo 0;
			}  ?></span> Carteirinhas. </p>
            <p>Previsão de entrega: <span></span> 
			<?php
			$query = $this->db->query('SELECT * FROM crt_historico ORDER BY id ');
				
				while ($info = $query->result()){
				$lote = $info->data_envio;
				$n_lote = $info->n_seg_remessa;
			$entrega = strtotime( $lote."+ 15 days");
			$today = strtotime("today");
			if ($today < $entrega){
			echo "<br>Lote nº:".$n_lote." enviado dia ".date("d/m/Y",strtotime($lote))." previsão para <span class='cor-warning numero-destaque '>". date("d/m/Y",$entrega)."</span>";
			}
			}
			?>
			</p>
          </div> 

          <!--//////////////// -->
          <div class="bs-callout bs-callout-success">
            <h4 class="cor-success "><i class="fa fa-credit-card"></i> Carteirinhas disponíveis para entrega</h4>
            <p>Já foram entregues <span class="cor-success numero-destaque "><?php $query = $this->db->query("SELECT * FROM crt_status WHERE situacao_cart = 'OK'");
		if ($query->num_rows() > 0)
		{
			echo $query->num_rows();
		} else{
		
			echo 0;
			}?></span> carteirinhas. </p>
          </div> 
          
          
        </div>
      </div>                   
    </div>
	   </div>
	   </div>