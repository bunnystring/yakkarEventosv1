var tableRoles;

//** Cuando el documento cargue va ejecutar la siguiente funcion **/
document.addEventListener('DOMContentLoaded', function () {
    tableRoles = $('#tableRoles').dataTable({
        "aProccesing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax": {
            "url": " " + base_url + "/Roles/getRoles",
            "dataSrc": ""
        },
        "columns": [
            { "data": "idrol" },
            { "data": "nombrerol" },
            { "data": "descripcion" },
            { "data": "status" },
            { "data": "options" }
        ],
        "responsive": "true",  //Que sea responsivo
        "bDestroy": true,
        "iDisplayLength": 5,  //paginador
        "order": [[0, "desc"]]
    });

    //Nuevo Cargo
    var formRol = document.querySelector("#formRol");
    formRol.onsubmit = function (e) {
        e.preventDefault();

        var intIdRol = document.querySelector('#idRol').value;
        var strNombre = document.querySelector('#txtNombre').value;
        var strDescripcion = document.querySelector('#txtDescripcion').value;
        var intStatus = document.querySelector('#listStatus').value;
        if (strNombre == '' || strDescripcion == '' || intStatus == '') {
            swal("Atencion", "Todos los campos son obligatorios.", "error");
            return false; //TODO: Detener el proceso
        }
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP'); //TODO: Condicion detectamos si estamos en un navegador chrome firefox crear un elemnto de XMLHttp de lo contrario ActiveObject  
        var ajaxUrl = base_url + 'Roles/setRol';
        var formData = new FormData(formRol);
        request.open("POST", ajaxUrl, true);
        request.send(formData);
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) //TODO: // si la respuesta del servidor es igual a 200 quiere decir que se realizo correctamente
            {
                var objData = JSON.parse(request.responseText);  //TODO: Obtener la respuesta y pasarlo a un objeto
                if (objData.status) {
                    $('#modalFormRol').modal("hide");
                    formRol.reset();
                    swal("Roles de usuario", objData.msg, "success");
                    tableRoles.api().ajax.reload();
                } else {
                    swal("Error", objData.msg, "error");
                }
            }

        }
    }
});

$('#tableRoles').DataTable();

function openModal(params) {

    document.querySelector('#idRol').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Rol";
    document.querySelector('#formRol').reset();

    $('#modalFormRol').modal('show');
}

/** Llamado funcion ftnEditRol,fntDelRol,fntPermisos **/
window.addEventListener('load', function () {}, false);

function fntEditRol(idrol) {

    /*** Manipulamos el DOM desde js ***/
    document.querySelector('#titleModal').innerHTML = "Actualizar Rol";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-edit");
    document.querySelector('#btnText').innerHTML = "Actualizar";

    var idrol = idrol; //TODO: Atributo
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url + 'Roles/getRol/' + idrol; //TODO: Consumiendo esta url
    request.open("GET", ajaxUrl, true);
    request.send(); //TODO: enviar la peticion

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            //TODO: console.log(request.responseText);
            var objData = JSON.parse(request.responseText); //TODO: parsear lo que viene en request

            if (objData.status) {
                document.querySelector("#idRol").value = objData.data.idrol;
                document.querySelector("#txtNombre").value = objData.data.nombrerol;
                document.querySelector("#txtDescripcion").value = objData.data.descripcion;

                if (objData.data.status == 1) {
                    var optionSelect = '<option value="1" selected class="notBlock">Activo</option>';
                } else {
                    var optionSelect = '<option value="2" selected class="notBlock">Inactivo</option>';
                }

                var htmlSelect = `${optionSelect} 
                                         <option value="1">Activo</option>
                                         <option value="2">Inactivo</option>
                                         `;
                document.querySelector("#listStatus").innerHTML = htmlSelect;
                $('#modalFormRol').modal('show');
            } else {
                swal("Error", objData.msg, "error");
            }
        }
    }
}

function fntDelRol(idrol) {
    var idrol = idrol; // this.getAttribute("rl") Obteniendo el valor de elemento rl al elemento que se le esta dando click

    swal({
        title: "Eliminar Rol",
        text: "¿Realmente quiere eliminar el Rol?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, Cancelar!",
        closeOnConfirm: false, //No se cierre el modal
        closeOnCancel: true
    }, function (isConfirm) {
        if (isConfirm) {
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url + 'Roles/delRol/';
            var strData = "idrol=" + idrol;
            request.open("POST", ajaxUrl, true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                    var objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        swal("Eliminar!", objData.msg, "success");
                        tableRoles.api().ajax.reload();
                    } else {
                        swal("Atencion!", objData.msg, "error");
                    }
                }
            }
        }
    });
    
}

function fntPermisos(idrol) {

    var idrol = idrol; 
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url + 'Permisos/getPermisosRol/' + idrol;
    request.open("GET", ajaxUrl, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            // console.log(request.responseText);
            document.querySelector('#contentAjax').innerHTML = request.responseText;
            $('.modalPermisos').modal('show');
            document.querySelector('#formPermisos').addEventListener('submit', fntSavePermisos, false)
        }
    }
    //     });
    // });
}
function fntSavePermisos(evnet) {
    evnet.preventDefault();
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url + 'Permisos/setPermisos';
    var formElement = document.querySelector("#formPermisos");
    var formData = new FormData(formElement);
    request.open("POST", ajaxUrl, true);
    request.send(formData);

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var objData = JSON.parse(request.responseText); //TODO: Converitmos a un objeto lo que viene en resquest.responseText
            if (objData.status) {
                swal("Permisos de usuario", objData.msg, "success");
            } else {
                swal("Error", objData.msg, "error");
            }

        }
    }
}

