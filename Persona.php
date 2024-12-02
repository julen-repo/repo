<?php
class Persona
{
    public function __construct(
        protected string $nombre,
        protected string $edad,
        protected string $apellidos
    ) {
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->apellidos = $apellidos;
    }
    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getEdad(): string
    {
        return $this->edad;
    }

    public function getApellidos(): string
    {
        return $this->apellidos;
    }

    public function getNombreCompleto(): string
    {
        return $this->nombre . " " .  $this->apellidos;
    }
}
