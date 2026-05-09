<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drivo | Nuestros Coches</title>
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

    <!-- MAIN -->
    <main class="bg-white w-100 pb-5 pt-1">
        <div class="main__container">
            <h1 class="title mt-3">NUESTROS COCHES</h1>
            
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
                            <p><i class="bi bi-car-front"></i> Tracción <?= $coche->getTraccion() ?></p>
                            <p><i class="bi bi-record-circle"></i> Monta llantas de <?= $coche->getLlantas() ?>"</p>
                            <p><i class="bi bi-speedometer2"></i> Motor de <?= strtolower($coche->getMotor()) ?></p>
                            <p><i class="bi bi-gear-wide-connected"></i> Caja de cambios <?= strtolower($coche->getCambios()) ?></p>
                            <p><i class="bi bi-calendar-date"></i> Año <?= $coche->getAnio() ?></p>
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
                <p class="text-center w-100">No hay vehículos en nuestro catálogo en este momento.</p>
            <?php endif; ?>
        </div>
        </div>
    </main>

    <!-- FOOTER -->
    <?php include '../View/footer.php' ?>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
