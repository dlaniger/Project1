var Script = function () {


    /* initialize the external events
     -----------------------------------------------------------------*/

    $('#external-events div.external-event').each(function() {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
            title: $.trim($(this).text()) // use the element's text as the event title
        };

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject);

        // make the event draggable using jQuery UI
        $(this).draggable({
            zIndex: 999,
            revert: true,      // will cause the event to go back to its
            revertDuration: 0  //  original position after the drag
        });

    });


    /* initialize the calendar
     -----------------------------------------------------------------*/

    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();

    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next',
            center: 'title',
            right: 'month,basicWeek,basicDay'
        },
        editable: true,
        droppable: true, // this allows things to be dropped onto the calendar !!!
        drop: function(date, allDay) { // this function is called when something is dropped

            // retrieve the dropped element's stored Event Object
            var originalEventObject = $(this).data('eventObject');

            // we need to copy it, so that multiple events don't have a reference to the same object
            var copiedEventObject = $.extend({}, originalEventObject);

            // assign it the date that was reported
            copiedEventObject.start = date;
            copiedEventObject.allDay = allDay;

            // render the event on the calendar
            // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
            $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

            // is the "remove after drop" checkbox checked?
            if ($('#drop-remove').is(':checked')) {
                // if so, remove the element from the "Draggable Events" list
                $(this).remove();
            }

        },
        events: [
            {
                title: 'Dennis Bugayong',
                start: new Date(y, m, 10, 14, 0),
                end: new Date(y, m, 13, 12, 0),
                allDay: false,
                backgroundColor: "#c9302c",
                borderColor: "#c9302c"
            },
            {
                title: 'Jason Mraz',
                start: new Date(y, m, 13, 14, 0),
                end: new Date(y, m, 15, 12, 0),
                allDay: false
            },
            {
                title: 'Coralie Lainé',
                start: new Date(y, m, 20, 14, 0),
                end: new Date(y, m, 24, 12, 0),
                allDay: false
            },
            {
                title: 'Jack Johnson',
                start: new Date(y, m, 18, 14, 0),
                end: new Date(y, m, 20, 12, 0),
                allDay: false
            },
            {
                title: 'Dakota Johnson',
                start: new Date(y, m, 3, 14, 0),
                end: new Date(y, m, 10, 12, 0),
                allDay: false
            },
        ],
        eventColor: "#428bca"
    });


}();