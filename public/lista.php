<?php

use Database\Database;

require_once "../src/views/header_nav.php";
require_once "../src/model/Database.php";

$db = new Database();

$resultDb = $db->select(
    "SELECT * FROM pedidos;"
);

//var_dump($resultDb);
?>

<table class="table container mt-4 table-bordered table-striped">
    <thead class="bg-success text-white">
        <th>Código</th>
        <th>Data e hora</th>
        <th>Itens</th>
        <th>Quantidade</th>
        <th>Pagamento</th>
        <th>Entrega</th>
        <th></th>
        <th></th>
    </thead>
    <tbody>
        <?php foreach($resultDb as $linha) : ?>
           <tr>
               <td> <?= $linha->cod ?> </td>
               <td> <?= $linha->data_hora ?> </td>
               <td> <?= $linha->itens ?> </td>
               <td> <?= $linha->quant ?> </td>
               <td> <?= $linha->pag ?> </td>
               <td> <?= $linha->local ?> </td>
               <td>
                   <a href="../public/atualiza.php?cod=<?= $linha->cod ?>" >Editar</a>
               </td>
               <td>
                   <a href="../public/apaga.php?cod=<?= $linha->cod ?>" >Apagar</a>
               </td>
           </tr> 
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once "../src/views/footer.php"; ?>