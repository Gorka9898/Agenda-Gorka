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


    function __construct($nombre, $email)
    {
        $contcookies=0;
        $this->contcookies=$contcookies;
        $this->nombre=$nombre;
        $this->email=$email;

    }

    function posts(){

        $nombres=array();
        $emails=array();
        
        

    if (isset($_POST["nombre"])) {
        $this->nombre=$_POST["nombre"];
        $nombres=array_push($this->nombre);
        setcookie("$this->contcookies", $this->nombre, time() + 36000); //guardamos la cookie del nombre
        $this->contcookies++;
    }else {
        echo "El nombre esta vacio";
    }
    if (isset($_POST["email"])) {
        $this->email=$_POST["email"];
        $emails=array_push($this->email);
        setcookie("$this->contcookies", $this->email, time() + 36000); //guardamos la cookie del email
        $this->contcookies++;
        
    }

    $this->nombre= strtolower($this->nombre);
    $this->email = strtolower($this->email);


    }

    function quitar_tildes($cadena) {
        $no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹");
        $permitidas= array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");
        $texto = str_replace($no_permitidas, $permitidas ,$cadena);
        return $texto;


                }




function crearAgenda(){

            
    echo "<table border= '1px solid black' padding= '2px' >";
    echo "<tr>";
    for ($i=0; $i < $this->contcookies; $i++) { 
        echo "<td>"."Nombre: ". htmlspecialchars($_COOKIE["$i"]) ."</td>";
        for ($z=0; $z < $this->contcookies; $z++) { 
            $z++;
            echo "<td>"."Email: ". htmlspecialchars($_COOKIE["$z"]) ."</td>";

            
        }
        echo"</tr>";
        echo"<tr>";

    }
    echo "</tr";
   
    
   

    
    
    echo "</table>";

}


function advertencia(){

}
}




?>


//-----------------------------------------------------------------------------------------------------------------------------
<?php 





$Agenda = new Agenda(1,1);
$Agenda->quitar_tildes(1);
$Agenda->posts(1);

$Agenda->crearAgenda();



//https://www.discoduroderoer.es/pasar-un-array-en-un-formulario-php/
?>




</body>
</html>