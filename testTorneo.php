<?php
include_once("Categoria.php");
include_once("Torneo.php");
include_once("Equipo.php");
include_once("Partido.php");
include_once("PartidoFutbol.php");
include_once("PartidoBasket.php");

$catMayores = neW Categoria(1,'Mayores');
$catJuveniles = neW Categoria(2,'juveniles');
$catMenores = neW Categoria(1,'Menores');

$objE1 = neW Equipo("Equipo Uno", "Cap.Uno",1,$catMayores);
$objE2 = neW Equipo("Equipo Dos", "Cap.Dos",2,$catMayores);

$objE3 = neW Equipo("Equipo Tres", "Cap.Tres",3,$catJuveniles);
$objE4 = neW Equipo("Equipo Cuatro", "Cap.Cuatro",4,$catJuveniles);

$objE5 = neW Equipo("Equipo Cinco", "Cap.Cinco",5,$catMayores);
$objE6 = neW Equipo("Equipo Seis", "Cap.Seis",6,$catMayores);

$objE7 = neW Equipo("Equipo Siete", "Cap.Siete",7,$catJuveniles);
$objE8 = neW Equipo("Equipo Ocho", "Cap.Ocho",8,$catJuveniles);

$objE9 = neW Equipo("Equipo Nueve", "Cap.Nueve",9,$catMenores);
$objE10 = neW Equipo("Equipo Diez", "Cap.Diez",9,$catMenores);

$objE11 = neW Equipo("Equipo Once", "Cap.Once",11,$catMayores);
$objE12 = neW Equipo("Equipo Doce", "Cap.Doce",11,$catMayores);

/**Completar el script TestTorneo y:
1. Crear un objeto de la clase Torneo donde el importe base del premio es de: 100.000.
2. Completar el script testTorneo.php y: */
$objTorneo = new Torneo ([],100000);
//3 
 $objPartidoBasquet1 = new PartidoBasket(11, "2024-05-05", $objE7, 80, $objE8 ,120, 7);
 $objPartidoBasquet2 = new PartidoBasket(12, "2024-05-06", $objE9 ,81, $objE10, 110 ,8);
 $objPartidoBasquet3 = new PartidoBasket(13, "2024-05-07", $objE11, 115 ,$objE12, 85, 9);  /**$idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2,$cantidadInfracciones */
 // b. Crear 3 objetos partidos de Fútbol con la siguiente información
 $objPartidoFutbol1 = new PartidoFutbol(14, "2024-05-07" ,$objE1 ,3, $objE2 ,2);
 $objPartidoFutbol2 = new PartidoFutbol(15, "2024-05-08" ,$objE3 ,0 ,$objE4 ,1);
 $objPartidoFutbol3 = new PartidoFutbol(16, "2024-05-09", $objE5, 2 ,$objE6 ,3);

 $arrayPartidosCreados = [$objPartidoBasquet1, $objPartidoBasquet2, $objPartidoBasquet3, $objPartidoFutbol1, $objPartidoFutbol2, $objPartidoFutbol3 ];

/**3. Completar el script testTorneo.php para invocar al método :
a. ingresarPartido($objE5, $objE11, '2024-05-23', 'Futbol'); visualizar la respuesta y la cantidad de
equipos del torneo.
b. ingresarPartido($objE11, $objE11, '2024-05-23', 'basquetbol') ; visualizar la respuesta y la cantidad
de equipos del torneo.
c. ingresarPartido($objE9, $objE10, '2024-05-25', 'basquetbol'); visualizar la respuesta y la cantidad de
equipos del torneo.
d. darGanadores(‘basquet’) y visualizar el resultado.
e. darGanadores(‘futbol’) y visualizar el resultado.
f. calcularPremioPartido con cada uno de los partidos obtenidos en a,b,c.
$objEquipo1, $objEquipo2, $fecha, $tipo
*/
 $ret = $objTorneo->ingresarPartido($objE5, $objE11, '2024-05-23', 'futbol');
 //echo $ret; //no retorna
 $ret1 = $objTorneo->ingresarPartido($objE11, $objE11, '2024-05-23', 'basket');
// echo $ret1; //retorna el partido 
 $ret2 = $objTorneo->ingresarPartido($objE9, $objE10, '2024-05-25', 'basket');
 //echo $ret2; //retorna el partido 
 $ret3 = $objTorneo->darGanadores("PartidoBasket");
 /*foreach ($ret3 as $uno){
   echo  $uno ."\n"; // ME RETORNA EQ 11 Y EQ 10
 }*/
 $arr = $objTorneo->darGanadores("PartidoFutbol");
 /*foreach ($arr as $uno){
    echo $uno . "\n"; // NO RETORNÓ
 }

/*
4. Realizar un echo del objeto Torneo creado en (1). */
/*
*/
$array = $objTorneo->calcularPremioPartido($objPartidoBasquet1);
//print_r($array); //149475000
$array1 = $objTorneo->calcularPremioPartido($objPartidoBasquet2);
print_r($array1); //171300000
$array2 = $objTorneo->calcularPremioPartido($objPartidoBasquet3);
print_r($array2); //219325000

$arrayF1 = $objTorneo->calcularPremioPartido($objPartidoFutbol1);
//print_r($arrayF1); //952500
$arrayF2 = $objTorneo->calcularPremioPartido($objPartidoFutbol2);
//print_r($arrayF2); //350000
$arrayF3 = $objTorneo->calcularPremioPartido($objPartidoFutbol3);
print_r($arrayF3); //3492500

//echo $objTorneo; //funciona
?>
