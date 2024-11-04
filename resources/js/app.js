import './bootstrap';
import 'flowbite';
import Swal from 'sweetalert2'
window.Swal = Swal; // Hacer que Swal esté disponible globalmente

import Dropzone from 'dropzone';
import 'dropzone/dist/dropzone.css'; // Importar los estilos de Dropzone

window.Dropzone = Dropzone;
Dropzone.autoDiscover = false; // Desactiva la autodetección