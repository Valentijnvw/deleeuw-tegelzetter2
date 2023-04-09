@push('scripts')
    <script type="module">
		var calendarEl = document.getElementById("js-fullcalendar-with-search");
		const calendar = new Calendar(calendarEl, {
			plugins: [dayGridPlugin, timeGridPlugin],
			locale: nlLocale,
			initialView: 'dayGridMonth',
			headerToolbar: {
				left: 'prev,next,today',
				center: 'title',
				right: 'dayGridMonth, timeGridWeek,timeGridDay' // user can switch between the two
			},
			events: '{{ route('api.calendar.opdrachten') }}'
		});

		calendar.render();
	</script>
@endpush

<x-app-layout title="Agenda" header="Agenda">

<!-- Fullcalendar -->
{{-- <div id="js-fullcalendar-draggable" class="fullcalendar-custom"></div> --}}
<div id="js-fullcalendar-with-search" class="fullcalendar-custom"></div>
<!-- End Fullcalendar -->
    </div>
</x-app-layout>