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

    function posts(){
    $nombre =$_POST["nombre"];
    $email = $_POST["email"];

    $nombre= strtolower($nombre);

    }

    
    







}


?>


//-----------------------------------------------------------------------------------------------------------------------------
<?php 



echo "<table>";
echo "<tr>";
echo "<td>". isset($nombre)."</td>";
echo"</tr>";
echo "</table>";


?>




</body>
</html>