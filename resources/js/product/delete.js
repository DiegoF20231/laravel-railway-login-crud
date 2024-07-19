import Swal from "sweetalert2";

const aDelete = document.getElementById('delete')
aDelete.addEventListener("click", (event) => {
    event.preventDefault();
    Swal.fire({
        title: 'Mensaje',
        icon: 'question',
        text: '¿Desea eliminar este producto?',
        showConfirmButton: true,
        confirmButtonText: 'Eliminar',
        confirmButtonColor: '#2196f3',
        denyButtonColor: '#e51c23',
        showDenyButton: true,
        denyButtonText: 'Cancelar'
    }).then(response => {
        if (response.isConfirmed) {
            window.location.href = aDelete.href
        }
    })
})
