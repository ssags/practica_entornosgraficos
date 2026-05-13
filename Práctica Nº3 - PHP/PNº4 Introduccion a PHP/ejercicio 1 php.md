# Agustina Chacón - 50980 - Entornos Gráficos

## Ejercicio 1

En el siguiente código identificar:

- Las variables y su tipo
- Los operadores
- Las funciones y sus parámetros
- Las estructuras de control
- Cuál es la salida por pantalla

```php
<?php
function doble($i) {
 return $i*2;
}

$a = TRUE; 
$b = "xyz"; 
$c = 'xyz';
$d = 12; 

echo gettype($a);
echo gettype($b); 
echo gettype($c);
echo gettype($d); 

if (is_int($d)) {
 $d += 4;
}

if (is_string($a)) {
 echo "Cadena: $a";
}

$d = $a ? ++$d : $d*3;
$f = doble($d++);
$g = $f += 10;

echo $a, $b, $c, $d, $f , $g;
?>
```

---

## Respuesta

### 1. Variables y tipo

- `$a`: boolean
- `$b`: string
- `$c`: string
- `$d`: integer
- `$f`: integer
- `$g`: integer

### 2. Operadores

- `=` asignación.
- `*` multiplicación.
- `+=` suma y asignación.
- `++` incremento pre y postfijo.
- `? :` operador ternario.
- `==` no aparece en este código, pero sí hay comparaciones implícitas en `is_int()` e `is_string()` mediante funciones de verificación.

### 3. Funciones y parámetros

- `doble($i)`: función definida por el usuario. Recibe un parámetro `$i` y devuelve `$i * 2`.
- `gettype($a)`, `gettype($b)`, `gettype($c)`, `gettype($d)`: devuelven el tipo de cada variable.
- `is_int($d)`: verifica si `$d` es entero.
- `is_string($a)`: verifica si `$a` es string.

### 4. Estructuras de control

- `if (is_int($d)) { ... }`
- `if (is_string($a)) { ... }`
- Operador ternario: `$d = $a ? ++$d : $d * 3;`

### 5. Salida por pantalla

El código imprime primero los tipos de las variables sin separadores:

```text
booleanstringstringinteger
```

Después, como `$a` vale `TRUE`, se ejecuta la rama verdadera del operador ternario, luego `doble($d++)` calcula el doble del valor actual de `$d`, y finalmente `$g` toma el valor de `$f` luego del `+= 10`.

Salida final completa:

```text
booleanstringstringinteger1xyzxyz184444
```

Nota: `if (is_string($a))` no imprime nada porque `$a` es booleano, no string.
