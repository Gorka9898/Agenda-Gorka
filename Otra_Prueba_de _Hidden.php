<!DOCTYPE html>
<html>
<body>
<form method="post">
    Nombre: <input type="text" name="nombre"><br>
    Email: <input type="text" name="email"><br>
    <input type="submit" value="Enviar">
</form>


<?php 




class Agenda{



    function añadirDatos(){


    }








}



?>


//-----------------------------------------------------------------------------------------------------------------------------
<?php 

$nombre=[];
$email=[];
$Agenda1= new Agenda();

if (isset($_COOKIE['nombre']) && isset($_COOKIE['email'])) {
    $nombre = explode(",", $_POST['nombre']);
    $email = explode(",", $_POST['email']);

    for ($i = 0; $i < count($nombre); $i++) {
        $Agenda1->AñadirDatos($nombre[$i], $email[$i]);
    }
}


if (isset($_POST['nombre']) && isset($_POST['email'])) {

    


}

echo $Agenda->VerDatos();

?>




</body>
</html>