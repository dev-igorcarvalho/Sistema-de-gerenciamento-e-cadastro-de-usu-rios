<?php require_once "html-estrutura/cabecalho.php"; ?>

<?php 
    if(array_key_exists('cadastrado', $_REQUEST)){
        if($_REQUEST['cadastrado']==false){
?>
    <p class="text-center alert alert-danger msg">Usuario existente, por favor tente outro nome de usuario</p>
<?php
        }
    }
?>

<div class="jumbotron">

<h2>Sign Up:</h2>

<br>
    <form action="cadastraUsuario.php" method="POST">
        <div class="form-group">
            <label for="">User:</label>
            <input class="form-control" type="text" name="usuario">
        </div>    

        <div class="form-group">
            <label for="">Password:</label>
            <input class="form-control" type="password" name="senha">
        </div>
        <button type="submit" class="btn btn-primary">Sign up</button>
    </form>
    <br>
    
    <a href="url">Forgot your password?</a>
</div>
    
<?php require_once "html-estrutura/rodape.php"; ?>