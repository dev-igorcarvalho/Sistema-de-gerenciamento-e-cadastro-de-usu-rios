<?php 
require_once "autoload.php";
$usuarioService = new UsuarioService();
?>


<?php require_once "html-estrutura/cabecalho.php"; ?>


<?php 
    if(array_key_exists('enviado', $_REQUEST)){
        if($_REQUEST['enviado']==true){
?>
    <p class="text-center alert alert-success msg">Sua nova senha foi enviada para o email cadastrado</p>
<?php
        }
    }
?>

<?php 
    if(array_key_exists('enviado', $_REQUEST)){
        if($_REQUEST['enviado']==false){
?>
    <p class="text-center alert alert-danger msg">O email fornecido não existe em nosso cadastro</p>
<?php
        }
    }
?>

<?php 
    if(array_key_exists('campoVazio', $_REQUEST)){
        if($_REQUEST['campoVazio']==true){
?>
    <p class="text-center alert alert-danger msg">Por favor preencha todos os campos</p>
<?php
        }
    }
?>

<div class="jumbotron">

<h2>Esqueceu seus dados?</h2>

<br>
    <form action="recuperaSenha.php" method="POST">
        <div class="form-group">
            <label for="">Digite aqui o email cadastrado</label>
            <input class="form-control" type="email" name="email">
            <br>
            <button type="submit" class="btn btn-primary">Recuperar senha</button>
        </div>    
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