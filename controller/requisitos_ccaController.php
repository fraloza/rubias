<?php

require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/requisitos_cca.php';

class requisitos_ccaController extends Controller {

    public function index() {
        $cod=$_REQUEST['id'];
        if (!isset($_GET['p'])) {$_GET['p'] = 1;}
        if (!isset($_GET['q'])) {$_GET['q'] = "";}
        if (!isset($_GET['criterio'])) {$_GET['criterio'] = "requisitos_cca.descripcion";}
        $obj = new requisitos_cca();
        $data = array();
        $data['data'] = $obj->index($_GET['q'], $_GET['p'], $_GET['criterio']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows' => $data['data']['rowspag'], 'url' => 'index.php?controller=requisitos_cca&action=index', 'query' => $_GET['q']));
        $cols = array("Id","Requisito", "Comision");
        $opt = array("requisitos_cca.descripcion" => "Requisitos");
        $data['grilla'] = $this->grilla_detcom_cca("requisitos_cca", $cod, $cols, $data['data']['rows'], $opt, $data['pag'], false, true);
        
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/requisitos_cca/_Index.php');
        $view->setLayout('../template/Layout.php');
        $view->render();
    }

   public function edit() {
       $obj = new requisitos_cca();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        //$data['comision'] = $this->Select(array('id' => 'idcomision', 'name' => 'idcomision', 'table' => 'comision_cca', 'code' => $obj->idcomision));
        $view->setData($data);
        $view->setTemplate('../view/requisitos_cca/_Form.php');
        $view->setLayout('../template/Layout.php');
        $view->render();
    }

    public function save() {
        $obj = new requisitos_cca();
        if ($_POST['idrequisito'] == '') {
            $p = $obj->insert($_POST);
            if ($p[0]) {
                header('Location:index.php?controller=comision_cca');
            } else {
                $data = array();
                $view = new View();
                $data['msg'] = $p[1];
                $data['url'] = 'index.php?controller=comision_cca';
                $view->setData($data);
                $view->setTemplate('../view/_Error_App.php');
                $view->setLayout('../template/Layout.php');
                $view->render();
            }
        } else {
            $p = $obj->update($_POST);
            if ($p[0]) {
                header('Location: index.php?controller=comision_cca');
            } else {
                $data = array();
                $view = new View();
                $data['msg'] = $p[1];
                $data['url'] = 'index.php?controller=comision_cca';
                $view->setData($data);
                $view->setTemplate('../view/_Error_App.php');
                $view->setLayout('../template/Layout.php');
                $view->render();
            }
        }
    }

    public function delete() {
        $obj = new requisitos_cca();
        $p = $obj->delete($_GET['id']);
        if ($p[0]) {
            header('Location:index.php?controller=comision_cca');
        } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] = 'index.php?controller=comision_cca';
            $view->setData($data);
            $view->setTemplate('../view/_Error_App.php');
            $view->setLayout('../template/Layout.php');
            $view->render();
        }
    }

    public function create() {
        $data = array();
        $view = new View();
        
        //$data['comision'] = $this->Select(array('id' => 'idcomision', 'name' => 'idcomision', 'table' => 'comision_cca', 'code' => $obj->idcomision));
        //$data['descripcion'] = $this->Select(array('id' => 'idrequisito', 'name' => 'idrequisito', 'table' => 'requisitos_cca', 'code' => $obj->idrequisito));
        $view->setData($data);
        $view->setTemplate('../view/requisitos_cca/_Form.php');
        $view->setLayout('../template/Layout.php');
        $view->render();
    }

}
?>