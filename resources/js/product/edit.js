import Swal from "sweetalert2"
const editProductForm = document.querySelector('.editModalF')
console.log(editProductForm)
// editProductForm.addEventListener('submit', (event) => {
//     console.log('Hola')
//     event.preventDefault()
//     const validated = validateForm(editProductForm)
//     if (!validated) return

//     Swal.fire({
//         title: 'Mensaje',
//         icon: 'question',
//         text: '¿Desea enviar esta informacion?',
//         showConfirmButton: true,
//         confirmButtonText: 'Enviar',
//         confirmButtonColor: '#2196f3',
//         denyButtonColor: '#e51c23',
//         showDenyButton: true,
//         denyButtonText: 'Cancelar'
//     }).then(response => {

//         if (response.isDenied || response.isDismissed) return

//         editProductForm.submit()
//     })
// })


// const validateForm = (form) => {

//     if (!form.checkValidity()) {
//         form.classList.add('was-validated')
//         return false
//     }

//     return true

// }