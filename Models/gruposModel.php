<?php

class gruposModel extends Model{


    function __contruct()
    {
        parent::__contruct();



    }


    public function obtenergrupos(){
        return $this->_db->query("select * from grupos,docente where docente_id_docente=id_docente")->fetchAll();
    }

    

    public function agregargrup($axo,$sec,$tur,$mod,$prof){
         $this->_db->prepare('insert into grupos(axo,seccion,turno,modalidad,docente_id_docente)
         values(:axo,:sec,:tur,:mod,:prof)')->execute
         (array('axo'=>$axo, 'sec'=>$sec, 'tur'=>$tur, 'mod'=>$mod, 'prof'=>$prof ));
     }


     public function actualizargrup($idg,$axou,$secu,$turu,$modu,$profu){
         return $this->_db->prepare("update grupos set axo=:axou,seccion=:secu,turno=:turu,
         modalidad=:modu,docente_id_docente=:profu where id_grupo=:idg")->execute(array(
            'axou'=>$axou, 'secu'=>$secu, 'turu'=>$turu, 'modu'=>$modu, 'profu'=>$profu, 'idg'=>$idg));
     }

     public function borrargrup($id_g){
         $this->_db->prepare('delete from grupos where id_grupo=:id_g')->execute(array('id_g'=>$id_g));
     }

    


}

