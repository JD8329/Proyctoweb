$(document).ready(function () {
    listFormaPago();
});

var listFormaPago = function () {
    $('#dt_forma_pago').DataTable({
        destroy: true,
        responsive: true,
        searching: true,
        lengthChange: false,
        pageLength: 15,
        ajax: {
            url: "ajax.php?module=FormaPago&controller=FormaPago&function=data",
            method: "post"
        },
        columns: [
            { "data": "con_id" },
            { "data": "con_descripcion" },
            { "data": "con_estado" }
        ]
    });
};
