# Práctica 6 - Ejercicio 1

## Completar

### Consulta a una base de datos

Para comenzar la comunicación con un servidor de base de datos MySQL, es necesario abrir una conexión a ese servidor. Para inicializar esta conexión, PHP ofrece la función `mysqli_connect()`.

Todos sus parámetros son opcionales, pero hay tres de ellos que generalmente son necesarios: **servidor**, **usuario** y **contraseña**.

Una vez abierta la conexión, se debe seleccionar una base de datos para su uso, mediante la función `mysqli_select_db()`.

Esta función debe pasar como parámetro **el enlace de conexión y el nombre de la base de datos**.

La función `mysqli_query()` se utiliza para **ejecutar una consulta SQL sobre la base de datos** y requiere como parámetros **la conexión y la sentencia SQL**.

La cláusula `or die()` se utiliza para **detener la ejecución del script si ocurre un error** y la función `mysqli_error()` se puede usar para **mostrar o recuperar el mensaje del error generado por MySQL**.

---

### Explicación del código

Si la función `mysqli_query()` es exitosa, el conjunto resultante retornado se almacena en una variable, por ejemplo `$vResult`, y a continuación se puede ejecutar el siguiente código:

```php
<?php
while ($fila = mysqli_fetch_array($vResultado))
{
?>
<tr>
    <td><?php echo ($fila[0]); ?></td>
    <td><?php echo ($fila[1]); ?></td>
    <td><?php echo ($fila[2]); ?></td>
</tr>
<?php
}
mysqli_free_result($vResultado);
mysqli_close($link);
?>
```

### ¿Qué hace este código?

- `while ($fila = mysqli_fetch_array($vResultado))` recorre el resultado fila por fila.
- En cada iteración, `mysqli_fetch_array()` toma la siguiente fila del conjunto de resultados y la guarda en `$fila`.
- Dentro de la fila HTML, se muestran los valores de las posiciones `0`, `1` y `2` del registro actual.
- La etiqueta `<tr>` crea una nueva fila de tabla y cada `<td>` muestra un dato de esa fila.
- `mysqli_free_result($vResultado)` libera la memoria ocupada por el resultado de la consulta.
- `mysqli_close($link)` cierra la conexión abierta con la base de datos.

### Observación

En el fragmento original aparece una pequeña inconsistencia: se menciona `$vResult`, pero luego se usa `$vResultado`. Para que el código funcione correctamente, el nombre de la variable debe ser el mismo en todo el script.