<?php
//Pegar o id que veio da URL e dar um select no bando de dados.
// Conexão
include_once 'php_action/db_connect.php';
//Header
include_once 'includes/header.php';
//Select
//Verificar se o id existe
if(isset($_GET['id'])):
    //pegar o id na URL
    $id = mysqli_escape_string($connect, $_GET['id']);
    //fazer select no banco de dados
    $sql = "SELECT * FROM clientes WHERE id = '$id'";

    $resultado = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_array($resultado);
endif;
?>

<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light">Editar Cliente</h3>
        <!-- O formulário vai processar as informações no update.php-->
        <form action="php_action/update.php" method="POST">

        <!-- Pegar o id do registro -->
        <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">

            <div class="input-field col s12">
                <input type="text" name="nome" id="nome" value="<?php echo $dados['nome'] ?>">
                <label for="nome">Nome</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="email" id="email" value="<?php echo $dados['email'] ?>">
                <label for="email">Email</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="idade" id="idade" value="<?php echo $dados['idade'] ?>">
                <label for="idade">Idade</label>
            </div>
            <button type="submit" name="btn-editar" class="btn">Atualizar</button>
            <a href="index.php" class="btn green">Listar Clientes</a>
        </form>

    </div>
</div>

<?php
//Footer
include_once 'includes/footer.php';
?>