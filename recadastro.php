<?php
require_once "conecta.php";
require_once "autoload.php";

if (isset($_REQUEST['atualizaUsuario'])) {

    $usuarioService = new UsuarioService();
    $usuarioService->verificaUsuario();
    $id = ($_REQUEST['atualizaUsuario']);
    }

    $usuarioDao = new UsuarioDao($conexao);
    
    $usuarioAntigo = $usuarioDao->buscaUsuarioAntigo($id);
?>

<?php 
    require_once "html-estrutura/cabecalho.php"; 
?>

<?php 
    if(array_key_exists('campoEmBranco', $_REQUEST)){
        if($_REQUEST['campoEmBranco']==true){
?>
    <p class="text-center alert alert-danger msg">Preencha todos os campos</p>
<?php
        }
    }
?>

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

<h2>Atualizando cadastro:</h2>

<br>
    <form action="atualizaUsuario.php" method="POST">
        <div class="form-group">
            <label for="">Usuário:</label>
            <input class="form-control" type="text" name="nome" value="<?=$usuarioAntigo[0]?>">
        </div>    

        <div class="form-group">
            <label for="">Senha:</label>
            <input class="form-control" type="password" name="senha">
        </div>

        <div class="form-group">
            <label for="">Email:</label>
            <input class="form-control" type="email" name="email"value="<?=$usuarioAntigo[1]?>">
        </div>

        <input type="hidden" name="id" value="<?=$id?>">

        <button type="submit" class="btn btn-primary">Atualizar</button>
    
    </form>
    <br>
    <a href="paginaInicial.php">Voltar</a>

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