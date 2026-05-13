# Agustina Chacón - 50980 - Entornos Gráficos

## Ejercicio 5

### Consigna

Analizar el siguiente ejemplo de contador de visitas a una página web. **Debes crear 3 archivos:**

#### Archivo 1: `contador.php`

```php
<?php
// Archivo para acumular el numero de visitas
$archivo = "contador.dat";

// Abrir el archivo para lectura 
$abrir = fopen($archivo, "r");

// Leer el contenido del archivo
$cont = fread($abrir, filesize($archivo));

// Cerrar el archivo
fclose($abrir);

// Abrir nuevamente el archivo para escritura
$abrir = fopen($archivo, "w");

// Agregar 1 visita
$cont = $cont + 1;

// Guardar la modificación 
$guardar = fwrite($abrir, $cont);

// Cerrar el archivo
fclose($abrir);

// Mostrar el total de visitas 
echo "<font face='arial' size='3'>Cantidad de visitas:".$cont."</font>";
?>
```

#### Archivo 2: `visitas.php`

```html
<html>
<head></head>

<body>
 <? include("contador.php")?> 
</body>

</html>
```

#### Archivo 3: `contador.dat`

Archivo de texto plano con un valor inicial. Debe tener **permisos de lectura y escritura**:

```
0
```

---

## Respuesta

### Análisis del contador de visitas

El ejemplo sirve para llevar un registro simple de cuántas veces se abrió una página web.

### Funcionamiento de `contador.php`

- `$archivo = "contador.dat";` define el archivo donde se guarda el número de visitas.
- `fopen($archivo, "r")` abre el archivo en modo lectura.
- `fread($abrir, filesize($archivo))` lee el contenido actual del archivo.
- `fclose($abrir)` cierra el archivo.
- `fopen($archivo, "w")` lo vuelve a abrir en modo escritura.
- `$cont = $cont + 1;` incrementa el contador en una visita.
- `fwrite($abrir, $cont)` guarda el nuevo valor.
- `echo` muestra la cantidad total de visitas en pantalla.

### Funcionamiento de `visitas.php`

El archivo `visitas.php` incluye `contador.php` con `include("contador.php")`, por lo que cada vez que se carga la página se ejecuta la lógica del contador y se actualiza el número de visitas.

### Requisito del archivo `contador.dat`

En la misma carpeta debe existir `contador.dat` con un valor inicial, por ejemplo `0`, y con permisos de lectura y escritura. Si no existe o no tiene permisos adecuados, la lectura y escritura pueden fallar.
