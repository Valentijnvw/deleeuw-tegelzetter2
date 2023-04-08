@push('head')
    <script src="{{ asset('js/partials/calendar.js')}}"></script>
@endpush

<x-app-layout>
    <h4>Drag these onto the calendar:</h4>

<!-- External Events -->
<ul id="external-events" class="fullcalendar-custom list-unstyled list-unstyled-py-2 w-sm-50 mb-5">
	<li>
		<!-- Event -->
		<div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event fc-daygrid-inline-block-event'
				 data-event='{
					 "title": "Open a new task on Jira",
					 "image": "../assets/svg/brands/jira-icon.svg",
					 "className": ""
				 }'>
			<div class='fc-event-title'>
				<div class='d-flex align-items-center'>
					<img class="avatar avatar-xss me-2" src="../assets/svg/brands/jira-icon.svg" alt="Image Description">
					<span>Open a new task on Jira</span>
				</div>
			</div>
		</div>
		<!-- End Event -->
	</li>

	<li>
		<!-- Event -->
		<div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event fc-daygrid-inline-block-event fc-event-success'
				 data-event='{
					 "title": "Send weekly invoice to John",
					 "image": "../assets/svg/brands/excel-icon.svg",
					 "className": "fc-event-success"
				 }'>
			<div class='fc-event-title'>
				<div class='d-flex align-items-center'>
					<img class="avatar avatar-xss me-2" src="../assets/svg/brands/excel-icon.svg" alt="Image Description">
					<span>Send weekly invoice to John</span>
				</div>
			</div>
		</div>
		<!-- End Event -->
	</li>

	<li>
		<!-- Event -->
		<div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event fc-daygrid-inline-block-event'
				 data-event='{
					 "title": "Shoot a message to Christina on Slack",
					 "image": "../assets/svg/brands/slack-icon.svg",
					 "className": ""
				 }'
		>
			<div class='fc-event-title'>
				<div class='d-flex align-items-center'>
					<img class="avatar avatar-xss me-2" src="../assets/svg/brands/slack-icon.svg" alt="Image Description">
					<span>Shoot a message to Christina on Slack</span>
				</div>
			</div>
		</div>
		<!-- End Event -->
	</li>
</ul>
<!-- End External Events -->

<!-- Fullcalendar -->
<div id="js-fullcalendar-draggable" class="fullcalendar-custom"></div>
<!-- End Fullcalendar -->
    </div>
</x-app-layout>