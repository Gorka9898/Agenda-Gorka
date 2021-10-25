<!DOCTYPE html>
<html>
<head>
   <title>Agenda</title>
</head>
<body>

    <?php

        class Agenda {

            private $agenda = array();

            function addToAgenda($name, $email) {
                $this->contentValues($name, $email);
            }

            function contentValues($name, $email) {
                $hidden = $name." ".$email;
                $addEmail = $this->checkEmail($email);
                if (isset($_COOKIE["agenda"])) {
                    $values = $_COOKIE["agenda"];
                    $separateNamesAndEmails = explode(" ", $values);
                    for ($i = 0; $i < sizeof($separateNamesAndEmails); $i++){
                        if (empty($separateNamesAndEmails[$i])) {
                            unset($separateNamesAndEmails[$i]);
                        }
                    }
                    $contentLength = sizeof($separateNamesAndEmails);
                    $i = 0;
                    if ($contentLength > 0) {
                        while ($i < $contentLength) {
                            $naame = $separateNamesAndEmails[$i];
                            $eemail = $separateNamesAndEmails[$i + 1];
                            $this->agenda[$naame] = $eemail;
                            $i += 2;
                        }
                    }
                    if ($addEmail) {
                        $this->agenda[$name] = $email;
                        setcookie("agenda", $_COOKIE["agenda"]." ".$hidden, time() + 30);
                    }
                } else {
                    if ($addEmail) {
                        $this->agenda[$name] = $email;
                        setcookie("agenda", $hidden, time() + 30);
                    }
                }
            }

            function checkEmail($email) {
                $correctEmails = array("gmail.com", "gmail.es", "hotmail.com", "hotmail.es", "yahoo.com", "yahoo.es");
                $contains = strpos($email, "@");
                if (empty($contains)) {
                    echo "Invalid email";
                    return false;
                }
                else {
                    $emailValues = explode("@", $email);
                    if (in_array($emailValues[1], $correctEmails)) {
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
                        $agendaStr .= "$key $value ";
                    }
                }
                return $agendaStr;
            }

        }

        $a = new Agenda();

        if (isset($_POST["send"])){
            $name = $_POST["name"];
            $email = $_POST["email"];
            $a->addToAgenda($name, $email);
        } 
    ?>

    <form action="Agenda-Cookies.php" method="POST">
        <p>Name: <input type="text" name="name"></input></p>
        <p>Email: <input type="text" name="email"></input></p>
        <input type="submit" value="Send" name="send"></input>
    </form>
    <p><?php echo $a->toString();?></p>

</body>
</html>