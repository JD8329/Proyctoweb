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
            { data: "con_id" },
            { data: "con_descripcion" },
            { data: "con_estado" },
            { data: "buttons" }
        ]
    });
    showModalsConcepto("#dt_concepto tbody", table);
    deleteConcepto("#dt_concepto tbody", table);
    reloadAfterSubmit(table);
};

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
            }
        });
    });
};

var deleteConcepto = function (tbody, table) {
    $(tbody).on("click", ".btnDeleteConcepto", function (e) {
        e.preventDefault();
        var url = $(this).data("url");
        Swal.fire({
            title: "¿Estás seguro?",
            text: "Esta acción no se puede deshacer.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sí, eliminar",
            cancelButtonText: "Cancelar"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: url,
                    type: "GET",
                    dataType: "json",
                    success: function (response) {
                        if (response.status === "success") {
                            Swal.fire({
                                title: "Eliminado",
                                text: "El concepto fue eliminado correctamente.",
                                icon: "success",
                                confirmButtonColor: "#4CAF50"
                            }).then(() => {
                                table.ajax.reload(null, false);
                            });
                        } else {
                            Swal.fire("Error", "No se pudo eliminar el concepto.", "error");
                        }
                    },
                    error: function () {
                        Swal.fire("Error", "Ocurrió un error en el servidor.", "error");
                    }
                });
            }
        });
    });
};

var reloadAfterSubmit = function (table) {
    $("form[name='frmCreateConcepto']").on("submit", function (e) {
        let id = $("#idConcepto").val().trim();
        let desc = $("#descripcionConcepto").val().trim();
        let est = $("#estadoConcepto").val().trim();
        if (id === "" || desc === "" || est === "") {
            e.preventDefault();
            Swal.fire("Campos vacíos", "Por favor completa todos los campos.", "warning");
        } else {
            setTimeout(() => {
                table.ajax.reload(null, false);
                $("#modalCreateConcepto").modal("hide");
            }, 1000);
        }
    });

    $("form[name='frmUpdateConcepto']").on("submit", function (e) {
        let desc = $("#descripcionConceptoEdit").val().trim();
        let est = $("#estadoConceptoEdit").val().trim();
        if (desc === "" || est === "") {
            e.preventDefault();
            Swal.fire("Campos vacíos", "Por favor completa todos los campos.", "warning");
        } else {
            setTimeout(() => {
                table.ajax.reload(null, false);
                $("#modalEditConcepto").modal("hide");
            }, 1000);
        }
    });
};
