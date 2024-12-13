<?php
class Soporte
{
    public function __construct(
        protected string $titulo,
        protected int $numero,
        protected float $precio
    ) {
        $this->titulo = $titulo;
        $this->numero = $numero;
        $this->precio = $precio;
    }
    public function getTitulo(){
        return $this->titulo;
    }
    public function getPrecio(){
        return $this->precio;
    }
    public function getPrecioConIva(){
        return $this->precio * 1.21;
    }
    public function getNumero(){
        return $this->numero;
    }
    public function muestraResumen(){
        echo "Titulo: ".$this->titulo;
        echo "Precio: ".$this->precio;
        echo "Numero: ".$this->numero;
    }
}
