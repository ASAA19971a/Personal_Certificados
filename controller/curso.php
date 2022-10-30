<?php
// Llamando cadena conexion
require_once("../config/conexion.php");
//Llamando a la clase
require_once("../models/Curso.php");
//Inicializando Clase
$curso = new Curso();
// Opcion de solicitud de controller
switch ($_GET["op"]) {

    case "guardaryeditar":
        if (empty($_POST["cur_id"])) {
            $curso->insert_curso(
                $_POST["cat_id"],
                $_POST["cur_nom"],
                $_POST["cur_descrip"],
                $_POST["cur_fechini"],
                $_POST["cur_fechfin"],
                $_POST["inst_id"]
            );
        } else {
            $curso->update_curso(
                $_POST["cur_id"],
                $_POST["cat_id"],
                $_POST["cur_nom"],
                $_POST["cur_descrip"],
                $_POST["cur_fechini"],
                $_POST["cur_fechfin"],
                $_POST["inst_id"]
            );
        }
        break;

    case "mostrar":
        $datos = $curso->get_curso_id($_POST["cur_id"]);
        if (is_array($datos) == true and count($datos) <> 0) {
            foreach ($datos as $row) {
                $output["cur_id"] = $row["cur_id"];
                $output["cat_id"] = $row["cat_id"];
                $output["cur_nom"] = $row["cur_nom"];
                $output["cur_descrip"] = $row["cur_descrip"];
                $output["cur_fechini"] = $row["cur_fechini"];
                $output["cur_fechfin"] = $row["cur_fechfin"];
                $output["inst_id"] = $row["inst_id"];
            }
            echo json_encode($output);
        }

        break;

    case "eliminar":
        $curso->delete_curso($_POST["cur_id"]);
        break;

    case "listar":
        $datos = $curso->get_curso();
        $data = array();
        foreach ($datos as $row) {
            //Columnas de DataTable para mostrar
            $sub_array = array();
            $sub_array[] = $row["cat_id"];
            $sub_array[] = $row["cur_nom"];
            $sub_array[] = $row["cur_fechini"];
            $sub_array[] = $row["cur_fechfin"];
            $sub_array[] = $row["inst_id"];
            $sub_array[] = '<button type="button" onClick="editar(' . $row["cur_id"] . ');" id="' . $row["cur_id"] . '" class="btn btn-outline-warning btn-icon"><div><i class="fa fa-pencil"></i></div></button>';
            $sub_array[] = '<button type="button" onClick="eliminar(' . $row["cur_id"] . ');" id="' . $row["cur_id"] . '" class="btn btn-outline-danger btn-icon"><div><i class="fa fa-trash"></i></div></button>';
            $data[] = $sub_array;
        }
        $results = array(
            "sEcho" => 1,
            "iTotalRecords" => count($data),
            "iTotalDisplayRecords" => count($data),
            "aaData" => $data
        );

        echo json_encode($results);
        break;
}