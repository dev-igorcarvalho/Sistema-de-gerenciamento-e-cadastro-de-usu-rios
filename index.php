<?php require_once "html-estrutura/cabecalho.php"; ?>

<div class="jumbotron">

<h2>Login:</h2>

<br>
    <form action="login.php" method="POST">
        <div class="form-group">
            <label for="">User:</label>
            <input class="form-control" type="text" name="usuario">
        </div>    

        <div class="form-group">
            <label for="">Password:</label>
            <input class="form-control" type="password" name="senha">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
    <br>
    <p><a href="cadastro.php">Sign Up</a></p> 
    <a href="url">Forgot your password?</a>
</div>
    
<?php require_once "html-estrutura/rodape.php"; ?>