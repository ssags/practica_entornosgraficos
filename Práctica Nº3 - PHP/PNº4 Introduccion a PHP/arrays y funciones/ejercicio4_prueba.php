<?php
function comprobar_nombre_usuario($nombre_usuario){ 

 // compruebo que el tamaño del string sea válido
 if (strlen($nombre_usuario)<3 || strlen($nombre_usuario)>20){ 
  echo $nombre_usuario . " no es válido<br>"; 
  return false; 
 }

 // compruebo que los caracteres sean los permitidos
 $permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-_"; 

 for ($i=0; $i<strlen($nombre_usuario); $i++){ 

  if (strpos($permitidos, substr($nombre_usuario,$i,1))===false){ 
   echo $nombre_usuario . " no es válido<br>"; 
   return false; 
  } 
 }

 echo $nombre_usuario . " es válido<br>"; 
 return true; 
}

// Pruebas
echo "<h3>Pruebas de validación de nombres de usuario</h3>";

comprobar_nombre_usuario("Jo");                      // Muy corto (< 3)
comprobar_nombre_usuario("Juan_Perez");              // Válido
comprobar_nombre_usuario("Usuario123");              // Válido
comprobar_nombre_usuario("usuario-admin_01");        // Válido
comprobar_nombre_usuario("nombre@usuario");          // Inválido (@)
comprobar_nombre_usuario("ab");                       // Muy corto
comprobar_nombre_usuario("estetambienesmuylargoparaserunombreusuario");  // Muy largo (> 20)
?>
