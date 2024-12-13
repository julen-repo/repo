<?php
require_once("importe.php");
class  Juego extends Soporte{
    public function __construct(
        protected string $titulo,
        protected int $numero,
        protected float $precio,
        protected array $consola,
        protected int $minNumJugadores,
        protected int $maxNumJugadores
    ){
        parent::__construct($titulo, $numero, $precio);
        $this->consola = [];
        $this->minNumJugadores = $minNumJugadores;
        $this->maxNumJugadores = $maxNumJugadores;
    }
    public function muestraResumen(){
        echo "Titulo: ".$this->titulo;
        echo "Precio: ".$this->precio;
        echo "Numero: ".$this->numero;
        echo "Consolas: ".implode(",",$this->consola);
        echo "Minimo jugadores: ".$this->minNumJugadores;
        echo "Maximo jugadores: ".$this->maxNumJugadores;
    }
    public function muestraJugadoresPosibles(){
        echo "Minimo jugadores: ".$this->minNumJugadores;
        echo "Maximo jugadores: ".$this->maxNumJugadores;
    }
}