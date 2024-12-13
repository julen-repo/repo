<?php
require_once("importe.php");
class  Cliente
{
    public function __construct(
        protected string $nombre,
        protected int $numero,
        protected array $soportesAlquilados,
        protected int $numeroSoportesAlquilados,
        protected int $maxAlquilerConcurrente
    ) {
        $this->nombre = $nombre;
        $this->numero = $numero;
        $this->soportesAlquilados = [];
        $this->numeroSoportesAlquilados = [];
        $this->maxAlquilerConcurrente = 10;
    }
    public function muestraResumen()
    {
        echo "Titulo: " . $this->titulo;
        echo "Precio: " . $this->precio;
        echo "Numero: " . $this->numero;
        echo "Consolas: " . implode(",", $this->consola);
        echo "Minimo jugadores: " . $this->minNumJugadores;
        echo "Maximo jugadores: " . $this->maxNumJugadores;
    }
}
