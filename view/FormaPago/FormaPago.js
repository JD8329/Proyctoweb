$(document).ready(function () {
    loadFormaPago();
});

function loadFormaPago() {
    var table = $('#dt_formapago').DataTable({
        destroy: true,
        ajax: {
            url: "ajax.php?module=FormaPago&controller=FormaPago&function=data",
            method: "post"
        },
        columns: [
            { data: "fp_id" },
            { data: "fp_descripcion" },
            { data: "fp_estado" },
            { data: "buttons" }
        ]
    });

    showEditModal("#dt_formapago tbody", table);
    deleteFormaPago("#dt_formapago tbody", table);
}

function showEditModal(tbody, table) {
    $(tbody).on("click", ".btnShowEdit", function () {
        var url = $(this).attr("data-url");

        $.ajax({
            url: url,
            dataType: "JSON",
            success: function (rs) {
                $("#idFPEdit").val(rs.fp_id);
                $("#descripcionFPEdit").val(rs.fp_descripcion);
                $("#estadoFPEdit").val(rs.fp_estado);
            }
        });
    });
}

function deleteFormaPago(tbody, table) {
    $(tbody).on("click", ".btnDelete", function () {
        var url = $(this).data("url");

        Swal.fire({
            title: "¿Eliminar?",
            icon: "warning",
            showCancelButton: true
        }).then((r) => {
            if (r.isConfirmed) {
                $.ajax({
                    url: url,
                    type: "GET",
                    success: function (response) {
                        Swal.fire("Eliminado", "", "success");
                        table.ajax.reload();
                    }
                });
            }
        });
    });
}
