@push('scripts')
    <script type="module">
		var calendarEl = document.getElementById("js-fullcalendar-with-search");
		const calendar = new Calendar(calendarEl, {
			plugins: [timeGridPlugin],
			locale: nlLocale,
			initialView: 'timeGridWeek',
			headerToolbar: {
				left: 'prev,next',
				center: 'title',
				right: 'timeGridWeek,timeGridDay' // user can switch between the two
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