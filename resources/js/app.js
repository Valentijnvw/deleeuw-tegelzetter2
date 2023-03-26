import './bootstrap';
import 'bootstrap';
// import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap/dist/js/bootstrap.min.js'

import.meta.glob([
  '../img/**',
]);

import $ from 'jquery';
window.$ = $

import Alpine from 'alpinejs';
import TomSelect from 'tom-select';

import 'tom-select/dist/css/tom-select.bootstrap5.css'

import 'bootstrap-icons/font/bootstrap-icons.css'

window.TomSelect = TomSelect;

window.Alpine = Alpine;

Alpine.start();