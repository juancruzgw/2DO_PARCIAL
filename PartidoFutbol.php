<?php 

class PartidoFutbol extends Partido {

    public function __construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2)
    {
        parent::__construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2);

    }
    public function __toString()
    {
        $cad = parent::__toString(); // redefino x buena practica
        return $cad;
    }
     public function coeficientePartido() {
    
        $coeficiente = parent::coeficientePartido();

        if ($this->getObjEquipo1()->getObjCategoria()->getDescripcion()==="Menores") {
            $coeficiente += $coeficiente * 0.14;
        }
        elseif ($this->getObjEquipo1()->getObjCategoria()->getDescripcion()==="Juveniles"){

            $coeficiente += $coeficiente * 0.19;
        }elseif ($this->getObjEquipo1()->getObjCategoria()->getDescripcion()==="Mayores"){

            $coeficiente += $coeficiente * 0.27;
        }
        return $coeficiente;  
        }


     

        public function darEquipoGanador()
        {
            $ganador = parent::darEquipoGanador(); // "sobreescribo" el metodo x "buena practica"
            return $ganador;
        }
        
}
