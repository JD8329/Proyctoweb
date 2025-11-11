document.addEventListener("DOMContentLoaded", function () {
    nextFacturaid();

    document.getElementById("btnAddRow").addEventListener("click", agregarFila);

    $(document).on("click", ".delete-tr", function () {
        $(this).parent().parent().remove();
    });

    // Evento delegado para cambios en selects de productos
    $(document).on('change', 'select[name="producto[]"]', function () {
        const selectedOption = $(this).find('option:selected');
        const precio = selectedOption.data('precio');
        const row = $(this).closest('tr');

        row.find('input[name="listPrecio[]"]').val(precio);
        calcularSubtotal(row);
    });

    // Evento delegado para cambios en cantidad
    $(document).on('input', 'input[name="listCantidad[]"]', function () {
        calcularSubtotal($(this).closest('tr'));
    });

});

function nextFacturaid() {
    fetch("ajax.php?module=Factura&controller=Factura&function=getNextFacturaId")
        .then(response => response.json())
        .then(data => {
            document.getElementById("nofact").value = data.next_id;
        })
        .catch(error => console.error("Error al obtener el próximo número de factura:", error));
}
function agregarFila() {
    const tabla = document.querySelector("#dt_factura tbody");
    if (!tabla) {
        console.error("No se encontró la tabla con ID dt_factura");
        return;
    }

    const nuevaFila = document.createElement("tr");

    // Crear celdas
    const celdas = ["td", "td", "td", "td", "td"].map(() => document.createElement("td"));

    // Configurar select de productos
    celdas[0].appendChild(crearSelectProducto());

    // Configurar inputs
    celdas[1].innerHTML = '<input name="listPrecio[]" type="number" class="form-control" readonly>';
    celdas[2].innerHTML = '<input name="listCantidad[]" type="number" class="form-control" min="1" value="1">';
    celdas[3].innerHTML = '<input name="listSubtotal[]" type="number" class="form-control" readonly>';
    celdas[4].innerHTML = '<input name="btnDel[]" type="button" class="btn btn-danger delete-tr" value="-">';

    // Agregar celdas a la fila
    celdas.forEach(celda => nuevaFila.appendChild(celda));

    // Agregar fila a la tabla
    tabla.appendChild(nuevaFila);
}



function crearSelectProducto() {
    const primerSelect = document.querySelector("select[name='producto[]']");
    if (!primerSelect) {
        console.error("No se encontró el select de productos base");
        return document.createElement("select");
    }

    const nuevoSelect = primerSelect.cloneNode(true);
    nuevoSelect.value = "0"; // Resetear valor seleccionado
    return nuevoSelect;
}
function calcularSubtotal(row) {
    const precio = parseFloat(row.find('input[name="listPrecio[]"]').val()) || 0;
    const cantidad = parseFloat(row.find('input[name="listCantidad[]"]').val()) || 0;
    const subtotal = (precio * cantidad).toFixed(2);

    row.find('input[name="listSubtotal[]"]').val(subtotal);
}


