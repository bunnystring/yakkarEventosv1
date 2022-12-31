//** Bloquear todas las teclas y solo permitir numeros **//

function controlTag(e)
    {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8) return true; 
    else if (tecla==0||tecla==9) return true;
    patron = /[0-9\s]/; //TODO: Permitira numeros del 0 al 9
    n = String.fromCharCode(tecla);
    return patron.test(n);
    }

function testText(txtString) 
    {
    var stringText = new RegExp(/^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+$/);//TODO: Permitir el ingreso de letras y no numeros en nombres
    if (stringText.test(txtString)) {
        return true;
    }else
    {
        return false;
    }
    }

    //**TODO: Permitira solo numeros del 0 al 9 */
function testEntero(intCant) 
    {
    var intCantidad = new RegExp(/^([0-9])*$/);
    if (intCantidad.test(intCant))
    {
        return true;    
    }else
    {
        return false;
    }
    }

function fntEmailValidate(email) 
    {
    var stringEmail = new RegExp(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/);
    if (stringEmail.test(email) == false) 
    {
        return false;    
    }else
    {
        return true;
    }
    }

//TODO: dirijir a todos los elementos que ventgan la clase validText, agregar un evento keyup(cuando se presiona tecla)
function fntValidText()
    {
        let validText = document.querySelectorAll(".validText");
        validText.forEach(function(validText){
            validText.addEventListener('keyup', function(){
                let inputValue = this.value;
                if (!testText(inputValue)){ //TODO: Llamando a la funcion testText
                    this.classList.add('is-invalid');//TODO: Agrega la clase is-invalid
                }else
                {
                    this.classList.remove('is-invalid');//TODO: remover la clase .is-invalid
                }
            });
        });
    }

    function fntValidNumber()
    {
        let validNumber = document.querySelectorAll(".validNumber");
        validNumber.forEach(function(validNumber){
            validNumber.addEventListener('keyup', function(){
                let inputValue = this.value;
                if (!testEntero(inputValue)) 
                { //TODO: Llamando a la funcion testEntero
                    this.classList.add('is-invalid');//TODO: Agrega la clase is-invalid
                }else
                {
                    this.classList.remove('is-invalid');//TODO: remover la clase .is-invalid
                }
            });
        });
    }

    function fntValidEmail()
    {
        let validEmail = document.querySelectorAll(".validEmail");
        validEmail.forEach(function(validEmail){
            validEmail.addEventListener('keyup',function(){
                let inputValue = this.value;
                if (!fntEmailValidate(inputValue)) 
                {
                    this.classList.add('is-invalid');
                }else
                {
                    this.classList.remove('is-invalid');
                }
            });
        });
    }
//TODO:
    window.addEventListener('load', function(){
        fntValidText();
        fntValidEmail();
        fntValidNumber();
    }, false);