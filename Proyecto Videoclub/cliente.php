<?php
require_once("importe.php");

class Cliente
{
    protected string $nombre;
    protected int $numero;
    protected array $soportesAlquilados = []; 
    protected int $numeroSoportesAlquilados = 0; 
    protected int $maxAlquilerConcurrente;

    public function __construct(
        string $nombre,
        int $numero,
        int $maxAlquilerConcurrente = 10 
    ) {
        $this->nombre = $nombre;
        $this->numero = $numero;
        $this->maxAlquilerConcurrente = $maxAlquilerConcurrente;
    }

    public function alquilar(Soporte $soporte)
    {
        if (count($this->soportesAlquilados) < $this->maxAlquilerConcurrente) {
            $this->soportesAlquilados[] = $soporte; 
            $this->numeroSoportesAlquilados = count($this->soportesAlquilados); 
        } else {
            echo "No se pueden alquilar más soportes. Límite alcanzado.\n";
        }
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
        $alquileres = array_map(function ($soporte) {
            return $soporte->getTitulo();
        }, $this->soportesAlquilados);

        echo "Soportes alquilados: " . implode(", ", $alquileres) . "\n";
    }

    public function muestraResumen()
    {
        echo "Nombre: " . $this->nombre . "\n";
        echo "Número: " . $this->numero . "\n";
        echo "Máximos alquileres: " . $this->maxAlquilerConcurrente . "\n";
        $this->listaAlquileres();
    }
}
