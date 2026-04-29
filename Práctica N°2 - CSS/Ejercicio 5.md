# Agustina Chacón - 50980 - Entornos Gráficos

## Ejercicio 5

Declaración de reglas CSS para cada caso:

### 1. Textos enfatizados dentro de títulos

Los textos enfatizados dentro de cualquier título deben ser rojos.

```css
h1 em, h2 em, h3 em, h4 em, h5 em, h6 em {
  color: red;
}
```

### 2. Elementos con atributo href dentro de párrafos

Cualquier elemento que tenga el atributo "href" y que esté dentro de un párrafo, que a su vez esté dentro de un bloque, debe ser color negro.

```css
div p [href] {
  color: black;
}
```

### 3. Listas dentro del bloque "ultimo"

El texto de las listas no ordenadas dentro del bloque "ultimo" debe ser amarillo, pero si es un enlace debe ser azul.

```css
#ultimo ul {
  color: yellow;
}

#ultimo ul a {
  color: blue;
}
```

### 4. Elementos "importante" con contexto

Los elementos identificados como "importante" dentro de cualquier bloque deben ser verdes, pero si están dentro de un título deben ser rojos.

```css
div #importante {
  color: green;
}

h1 #importante, h2 #importante, h3 #importante,
h4 #importante, h5 #importante, h6 #importante {
  color: red;
}
```

### 5. Elementos h1 con atributo title

Todos los elementos h1 que tengan el atributo title deben ser azules.

```css
h1[title] {
  color: blue;
}
```

### 6. Enlaces en listas ordenadas

El color de los enlaces en listas ordenadas:
- azul si no fueron visitados
- violeta si ya fueron visitados
- sin subrayado

```css
ol a:link {
  color: blue;
  text-decoration: none;
}

ol a:visited {
  color: violet;
  text-decoration: none;
}
```

## Conclusión

Se utilizaron selectores descendentes, de clase, id y atributos. Se aplicaron pseudo-clases para manejar estados de enlaces. Se respeta la especificidad para lograr los efectos pedidos.