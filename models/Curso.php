<?php
class Curso extends Conectar
{
    public function insert_curso($cat_id, $cur_nom, $cur_descrip, $cur_fechini, $cur_fechfin, $inst_id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "ALTER TABLE tm_curso AUTO_INCREMENT = 1;
                INSERT INTO tm_curso
                    (id, cat_id, cur_nom, cur_descrip, cur_fechini, cur_fechfin, inst_id, fech_crea, est)
                VALUES
                    (NULL, ?, ?, ?, ?, ?, ?, now(), 1);";

        $stmt = $conectar->prepare($sql);
        $stmt->bindValue(1, $cat_id);
        $stmt->bindValue(2, $cur_nom);
        $stmt->bindValue(3, $cur_descrip);
        $stmt->bindValue(4, $cur_fechini);
        $stmt->bindValue(5, $cur_fechfin);
        $stmt->bindValue(6, $inst_id);
        $stmt->execute();
        return $resultado = $stmt->fetchAll();
    }
    public function update_curso($cur_id, $cat_id, $cur_nom, $cur_descrip, $cur_fechini, $cur_fechfin, $inst_id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE tm_usuario
                SET
                    cat_id=?,
                    cur_nom=?,
                    cur_descrip=?,
                    cur_fechini=?,
                    cur_fechfin=?,
                    inst_id=?

                WHERE 
                    cur_id=?";

        $stmt = $conectar->prepare($sql);
        $stmt->bindValue(1, $cat_id);
        $stmt->bindValue(2, $cur_nom);
        $stmt->bindValue(3, $cur_descrip);
        $stmt->bindValue(4, $cur_fechini);
        $stmt->bindValue(5, $cur_fechfin);
        $stmt->bindValue(6, $inst_id);
        $stmt->bindValue(7, $cur_id);
        $stmt->execute();
        return $resultado = $stmt->fetchAll();
    }
    public function delete_curso($cur_id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE tm_curso
                SET
                    est = 0
                WHERE cur_id = ?";

        $stmt = $conectar->prepare($sql);
        $stmt->bindValue(1, $cur_id);
        $stmt->execute();
        return $resultado = $stmt->fetchAll();
    }
    public function get_curso()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * 
                FROM tm_curso";

        $stmt = $conectar->prepare($sql);

        $stmt->execute();
        return $resultado = $stmt->fetchAll();
    }
    public function get_curso_id($cur_id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * 
                FROM tm_curso
                WHERE cur_id=? 
                AND est=1";

        $stmt = $conectar->prepare($sql);
        $stmt->bindValue(1, $cur_id);
        $stmt->execute();
        return $resultado = $stmt->fetchAll();
    }
}