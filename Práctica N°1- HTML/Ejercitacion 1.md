# Agustina Chacón - 50980 - Entornos Gráficos

## Ejercitación 1 - Cuestionario resuelto

### 1. ¿Qué es HTML, cuándo fue creado, cuáles fueron las distintas versiones y cuál es la última?

HTML (HyperText Markup Language) es el lenguaje de marcado estándar para estructurar el contenido de las páginas web.

Fue creado por Tim Berners-Lee a comienzos de los años 90 (su primera versión se difundió en 1991).

Versiones principales:

- HTML 2.0 (1995)
- HTML 3.2 (1997)
- HTML 4.0 (1997)
- HTML 4.01 (1999)
- XHTML 1.0 (2000, reformulación de HTML con reglas XML)
- HTML5 (Recommendation del W3C en 2014)
- HTML 5.1 (2016)
- HTML 5.2 (2017)

Actualmente no se maneja una versión numerada "final" como antes: la referencia vigente es el **HTML Living Standard** mantenido por WHATWG.

### 2. ¿Cuáles son los principios básicos que el W3C recomienda seguir para la creación de documentos con HTML?

El enfoque recomendado por W3C apunta a crear documentos:

- Bien estructurados y válidos según la especificación.
- Con marcado semántico (usar cada elemento para su significado y no para apariencia).
- Separando estructura y contenido (HTML) de presentación (CSS) y comportamiento (JavaScript).
- Accesibles para distintos usuarios y dispositivos.
- Compatibles e interoperables entre navegadores.

### 3. En las Especificaciones de HTML, ¿cuándo un elemento o atributo se considera desaprobado? ¿y obsoleto?

- **Desaprobado (deprecated):** se permite su uso por compatibilidad, pero se recomienda no usarlo en desarrollos nuevos porque existe una alternativa mejor y puede eliminarse en el futuro.
- **Obsoleto (obsolete):** queda fuera del uso recomendado por la especificación actual; no debe utilizarse en documentos nuevos, aunque algunos navegadores puedan seguir soportándolo por compatibilidad heredada.

### 4. ¿Qué es el DTD y cuáles son los posibles DTDs contemplados en la especificación de HTML 4.01?

DTD (Document Type Definition) es la definición formal del tipo de documento. Indica qué elementos y atributos son válidos y bajo qué reglas se organiza el documento.

En HTML 4.01 se contemplan tres DTDs:

1. **Strict**: excluye elementos y atributos presentacionales antiguos.
2. **Transitional**: permite elementos heredados de presentación para facilitar migraciones.
3. **Frameset**: pensado para documentos que usan marcos (frames).

### 5. ¿Qué son los metadatos y cómo se especifican en HTML?

Los metadatos son datos que describen al documento (autor, codificación, descripción, palabras clave, configuración de viewport, etc.). No son contenido visible principal de la página, pero son importantes para navegadores, buscadores y otros sistemas.

Se especifican dentro de `<head>`, principalmente con:

- `<meta charset="...">` para codificación de caracteres.
- `<meta name="description" content="...">`, `<meta name="keywords" content="...">`, `<meta name="author" content="...">`.
- `<meta name="viewport" content="width=device-width, initial-scale=1.0">` para diseño responsive.
- También pueden complementarse con `<title>`, `<link>` y otros elementos de cabecera.

