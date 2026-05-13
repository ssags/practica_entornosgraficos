# Agustina Chacón - 50980 - Entornos Gráficos

## Ejercicio 4

Analizar la siguiente función y escribir un script para probar su funcionamiento.

```php
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
?>
```

---

## Respuesta

### Análisis de la función

La función `comprobar_nombre_usuario()` valida un nombre de usuario según dos criterios:

1. **Longitud:** El nombre debe tener entre 3 y 20 caracteres.
2. **Caracteres permitidos:** Solo se permiten letras (minúsculas y mayúsculas), dígitos (0-9) y los símbolos `-` y `_`.

Si el nombre es válido, imprime "[nombre] es válido" y retorna `true`.
Si no es válido, imprime "[nombre] no es válido" y retorna `false`.

### Script de prueba

```php
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
```

### Salida esperada

```
Jo no es válido
Juan_Perez es válido
Usuario123 es válido
usuario-admin_01 es válido
nombre@usuario no es válido
ab no es válido
estetambienesmuylargoparaserunombreusuario no es válido
```