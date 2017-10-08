<?php require_once "html-estrutura/cabecalho.php"; ?>

<?php 
    if(array_key_exists('cadastrado', $_REQUEST)){
        if($_REQUEST['cadastrado']=='ambos'){
?>
    <p class="text-center alert alert-danger msg">Este nome de usuário e email já existem, por favor tente outra combinação</p>
<?php
        }
    }
?>

<?php 
    if(array_key_exists('cadastrado', $_REQUEST)){
        if($_REQUEST['cadastrado']=='usuarioExistente'){
?>
    <p class="text-center alert alert-danger msg">Este nome de usuário já existe, por favor tente outro nome</p>
<?php
        }
    }
?>
<?php 
    if(array_key_exists('cadastrado', $_REQUEST)){
        if($_REQUEST['cadastrado']=='emailExistente'){
?>
    <p class="text-center alert alert-danger msg">Este email já existe, por favor tente outro email</p>
<?php
        }
    }
?>

<div class="jumbotron">

<h2>Sign Up:</h2>

<br>
    <form action="cadastraUsuario.php" method="POST">
        <div class="form-group">
            <label for="">Usuário:</label>
            <input class="form-control" type="text" name="usuario">
        </div>    

        <div class="form-group">
            <label for="">Senha:</label>
            <input class="form-control" type="password" name="senha">
        </div>

        <div class="form-group">
            <label for="">Email:</label>
            <input class="form-control" type="email" name="email">
        </div>

        <button type="submit" class="btn btn-primary">Sign up</button>
    </form>
    <br>
    
    <a href="url">Forgot your password?</a>
</div>

<script>
    [...document.querySelectorAll('table tr .remove')]
    .forEach(a=>a.onclick=event=>{
        if (!confirm('Confirma?')){
            event.preventDefault();
        };
    });
    setTimeout(()=>document.querySelector('.msg').remove(),5000);
</script>
    
<?php require_once "html-estrutura/rodape.php"; ?>