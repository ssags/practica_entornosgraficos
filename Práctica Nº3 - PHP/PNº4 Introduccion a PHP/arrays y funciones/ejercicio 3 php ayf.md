# Agustina Chacón - 50980 - Entornos Gráficos

## Ejercicio 3

En cada caso, indicar las salidas correspondientes.

### a)

```php
<?php
$fun = getdate();

echo "Has entrado en esta pagina a las $fun[hours] horas, con $fun[minutes] minutos y $fun[seconds] segundos, del $fun[mday]/$fun[mon]/$fun[year]";
?>
```

### b)

```php
<?php
function sumar($sumando1,$sumando2){ 
 $suma=$sumando1+$sumando2; 
 echo $sumando1."+".$sumando2."=".$suma; 
} 

sumar(5,6);
?>
```

---

## Respuesta

### a) Salida (ejemplo)

```
Has entrado en esta pagina a las 14 horas, con 32 minutos y 45 segundos, del 13/5/2026
```

**Explicación:**
- `getdate()` retorna un array asociativo con información de la fecha y hora actual.
- Los índices utilizados:
  - `$fun[hours]` — hora (0-23)
  - `$fun[minutes]` — minutos (0-59)
  - `$fun[seconds]` — segundos (0-59)
  - `$fun[mday]` — día del mes (1-31)
  - `$fun[mon]` — mes (1-12)
  - `$fun[year]` — año (4 dígitos)

La salida exacta depende de cuándo se ejecute el código.

### b) Salida

```
5+6=11
```

**Explicación:**
- La función `sumar()` recibe dos parámetros: 5 y 6.
- Calcula la suma: 5 + 6 = 11.
- Imprime el resultado formateado como "5+6=11" usando concatenación de strings con el operador `.`.