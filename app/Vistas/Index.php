<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Cuaderno de notas personal">
  <link rel="stylesheet" href="public/css/cssIndex/responsive.css" media="screen and (min-width:300px)">
  <link rel="stylesheet" href="public/css/cssIndex/responsiveTablet.css" media="screen and (min-width:700px)">
  <link rel="stylesheet" href="public/css/cssIndex/responsiveDesk.css" media="screen and (min-width:1200px)">
  <title>Notebook</title>
</head>
<body>
  <div class="contenedor">
    <header class="cabecera">
      <figure class="cabeceraFig">
        <img src="public/img/logo.svg" alt="Logo Notebook">
      </figure>
      <h3>Notebook</h3>
    </header>


    <nav class="navegador">
      <ul class="navegadorLista">
        <li class="navegadorItem"><a href="nuevaLibreta" class="navegadorLink">+</a></li>
        <?php
        if($datos == null){
          echo "No existen datos";
        }else{
          foreach ($datos as $libreta) { ?>
            <li class="navegadorItem"><a href="verLibreta/<?php echo $libreta['id_materia'] ?>" class="navegadorLink"><?php echo  $libreta['nombre_materia']?></a></li>
          <?php }
        }
        ?>
      </ul>
    </nav>

    <main class="principal">
      <section class="cuadernos">
      <?php
        if($datos == null){
          echo '<h1>No hay datos para mostrar</h1>';
        }else{
          foreach ($datos as $libreta) { ?>
            <article class="cuadernosArticle">
              <figure class="cuadernosArticleImg">
                <img src="public/img/<?php echo $libreta['img_materia']?>" alt="Img Cuaderno">
              </figure>
              <figcaption><?php echo $libreta['nombre_materia']?></figcaption>
              <ul class="cuadernosLista">
                <li class="navegadorItem">
                  <a href="verLibreta/<?php echo $libreta['id_materia']?>" class="navegadorLink">Ver Apuntes</a>
                </li>
                <li class="navegadorItem">
                  <a href="#" class="navegadorLink">Editar Libreta</a>
                </li>
                <li class="navegadorItem">
                  <a href="#" class="navegadorLink">Eliminar Libreta</a>
                </li>
              </ul>
            </article>
        <?php  }//fin for
        }//fin elseif
        ?>

      </section>
    </main>

  </div><!--fin contenedor-->
</body>
</html>
