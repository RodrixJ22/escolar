<?php

class profesoresModel extends Model{


    function __contruct()
    {
        parent::__contruct();



    }


    public function obtenerprofesores(){
        return $this->_db->query("select * from docente")->fetchAll();
    }

    

    public function agregarprof($pn,$sn,$pa,$sa,$ced,$fec,$eda,$cel,$tel,$dir,$cod,$cor){
         $this->_db->prepare('insert into docente(p_nombre,s_nombre,p_apellido,s_apellido,cedula,f_nacimiento,edad,telefono,direccion,cod_docente,celular,correo)
         values(:pn,:sn,:pa,:sa,:ced,:fec,:eda,:tel,:dir,:cod,:cel,:cor)')->execute
         (array('pn'=>$pn, 'sn'=>$sn, 'pa'=>$pa, 'sa'=>$sa, 'ced'=>$ced, 'fec'=>$fec, 
         'eda'=>$eda, 'tel'=>$tel, 'dir'=>$dir, 'cod'=>$cod, 'cel'=>$cel, 'cor'=>$cor ));
     }


     public function actualizarprof($idp,$p_n,$s_n,$p_ap,$s_ap,$ced,$fec,$eda,$cel,$tel,$dir,$cod,$cor){
         return $this->_db->prepare("update docente set p_nombre=:p_n,s_nombre=:s_n,p_apellido=:p_ap,
         s_apellido=:s_ap,cedula=:ced,f_nacimiento=:fec,edad=:eda,telefono=:tel,direccion=:dir,
         cod_docente=:cod,celular=:cel,correo=:cor where id_docente=:idp")->execute(array(
            'p_n'=>$p_n, 's_n'=>$s_n, 'p_ap'=>$p_ap, 's_ap'=>$s_ap, 'ced'=>$ced, 'fec'=>$fec, 
            'eda'=>$eda, 'tel'=>$tel, 'dir'=>$dir, 'cod'=>$cod, 'cel'=>$cel, 'cor'=>$cor,'idp'=>$idp));
     }

     public function borrarprof($id_p){
         $this->_db->prepare('delete from docente where id_docente=:id_p')->execute(array('id_p'=>$id_p));
     }

    


}


