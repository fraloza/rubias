<?php
include_once("../lib/dbfactory.php");
class estadosituacional extends Main{   
    
    public $opt;
    function index($query,$p,$c) {        
        $sql = "SELECT
                    CodigoEstadoSituacional,
                    DescripcionEstadoestacionario
                    FROM
                    estadosituacional
                where ".$c." like :query";         
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );        
        $data['rowspag'] =  $this->getRowPag($data['total'], $p );        
        return $data;
    }       
    function edit($id ) {
        $stmt = $this->db->prepare("SELECT * FROM estadosituacional WHERE CodigoEstadoSituacional = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    
    function insert($_P ) {
           
            $sentencia=$this->db->query("SELECT COUNT(CodigoEstadoSituacional) as cant from estadosituacional");         
         $ct=$sentencia->fetch();      
          $xd=1+ (int)$ct['cant'];
          $xd="0".$xd;
        $sql = $this->Query("sp_estadsitua_iu(0,:p1,:p2)");
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':p1',$xd , PDO::PARAM_STR);
        $stmt->bindValue(':p2', $_P['DescripcionEstadoestacionario'] , PDO::PARAM_STR);
       
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    
    
    
    function update($_P ) {
        
        $sql = $this->Query("sp_estadsitua_iu(1,:p1,:p2)");
        $stmt = $this->db->prepare($sql);
        
        if($_P['idpadre']==""){$_P['idpadre']=null;}
        $stmt->bindValue(':p1', $_P['CodigoEstadoSituacional'] , PDO::PARAM_STR);
        $stmt->bindValue(':p2', $_P['DescripcionEstadoestacionario'] , PDO::PARAM_STR);
       
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function delete($p) {
        $stmt = $this->db->prepare("DELETE FROM estadosituacional WHERE CodigoEstadoSituacional = :p1");
        $stmt->bindValue(':p1', $p, PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
}
?>
