<?php 
//Iniciamos sesión
session_start();
//Incluimos el script del buscador
include_once("buscador-indices.php");
//Variables para los campos recibidos desde el formulario
$cadena_busqueda = "";
$pagina = -1;
$opciones_seleccion = array("documento", "apartados");
$seleccion = "documento";
$opciones_tipo_busqueda = array("alguna", "todas-orden", 
    "todas-desorden", "cadena-completa");
$tipo_busqueda = "alguna";
$palabras_completas = false;
$sensible_mayusculas = false;
$accion = "";
//Variables para los resultados
$resultado = "";
$cad_traza = "";
$tiempo = 0;
//Recogemos el post
if (isset($_POST)){
    foreach($_POST as $campo => $valor){
        $valor = htmlspecialchars($valor);
        switch ($campo){
            case "cadena-busqueda":
                $cadena_busqueda = $valor;
                break;
            case "pagina":
                $pagina = $valor;
                $accion = "buscar";
                break;
            case "seleccion":
                if (in_array($valor, $opciones_seleccion)){
                    $seleccion = $valor;
                }
                break;
            case "tipo-busqueda":
                if (in_array($valor, $opciones_tipo_busqueda)){
                    $tipo_busqueda = $valor;
                }
                break;
            case "palabras-completas":
                $palabras_completas = true;
                break;
            case "sensible-mayusculas":
                $sensible_mayusculas = true;
                break;
            case "buscar":
                $accion = "buscar";
                break;

        }
    }
}
if ($accion == "buscar"){
    //Lanzamos el buscador que nos devuelve un array
    $arr_busca = buscar($cadena_busqueda, $pagina, $seleccion,
                $tipo_busqueda, $palabras_completas, $sensible_mayusculas);
    if ($arr_busca["error"]){
        $pagina = -1;
        $resultado = $arr_busca["mensaje"];
    } else {
        $pagina = $arr_busca["pagina"];
        $resultado = "";
        $tiempo = "";
        if ($arr_busca["mensaje"] != ""){
            $resultado = $arr_busca["mensaje"];
        } else {
            $tiempo = 'Encontrados '.$arr_busca["num-docs"].' documentos en '.
                       $arr_busca["lapso"].' milisegundos. '.$arr_busca["cortado"];
            $resultado = $arr_busca["resultado"];
        }
        $cad_traza = $arr_busca["cad-traza"];
    }
}
echo '<?xml version="1.0" encoding="UTF-8"?>';
?>