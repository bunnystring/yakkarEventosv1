var divLoading = document.querySelector("#divLoading");
document.addEventListener('DOMContentLoaded', function () { 
    // console.log('desde el js');
    if (document.querySelector("#formCambiarPass")) {
        let formCambiarPass = document.querySelector("#formCambiarPass");
        formCambiarPass.onsubmit = function(e){
            e.preventDefault();
            
            let strClave = document.querySelector('#txtClave').value;
            let strClaveConfirm = document.querySelector('#txtClaveConfirm').value;
            let idEmpleado = document.querySelector('#idEmpleado').value;

            if (strClave == "" || strClaveConfirm == "") {
                swal("Por favor", "Escribe una nueva contraseña", "error");
                return false;
            }else{
                
                if (strClave.length < 6) {
                    swal("Atencion", "La contraseña debe tener un minimo de 5 caracteres.", "info");
                    return false;
                }
                if (strClave != strClaveConfirm) {
                    swal("Atención", "Las contraseñas no son inguales.", "error");
                    return false;
                }
                divLoading.style.display = "flex";
                var request = (window.XMLHttpRequest) ? 
                              new XMLHttpRequest() : 
                              new ActiveXObject('Microsoft.XMLHTTP');
                var ajaxUrl = base_url+'Login/setPassword';
                var formData = new FormData(formCambiarPass);
                request.open("POST",ajaxUrl,true);
                request.send(formData);
                request.onreadystatechange = function(){
                    if (request.readyState != 4) return;
                    if (request.status == 200) {
                        // console.log(request.responseText);
                        var objData = JSON.parse(request.responseText);
                        if (objData.status) 
                        {
                            swal({
                                title: "",
                                text: objData.msg,
                                type: "success",
                                confirmButtonText: "Iniciar sesión",
                                closeOnConfirm: false,
                            }, function(isConfirm){
                                if (isConfirm) 
                                {
                                    window.location = base_url+'Login';    
                                }
                            });
                        }else
                        {
                            swal("Atención",objData.msg, "error");
                        }
                    }else{
                        swal("Atención", "Error en el proceso", "error");
                    }
                    divLoading.style.display = "none";
                }
            }
        }
    }

}, false);