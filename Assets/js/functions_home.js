$(document).ready(function(){ /*Cuando el documento este listo ejecute una funcion */
  //  alert('Entro');
  var imgItems = $('.slider li').length;  /*Creando una variable para llamar al li y llamar funcion length que cuenta los valores de li */
  var imgPos = 1; /**/
  for (i = 1; i <= imgItems; i++) {
          /*Llamando tag pagination y agregando un item con append */
    $('.pagination').append('<li><span class="fa fa-circle"></span></li>');
    }

  $('.slider li').hide(); //llamando clase slider y diapositivas y se va ocultar
  $('.slider li:first').show(); //Mostrando el primer slider
  $('.pagination li:first').css({'color': '#00315c'}); /*Llamando al primero de los items y asignando un color */

  //Ejecutar todas las funciones
  $('.pagination li').click(pagination); /* Al hacerle click se va a ejecutar una funcion llamada pagination */
  $('.right span').click(nextslider);  /* Al hacerle click se va a ejecutar una funcion llamada nextslider */
  $('.left span').click(prevslider); /* Al hacerle click se va a ejecutar una funcion llamada prevslider */
  $('.icon').click(buscar); /*Al hacerle click se va ejecutar una funcion para expander el campo buscar */
  $('.clear').click(borrar); /*Al hacerle click se va ejecutar una funcion para borrar lo que haya escrito en el input */
  //Funcion para cambiar los sliders automatico
  setInterval(function () {
    nextslider(); //funcion next slider
  }, 5000); //segundos
  //Funciones --------------

  function pagination(){
        var paginationPos = $(this).index() +1; /* hacer referencia con this al valor  del elemento de su posicion*/
        $('.slider li').hide(); /* llamando clase slider  a su li y ocultarlo*/
        $('.slider li:nth-child('+paginationPos+')').fadeIn(); /*agregando slider seleccionado */
        
        $('.pagination li').css({'color': '#858585'}) /*Regresando el color anterior del circulo */
        $(this).css({'color': '#00315c'}); /*Agregando css al elemento seleccionado */
    
        imgPos = paginationPos;
    }

  function nextslider(){
 /* Condicionar  */
        if (imgPos >= imgItems) {
            imgPos = 1 /*Resetear valor */
        }else{
            imgPos++;/* Aumentando la variable*/ 
        }
        $('.pagination li').css({'color': '#858585'}) /*Regresando el color anterior del circulo */
        $('.pagination li:nth-child('+imgPos+')').css({'color': '#00315c'}); /*Agregando css al elemento seleccionado */
        $('.slider li').hide(); /* llamando clase slider  a su li y ocultarlo*/
        $('.slider li:nth-child('+imgPos+')').fadeIn(); /*agregando slider seleccionado efecto fadein */
  }  

  
  function prevslider(){
    /* Condicionar  */
           if (imgPos <= 1) {
               imgPos = imgItems /*Resetear valor */
           }else{
               imgPos--;/* Aumentando la variable*/ 
           }
           $('.pagination li').css({'color': '#858585'}) /*Regresando el color anterior del circulo */
           $('.pagination li:nth-child('+imgPos+')').css({'color': '#00315c'}); /*Agregando css al elemento seleccionado */
           $('.slider li').hide(); /* llamando clase slider  a su li y ocultarlo*/
           $('.slider li:nth-child('+imgPos+')').fadeIn(); /*agregando slider seleccionado efecto fadein */
     } 
  function buscar(){
           $('.search').addClass('active'); /*Agregar clase active */
           $('.hide').removeClass('hide');
  }
  function borrar(){
           $('#busqueda').val(''); /* borrar texto */
  }
});

