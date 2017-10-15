<?php 
require_once "autoload.php";
$usuarioService = new UsuarioService();

if(isset($_REQUEST['nome'])){   
    $nome = $_REQUEST['nome'];
} else {
    $nome = null;
}
?>


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

<?php 
    if(array_key_exists('atualizado', $_REQUEST)){
        if($_REQUEST['atualizado']==true){
?>
    <p class="text-center alert alert-success msg">Usuário atualizado com sucesso</p>
<?php
        }
    }
?>

<?php 
    if(array_key_exists('falhaDeSeguranca', $_REQUEST)){
        if($_REQUEST['falhaDeSeguranca']==true){
?>
    <p class="text-center alert alert-danger msg">Acesso não autorizado</p>
<?php
        }
    }
?>

<?php 
    if(array_key_exists('login', $_REQUEST)){
        if($_REQUEST['login']==false){
?>
    <p class="text-center alert alert-danger msg">Nome do usuário ou senha invalidos</p>
<?php
        }
    }
?>

<?php 
    if(array_key_exists('recuperaSenha', $_REQUEST)){
        if($_REQUEST['recuperaSenha']==true){
?>
    <p class="text-center alert alert-success msg">Sua nova senha foi enviada para o email cadastrado</p>
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
            <input class="form-control" type="text" name="nome" value = "<?=$nome?>">
        </div>    

        <div class="form-group">
            <label for="">Senha:</label>
            <input class="form-control" type="password" name="senha">
        </div>
        <button type="submit" class="btn btn-primary">Entrar</button>
    </form>
    <br>
    <p><a href="cadastro.php">Cadastre-se</a></p> 
    <a href="esqueceuSenha.php">Esqueceu a senha?</a>
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