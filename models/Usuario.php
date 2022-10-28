<?php
class Usuario extends Conectar
{
    // funcion para login de acceso de usuario
    public function login()
    {
        $conectar = parent::conexion();
        parent::set_names();
        if (isset($_POST["enviar"])) {
            $correo = $_POST["usu_correo"];
            $password = $_POST["usu_password"];

            if (empty($correo) and empty($password)) {
                // En caso esten vacion correo y contraseña devolver al index con mensaje '2'
                header("location:" . conectar::ruta() . "index.php?m=2");
                exit();
            } else {
                $sql = "SELECT * FROM tm_usuario  WHERE usu_correo=? and usu_pass=? and est=1";
                $stmt = $conectar->prepare($sql);
                $stmt->bindValue(1, $correo);
                $stmt->bindValue(2, $password);
                $stmt->execute();
                $resultado = $stmt->fetch();

                if (is_array($resultado) and count($resultado) > 0) {
                    $_SESSION["usu_id"] = $resultado["usu_id"];
                    $_SESSION["usu_nom"] = $resultado["usu_nom"];
                    $_SESSION["usu_ape"] = $resultado["usu_apep"];
                    $_SESSION["usu_correo"] = $resultado["usu_correo"];
                    // Si todo esta correcto indexar en Home
                    header("location:" . conectar::ruta() . "view/UsuHome/");
                    exit();
                } else {
                    // En caso esten incorrectos correo o contraseña devolver al index con mensaje '1'
                    header("location:" . conectar::ruta() . "index.php?m=1");
                    exit();
                }
            }
        }
    }
    // Mostrar todos los cursos por usuario
    public function get_cursos_x_usuario($usu_id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT 
                    td_curso_usuario.curd_id,
                    tm_curso.cur_id,
                    tm_curso.cur_nom,
                    tm_curso.cur_descrip,
                    tm_curso.cur_fechini,
                    tm_curso.cur_fechfin,
                    tm_usuario.usu_id,
                    tm_usuario.usu_nom,
                    tm_usuario.usu_apep,
                    tm_usuario.usu_apem,
                    tm_instructor.inst_id,
                    tm_instructor.inst_nom,
                    tm_instructor.inst_apep,
                    tm_instructor.inst_apem
                FROM td_curso_usuario
                INNER JOIN tm_curso ON td_curso_usuario.cur_id = tm_curso.cur_id
                INNER JOIN tm_usuario ON td_curso_usuario.usu_id = tm_usuario.usu_id
                INNER JOIN tm_instructor ON tm_curso.inst_id = tm_instructor.inst_id
                WHERE td_curso_usuario.usu_id= ?";

        $stmt = $conectar->prepare($sql);
        $stmt->bindValue(1, $usu_id);
        $stmt->execute();
        return $resultado = $stmt->fetchAll();
    }

    // Mostrar todos los cursos por usuario TOP 10
    public function get_cursos_x_usuario_top10($usu_id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT 
                    td_curso_usuario.curd_id,
                    tm_curso.cur_id,
                    tm_curso.cur_nom,
                    tm_curso.cur_descrip,
                    tm_curso.cur_fechini,
                    tm_curso.cur_fechfin,
                    tm_usuario.usu_id,
                    tm_usuario.usu_nom,
                    tm_usuario.usu_apep,
                    tm_usuario.usu_apem,
                    tm_instructor.inst_id,
                    tm_instructor.inst_nom,
                    tm_instructor.inst_apep,
                    tm_instructor.inst_apem
                FROM td_curso_usuario
                INNER JOIN tm_curso ON td_curso_usuario.cur_id = tm_curso.cur_id
                INNER JOIN tm_usuario ON td_curso_usuario.usu_id = tm_usuario.usu_id
                INNER JOIN tm_instructor ON tm_curso.inst_id = tm_instructor.inst_id
                WHERE td_curso_usuario.usu_id= ?
                LIMIT 10";

        $stmt = $conectar->prepare($sql);
        $stmt->bindValue(1, $usu_id);
        $stmt->execute();
        return $resultado = $stmt->fetchAll();
    }
    // Mostrar datos de curso por su id detalle
    public function get_cursos_x_id_detalle($curd_id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT 
                    td_curso_usuario.curd_id,
                    tm_curso.cur_id,
                    tm_curso.cur_nom,
                    tm_curso.cur_descrip,
                    tm_curso.cur_fechini,
                    tm_curso.cur_fechfin,
                    tm_usuario.usu_id,
                    tm_usuario.usu_nom,
                    tm_usuario.usu_apep,
                    tm_usuario.usu_apem,
                    tm_instructor.inst_id,
                    tm_instructor.inst_nom,
                    tm_instructor.inst_apep,
                    tm_instructor.inst_apem
                FROM td_curso_usuario
                INNER JOIN tm_curso ON td_curso_usuario.cur_id = tm_curso.cur_id
                INNER JOIN tm_usuario ON td_curso_usuario.usu_id = tm_usuario.usu_id
                INNER JOIN tm_instructor ON tm_curso.inst_id = tm_instructor.inst_id
                WHERE td_curso_usuario.curd_id= ?";

        $stmt = $conectar->prepare($sql);
        $stmt->bindValue(1, $curd_id);
        $stmt->execute();
        return $resultado = $stmt->fetchAll();
    }

    //Cantidad cursos por usuario
    public function get_total_cursos_x_usuario($usu_id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT COUNT(*) as total
                FROM td_curso_usuario
                WHERE usu_id=?";

        $stmt = $conectar->prepare($sql);
        $stmt->bindValue(1, $usu_id);
        $stmt->execute();
        return $resultado = $stmt->fetchAll();
    }

    //
}