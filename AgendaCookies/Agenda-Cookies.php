<!DOCTYPE html>
<html>
<head>
   <title>Agenda-Cookies</title>
</head>
<body>

    <?php

        class Agenda {

            private $agenda = array();


            function AñadirAAgenda($name, $email) {
                $this->Contenido($name, $email);
            }



            function Contenido($name, $email) {
                $hidden = $name." ".$email;
                $AñadirEmail = $this->VerificarEmail($email);


                if (isset($_COOKIE["agenda"])) {
                    $Valores = $_COOKIE["agenda"];
                    $SepararNombresYEmails = explode(" ", $Valores);


                    for ($i = 0; $i < sizeof($SepararNombresYEmails); $i++){
                        if (empty($SepararNombresYEmails[$i])) {
                            unset($SepararNombresYEmails[$i]);
                        }
                    }



                    $contenidoLength = sizeof($SepararNombresYEmails);
                    $i = 0;

                    if ($contenidoLength > 0) {
                        while ($i < $contenidoLength) {
                            $name2 = $SepararNombresYEmails[$i];
                            $email2 = $SepararNombresYEmails[$i + 1];
                            $this->agenda[$name2] = $email2;
                            $i += 2;
                        }
                    }


                    if ($AñadirEmail) {
                        $this->agenda[$name] = $email;
                        setcookie("agenda", $_COOKIE["agenda"]." ".$hidden, time() + 100);
                    }


                } 
                
                
                else {
                    if ($AñadirEmail) {
                        $this->agenda[$name] = $email;
                        setcookie("agenda", $hidden, time() + 100);
                    }
                }
            }




            function VerificarEmail($email) {
                $EmailsValidos = array("gmail.com", "gmail.es", "hotmail.com", "hotmail.es", "yahoo.com", "yahoo.es");
                $contenidoEmail = strpos($email, "@");
                if (empty($contenidoEmail)) {
                    echo "Email no valido";
                    return false;
                    
                
                
            }




                else {
                    $emailValores = explode("@", $email);
                    if (in_array($emailValores[1], $EmailsValidos)) {
                      
                        return true;
                    }
                    echo "Email no valido";
                    return false;
                }
            }


            function toString(){
                $agendaStr = "";
                if (!empty($this->agenda)){
                    foreach ($this->agenda as $key=>$value) {
                        $agendaStr .= " <table border=1px>
                        <tr>
                        <td>Nombre:  </td>
                        <td>$key</td>
                        </tr>
                        <tr>
                        <td>Email:  </td>
                        <td>$value</td>

                          </table>
                          <br>
                          <br>";
                    }
                }
                return $agendaStr;
            }

        }

        $a = new Agenda();



        if (isset($_POST["send"])){
            $name = $_POST["name"];
            $email = $_POST["email"];
            $a->AñadirAAgenda($name, $email);
        } 

        
    ?>

    <form action="Agenda-Cookies.php" method="POST">
        <p>Nombre: <input type="text" name="name"></input></p>
        <p>Email: <input type="text" name="email"></input></p>
        <input type="submit" value="Send" name="send"></input>
    </form>
    <p><?php echo $a->toString();?></p>

</body>
</html>