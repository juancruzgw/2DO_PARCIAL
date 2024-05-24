<?php 

class PartidoBasket extends Partido {
    private $cantidadInfracciones;
    public function __construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2,$cantidadInfracciones)
    {
        parent::__construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2);
        $this->cantidadInfracciones = $cantidadInfracciones;
    }

    /**
     * Get the value of cantidadInfracciones
     */ 
    public function getCantidadInfracciones()
    {
        return $this->cantidadInfracciones;
    }

    /**
     * Set the value of cantidadInfracciones
     *
     * @return  self
     */ 
    public function setCantidadInfracciones($cantidadInfracciones)
    {
        $this->cantidadInfracciones = $cantidadInfracciones;

        return $this;
    }
    public function __toString()
    {
        $cad = parent::__toString() ."\n";
        $cad .= "Infracciones ". $this->getCantidadInfracciones();
        return $cad;
    }
    public function coeficientePartido()
    {
        $coeficiente = parent::coeficientepartido(); // REDefino y agrego cuenta x infracciones
        $coeficiente -= 0.75 * $this->getCantidadInfracciones();
        return $coeficiente;
    }
    public function darEquipoGanador()
    {
        $ganador = parent::darEquipoGanador();
        return $ganador;
    }
}