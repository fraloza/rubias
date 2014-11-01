<?php
include_once("../lib/dbfactory.php");
class comision_cca extends Main{    
    function index($query,$p,$c) 
    {
        $sql = "SELECT
                        comision_cca.idcomision,
			comision_cca.comision,	
                        comision_cca.descripcion,
			comision_cca.fecha_inicio,
			comision_cca.fecha_termino
			
                        FROM
			comision_cca
			
                        WHERE ".$c." like :query ";         
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );        
        $data['rowspag'] =  $this->getRowPag($data['total'], $p );        
        return $data;
    }       
    function edit($id ) 
    {
        $stmt = $this->db->prepare("SELECT * FROM comision_cca WHERE idcomision = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    function insert($_P ) {
         $sentencia=$this->db->query("SELECT MAX(idcomision) as cant FROM comision_cca");         
         $ct=$sentencia->fetch();      
         $xd=1+ (int)$ct['cant'];
         
        $sql = $this->Query("sp_comi_iu_cca(0,:p1,:p2,:p3,:p4,:p5)");
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':p1', $xd , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P['comision'] , PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['descripcion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p4', $_P['fecha_inicio'] , PDO::PARAM_INT);
        $stmt->bindValue(':p5', $_P['fecha_termino'] , PDO::PARAM_INT);
               
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();   
        return array($p1 , $p2[2]);
    }
    function update($_P ) {
        $sql = $this->Query("sp_comi_iu_cca(1,:p1,:p2,:p3,:p4,:p5)");
        $stmt = $this->db->prepare($sql);
        if($_P['idpadre']==""){$_P['idpadre']=null;}
        $stmt->bindValue(':p1', $_P['idcomision'] , PDO::PARAM_STR);
        $stmt->bindValue(':p2', $_P['comision'] , PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['descripcion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p4', $_P['fecha_inicio'] , PDO::PARAM_INT);
        $stmt->bindValue(':p5', $_P['fecha_termino'] , PDO::PARAM_INT);
               
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function delete($p) {
        $stmt = $this->db->prepare("DELETE FROM comision_cca WHERE idcomision = :p1");
        $stmt->bindValue(':p1', $p, PDO::PARAM_STR);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    
    function lista_miembros($a){
        $sql="
                SELECT
                concat(docente_cca.nombres,'',
                docente_cca.apellidop,'',
                docente_cca.apellidom) as docente,
                comision_cca.comision,
                detalle_comision_cca.cargo_comision,
                detalle_comision_cca.iddocente
                FROM
                detalle_comision_cca
                INNER JOIN comision_cca ON comision_cca.idcomision = detalle_comision_cca.idcomision
                INNER JOIN docente_cca ON docente_cca.iddocente = detalle_comision_cca.iddocente
                WHERE
                comision_cca.idcomision = $a";
        
        $sth = $this->db->prepare($sql);
        $sth->execute();
        
        $datos['miembros']=$sth->fetchAll();
        $view = new View();
        $view->setData($datos);
        $view->setTemplate('../view/comision_cca/_Miembro.php');
        $view->setLayout('../template/Layout.php');
        return $view->renderPartial();
        
    }
    
    function lista_asignaturas($a){
        $sql="
                SELECT
                asignatura_cca.descripcion,
                comision_cca.comision
                FROM
                comision_cca
                INNER JOIN asignatura_cca ON asignatura_cca.idcomision = comision_cca.idcomision
                WHERE
                comision_cca.idcomision = $a";
        
        $sth = $this->db->prepare($sql);
        $sth->execute();
        
        $datos['asignaturas']=$sth->fetchAll();
        $view = new View();
        $view->setData($datos);
        $view->setTemplate('../view/comision_cca/_Asignatura.php');
        $view->setLayout('../template/Layout.php');
        return $view->renderPartial();
        
    }
}
?>
