<ul class="nav nav-tabs">
    <li <?php if($pag_atual=="consulta"){ echo" class='active'"; } ?> ><a href="index.php" >Consulta</a></li>
    <li <?php if($pag_atual=="lotes"){ echo" class='active'"; } ?> ><a href="lotes.php" > Fluxo de Remessas</a></li>
    <li <?php if($pag_atual=="limbo"){ echo" class='active'"; } ?> ><a href="limbo.php" >Alunos Inativos</a></li>
    <li <?php if($pag_atual=="config"){ echo" class='active'"; } ?> ><a href="configuracoes.php" >Configurações</a></li>
</ul>