$(document).ready(function() {
    $("#flexCheckManha").on("click", function() {
        var termo = $(this).val();
        $.ajax({
            type: "post",
            url: "MostrarMotoristas.php",
            data: {
                manha: termo
            },
            success: function(response) {
                console.log(termo)
            }
        });
    });

    $("#flexCheckTarde").on("click", function() {
        var termo = $(this).val();
        console.log(termo);
        $.ajax({
            type: "post",
            url: "MostrarMotoristas.php",
            data: {
                tarde: termo
            },
            success: function(response) {
                console.log("deu");
            }
        });
    });

    $("#flexCheckNoite").on("click", function() {
        var termo = $(this).val();
        console.log(termo);
        $.ajax({
            type: "post",
            url: "MostrarMotoristas.php",
            data: {
                noite: termo
            },
            success: function(response) {
                console.log("deu");
               
            }
        });
    });

});