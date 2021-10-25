<!DOCTYPE html>
<html>
<head>
   <title>Agenda</title>
</head>
<body>

    <?php

        class Agenda {

            private $agenda = array();

            function AñadirAAgenda($name, $email) {
                session_start();
                $this->Contenido($name, $email);
            }
            
            function Contenido($name, $email) {
                if (isset($_POST["session"])) {
                    session_unset();
                    session_destroy();
                } else {
                    $hidden = $name." ".$email;
                    $AñadirEmail = $this->VerificarEmail($email);
                    if (isset($_SESSION["agenda"])) {
                        $Valores = $_SESSION["agenda"];
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
                                $nombre2 = $SepararNombresYEmails[$i];
                                $email2 = $SepararNombresYEmails[$i + 1];
                                $this->agenda[$nombre2] = $email2;
                                $i += 2;
                            }
                        }
                        if ($AñadirEmail) {
                            $this->agenda[$name] = $email;
                            $_SESSION["agenda"] .=  " ".$hidden;
                        }
                    } else {
                        if ($AñadirEmail) {
                            $this->agenda[$name] = $email;
                            $_SESSION["agenda"] =  $hidden;
                        }
                    }
                }
            }

            function VerificarEmail($email) {
                $EmailsValidos = array("gmail.com", "gmail.es", "hotmail.com", "hotmail.es", "yahoo.com", "yahoo.es");
                $contenidoEmail = strpos($email, "@");
                if (empty($contenidoEmail)) {
                    echo "Email no valido";
                }
                else {
                    $emailValores = explode("@", $email);
                    if (in_array($emailValores[1], $EmailsValidos)) {
                        return true;
                    }
                    echo "Invalid email";
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

        if (isset($_POST["Enviar"])){
            $name = $_POST["name"];
            $email = $_POST["email"];
            $a->AñadirAAgenda($name, $email);
        } 
    ?>

    <form action="Agenda-Session.php" method="POST">
        <p>Nombre: <input type="text" name="name"></input></p>
        <p>Email: <input type="text" name="email"></input></p>
        <p>Borrar Session: <input type="checkbox" name="session"></input></p>
        <input type="submit" value="Enviar" name="Enviar"></input>
    </form>
    <p><?php echo $a->toString();?></p>

</body>
</html>