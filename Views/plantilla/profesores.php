
<?php 
include "header.php";
?>

          <!-- Page Heading -->




                                      <div class="card">
                                    <div class="card-header">
                                        <center>
                                        <strong>Registro y listado De Docentes</strong>
                                    </center>

                                          
                        
                    
                        <button class="btn btn-info float-right" data-toggle="modal" data-target="#exampleModal">
                        <span class="fa fa-plus"></span>
                Agregar nuevo 
				
			</button>


                                    </div>
                                    <div class="card-body card-block">
                                   


                                   
          <table id="example" class="table table-striped dt-responsive" style="width:100%"> 
          <thead>
          <tr>
          
          <th>
          id
          </th>

          
          <th>Primer Nombre</th>
				<th>Segundo Nombre</th>
				<th>Primer Apellido</th>
				<th>Segundo Apellido</th>
				<th>Cedula</th>
				<th>Fecha Nacimiento</th>
				<th>Edad</th>
				<th>Telefono</th>
				<th>Direccion</th>
				<th>Codigo Docente</th>
				<th>Celular</th>
				<th>Correo</th>
        <th>Accion</th>
          
          </tr>

          </thead>
          <tbody>
      

         <?php
$mbd=new PDO( 'mysql:host=localhost:3308;dbname=tesis', 'root', '');

if(isset($_POST['pn']) && isset($_POST['sn'])){
 
$sentencia=$mbd->prepare("insert into docente(p_nombre,s_nombre,p_apellido,s_apellido,cedula,f_nacimiento,edad,telefono,direccion,cod_docente,celular,correo) values (:pn,:sn,:pa,:sa,:cedula,:fecha,:edad,:celular,:tel,:direccion,:cod,:cor)");
$sentencia->bindParam(':pn',$_POST['pn'], PDO::PARAM_STR);
$sentencia->bindParam(':sn',$_POST['sn'], PDO::PARAM_STR);
$sentencia->bindParam(':pa',$_POST['pa'], PDO::PARAM_STR);
$sentencia->bindParam(':sa',$_POST['sa'], PDO::PARAM_STR);
$sentencia->bindParam(':cedula',$_POST['cedula'], PDO::PARAM_STR);
$sentencia->bindParam(':fecha',$_POST['fecha'], PDO::PARAM_STR);
$sentencia->bindParam(':edad',$_POST['edad'], PDO::PARAM_STR);
$sentencia->bindParam(':celular',$_POST['celular'], PDO::PARAM_STR);
$sentencia->bindParam(':tel',$_POST['tel'], PDO::PARAM_STR);
$sentencia->bindParam(':direccion',$_POST['direccion'], PDO::PARAM_STR);
$sentencia->bindParam(':cod',$_POST['cod'], PDO::PARAM_STR);
$sentencia->bindParam(':cor',$_POST['cor'], PDO::PARAM_STR);
$sentencia->execute();
}
$resultado=$mbd->query('select *from docente');
$tabla=$resultado->fetchAll();

for($i=0;$i<count($tabla);$i++){

  echo '<tr> 
  <td>'.$tabla[$i]['id_docente'].' </td> 
  <td> '.$tabla[$i]['p_nombre'].' </td> 
  <td> '.$tabla[$i]['s_nombre'].'  </td> 
  <td> '.$tabla[$i]['p_apellido'].' </td> 
  <td> '.$tabla[$i]['s_apellido'].' </td> 
  <td> '.$tabla[$i]['cedula'].' </td> 
  <td> '.$tabla[$i]['f_nacimiento'].' </td> 
  <td> '.$tabla[$i]['edad'].' </td> 
  <td> '.$tabla[$i]['telefono'].' </td> 
  <td> '.$tabla[$i]['direccion'].' </td> 
  <td> '.$tabla[$i]['cod_docente'].' </td> 
  <td>'.$tabla[$i]['celular'].'  </td> 
  <td> '.$tabla[$i]['correo'].' </td> 
  
  <td> <a data-toggle="modal"  data-target="#modalEdicion" href="#" class="btn btn-info btn-circle">
  <i class="fas fa-info-circle"></i>
</a> 

<form method="POST">

<input type="hidden" value="'.$tabla[$i]['id_docente'].'">


<button type="SUBMIT" name="eliminar" class="btn btn-danger btn-circle"  
          onclick="preguntarSiNo('.$tabla[$i]['id_docente'].')">
          <i class="fas fa-trash"></i>
					</button>

</form>

</td>
  
  
  </tr>';


}
/*var_dump($tabla);
*/
          ?>

          
          
          </tbody>


        
          
          
          </table>











                                    </div>


                                    




                                    <div class="card-footer">
                                        

                                    </div>
                                </div>



                                <?php
    
    if(isset($_POST['eliminar'])){
    ///////////// Informacion enviada por el formulario /////////////
    
    
    ///////// Fin informacion enviada por el formulario /// 
    
    ////////////// Actualizar la tabla /////////
    $consulta = "DELETE FROM `docente` WHERE `id_docente`=:id";
    $sql = $connect-> prepare($consulta);
    $sql -> bindParam(':id', $id, PDO::PARAM_INT);
    $id=trim($_POST['id']);
    
    
    $sql->execute();
    
    if($sql->rowCount() > 0)
    {
    $count = $sql -> rowCount();
    echo "<div class='content alert alert-primary' > 
    
    Gracias: $count registro ha sido eliminado  </div>";
    }
    else{
        echo "<div class='content alert alert-danger'> No se pudo eliminar el registro  </div>";
    
    print_r($sql->errorInfo()); 
    }
    }// Cierra envio de guardado
    ?>

      <!-- 
        Modal Insertar Datos-->


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form method="POST">
        <div class="form-group">
      <label>Primer Nombre</label>
    <input type="text" id="pn" name="pn" placeholder="1er Nombre del Docente" class="form-control">
    </div>

    <div class="form-group">
     <label for="sn">Segundo Nombre</label>
    <input  id="sn" name="sn" placeholder="2do Nombre del Docente" class="form-control">
    </div>          

    <div class="form-group">                                                            
   <label>Primer Apellido</label>
   <input  id="pa" name="pa" placeholder="1er Apellido del Docente" class="form-control">
   </div>          

   <div class="form-group">                                                          
 <label >Segundo Apellido</label>
 <input  id="sa" name="sa" placeholder="2do Apellido del Docente" class="form-control">
 </div>

 <div class="form-group">
 <label >Cedula</label>
 <input  id="cedula" name="cedula" placeholder="Cedula del Docente" class="form-control">
 </div>


 <div class="form-group">                                                                 
 <label>Fecha de Nacimiento</label>
<input id="fecha" name="fecha" type="date" placeholder="dd-mm-aaaa" class="form-control">
</div>

<div class="form-group">                                                                              
<label >Edad</label>
<input  id="edad" name="edad" placeholder="Edad del Docente" class="form-control">
</div>

<div class="form-group">                                                                                                      
<label >Celular</label>
<input  id="celular" name="celular" placeholder="Movil del Docente" class="form-control">
</div>                                                        

<div class="form-group">                                                                                                           
<label>Telefono </label>
<input  id="tel" name="tel" placeholder="Telefono del Docente" class="form-control">
</div>

<div class="form-group">                                                                                                             
 <label>Direccion </label>
<input  id="direccion" name="direccion" placeholder="Dirección del Docente" class="form-control">
</div>

<div class="form-group">                                                                                                                    
 <label>Codigo Docente </label>
<input  id="cod" name="cod" placeholder="Dirección del Docente" class="form-control">
</div>

<div class="form-group">
<label>Correo </label>
<input  id="cor" name="cor" placeholder="Correo Electronico del docente" class="form-control">
</div>

          
            <button type="submit" class="btn-primary">Guardar</button>
          </form>









      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"><span class="fa fa-plus"></span> Agregar</button>
      </div>
    </div>
  </div>
</div>




<!-- Modal para edicion de datos -->


<div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form method="POST">
        <div class="form-group">

        <input type="text" hidden="" id="idprof" name="">

      <label>Primer Nombre</label>
    <input type="text" id="pn" name="pn" placeholder="1er Nombre del Docente" class="form-control">
    </div>

    <div class="form-group">
     <label for="sn">Segundo Nombre</label>
    <input  id="sn" name="sn" placeholder="2do Nombre del Docente" class="form-control">
    </div>          

    <div class="form-group">                                                            
   <label>Primer Apellido</label>
   <input  id="pa" name="pa" placeholder="1er Apellido del Docente" class="form-control">
   </div>          

   <div class="form-group">                                                          
 <label >Segundo Apellido</label>
 <input  id="sa" name="sa" placeholder="2do Apellido del Docente" class="form-control">
 </div>

 <div class="form-group">
 <label >Cedula</label>
 <input  id="cedula" name="cedula" placeholder="Cedula del Docente" class="form-control">
 </div>


 <div class="form-group">                                                                 
 <label>Fecha de Nacimiento</label>
<input id="fecha" name="fecha" type="date" placeholder="dd-mm-aaaa" class="form-control">
</div>

<div class="form-group">                                                                              
<label >Edad</label>
<input  id="edad" name="edad" placeholder="Edad del Docente" class="form-control">
</div>

<div class="form-group">                                                                                                      
<label >Celular</label>
<input  id="celular" name="celular" placeholder="Movil del Docente" class="form-control">
</div>                                                        

<div class="form-group">                                                                                                           
<label>Telefono </label>
<input  id="tel" name="tel" placeholder="Telefono del Docente" class="form-control">
</div>

<div class="form-group">                                                                                                             
 <label>Direccion </label>
<input  id="direccion" name="direccion" placeholder="Dirección del Docente" class="form-control">
</div>

<div class="form-group">                                                                                                                    
 <label>Codigo Docente </label>
<input  id="cod" name="cod" placeholder="Dirección del Docente" class="form-control">
</div>

<div class="form-group">
<label>Correo </label>
<input  id="cor" name="cor" placeholder="Correo Electronico del docente" class="form-control">
</div>

          
            <button type="submit" class="btn-primary">Guardar</button>
          </form>









      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-warning"><span class="fa fa-plus"></span> Actualizar</button>
      </div>
    </div>
  </div>
</div>













          <h1 class="h3 mb-4 text-gray-800">Pagina de Profesores</h1>

         

          <br>

        


       





          

     
<?php 
include "footer.php";
?>


 


<script type="text/javascript">
$(document).ready(function(){
      
      // $('#buscador').load('componentesprofesores/buscador.php');
 
      $('#example').DataTable();
  
 
     
 
 
 
 
 });

 function preguntarSiNo(id){
	alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
					function(){ eliminarDatos(id) }
                , function(){ alertify.error('Se cancelo')});
}


 </script>
