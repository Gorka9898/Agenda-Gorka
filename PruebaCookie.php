<!DOCTYPE html>
<html>
<body>
<form method="post">
    Nombre: <input type="text" name="nombre"><br>
    Email: <input type="email" name="email"><br>
    <input type="submit" value="Enviar">
</form>


<?php 

$nombre=[];
$email=[];
$Agenda = new Agenda();

class Agenda{



    function posts(){
        
        if (isset($_POST['nombre'])) { 
            $nombre=$_POST['nombre'];

        }
   if (isset($_POST['email'])) {

        $email=$_POST['email'];
       
    }
    setcookie("nombre",$nombre , time() + 3600 );
    setcookie("email",$email , time() + 3600 );
    json_encode($nombre);
    json_encode($email);

    if (isset($_COOKIE['nombre'])) { 
        echo " la cookie de nombre existe ";
        echo $_COOKIE["nombre"];

    }
    if (isset($_COOKIE['email'])) { 
        echo " la cookie de email existe ";
        echo $_COOKIE["email"];

    }



    }

function crearAgenda(){

            
    echo "<table border= '1px solid black' padding= '2px' >";
    echo "<tr>";



    echo "<td>"."Nombre: ". $_POST['nombre']."</td>";
    echo "<td>"."Email: ".$_POST['email']."</td>";

    
    echo"</tr>";
    echo "</table>";

}


function advertencia(){

}


}




?>


//-----------------------------------------------------------------------------------------------------------------------------
<?php 







$Agenda->posts(1);

$Agenda->crearAgenda();

?>




</body>
</html>