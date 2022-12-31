
//Login Page modal_olvidoC control
const openModal = document.querySelector('.modal_olvidoC');
const modal = document.querySelector('.modales');
const closeModal = document.querySelector('.modal__close');
openModal.addEventListener('click', (e) => {
    e.preventDefault;
    window.sr = ScrollReveal();
    sr.reveal('.modal__container', {
        duration: 1000,
        origin: 'botton',
        distance: '-100px',
        scale: 0.10
    });
    modal.classList.add('modal--show');

});

closeModal.addEventListener('click', () => {
    modal.classList.remove('modal--show');
});
var divLoading = document.querySelector("#divLoading");
document.addEventListener('DOMContentLoaded', function () {

    if (document.querySelector("#formLogin")) {
        let formLogin = document.querySelector("#formLogin");
        formLogin.onsubmit = function (e) {
            e.preventDefault();

            let strEmail = document.querySelector('#txtEmail').value;
            let strClave = document.querySelector('#txtClave').value;

            if (strEmail == "" || strClave == "") {
                swal("Por favor", "Escribe usuario y contraseña", "error");
                return false;
            } else {
                divLoading.style.display = "flex";
                var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP'); //TODO: Condicion detectamos si estamos en un navegador chrome firefox crear un elemnto de XMLHttp de lo contrario ActiveObject  
                var ajaxUrl = base_url + 'Login/loginUser';
                var formData = new FormData(formLogin);
                request.open("POST", ajaxUrl, true);
                request.send(formData);

                request.onreadystatechange = function () {
                    if (request.readyState != 4) return;
                    if (request.status == 200) {
                        var objData = JSON.parse(request.responseText);
                        if (objData.status) {
                            window.location = base_url + 'dashboard';
                        } else {
                            swal("Atención", objData.msg, "error");
                            document.querySelector('#txtClave').value = "";
                        }
                    } else {
                        swal("Atención", "Error en el proceso", "error")
                    }
                    divLoading.style.display = "none";
                    return false;
                }

            }
        }
    }
    if (document.querySelector("#formRecetPass")) 
    {
        let formRecetPass = document.querySelector("#formRecetPass");
        formRecetPass.onsubmit = function(e) {
            e.preventDefault();
            // alert('Auchs ese click dolio!');
            let strEmail = document.querySelector('#txtEmailReset').value;
            if (strEmail == "") 
            {
                swal("Por favor", "Escribe tu correo electronico", "error");
                return false;    
            }else
            {
                divLoading.style.display = "flex";
                var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                var ajaxUrl = base_url+'Login/resetPass';
                var formData = new FormData(formRecetPass);
                request.open("POST",ajaxUrl,true);
                request.send(formData);
                request.onreadystatechange = function(){
                    // console.log(request);
                    if (request.readyState != 4) return;
                    if (request.status == 200) {
                        var objData = JSON.parse(request.responseText);
                        if (objData.status) 
                        {
                            swal({
                                title: "",
                                text: objData.msg,
                                type: "success",
                                confirmButtonText: "Aceptar",
                                closeOnConfirm: false,
                            }, function(isConfirm){ //Redireccionando a la ruta raiz 
                                if (isConfirm) 
                                {
                                    window.location = base_url;
                                }
                            });
                        }else
                        {
                            swal("Atención", objData.msg, "error");
                        }
                    }else
                    {       //TODO: En el caso de que no devuelva Code 200
                            swal("Atención", "Error en el proceso", "error");
                    }
                    divLoading.style.display = "none";
                    return false;
                }
            }
        }    
    }
}, false);