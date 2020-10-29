<?php


class userController extends Controller{
 
    private $_user;

function __construct()
{
    parent::__construct();
    $this->_user=$this->loadModel("user");
}


public function veruser(){

    $fila=$this->_user->obteneruser();
    $tabla='';
    for($i=0;$i<count($fila);$i++){
        $datos=json_encode($fila[$i]);
        $tabla.='
        <tr>
        <td>'.$fila[$i]['id_usuario'].'</td>
        <td>'.$fila[$i]['nombre_usuario'].'</td>
        <td>'.$fila[$i]['password'].'</td>
        <td>'.$fila[$i]['Privilegio'].'</td>
        <td>
        <button data-p=\''.$datos.'\' data-toggle="modal" data-target="#editarusuario" class="btn btn-info btn-circle btEditar">
          <i class="fas fa-info-circle"> </i>
          </button>


 

 <button data-b='.$fila[$i]['id_usuario'].' class="btn btn-danger btn-circle btBorrar">
 <i class="fas fa-trash"> </i>
 </button>




    
   



        </td>

        


        </tr>';

    }

return $tabla;

    
}


public function index()
{


    if($this->getTexto('addu')==1)
    {


    $this->_user->insertaruser($this->getTexto('nusuario'),
    $this->getTexto('clave'),
    $this->getTexto('priv'));
    }


   
    $this->_view->tabla=$this->veruser();


    $this->_view->renderizar('user');

}

public function editaru(){
    $this->_user->actualizaruser($this->getTexto('id_usuario'),$this->getTexto('nombre'),$this->getTexto('clave'),$this->getTexto('privilegio'));
    echo $this->veruser();
}


public function borrar(){
    $this->_user->borraruser($this->getTexto('id_usuario'));
    echo $this->veruser();
}




}




?>