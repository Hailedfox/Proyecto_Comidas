<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
/* Contenedor del menú */
.menu {
  position: relative;
  display: inline-block;
}

/* Botón principal */
.menu-btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px 18px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

/* Lista desplegable */
.menu-content {
  display: none;
  position: absolute;
  background-color: #ffffff;
  min-width: 180px;
  box-shadow: 0 4px 8px rgba(0,0,0,0.2);
  padding: 0;
  margin: 0;
}

/* Quitar estilos por defecto del ul */
.menu-content ul {
  list-style: none;
  padding: 0;
  margin: 0;
  -
}

/* Estilo de los enlaces */
.menu-content li a {
  display: block;
  padding: 10px 15px;
  text-decoration: none;
  color: black;
}

.menu-content li a:hover {
  background-color: #f1f1f1;
}

/* Mostrar el menú al pasar el mouse */
.menu:hover .menu-content {
  display: block;
}

.cuadro {

  padding: 15px;
  border: 2px solid black;
  margin-top: 10vw;
  font-family: Arial, sans-serif;
  
  margin-left: 20vw;
  margin-right: 20vw;
   border-radius: 5px;
     box-shadow: 0 5px 30px rgb(0, 0, 0);
    padding: 20px;
  }
.cuadro {
  background-color: white;
  max-width: 800px;          /* Controla el tamaño del cuadro */
  margin: 10vw auto;         /* Centra horizontalmente */
  padding: 30px;
  border: 2px solid black;
  border-radius: 8px;
  box-shadow: 0 5px 30px rgba(0, 0, 0, 0.4);
  font-family: Arial, sans-serif;
  text-align: center;        /* Centra texto e imagen */
}

/* Contenedor de la imagen */
.imagen-bienvenida {
  margin-top: 30px;
}

/* Imagen */
.imagen-bienvenida img {
  max-width: 100%;
  height: 200px;
}
body {
    background-color: #f5f5f5;
    margin: 0;
    padding: 20px;
    color: #333;
    background-image: url("{{ asset('img/portada_v3.png') }}");
    background-size: cover;
    background-position: center; /* Centra la imagen */
    background-repeat: no-repeat; /* No repite la imagen */
    background-attachment: fixed; /* Fija la imagen al hacer scroll */
    
    
}
.logo-superior {
  position: fixed;   /* Fijo en la pantalla */
  top: 20px;         /* Arriba */
  right: 20px;       /* Derecha */
  height: 60px;      /* Tamaño del logo */
  width: auto;
  z-index: 1000;     /* Encima de todo */
}
footer {
  margin-top: 80px;
  background-color: #000;
  padding: 30px 0;
  text-align: center;
}

footer img {
  max-width: 100%;
  height: auto;
}

</style>
</head>

<body>
 <div class="menu">
  <button class="menu-btn">Menú</button>
<img src="{{ asset('img/Logito.png') }}" alt="Logo" class="logo-superior">
  <div class="menu-content">
    <ul>
      <li><a href="/Inicio">Inicio</a></li>
      <li><a href="/Galeria">Galeria</a></li>
      <li><a href="/Mis metas">Mis metas</a></li>
      <li><a href="/Mis pasatiempos">Mis pasatiempos</a></li>
      <li><a href="/Quien soy">Quién soy</a></li>
    </ul>
  </div>
</div>
<div class="cuadro"> 

    <h1>Bienvenidos</h1>
    <p>Este es mi sitio web personal donde comparto mis metas y pasatiempos, tambien sobre mi paso en estos 5 cuatrimestres que llevo</p>
    <div class="imagen-bienvenida">
  <img src="{{ asset('img/Bienvenidos.webp') }}" alt="Bienvenidos">
</div>
</div>
<footer>
  <img src="{{ asset('img/pie_pagina.png') }}" alt="Pie de página institucional">
</footer>

</body>

</html>