<form action="Sessiones.php" method="POST">
        <p>Nombre: <input type="text" nombre="nombre"></input></p>
        <p>Email: <input type="text" nombre="email"></input></p>
        <input type="submit" value="Enviar" nombre="send"></input>

    </form>

<?php

session_start();
if (isset($_POST["nombre"]) && (isset($_POST["email"]))) {
    
$nombres=$_POST["nombre"];
$emails=$_POST["nombre"];
}

$_SESSION[$_POST["nombre"]]= $nombres;
$_SESSION["Nombre_2"]= $emails;
$_SESSION["session_id"]= session_id();



?>
