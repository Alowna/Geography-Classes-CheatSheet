<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/components/cacheReset.php';

$cartCalcStyle = cacheReset('/styles/cartcalc.css');
$cartCalcScript = cacheReset('/js/cartcalc.js');


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculos Cartográficos</title>

    <script type="module" src="<?= cacheReset('/components/headImports.php'); ?>"></script>
    <head-imports></head-imports>
    <link rel="stylesheet" href="<?= $cartCalcStyle ?>">


</head>
<body class="d-flex flex-column min-vh-100">
<header class="p-3 bg-dark text-white">
        
      <nav class="navbar navbar-expand-lg" data-bs-theme="dark">
        <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active  text-white" aria-current="page" href="/">Página Inicial</a>
              </li>

  <!--        <li class="nav-item">
                <a class="nav-link" href="#">Sobre</a>
              </li> -->

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white"  data-bs-auto-close="outside" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Anos
                </a>
                <ul class="dropdown-menu"  id="yearsDropdown">
                  <li class="dropend">
                    <a class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">1º Ano</a>
                    <ul class="dropdown-menu" id="1stSemesterYearsDropdown">
                      <li>
                        <a class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown">1 Semestre</a>
                        <ul class="dropdown-menu">
                          <li>
                            <a href="/pages/years/first-year/first-semester/cartcalc.php" class="dropdown-item">Calculos Cartográficos</a>
                            <a href="/pages/wip.php" class="dropdown-item">Climatologia</a>
                            <a href="/pages/wip.php" class="dropdown-item">Pensamento Geográfico</a>
                            <a href="/pages/wip.php" class="dropdown-item">Geologia</a>
                          </li>
                        </ul>
                      </li>
                      <li>
                        <a href="" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown">2 Semestre</a>
                        <ul class="dropdown-menu">
                          <li>
                            <a href="/pages/wip.php" class="dropdown-item">WIP</a>
                            <a href="/pages/wip.php" class="dropdown-item">WIP</a>
                            <a href="/pages/wip.php" class="dropdown-item">WIP</a>
                            <a href="/pages/wip.php" class="dropdown-item">WIP</a>
                          </li>
                        </ul>
                      </li>
                    </ul>
                  </li>

                  <!-- <li><a class="dropdown-item" href="#">Another action</a></li> -->
                  
                </ul>
              </li>
            </ul>
          </div>
        </div>

        <div class="container d-flex justify-content-end">
            <span class="mb-0 h2">Cálculos Cartográficos</span>
        </div>
      </nav>

    </header>

    <main class="flex-grow-1">
        <h1>Conversor de Medidas</h1>
        <div class="d-flex justify-content-center mw-100 mb-5">
            <div class="mw-100">
                
                <input type="number" class="form-control mb-3" id="centimeters" placeholder="Centimetros">
                <input type="number" class="form-control mb-3"" id="meters" placeholder="Metros">
                <input type="number" class="form-control mb-3"" id="kilometers" placeholder="Kilometros">
            </div>
        </div>

        <h1>Escala</h1>
        <div class="d-flex justify-content-center mw-100 mb-5">
            <div class="mw-100"> 
                <label for="measuredValueCm" class="form-label">Valor Medido (cm)</label>
                <input type="number" class="form-control" id="measuredValueCm" placeholder="Ex: 5">
                <label for="realValueCm" class="form-label">Valor Real (cm)</label>
                <input type="number" class="form-control" id="realValueCm" placeholder="Ex: 500000">
                <label class="form-label">Escala:</label>
                <span id="scaleResult" class="form-control">1 : ?</span>
            </div>
        </div>
        <h1>Coordenadas Cartográficas</h1>

        <div class="container pr-0 mx-0 justify-content-center mw-100">
            <div class="row">
                <div class="col">
                    <div class="row">
                        <h5>Variação Mapa</h5>
                        <div class="col d-flex flex-column align-items-center">
                            <h6 class="text-center">Longitude</h6>
                            <label class="form-label">Minuto</label>
                                        <input type="number" class="form-control" id="longitudeVariationMinute" placeholder="?'">
                                        <label class="form-label">Segundo</label>
                                        <input type="number" class="form-control" id="longitudeVariationSecond" placeholder="?''">
                                        <label class="form-label">Centimetros</label>
                                        <input type="number" class="form-control" id="longitudeVariationCentimeters" placeholder="?cm">
                        </div>
                        <div class="col d-flex flex-column align-items-center">
                            <h6 class="text-center">Latitude</h6>
                            <label class="form-label">Minuto</label>
                            <input type="number" class="form-control" id="latitudeVariationMinute" placeholder="?'">

                            <label class="form-label">Segundo</label>
                            <input type="number" class="form-control" id="latitudeVariationSecond" placeholder="?''">
                            <label class="form-label">Centimetros</label>
                            <input type="number" class="form-control" id="latitudeVariationCentimeters" placeholder="?cm">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <h5 class="text-center">Posição Mapa</h5>
                    <div class="row">
                        
                        <div class="col d-flex flex-column align-items-center">
                            <h6 class="text-center">Lontitude</h6>
                            <label class="form-label">Minuto</label>
                            <input type="number" class="form-control" id="mapLongitudeMinute" placeholder="?'">
                            <label class="form-label">Segundos</label>
                            <input type="number" class="form-control" id="mapLongitudeSecond" placeholder="?''">
                        </div>
                        <div class="col d-flex flex-column align-items-center">
                            <h6 class="text-center">Latitude</h6>
                            <label class="form-label">Minuto</label>
                            <input type="number" class="form-control" id="mapLatitudeMinute" placeholder="?'">
                            <label class="form-label">Segundos</label>
                            <input type="number" class="form-control" id="mapLatitudeSecond" placeholder="?''">
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <h5>Medidas do Local</h5>
                <div class="col d-flex flex-column align-items-center">
                    <h6 class="text-center">Longitude</h6>
                            <input type="number" class="form-control" id="localCentimetersLongitude" placeholder="?cm">
                </div>
                <div class="col d-flex flex-column align-items-center">
                    <h6 class="text-center">Latitude</h6>
                            <input type="number" class="form-control" id="localCentimetersLatitude" placeholder="?cm">
                </div>
            </div>
        </div>
        <br>

        <div class="d-flex justify-content-center mb-5">
            <button id="calcCoordButton" type="button" class="btn btn-dark">Calcular</button>
        </div>

        <h5>Coordenadas do Local</h5>
        <div class="container d-flex justify-content-center">
            
            <div class="row mx-1">
                <h6>Longitude</h6>
                <div class="col">
                    <span id="coordResultMinuteLongitude" class="form-control">Minuto</span>
                </div>
                <div class="col">
                    <span id="coordResultSecondLongitude" class="form-control">Segundo</span>
                </div>
            </div>
            <div class="row mx-1">
                <h6>Latitude</h6>
                <div class="col">
                    <span id="coordResultMinuteLatitude" class="form-control">Minuto</span>
                </div>
                <div class="col">
                    <span id="coordResultSecondLatitude" class="form-control">Segundo</span>
                </div>
            </div>
        </div>
    </main>
                    
    <footer-component></footer-component>
    <script type="module" src="<?= $cartCalcScript?>"></script>
</body>
</html>