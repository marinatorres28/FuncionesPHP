<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Funciones en PHP</title>
</head>
<body>
<?php
    /*
     * PHP como todos los lenguajes, tiene mas de 1000 funciones integradas, pero tu puedes crear tus propias funciones
     * */
    // funcion basica -> identificador o nombre
    function saltar(){
        echo "<br>";
    }
    echo "Es una prueba";
    SALTAR(); // aun que reconozca la funcion, no es recomendable
    echo "Despues del salto";

    // funcion con pase de parámetros
    function saltarYescribir($texto){
        echo "<br>$texto";
    }
    $linea=5;
    saltarYescribir("En un lugar de la mancha. Linea $linea");

    /* Practica: Crea dos funciones que al pasar un texto, una lo devuelva en minuscula y la otra en mayuscula*/
    function pasarAminuscula($texto){
        return strtolower($texto);
    }
    function pasarAmayuscula($texto){
        return strtoupper($texto);
    }

    $mensaje="Es una prueba de las funciones en PHP";
    saltarYescribir(pasarAminuscula($mensaje));
    saltarYescribir(pasarAmayuscula($mensaje));

    // en las funciones puedes enviar varios parametros
    function registro($nombre,$apellido,$telefono){
        $registroAlumno=["nombre"=>$nombre,"apellido"=>$apellido,"telefono"=>$telefono];
        return $registroAlumno;
    }
    saltar();

    $registroGeneral[]=registro("Francisco","Gonzalez","612345678");
    print_r($registroGeneral);
    saltar();
    // array_inserta los valores que le pases al final del array
    array_push($registroGeneral,registro("Luis","Perez","612345123"));
    // la forma de insertar al final de igual manera que con array_push
    saltar();
    $registroGeneral[]=registro("Luisa","Diaz","612345123");
    print_r($registroGeneral);
    saltar();
    saltarYescribir("Solo un alumno ");
    print_r($registroGeneral[2]);

    // crear la tabla para ver los datos
    function tablax4col($textoCol1,$textoCol2,$textoCol3,$textoCol4,$array){
        echo "
    <table>
    <tr>
        <th>$textoCol1</th>
        <th>$textoCol2</th>
        <th>$textoCol3</th>
        <th>$textoCol4</th>
    </tr>
    ";
        foreach ($array as $indice=>$valor){
            echo "<tr><td>$indice</td>";
            foreach ($valor as $dato){
                echo "<td>$dato</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
    saltarYescribir("************************************");
    saltarYescribir("Tabla con funcion");
    tablax4col("ID","Nombre","Apellido","Telefono",$registroGeneral);

    /** Declaracion de variables en el paso de parametros */
    function sumar($a=5,$b=8)
    {
        return $a + $b;
    }
    saltarYescribir(sumar());
    saltarYescribir(sumar(15,9));

    function sumarVarios()
    {
        $total=0;
        for ($i=0;$i<func_num_args();$i++){
            $total+=func_get_arg($i);
        }
        return $total;
    }

    saltarYescribir(sumarVarios(4,5,6,1,6));
    saltarYescribir(sumarVarios());
    saltarYescribir(sumarVarios(58+74));

    // include
    saltarYescribir("<hr>");
    saltar();
    include "muestra.php";
    saltar();
    saltarYescribir("<hr>");

    // include hace que solo mostremos muestra.php una vez, por eso como ya lo habiamos llamado arriba no se muestra en el index
    saltarYescribir("<hr>");
    saltar();
    include_once "muestra.php";
    saltar();
    saltarYescribir("<hr>");

    // con required, si no se encuentra el archivo al que estas llamando, se para la ejecucion del programa, en cambio con include sigue la ejecucion

    /** Paso de parametros por lista */
    // crea una lista tipo array del grupo de parametros que se pasa
    function sumarLista(...$lista)
    {
        $total=0;
        // si necesito saber cuantos elementos tiene la lista
        saltarYescribir("Elementos=> ".count($lista)); // envia los datos como una lista pero los trata como un array
        foreach ($lista as $num){ // para poder acceder a cada valor, se debe recorrer el array
            $total+= $num;
        }
        return $total;
    }
    saltarYescribir("Paso de parametros por lista");
    saltarYescribir("Total=> ".sumarLista(4,5,6,3,2));
    saltarYescribir("Total=> ".sumarLista());
    saltarYescribir("Total=> ".sumarLista(58,74));
    //saltarYescribir($total); // no puedes acceder a una variable que tiene ambito local


    /** Ambitos de las variables dentro y fuera de la funcion */
    $cadena1="Hola";
    $cadena2="mundo";
    function unirCadena($cadena1,$cadena2)
    {
        return $cadena1." ".$cadena2;
    }
    saltarYescribir(unirCadena($cadena1,$cadena2));

    // El simbolo de & antes de la variable que se pasa como parametro, indica que si es modificado su valor o el valor de esa variable dentro de la funcion, tambien se modifica fuera de la funcion
    saltarYescribir("Pase de parametros por referencia '&'");
    function unirCadenaReferencia(&$cadena1,$cadena2)
    {
        $cadena1="Lo que yo quiera ".$cadena2;
        return $cadena1;
    }
    saltarYescribir(unirCadenaReferencia($cadena1,$cadena2)); // se ejecuta la funcion
    saltarYescribir($cadena1); // en este punto puedes comprobar como despues de llamar la funcion el valor de cadena1 ha cambiado

    /** Ambito de las variables globales -> se declaran dentro de la funcion como global, para acceder y modificar su valor */
    $aula="AT1";
    function mostrarModificarAula()
    {
        global $aula; // ese valor puede ser manipulado dentro de la funcion
        $aula="AT1 pasillo 1";
    }

    // mostramos fuera de la funcion el valor de aula
    mostrarModificarAula();
    saltarYescribir($aula);



?>

</body>
</html>

