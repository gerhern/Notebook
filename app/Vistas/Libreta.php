<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Cuaderno de notas personal">
  <link rel="stylesheet" href="../public/css/cssLibreta/responsive.css" media="screen and (min-width:300px)">
  <link rel="stylesheet" href="../public/css/cssLibreta/responsiveDesk.css" media="screen and (min-width:1200px)">
  <title>NB/<?php echo $libreta['nombre_materia'] ?></title>
</head>
<body>
  <div class="contenedor">
    <header class="cabecera">
      <figure class="cabeceraFig">
        <img src="../public/img/<?php echo $libreta['img_materia']?>" alt="Logo Notebook">
      </figure>
      <h3 class="cabeceraTitulo"><?php echo $libreta['nombre_materia']?></h3>
    </header>

    <main class="principal">

      <nav class="navegador">
        <ul class="navegadorLista">
          <li class="navegadorItemSimbolo"><figure class="simboloNavegador"><img src="../public/img/menu.svg" alt="Menu"></figure></li>
          <li class="navegadorItem"><a href="<?php echo RUTA_URL ?>" class="navegadorLink"><<</a></li>
          <li class="navegadorItem"><a href="../agregarApunte/<?php echo $libreta['id_materia']?>" class="navegadorLink">+</a></li>
          <?php
          if($libreta == null){
            echo "No existen datos";
          }else{
            foreach ($nlibretas as $libretas) { ?>
              <li class="navegadorItem"><a href="../verLibreta/<?php echo $libretas['id_materia'] ?>" class="navegadorLink"><?php echo  $libretas['nombre_materia']?></a></li>
            <?php }
          }
          ?>
        </ul>
      </nav>

      <section class="apunte">
        <?php foreach ($datos as $apunte) {
          ?>
          <article class="apunteArticle">
            <div class="apunteCabecera">
              <div class="titulo">
                <h2><?php echo $apunte['tema_apunte']?></h2>
              </div>
            </div><!--fin de div apuntecabecera-->
            <div class="apunteTexto">
              <p><?php echo $apunte['texto_apunte']?></p>
            </div><!--fin de texto cabecera-->
            <div class="fechaApunte">
              <h2><?php echo $apunte['fecha_apunte']?></h2>
            </div>
          </article>
        <?php } ?>
      </section>
    </main>

  </div><!--fin contenedor-->
</body>
</html>
