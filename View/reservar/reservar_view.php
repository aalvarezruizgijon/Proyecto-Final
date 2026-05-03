<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drivo | Reservar Vehículo</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../View/css/style.css">
    <link rel="shortcut icon" href="../View/img/logo.png" type="image/x-icon">
    <style>
        .btn-full {
            width: 100%;
            border: none;
            background-color: #fff;
            color: #152D51;
            font-weight: bold;
            padding: 12px;
            border-radius: 0.8rem;
            transition: background 0.3s;
        }
        .btn-full:hover {
            background-color: #7BD5AB; /* Color secundario[cite: 1] */
        }
        .reserva-container {
            padding-top: 3rem;
            padding-bottom: 5rem;
        }
        .img-reserva {
            width: 100%;
            border-radius: 1rem;
            border: 1px solid #ccc;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        /* Estilo para el desglose de precios */
        .price-summary {
            background-color: #f8f9fa;
            border-radius: 0.8rem;
            border: 1px solid #dee2e6;
        }
    </style>
</head>
<body>
    <?php include '../View/header.php' ?>

    <main class="main__container reserva-container">
        <div class="row g-5">
            <!-- Columna Izquierda: Imagen y Detalles -->
            <div class="col-lg-7">
                <div class="oferta p-0 w-100" style="border-radius: 1.5rem; overflow: hidden;">
                    <img src="../View/img/coches/<?= pathinfo($coche->getImagen(), PATHINFO_FILENAME) ?>--sin_fondo.png" class="img-reserva" alt="<?= $coche->getNombreCompleto() ?>">
                    
                    <div class="p-4">
                        <h2 class="text-uppercase fw-bold mb-3" style="color: #152D51;"><?= $coche->getNombreCompleto() ?></h2>
                        <div class="row info__container p-0">
                            <div class="col-md-6">
                                <p><i class="bi bi-car-front"></i> Tracción <?= $coche->getTraccion() ?></p>
                                <p><i class="bi bi-speedometer2"></i> Motor <?= $coche->getMotor() ?></p>
                            </div>
                            <div class="col-md-6">
                                <p><i class="bi bi-gear-wide-connected"></i> Cambio <?= $coche->getCambios() ?></p>
                                <p><i class="bi bi-calendar-date"></i> Año <?= $coche->getAnio() ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Columna Derecha: Formulario de Reserva -->
            <div class="col-lg-5">
                <div class="oferta p-4 w-100" style="position: relative;">
                    <h2 class="modelo" style="position: absolute; top: -15px; left: 50%; transform: translateX(-50%); width: 240px;">
                        TU RESERVA
                    </h2>

                    <form action="../Controller/ProcesarReserva.php" method="POST" class="mt-4 needs-validation" novalidate>
                        <input type="hidden" name="id_coche" value="<?= $coche->getId() ?>">
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Fecha de Recogida</label>
                            <input type="date" id="fecha_inicio" name="fecha_inicio" class="form-control" 
                                   style="border-radius: 0.8rem;" required onchange="validarFechas()">
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Fecha de Devolución</label>
                            <input type="date" id="fecha_fin" name="fecha_fin" class="form-control" 
                                   style="border-radius: 0.8rem;" required onchange="calcularTotal()">
                        </div>

                        <!-- Sección de Precios Dinámica -->
                        <div class="price-summary mb-4 p-3">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="fw-bold" style="color: #152D51; font-size: 0.85rem;">PRECIO POR DÍA</span>
                                <span class="fw-bold" style="color: #152D51;"><?= $coche->getPrecioDia() ?>€</span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-bold" style="color: #152D51;">PRECIO TOTAL</span>
                                <span id="precio_total" class="fw-bold" style="color: #7BD5AB; font-size: 1.4rem;">0€</span>
                            </div>
                        </div>

                        <div class="reservar__container" style="margin: 0; padding: 5px;">
                            <button type="submit" class="btn-full">
                                CONFIRMAR RESERVA
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <?php include '../View/footer.php' ?>

    <script>
        const precioPorDia = <?= $coche->getPrecioDia() ?>;

        function validarFechas() {
            const fInicio = document.getElementById('fecha_inicio');
            const fFin = document.getElementById('fecha_fin');
            
            // La fecha de fin no puede ser menor a la de inicio
            fFin.min = fInicio.value;
            
            if (fFin.value && fFin.value < fInicio.value) {
                fFin.value = fInicio.value;
            }
            calcularTotal();
        }

        function calcularTotal() {
            const inicio = document.getElementById('fecha_inicio').value;
            const fin = document.getElementById('fecha_fin').value;
            const totalDisplay = document.getElementById('precio_total');

            if (inicio && fin) {
                const fecha1 = new Date(inicio);
                const fecha2 = new Date(fin);
                
                // Calculamos la diferencia en milisegundos
                const diffTime = fecha2 - fecha1;
                // Pasamos a días (sumamos 1 para incluir el día de inicio)
                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1;

                if (diffDays > 0) {
                    totalDisplay.innerText = (diffDays * precioPorDia) + "€";
                } else {
                    totalDisplay.innerText = "0€";
                }
            }
        }

        // Validación de Bootstrap
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
