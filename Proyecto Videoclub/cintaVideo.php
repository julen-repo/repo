<?php 
require_once("importe.php");
class CintaVideo extends Soporte{
    public function __construct(
        protected string $titulo,
        protected int $numero,
        protected float $precio,
        protected int $duracion,
    ){ 
        parent::__construct($titulo,$numero,$precio);
        $this->duracion = $duracion;
    }
    public function muestraResumen(){
        echo "Titulo: ".$this->titulo;
        echo "Precio: ".$this->precio;
        echo "Numero: ".$this->numero;
        echo "Duracion: ".$this->duracion;
    }
}