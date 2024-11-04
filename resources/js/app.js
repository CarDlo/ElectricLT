import './bootstrap';
import 'flowbite';
import Swal from 'sweetalert2'
window.Swal = Swal; // Hacer que Swal esté disponible globalmente

import Dropzone from 'dropzone';
import 'dropzone/dist/dropzone.css'; // Importar los estilos de Dropzone

document.addEventListener('DOMContentLoaded', () => {
    new Dropzone('#my-dropzone', {
        url: '/upload/{cedula}', // Configura la URL de tu controlador
        paramName: 'file', // Define el nombre del parámetro de archivo
        maxFilesize: 2, // Configura el tamaño máximo de archivo en MB
        acceptedFiles: 'image/*,application/pdf', // Especifica los tipos de archivos permitidos
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Añade el token CSRF
        }
    });
});