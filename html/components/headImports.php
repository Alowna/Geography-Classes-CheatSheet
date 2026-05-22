<?php
header("Content-Type: application/javascript");

include $_SERVER['DOCUMENT_ROOT'] . '/cacheReset.php';

$footerSrc = cacheReset('/components/footer.js');
?>

    class HeadImports extends HTMLElement {
        connectedCallback() {

            document.head.insertAdjacentHTML("beforeend", `
                <link rel="preconnect" href="https://fonts.googleapis.com">
                <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                <link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400..700&display=swap" rel="stylesheet">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
                <link rel="stylesheet" href="/styles/style.css?v=1.0.0">
            `);

            // Carrega o script do componente de rodapé com o caminho dinâmico calculado
            this.loadScript("<?= $footerSrc; ?>");
        }
        loadScript(src) {
            const script = document.createElement("script");
            script.src = src;
            script.defer = true;

            document.body.appendChild(script); 
        }
    }

    customElements.define("head-imports", HeadImports);
