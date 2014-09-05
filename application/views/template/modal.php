    <div id="help" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="helpLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3 id="helpLabel">Help</h3>
        </div> <!-- /modal-header -->
        <div class="modal-body">
            <h4>Create Account</h4>
            <p>Create a new account for accessing the user area. You can fill the registration form and click submit button to proceed. After have an account, you can use your <code>Username</code> and <code>Password</code> for login.</p><hr/>
            <h4>Login</h4>
            <p>This is login menu for accessing user area. <code>Username</code> and <code>Password</code> are required.</p><hr/>
            <h4>Logout</h4>
            <p>This is logout menu for exit the application (user area) and destroy the active session.</p><hr/>
            <h4>View Account Detail</h4>
            <p>This menu display the current user account information.</p><hr/>
            <div class="media">
            	<a class="pull-left" href="#"><img class="media-object" src="<?=base_url('img/download.png');?>" width="64px" height="64px"></a>
                <div class="media-body"><h4 class="media-heading">Download the source code</h4>The source code for this application available on <a href="https://github.com/adit-gudhel/ci-login" target="_blank">GitHub</a> repository.
                </div>
            </div>            
            <div class="media">
                <a class="pull-left" href="#"><img class="media-object" src="<?=base_url('img/message.png');?>" width="64px" height="64px"></a>
                <div class="media-body"><h4 class="media-heading">Comments and questions</h4>Post your questions and comments on the my blog post link below.</div>
            </div>            
            <div class="media">
                <a class="pull-left" href="#"><img class="media-object" src="<?=base_url('img/blog.png');?>" width="64px" height="64px"></a>
                <div class="media-body"><h4 class="media-heading">Tutorial</h4>See full tutorial on my blog post <a href="http://dityalovers.blogspot.com/2013/03/codeigniter-login-tutorial.html" target="_blank">CodeIgniter Login Tutorial</a>.
                </div>
            </div>            
            <div class="media">
                <a class="pull-left" href="#"><img class="media-object" src="<?=base_url('img/twitter.png');?>" width="64px" height="64px"></a>
                <div class="media-body"><h4 class="media-heading">Follow me on Twitter</h4><a href="http://twitter.com/adit_gudhel" target="_blank">@adit_gudhel</a>.
                </div>
            </div>
            <hr/>
        </div> <!-- /modal-body -->
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        </div> <!-- /modal-footer -->
    </div> <!-- /modal -->
	
<div class="modal fade in" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">Inserir novo usuário</h4>
        </div>
        <div class="modal-body">
          <span id="status_add"></span>
          <form accept-charset="UTF-8" role="form" id="form-newuser">
            <fieldset>
              <div class="form-group">
                <input class="form-control" placeholder="Nome" name="nome" type="text">
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="E-mail" name="email" type="text">
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="login" name="login" type="text">
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="senha" name="senha" type="password" value="">
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Confirmar senha" name="senha2" type="password" value="">
              </div>

            </fieldset>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" id="modal-dismiss">Cancelar</button>
          <button type="button" class="btn btn-success" onclick="sendNewUser()">Inserir</button>
            </script>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>