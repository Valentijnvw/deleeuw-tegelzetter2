import './bootstrap';

import.meta.glob([
    '../images/**',
  ]);

import $ from 'jquery';
window.$ = $

import Alpine from 'alpinejs';
import TomSelect from 'tom-select';

import 'tom-select/dist/css/tom-select.bootstrap5.css'

window.TomSelect = TomSelect;

window.Alpine = Alpine;

Alpine.start();