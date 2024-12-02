<?php
class Empleado
{

    private Array $telefonos = array();

    private static $sueldoTope = 3333;

    public function __construct(
        protected string $nombre,
        protected string $apellidos,
        protected int $sueldo = 1000,
    ) {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->sueldo = $sueldo;
    }

    public function setSueldo(int $suel)
    {
        $this->sueldo = $suel;
    }

    public function setSueldoTope($sueldoTope): void
    {
        $this->sueldoTope = $sueldoTope;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getApellidos(): string
    {
        return $this->apellidos;
    }

    public function getSueldo(): string
    {
        return $this->sueldo;
    }

    public function getSueldoTope(): string
    {
        return $this->sueldoTope;
    }

    public function getNombreCompleto(): string
    {
        return $this->nombre . " " .  $this->apellidos;
    }
    public function debePagarImpuestos(): bool
    {
        return ($this->sueldo > $this->getSueldoTope());
    }

    public function anyadirTelefono(int $telefono) : void {
        array_push($this->telefonos, $telefono);
    }

    public function listarTelefonos() : string {
        $tlfs = "";
        for ($i = 0; $i < count($this->telefonos); $i++) {
            //echo $this->telefonos[$i];
            $tlfs = $tlfs . $this->telefonos[$i];
            if ($i != count($this->telefonos) - 1){
                $tlfs = $tlfs . ", ";
                //echo ', ';
            }
        }
        return $tlfs;
    }

    public function vaciarTelefonos() : void {
        unset($this->telefonos);
        $this->telefonos = array();
    }
}

function toHtml(Empleado $emp) : void {
    echo '<p><ul>';

    echo '<li>' . $emp->getNombreCompleto() . '</li>';
    echo '<li>' . $emp->getSueldo() . '</li>';
    echo '<li>' . $emp->listarTelefonos() . '</li>';

    echo '</ul></p>';
    
}

$empleado = new Empleado('Pedro', 'Buenavista López', 4000);
$empleado->anyadirTelefono(999);
$empleado->anyadirTelefono(998);
$empleado->anyadirTelefono(997);
$empleado->anyadirTelefono(996);
echo '<br>';
toHtml($empleado);
?>