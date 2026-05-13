# Agustina Chacón - 50980 - Entornos Gráficos

## Ejercicio 1

Indicar si los siguientes códigos son equivalentes.

### Código 1

```php
<?php
$a = array(
 'color' => 'rojo',
 'sabor' => 'dulce',
 'forma' => 'redonda',
 'nombre' => 'manzana',
 4
);
?>
```

### Código 2

```php
<?php
$a['color'] = 'rojo';
$a['sabor'] = 'dulce';
$a['forma'] = 'redonda';
$a['nombre'] = 'manzana';
$a[] = 4;
?>
```

---

## Respuesta

**Sí, son equivalentes.**

Ambos códigos crean el mismo array asociativo con las mismas claves y valores:

```
Array (
    [color] => rojo
    [sabor] => dulce
    [forma] => redonda
    [nombre] => manzana
    [0] => 4
)
```

En el primer código, el valor `4` sin clave dentro del array se asigna automáticamente al índice numérico 0.

En el segundo código, `$a[] = 4;` hace exactamente lo mismo: asigna el valor 4 al siguiente índice numérico disponible, que en este caso es 0.