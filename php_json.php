<?php
//echo "HELLO WORL";

$estructura = [ //definir pares clave valor
    "ciudad" => "leon",
    "numero_peronas" => 30,
    "cursos" => [ //inicio es un array de objetos
        (object)[
            "nombre" => "Programacion web",
            "fecha_inicio" => "2020-11-01",
            "cupo" => 30
        ], // fin primer objeto
        (object)[
            "nombre" => "Bootstrap",
            "fecha_inicio" => "2021-01-01",
            "cupo" => null

        ]
    ]//fin es un arreglo de objetos

];

//convierte y muestra
echo json_encode($estructura); //convertir

?>