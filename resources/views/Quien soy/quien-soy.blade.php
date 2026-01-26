<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quién soy</title>

  <style>
/* ===== MENÚ ===== */
.menu {
  position: relative;
  display: inline-block;
}

.menu-btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px 18px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.menu-content {
  display: none;
  position: absolute;
  background-color: #ffffff;
  min-width: 180px;
  box-shadow: 0 4px 8px rgba(0,0,0,0.2);
}

.menu-content ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

.menu-content li a {
  display: block;
  padding: 10px 15px;
  text-decoration: none;
  color: black;
}

.menu-content li a:hover {
  background-color: #f1f1f1;
}

.menu:hover .menu-content {
  display: block;
}

/* ===== FONDO ===== */
body {
  margin: 0;
  padding: 20px;
  font-family: Arial, sans-serif;
  background-image: url("{{ asset('img/portada_v3.png') }}");
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  background-attachment: fixed;
}

/* ===== LOGO ===== */
.logo-superior {
  position: fixed;
  top: 20px;
  right: 20px;
  height: 60px;
  z-index: 1000;
}

/* ===== CUADRO PRINCIPAL ===== */
.cuadro {
  background-color: white;
  max-width: 900px;
  margin: 8vw auto;
  padding: 40px;
  border-radius: 5px;
     box-shadow: 0 5px 30px rgb(0, 0, 0);
    padding: 20px;
}

/* Título */
.cuadro h1 {
  text-align: center;
  margin-bottom: 30px;
}

/* Texto */
.cuadro p {
  text-align: justify;
  line-height: 1.7;
  margin-bottom: 25px;
}

/* Lista */
.cuadro ul {
  list-style: none;
  padding: 0;
}

.cuadro li {
  margin-bottom: 10px;
  padding-left: 20px;
  position: relative;
}

.cuadro li::before {
  content: "✔";
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

<!-- MENÚ -->
<div class="menu">
  <button class="menu-btn">Menú</button>

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

<!-- LOGO -->
<img src="{{ asset('img/Logito.png') }}" alt="Logo" class="logo-superior">

<!-- CONTENIDO -->
<div class="cuadro">
  <h1>Quién soy</h1>

  <p>
    Soy un estudiante comprometido con mi formación académica y personal.
    Me interesa aprender continuamente, desarrollar nuevas habilidades
    y aplicar mis conocimientos en proyectos reales.
  </p>

  <p>
    Me considero una persona responsable, curiosa y con interés en la tecnología,
    siempre buscando mejorar tanto en el ámbito académico como en el personal.
  </p>

  <ul>
    <li>Estudiante universitario</li>
    <li>Interesado en la tecnología y la programación</li>
    <li>Responsable y organizado</li>
    <li>Motivado por aprender cosas nuevas</li>
    <li>Comprometido con mis metas personales y profesionales</li>
  </ul>
</div>
<footer>
  <img src="{{ asset('img/pie_pagina.png') }}" alt="Pie de página institucional">
</footer>
</body>
</html>
