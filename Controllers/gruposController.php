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
        <td>'. $fila[$i]['p_nombre'] . ' '. $fila[$i]['p_apellido'] . '</td>
        
        <td>
        <button data-g=\''.$datos.'\' data-toggle="modal" data-target="#editarGrupo" class="btn btn-info btn-circle btEditarG">
          <i class="fas fa-info-circle"> </i>
          </button>


 

 <button data-g='.$fila[$i]['id_grupo'].' class="btn btn-danger btn-circle btBorrarG">
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



$fila=$this->_grup->obtenerprofesores();
$datos='<option value="0">Seleccione Profesor</option>';

for($i=0;$i<count($fila);$i++)
$datos.='<option value="'.$fila[$i]['id_docente'].'">'.$fila[$i]['p_nombre'] .' '. $fila[$i]['p_apellido'] .'</option>';

$this->_view->docentes=$datos;
$this->_view->renderizar('grupos');


}









public function insertargrup(){
    $this->_grup->agregargrup($this->getTexto('axo'),$this->getTexto('sec'),$this->getTexto('tur'),$this->getTexto('mod')
    ,$this->getTexto('prof'));
    echo $this->vergrupos();
}


public function editarg(){
    $this->_grup->actualizargrup($this->getTexto('idg'),$this->getTexto('axou'),$this->getTexto('secu'),$this->getTexto('turu')
    ,$this->getTexto('modu'),$this->getTexto('profu'));
    echo $this->vergrupos();
}

public function borrarg(){
    $this->_grup->borrargrup($this->getTexto('id_g'));
    echo $this->vergrupos();
}


}




?>