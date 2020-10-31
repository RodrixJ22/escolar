<?php

class materiaModel extends Model{


    function __contruct()
    {
        parent::__contruct();



    }


    public function obtenermaterias(){
        return $this->_db->query("select * from materia,grupos where grupos_id_grupo=id_grupo")->fetchAll();
    }

    public function obtenergrup(){
        return $this->_db->query("select * from grupos")->fetchAll();
    }
    

    public function agregarmat($nm,$gru){
         $this->_db->prepare('insert into materia(nombre_materia,grupos_id_grupo)
         values(:nm,:gru)')->execute
         (array('nm'=>$nm, 'gru'=>$gru));
     }


     public function actualizarmat($idm,$nmu,$grupu){
         return $this->_db->prepare("update materia set nombre_materia=:nmu,grupos_id_grupo=:grupu where id_materia=:idm")->execute(array(
            'nmu'=>$nmu, 'grupu'=>$grupu, 'idm'=>$idm));
     }

     public function borrarmat($id_m){
         $this->_db->prepare('delete from materia where id_materia=:id_m')->execute(array('id_m'=>$id_m));
     }

    


}

