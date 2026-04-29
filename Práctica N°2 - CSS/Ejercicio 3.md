# Agustina Chacón - 50980 - Entornos Gráficos

## Ejercicio 3

Análisis de declaraciones, aplicaciones de reglas y su efecto:

### Las reglas

**Regla 1: `p.quitar`**

Se aplica solo a elementos `<p>` que tengan `class="quitar"`. Esto es más específico que solo `.quitar` porque restringe el selector a párrafos.

```css
p.quitar { color: red; }
```

**Regla 2: `*.desarrollo`**

Se aplica a cualquier elemento que tenga `class="desarrollo"`. El selector universal `*` es redundante pero explícito.

```css
*.desarrollo { font-size: 8px; }
```

**Regla 3: `.importante`**

Se aplica a cualquier elemento con `class="importante"`, sin restricción de tipo.

```css
.importante { font-size: 20px; }
```

### Aplicación en diferentes elementos

`<p class="desarrollo">` — Aplica la regla `*.desarrollo`, resultando en texto de 8px.

`<p class="quitar">` — Aplica la regla `p.quitar`, resultando en texto rojo.

`<p>` sin clases — No recibe estilos especiales.

`<p class="importante">` — Aplica `.importante`, resultando en texto de 20px.

`<h1 class="quitar">` — NO aplica `p.quitar` porque no es un párrafo. Mantiene los estilos por defecto del h1.

`<p class="quitar importante">` — Se aplican ambas reglas. El texto es rojo (de `p.quitar`) y tamaño 20px (de `.importante`).

## Conclusión

Las clases son reutilizables en múltiples elementos y se pueden combinar varias en un mismo elemento. Cuando hay conflicto entre propiedades, se resuelven según la especificidad y el orden de las reglas en el CSS.