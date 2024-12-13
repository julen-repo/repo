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
        $this->numeroSoportesAlquilados = count($this->soportesAlquilados);
        $this->maxAlquilerConcurrente = 10;
    }
    public function alquilar(Soporte $soporte)
    {
        array_push($this->soportesAlquilados, $soporte);
    }

    public function tieneAlquilado(Soporte $soporte)
    {
        $indice = array_search($soporte, $this->soportesAlquilados);

        if ($indice !== false) {
            return $indice;
        }
        return false;
    }
    public function devolver(Soporte $soporte)
    {
        $indice = $this->tieneAlquilado($soporte);

        if ($indice !== false) {
            unset($this->soportesAlquilados[$indice]);
            $this->soportesAlquilados = array_values($this->soportesAlquilados);
            $this->numeroSoportesAlquilados = count($this->soportesAlquilados);
            return true;
        }
        return false;
    }
    public function listaAlquileres()
    {
        echo "Soportes alquilados: ".implode(",", $this->soportesAlquilados);
    }
    public function muestraResumen(){
        echo "Nombre: ".$this->nombre;
        echo "Numero: ".$this->numero;
        echo "Maximos alquileres: ".$this->numeroSoportesAlquilados;
        $this->listaAlquileres();
    }
}
