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
.cuadro {
  background-color: white;
  max-width: 900px;
  margin: 8vw auto;
  padding: 40px;
 border-radius: 5px;
     box-shadow: 0 5px 30px rgb(0, 0, 0);
    padding: 20px;
  font-family: Arial, sans-serif;
}

.cuadro h1 {
  text-align: center;
  margin-bottom: 30px;
}

/* Quitar viñetas */
.cuadro ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

/* Categorías principales */
.cuadro > ul > li {
  margin-bottom: 25px;
}

/* Títulos de categorías */
.cuadro strong {
  font-size: 18px;
  display: block;
  margin-bottom: 8px;
  color: #2c3e50;
}

/* Sublistas */
.cuadro ul ul {
  padding-left: 20px;
}

.cuadro ul ul li {
  margin-bottom: 6px;
  position: relative;
  padding-left: 15px;
}

/* Puntito moderno */
.cuadro ul ul li::before {
  content: "•";
  position: absolute;
  left: 0;
  color: #4CAF50;
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
      <li><a href="/Galeria">Galería</a></li>
      <li><a href="/Mis metas">Mis metas</a></li>
      <li><a href="/Mis pasatiempos">Mis pasatiempos</a></li>
      <li><a href="/Quien soy">Quién soy</a></li>
    </ul>
  </div>
</div>
<div class="cuadro">
 <h1>Mis pasatiempos</h1>



<ul>
  <li><strong>Música</strong>
    <ul>
      <li>Escuchar música para relajarme</li>
      <li>Pop, rock y música electrónica</li>
    </ul>
  </li>

  <li><strong>Entretenimiento</strong>
    <ul>
      <li>Ver series y películas</li>
      <li>Escuchar podcasts</li>
    </ul>
  </li>

  <li><strong>Tecnología</strong>
    <ul>
      <li>Aprender sobre programación</li>
      <li>Explorar nuevas aplicaciones</li>
      <li>Usar herramientas digitales</li>
    </ul>
  </li>

  <li><strong>Tiempo personal</strong>
    <ul>
      <li>Relajarme después de un día largo</li>
      <li>Organizar mis actividades</li>
      <li>Pasar tiempo con amigos y familia</li>
    </ul>
  </li>
</ul>


</div>
<footer>
  <img src="{{ asset('img/pie_pagina.png') }}" alt="Pie de página institucional">
</footer>

</body>
</html>