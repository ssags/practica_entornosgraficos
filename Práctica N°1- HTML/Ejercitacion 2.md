# Ejercitación 2

HTML está compuesto por un conjunto de elementos que son la base de su estructura. Los elementos están compuestos por dos tags (el de apertura y el de cierre) y el contenido en el medio (con excepción de los elementos vacíos). Cada tag puede tener atributos (proporcionan ciertas características como altura, ancho, color, etc.) y eventos (asocian un script que se ejecuta cuando el evento ocurre).

Se analizan los siguientes segmentos de código, indicando en qué sección del documento HTML se colocan, cuál es el efecto que producen y señalando elementos, etiquetas y atributos (nombre y valor), aclarando si son obligatorios.

## 2.a)

```html
<!-- Código controlado el día 12/08/2009 →
```

- Sección: puede colocarse en cualquier parte del documento (`head` o `body`).
- Efecto: es un comentario; no se muestra en la página.
- Elemento/etiqueta: comentario HTML.
- Atributos: no tiene.
- Obligatoriedad: no es obligatorio.
- Observación: el ejemplo está incompleto. La forma correcta es:

```html
<!-- Código controlado el día 12/08/2009 -->
```

## 2.b)

```html
<div id="bloque1">Contenido del bloque1</div>
```

- Sección: `body`.
- Efecto: crea un bloque contenedor de tipo división con el texto "Contenido del bloque1".
- Elemento: `div`.
- Etiquetas: apertura `<div ...>` y cierre `</div>`.
- Atributos:
	- `id="bloque1"` (valor: `bloque1`).
- Obligatoriedad:
	- `id`: opcional.
	- contenido de texto: opcional.

## 2.c)

```html
<img src="" alt="lugar imagen" id="im1" name="im1" width="32" height="32" longdesc="detalles.htm" />
```

- Sección: `body`.
- Efecto: inserta una imagen. Con `src=""` no se carga una imagen válida.
- Elemento: `img` (vacío, sin etiqueta de cierre).
- Etiqueta: `<img ... />`.
- Atributos:
	- `src=""` (fuente de la imagen).
	- `alt="lugar imagen"` (texto alternativo).
	- `id="im1"`.
	- `name="im1"`.
	- `width="32"`.
	- `height="32"`.
	- `longdesc="detalles.htm"`.
- Obligatoriedad:
	- `src`: requerido para que la imagen funcione correctamente.
	- `alt`: recomendado y considerado obligatorio para accesibilidad.
	- `id`, `name`, `width`, `height`, `longdesc`: opcionales.

## 2.d)

```html
<meta name="keywords" lang="es" content="casa, compra, venta, alquiler " />
<meta http-equiv="expires" content="16-Sep-2019 7:49 PM" />
```

- Sección: `head`.
- Efecto:
	- primera etiqueta: define palabras clave del documento.
	- segunda etiqueta: indica una fecha de expiración para metadatos HTTP.
- Elemento: `meta` (vacío).
- Etiqueta: `<meta ... />`.
- Atributos (primer `meta`):
	- `name="keywords"`.
	- `lang="es"`.
	- `content="casa, compra, venta, alquiler "`.
- Atributos (segundo `meta`):
	- `http-equiv="expires"`.
	- `content="16-Sep-2019 7:49 PM"`.
- Obligatoriedad:
	- en el primer caso, `name` + `content` funcionan como par necesario para describir el metadato.
	- en el segundo caso, `http-equiv` + `content` funcionan como par necesario.
	- `lang`: opcional.

## 2.e)

```html
<a href="http://www.e-style.com.ar/resumen.html" type="text/html" hreflang="es" charset="utf-8" rel="help">Resumen HTML</a>
```

- Sección: `body`.
- Efecto: crea un hipervínculo con el texto "Resumen HTML".
- Elemento: `a`.
- Etiquetas: apertura `<a ...>` y cierre `</a>`.
- Atributos:
	- `href="http://www.e-style.com.ar/resumen.html"` (destino del enlace).
	- `type="text/html"` (tipo MIME del recurso enlazado).
	- `hreflang="es"` (idioma del recurso enlazado).
	- `charset="utf-8"` (atributo histórico, hoy en desuso en `a`).
	- `rel="help"` (relación del recurso con el documento).
- Obligatoriedad:
	- `href`: opcional en sintaxis, pero necesario para que funcione como enlace navegable.
	- `type`, `hreflang`, `charset`, `rel`: opcionales.

## 2.f)

```html
<table width="200" summary="Datos correspondientes al ejercicio vencido">
	<caption align="top">Título</caption>
	<tr>
		<th scope="col">&nbsp;</th>
		<th scope="col">A</th>
		<th scope="col">B</th>
		<th scope="col">C</th>
	</tr>
	<tr>
		<th scope="row">1º</th>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<th scope="row">2º</th>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
</table>
```

- Sección: `body`.
- Efecto: crea una tabla con título, encabezados de columna (`A`, `B`, `C`) y dos filas de datos.
- Elementos y etiquetas:
	- `table`: contenedor principal de la tabla.
	- `caption`: título de la tabla.
	- `tr`: fila.
	- `th`: celda de encabezado.
	- `td`: celda de datos.
- Atributos:
	- en `table`: `width="200"`, `summary="Datos correspondientes al ejercicio vencido"`.
	- en `caption`: `align="top"`.
	- en `th`: `scope="col"` y `scope="row"`.
- Obligatoriedad:
	- `scope`: opcional, pero recomendado para accesibilidad.
	- `width`, `summary`, `align`: opcionales (además, `summary` y `align` están obsoletos en HTML5; se prefiere CSS y técnicas modernas de accesibilidad).
	- `table`, `tr`, `th/td`: necesarios para la estructura de una tabla.