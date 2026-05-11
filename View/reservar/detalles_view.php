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
    <style>
        .detalle-container { padding-top: 4rem; padding-bottom: 6rem; background-color: #f8f9fa; }
        .card-detalle { border: none; border-radius: 1.2rem; box-shadow: 0 10px 30px rgba(0,0,0,0.05); overflow: hidden; background: white; }
        .reserva-header { background-color: #152D51; color: white; padding: 2rem; }
        .text-primary-drivo { color: #152D51; }
        .img-detalle { max-width: 100%; height: auto; filter: drop-shadow(0 10px 15px rgba(0,0,0,0.1)); }
        .info-label { font-weight: bold; color: #666; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 1px; }
        .info-value { font-weight: 600; color: #152D51; font-size: 1.1rem; }
    </style>

    <!-- HEADER -->
    <?php include '../View/header.php' ?>

    <main class="main__container detalle-container">
        <div class="container">
            <a href="../reservar/mis_reservas_view.php" class="btn btn-link text-decoration-none text-primary-drivo mb-4 ps-0">
                <i class="bi bi-arrow-left"></i> Volver a mis reservas
            </a>

            <div class="card card-detalle">
                <div class="reserva-header d-flex justify-content-between align-items-center flex-wrap gap-3">
                    <div>
                        <h2 class="mb-1 fw-bold">Reserva DRV<?= str_pad($reserva_detalle->getId(), 6, "0", STR_PAD_LEFT) ?></h2>
                        <p class="mb-0 opacity-75">Detalles de tu alquiler</p>
                    </div>
                    <span class="badge fs-6" style="background:#7BD5AB; color:#152D51; padding: 10px 20px; border-radius: 50px;">
                        <?= $reserva_detalle->getEstado() ?>
                    </span>
                </div>

                <div class="p-4 p-md-5">
                    <div class="row align-items-center g-5">
                        <div class="col-lg-5 text-center">
                            <img src="../View/img/coches/<?= pathinfo($vehiculo->getImagen(), PATHINFO_FILENAME) ?>--sin_fondo.png" alt="Coche" class="img-fluid img-detalle">
                            <h3 class="mt-4 fw-bold text-primary-drivo"><?= $vehiculo->getNombreCompleto() ?></h3>
                        </div>

                        <div class="col-lg-7">
                            <div class="row g-4 text-start">
                                <div class="col-sm-6">
                                    <p class="info-label mb-1">Recogida y Devolución</p>
                                    <p class="info-value"><i class="bi bi-geo-alt me-2"></i>Aeropuerto de Sevilla</p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="info-label mb-1">Precio Total</p>
                                    <p class="info-value text-success"><?= number_format($reserva_detalle->getPrecioTotal(), 2) ?>€</p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="info-label mb-1">Fecha Inicio</p>
                                    <p class="info-value"><?= date('d/m/Y', strtotime($reserva_detalle->getFechaInicio())) ?></p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="info-label mb-1">Fecha Fin</p>
                                    <p class="info-value"><?= date('d/m/Y', strtotime($reserva_detalle->getFechaFin())) ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- FOOTER -->
    <?php include '../View/footer.php' ?>
</body>
</html>