
Agustina Chacón 50980 Entornos Gráficos

# Ejercicio 1 — Respuestas

1. **¿Qué es CSS y para qué se usa?**

CSS (Cascading Style Sheets) es el lenguaje usado para definir la presentación de documentos HTML. Se utiliza para controlar colores, tipografías, tamaños, distribuciones, animaciones y el aspecto visual en general, separando el contenido (HTML) del estilo.

Complemento: CSS simplifica el código HTML liberándolo de responsabilidades de presentación y permite un control centralizado sobre fuentes, colores, espaciado y otros aspectos visuales, tal como indican los apuntes.

2. **CSS utiliza reglas para las declaraciones de estilo, ¿cómo funcionan?**

Una regla CSS tiene un selector y un bloque de declaraciones:

```css
selector {
	propiedad: valor;
	otra-propiedad: otro-valor;
}
```

El selector elige los elementos HTML a los que se aplican las declaraciones; cada declaración indica una propiedad y su valor. Las reglas se resuelven según la cascada, la especificidad y el orden.

Complemento: La estructura selector → propiedad: valor es la forma estándar y facilita mantener el HTML limpio, tal como indican los apuntes.

3. **¿Cuáles son las tres formas de dar estilo a un documento?**

- **Inline (en línea):** estilo en el atributo `style` del elemento.

```html
<p style="color: red;">Texto rojo</p>
```

- **Internal (interno):** dentro de una etiqueta `<style>` en el `<head>` del documento.

```html
<head>
	<style>
		p { color: blue; }
	</style>
</head>
```

- **External (externo):** archivo `.css` enlazado con `<link rel="stylesheet">`.

```html
<link rel="stylesheet" href="styles.css">
```

Confirmación: Estas tres formas coinciden exactamente con lo expuesto en los apuntes de la cátedra.

4. **¿Cuáles son los distintos tipos de selectores más utilizados? Ejemplifique cada uno.**

- **Selector de elemento:** selecciona por nombre de etiqueta.

```css
p { color: #333; }
```

- **Selector de clase:** selecciona por atributo `class`.

```css
.resaltado { background: yellow; }
```

- **Selector de id:** selecciona por `id` (único por página).

```css
#logo { width: 200px; }
```

- **Selector descendiente:** selecciona elementos dentro de otros.

```css
nav a { text-decoration: none; }
```

- **Selector hijo directo:** usa `>` para hijos inmediatos.

```css
ul > li { list-style: none; }
```

- **Selector de atributo:** selecciona por atributos HTML.

```css
input[type="text"] { padding: 6px; }
```

- **Selector agrupado:** aplicar la misma regla a varios selectores.

```css
h1, h2, h3 { font-family: Arial, sans-serif; }
```

Complemento: Estos ejemplos cubren lo requerido en la Práctica 2; por ejemplo, `#distinto` (id) y `.resaltado` (clase) son usos típicos en los ejercicios.

5. **¿Qué es una pseudo-clase? ¿Cuáles son las más utilizadas aplicadas a vínculos?**

Una pseudo-clase define un estado especial de un elemento (por ejemplo, cuando el cursor está encima o cuando un enlace fue visitado). Las pseudo-clases más usadas para vínculos son:

- `:link` — enlace no visitado
- `:visited` — enlace ya visitado
- `:hover` — cuando el puntero está sobre el enlace
- `:active` — mientras se hace clic en el enlace
- `:focus` — cuando el enlace tiene foco (teclado)

Ejemplo:

```css
a:link { color: blue; }
a:visited { color: purple; }
a:hover { color: red; }
a:active { color: orange; }
```

Nota: En la Práctica 2 — Ejercicio 4 se evalúan específicamente `a:link`, `a:visited`, `a:hover` y `a:active`.

6. **¿Qué es la herencia?**

La herencia es el mecanismo por el cual ciertos estilos aplicados a un elemento padre se transmiten a sus hijos. Propiedades como `color`, `font-family` o `line-height` suelen heredarse, mientras que propiedades de caja como `margin` o `padding` no lo hacen por defecto.

Refuerzo: Es útil recordar que las propiedades tipográficas y de texto suelen heredarse; en cambio, las propiedades del modelo de caja (`margin`, `padding`, `border`) no se heredan.

7. **¿En qué consiste el proceso denominado cascada?**

La cascada es la forma en que CSS decide qué reglas prevalecen cuando varias afectan al mismo elemento. El orden de resolución es:

- **Importancia:** reglas con `!important` tienen prioridad.
- **Origen:** hojas de usuario, autor y user-agent (navegador).
- **Especificidad:** selectores más específicos ganan (id > clase > elemento).
- **Orden de aparición:** en igualdad de especificidad, la última regla en el código gana.

Ejemplo rápido de especificidad (de mayor a menor): `#id` > `.clase` > `elemento`.

Refuerzo teórico: La regla `!important` otorga máxima prioridad a una declaración, impidiendo que sea sobrescrita por otras reglas normales; debe usarse con precaución.

---

