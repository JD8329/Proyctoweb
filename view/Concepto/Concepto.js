$(document).ready(function () {

    listConcepto(); 
});

var listConcepto = function () { 

    var table = $('#dt_concepto').DataTable({ 
        destroy: true,
        responsive: true,
        searching: true,
        orderable: false,
        lengthChange: false,
        pageLength: 15,
        autoWidth: true,
        ajax: {
            
            url: "ajax.php?module=Concepto&controller=Concepto&function=data",
            method: "post"
        },
        columns: [
            
            { "data": "con_id" },               
            { "data": "con_descripcion" }, 
            { "data": "con_estado" },      
            { "data": "buttons" }
        ]
    });
    showModalsConcepto("#dt_concepto tbody", table); 

}

var showModalsConcepto = function (tbody, table) { 
    $(tbody).on("click", ".btnShowEdit", function () {
        var url = $(this).attr("data-url");
        $.ajax({
            url: url,
            dataType: "JSON",
            success: function (rs) {

                $("#idConceptoEdit").val(rs.id);
                $("#descripcionConceptoEdit").val(rs.descripcion);            
                $("#estadoConceptoEdit").val(rs.estado);
            },
        });
    });
    $(tbody).on("click", "#btnDelete", function () {
    });
};