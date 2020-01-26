/*window.addEventListener('load',() =>{
    setTimeout(carga,2000);

    function carga(){
        document.getElementById('preloader').className='hide';
        document.getElementById('contenido').className='animated fadeInRight';
    }
});*/
$(document).ready(function(){
    $('input.autocomplete').autocomplete({
        data: {
            "Insuficiente": null,
            "Suficiente": null,
            "Bueno": null,
            "Notable": null,
            "Excelente": null
        },
    });
});

$(document).ready(function() {
    M.updateTextFields();
});
      

$(document).ready(function(){
    $('.collapsible').collapsible();
    $('.sidenav').sidenav();
    $('select').formSelect();
    $('.tooltipped').tooltip();
    $('.modal').modal();
    $('.timepicker').timepicker();
});


$(document).ready(function() {
    $('button.deleteTaller').click(function(event){
        var id = $(this).attr('data-id');

        var OModalEdit = $("#modalDeleteTaller");
        oModalEdit.find('input[name="idDocenteDelete"]').val(id);
        OModalEdit.modal();
    });
});

$(document).ready(function() {
    $('button.editUser').click(function(event) {
        var id = $(this).attr('data-iduser');
        var nombre = $(this).attr('data-nombreuser');
        var apellidos = $(this).attr('data-apellidosuser');
        var nick = $(this).attr('data-nick');
        var correo = $(this).attr('data-correo');

        var oModalEdit = $('#modalEditUsuario');
        oModalEdit.find('input[id="idUser"]').val(id);
        oModalEdit.find('input[name="nombreEdit"]').val(nombre);
        oModalEdit.find('input[name="apellidosEdit"]').val(apellidos);
        oModalEdit.find('input[name="correoEdit"]').val(correo);
        oModalEdit.find('input[name="nick"]').val(nick);
        oModalEdit.modal();
    });
});

$(document).ready(function(){
    $('button.deleteUser').click(function(event){
        var iduser = $(this).attr('data-iduser');

        var oModalDelete = $('#modalDeleteUsuario');
        oModalDelete.find('input[id="idUser"]').val(iduser);
        oModalDelete.modal();
    })
});

$(document).ready(function() {
    $('button.edit').click(function(event) {
        var id = $(this).attr('data-id');
        var nombre = $(this).attr('data-nombre');
        var apellidos = $(this).attr('data-apellidos');
        
        var oModalEdit = $('#modalEditDocente');
        oModalEdit.find('input[id="idDocente"]').val(id);
        oModalEdit.find('input[name="nombreEdit"]').val(nombre);
        oModalEdit.find('input[name="apellidosEdit"]').val(apellidos);
        oModalEdit.modal();
    });
});

$(document).ready(function(){
    $('button.delete').click(function(event){
        var id = $(this).attr('data-id');
        var oModalDelete = $('#modalDeleteDocente');
        oModalDelete.find('input[id="idDocenteDelete"]').val(id);
        oModalDelete.modal();
    });
});

$(document).ready( function () {
    $('#myTable').DataTable({
        "scrollX": true, 
    });
    $('select').formSelect();
} );


function abrir(){
    document.getElementById('contenido').className="";
}

$(document).ready(function(){
    $('.dropdown-trigger').dropdown();
});






