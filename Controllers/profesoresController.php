<?php


class profesoresController extends Controller{
 
    private $_profe;

function __construct()
{
    parent::__construct();
    $this->_profe=$this->loadModel("profesores");
}

public function verprofesores(){

    $fila=$this->_profe->obtenerprofesores();
    $tabla='';
    for($i=0;$i<count($fila);$i++){
        $datos=json_encode($fila[$i]);
        $tabla.='
        <tr>
        <td>'.$fila[$i]['id_docente'].'</td>
        <td>'.$fila[$i]['p_nombre'].'</td>
        <td>'.$fila[$i]['s_nombre'].'</td>
        <td>'.$fila[$i]['p_apellido'].'</td>
        <td>'.$fila[$i]['s_apellido'].'</td>
        <td>'.$fila[$i]['cedula'].'</td>
        <td>'.$fila[$i]['f_nacimiento'].'</td>
        <td>'.$fila[$i]['edad'].'</td>
        <td>'.$fila[$i]['telefono'].'</td>
        <td>'.$fila[$i]['direccion'].'</td>
        <td>'.$fila[$i]['cod_docente'].'</td>
        <td>'.$fila[$i]['celular'].'</td>
        <td>'.$fila[$i]['correo'].'</td>

        <td>
        <button data-pr=\''.$datos.'\' data-toggle="modal" data-target="#editarprof" class="btn btn-info btn-circle btEditarP">
          <i class="fas fa-info-circle"> </i>
          </button>



 <button data-p='.$fila[$i]['id_docente'].' class="btn btn-danger btn-circle btBorrarP">
 <i class="fas fa-trash"> </i>
 </button>

        </td>

        


        </tr>';

    }

    return $tabla;

    
}



public function index()
{


$this->_view->tabla=$this->verprofesores();

$this->_view->renderizar('profesores');


}


public function insertarprof(){
    $this->_profe->agregarprof($this->getTexto('pn'),$this->getTexto('sn'),$this->getTexto('pa'),$this->getTexto('sa')
    ,$this->getTexto('ced'),$this->getTexto('fec'),$this->getTexto('eda'),$this->getTexto('cel')
    ,$this->getTexto('tel'),$this->getTexto('dir'),$this->getTexto('cod'),$this->getTexto('cor'));
    echo $this->verprofesores();
}


public function editarp(){
    $this->_profe->actualizarprof($this->getTexto('idp'),$this->getTexto('p_n'),$this->getTexto('s_n'),$this->getTexto('p_ap')
    ,$this->getTexto('s_ap'),$this->getTexto('ced'),$this->getTexto('fec'),$this->getTexto('eda'),$this->getTexto('cel')
    ,$this->getTexto('tel'),$this->getTexto('dir'),$this->getTexto('cod'),$this->getTexto('cor'));
    echo $this->verprofesores();
}



public function borrarp(){
    $this->_profe->borrarprof($this->getTexto('id_p'));
    echo $this->verprofesores();
}





}




?>