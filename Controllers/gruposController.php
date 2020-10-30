<?php


class gruposController extends Controller{
    private $_grup;

function __construct()
{
    parent::__construct();
    $this->_grup=$this->loadModel("grupos");
}


public function vergrupos(){

    $fila=$this->_grup->obtenergrupos();
    $tabla='';
    for($i=0;$i<count($fila);$i++){
        $datos=json_encode($fila[$i]);
        $tabla.='
        <tr>
        <td>'.$fila[$i]['id_grupo'].'</td>
        <td>'.$fila[$i]['axo'].'</td>
        <td>'.$fila[$i]['seccion'].'</td>
        <td>'.$fila[$i]['turno'].'</td>
        <td>'.$fila[$i]['modalidad'].'</td>
        <td>'.$fila[$i]['docente_id_docente'].'</td>
        
        <td>
        <button data-a=\''.$datos.'\' data-toggle="modal" data-target="#editarA" class="btn btn-info btn-circle btEditarA">
          <i class="fas fa-info-circle"> </i>
          </button>


 

 <button data-a='.$fila[$i]['id_grupo'].' class="btn btn-danger btn-circle btBorrarA">
 <i class="fas fa-trash"> </i>
 </button>




    
   



        </td>

        


        </tr>';

    }

return $tabla;

    
}





public function index()
{

$this->_view->tabla=$this->vergrupos();

$this->_view->renderizar('grupos');

}





}




?>