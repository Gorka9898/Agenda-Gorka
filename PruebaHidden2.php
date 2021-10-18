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
        $this->nombre=$nombre;
        $this->email=$email;
    }

    function crearArray(){

        if (isset($_POST["nombre"])) {
            
            $x=array();
            
            

            for ($v=0; $v < count($x); $v++) { 
                $nom=$_POST["nombre"];
                $x[$v]=array_push($nom);
                
                
            }

            
            
        }
        if (isset($_POST["email"])) {

            $z=array();

            for ($k=0; $k < count($x); $k++) { 
                $em=$_POST["email"];
                $x[$k]=array_push($em);
                
            }
            
        }


        for ($i=0; $i < count($x); $i++) { 
            echo "<input type='hidden' name='x[]' value='".$x[$i]."'>";
            
        
        }
        for ($i=0; $i < count($z); $i++) { 
            echo "<input type='hidden' name='z[]' value='".$z[$i]."'>";
        
        }

        echo "<table border= '1px solid black' padding= '2px' >";
        echo "<tr>";
    
        for ($b=0; $b < count($x); $b++) { 
            echo "<td>"."Nombre: ".$x[$b]."</td>";
        }
        for ($c=0; $c < count($x); $c++) { 
            echo "<td>"."email: ".$z[$c]."</td>";
        }
        
    
    
        
        echo"</tr>";
        echo "</table>";
    

    }

    function posts(){




    }
    function quitar_tildes($cadena) {
        $no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹");
        $permitidas= array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");
        $texto = str_replace($no_permitidas, $permitidas ,$cadena);
        return $texto;


                }



}








?>


//-----------------------------------------------------------------------------------------------------------------------------
<?php 





$Agenda = new Agenda(1,1);

$Agenda->crearArray();

?>




</body>
</html>