# Agustina Chacón - 50980 - Entornos Gráficos

## Ejercicio 2

Análisis de declaraciones, aplicaciones de reglas y su efecto:

### 1. Regla: `p#normal`

Este selector combina un elemento (`p`) con un identificador (`#normal`), lo que lo hace muy específico y se aplica solamente a `<p id="normal">Este es un párrafo</p>`.

Las declaraciones son:

```css
p#normal {
  font-family: arial, helvetica;
  font-size: 11px;
  font-weight: bold;
}
```

El efecto es que el texto se muestra en la fuente Arial (o Helvetica como alternativa), con un tamaño de 11px en negrita.

### 2. Regla: `*#destacado`

Este selector usa el selector universal `*` combinado con el id, lo que significa que se aplica a **cualquier elemento** que posea `id="destacado"`. En este caso, tanto a un párrafo como a una tabla.

```css
*#destacado {
  border-style: solid;
  border-color: blue;
  border-width: 2px;
}
```

Ambos elementos (`<p id="destacado">` y `<table id="destacado">`) mostrarán un borde sólido azul de 2px.

### 3. Regla: `#distinto`

Este selector se aplica solamente por identificador, sin especificar elemento. Se aplica a `<p id="distinto">Este es el último párrafo</p>`.

```css
#distinto {
  background-color: #9EC7EB;
  color: red;
}
```

El resultado es un fondo celeste (#9EC7EB) con texto en rojo.

## Conclusión

Los selectores por id tienen muy alta especificidad. El selector `p#normal` es más específico que solo `#distinto` porque además indica el tipo de elemento. La combinación `*#destacado` demuestra que el mismo id se puede reutilizar en distintos tipos de elementos.