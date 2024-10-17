/*                         Funcion principio de página                      */
"uses estrict"
/*                       Variables para ir al principio                     */
const volver = document.querySelector(".volver1");

/*                   FUNCTION que desplaza el cursor hacia arriba           */
function desplazar_cursor(){
    window.scrollTo({
        top:0,
        left:0,
        behavior:"smooth",
        });
}
/*                               EVENTOS                                    */
volver.addEventListener("click", desplazar_cursor);
/*                                 FIN                                      */