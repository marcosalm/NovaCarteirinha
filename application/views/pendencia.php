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
 <div class="col-md-12 corpo">
   	
	
	 <h1 class="page-header"> Pendências</h1>
	 	 <div class="row" >
                <div class="col-md-12"> 

      <p>Consulte aqui a listagem dos alunos com dados incorretos ou incompletos para o processo de confecção das carteirinhas.</p>
      <div class="alert alert-warning ver_erro"><b>Dica:</b> Clique em <img src="img/details_open.png"> para visualizar os erros e suas respectivas correções.</div>
      <p></p>
      <div class="panel panel-danger">
        <div class="panel-heading"><h3 class="panel-title"><i class="fa fa-user"></i> Alunos com erro : <span class="numero-destaque "><?php 
	$query = $this->db->query("SELECT * FROM crt_status WHERE situacao_cart = 'ERROR'");
	if ($query->num_rows() > 0)
		{
			echo $query->num_rows();
		} else{
		
			echo 0;
			}
	?></span>
          <div class="btn-group pull-right">
                        <!--button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" id="">
                          Filtro <span class="caret"></span>
                        </button-->

                        <select class="filtro-alunos" id="renderingEngineFilter" >
                          <option><b>Filtre por erro</b></option>
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
                  <div class="panel-body" id="painel-erro" >


                    <!-- data table aqui -->
                    <table class="table" cellpadding="0" cellspacing="0" border="0" id="table_error">
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
               <div class="alert alert-warning"><b>Observações:</b> Caracteres permitidos para campos alfanuméricos: letras maiúsculas (A a Z), números (0 a 9), espaço (   ), dois pontos ( : ), ponto ( . ), barra normal ( / ), barra invertida ( \ ), traço ( - ), underscore ( _ ), apóstrofe ( ' ), e comercial ( & ), arroba ( @ ) e vírgula ( , ).
                Caracteres permitidos para campos numéricos: números (0 a 9).</div>

              </div>
	 </div>
	 
 