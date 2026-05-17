class HeadImports extends HTMLElement {
    connectedCallback() {

        const cssPath = new URL('../styles/style.css', import.meta.url).href;
        const footerScriptPath = new URL('../components/footer.js', import.meta.url).href;

        document.head.insertAdjacentHTML("beforeend", `
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400..700&display=swap" rel="stylesheet">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
            <link rel="stylesheet" href="${cssPath}">
        `);

        // Carrega o script do componente de rodapé com o caminho dinâmico calculado
        this.loadScript(footerScriptPath);
    }

    loadScript(src) {
        const script = document.createElement("script");
        script.src = src;
        script.defer = true;
        // Anexa ao body para garantir que o DOM esteja pronto para o componente
        document.body.appendChild(script); 
    }
}

customElements.define("head-imports", HeadImports);