<?php

namespace Model;

class Pedido
{
    //Atributos
    private $codPedido;
    public $dataHora;
    public $itens;
    public $quant;
    public $pag;
    public $local;

    //Métodos / funções
    public function __construct()
    {
        //Esse método será invocado toda vez
        //que esta classe for instanciada!
        echo "Código do pedido: " . $this->gerarCodigo();
        $this->gerarData();
    }

    private function gerarData()
    {
        echo  "<br>Data e hora do pedido:<br>";
        date_default_timezone_set('America/Sao_Paulo');
        $this->dataHora = date('Y-m-d H:i:s');
        echo date("d/m/Y - H:i:s");
    }

    private function gerarCodigo()
    {
        $this->codPedido = random_int(10, 100);
        return $this->codPedido;
    }

    public function gerarDesconto()
    {
        if($this->quant >= 5 && $this->local == "Viamão" ||
            $this->quant >= 5 && $this->local == "Alvorada") {
            return "<h1 style='background-color: green; color: white'> 10% Off </h1>";
        }
    }

} //fim da classe