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

    public function incluirDvd(Dvd $dvd)
    {
        array_push($this->productos, $dvd);
    }
    public function incluirCintaVideo(CintaVideo $cinta)
    {
        array_push($this->productos, $cinta);
    }
    public function incluirJuego(Juego $juego)
    {
        array_push($this->productos, $juego);
    }
    public function incluirSocio(Cliente $cliente){
        array_push($this->socios, $cliente);
    }
    public function listarSocios(){
        $todosSocios = array_map(function ($socio) {
            return $socio->getTitulo();
        }, $this->socios);

        echo "Soportes alquilados: " . implode(", ", $todosSocios) . "\n";
    }
    public function listarProductos(){
        $todosProductos = array_map(function ($producto) {
            return $producto->getTitulo();
        }, $this->productos);

        echo "Soportes alquilados: " . implode(", ", $todosProductos) . "\n";
    }
    public function alquilarSocioProducto(Cliente $cliente, Soporte $producto)
    {
        $clienteExiste = array_search($cliente, $this->socios, true);
        $productoExiste = array_search($producto, $this->productos, true);

        if ($clienteExiste !== false && $productoExiste !== false) {
            if ($cliente->tieneAlquilado($producto) === false) {
                $cliente->alquilar($producto);
                echo "El producto '{$producto->getTitulo()}' ha sido alquilado al cliente '{$cliente->getNombre()}'.\n";
            } else {
                echo "El cliente ya tiene alquilado este producto.\n";
            }
        } else {
            if ($clienteExiste === false) {
                echo "El cliente no existe en la lista de socios.\n";
            }
            if ($productoExiste === false) {
                echo "El producto no existe en la lista de productos.\n";
            }
        }
    }
}
