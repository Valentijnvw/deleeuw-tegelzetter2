import 'bootstrap/dist/js/bootstrap.bundle.min.js'

import.meta.glob([
  '../img/**',
]);

// import $ from 'jquery';
// window.$ = $
// import 'datatables/media/js/jquery.dataTables.min.js';
// import 'datatables/media/css/jquery.dataTables.min.css';

import 'fontawesome-free/js/fontawesome.min.js';
import 'fontawesome-free/js/all.js';

import Alpine from 'alpinejs';
import TomSelect from 'tom-select';

import 'tom-select/dist/css/tom-select.bootstrap5.css'


window.TomSelect = TomSelect;

window.Alpine = Alpine;

Alpine.start();

