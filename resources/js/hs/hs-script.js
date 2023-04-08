
$(function() {
    // HSCore.components.HSTomSelect.init('.js-select')
    HSCore.components.HSDatatables.init('.js-datatable')
    // var calendarEl = document.getElementById('calendar');
    // var calendar = new FullCalendar.Calendar(calendarEl, {
    //     initialView: 'dayGridMonth'
    // });
    // calendar.render();
    // ADD DRAGGABLE CLASS FOR CALENDAR
	// =======================================================
	const Draggable = FullCalendar.Draggable

	new Draggable(document.querySelector('#external-events'), {
		itemSelector: '.fc-event'
	})

    const eventContent = function(data) {
        return `
            <div class="d-flex align-items-center px-2">
                ${data && data.extendedProps.image ? `<img class="avatar avatar-xss" src="${data.extendedProps.image}" alt="Image Description">` : ''}
                <span class="fc-event-title fc-sticky">${data.title}</span>
            </div>
        `;
    };

    HSCore.components.HSFullCalendar.init('#js-fullcalendar-draggable', {
        initialView: 'timeGridWeek',
        locale: 'nl',
        events: [
            {
                "title": "Afspraak 1",
                "start": "2020-09-06T04:00:00",
                "end": "2020-09-06T05:30:00"
            },
            {
                "title": "Afspraak 2",
                "start": "2020-09-08T05:00:00",
                "end": "2020-09-08T07:30:00"
            }
        ],
        initialDate: "2020-09-10",
        headerToolbar: {
            left: "prev,next today",
            center: "title",
            right: "",
        },
        editable: true,
        eventContent({event}) {
            return {
                html: eventContent(event),
            }
        },
        drop({draggedEl}) {
            draggedEl.remove();
        }
    })
    
})