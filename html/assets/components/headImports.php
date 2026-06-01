<?php
header("Content-Type: application/javascript");

include $_SERVER['DOCUMENT_ROOT'] . '/assets/components/cacheReset.php';

$footerSrc = cacheReset('/assets/components/footer.js');
$stylesSrc = cacheReset('/assets/css/style.css');
$bgStyleSrc = cacheReset('/assets/css/bg.css');

$bootJs = "/vendor/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js";

?>


    class HeadImports extends HTMLElement {
        connectedCallback() {

            document.head.insertAdjacentHTML("beforeend", `
                <link rel="icon" type="image/png" href="/assets/img/whathedogdoing.png">
                <link rel="preconnect" href="https://fonts.googleapis.com">
                <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                <link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400..700&display=swap" rel="stylesheet">
                <link href="/vendor/node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
                <link rel="stylesheet" href="<?= $stylesSrc ?>">
                <link rel="stylesheet" href="<?= $bgStyleSrc ?>">
            `);

            // Carrega o script do componente de rodapé com o caminho dinâmico calculado
            this.loadScript("<?= $footerSrc; ?>");
            this.loadScript("<?= $bootJs; ?>");

        }
        loadScript(src) {
            const script = document.createElement("script");
            script.src = src;
            script.defer = true;

            document.body.appendChild(script); 
        }
    }

    customElements.define("head-imports", HeadImports);
