<?php
require_once "conecta.php";
require_once "autoload.php";

if (isset($_REQUEST['removeUsuario'])) {

    $usuarioService = new UsuarioService();
    $usuarioService->verificaUsuario();
    $id = ($_REQUEST['removeUsuario']);
    }

    $usuarioDao = new UsuarioDao($conexao);
    
    $usuarioAntigo = $usuarioDao->buscaUsuarioAntigo($id);

?>

<?php 
    require_once "html-estrutura/cabecalho.php"; 
?>

<h2 class="text-center alert alert-warning"><?=$usuarioAntigo[0]?> tem certeza que deseja apagar sua conta?</h2>

<br>

<?php 
    if(array_key_exists('usuarioRemovido', $_REQUEST)){
        if($_REQUEST['usuarioRemovido']==false){
?>
    <p class="text-center alert alert-danger msg">Nome do usuário ou senha invalidos</p>
<?php
        }
    }
?>

<br>

<div class="jumbotron">



<br>
    <form action="removeUsuario.php" method="POST">
        <div class="form-group">
            <label for="">Usuário:</label>
            <input class="form-control" type="text" name="nome" value="">
        </div>    

        <div class="form-group">
            <label for="">Senha:</label>
            <input class="form-control" type="password" name="senha">
        </div>

        <input type="hidden" name="id" value="<?=$id?>">

        <button type="submit" class="btn btn-primary">Apagar</button>
    
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
    setTimeout(()=>document.querySelector('.msg').remove(),4000);
</script>

<?php require_once "html-estrutura/rodape.php"; ?>