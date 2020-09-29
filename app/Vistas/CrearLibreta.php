<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Cuaderno de notas personal">
  <link rel="stylesheet" href="public/css/nuevoApunte/responsive.css" media="screen and (min-width:300px)">
  <link rel="stylesheet" href="public/css/nuevoApunte/responsiveDesk.css" media="screen and (min-width:1200px)">
  <title>CrearLibreta</title>
</head>
<body>

  <div class="contenedor">
    <header class="cabecera">
      <h3 class="cabeceraTitulo">Nueva Libreta</h3>
    </header>

    <main class="principal">

      <section class="apunte">

        <form action="" class="formulario" method="post" enctype="multipart/form-data">
          <label for="" id="nombreLibretaFormulario" class="labelFormulario">
            <span>Titulo</span>
            <input type="text" id="nombreLibretaFormulario" class="inputFormulario" name="nombreLibreta">
          </label>

          <label for="" id="imagenLibretaFormulario" class="labelFormulario">
            <span>Portada</span>
            <input type="file" id="imagenLibretaFormulario" class="inputFormulario" name="imagenLibreta">
          </label>

          <input type="submit" class="submitFormulario" value="Crear">

        </form>

        <nav class="navegador">
          <ul class="navegadorLista">
            <li class="navegadorItem"><a href="<?php echo RUTA_URL?>" class="navegadorLink">Home</a></li>
          </ul>
        </nav>

      </section>
    </main>

  </div><!--fin contenedor-->
</body>
</html>
