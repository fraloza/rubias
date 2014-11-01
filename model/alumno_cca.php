<?php
include_once("../lib/dbfactory.php");
class alumno_cca extends Main{    
    function index($query,$p,$c) 
    {
            $sql = "    SELECT
                        alumno_cca.idalumno,
                        alumno_cca.nombres,
                        concat(alumno_cca.apellidop,' ',alumno_cca.apellidom) as apellidos,
                        alumno_cca.dni,
                        tipo_alumno_cca.descripcion
                        FROM
                        alumno_cca inner join  tipo_alumno_cca on alumno_cca.idtipo_alumno = tipo_alumno_cca.idtipo_alumno
                        where ".$c." like :query";
              
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );        
        $data['rowspag'] = $this->getRowPag($data['total'], $p );        
        return $data;
    }
    
    function edit($id ) 
    {
        $stmt = $this->db->prepare("SELECT * FROM alumno_cca WHERE idalumno = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    function insert($_P ) {
        $sentencia=$this->db->query("SELECT MAX(idalumno) as cant from alumno_cca");         
        $ct=$sentencia->fetch();      
        $xd=1+(int)$ct['cant'];
               
        $sql = $this->Query("sp_alum_iu_cca(0,:p1,:p2,:p3,:p4,:p5,:p6,:p7,:p8,:p9,:p10)");
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':p1', $xd , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P['idtipo_alumno'] , PDO::PARAM_INT);
        $stmt->bindValue(':p3', $_P['nombres'] , PDO::PARAM_STR);
        $stmt->bindValue(':p4', $_P['apellidop'] , PDO::PARAM_STR);
        $stmt->bindValue(':p5', $_P['apellidom'] , PDO::PARAM_STR);
        $stmt->bindValue(':p6', $_P['dni'] , PDO::PARAM_STR);
        $stmt->bindValue(':p7', $_P['sexo'] , PDO::PARAM_STR);
        $stmt->bindValue(':p8', $_P['direccion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p9', $_P['procedencia'] , PDO::PARAM_STR);
        $stmt->bindValue(':p10', $_P['telefono'] , PDO::PARAM_STR);
        
        
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function update($_P ) {
        
        $sql = $this->Query("sp_alum_iu_cca(1,:p1,:p2,:p3,:p4,:p5,:p6,:p7,:p8,:p9,:p10)");
        $stmt = $this->db->prepare($sql);
        if($_P['idpadre']==""){$_P['idpadre']=null;}       
        $stmt->bindValue(':p1', $_P['idalumno'] , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P['idtipo_alumno'] , PDO::PARAM_INT);
        $stmt->bindValue(':p3', $_P['nombres'] , PDO::PARAM_STR);
        $stmt->bindValue(':p4', $_P['apellidop'] , PDO::PARAM_STR);
        $stmt->bindValue(':p5', $_P['apellidom'] , PDO::PARAM_STR);
        $stmt->bindValue(':p6', $_P['dni'] , PDO::PARAM_STR);
        $stmt->bindValue(':p7', $_P['sexo'] , PDO::PARAM_STR);
        $stmt->bindValue(':p8', $_P['direccion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p9', $_P['procedencia'] , PDO::PARAM_STR);
        $stmt->bindValue(':p10', $_P['telefono'] , PDO::PARAM_STR);
        
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function delete($p) {
        $stmt = $this->db->prepare("DELETE FROM alumno_cca WHERE idalumno = :p1");
        $stmt->bindValue(':p1', $p, PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    
    function buscar($query,$p,$c) 
    {
            $sql = "    SELECT nombres, apellidop, apellidom , dni, sexo, parametro FROM (
                        SELECT 
                        nombres as nombres, 
                        apellidop as apellidop, 
                        apellidom as apellidom, 
                        dni as dni, 
                        sexo as sexo,
                        1 as parametro 
                        FROM alumno_cca
                        UNION ALL
                        SELECT 
                        NombreAlumno as nombres, 
                        ApellidoPaterno as apellidop, 
                        ApellidoMaterno as apellidom, 
                        NumDocumento as dni, 
                        Sexo as sexo,
                        2 as parametro 
                        FROM alumnos)
                        AS alumnon
                        WHERE ".$c. " like :query";
            //die($sql);
              
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        /*var_dump($data['total']);
        exit();*/
        $data['rows'] =  $this->getRow($sql, $param , $p );        
        $data['rowspag'] = $this->getRowPag($data['total'], $p ); 
        
        return $data;
    }
}
?>
