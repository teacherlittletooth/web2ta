<?php

use Database\Database;

require_once "../src/views/header_nav.php";
require_once "../src/model/Database.php";

if( isset($_GET['cod']) ) {
    $cod = $_GET['cod'];
} else {
    header('location: ../public/lista.php');
}

$db = new Database();

$resultDb = $db->select(
    "SELECT * FROM pedidos WHERE cod = $cod;"
);

//var_dump($resultDb);
?>

<form method="post" action="../banco/atualiza_pedido.php" >
    <h2>Atualização do pedido</h2>
    <br>
    <h4>Código:</h4>
    <input type="text" name="cod" value="<?= $resultDb[0]->cod ?>" readonly/>
    <h4>Data e hora:</h4>
    <input type="text" name="data_hora" value="<?= $resultDb[0]->data_hora ?>" readonly/>
    <h4>Itens:</h4>
    <input type="text" name="itens" value="<?= $resultDb[0]->itens ?>" />
    <h4>Quantidade:</h4>
    <input type="number" name="quant" value="<?= $resultDb[0]->quant ?>" min="1" />

    <h4>Pagamento:</h4>
    <div class="form-check form-check-inline">
        <input type="radio" class="form-check-input" name="pgto" value="Dinheiro" <?= ($resultDb[0]->pag == 'Dinheiro') ? 'checked' : '' ?> /> Dinheiro
    </div>
    <div class="form-check form-check-inline">
        <input type="radio" class="form-check-input" name="pgto" value="Pix" <?= ($resultDb[0]->pag == 'Pix') ? 'checked' : '' ?> /> Pix
    </div>
    <div class="form-check form-check-inline">    
        <input type="radio" class="form-check-input" name="pgto" value="Cartão" <?= ($resultDb[0]->pag == 'Cartão') ? 'checked' : '' ?> /> Cartão
    </div>

    <h4>Entrega:</h4>
    <div class="row">
        <div class="col-lg-4 col-sm-6">
            <select name="entrega" class="form-select" required>
                <option value="<?= $resultDb[0]->local ?>"> <?= $resultDb[0]->local ?> </option>
                <option value="Alvorada">Alvorada</option>
                <option value="Viamão">Viamão</option>
                <option value="Porto Alegre">Porto Alegre</option>
                <option value="Canoas">Canoas</option>
                <option value="Gravataí">Gravataí</option>
                <option value="Cachoeirinha">Cachoeirinha</option>
            </select>
        </div>
    </div>

    <br>
    <input type="submit" value="Atualizar pedido!" class="btn btn-primary"/>
    <input type="reset" value="Reiniciar" class="btn btn-secondary"/>

</form>

<?php require_once "../src/views/footer.php"; ?>