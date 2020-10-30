<?php

class gruposModel extends Model{


    function __contruct()
    {
        parent::__contruct();



    }


    public function obtenergrupos(){
        return $this->_db->query("select * from grupos,docente where docente_id_docente=id_docente")->fetchAll();
    }

    

    public function agregaralum($pna,$sna,$paa,$saa,$fechaa,$edada,$sexoa,$esta,$tela,$coda,$dep,$mun,$direa,$tut){
         $this->_db->prepare('insert into alumnos(p_nombre,s_nombre,p_apellido,s_apellido,f_nacimiento,edad,sexo,estado_matricula,
         cod_alum,telefono_contac,direccion,departamento,municipio,nombre_tutor)
         values(:pna,:sna,:paa,:saa,:fechaa,:edada,:sexoa,:esta,:coda,:tela,:direa,:dep,:mun,:tut)')->execute
         (array('pna'=>$pna, 'sna'=>$sna, 'paa'=>$paa, 'saa'=>$saa, 'fechaa'=>$fechaa, 'edada'=>$edada, 
         'sexoa'=>$sexoa, 'esta'=>$esta, 'coda'=>$coda, 'tela'=>$tela, 'direa'=>$direa, 'dep'=>$dep, 'mun'=>$mun , 'tut'=>$tut ));
     }


     public function actualizaralum($ida,$pna,$sna,$paa,$saa,$feca,$eda,$sex,$estad,$coda,$tela,$dira,$depa,$muna,$tuta){
         return $this->_db->prepare("update alumnos set p_nombre=:pna,s_nombre=:sna,p_apellido=:paa,
         s_apellido=:saa,f_nacimiento=:feca,edad=:eda,sexo=:sex,estado_matricula=:estad,
         cod_alum=:coda,telefono_contac=:tela,direccion=:dira,departamento=:depa,municipio=:muna,nombre_tutor=:tuta
          where id_alumno=:ida")->execute(array(
            'pna'=>$pna, 'sna'=>$sna, 'paa'=>$paa, 'saa'=>$saa, 'feca'=>$feca, 'eda'=>$eda, 
            'sex'=>$sex, 'estad'=>$estad, 'coda'=>$coda, 'tela'=>$tela, 'dira'=>$dira, 'depa'=>$depa 
            , 'muna'=>$muna, 'tuta'=>$tuta , 'ida'=>$ida));
     }

     public function borraralum($id_a){
         $this->_db->prepare('delete from alumnos where id_alumno=:id_a')->execute(array('id_a'=>$id_a));
     }

    


}

