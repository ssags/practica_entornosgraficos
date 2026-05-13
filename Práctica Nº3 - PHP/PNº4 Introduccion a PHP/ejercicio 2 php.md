# Agustina Chacón - 50980 - Entornos Gráficos

## Ejercicio 2

Indicar si los siguientes códigos son equivalentes.

### a)

**Código 1:**
```php
<?php
$i = 1;
while ($i <= 10) {
 print $i++; 
}
?>
```

**Código 2:**
```php
<?php
$i = 1;
while ($i <= 10):
 print $i;
 $i++;
endwhile;
?>
```

### b)

**Código 1:**
```php
<?php
$i = 0;
do {
 print ++$i;
} while ($i<10);
?>
```

**Código 2:**
```php
<?php
for ($i = 1; $i <= 10; $i++) {
 print $i;
}
?>
```

### c)

**Código 1:**
```php
<?php
for ($i = 1; ;$i++) {
 if ($i > 10) {
 break;
 }
 print $i;
}
?>
```

**Código 2:**
```php
<?php
$i = 1;
for (;;) {
 if ($i > 10) {
 break;
 }
 print $i;
 $i++;
}
?>
```

**Código 3:**
```php
<?php
for ($i = 1; $i <= 10; print $i, $i++) ;
?>
```

---

## Respuesta

### a) Sí, son equivalentes.

En ambos casos se muestra la secuencia del 1 al 10.

- En el primer bloque se usa `while` con `print $i++;`, por lo que primero imprime y luego incrementa.
- En el segundo bloque se usa la sintaxis alternativa de `while` con `endwhile`, pero la lógica es la misma.

### b) Sí, son equivalentes.

Ambos códigos generan la misma salida: `1 2 3 4 5 6 7 8 9 10`.

- El primer bloque usa `do...while`, por lo que imprime al menos una vez.
- El segundo bloque usa `for`, que recorre exactamente los valores del 1 al 10.

### c) Sí, son equivalentes en la salida.

Los tres fragmentos imprimen los números del 1 al 10.

- El primer `for` usa `break` para cortar cuando `$i` supera 10.
- El segundo `for(;;)` es un bucle infinito que también se corta con `break`.
- El tercer `for` coloca la impresión dentro de la expresión de incremento, pero produce la misma secuencia.

Conclusión: en los tres casos la salida final es la misma, aunque cambie la forma de escribir el ciclo.
