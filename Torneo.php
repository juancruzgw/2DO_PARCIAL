<?php

class Torneo {
    private $coleccionPartidos;
    private $importePremio;
    public function __construct($colPartidos,$importePremio)
    {
        $this->coleccionPartidos = $colPartidos;
        $this->importePremio = $importePremio;
    }


    /**
     * Get the value of importePremio
     */ 
    public function getImportePremio()
    {
        return $this->importePremio;
    }

    /**
     * Set the value of importePremio
     *
     * @return  self
     */ 
    public function setImportePremio($importePremio)
    {
        $this->importePremio = $importePremio;

        return $this;
    }

    /**
     * Get the value of coleccionPartidos
     */ 
    public function getColeccionPartidos()
    {
        return $this->coleccionPartidos;
    }

    /**
     * Set the value of coleccionPartidos
     *
     * @return  self
     */ 
    public function setColeccionPartidos($coleccionPartidos)
    {
        $this->coleccionPartidos = $coleccionPartidos;

        return $this;
    }
    public function __toString()
    {
        return "Partidos:\n" . $this->coleccionAString() .
        "Premio: $" . $this->getImportePremio();
    }

    public function coleccionAString()
    {
        $coleccion = $this->getColeccionPartidos();
        $retorno = "";
        for ($i = 0; $i < count($coleccion); $i++) {
            $retorno .= "\n" . $coleccion[$i] . "\n";
        }
        return $retorno;
    }

    /**4. Implementar el método ingresarPartido($OBJEquipo1, $OBJEquipo2, $fecha, $tipoPartido) en la
    clase Torneo el cual recibe por parámetro 2 equipos, la fecha en la que se realizará el partido y si se
    trata de un partido de futbol o basquetbol . El método debe crear y retornar la instancia de la clase
    Partido que corresponda y almacenarla en la colección de partidos del Torneo. Se debe chequear que los
    2 equipos tengan la misma categoría e igual cantidad de jugadores, caso contrario no podrá ser
    registrado ese partido en el torneo.
    */
    public function ingresarPartido($objEquipo1, $objEquipo2, $fecha, $tipo){
    
        $partido = null;
        $colPartidos = $this->getColeccionPartidos();
        $idPartido = count($colPartidos)+ 1;
        if ($objEquipo1->getObjCategoria()->getDescripcion() == $objEquipo2->getObjCategoria()->getDescripcion() && $objEquipo1->getCantJugadores() == $objEquipo2->getCantJugadores() && $objEquipo1!= $objEquipo2) {
            if ($tipo == "futbol") {
                $partido = new PartidoFutbol($idPartido, $objEquipo1, $objEquipo2, $fecha, 0, 0);
                array_push($colPartidos, $partido);
                $this->setColeccionPartidos($colPartidos);
            } else if ($tipo == "basket") {
                $partido = new PartidoBasket($idPartido, $objEquipo1, $objEquipo2, $fecha, 0, 0, 0);
                array_push($colPartidos, $partido);
                $this->setColeccionPartidos($colPartidos);
            }
        }
        return $partido;
    }
    /**6. Implementar el método darGanadores($deporte) en la clase Torneo que recibe por parámetro si se
    trata de un partido de fútbol o de básquetbol y en base al parámetro busca entre esos partidos los
    equipos ganadores ( equipo con mayor cantidad de goles). El método retorna una colección con los
    objetos de los equipos encontrados.
    */  
    public function darGanadores($deporte)
    {
        $coleccionPartidos = $this->getColeccionPartidos();
        $coleccionGanadores = [];

        foreach ($coleccionPartidos as $objPartido) {

            if ($objPartido instanceof $deporte) {
                $ganador = $objPartido->darEquipoGanador();
                if ($ganador==!null) {
                    array_push($coleccionGanadores, $ganador);
                }
            }
        }
        return $coleccionGanadores;
    }
    /**Implementar el método calcularPremioPartido($OBJPartido) que debe retornar un arreglo asociativo
    donde una de sus claves es ‘equipoGanador’ y contiene la referencia al equipo ganador; y la otra clave
    es ‘premioPartido’ que contiene el valor obtenido del coeficiente del Partido por el importe configurado
    para el torneo.
    (premioPartido = Coef_partido * ImportePremio)
 */
public function calcularPremioPartido($objPartido)
{
    $ganador = $objPartido->darEquipoGanador();
    $importePremio = $this->getImportePremio();
    $retorno = ["equipoGanador" => null, "premioPartido" => 0,];

    if ($ganador!== null) {
        $coeficiente = $objPartido->coeficientePartido();
        $premio = $importePremio * $coeficiente;
        $retorno = [
            "equipoGanador" => $ganador,
            "premioPartido" => $premio,
        ];
    }
    return $retorno;
}

}