<?php
require_once("importe.php");
class  Dvd extends Soporte{
    public function __construct(
        protected string $titulo,
        protected int $numero,
        protected float $precio,
        protected array $idiomas,
        protected string $formato
    ){
        parent::__construct($titulo, $numero, $precio);
        $this->idiomas = [];
        $this->formato = $formato;
    }
    public function muestraResumen(){
        echo "Titulo: ".$this->titulo;
        echo "Precio: ".$this->precio;
        echo "Numero: ".$this->numero;
        echo "Duracion: ".implode(",",$this->idiomas);
        echo "Formato: ".$this->formato;
    }
}