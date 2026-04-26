# Ejercitación 3

En cada caso se explican las diferencias entre los segmentos de código y sus visualizaciones.

## 3.a) Enlaces (`a`)

```html
<a href="http://www.google.com.ar">Click aquí para ir a Google</a>
<a href="http://www.google.com.ar" target="_blank">Click aquí para ir a Google</a>
<a href="http://www. google.com.ar" type="text/html" hreflang="es" charset="utf-8" rel="help"></a>
<a href="#">Click aquí para ir a Google</a>
<a href="#arriba">Click aquí para volver arriba</a>
<a name="arriba" id="arriba"></a>
```

- Primer enlace: abre Google en la misma pestaña.
- Segundo enlace: abre Google en una pestaña nueva por `target="_blank"`.
- Tercer enlace: no muestra texto (ancla vacía) y el `href` está mal escrito por el espacio en la URL (`www. google...`), por lo que puede fallar.
- Cuarto enlace (`href="#"`): no va a otra página; normalmente te lleva al inicio del documento actual.
- Quinto enlace (`href="#arriba"`): desplaza al marcador interno con `id="arriba"`.
- Sexto enlace: define el punto de destino interno (ancla), no tiene contenido visible.

## 3.b) Imagen + enlace

```html
<p><img src="im1.jpg" alt="imagen1" /><a href="http://www.google.com.ar">Click aquí</a></p>
<p><a href="http://www.google.com.ar"><img src="im1.jpg" alt="imagen1" /></a> Click aquí</p>
<p><a href="http://www.google.com.ar"><img src="im1.jpg" alt="imagen1" />Click aquí</a></p>
<p><a href="http://www.google.com.ar"><img src="im1.jpg" alt="imagen1" /></a> <a href="http://www.google.com.ar">Click aquí</a></p>
```

- Caso 1: solo el texto "Click aquí" es enlace; la imagen no.
- Caso 2: solo la imagen es enlace; el texto queda fuera del enlace.
- Caso 3: imagen y texto están dentro del mismo `a`, por lo tanto ambos son clickeables.
- Caso 4: hay dos enlaces separados que apuntan al mismo destino: uno en la imagen y otro en el texto.

## 3.c) Listas y bloque de cita

```html
<ul>
	<li>xxx</li>
	<li>yyy</li>
	<li>zzz</li>
</ul>

<ol>
	<li>xxx</li>
	<li>yyy</li>
	<li>zzz</li>
</ol>

<ol>
	<li>xxx</li>
	<li value="2">yyy</li>
</ol>
<ol>
	<li value="3">zzz</li>
</ol>

<blockquote>
	<p>1. xxx<br />2. yyy<br />3. zzz</p>
</blockquote>
```

- `ul`: lista no ordenada (viñetas).
- `ol`: lista ordenada automática (1, 2, 3).
- `li value="..."`: permite forzar o continuar numeración manualmente.
- `blockquote` + texto con `<br />`: visualmente parece lista numerada, pero semánticamente no es una lista real.

## 3.d) Tabla con encabezados reales vs estilo visual

```html
<table border="1" width="300">
	<tr>
		<th>Columna 1</th>
		<th>Columna 2</th>
	</tr>
	<tr>
		<td>Celda 1</td>
		<td>Celda 2</td>
	</tr>
	<tr>
		<td>Celda 3</td>
		<td>Celda 4</td>
	</tr>
</table>

<table border="1" width="300">
	<tr>
		<td><div align="center"><strong>Columna 1</strong></div></td>
		<td><div align="center"><strong>Columna 2</strong></div></td>
	</tr>
	<tr>
		<td>Celda 1</td>
		<td>Celda 2</td>
	</tr>
	<tr>
		<td>Celda 3</td>
		<td>Celda 4</td>
	</tr>
</table>
```

- Visualmente son parecidas.
- Semánticamente la primera es mejor: usa `th` para encabezados.
- La segunda simula encabezado con `td` + `strong`, útil visualmente pero peor para accesibilidad y estructura.

## 3.e) Título de tabla con `caption` vs título dentro de una fila

```html
<table width="200">
	<caption>Título</caption>
	<tr>
		<td bgcolor="#dddddd">&nbsp;</td>
		<td bgcolor="#dddddd">&nbsp;</td>
		<td bgcolor="#dddddd">&nbsp;</td>
	</tr>
	<tr>
		<td bgcolor="#dddddd">&nbsp;</td>
		<td bgcolor="#dddddd">&nbsp;</td>
		<td bgcolor="#dddddd">&nbsp;</td>
	</tr>
</table>

<table width="200">
	<tr>
		<td colspan="3"><div align="center">Título</div></td>
	</tr>
	<tr>
		<td bgcolor="#dddddd">&nbsp;</td>
		<td bgcolor="#dddddd">&nbsp;</td>
		<td bgcolor="#dddddd">&nbsp;</td>
	</tr>
	<tr>
		<td bgcolor="#dddddd">&nbsp;</td>
		<td bgcolor="#dddddd">&nbsp;</td>
		<td bgcolor="#dddddd">&nbsp;</td>
	</tr>
</table>
```

- Con `caption`, el título pertenece semánticamente a la tabla.
- Con `td colspan="3"`, el título es solo una celda más dentro de la grilla.
- Pueden verse similares, pero `caption` es la opción semántica correcta.

## 3.f) Uso de `rowspan` vs `colspan`

```html
<table width="200">
	<tr>
		<td colspan="3"><div align="center">Título</div></td>
	</tr>
	<tr>
		<td rowspan="2" bgcolor="#dddddd">&nbsp;</td>
		<td bgcolor="#dddddd">&nbsp;</td>
		<td bgcolor="#dddddd">&nbsp;</td>
	</tr>
	<tr>
		<td bgcolor="#dddddd">&nbsp;</td>
		<td bgcolor="#dddddd">&nbsp;</td>
	</tr>
</table>

<table width="200">
	<tr>
		<td colspan="3"><div align="center">Título</div></td>
	</tr>
	<tr>
		<td colspan="2" bgcolor="#dddddd">&nbsp;</td>
		<td bgcolor="#dddddd">&nbsp;</td>
	</tr>
	<tr>
		<td bgcolor="#dddddd">&nbsp;</td>
		<td bgcolor="#dddddd">&nbsp;</td>
		<td bgcolor="#dddddd">&nbsp;</td>
	</tr>
</table>
```

- Primer caso: una celda ocupa dos filas (`rowspan="2"`).
- Segundo caso: una celda ocupa dos columnas (`colspan="2"`).
- Cambia la geometría de la tabla y la distribución visual de bloques.

## 3.g) Influencia de `border`, `cellpadding`, `cellspacing`, `rowspan` y `width`

```html
<table width="200" border="1">
	<tr>
		<td colspan="3"><div align="center">Título</div></td>
	</tr>
	<tr>
		<td colspan="2" rowspan="2">&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td width="50%">&nbsp;</td>
	</tr>
</table>

<table width="200" border="1" cellpadding="0" cellspacing="0">
	<tr>
		<td colspan="2"><div align="center">Título</div></td>
	</tr>
	<tr>
		<td rowspan="2">&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td width="50%">&nbsp;</td>
	</tr>
</table>
```

- `cellpadding` y `cellspacing` controlan espacios internos y entre celdas.
- Cambiar `colspan`/`rowspan` altera cuántas columnas/filas ocupa cada celda.
- `width="50%"` en una celda ajusta su proporción respecto del ancho disponible.

## 3.h) Formularios

```html
<form id="form1" name="form1" action="procesar.php" method="post" target="_blank">
	<fieldset>
		<legend>LOGIN</legend>
		Usuario: <input type="text" id="usu1" name="usu1" value="xxx" /><br />
		Clave: <input type="password" id="clave1" name="clave1" value="xxx" />
	</fieldset>
	<input type="submit" id="boton1" name="boton1" value="Enviar" />
</form>

<form id="form2" name="form2" action="" method="get" target="_blank">
	LOGIN<br />
	<label>Usuario: <input type="text" id="usu2" name="usu2" /></label><br />
	<label>Clave: <input type="text" id="clave2" name="clave2" /></label><br />
	<input type="submit" id="boton2" name="boton2" value="Enviar" />
</form>

<form id="form3" name="form3" action="mailto:xx@xx.com" enctype="text/plain" method="post" target="_blank">
	<fieldset>
		<legend>LOGIN</legend>
		Usuario: <input type="text" id="usu3" name="usu3" /><br />
		Clave: <input type="password" id="clave3" name="clave3" />
	</fieldset>
	<input type="reset" id="boton3" name="boton3" value="Enviar" />
</form>
```

- Form 1: envía por `POST` a `procesar.php`; abre resultado en nueva pestaña.
- Form 2: envía por `GET` al mismo documento (`action=""`); no usa `fieldset`.
- Form 3: intenta enviar por correo (`mailto`), usa `enctype="text/plain"` y botón `reset` (borra campos, no envía).
- Diferencias visuales: agrupación con `fieldset/legend`, tipo de input para clave (`password` vs `text`) y tipo de botón final.

## 3.i) Botón `button` vs `input type="button"`

```html
<label>Botón 1
	<button type="button" name="boton1" id="boton1">
		<img src="logo.jpg" alt="Botón con imagen" width="30" height="20" /><br />
		<b>CLICK AQUÍ</b>
	</button>
</label>

<label>Botón 2
	<input type="button" name="boton2" id="boton2" value="CLICK AQUÍ" />
</label>
```

- `button` permite contenido HTML interno (imagen, salto de línea, texto con formato).
- `input type="button"` solo muestra texto plano desde `value`.
- Visualmente, el primero es más personalizable; el segundo es más simple.

## 3.j) Radio buttons: mismo `name` vs distinto `name`

```html
<p>
	<label><input type="radio" name="opcion" id="X" value="X" /> X</label><br />
	<label><input type="radio" name="opcion" id="Y" value="Y" /> Y</label>
</p>

<p>
	<label><input type="radio" name="opcion1" id="X1" value="X" /> X</label><br />
	<label><input type="radio" name="opcion2" id="Y1" value="Y" /> Y</label>
</p>
```

- Primer caso: ambos radios tienen el mismo `name`, por lo tanto son excluyentes (solo uno puede quedar seleccionado).
- Segundo caso: tienen `name` distinto, por lo tanto son grupos diferentes y pueden quedar ambos seleccionados a la vez.

## 3.k) `select` simple vs múltiple

```html
<select name="lista">
	<optgroup label="Caso 1">
		<option>Mayo</option>
		<option>Junio</option>
	</optgroup>
	<optgroup label="Caso 2">
		<option>Mayo</option>
		<option>Junio</option>
	</optgroup>
</select>

<select name="lista1[]" multiple="multiple">
	<optgroup label="Caso 1">
		<option>Mayo</option>
		<option>Junio</option>
	</optgroup>
	<optgroup label="Caso 2">
		<option>Mayo</option>
		<option>Junio</option>
	</optgroup>
</select>
```

- Primer `select`: permite una sola opción seleccionada.
- Segundo `select` con `multiple`: permite seleccionar varias opciones (normalmente con `Ctrl` o `Shift`).
- `name="lista1[]"` se usa para enviar múltiples valores como arreglo.

