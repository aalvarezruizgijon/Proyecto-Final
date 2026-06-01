<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drivo | Pago Seguro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../View/css/style.css">
    <link rel="stylesheet" href="../View/css/pago.css">
    <link rel="shortcut icon" href="../View/img/logo.png" type="image/x-icon">
</head>
<body class="bg-white">
    <?php include '../View/header.php' ?>

    <main class="main__container pago-container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="row g-0 card-pago shadow-lg">
                    
                    <div class="col-12 col-md-5 order-1 p-0">
                        <div class="resumen-reserva h-100 p-4 p-md-5 bg-primary-drivo text-white">
                            <h3 class="fw-bold mb-4 text-secondary-drivo">Tu Reserva</h3>
                            
                            <div class="text-center mb-4">
                                <img src="../View/img/coches/<?= pathinfo($coche->getImagen(), PATHINFO_FILENAME) ?>--sin_fondo.png" 
                                     alt="<?= $coche->getNombreCompleto() ?>" 
                                     class="resumen-img img-fluid"
                                     style="max-height: 240px; object-fit: contain;">
                            </div>
                            
                            <h4 class="mb-4 text-center text-md-start"><?= $coche->getNombreCompleto() ?></h4>
                            
                            <div class="resumen-detalles">
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="opacity-75">Recogida</span>
                                    <span class="fw-bold"><?= date('d/m/Y', strtotime($fecha_inicio)) ?></span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="opacity-75">Devolución</span>
                                    <span class="fw-bold"><?= date('d/m/Y', strtotime($fecha_fin)) ?></span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="opacity-75">Días totales</span>
                                    <span><?= $dias ?></span>
                                </div>
                                <div class="d-flex justify-content-between mb-4">
                                    <span class="opacity-75">Precio por día</span>
                                    <span><?= $coche->getPrecioDia() ?>€</span>
                                </div>
                                
                                <hr class="border-light opacity-25">
                                
                                <div class="d-flex justify-content-between align-items-center mt-4">
                                    <span class="fs-5 opacity-75">Total</span>
                                    <span class="fs-2 fw-bold text-secondary-drivo"><?= $precio_total ?>€</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-7 order-2 p-4 p-md-5 bg-white">
                        <h2 class="fw-bold mb-4 text-primary-drivo">Detalles de Pago</h2>
                        <p class="text-muted mb-4">Introduce los datos de tu tarjeta para finalizar la reserva.</p>

                        <form action="../Controller/procesar_pago.php" method="POST" class="needs-validation" novalidate>
                            <input type="hidden" name="id_coche" value="<?= $coche->getId() ?>">
                            <input type="hidden" name="fecha_inicio" value="<?= $fecha_inicio ?>">
                            <input type="hidden" name="fecha_fin" value="<?= $fecha_fin ?>">
                            <input type="hidden" name="precio_total" value="<?= $precio_total ?>">

                            <div class="mb-4">
                                <label class="form-label fw-bold">Titular de la tarjeta</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0"><i class="bi bi-person"></i></span>
                                    <input type="text" class="form-control bg-light border-start-0 ps-0" placeholder="Nombre completo" required>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold">Número de tarjeta</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0"><i class="bi bi-credit-card"></i></span>
                                    <input type="text" class="form-control bg-light border-start-0 ps-0" placeholder="0000 0000 0000 0000" maxlength="16" required>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-6">
                                    <label class="form-label fw-bold">Expiración</label>
                                    <input type="text" class="form-control bg-light" placeholder="MM/YY" maxlength="5" required>
                                </div>
                                <div class="col-6">
                                    <label class="form-label fw-bold">CVV</label>
                                    <input type="password" class="form-control bg-light" placeholder="123" maxlength="3" required>
                                </div>
                            </div>

                            <div class="p-3 mb-4 rounded-custom bg-light d-flex align-items-center">
                                <i class="bi bi-shield-check text-success fs-4 me-3"></i>
                                <span class="small text-muted">Tu pago está protegido con encriptación SSL de 256 bits.</span>
                            </div>

                            <button type="submit" class="btn-pay w-100">
                                PAGAR <?= $precio_total ?>€ AHORA
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </main>

    <?php include '../View/footer.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        (() => {
          'use strict'
          const forms = document.querySelectorAll('.needs-validation')
          Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
              if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
              }
              form.classList.add('was-validated')
            }, false)
          })
        })()
    </script>
</body>
</html>