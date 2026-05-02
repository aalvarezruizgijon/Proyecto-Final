<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drivo | Inicio</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <!-- Iconos Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- CSS normal -->
    <link rel="stylesheet" href="../View/css/style.css">
    <link rel="shortcut icon" href="../View/img/logo.png" type="image/x-icon">
</head>
<body>
    <!-- HEADER -->
    <?php include '../View/header.php' ?>

    <!-- HERO -->
    <section class="hero__container">
        <img class="hero" src="../View/img/hero.png" alt="Hero">
    </section>

    <!-- MAIN -->
    <main class="main__container">
        <h1 class="title">NUESTRAS OFERTAS</h1>
        
        <!-- Flex -->
        <div class="ofertas__flex">
            <?php if (!empty($coches)): ?>
                <?php foreach ($coches as $coche): ?>
                    <!-- Card -->
                    <div class="oferta">
                        <h3 class="modelo"><?= $coche->getNombreCompleto() ?></h3>
                        
                        <div class="photo__container">
                            <img class="photo" src="../View/img/coches/<?= $coche->getImagen() ?>" alt="<?= $coche->getNombreCompleto() ?>">
                        </div>

                        <div class="info__container">
                            <p><i class="bi bi-gear"></i> Tracción <?= $coche->getTraccion() ?></p>
                            <p><i class="bi bi-life-preserver"></i> Monta llantas de <?= $coche->getLlantas() ?>"</p>
                            <p><i class="bi bi-engine-fill"></i> Motor de <?= strtolower($coche->getMotor()) ?></p>
                            <p><i class="bi bi-command"></i> Caja de cambios <?= strtolower($coche->getCambios()) ?></p>
                            <p><i class="bi bi-calendar-event"></i> Año <?= $coche->getAnio() ?></p>
                        </div>

                        <div class="reservar__container">
                            <div class="price__section">
                                <span class="price-label">PRECIO:</span>
                                <span class="price-value"><?= $coche->getPrecioDia() ?>€/día</span>
                            </div>
                            <a href="reservar.php?id=<?= $coche->getId() ?>" class="btn__reservar">RESERVAR AHORA</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-center w-100">No hay vehículos disponibles en este momento.</p>
            <?php endif; ?>
        </div>
    </main>

    <!-- NOSOTROS -->
    <section class="nosotros__container">
        <h2>SOBRE NOSOTROS</h2>
        
        <div class="nosotros__container--cont">
            <div class="texto">
                <p>Nacimos con una misión clara: transformar la experiencia de alquilar un coche.</p>
                <p>En Drivo, creemos que el proceso debe ser tan emocionante como el destino. Por eso, unimos la tecnología para una reserva ágil con un trato humano excepcional. Olvídate de la burocracia y la letra pequeña.</p>
                
                <strong>¿Por qué elegirnos?</strong>
                <ul>
                    <li><strong>Calidad asegurada:</strong> Una flota moderna y premium, revisada al milímetro.</li>
                    <li><strong>Transparencia total:</strong> El precio que ves es el que pagas. Sin sorpresas en el mostrador.</li>
                    <li><strong>Nuestro Equipo, Tu Viaje:</strong> Detrás de nuestra plataforma hay un equipo apasionado, dedicado a que tú solo te preocupes de disfrutar de la carretera.</li>
                </ul>
                
                <p>Gracias por confiar en Drivo para tu próxima aventura.</p>
            </div>

            <div class="image">
                <img class="image__img" src="../View/img/sobre nosotros.png" alt="Nosotros">
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <?php include '../View/footer.php' ?>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>