<!DOCTYPE html>
<html lang="pt-br">
<?php require_once("inc/head.php"); 

$pag_atual = "limbo";
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

                 <h4>Procure o aluno pelo <span class="cor-info">Nome</span> ou <span class="cor-info">Número de matrícula</span></h4>
                  <div class="input-group input-group-lg">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                    <input type="text" class="form-control" placeholder="Nome ou matrícula...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Procurar</button>
                    </span>
                  </div>
                  <p></p>

             <div class="alert alert-limbo card-aluno "> 

                    <div class="foto-aluno" style="background-image: url(img/avatar.jpg);"></div>
                    <a href="#" id="segvia-201252879" class="btn btn-primary pull-right" role="button"> Ativar  Aluno</a>
                    <h4><i class="fa fa-times"></i> Aluno inativo</h4> <br>
                      <ul>
                        <li><b>Aluno:</b> DORYELLE TAYENE PORTELA LAGO </li>
                        <li><b>Matrícula:</b> <b class="highlight">2012</b>49542</li>
                        
                      </ul>
                      <div style="clear:both;"></div>
              </div>
              <div class="alert alert-limbo card-aluno "> 

                    <div class="foto-aluno" style="background-image: url(img/avatar.jpg);"></div>
                    <a href="#" id="segvia-201252879" class="btn btn-primary pull-right" role="button"> Ativar  Aluno</a>
                    <h4><i class="fa fa-times"></i> Aluno inativo</h4> <br>
                      <ul>
                        <li><b>Aluno:</b> DORYELLE TAYENE PORTELA LAGO </li>
                        <li><b>Matrícula:</b> <b class="highlight">2012</b>49542</li>
                        
                      </ul>
                      <div style="clear:both;"></div>
              </div>
              <div class="alert alert-limbo card-aluno "> 

                    <div class="foto-aluno" style="background-image: url(img/avatar.jpg);"></div>
                    <a href="#" id="segvia-201252879" class="btn btn-primary pull-right" role="button"> Ativar  Aluno</a>
                    <h4><i class="fa fa-times"></i> Aluno inativo</h4> <br>
                      <ul>
                        <li><b>Aluno:</b> DORYELLE TAYENE PORTELA LAGO </li>
                        <li><b>Matrícula:</b> <b class="highlight">2012</b>49542</li>
                        
                      </ul>
                      <div style="clear:both;"></div>
              </div>

             </div>
           </div>

        </div>
        <div class="col-md-6"> 
        
          <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title"><i class="fa fa-user"></i> Total de alunos inativos : <span class="numero-destaque ">976</span>
              
                </h3>
              </div>
              <div class="panel-body" id="painel-erro">

              <div class="alert alert-warning"><b>Observações:</b> Estes alunos só poderão ser reativados através do phidelis.</div>
               <table class="table dataTable" cellpadding="0" cellspacing="0" border="0" id="table_error" aria-describedby="table_error_info">
                  <thead>
                    <tr role="row"><th class="sorting" role="columnheader" tabindex="0" aria-controls="table_error" rowspan="1" colspan="1" aria-label="Nome: activate to sort column ascending" style="width: 0px;">Nome</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table_error" rowspan="1" colspan="1" aria-label="Matrícula: activate to sort column ascending" style="width: 0px;">Matrícula</th></tr>
                 </thead>
                 

               <tbody role="alert" aria-live="polite" aria-relevant="all"><tr class="odd"><td class="">DANIEL BUENO PETERSEN</td><td class="">201042960</td></tr><tr class="even"><td class="">THAIS LANDES MENDEWALD</td><td class="">201355432</td></tr><tr class="odd"><td class="">BARBARA TERRA QUEIROZ</td><td class="">201042057</td></tr><tr class="even"><td class="">CLARA ATHAYDE DE MENEZES</td><td class="">201043131</td></tr><tr class="odd"><td class="">GEORGEA OLIVEIRA FURTADO</td><td class="">201043390</td></tr><tr class="even"><td class="">MARCOS CORREIA SILVA JUNIOR</td><td class="">201355958</td></tr><tr class="even"><td class="">RENATA BELARMINO SIQUEIRA</td><td class="">201147380</td></tr><tr class="odd"><td class="">RICARDO DA HORA SOBRINHO</td><td class="">201042212</td></tr><tr class="even"><td class="">LEONARDO CHAVES COMARU</td><td class="">201042847</td></tr></tbody></table>

             </div>
             <div class="panel-footer"><a href="#" id="print" class="btn btn-default" rel="painel-erro"><i class="fa fa-print"></i> Imprimir Resultado</a>
             </div>
           </div>
        </div>
        

 

          </div><!-- row -->

</div><!-- col 12 -->
</div><!-- row -->
         </div><!-- col 12 corpo -->
      </div><!-- row-->

<?php require_once("inc/footer.php"); ?>
</div><!-- container -->
</body>

</html>