<?php include 'template/modal_historico.php'; ?>
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
          <h1 class="page-header">Fluxos de remessas</h1>
          <p>Histórico de envio e retornos das carteirinhas ao banco Santander.</p>     
          
          <div class="row">
            <div class="col-md-12">
                  <select class="form-control periodo-fluxo pull-right">
                      <option>Selecione outro peridodo</option>
                      <option>2013/1</option>
                      <option>2012/2</option>
                      <option>2012/1</option>
                  </select>
                  <h3>Lotes de 2014/2</h3>
                   

                  <table class="table table-bordered table-etapas">
                    <thead>
                      <tr>
                        <th>Lote</th>
                        <th class="cor-uvv  ">Etapa 1 <br> <span class="cor-info">Envio de Fotos</span></th>
                        <th class="cor-sant ">Etapa 2 <br> <span class="cor-warning">Verificação Santander</span></th>
                        <th class="cor-uvv  ">Etapa 3 <br> <span class="cor-info">Envio de Remessa</span></th>
                        <th class="cor-sant ">Etapa 4 <br> <span class="cor-warning">Retorno Santander</span></th>
                        <th class="cor-sant ">Etapa 5 <br> <span class="cor-warning">Entrega na UVV</span></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="cor-antigo">
                         <td><img src="img/icon1.jpg"></td> 
                         <td><img src="img/icon2.jpg"></td>
                         <td><img src="img/icon3.jpg"></td>
                         <td><img src="img/icon4.jpg"></td>
                         <td><img src="img/icon5.jpg"></td> 
                        <td><img src="img/icon6.jpg"></td>
                      </tr>
                      <?= $lotes;?>
<!--
                      <tr>
                         <td><a data-toggle="modal" data-target="#myModal3" class="label label-lote label-info">#07</a></td> 
                         <td >10/10/2014</td>
                         <td><ul>
                              <li>24/03/2014</li>
                              <li><span class="cor-danger">Fotos com erro: 15</span></a></li>
                            </ul></td>
                         <td ><ul>
                              <li>24/03/2014</li>
                              <li><span class="cor-info">Enviados: 7835</span></a></li>
                            </ul>
                         </td>
                         <td><ul>
                              <li>24/03/2014</li>
                              <li><span class="cor-success">Processados: 7330</span></a></li>
                              <li><span class="cor-danger">Com erro: 505</span></a></li>
                            </ul></td> 
                        <td><ul>
                              <li>24/03/2014</li>
                              <li><span class="cor-success" >Entregues: 7330</span></a></li>
                            </ul>
                            </td>
                      </tr>

                      <tr>
                         <td><a data-toggle="modal" data-target="#myModal3" class="label label-lote label-info">#06</a></td> 
                         <td >10/10/2014</td>
                         <td><ul>
                              <li>24/03/2014</li>
                              <li><span class="cor-danger">Fotos com erro: 15</span></a></li>
                            </ul></td>
                         <td ><ul>
                              <li>24/03/2014</li>
                              <li><span class="cor-info">Enviados: 7835</span></a></li>
                            </ul>
                         </td>
                         <td><ul>
                              <li>24/03/2014</li>
                              <li><span class="cor-success">Processados: 7330</span></a></li>
                              <li><span class="cor-danger">Com erro: 505</span></a></li>
                            </ul></td> 
                        <td class="cor-aguardando"> Aguardando
                          <br>
                          <button type="button" class="btn btn-success btn-xs ">Confirmar recebimento</button>
                        </td>
                      </tr>

                      <tr>
                         <td><a data-toggle="modal" data-target="#myModal3" class="label label-lote label-info">#05</a></td> 
                         <td >10/10/2014</td>
                         <td><ul>
                              <li>24/03/2014</li>
                              <li><span class="cor-danger">Fotos com erro: 15</span></a></li>
                            </ul></td>
                         <td ><ul>
                              <li>24/03/2014</li>
                              <li><span class="cor-info">Enviados: 7835</span></a></li>
                            </ul>
                         </td>
                         <td class="cor-aguardando">Aguardando<br>
                          <button type="button" class="btn btn-primary btn-xs " data-toggle="modal" data-target="#myModal2">Enviar retorno</button></td> 
                        <td class="cor-aguardando"> Aguardando</td>
                      </tr>

                      <tr>
                         <td><a data-toggle="modal" data-target="#myModal3" class="label label-lote label-info">#04</a></td> 
                         <td >10/10/2014</td>
                         <td class="cor-aguardando" >Aguardando<br>
                          <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal">Retorno das fotos</button>
                         </td>
                         <td class="cor-aguardando" >Aguardando
                         </td>
                         <td class="cor-aguardando">Aguardando</td> 
                        <td class="cor-aguardando"> Aguardando</td>
                      </tr>


                      <tr>
                         <td><a data-toggle="modal" data-target="#myModal3" class="label label-lote label-info">#03</a></td> 
                         <td class="cor-aguardando">Aguardando</td>
                         <td class="cor-aguardando" >Aguardando
                         </td>
                         <td class="cor-aguardando" >Aguardando
                         </td>
                         <td class="cor-aguardando">Aguardando</td> 
                        <td class="cor-aguardando"> Aguardando</td>
                      </tr>

                      <tr class="cor-antigo">
                         <td><a data-toggle="modal" data-target="#myModal3" class="label label-lote label-default">#02</a></td> 
                         <td >10/10/2014</td>
                         <td><ul>
                              <li>24/03/2014</li>
                              <li><span >Fotos com erro: 35</span></a></li>
                            </ul></td>
                         <td ><ul>
                              <li>24/03/2014</li>
                              <li><span >Enviados: 7835</span></a></li>
                            </ul>
                         </td>
                         <td><ul>
                              <li>24/03/2014</li>
                              <li><span >Processados: 7330</span></a></li>
                              <li><span >Com erro: 505</span></a></li>
                            </ul></td> 
                        <td><ul>
                              <li>24/03/2014</li>
                              <li><span >Entregues: 7330</span></a></li>
                            </ul></td>
                      </tr>


                      <tr class="cor-antigo">
                         <td><a data-toggle="modal" data-target="#myModal3" class="label label-lote label-default">#01</a></td> 
                         <td >10/10/2014</td>
                         <td><ul>
                              <li>24/03/2014</li>
                              <li><span >Fotos com erro: 35</span></a></li>
                            </ul></td>
                         <td ><ul>
                              <li>24/03/2014</li>
                              <li><span >Enviados: 7835</span></a></li>
                            </ul>
                         </td>
                         <td><ul>
                              <li>24/03/2014</li>
                              <li><span >Processados: 7330</span></a></li>
                              <li><span >Com erro: 505</span></a></li>
                            </ul></td> 
                        <td><ul>
                              <li>24/03/2014</li>
                              <li><span >Entregues: 7330</span></a></li>
                            </ul>

                        </td>
                      </tr>-->
                    </tbody>
                  </table>


                  </div>

                  <div class="col-md-12">
                    <h4>Legenda</h4>
                       <div class="row">
                      <div class="col-md-2"><div class="bs-callout bs-callout-info">
                              <h4 class="cor-info ">UVV</h4>
                            </div> 
                      </div>
                      <div class="col-md-2">
                          <div class="bs-callout bs-callout-warning">
                              <h4 class="cor-warning ">Santander</h4>
                            </div>
                      </div>
                  </div>

                       
                        

                  </div>
              </div><!-- row -->
                    
          </div>
	 