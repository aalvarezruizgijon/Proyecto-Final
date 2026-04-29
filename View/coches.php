<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drivo | Nuestros Coches</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    
    <style>
        /* Ajuste para que las tarjetas no toquen el footer */
        .main__container {
            padding-bottom: 100px;
        }

        .ofertas__flex {
            margin-bottom: 40px;
        }

        /* Asegurar que las fotos mantengan un tamaño uniforme */
        .photo {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
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
                <a class="link" href="../View/coches.php" style="color:#7BD5AB;">Ver coches</a>
                <a class="link" href="../View/reservas.php">Mis reservas</a>
                <a class="link" href="../View/contacto.php">Contactanos</a>
            </nav>
            <div class="icon--user">
                <i class="bi bi-person-fill icon"></i>
            </div>
        </div>
    </header>

    <main class="main__container">
        <h1 class="title">NUESTROS COCHES</h1>
        
        <div class="ofertas__flex">
            <div class="oferta">
                <h3 class="modelo">AUDI A4</h3>
                <div class="photo__container">
                    <img class="photo" src="../img/coches/audi_a4.avif" alt="Audi A4">
                </div>
                <div class="info__container">
                    <p><i class="bi bi-gear"></i> Tracción a las 4 ruedas</p>
                    <p><i class="bi bi-life-preserver"></i> Monta llantas de 19'</p>
                    <p><i class="bi bi-engine-fill"></i> Motor de gasolina 2.0 TFSI 197cv</p>
                    <p><i class="bi bi-command"></i> Caja de cambios automatica</p>
                    <p><i class="bi bi-calendar-event"></i> Año 2019</p>
                </div>
                <div class="reservar__container">
                    <div class="price__section">
                        <span class="price-label">PRECIO:</span>
                        <span class="price-value">75€/día</span>
                    </div>
                    <a href="#" class="btn__reservar">RESERVAR AHORA</a>
                </div>
            </div>

            <div class="oferta">
                <h3 class="modelo">PORSCHE CAYENNE</h3>
                <div class="photo__container">
                    <img class="photo" src="../img/coches/porsche_cayenne.jpg" alt="Porsche Cayenne">
                </div>
                <div class="info__container">
                    <p><i class="bi bi-gear"></i> Tracción a las 4 ruedas</p>
                    <p><i class="bi bi-life-preserver"></i> Monta llantas de 21'</p>
                    <p><i class="bi bi-engine-fill"></i> Motor de gasolina V8 Biturbo 500cv</p>
                    <p><i class="bi bi-command"></i> Caja de cambios automatica</p>
                    <p><i class="bi bi-calendar-event"></i> Año 2023</p>
                </div>
                <div class="reservar__container">
                    <div class="price__section">
                        <span class="price-label">PRECIO:</span>
                        <span class="price-value">145€/día</span>
                    </div>
                    <a href="#" class="btn__reservar">RESERVAR AHORA</a>
                </div>
            </div>

            <div class="oferta">
                <h3 class="modelo">VOLKSWAGEN TIGUAN</h3>
                <div class="photo__container">
                    <img class="photo" src="../img/coches/volkswagen_tiguan.webp" alt="Volkswagen Tiguan">
                </div>
                <div class="info__container">
                    <p><i class="bi bi-gear"></i> Tracción a las 4 ruedas</p>
                    <p><i class="bi bi-life-preserver"></i> Monta llantas de 19'</p>
                    <p><i class="bi bi-engine-fill"></i> Motor diesel 2.0 TDI 150cv</p>
                    <p><i class="bi bi-command"></i> Caja de cambios automatica</p>
                    <p><i class="bi bi-calendar-event"></i> Año 2018</p>
                </div>
                <div class="reservar__container">
                    <div class="price__section">
                        <span class="price-label">PRECIO:</span>
                        <span class="price-value">115€/día</span>
                    </div>
                    <a href="#" class="btn__reservar">RESERVAR AHORA</a>
                </div>
            </div>

            <div class="oferta">
                <h3 class="modelo">VOLKSWAGEN GOLF</h3>
                <div class="photo__container">
                    <img class="photo" src="../img/coches/volkswagen_golf_gti.avif" alt="Volkswagen Golf">
                </div>
                <div class="info__container">
                    <p><i class="bi bi-gear"></i> Tracción a las 4 ruedas</p>
                    <p><i class="bi bi-life-preserver"></i> Monta llantas de 19'</p>
                    <p><i class="bi bi-engine-fill"></i> Motor de gasolina 2.0 TFSI 241cv</p>
                    <p><i class="bi bi-command"></i> Caja de cambios automatica</p>
                    <p><i class="bi bi-calendar-event"></i> Año 2025</p>
                </div>
                <div class="reservar__container">
                    <div class="price__section">
                        <span class="price-label">PRECIO:</span>
                        <span class="price-value">99€/día</span>
                    </div>
                    <a href="#" class="btn__reservar">RESERVAR AHORA</a>
                </div>
            </div>

            <div class="oferta">
                <h3 class="modelo">FORD EXPLORER</h3>
                <div class="photo__container">
                    <img class="photo" src="../img/coches/ford_explorer.webp" alt="Ford Explorer">
                </div>
                <div class="info__container">
                    <p><i class="bi bi-gear"></i> Tracción a las 4 ruedas</p>
                    <p><i class="bi bi-life-preserver"></i> Monta llantas de 19'</p>
                    <p><i class="bi bi-engine-fill"></i> Motor gasolina 2.3 EcoBoost 300cv</p>
                    <p><i class="bi bi-command"></i> Caja de cambios automatica</p>
                    <p><i class="bi bi-calendar-event"></i> Año 2025</p>
                </div>
                <div class="reservar__container">
                    <div class="price__section">
                        <span class="price-label">PRECIO:</span>
                        <span class="price-value">69€/día</span>
                    </div>
                    <a href="#" class="btn__reservar">RESERVAR AHORA</a>
                </div>
            </div>

            <div class="oferta">
                <h3 class="modelo">MAZDA CX-5</h3>
                <div class="photo__container">
                    <img class="photo" src="../img/coches/mazda_cx-5.webp" alt="Mazda CX-5">
                </div>
                <div class="info__container">
                    <p><i class="bi bi-gear"></i> Tracción delantera</p>
                    <p><i class="bi bi-life-preserver"></i> Monta llantas de 19'</p>
                    <p><i class="bi bi-engine-fill"></i> Motor de gasolina 2.0 165cv</p>
                    <p><i class="bi bi-command"></i> Caja de cambios manual 6v</p>
                    <p><i class="bi bi-calendar-event"></i> Año 2021</p>
                </div>
                <div class="reservar__container">
                    <div class="price__section">
                        <span class="price-label">PRECIO:</span>
                        <span class="price-value">55€/día</span>
                    </div>
                    <a href="#" class="btn__reservar">RESERVAR AHORA</a>
                </div>
            </div>

            <div class="oferta">
                <h3 class="modelo">RENAULT ARKANA</h3>
                <div class="photo__container">
                    <img class="photo" src="../img/coches/renault_arkana.jpg" alt="Renault Arkana">
                </div>
                <div class="info__container">
                    <p><i class="bi bi-gear"></i> Tracción delantera</p>
                    <p><i class="bi bi-life-preserver"></i> Monta llantas de 18'</p>
                    <p><i class="bi bi-engine-fill"></i> Motor E-TECH Híbrido 140 CV</p>
                    <p><i class="bi bi-command"></i> Caja de cambios automatica</p>
                    <p><i class="bi bi-calendar-event"></i> Año 2021</p>
                </div>
                <div class="reservar__container">
                    <div class="price__section">
                        <span class="price-label">PRECIO:</span>
                        <span class="price-value">65€/día</span>
                    </div>
                    <a href="#" class="btn__reservar">RESERVAR AHORA</a>
                </div>
            </div>

            <div class="oferta">
                <h3 class="modelo">PEUGEOT 3008</h3>
                <div class="photo__container">
                    <img class="photo" src="../img/coches/peugeot_3008.jpg" alt="Peugeot 3008">
                </div>
                <div class="info__container">
                    <p><i class="bi bi-gear"></i> Tracción delantera</p>
                    <p><i class="bi bi-life-preserver"></i> Monta llantas de 18'</p>
                    <p><i class="bi bi-engine-fill"></i> Motor diésel 1.5 BlueHDI 130cv</p>
                    <p><i class="bi bi-command"></i> Caja de cambios automatica</p>
                    <p><i class="bi bi-calendar-event"></i> Año 2022</p>
                </div>
                <div class="reservar__container">
                    <div class="price__section">
                        <span class="price-label">PRECIO:</span>
                        <span class="price-value">35€/día</span>
                    </div>
                    <a href="#" class="btn__reservar">RESERVAR AHORA</a>
                </div>
            </div>

            <div class="oferta">
                <h3 class="modelo">CITRÖEN C3</h3>
                <div class="photo__container">
                    <img class="photo" src="../img/coches/citroen_c3.jpg" alt="Citröen C3">
                </div>
                <div class="info__container">
                    <p><i class="bi bi-gear"></i> Tracción delantera</p>
                    <p><i class="bi bi-life-preserver"></i> Monta llantas de 17'</p>
                    <p><i class="bi bi-engine-fill"></i> Motor de gasolina 1.2 PureTech 82cv</p>
                    <p><i class="bi bi-command"></i> Caja de cambios manual 6v</p>
                    <p><i class="bi bi-calendar-event"></i> Año 2020</p>
                </div>
                <div class="reservar__container">
                    <div class="price__section">
                        <span class="price-label">PRECIO:</span>
                        <span class="price-value">29€/día</span>
                    </div>
                    <a href="#" class="btn__reservar">RESERVAR AHORA</a>
                </div>
            </div>
        </div>
    </main>

    <footer class="footer__container">
        <div class="footer__content">
            <div class="footer__column">
                <h3>SOBRE NOSOTROS</h3>
                <p>En Drivo, eliminamos la burocracia y la letra pequeña. Combinamos tecnología ágil con un trato humano excepcional para que tu única preocupación sea disfrutar de la carretera.</p>
                <p>Ofrecemos una flota premium, precios transparentes sin sorpresas y un compromiso total contigo.</p>
                <p class="slogan">Nuestro Equipo, Tu Viaje.</p>
            </div>

            <div class="footer__column">
                <h3>ENLACES</h3>
                <ul class="footer__links">
                    <li><a href="../index.html">· Pagina Principal</a></li>
                    <li><a href="#">· Ver ofertas</a></li>
                    <li><a href="#">· Ver coches</a></li>
                    <li><a href="#">· Mis reservas</a></li>
                    <li><a href="#">· Contactanos</a></li>
                </ul>
            </div>

            <div class="footer__column">
                <h3>DONDE ENCONTRARNOS</h3>
                <div class="map__container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d194347.38000055272!2d-3.8196195240356515!3d40.41436284698379!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd422997800a3c81%3A0xc436dec1618c2269!2sMadrid!5e0!3m2!1ses!2ses!4v1714560000000!5m2!1ses!2ses" width="100%" height="150" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>

        <div class="footer__bottom">
            <p>Derechos de autor a Drivo© 2025</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>