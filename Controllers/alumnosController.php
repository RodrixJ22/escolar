<?php


class alumnosController extends Controller{
    private $_alum;

function __construct()
{
    parent::__construct();
    $this->_alum=$this->loadModel("alumnos");
}

public function veralumnos(){

    $fila=$this->_alum->obteneralumnos();
    $tabla='';
    for($i=0;$i<count($fila);$i++){
        $datos=json_encode($fila[$i]);
        $tabla.='
        <tr>
        <td>'.$fila[$i]['id_alumno'].'</td>
        <td>'.$fila[$i]['p_nombre'].'</td>
        <td>'.$fila[$i]['s_nombre'].'</td>
        <td>'.$fila[$i]['p_apellido'].'</td>
        <td>'.$fila[$i]['s_apellido'].'</td>
        <td>'.$fila[$i]['f_nacimiento'].'</td>
        <td>'.$fila[$i]['edad'].'</td>
        <td>'.$fila[$i]['sexo'].'</td>
        <td>'.$fila[$i]['estado_matricula'].'</td>
        <td>'.$fila[$i]['cod_alum'].'</td>
        <td>'.$fila[$i]['telefono_contac'].'</td>
        <td>'.$fila[$i]['direccion'].'</td>
        <td>'.$fila[$i]['departamento'].'</td>
        <td>'.$fila[$i]['municipio'].'</td>
        <td>'.$fila[$i]['nombre_tutor'].'</td>
        
        <td>
        <button data-a=\''.$datos.'\' data-toggle="modal" data-target="#editarA" class="btn btn-info btn-circle btEditarA">
          <i class="fas fa-info-circle"> </i>
          </button>


 

 <button data-a='.$fila[$i]['id_alumno'].' class="btn btn-danger btn-circle btBorrarA">
 <i class="fas fa-trash"> </i>
 </button>




    
   



        </td>

        


        </tr>';

    }

return $tabla;

    
}



public function index()
{

$this->_view->tabla=$this->veralumnos();

$this->_view->renderizar('alumnos');

}


public function insertaralum(){
    $this->_alum->agregaralum($this->getTexto('pna'),$this->getTexto('sna'),$this->getTexto('paa'),$this->getTexto('saa')
    ,$this->getTexto('fechaa'),$this->getTexto('edada'),$this->getTexto('sexoa'),$this->getTexto('esta')
    ,$this->getTexto('tela'),$this->getTexto('coda'),$this->getTexto('dep'),$this->getTexto('mun'),$this->getTexto('direa')
    ,$this->getTexto('tut'));
    echo $this->veralumnos();
}

public function editara(){
    $this->_alum->actualizaralum($this->getTexto('ida'),$this->getTexto('pna'),$this->getTexto('sna'),$this->getTexto('paa')
    ,$this->getTexto('saa'),$this->getTexto('feca'),$this->getTexto('eda'),$this->getTexto('sex'),$this->getTexto('estad')
    ,$this->getTexto('coda'),$this->getTexto('tela'),$this->getTexto('dira'),$this->getTexto('depa'),$this->getTexto('muna'),$this->getTexto('tuta'));
    echo $this->veralumnos();
}

public function borrara(){
    $this->_alum->borraralum($this->getTexto('id_a'));
    echo $this->veralumnos();
}



}




?>