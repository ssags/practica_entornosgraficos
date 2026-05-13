# Agustina Chacón - 50980 - Entornos Gráficos

## Ejercicio 3

Explicar para qué se utiliza el siguiente código.

### a)

**Código 1:**
```php
<?php
if ($i == 0) {
 print "i equals 0";
} elseif ($i == 1) {
 print "i equals 1";
} elseif ($i == 2) {
 print "i equals 2";
}
?>
```

**Código 2:**
```php
<?php
switch ($i) {
 case 0:
 print "i equals 0";
 break;

 case 1:
 print "i equals 1";
 break;

 case 2:
 print "i equals 2";
 break;
}
?>
```

### b)

```html
<html>
<head><title>Documento 1</title></head>
<body>

<?php
echo "<table width = 90% border = '1' >";

$row = 5;
$col = 2;

for ($r = 1; $r <= $row; $r++) {
 echo "<tr>"; 

 for ($c = 1; $c <= $col;$c++) {
  echo "<td>&nbsp;</td>\n";
 }

 echo "</tr>\n";
}

echo "</table>\n";
?>

</body>
</html>
```

### c)

```html
<html>
<head><title>Documento 2</title></head>
<body>

<?php
if (!isset($_POST['submit'])) {
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
 Edad: <input name="age" size="2">
 <input type="submit" name="submit" value="Ir">
</form>

<?php
}
else {
 $age = $_POST['age'];

 if ($age >= 21) {
  echo 'Mayor de edad';
 }
 else {
  echo 'Menor de edad';
 }
}
?>

</body>
</html>
```

---

## Respuesta

### a) ¿Para qué se utiliza este código?

Ambos bloques sirven para tomar una decisión según el valor de `$i`.

- El primer bloque usa `if / elseif`.
- El segundo bloque usa `switch`.

En los dos casos, si `$i` vale 0, 1 o 2, se imprime un mensaje distinto. Se utiliza para mostrar cómo escribir una selección múltiple con dos estructuras diferentes.

### b) ¿Para qué se utiliza este código?

Este código genera una tabla HTML vacía de `5` filas por `2` columnas.

- `$row = 5` define la cantidad de filas.
- `$col = 2` define la cantidad de columnas.
- El `for` exterior recorre las filas.
- El `for` interior crea cada celda con `<td>&nbsp;</td>`.

En resumen, sirve para construir una tabla de forma dinámica con PHP.

### c) ¿Para qué se utiliza este código?

Este ejemplo muestra un formulario HTML y luego procesa los datos enviados por `POST`.

- Si todavía no se presionó el botón, se muestra el formulario.
- Cuando el usuario envía la edad, el código la lee desde `$_POST['age']`.
- Si la edad es mayor o igual a 21, imprime `Mayor de edad`.
- Si no, imprime `Menor de edad`.

También usa `$_SERVER['PHP_SELF']` para reenviar el formulario a la misma página.

