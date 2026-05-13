# Agustina Chacón - 50980 - Entornos Gráficos

## Ejercicio 2

En cada caso, indicar las salidas correspondientes.

### a)

```php
<?php
$matriz = array("x" => "bar", 12 => true);

echo $matriz["x"];
echo $matriz[12]; 
?>
```

### b)

```php
<?php
$matriz = array(
 "unamatriz" => array(
  6 => 5,
  13 => 9,
  "a" => 42
 )
);

echo $matriz["unamatriz"][6]; 
echo $matriz["unamatriz"][13]; 
echo $matriz["unamatriz"]["a"];
?>
```

### c)

```php
<?php
$matriz = array(5 => 1, 12 => 2);

$matriz[] = 56; 
$matriz["x"] = 42;

unset($matriz[5]); 
unset($matriz);
?>
```

---

## Respuesta

### a) Salida

```
bar1
```

**Explicación:**
- `$matriz["x"]` imprime el string "bar".
- `$matriz[12]` imprime el valor booleano `true`, que al ser impreso con `echo` se convierte en el string "1".

### b) Salida

```
5942
```

**Explicación:**
- `$matriz["unamatriz"][6]` accede al array anidado y obtiene el valor 5.
- `$matriz["unamatriz"][13]` obtiene el valor 9.
- `$matriz["unamatriz"]["a"]` obtiene el valor 42.
Se imprimen concatenados sin separadores.

### c) Explicación

El código:
1. Crea un array con índices 5 y 12.
2. Añade el valor 56 (se asigna al índice 13, que es el próximo disponible).
3. Añade un nuevo elemento con clave "x" y valor 42.
4. Elimina el elemento con índice 5.
5. **`unset($matriz);` elimina la variable `$matriz` completamente**, por lo que no hay salida.

Este último `unset()` destruye todo el array, no solo un elemento.