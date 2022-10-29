<?php
// Llamamos al archivo de conexion
require_once("../../config/conexion.php");
if (isset($_SESSION["usu_id"])) {

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once("../html/MainHead.php"); ?>

    <title>Empresa::</title>

</head>

<body>

    <?php require_once("../html/MainMenu.php"); ?>

    <?php require_once("../html/MainHeader.php"); ?>

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="#">Inicio</a>
            </nav>
        </div>
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
            <h4 class="tx-gray-800 mg-b-5">Inicio</h4>
            <p class="mg-b-0">Dashboard</p>
        </div>

        <!-- Contenido del proyecto -->
        <div class="br-pagebody mg-t-5 pd-x-30">

        </div>

    </div>
    <!-- ########## END: MAIN PANEL ########## -->

    <?php require_once("../html/MainJs.php"); ?>
    <script src=".js"></script>

</body>

</html>
<?php
} else {
    header("location:" . Conectar::ruta() . "view/404/");
}
?>