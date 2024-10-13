/*                         Funcion de prender y apagar                      */
"uses estrict"
/*                  Variables para cambiar de modo claro a oscuro           */
const fondo = document.querySelector("body")
const lampara = document.querySelector(".lampara");
let apagado = true;
/*                    Funcion que cambia de modo claro a oscuro             */
function prende_apaga(){
    if (apagado) {
        fondo.classList.add("modo_claro");
        lampara.src="images/lampara_on.png";
        lampara.title="Cambiar a Modo Oscuro";
        apagado = false;
    } else {
        fondo.classList.remove("modo_claro");
        lampara.src="images/lampara_off.png";
        lampara.title="Cambiar a Modo Claro";
        apagado = true;
    }
};
/*                               EVENTOS                                    */
lampara.addEventListener("click", prende_apaga);
/*                                 FIN                                      */