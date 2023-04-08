import 'bootstrap/dist/js/bootstrap.bundle.min.js'

import.meta.glob([
  '../img/**',
  './pages/**'
]);

// import '/node_modules/@fortawesome/fontawesome-free/js/fontawesome.min.js';
// import '/node_modules/@fortawesome/fontawesome-free/js/all.js';

import jQuery from 'jquery';
window.$ = jQuery;

import DataTable from '/node_modules/datatables.net/js/jquery.dataTables.mjs';
window.DataTable = DataTable;

import TomSelect from 'tom-select';
window.TomSelect = TomSelect;
import 'tom-select/dist/css/tom-select.bootstrap5.css'

import flatpickr from "/node_modules/flatpickr";
window.flatpickr = flatpickr;

import { Calendar } from '@fullcalendar/core';
window.Calendar = Calendar;
import timeGridPlugin from '/node_modules/@fullcalendar/timegrid';
window.timeGridPlugin = timeGridPlugin;

import './hs.core.js'
import './hs/hs.datatables.js'