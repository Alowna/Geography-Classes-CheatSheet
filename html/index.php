<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/assets/components/cacheReset.php';
$homeStyleSrc = cacheReset('/assets/css/home.css');

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GeoCheatSheet Homepage</title>
    <script type="module" src="<?= cacheReset('/assets/components/headImports.php'); ?>"></script>
    


    <head-imports></head-imports>
    <link rel="stylesheet" href="<?= $homeStyleSrc ?>">
    
</head>
<body  class="d-flex flex-column min-vh-100">
    <header class="p-3 bg-dark text-white">


      <nav class="navbar navbar-expand-lg" data-bs-theme="dark">
        <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active  text-secondary" aria-current="page" href="/">Página Inicial</a>
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
                            <a href="/pages/years/first-year/first-semester/clima.php" class="dropdown-item">Climatologia</a>
                            <a href="/pages/wip.php" class="dropdown-item">Pensamento Geográfico</a>
                            <a href="/pages/wip.php" class="dropdown-item">Geologia</a>
                          </li>
                        </ul>
                      </li>
                      <li>
                        <a href="" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown">2 Semestre</a>
                        <ul class="dropdown-menu">
                          <li>
                            <a href="pages/wip.php" class="dropdown-item">WIP</a>
                            <a href="pages/wip.php" class="dropdown-item">WIP</a>
                            <a href="pages/wip.php" class="dropdown-item">WIP</a>
                            <a href="pages/wip.php" class="dropdown-item">WIP</a>
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
      </nav>

    
    </header>
    

    
    <main id="home-page" class="flex-grow-1">

    
    <introduction class="d-flex justify-content-start flex-column  text-center mx-0">
        <h1>Bem-vinde ao GeoCheatSheet!</h1> 
        <p>Este site é um hub de estudos gratuito e livre de anúncios, criado para organizar as informações do curso de Geografia à medida que avanço na graduação.
        <br>Sem taxas ou propagandas. Apenas uma estudante tentando facilitar a vida de outros estudantes através do compartilhamento de conteúdo organizado, que inclusive, você pode ajudar também!
        <br>Navegue pelo menu, aproveite os materiais e que essa organização te ajude tanto quanto tem me ajudado!</p>
    
        <p>Caso note algo fora do lugar, ou até mesmo veja o conteúdo e pense.."Alona, você está chapando!!" Clique no icone <i class="bi bi-github"></i> do rodapé para me enviar uma sugestão pelo GitHub! </p>
        <br><br><p>Os conhecimentos aqui dispostos se tratam de minha interpretação da Graduação em Geografia-Licenciatura da Unesp Rio Claro, com base na grade dos ingressantes de 2026. Mas todas as sugestões são bem-vindas!<br> O objetivo é realmente agregar conhecimentos úteis ao aprendizado desta ciência.</p>
    </introduction> 


    </main>

    
    
  
    <footer-component></footer-component>

    
</body>
</html>