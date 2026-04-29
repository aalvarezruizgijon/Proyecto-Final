<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drivo | Mis Reservas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    
    <style>
        .main__container {
            padding-bottom: 100px;
        }

        .title {
            color: #1a2a40;
            font-weight: 800;
            margin: 50px 0;
            text-align: center;
            font-size: 2.5rem;
        }

        /* --- ESTILO DE LAS CARDS (SIN FONDO EN TÍTULO) --- */
        .reserva-card {
            background-color: white;
            border-radius: 20px;
            border: 1px solid #efefef;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            margin-bottom: 40px;
            max-width: 900px;
            margin-left: auto;
            margin-right: auto;
            padding: 30px;
        }

        /* Título limpio como en la imagen */
        .reserva-modelo {
            color: #1a2a40;
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 20px;
            display: block;
        }

        .reserva-body {
            display: flex;
            align-items: center;
            gap: 40px;
        }

        .card-destacada {
            max-width: 1000px; /* Más ancha */
            border: 1px solid #e0e0e0;
            box-shadow: 0 15px 40px rgba(0,0,0,0.1);
        }

        .card-destacada .reserva-modelo {
            font-size: 2.2rem; /* Título más grande */
        }

        .card-destacada .reserva-img {
            width: 120%; /* Aumenta visualmente el coche */
            transform: scale(1.1);
        }

        /* --- IMÁGENES Y TEXTO --- */
        .reserva-img-container {
            flex: 1;
            display: flex;
            justify-content: center;
        }

        .reserva-img {
            width: 100%;
            height: auto;
            object-fit: contain;
        }

        .reserva-info {
            flex: 1;
        }

        .reserva-info p {
            margin-bottom: 15px;
            font-size: 1.1rem;
            color: #555;
            line-height: 1.4;
        }

        .reserva-info strong {
            color: #1a2a40;
        }

        /* Botón */
        .reserva-footer {
            margin-top: 20px;
            display: flex;
            justify-content: flex-start;
        }

        .btn-modificar {
            border: 2px solid #1a2a40;
            color: #1a2a40;
            padding: 12px 35px;
            border-radius: 10px;
            text-decoration: none;
            transition: all 0.3s;
            font-weight: 700;
            text-transform: uppercase;
        }

        .btn-modificar:hover {
            background-color: #1a2a40;
            color: white;
        }

        /* Historial*/
        .section-subtitle {
            max-width: 900px;
            margin: 60px auto 30px auto;
            color: #1a2a40;
            font-weight: 700;
            font-size: 1.8rem;
        }

        .historial-card .reserva-modelo {
            font-size: 1.4rem;
        }

        .historial-card .reserva-img {
            max-width: 250px;
        }

        @media (max-width: 768px) {
            .reserva-body { flex-direction: column; text-align: center; }
            .reserva-info { padding: 0; }
        }
    </style>
</head>
<body>

    <header class="header__container">
        <div class="logo__container">
            <img class="logo" src="../img/logo.png" alt="Drivo Logo">
        </div>
        <div class="links__container">
            <nav class="nav">
                <a class="link" href="../View/coches.php">Ver coches</a>
                <a class="link" href="../View/reservas.php" style="color:#7BD5AB ;">Mis reservas</a>
                <a class="link" href="../View/contacto.php">Contactanos</a>
            </nav>
            <div class="icon--user">
                <i class="bi bi-person-fill icon"></i>
            </div>
        </div>
    </header>

    <main class="main__container container">
        <h1 class="title">MIS RESERVAS</h1>

        <div class="reserva-card card-destacada">
            <span class="reserva-modelo">Proxima Reserva: Audi A4 - Ref: DRV123456</span>
            
            <div class="reserva-body">
                <div class="reserva-img-container">
                    <img src="../img/coches/audi_a4--sin_fondo.png" alt="Audi A4" class="reserva-img">
                </div>
                <div class="reserva-info">
                    <p><strong>Recogida:</strong> 18/12/2025, 10 AM, <br>Aeropuerto Sevilla</p>
                    <p><strong>Devolución:</strong> 20/12/2025, 10 AM, <br>Aeropuerto Sevilla</p>
                    <p><strong>Estado:</strong> <span style="color: #28a745; font-weight: 800;">Confirmada</span></p>
                    
                    <div class="reserva-footer">
                        <a href="#" class="btn-modificar">Ver Detalles / Modificar</a>
                    </div>
                </div>
            </div>
        </div>

        <h3 class="section-subtitle">Historial de reservas</h3>

        <div class="reserva-card historial-card">
            <span class="reserva-modelo">Porsche Cayenne - Ref: DRV112233</span>
            <div class="reserva-body">
                <div class="reserva-img-container">
                    <img src="../img/coches/porsche_cayenne--sin_fondo.png" alt="Porsche" class="reserva-img">
                </div>
                <div class="reserva-info">
                    <p><strong>Estado:</strong> <span class="text-muted">(Completada)</span></p>
                </div>
            </div>
        </div>

        <div class="reserva-card historial-card">
            <span class="reserva-modelo">Volkswagen Tiguan - Ref: DRV998877</span>
            <div class="reserva-body">
                <div class="reserva-img-container">
                    <img src="../img/coches/volkswagen_tiguan--sin_fondo.png" alt="Tiguan" class="reserva-img">
                </div>
                <div class="reserva-info">
                    <p><strong>Estado:</strong> <span class="text-muted">(Completada)</span></p>
                </div>
            </div>
        </div>
    </main>

    <footer class="footer__container">
        <div class="footer__content">
            <div class="footer__column">
                <h3>SOBRE NOSOTROS</h3>
                <p>En Drivo, eliminamos la burocracia y la letra pequeña. Combinamos tecnología ágil con un trato humano excepcional.</p>
                <p class="slogan">Nuestro Equipo, Tu Viaje.</p>
            </div>
            <div class="footer__column">
                <h3>ENLACES</h3>
                <ul class="footer__links">
                    <li><a href="../index.html">· Pagina Principal</a></li>
                    <li><a href="coches.php">· Ver coches</a></li>
                    <li><a href="reservas.php">· Mis reservas</a></li>
                    <li><a href="contacto.php">· Contactanos</a></li>
                </ul>
            </div>
            <div class="footer__column">
                <h3>DONDE ENCONTRARNOS</h3>
                <div class="map__container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3175.7607730925!2d-5.7833!3d37.1833!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzfCsDExJzAwLjAiTiA1wrA0NycwMC4wIlc!5e0!3m2!1ses!2ses!4v1700000000000" width="100%" height="150" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
        <div class="footer__bottom">
            <p>Derechos de autor a Drivo© 2025</p>
        </div>
    </footer>
</body>
</html>