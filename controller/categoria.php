<?php
// SERVICIOS APIS
header('Content-Type: application/json'); // Vamos a decirle que es una aplicacion de tipo json
require_once("../config/conexion.php");
require_once("../models/Categoria.php");
$categoria = new Categoria(); // Se instancia new Categoria se llama la clase Categoria en Models

$body = json_decode(file_get_contents("php://input"), true); // Vamos a recibir la informacion en un formato json

switch ($_GET["op"]) {
    case 'GetAll': //Get
        $datos=$categoria->get_categoria(); // La variable categoria es la instancia de Categoria()
        echo json_encode($datos);
    break;
    case 'GetId': //Post
        $datos=$categoria->get_categoria_x_id($body["cat_id"]); 
        echo json_encode($datos); 
    break; 
    case 'Insert': // Insert
        $datos=$categoria->insert_categoria($body["cat_nom"],$body["cat_obs"]); 
        echo json_encode(" Insert Correcto");
    break;
    case 'Update': // Update
        $datos=$categoria->update_categoria($body["cat_id"],$body["cat_nom"],$body["cat_obs"]); 
        echo json_encode("Update Correcto");
    break; 
    case 'Delete': // 
        $datos=$categoria->delete_categoria($body["cat_id"]); 
        echo json_encode("Delete Correcto");
    break; 
    default:
        # code...
        break;
}
?>