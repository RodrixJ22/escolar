<?php


class materiaController extends Controller{
    private $_mat;

function __construct()
{
    parent::__construct();
    $this->_mat=$this->loadModel("materia");
}

public function vermateria(){

    $fila=$this->_mat->obtenermaterias();
    $tabla='';
    for($i=0;$i<count($fila);$i++){
        $datos=json_encode($fila[$i]);
        $tabla.='
        <tr>
        <td>'.$fila[$i]['id_materia'].'</td>
        <td>'.$fila[$i]['nombre_materia'].'</td>
        <td>'.$fila[$i]['grupos_id_grupo'].'</td>
        
        
        <td>
        <button data-m=\''.$datos.'\' data-toggle="modal" data-target="#editarMateria" class="btn btn-info btn-circle btEditarM">
          <i class="fas fa-info-circle"> </i>
          </button>


 

 <button data-g='.$fila[$i]['id_materia'].' class="btn btn-danger btn-circle btBorrarG">
 <i class="fas fa-trash"> </i>
 </button>




    
   



        </td>

        


        </tr>';

    }

return $tabla;

    
}





public function index()
{
$this->_view->tabla=$this->vermateria();

$this->_view->renderizar('materia');

}

public function insertarmat(){
    $this->_mat->agregarmat($this->getTexto('nm'),$this->getTexto('gru'));
    echo $this->vermateria();
}

public function editarm(){
    $this->_mat->actualizarmat($this->getTexto('idm'),$this->getTexto('nmu'),$this->getTexto('grupu'));
    echo $this->vermateria();
}



}




?>