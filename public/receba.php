<?php
    if( isset($_POST['email']) ) {
        $email = $_POST['email'];
    } else {
        $email = null;
    }
    
    if( isset($_POST['pass']) ) {
        $pass = $_POST['pass'];
    } else {
        $pass = null;
    }

    if($email != null && $pass != null) {
        if($email == 'paulo.donini@qi.edu.br' && $pass == '1234') {
            $msg = "Bem vindo! :)";
            $redirect = "<meta http-equiv='refresh' content='3; url=https://qi.edu.br'/>";
        } else {
            $msg = "Acesso negado! :(";
            $redirect = "<meta http-equiv='refresh' content='3; url=../index.php'/>";
        }
    }

require_once "../src/views/header_nav.php";
?>

<div class="container mt-3">
        <div style="text-align: center;">
        <h1> <?php echo isset($msg) ? $msg : "Visitante" ?> </h1>
            <?= isset($redirect) ? $redirect : "<hr>" ?>
        </div>

        <h3 class="text-center"> Pedido </h3>
        <form method="get" action="pedido.php">
            <h4>Itens:</h4>
            <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input" name="ingrediente[]" value="Hamburguer"/> Hamburguer <br>
                <input type="checkbox" class="form-check-input" name="ingrediente[]" value="Pão com gergelim"/> Pão com gergelim <br>
                <input type="checkbox" class="form-check-input" name="ingrediente[]" value="Alface"/> Alface <br>
                <input type="checkbox" class="form-check-input" name="ingrediente[]" value="Queijo"/> Queijo <br>
                <input type="checkbox" class="form-check-input" name="ingrediente[]" value="Molho especial"/> Molho especial <br>
                <input type="checkbox" class="form-check-input" name="ingrediente[]" value="Cebola"/> Cebola <br>
                <input type="checkbox" class="form-check-input" name="ingrediente[]" value="Picles"/> Picles <br>
            </div>

            <h4>Quantidade:</h4>
            <div class="row">
                <div class="col-lg-2 col-sm-4">
                    <input type="number" class="form-control" name="qtde" min="1" value="1" />
                </div>
            </div>

            <h4>Pagamento:</h4>
            <div class="form-check form-check-inline">
                <input type="radio" class="form-check-input" name="pgto" value="Dinheiro" checked /> Dinheiro
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" class="form-check-input" name="pgto" value="Pix" /> Pix
            </div>
            <div class="form-check form-check-inline">    
                <input type="radio" class="form-check-input" name="pgto" value="Cartão" /> Cartão
            </div>

            <h4>Entrega:</h4>
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <select name="entrega" class="form-select" required>
                        <option value="">Selecione...</option>
                        <option value="Alvorada">Alvorada</option>
                        <option value="Viamão">Viamão</option>
                        <option value="Porto Alegre">Porto Alegre</option>
                        <option value="Canoas">Canoas</option>
                        <option value="Gravataí">Gravataí</option>
                        <option value="Cachoeirinha">Cachoeirinha</option>
                    </select>
                </div>
            </div>

            <br><br>
            <div class="row">
                <input type="submit" class="col-lg-4 offset-lg-2 btn btn-outline-primary" value="Enviar pedido"/>
                &nbsp;
                <input type="reset" class="col-lg-4 btn btn-outline-dark" value="Limpar"/>
            </div>

        </form>
</div>        
<?php require_once "../src/views/footer.php"; ?>