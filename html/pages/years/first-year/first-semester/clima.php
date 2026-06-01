<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/assets/components/cacheReset.php';

$cartCalcStyle = cacheReset('/assets/css/cartcalc.css');
$cartCalcScript = cacheReset('/assets/js/cartcalc.js');


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Climatologia</title>

    <script type="module" src="<?= cacheReset('/assets/components/headImports.php'); ?>"></script>
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
            <span class="mb-0 h2">Climatologia</span>
        </div>
      </nav>

    </header>

    <main id="clima" class="flex-grow-1">
        
    </main>
                    
    <footer-component></footer-component>
    <script type="module" src="<?= $cartCalcScript?>"></script>
</body>
</html>