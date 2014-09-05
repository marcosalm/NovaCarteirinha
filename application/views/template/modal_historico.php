<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fechar</span></button>
        <h4 class="modal-title" id="myModalLabel">Retorno do Santander das fotos</h4>
      </div>
      <div class="modal-body">
   <?= form_open_multipart('configuracao/retornoFotos'); ?>
                           <input type="hidden" name="MAX_FILE_SIZE" value="300000">
                           <label for="exampleInputFile">Selecione o arquivo que deseja enviar:</label>
                           <input type="file" id="exampleInputFile" name="file">
                           <p class="help-block">O arquivo deve estar no formato .txt</p>
                           <input type="submit" class="btn btn-success btn-lg btn-block" value="Enviar">
                         <?= form_close();?>  

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

   <?= form_open_multipart('configuracao/uploadRetorno'); ?>
                           <input type="hidden" name="MAX_FILE_SIZE" value="300000">
                           <label for="exampleInputFile">Selecione o arquivo que deseja enviar:</label>
                           <input type="file" id="exampleInputFile" name="file">
                           <p class="help-block">O arquivo deve estar no formato .txt</p>
                           <input type="submit" class="btn btn-success btn-lg btn-block" value="Enviar">
                         <?= form_close();?>  
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