<!DOCTYPE html>
<html>
<head>
   <title>Agenda-Hidden</title>
</head>
<body>

    <?php

        class Agenda {

            private $agenda = array();

            function AñadirAAgenda($name, $email) {
                $this->Contenido($name, $email);
                
                
                
            }

            function Contenido($name, $email) {
                $hidden = $_POST["contenido"];
                $SepararNombresYEmails = explode(" ", $hidden);
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
                $AñadirEmail = $this->VerificarEmail($email);
                if ($AñadirEmail) {
                    $this->agenda[$name] = $email;
                }
            }

            function VerificarEmail($email) {
                $EmailsValidos = array("gmail.com", "gmail.es", "hotmail.com", "hotmail.es", "yahoo.com", "yahoo.es");
                $contiene = strpos($email, "@");
                if (empty($contiene)) {
                   echo "email vacio";
                }
                else {
                    $EmailValido = explode("@", $email);
                    if (in_array($EmailValido[1], $EmailsValidos)) {
                        return true;
                        

                    }
                    echo "email no valido";
                    return false;
                }
               
            }

            function toString(){
                $agendaStr = "";
                
                if (!empty($this->agenda)){
                    foreach ($this->agenda as $key=>$value) {
                        $agendaStr .= "$key $value ";
                        
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

    <form action="Agenda.php" method="POST">
        <p>Nombre: <input type="text" name="name"></input></p>
        <p>Emaill: <input type="text" name="email"></input></p>
        <input type="submit" value="Enviar" name="Enviar"></input>
        <input type="hidden" value="<?php echo $a->toString(); ?>" name="contenido"></input>
    </form>
    <p><?php echo $a->toString(); ?></p>

</body>
</html>