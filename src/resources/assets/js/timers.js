
var ROUNDING = 15 * 60  * 1000;
nowRounded = moment.utc()
nowRounded = moment.utc(Math.ceil((+nowRounded) / ROUNDING) * ROUNDING)

var options = {
    timePicker: true,
    timePicker24Hour: true,
    singleDatePicker: true,
    minDate: moment.utc(),

    locale: {
        "format" : "DD/MM/YYYY HH:mm",
        'cancelLabel' : 'clear',
    },
    parentEl: "#Add-Timer"
};

$(".datepicker input").daterangepicker(options);

$('#event-datetime').on('cancel.daterangepicker', function(ev, picker) {
    //do something, like clearing an input
    $('#event-datetime').val('');
    $(".countdown input", "#Add-Timer").attr('readonly', false);
});

$(".datepicker input").val('');

$("#event-datetime").on('change', function(){

    if(!$(this).val() == ''){
        $(".countdown input", "#Add-Timer").attr('readonly', 'readonly');
    }

    var setTime = moment.utc($(this).val(), 'DD/MM/YYYY HH:mm');
    var currentTime = moment.utc();

    var seconds = setTime.diff(currentTime, 'seconds')
    var minutes = setTime.diff(currentTime, 'minutes')
    var hours = setTime.diff(currentTime,'hours')
    var days = setTime.diff(currentTime, 'days', true)


    //no we need to normalise the hours, minutes, seconds.
    //24 hours in a day
    var hoursOffset = Math.floor(days) * 24;
    var minutesOffset = Math.floor(days * 24) * 60;
    var secondsOffset = Math.floor(days * 24 * 60) * 60;

    //And adjust the values
    hours = hours - hoursOffset;
    minutes = minutes - minutesOffset;
    seconds = seconds - secondsOffset;

    $("#day-timer").val(Math.floor(days));
    $("#hour-timer").val(hours);
    $("#minute-timer").val(minutes);
    $("#second-timer").val(seconds);
});

