<?php
require_once("base_datos.php");
if ($_SERVER['REQUEST_METHOD'] == 'GET') { //verifica si es metodo Get
    
    
    //procesar GET
    //paso 1. obtener clave valor
    // isset() -> determinar si existe una variable o no
   
    if(isset($_GET['folio'])){
         //consultar por folio
        $folio = $_GET['folio'];

        //busqueda por numero de folio en bd
        $producto = buscar_folio($folio);

        //responder la solicitud 
        if($producto != null){
            header('Content-Type: aplication/json');
            $respuesta = [
                "producto" => (object)[
                    "folio" => $producto->folio,
                    "nombre" => $producto->nombre,
                    "color" => $producto->color,
                    "costo" => $producto->costo,
                    "unidad_medida" => $producto->unidad_baja,
                    "fecha_baja" => $producto->fecha_baja
                ]
            ];
            //enviando respuesta
            echo json_encode($respuesta);
        }else{
            //no lo encontro
            header('Content-Type: aplication/json');
            $respuesta = [
                "producto" => (object)[]
            ];
            //enviando respuesta
            echo json_encode($respuesta);

        }

    }else{
          //consultar  todo
          //obteniendo todos los productos de la BD
         $productos = buscar_todo();


          header('Content=Type: application/json');

          $array_productos = [];
          foreach($productos as $item){ //obtner todos los productos de la bd
            $array_productos[] = $item;
          }
          $respuesta = [
            "mensaje" => "Proceso exitoso",
            "productos" => [
                (object)[
                    "folio" => "001",
                    "nombre" => "Arroz",
                    "color" => "Blanco",
                    "precio" => 25.50,
                    "unida_medida" => "Gramos",
                    "fecha_baja" => null
                ], (object)[
                    "folio" => "002",
                    "nombre" => "Malla metalica",
                    "color" => "Cromo",
                    "precio" => 40.80,
                    "unida_medida" => "Metros",
                    "fecha_baja" => null
                ]
            ]
          ];
          echo json_encode($respuesta);
    }
  
    //algoritmo o proceso

} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Contenido de proceso POST

    //$folio = $_POST['folio'];
    //$nombre = $_POST['nombre'];

    $resultado = insertar($folio, $nombre, $color, $costo, $unidad_medida, $fecha_baja);

    //algoritmo o proceso
    header('Content=Type: application/json');
    $respuesta = [
        "mensaje" => "Registro existoso"
    ];

    echo json_encode($respuesta);

} else if ($_SERVER['REQUEST_METHOD'] == 'PUT') {

    //Contenido de proceso PUT

    //$datos_recibidos = json_decode(file_get_contents("php://input"));
    //$folio = $datos_recibidos->folio;
    //$nombre = $datos_recibidos->nombre;
    $resultado = actualizar($folio, $nombre, $color, $costo, $unidad_medida, $fecha_baja);


    header('Content=Type: application/json');
    $respuesta = [
        "mensaje" => "Registro existoso" 
    ];

    echo json_encode($respuesta);


} else if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {

    //Contenido de proceso DELETE

    $folio = $_GET['folio'];

    $resultado = eliminar($folio);

    //procesar algoritmo
    
    header('Content=Type: application/json');
    $respuesta = [
        "mensaje" => "Registro existoso" .$folio
    ];

    echo json_encode($respuesta);



} else {
    //procesar error y responder

}

?>
