import { Toast } from '/node_modules/bootstrap/dist/js/bootstrap.esm.min.js';
window.Toast = Toast;

import.meta.glob([
  '../img/**',
  './pages/**'
]);

import '/node_modules/@fortawesome/fontawesome-free/js/fontawesome.min.js';
import '/node_modules/@fortawesome/fontawesome-free/js/all.js';

import jQuery from 'jquery';
window.$ = jQuery;

import DataTable from '/node_modules/datatables.net/js/jquery.dataTables.mjs';
window.DataTable = DataTable;

import TomSelect from 'tom-select';
window.TomSelect = TomSelect;
import 'tom-select/dist/css/tom-select.bootstrap5.css'

import flatpickr from "/node_modules/flatpickr";
import "/node_modules/flatpickr/dist/flatpickr.css";
window.flatpickr = flatpickr;

import { Calendar } from '@fullcalendar/core';
window.Calendar = Calendar;
import timeGridPlugin from '/node_modules/@fullcalendar/timegrid';
window.timeGridPlugin = timeGridPlugin;
import dayGridPlugin from '/node_modules/@fullcalendar/daygrid';
window.dayGridPlugin = dayGridPlugin;
import nlLocale from '/node_modules/@fullcalendar/core/locales/nl';
window.nlLocale = nlLocale;

import './hs.core.js'
import './hs/hs.datatables.js'

import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

window.truncate = function(str, n){
  return (str.length > n) ? str.slice(0, n-1) + '&hellip;' : str;
};