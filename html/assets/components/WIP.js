class WIP extends HTMLElement {
  connectedCallback() {
    this.innerHTML = `
    <main class="d-flex flex-grow-1 overflow-hidden" style="height:300px;">
        <div class="container d-flex justify-content-center mx-0 px-0  bg-black mw-100" >

            <img  src="/assets/img/WIPbg.png">

        </div>
        
        
    </main>
        <button id="toggleBtn" onclick="showElement()" style="position: relative; width:100; font-size:10px; background-color:black; border:none;color:white;" >?</button>
        
        <div id="dioDa" class="text-center mx-0  "   style="display: none;position:fixed; bottom:20%; right:20%; width:50%; height: 50%; color: #FFFFFF; text-shadow: 0 -1px 4px #FFF, 0 -2px 10px #ff0, 0 -10px 20px #ff8000, 0 -18px 40px #F00; color: #FFFFFF;">       
            <p>VOCÊ ESPERAVA QUE FOSSE O CONTEUDO DO CABEÇALHO</p>
            <img class="rounded mx-auto d-block" src="/assets/img/konodioda.gif" style="width:50%;height:100%;overflow:hidden;" alt="IT WAS ME, DIO!!" title="KONODIODAA!!">
            <p>MAS ERA EU, DIO!!</p>
        </div>
    `;

    const btn = this.querySelector("#toggleBtn");
    const panel = this.querySelector("#dioDa");

    btn.addEventListener("click", () => {
      if (panel.style.display === "none" || panel.style.display === "") {
        panel.style.display = "block";
      } else {
        panel.style.display = "none";
      }
    });
  }
}

customElements.define("wip-component", WIP);