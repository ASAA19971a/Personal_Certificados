<?php
require_once("../../config/conexion.php");
session_destroy();
header("location:" . conectar::ruta() . "index.php");
exit();