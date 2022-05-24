<?php

//cod

use Database\Database;

if( isset($_POST['cod']) ) {
    $cod = $_POST['cod'];
} else {
    $cod = null;
}

//itens
if( isset($_POST['itens']) ) {
    $itens = $_POST['itens'];
} else {
    $itens = null;
}

//quant
if( isset($_POST['quant']) ) {
    $quant = $_POST['quant'];
} else {
    $quant = null;
}

//pgto
if( isset($_POST['pgto']) ) {
    $pgto = $_POST['pgto'];
} else {
    $pgto = null;
}

//entrega
if( isset($_POST['entrega']) ) {
    $entrega = $_POST['entrega'];
} else {
    $entrega = null;
}

/*
var_dump($cod);
var_dump($itens);
var_dump($quant);
var_dump($pgto);
var_dump($entrega);
*/

require_once "../src/model/Database.php";
$db = new Database();

$resultDb = $db->update(
    "UPDATE pedidos SET itens = '$itens',
    quant = $quant, pag = '$pgto',
    local = '$entrega' WHERE cod = $cod; "
);

//var_dump($resultDb);

if($resultDb) {
    header('location: ../public/lista.php');
} else {
    echo "Erro na atualização =( ";
}