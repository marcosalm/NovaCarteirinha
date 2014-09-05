<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fechar</span></button>
        <h4 class="modal-title" id="myModalLabel">Pendências</h4>
      </div>
      <div class="modal-body">


      <p>Consulte aqui a listagem dos alunos com dados incorretos ou incompletos para o processo de confecção das carteirinhas.</p>
      <div class="alert alert-warning ver_erro"><b>Dica:</b> Clique em <img src="img/details_open.png"> para visualizar os erros e suas respectivas correções.</div>
      <p></p>
      <div class="panel panel-danger">
        <div class="panel-heading"><h3 class="panel-title"><i class="fa fa-user"></i> Alunos com erro : <span class="numero-destaque "><?= $ERROR?></span>
          <div class="btn-group pull-right">
                        

                        <select class="filtro-alunos" id="renderingEngineFilter">
                          <option>Filtre por erro</option>
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

                     

                      </div>
                    </h3>
                  </div>
                  <div class="panel-body" id="painel-erro">


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
                    
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      </div>
    </div>
        
  </div>
</div>
        </div>
      </div>
 