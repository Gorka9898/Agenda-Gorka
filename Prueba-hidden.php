<?php

/********************* GENERAR JSON *****************/


if ( isset($_POST["dato1"]) && isset($_POST["dato2"]) )
{
 
 $datos = array(); //creamos un array

$dato1=$_POST['dato1'];
 $dato2=$_POST['dato2'];

$datos[] = array('dato1'=> $dato1, 'dato2'=> $dato2);


 //Creamos el JSON
 $json_string = json_encode($datos);


 $file = 'datos.json';
 file_put_contents($file, $json_string); 


}
else
{
 echo "<span style='color: red;'>Por favor, ingrese algún dato. </span></br></br>";
}


?>

<html>


<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Formulario para Generar y mostrar JSON - EjemploCodigo</title>
<link rel="stylesheet" href="cssestilo.css">

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" ></script>


 
</head>

<body>
 
 <form action="<?php $_PHP_SELF ?>" method="POST">
 Ingrese un dato #1: <input type="text" name="dato1"/>
 <br>
 Ingrese un dato #2: <input type="text" name="dato2"/>
 <br>
 <input type="submit"/>
 </form>
 
 
 <table class="grilla" id="tablajson">
 <thead>
 <th>Dato1</th>
 <th>Dato2</th> 
 </thead>
 <tbody></tbody>
 </table>

<script type="text/javascript">

$(document).ready(function(){
 var url="datos.json";
 $("#tablajson tbody").html("");
 $.getJSON(url,function(datos){
 $.each(datos, function(i,dato){
 var newRow =
 "<tr>"
 +"<td>"+dato.dato1+"</td>"
 +"<td>"+dato.dato2+"</td>"
 +"</tr>";
 $(newRow).appendTo("#tablajson tbody");
 });
 });
 });

</script>


 </body>
</html>