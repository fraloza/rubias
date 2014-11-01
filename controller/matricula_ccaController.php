<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/matricula_cca.php';
class matricula_ccaController extends Controller {    
    public function index() 
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}        
        if(!isset($_GET['criterio'])){$_GET['criterio']="matricula_cca.idmatricula";}
        $obj = new matricula_cca();
        $data = array();             
        $data['data'] = $obj->index($_GET['q'],$_GET['p'],$_GET['criterio']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=matricula_cca&action=index','query'=>$_GET['q']));                
        $cols = array("id","alumno","comision","proyecto","fecha");        
        $opt = array("matricula_cca.nombre_proyecto"=>"matricula");
        $data['grilla'] = $this->grilla_comision_cca("matricula_cca",$cols, $data['data']['rows'],$opt,$data['pag'],true,false,true,true);
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/matricula_cca/_Index.php' );
        $view->setLayout( '../template/Layout.php' );   
        $view->render();
    }
    
    public function edit() {
        $obj = new matricula_cca();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $data['nomalumno'] = $this->Select(array('id'=>'idalumno','name'=>'nombres','table'=>'vista_alumno_cca','code'=>$obj->idalumno));
        $data['comision'] = $this->Select(array('id'=>'idcomision','name'=>'idcomision','table'=>'comision_cca','code'=>$obj->idcomision,'date'=>date("Y-m-d")));
        $view->setData($data);
        $view->setTemplate( '../view/matricula_cca/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function save(){
        $obj = new matricula_cca();
        if ($_POST['idmatricula']=='') {
            $p = $obj->insert($_POST);
            if ($p[0]){
                header('Location: index.php?controller=matricula_cca');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] ='index.php?controller=matricula_cca';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        } else {
            $p = $obj->update($_POST);
            if ($p[0]){
                header('Location: index.php?controller=matricula_cca');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] = 'index.php?controller=matricula_cca';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        }
    }
    public function delete(){
        $obj = new matricula_cca();
        $p = $obj->delete($_GET['id']);
        if ($p[0]){
            header('Location: index.php?controller=matricula_cca');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] =  'index.php?controller=matricula_cca';
        $view->setData($data);
        $view->setTemplate( '../view/_Error_App.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
        }
    }
    public function create() {
        $data = array();
        $view = new View();
        $data['nomalumno'] = $this->Select(array('id'=>'idalumno','name'=>'idalumno','table'=>'vista_alumno_cca','code'=>$obj->idalumno));
        $data['asignatura'] = $this->Curso(array('table'=>'asignatura_cca','date'=>date("Y-m-d")));
        $data['comision'] = $this->Select(array('id'=>'idcomision','name'=>'idcomision','table'=>'comision_cca','code'=>$obj->idcomision,'date'=>date("Y-m-d"),'readonly'=>'readonly'));
        $view->setData($data);
        $view->setTemplate( '../view/matricula_cca/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }      
}
?>