/*               Funcion de INDEX.html del MENU DE OPCIONES                 */

"uses estrict"
/*                  Variables para cambiar el MENU                          */
const menu = document.querySelector(".menu");
const barra = document.querySelector(".barra");
/*                    Funcion que cambia el MENU                            */
function mostrarMenu() {
    barra.classList.toggle("show");
}
/*                               EVENTOS                                    */
menu.addEventListener("click", mostrarMenu);
/*                                 FIN                                      */