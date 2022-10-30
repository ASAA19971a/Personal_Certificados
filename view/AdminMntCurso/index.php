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
                <a class="breadcrumb-item" href="#">Mantenimiento</a>
                <span class="breadcrumb-item active">Curso</span>
            </nav>
        </div>
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
            <h4 class="tx-gray-800 mg-b-5">Curso</h4>
            <p class="mg-b-0">Desde esta ventana prodrá dar mantenimiento a cursos.</p>
        </div>

        <!-- Contenido del proyecto -->
        <div class="br-pagebody mg-t-5 pd-x-30">
            <div class="br-section-wrapper">
                <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Mantenimiento de Curso</h6>
                <button id="btnnuevo" class="btn btn-outline-success  mg-b-10">Nuevo Registro <i class="fa fa-plus"></i>
                </button>

                <div class="table-wrapper">
                    <table id="cursos_data" class="table display responsive nowrap">
                        <thead>
                            <tr>
                                <th class="wd-15p">Categoria</th>
                                <th class="wd-15p">Curso</th>
                                <th class="wd-15p">Fecha Inicio</th>
                                <th class="wd-15p">Fecha Fin</th>
                                <th class="wd-15p">Instructor</th>
                                <th class="wd-15p"></th>
                                <th class="wd-20p"></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- ########## END: MAIN PANEL ########## -->

    <?php require_once("../html/MainJs.php"); ?>
    <script src="adminmntcurso.js"></script>

</body>

</html>
<?php
} else {
    header("location:" . Conectar::ruta() . "view/404/");
}
?>