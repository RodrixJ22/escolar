<?php

class userModel extends Model{


    function __contruct()
    {
        parent::__contruct();



    }


    public function obteneruser(){
        return $this->_db->query("select * from usuario")->fetchAll();
    }

    public function insertaruser($nusuario,$clave,$priv){
        $this->_db->prepare('insert into usuario(nombre_usuario,password,Privilegio)
        values(:nusuario,:clave,:priv)')->execute(array('nusuario'=>$nusuario, 'clave'=>$clave, 'priv'=>$priv ));
    }


    public function actualizaruser($id,$nusuario,$clave,$priv){
        return $this->_db->prepare("update usuario set nombre_usuario=:nusuario,password=:clave,Privilegio=:priv where id_usuario=:id")->execute(array(
                            'nusuario'=>$nusuario,'clave'=>$clave,'priv'=>$priv,'id'=>$id));
    }

    public function borraruser($id_usuario){
        $this->_db->prepare('delete from usuario where id_usuario=:id_usuario')->execute(array('id_usuario'=>$id_usuario));
    }


}


