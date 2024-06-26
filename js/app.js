
 document.addEventListener('DOMContentLoaded', function(){
   cargarPeliculas();
   campoBuscador();
   nuevaBusqueda();
   paginador();
});
let pindex = 0; //pagina index
let itemsPP= 8; // items por pagina
let items=38;  // total items


// async function consultaAPI(){
//    const url = 'http://localhost:3000/miapi/';
//    const resultado = await fetch(url);
//    const movies = await resultado.json();
//    console.log(movies);
//    //return movies;
// };



// Carga de pelicula en index //

 async function cargarPeliculas(pindex=0, itemsPP= 8){
   if(document.getElementById("tendencias")){
      const url = 'http://localhost:3000/miapi/todasApi';
      const resultado = await fetch(url);
      const movies = await resultado.json();
   
      // elementos fijos
      plantilla = ` 
      <h3>Las Tendencias de Hoy</h3>
      <div class="grilla">
      `
   //elementos que varian con contenido
   for(let i=(pindex*itemsPP) ; i < (pindex*itemsPP)+itemsPP; i++){
      //console.log(movies);
      if (!movies[i]){break}
      plantilla+=  `  
      <div class="movie-cell box"> 
      <img src=img/${movies[i].imagen}.webp alt="Movie" class="movie">
      <a href="resumen.php?item=${movies[i].id_movie}">
      <div class="capa">
      <h4>${movies[i].titulo}</h4>
      <p>género: ${movies[i].genero}</p>
      <p>Ver más..</p>
      </div>  </a>
      </div>       `  
   }
      } 
   document.getElementById("tendencias").innerHTML=plantilla;
   //console.log(pindex);
   return pindex ;
};

////////////////// CAMPO BUSCADOR ///////////////////

function campoBuscador(){
         const campoBuscar = document.querySelector('#inputBuscar');
         const btnBuscador = document.getElementById('btnBuscador');
         campoBuscar.addEventListener('focus', function() {
         const parrafo = document.getElementsByClassName('parrafo');
         document.getElementById('parrafo').classList.add('mostrarpag');
         document.getElementById('parrafo').classList.remove('ocultarpag');
          //console.log(parrafo)
         // console.log(campo);
         setTimeout(() => {
            document.getElementById('parrafo').classList.add('ocultarpag');
            document.getElementById('parrafo').classList.remove('mostrarpag');
         }, 5000);   
         });

         btnBuscador.addEventListener('click', function (e){
         e.preventDefault();
         const campo = inputBuscar.value;
         console.log(campo);
         if (campo){
            return nuevaBusqueda(campo);
         }         
     });
    }
      
      // Busca por titulo completo o por género //
async function nuevaBusqueda(campo){
      const resultBuscador = document.getElementById('resultBuscador');
       if(campo){
         ///EXISTE CAMPO ////////
         const url = 'http://localhost:3000/miapi/todasApi';
         const resultado = await fetch(url);
         const movies = await resultado.json();
         console.log(movies);
         let nuevaBusqueda = [] ; 
         tituloBusqueda =[];
         generoBusqueda=[];
       tituloBusqueda = movies.filter( movie => movie.titulo.toLowerCase() === campo.toLowerCase() );
       generoBusqueda = movies.filter((dato)=>(dato.genero) === campo);
       nuevaBusqueda=[...tituloBusqueda, ...generoBusqueda];
       console.log(nuevaBusqueda);
      if (nuevaBusqueda) {

      let movies = nuevaBusqueda;
      const resultado = document.querySelector('.resultados');
            resultado.textContent =(`Resultados: ${nuevaBusqueda.length}`)
            plantilla = ` <div class="grilla"> `
      for (let i = 0; i < nuevaBusqueda.length; i++) {   
            //elementos que varian con contenido
           plantilla+= `
           <div class="movie-cell box"> 
           <img src=img/${movies[i].imagen}.webp alt="Movie" class="movie">
           <a href="resumen.php?item=${movies[i].id_movie}">
           <div class="capa">
           <h4>${movies[i].titulo}</h4>
           <p>género:  ${movies[i].genero}</p>
           <p>Ver más..</p>
           </div>  </a>
           </div>             
           `
         }
         plantilla+=` 
           <button id="cerrar"></button>  
            `
     document.getElementById("resultBuscador").innerHTML=plantilla;

     //BOTON CERRAR BUSQUEDA //
     const btnCerrar = document.querySelector('#cerrar');
     const contenedorBusqueda = document.querySelector('#resultBuscador')
     //console.log(btnCerrar);
    // btnCerrar.classList.add('campo-pag');
     btnCerrar.classList.add('boton');
     btnCerrar.classList.add('btncerrar');
     btnCerrar.textContent = ('Cerrar Búsqueda');
     resultBuscador.appendChild(btnCerrar);
     btnCerrar.addEventListener('click', ()=>{
      resultado.remove();
      contenedorBusqueda.remove();
      inputBuscar.value=("");

      })
      } 
   }
   };
   

//////////////////PAGINADOR ///FALTA AJUSTAR/////////////////// 
     

function paginador(pindex=0){
      const paginaSiguiente = document.querySelector('#siguiente');
      const paginaAnterior = document.querySelector('#anterior');
      paginaSiguiente.addEventListener('click', function(){
      //console.log(pindex);
      if (pindex <=3) {
            pindex++;
            paginaAnterior.classList.remove('ocultarpag');
            cargarPeliculas(pindex,8);
      }else{
            paginaSiguiente.classList.add('ocultarpag');
            //console.log(paginaSiguiente);
         }
      });

      paginaAnterior.addEventListener('click', function(){
      //console.log(pindex);
      if (pindex>0) {
            pindex--;
            paginaSiguiente.classList.remove('ocultarpag');
            cargarPeliculas(pindex,8);
      }else{
            paginaAnterior.classList.add('ocultarpag');
            //console.log(paginaSiguiente);
         }
      });
   }

