import Swal from "sweetalert2"
const registerForm = document.getElementById('registerForm')

const validateForm = (form, event) => {
    if (!form.checkValidity()) {

        form.classList.add('was-validated')
        return false

    }
    return true
}

registerForm.addEventListener("submit", (event) => {
    event.preventDefault()
    const validated = validateForm(registerForm, event)
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
        if (response.isConfirmed || response.isDismissed) {
            registerForm.submit()
        }

    })
})