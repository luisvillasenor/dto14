<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/index.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Invntarios</title>
<!-- InstanceEndEditable -->
<style type="text/css">
<!--
body {
	font: 100%/1.4 Verdana, Arial, Helvetica, sans-serif;
	background-color: #42413C;
	margin: 0;
	padding: 0;
	color: #000;
}

/* ~~ Selectores de elemento/etiqueta ~~ */
ul, ol, dl { /* Debido a las diferencias existentes entre los navegadores, es recomendable no añadir relleno ni márgenes en las listas. Para lograr coherencia, puede especificar las cantidades deseadas aquí o en los elementos de lista (LI, DT, DD) que contienen. Recuerde que lo que haga aquí se aplicará en cascada en la lista .nav, a no ser que escriba un selector más específico. */
	padding: 0;
	margin: 0;
}
h1, h2, h3, h4, h5, h6, p {
	margin-top: 0;	 /* la eliminación del margen superior resuelve un problema que origina que los márgenes escapen de la etiqueta div contenedora. El margen inferior restante lo mantendrá separado de los elementos de que le sigan. */
	padding-right: 15px;
	padding-left: 15px; /* la adición de relleno a los lados del elemento dentro de las divs, en lugar de en las divs propiamente dichas, elimina todas las matemáticas de modelo de cuadro. Una div anidada con relleno lateral también puede usarse como método alternativo. */
}
a img { /* este selector elimina el borde azul predeterminado que se muestra en algunos navegadores alrededor de una imagen cuando está rodeada por un vínculo */
	border: none;
}

/* ~~ La aplicación de estilo a los vínculos del sitio debe permanecer en este orden (incluido el grupo de selectores que crea el efecto hover -paso por encima-). ~~ */
a:link {
	color: #42413C;
	text-decoration: underline; /* a no ser que aplique estilos a los vínculos para que tengan un aspecto muy exclusivo, es recomendable proporcionar subrayados para facilitar una identificación visual rápida */
}
a:visited {
	color: #6E6C64;
	text-decoration: underline;
}
a:hover, a:active, a:focus { /* este grupo de selectores proporcionará a un usuario que navegue mediante el teclado la misma experiencia de hover (paso por encima) que experimenta un usuario que emplea un ratón. */
	text-decoration: none;
}

/* ~~ este contenedor de anchura fija rodea a las demás divs ~~ */
.container {
	width: 960px;
	background-color: #FFF;
	margin: 0 auto; /* el valor automático de los lados, unido a la anchura, centra el diseño */
}

/* ~~ no se asigna una anchura al encabezado. Se extenderá por toda la anchura del diseño. Contiene un marcador de posición de imagen que debe sustituirse por su propio logotipo vinculado ~~ */
.header {
	background-color: #ADB96E;
	position: absolute;
}
.container .header span {
	margin: auto;
}
span {
	margin: auto;
}

/* ~~ Estas son las columnas para el diseño. ~~ 

1) El relleno sólo se sitúa en la parte superior y/o inferior de las divs. Los elementos situados dentro de estas divs tienen relleno a los lados. Esto le ahorra las "matemáticas de modelo de cuadro". Recuerde que si añade relleno o borde lateral a la div propiamente dicha, éste se añadirá a la anchura que defina para crear la anchura *total*. También puede optar por eliminar el relleno del elemento en la div y colocar una segunda div dentro de ésta sin anchura y el relleno necesario para el diseño deseado. También puede optar por eliminar el relleno del elemento en la div y colocar una segunda div dentro de ésta sin anchura y el relleno necesario para el diseño deseado.

2) No se asigna margen a las columnas, ya que todas ellas son flotantes. Si es preciso añadir un margen, evite colocarlo en el lado hacia el que se produce la flotación (por ejemplo: un margen derecho en una div configurada para flotar hacia la derecha). En muchas ocasiones, puede usarse relleno como alternativa. En el caso de divs para las que deba incumplirse esta regla, deberá añadir una declaración "display:inline" a la regla de la div para evitar un error que provoca que algunas versiones de Internet Explorer dupliquen el margen.

3) Dado que las clases se pueden usar varias veces en un documento (y que también se pueden aplicar varias clases a un elemento), se ha asignado a las columnas nombres de clases en lugar de ID. Por ejemplo, dos divs de barra lateral podrían apilarse si fuera necesario. Si lo prefiere, éstas pueden cambiarse a ID fácilmente, siempre y cuando las utilice una sola vez por documento.

4) Si prefiere que la navegación esté a la derecha en lugar de a la izquierda, simplemente haga que estas columnas floten en dirección opuesta (todas a la derecha en lugar de todas a la izquierda) y éstas se representarán en orden inverso. No es necesario mover las divs por el código fuente HTML.

*/
.sidebar1 {
	float: left;
	width: 180px;
	background-color: #EADCAE;
	padding-bottom: 10px;
}
.content {

	padding: 10px 0;
	width: 780px;
	float: left;
}

/* ~~ Este selector agrupado da espacio a las listas del área de .content ~~ */
.content ul, .content ol { 
	padding: 0 15px 15px 40px; /* este relleno reproduce en espejo el relleno derecho de la regla de encabezados y de párrafo incluida más arriba. El relleno se ha colocado en la parte inferior para que el espacio existente entre otros elementos de la lista y a la izquierda cree la sangría. Estos pueden ajustarse como se desee. */
}

/* ~~ Los estilos de lista de navegación (pueden eliminarse si opta por usar un menú desplegable predefinido como el de Spry) ~~ */
ul.nav {
	list-style: none; /* esto elimina el marcador de lista */
	border-top: 1px solid #666; /* esto crea el borde superior de los vínculos (los demás se sitúan usando un borde inferior en el LI) */
	margin-bottom: 15px; /* esto crea el espacio entre la navegación en el contenido situado debajo */
}
ul.nav li {
	border-bottom: 1px solid #666; /* esto crea la separación de los botones */
}
ul.nav a, ul.nav a:visited { /* al agrupar estos selectores, se asegurará de que los vínculos mantengan el aspecto de botón incluso después de haber sido visitados */
	padding: 5px 5px 5px 15px;
	display: block; /* esto asigna propiedades de bloque al vínculo, lo que provoca que llene todo el LI que lo contiene. Esto provoca que toda el área reaccione a un clic de ratón. */
	width: 160px;  /*esta anchura hace que se pueda hacer clic en todo el botón para IE6. Puede eliminarse si no es necesario proporcionar compatibilidad con IE6. Calcule la anchura adecuada restando el relleno de este vínculo de la anchura del contenedor de barra lateral. */
	text-decoration: none;
	background-color: #C6D580;
}
ul.nav a:hover, ul.nav a:active, ul.nav a:focus { /* esto cambia el color de fondo y del texto tanto para usuarios que naveguen con ratón como para los que lo hagan con teclado */
	background-color: #ADB96E;
	color: #FFF;
}

/* ~~ El pie de página ~~ */
.footer {
	padding: 10px 0;
	background-color: #CCC49F;
	position: relative;/* esto da a IE6 hasLayout para borrar correctamente */
	clear: both; /* esta propiedad de borrado fuerza a .container a conocer dónde terminan las columnas y a contenerlas */
}

/* ~~ clases float/clear varias ~~ */
.fltrt {  /* esta clase puede utilizarse para que un elemento flote en la parte derecha de la página. El elemento flotante debe preceder al elemento junto al que debe aparecer en la página. */
	float: right;
	margin-left: 8px;
}
.fltlft { /* esta clase puede utilizarse para que un elemento flote en la parte izquierda de la página. El elemento flotante debe preceder al elemento junto al que debe aparecer en la página. */
	float: left;
	margin-right: 8px;
}
.clearfloat { /* esta clase puede situarse en una <br /> o div vacía como elemento final tras la última div flotante (dentro de #container) si #footer se elimina o se saca fuera de #container */
	clear:both;
	height:0;
	font-size: 1px;
	line-height: 0px;
}
-->
</style>
<link href="SpryAssets/SpryAccordion.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryAccordion.js" type="text/javascript"></script>
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>

<body>

<div class="container">
  <div class="header"><span>Sucursal No. 13 | Rol: Gerente | Usuario: </span> | <a href="#">SALIR</a><!-- end .header --></div>
    <div class="header"><span>Semana de trabajo No. 13 (Del Lunes, 03 de Junio al Sábado, 8 de Junio)</span></div>
  <div class="sidebar1">
    <ul class="nav">
    <div id="Accordion1" class="Accordion" tabindex="0">
          <div class="AccordionPanel">
            <div class="AccordionPanelTab">Almacen</div>
            <div class="AccordionPanelContent"><a href="A_Reportes.html">Reportes</a>
            <a href="A_Inventarios.html">Inventarios</a></div>
          </div>
          <div class="AccordionPanel">
            <div class="AccordionPanelTab">Catalogos</div>
            <div class="AccordionPanelContent"><a href="C_Productos.html">Productos</a> 
            <a href="C_Categorias.html">Categorias</a></div>
          </div>
          <div class="AccordionPanel">
            <div class="AccordionPanelTab">Mermas</div>
            <div class="AccordionPanelContent"><a href="C_Productos.html">Productos</a> 
            <a href="C_Categorias.html">Categoria</a></div>
          </div>
    </div>
    </ul>
    <hr />

    <p> Los vínculos anteriores muestran una estructura de navegación básica que emplea una lista no ordenada con estilo de CSS. Utilícela como punto de partida y modifique las propiedades para lograr el aspecto deseado. Si necesita menús desplegables, créelos empleando un menú de Spry, un widget de menú de Adobe Exchange u otras soluciones de javascript o CSS.</p>
    <p>Si desea que la navegación se sitúe a lo largo de la parte superior, simplemente mueva ul.nav a la parte superior de la página y vuelva a crear el estilo.</p>
  <!-- end .sidebar1 --></div>
  <div class="content"><!-- InstanceBeginEditable name="template1" -->
  <h1>Inventarios</h1>
  <p>Tenga en cuenta que la CSS para estos diseños cuenta con numerosos comentarios. Si realiza la mayor parte de su trabajo en la vista Diseño, eche un vistazo al código para obtener sugerencias sobre cómo trabajar con la CSS para diseños fijos. Puede quitar estos comentarios antes de lanzar el sitio. Para obtener más información sobre las técnicas usadas en estos diseños CSS, lea este artículo en el Centro de desarrolladores de Adobe: <a href="http://www.adobe.com/go/adc_css_layouts">http://www.adobe.com/go/adc_css_layouts</a>.</p>
  <h2>Método de borrado</h2>
  <p>Dado que todas las columnas son flotantes, este diseño usa una declaración clear:both en la regla .footer. Esta técnica de borrado fuerza a .container a conocer dónde terminan las columnas con el fin de mostrar cualquier borde o color de fondo que coloque en .container. Si su diseño exige la eliminación de .footer de .container, deberá usar un método de borrado diferente. El más fiable consiste en añadir una &lt;br class=&quot;clearfloat&quot; /&gt; o &lt;div  class=&quot;clearfloat&quot;&gt;&lt;/div&gt; tras la última columna flotante (pero antes de que se cierre .container). Esto proporcionará el mismo efecto de borrado.</p>
  <h3>Sustitución de logotipo</h3>
  <p>Se ha utilizado un marcador de posición de imagen en el .header de este diseño, en el que lo más probable es que desee colocar un logotipo. Se recomienda quitar el marcador de posición y reemplazarlo por su propio logotipo vinculado. </p>
  <p> Tenga en cuenta que si utiliza el inspector de propiedades para navegar hasta la imagen de su logotipo empleando el campo Origen (en lugar de quitar y reemplazar el marcador de posición), deberá quitar el fondo en línea y mostrar las propiedades. Estos estilos en línea sólo se utilizan para hacer que el marcador de posición del logotipo aparezca en los navegadores para fines de demostración. </p>
  <p>Para quitar los estilos en línea, asegúrese de que el panel Estilos CSS está configurado como Actual. Seleccione la imagen y, en la sección Propiedades del panel Estilos CSS, haga clic con el botón derecho del ratón y elimine las propiedades de visualización y de fondo. (Por supuesto que siempre podrá ir directamente al código y eliminar allí los estilos en línea de la imagen o el marcador de posición.)</p>
  <h4>Fondos</h4>
  <p>Por naturaleza, el color de fondo de cualquier div sólo se muestra a lo largo del contenido. Esto significa que si está usando un color de fondo o un borde para crear el aspecto de una columna lateral, éste no se extenderá hasta el pie de página, sino que se detendrá donde termine el contenido. Si la div de .content siempre va a incluir más contenido, puede colocar un borde en la div de .content para separarla de la columna.</p>
  <!-- InstanceEndEditable -->
  <!-- end .content --></div>
  <div class="footer">
    <p>Este .footer contiene la declaración position:relative; para dar a Internet Explorer 6 hasLayout para .footer y provocar que se borre correctamente. Si no es necesario proporcionar compatibilidad con IE6, puede quitarlo.</p>
  <!-- end .footer --></div>
  <!-- end .container --></div>
<script type="text/javascript">
var Accordion1 = new Spry.Widget.Accordion("Accordion1");
</script>
</body>
<!-- InstanceEnd --></html>
