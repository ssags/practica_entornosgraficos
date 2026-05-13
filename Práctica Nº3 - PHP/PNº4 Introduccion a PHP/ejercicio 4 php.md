# Agustina Chacón - 50980 - Entornos Gráficos

## Ejercicio 4

### Consigna

Crea **dos archivos PHP**:

#### Archivo 1: `datos.php`

```php
<?php
$color = 'blanco';
$flor = 'clavel';
?>
```

#### Archivo 2: `ejercicio4.php`

Este archivo debe contener el código que hace el `include 'datos.php';` e indicar las salidas que produce:

```php
<?php
echo "El $flor $color \n"; 

include 'datos.php';

echo " El $flor $color"; 
?>
```

Luego, indicar las salidas que produce este código y justificar.

---

## Respuesta

El código principal produce esta salida lógica:

```text
El  
 El clavel blanco
```

### Justificación

- La primera sentencia `echo` se ejecuta antes del `include`, por lo tanto `$flor` y `$color` todavía no están definidos en ese momento.
- En PHP, al interpolar variables no definidas dentro de una cadena, el valor se toma como vacío. Por eso la primera línea queda sin los datos de la flor y el color.
- Luego `include 'datos.php';` incorpora el archivo y define `$color` y `$flor`.
- La segunda sentencia `echo` ya encuentra las variables cargadas y muestra `clavel` y `blanco`.

Nota: si el nivel de errores está activo, PHP también puede mostrar avisos por variables no definidas en la primera impresión.
