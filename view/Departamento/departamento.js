$(document).ready(function () {
    listDepartamento();
});
var listDepartamento = function () {
    var table = $('#dt_depto').DataTable({
        destroy: true,
        responsive: true,
        searching: true,
        orderable: false,
        lengthChange: false,
        pageLength: 15,
        autoWidth: true,
        "ajax": {
            "url": "ajax.php?module=Departamento&controller=Departamento&function=data",
            "method": "post"
        },
        "deferRender": true,

        "columns": [
            { "data": "idDepartamento" },
            { "data": "nomDepartamento" },
            { "data": "buttons" }
        ]

    });
    showModalsDepto("#dt_depto tbody", table);
}

var showModalsDepto = function (tbody, table) {
    $(tbody).on("click", ".btnShowEdit", function () {
        var url = $(this).attr("data-url");
       /* $.ajax({
            url: url,
            dataType: "JSON",
            success: function (rs) {
                console.log(rs);
                $("#idDeptoEdit").val(rs.id);
                $("#nameDeptoEdit").val(rs.description);
            },
        });*/
    });
    $(tbody).on("click", "#btnDelete", function () {

    });
};
