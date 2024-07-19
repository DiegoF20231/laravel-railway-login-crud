import Swal from "sweetalert2"
const createProductForm = document.getElementById('createProductForm')

createProductForm.addEventListener('submit', (event) => {
    event.preventDefault()
    console.log(Object.fromEntries(new FormData(event.target)))
    const validated = validateForm(createProductForm)
    if (!validated) return


    Swal.fire({
        title: 'Mensaje',
        icon: 'question',
        text: '¿Desea enviar esta informacion?',
        showConfirmButton: true,
        confirmButtonText: 'Enviar',
        confirmButtonColor: '#2196f3',
        denyButtonColor: '#e51c23',
        showDenyButton: true,
        denyButtonText: 'Cancelar'
    }).then(response => {

        if (response.isDenied || response.isDismissed) return

        createProductForm.submit()
    })
})


const validateForm = (form) => {

    if (!form.checkValidity()) {
        form.classList.add('was-validated')
        return false
    }

    return true

}
