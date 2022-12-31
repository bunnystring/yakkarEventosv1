var tableEmpleados;
document.addEventListener('DOMContentLoaded', function () {

    tableEmpleados = $('#tableEmpleados').dataTable({
        "aProccesing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax": {
            "url": " " + base_url + "/Empleados/getEmpleados",
            "dataSrc": ""
        },
        "columns": [
            { "data": "id_empleado" },
            { "data": "nombre" },
            { "data": "nombrerol" },
            { "data": "email" },
            { "data": "estado" },
            { "data": "options" }
        ],
        'dom': 'lBfrtip',
        'buttons': [
            {
                "extend":"copyHtml5",
                "text": "<i class='fa-solid fa-copy'></i> Copiar",
                "titleAttr": "Copiar",
                "className": "btn btn-secondary"
            },
            {
                "extend":"excelHtml5",
                "text": "<i class='fa-solid fa-file-excel'></i> Excel",
                "titleAttr": "Exportar a Excel",
                "className": "btn btn-success"
            },
            {
                "extend":"pdfHtml5",
                "text": "<i class='fa-solid fa-file-pdf'></i> PDF",
                "titleAttr": "Exportar a PDF",
                "className": "btn btn-danger"
            },
            {
                "extend":"csvHtml5",
                "text": "<i class='fa-solid fa-file-csv'></i> CSV",
                "titleAttr": "Exportar a CSV",
                "className": "btn btn-info"
            }
        ],
        "responsive": "true",  //Que sea responsivo
        "bDestroy": true,
        "iDisplayLength": 2,  //paginador
        "order": [[0, "desc"]]
    });


    var formEmpleado = document.querySelector("#formEmpleado");
    formEmpleado.onsubmit = function (e) {
        e.preventDefault();
        var strNombre = document.querySelector('#txtNombre').value;
        var strIdentificacion = document.querySelector('#txtIdentificacion').value;
        var strEmail = document.querySelector('#txtEmail').value;
        var strCelular = document.querySelector('#txtCelular').value;
        var intTipoempleado = document.querySelector('#listRolid').value;
        var strUsuario = document.querySelector('#txtUsuario').value;
        var strClave = document.querySelector('#txtClave').value;
        if (strNombre == '' || strIdentificacion == '' || strEmail == '' || strCelular == ''
            || intTipoempleado == '' || strUsuario == '') {
            swal("Atencion", " Todos los campos son obligatorios.", "error");
            return false;
        }

        //TODO: Dirigiendonos a todos los elementos de clase valid
        let elementsValid = document.getElementsByClassName("valid");
        for (let i = 0; i < elementsValid.length; i++)
        {
            //TODO: Verificar si elementsValid contains tiene la clase is-invalid
            if (elementsValid[i].classList.contains('is-invalid')) 
            {
                swal("Atención", "Por favor verifica los campos en rojo.", "error");
                return false; //TODO: Para el proceso
            }       
        }
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url + 'Empleados/setEmpleado';
        var formData = new FormData(formEmpleado);
        request.open("POST", ajaxUrl, true);
        request.send(formData);
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var objData = JSON.parse(request.responseText); //TODO: convertir a un objeto lo que venga en responseText
                console.log(objData);
                if (objData.status) {
                    $('#modalFormEmpleado').modal("hide");
                    formEmpleado.reset();
                    swal("Empleados", objData.msg, "success");
                    tableEmpleados.api().ajax.reload();
                } else {
                    swal("Error", objData.msg, "error");
                }
            }
        }

    }
}, false);

/**CARGAR FUNCIONES AL MOMENTO DE EJECUTAR ARCHIVO */
window.addEventListener('load', function () {
    fntRolesEmpleado();
 
}, false);


function fntRolesEmpleado() {
    var ajaxUrl = base_url + 'Roles/getSelectRoles';
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    request.open("GET", ajaxUrl, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            document.querySelector('#listRolid').innerHTML = request.responseText;
            document.querySelector('#listRolid').value = 1;
            $('#listRolid').selectpicker('render');
        }
    }

}
function fntViewEmpleado(idempleado) {
    var idempleado = idempleado; //TODO (this) referimos al elemento al que le damos click
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url + 'Empleados/getEmpleado/' + idempleado;
    request.open("GET", ajaxUrl, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var objData = JSON.parse(request.responseText);
            if (objData.status) //TODO: Puede que sea false si no encuentra el dato
            {
                var estadoEmpleado = objData.data.estado == 1 ?
                    '<span class="badge badge-success">Activo</span>' :
                    '<span class="badge badge-danger">Inactivo</span>';

                document.querySelector("#celNombre").innerHTML = objData.data.nombre;
                document.querySelector("#celIdentificacion").innerHTML = objData.data.identificacion;
                document.querySelector("#celEmail").innerHTML = objData.data.email;
                document.querySelector("#celCelular").innerHTML = objData.data.celular;
                document.querySelector("#celUsuario").innerHTML = objData.data.usuario;
                document.querySelector("#celEstado").innerHTML = estadoEmpleado;
                document.querySelector("#celTipoEmpleado").innerHTML = objData.data.nombrerol;
                document.querySelector("#celFechaRegistro").innerHTML = objData.data.fecharegistro;
                $('#modalViewEmpleado').modal('show');
            } else {
                swal("Error", objData, "error");
            }
        }
    }
}

function fntEditEmpleados(idempleado) {

    document.querySelector('#titleModal').innerHTML = "Actualizar Empleado";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML = "Actualizar"


    var idempleado = idempleado; //TODO (this) referimos al elemento al que le damos click
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url + 'Empleados/getEmpleado/' + idempleado;
    request.open("GET", ajaxUrl, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var objData = JSON.parse(request.responseText);

            if (objData.status) {
                document.querySelector("#idEmpleado").value = objData.data.id_empleado;
                document.querySelector("#txtIdentificacion").value = objData.data.identificacion;
                document.querySelector("#txtNombre").value = objData.data.nombre;
                document.querySelector("#txtEmail").value = objData.data.email;
                document.querySelector("#listRolid").value = objData.data.cargo_fk;
                document.querySelector("#txtCelular").value = objData.data.celular;
                document.querySelector("#txtUsuario").value = objData.data.usuario;
                // document.querySelector("#txtClave").value = objData.data.clave;
                $('#listRolid').selectpicker('render');
                if (objData.data.estado == 1) {
                    document.querySelector("#listStatus").value = 1;
                } else {
                    document.querySelector("#listStatus").value = 2;
                }
                $('#listStatus').selectpicker('render');

            }
        }

        $('#modalFormEmpleado').modal('show');
    }
}
function fntDelEmpleado(idUsuario) {


    var idEmpleado = idUsuario; //TODO: Accediendo a el atributo us que se encuentra en el boton  
    swal({
        title: "Eliminar Empleado",
        text: "¿Realmente quiere eliminar el Empleado?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, Cancelar!",
        closeOnConfirm: false, //No se cierre el modal
        closeOnCancel: true
    }, function(isConfirm) {
        if (isConfirm) 
        {
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url + 'Empleados/delEmpleado/';
            var strData = "idEmpleado=" + idEmpleado;
            request.open("POST",ajaxUrl,true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    var objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        swal("Eliminar!", objData.msg , "success");
                        tableEmpleados.api().ajax.reload(function(){
                            fntRolesEmpleado();
                            fntViewEmpleado();                
                        });
                    }else{
                        swal("Atención!", objData.msg , "error");
                    }
                }
            }
        }
    });
}

function openModal() {
    document.querySelector('#idEmpleado').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Usuario";
    document.querySelector("#formEmpleado").reset();
    $('#modalFormEmpleado').modal('show');
}