<?php
include_once("../lib/dbfactory.php");
class matricula_cca extends Main{    
    function index($query,$p,$c) 
    {
        $sql = " SELECT
                matricula_cca.idmatricula,
                alumno_cca.nombres,
                comision_cca.comision,
                matricula_cca.nombre_proyecto,
                matricula_cca.fecha
                FROM
                alumno_cca
                INNER JOIN matricula_cca ON alumno_cca.idalumno = matricula_cca.idalumno
                INNER JOIN comision_cca ON comision_cca.idcomision = matricula_cca.idcomision 

                        WHERE ".$c." like :query ";         
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );        
        $data['rowspag'] =  $this->getRowPag($data['total'], $p );        
        return $data;
    }       
    function edit($id ) 
    {
        $stmt = $this->db->prepare("SELECT * FROM matricula_cca WHERE idmatricula = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    function insert($_P ) {
         $sentencia=$this->db->query("SELECT MAX(idmatricula) as cant FROM matricula_cca");         
         $ct=$sentencia->fetch();      
         $xd=1+ (int)$ct['cant'];
         
        $sql = $this->Query("sp_matri_iu_cca(0,:p1,:p2,:p3,:p4,:p5)");
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':p1', $xd , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P['idalumno'] , PDO::PARAM_INT);
        $stmt->bindValue(':p3', $_P['idcomision'] , PDO::PARAM_INT);
        $stmt->bindValue(':p4', $_P['nombre_proyecto'] , PDO::PARAM_STR);
        $stmt->bindValue(':p5', $_P['fecha'] , PDO::PARAM_INT);
               
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();   
        return array($p1 , $p2[2]);
    }
    function update($_P ) {
        $sql = $this->Query("sp_matri_iu_cca(1,:p1,:p2,:p3,:p4,:p5)");
        $stmt = $this->db->prepare($sql);
        if($_P['idpadre']==""){$_P['idpadre']=null;}
        $stmt->bindValue(':p1', $_P['idmatricula'] , PDO::PARAM_STR);
        $stmt->bindValue(':p2', $_P['idalumno'] , PDO::PARAM_INT);
        $stmt->bindValue(':p3', $_P['idcomision'] , PDO::PARAM_INT);
        $stmt->bindValue(':p4', $_P['nombre_proyecto'] , PDO::PARAM_STR);
        $stmt->bindValue(':p5', $_P['fecha'] , PDO::PARAM_INT);
               
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function delete($p) {
        $stmt = $this->db->prepare("DELETE FROM matricula_cca WHERE idmatricula = :p1");
        $stmt->bindValue(':p1', $p, PDO::PARAM_STR);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
}
?>
