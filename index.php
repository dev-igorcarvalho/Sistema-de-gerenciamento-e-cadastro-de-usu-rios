<?php require_once "html-estrutura/cabecalho.php"; ?>

<?php 
    if(array_key_exists('cadastrado', $_REQUEST)){
        if($_REQUEST['cadastrado']==true){
?>
    <p class="text-center alert alert-success msg">Usuário cadastrado com sucesso</p>
<?php
        }
    }
?>


<div class="jumbotron">

<h2>Login:</h2>

<br>
    <form action="login.php" method="POST">
        <div class="form-group">
            <label for="">Usuário:</label>
            <input class="form-control" type="text" name="usuario">
        </div>    

        <div class="form-group">
            <label for="">Senha:</label>
            <input class="form-control" type="password" name="senha">
        </div>
        <button type="submit" class="btn btn-primary">Entrar</button>
    </form>
    <br>
    <p><a href="cadastro.php">Cadastre-se</a></p> 
    <a href="url">Esqueceu a senha?</a>
</div>


<script>
    [...document.querySelectorAll('table tr .remove')]
    .forEach(a=>a.onclick=event=>{
        if (!confirm('Confirma?')){
            event.preventDefault();
        };
    });
    setTimeout(()=>document.querySelector('.msg').remove(),4000);
</script>
    
<?php require_once "html-estrutura/rodape.php"; ?>