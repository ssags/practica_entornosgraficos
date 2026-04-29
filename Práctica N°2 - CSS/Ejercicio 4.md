# Agustina Chacón - 50980 - Entornos Gráficos

## Ejercicio 4

Análisis de declaraciones:

### Reglas CSS base

Primero, las reglas que usaremos como referencia:

```css
* { color: green; }

a:link { color: gray; }
a:visited { color: blue; }
a:hover { color: fuchsia; }
a:active { color: red; }

p {
  font-family: arial, helvetica;
  font-size: 10px;
  color: black;
}

.contenido {
  font-size: 14px;
  font-weight: bold;
}
```

### Caso 1: Estilo inline en un párrafo

Consideremos este HTML:

```html
<body>
  <p class="contenido" style="font-weight: normal;">Texto...</p>
  <table>...</table>
</body>
```

En el párrafo se aplican varias reglas a la vez:
- El selector universal `*` aplica color verde
- La regla `p` sobrescribe a universal con color negro
- La clase `.contenido` añade tamaño 14px y negrita
- El atributo `style` (inline) sobrescribe la negrita con normal

La prioridad es: inline > clase > elemento > universal

Resultado final: color negro, tamaño 14px, fuente Arial, sin negrita.

La tabla dentro del body solo recibe el color verde del selector universal. Los enlaces dentro mostrarán gris (no visitados), azul (visitados), fucsia (hover) o rojo (active) porque las pseudo-clases sobrescriben el color verde.

### Caso 2: Clase aplicada al body

Ahora con este HTML:

```html
<body class="contenido">
  <p>Texto...</p>
  <table>...</table>
</body>
```

El body recibe la clase `.contenido`, que establece tamaño 14px y negrita. Como esta clase se aplica al contenedor, sus propiedades se heredan a todos los hijos.

El párrafo dentro hereda tamaño 14px y negrita del body, pero la regla `p` sobrescribe el color (a negro) y el tamaño (a 10px). Sin embargo, mantiene la negrita heredada porque la regla `p` no define `font-weight`.

Las celdas de tabla heredan el color verde (universal) y el tamaño 14px y negrita del body.

Los enlaces heredan la herencia del body pero sus pseudo-clases controlan el color (gris, azul, fucsia o rojo según el estado).

## Comparación

**Caso 1** demuestra cómo el estilo inline tiene máxima prioridad y cómo la especificidad resuelve conflictos.

**Caso 2** demuestra cómo la herencia propaga estilos desde padres a hijos y cómo las reglas más específicas pueden sobrescribir propiedades heredadas.

La conclusión es que CSS resuelve conflictos mediante especificidad, orden de aparición y herencia, permitiendo un control preciso sobre la presentación.