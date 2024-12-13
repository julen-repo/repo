<?php
require_once("importe.php");
class  Videoclub
{
    public function __construct(
        protected string $nombre,
        protected array $productos,
        protected int $numProductos,
        protected array $socios,
        protected int $numSocios
    ) {
        $this->nombre = $nombre;
        $this->productos = [];
        $this->numProductos = count($this->productos);
        $this->socios = [];
        $this->numSocios = count($this->socios);
    }
    public function incluirProducto(Soporte $soporte)
    {
        array_push($this->productos, $soporte);
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
        echo "Soportes alquilados: " . implode(",", $this->soportesAlquilados);
    }
    public function muestraResumen()
    {
        echo "Nombre: " . $this->nombre;
        echo "Numero: " . $this->numero;
        echo "Maximos alquileres: " . $this->numeroSoportesAlquilados;
        $this->listaAlquileres();
    }
}
