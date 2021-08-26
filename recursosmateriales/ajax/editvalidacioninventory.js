$(function() {
    $("#formulario").on("submit", function(e) {
        e.preventDefault();
        var url = "consultas/edittblinventory.php";
        var datos = $("#formulario").serialize();
        //alert(datos);
        //return false;
        $.ajax({
            type: "POST",
            url: url,
            data: datos,
            dataType: "json",
            success: function(data) {
                if (data.status == 'success') {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'DATOS GUARDADOS',
                        showConfirmButton: false,
                        timer: 2500
                    })
                    //location.reload(true);
                } else if (data.status == 'error') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'OCURRIO UN ERROR! 1',
                        showConfirmButton: false,
                        timer: 2500
                    })
                }

            },
            error: function(e) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'No se ha podido guardar la información',
                    showConfirmButton: false,
                    timer: 2500
                })

            },
        });
        return false;
    });

});