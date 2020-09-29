<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Cuaderno de notas personal">
  <link rel="stylesheet" href="../public/css/nuevoApunte/responsive.css" media="screen and (min-width:300px)">
  <link rel="stylesheet" href="../public/css/nuevoApunte/responsiveDesk.css" media="screen and (min-width:1200px)">
  <title>CrearApunte</title>
</head>
<body>

  <div class="contenedor">
    <header class="cabecera">
      <figure class="cabeceraFig">
        <img src="../public/img/<?php echo $datos['img_materia']?>" alt="Logo Notebook">
      </figure>
      <h3 class="cabeceraTitulo"><?php echo $datos['nombre_materia']?></h3>
    </header>

    <main class="principal">

      <section class="apunte">

        <form action="" class="formulario" method="post">
          <label for="" id="fechaFormulario" class="labelFormulario">
            <span>Fecha</span>
            <input type="date" id="fechaFormulario" class="inputFormulario" name="fecha">
          </label>

          <label for="" id="tituloFormulario" class="labelFormulario">
            <span>Titulo</span>
            <input type="text" id="tituloFormulario" class="inputFormulario" name="titulo">
          </label>

          <label for="" id="texto" class="labelFormulario">
            <span>Apunte</span>
            <textarea name="texto" class="textarea inputFormulario" ></textarea>
          </label>

          <label for="" class="labelFormulario">
            <span>Unidad</span>
            <input type="number" class="inputFormulario" name="unidad">
          </label>

          <input type="hidden" name="id" value="<?php echo $datos['id_materia']?>">

          <input type="submit" class="submitFormulario">

        </form>

        <nav class="navegador">
          <ul class="navegadorLista">
            <li class="navegadorItem"><a href="<?php echo RUTA_URL?>verLibreta/<?php echo $datos['id_materia']?>" class="navegadorLink"><<</a></li>
            <li class="navegadorItem"><a href="<?php echo RUTA_URL?>" class="navegadorLink">Home</a></li>
          </ul>
        </nav>

      </section>
    </main>

  </div><!--fin contenedor-->
</body>
</html>
