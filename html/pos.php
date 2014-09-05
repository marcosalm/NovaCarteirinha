<!DOCTYPE html>
<html lang="pt-br">
<?php require_once("inc/head.php"); 

$pag_atual = "pos";
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
          <h1 class="page-header">Pesquisa e pós graduação</h1>
          <p>Consulte aqui a listagem dos alunos de pesquisa e pós graduação que estão inativos no sistema</p>
          <div class="alert alert-warning ver_erro"><b>Atenção: </b> Aqui constam apenas os alunos de <b>pesquisa e pós graduação</b>, para visualizar os alunos inativos de graduação entre na aba <a href="limbo.php">"Alunos Inativos"</a>. </div>
          <div class="row">

             <div class="col-md-8">
             <h3 class="centralizado">Procure o aluno pelo <br><span class="cor-info">Nome</span> ou <span class="cor-info">Número de matrícula</span></h3>
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

            <div class="col-md-4">
               <div class="bs-callout bs-callout-inativo ">
                      <h4><i class="fa fa-times"></i> Alunos inativos</h4>
                      <p>No momento temos <span class="numero-destaque ">187</span> alunos inativos em pesquisa e pós graduação.</p>
                     
                    </div>
            </div>  

           

          </div>  <!-- row -->
                 
          </div>  <!-- corpo -->
      </div> <!-- roow top -->
<?php require_once("inc/footer.php"); ?>
</div><!-- container -->
</body>

</html>