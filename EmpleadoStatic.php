<?php
require_once("Persona.php");

class Empleado extends Persona
{
    private array $telefonos = [];
    private static int $sueldoTope = 3333;

    public function __construct(
        protected string $nombre,
        protected string $apellidos,
        protected string $edad,
        protected int $sueldo = 1000
    ) {
        parent::__construct($nombre, $edad, $apellidos);
    }

    public function setSueldo(int $sueldo): void
    {
        $this->sueldo = $sueldo;
    }

    public static function setSueldoTope(int $sueldoTope): void
    {
        self::$sueldoTope = $sueldoTope;
    }

    public function getSueldo(): int
    {
        return $this->sueldo;
    }

    public static function getSueldoTope(): int
    {
        return self::$sueldoTope;
    }

    public function debePagarImpuestos(): bool
    {
        return $this->sueldo > self::$sueldoTope && $this->edad > 21;
    }

    public function anyadirTelefono(int $telefono): void
    {
        $this->telefonos[] = $telefono;
    }

    public function listarTelefonos(): string
    {
        return implode(", ", $this->telefonos);
    }

    public function vaciarTelefonos(): void
    {
        $this->telefonos = [];
    }
    public function __toString(): string
    {
        $telefonos = $this->listarTelefonos();
        return "Empleado: {$this->nombre} {$this->apellidos}, Edad: {$this->edad}, Sueldo: {$this->sueldo}, Teléfonos: {$telefonos}";
    }
}

function toHtml(Empleado $emp): void
{
    echo '<p><ul>';
    echo '<li>Nombre: ' . $emp->getNombreCompleto() . '</li>';
    echo '<li>Edad: ' . $emp->getEdad() . '</li>';
    echo '<li>Sueldo: ' . $emp->getSueldo() . '</li>';
    echo '<li>Teléfonos: ' . $emp->listarTelefonos() . '</li>';
    echo '</ul></p>';
}

// Creación del empleado
$empleado = new Empleado('Pedro', 'Buenavista López', '22', 4000);
$empleado->anyadirTelefono(999);
$empleado->anyadirTelefono(998);
$empleado->anyadirTelefono(997);
$empleado->anyadirTelefono(996);

echo '<br>';
echo $empleado->debePagarImpuestos() ? 'Debe pagar impuestos' : 'No debe pagar impuestos';
toHtml($empleado);
echo $empleado;
