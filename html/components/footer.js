class Footer extends HTMLElement {
  constructor() {
    super();
  }

  connectedCallback() {
    this.innerHTML = `
    <div class="container mw-100 m-0 p-0 pt-5">
        <footer class="text-center text-lg-start" style="background-color: #80589a;">
            
            <div class="container mw-100 p-0 m-0">
                <div class="row mx-0 px-0 py-1">
                    <h2 class="text-start" style="font-size:0.60rem;">Sugestões:</h2>
                    <div class="col d-flex flex-row justify-content-start mx-0 px-0">
                        
                        <a href="mailto:alonum2004@gmail.com" type="button" class="btn btn-primary btn-sm btn-floating mx-2" style="background-color: #54456b;" aria-label="E-mail">
                            <i class="bi bi-envelope"></i>
                        </a>
                        <a href="https://github.com/Alowna/Geography-Classes-CheatSheet/issues/new" type="button" class="btn btn-primary btn-sm btn-floating mx-2" style="background-color: #54456b;" aria-label="GitHub">
                            <i class="bi bi-github"></i>
                        </a>
                    </div>
                    <div class="col d-flex flex-row justify-content-end p-0 mx-1 mb-0 align-items-end" style="font-size: 0.60rem">
                    @Desenvolvido por Alowna 2026
                    </div>
                </div>
            </div>

            
            <div class="text-white p-1" style="background-color: rgba(0, 0, 0, 0.2); text-align: left; font-size: 0.50rem">
                <div style="display: inline; clear:left;">
                    As Above
                </div>
                <div style="display: inline; float:right;">
                    So Below
                </div>
            </div>

            
            
        </footer>
  
    </div>

    `;
  }
}

customElements.define('footer-component', Footer);