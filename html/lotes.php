<!DOCTYPE html>
<html lang="pt-br">
<?php require_once("inc/head.php"); 

$pag_atual = "lotes";
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
                      </tr>
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
                    
          </div>  <!-- corpo -->
      </div> <!-- roow top -->
<?php require_once("inc/footer.php"); ?>
</div><!-- container -->



<!-- Modal - fotos -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fechar</span></button>
        <h4 class="modal-title" id="myModalLabel">Retorno do Santander das fotos</h4>
      </div>
      <div class="modal-body">


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>



<!-- Modal - retorno -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fechar</span></button>
        <h4 class="modal-title" id="myModalLabel">Retorno do Santander das carteirinhas</h4>
      </div>
      <div class="modal-body">


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>



<!-- Modal - lote -->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fechar</span></button>
        <h4 class="modal-title" id="myModalLabel">Lote Nº XX</h4>
      </div>
      <div class="modal-body">

        <h4>Procure o aluno pelo <span class="cor-info">Nome</span> ou <span class="cor-info">Número de matrícula</span></h4>
        <div class="input-group input-group-lg">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                    <input type="text" class="form-control" placeholder="Nome ou matrícula...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Procurar</button>
                    </span>
                  </div>
    <p class="centralizado">Alunos neste lote</p>


        <div class="alert alert-info card-aluno "> 

                   <div class="foto-aluno" style="background-image: url(img/avatar.jpg);"></div>
                    <h4><i class="fa fa-share"></i> Pronta para o envio</h4> 
                      <ul>
                        <li><b>Aluno:</b> DORYELLE TAYENE PORTELA LAGO </li>
                        <li><b>Matrícula:</b> <b class="highlight">2012</b>49542</li>
                        <li>lote nº: Dados prontos para emissão da Carteirinha.</li>
                      </ul>
                      <div style="clear:both;"></div>
                  </div>
                  <div class="alert alert-info card-aluno "> 

                   <div class="foto-aluno" style="background-image: url(img/avatar.jpg);"></div>
                    <h4><i class="fa fa-share"></i> Pronta para o envio</h4> 
                      <ul>
                        <li><b>Aluno:</b> DORYELLE TAYENE PORTELA LAGO </li>
                        <li><b>Matrícula:</b> <b class="highlight">2012</b>49542</li>
                        <li>lote nº: Dados prontos para emissão da Carteirinha.</li>
                      </ul>
                      <div style="clear:both;"></div>
                  </div>
                  <div class="alert alert-info card-aluno "> 

                   <div class="foto-aluno" style="background-image: url(img/avatar.jpg);"></div>
                    <h4><i class="fa fa-share"></i> Pronta para o envio</h4> 
                      <ul>
                        <li><b>Aluno:</b> DORYELLE TAYENE PORTELA LAGO </li>
                        <li><b>Matrícula:</b> <b class="highlight">2012</b>49542</li>
                        <li>lote nº: Dados prontos para emissão da Carteirinha.</li>
                      </ul>
                      <div style="clear:both;"></div>
                  </div>
                  <div class="alert alert-info card-aluno "> 

                   <div class="foto-aluno" style="background-image: url(img/avatar.jpg);"></div>
                    <h4><i class="fa fa-share"></i> Pronta para o envio</h4> 
                      <ul>
                        <li><b>Aluno:</b> DORYELLE TAYENE PORTELA LAGO </li>
                        <li><b>Matrícula:</b> <b class="highlight">2012</b>49542</li>
                        <li>lote nº: Dados prontos para emissão da Carteirinha.</li>
                      </ul>
                      <div style="clear:both;"></div>
                  </div>
                  <div class="alert alert-info card-aluno "> 

                   <div class="foto-aluno" style="background-image: url(img/avatar.jpg);"></div>
                    <h4><i class="fa fa-share"></i> Pronta para o envio</h4> 
                      <ul>
                        <li><b>Aluno:</b> DORYELLE TAYENE PORTELA LAGO </li>
                        <li><b>Matrícula:</b> <b class="highlight">2012</b>49542</li>
                        <li>lote nº: Dados prontos para emissão da Carteirinha.</li>
                      </ul>
                      <div style="clear:both;"></div>
                  </div>
                  <div class="alert alert-info card-aluno "> 

                   <div class="foto-aluno" style="background-image: url(img/avatar.jpg);"></div>
                    <h4><i class="fa fa-share"></i> Pronta para o envio</h4> 
                      <ul>
                        <li><b>Aluno:</b> DORYELLE TAYENE PORTELA LAGO </li>
                        <li><b>Matrícula:</b> <b class="highlight">2012</b>49542</li>
                        <li>lote nº: Dados prontos para emissão da Carteirinha.</li>
                      </ul>
                      <div style="clear:both;"></div>
                  </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>



</body>

</html>