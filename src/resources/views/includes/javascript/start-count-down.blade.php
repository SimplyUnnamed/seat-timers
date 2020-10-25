<script>

    var timers = [];
    var timers_interval = null;

    function setCountDown(id, text){
        $("td .countdown[data-id='"+id+"']").text(text);
    }

    function registerTimers(){
        timers = [];
        $(".cd-datetime").each(function(){
            var eventTime = moment.utc($(this).text(), 'YYYY-MM-DD HH:mm:ss').unix();
            var currentTime = moment.utc().unix()
            var timeLeft = eventTime - currentTime;

            var timer = {
                dt: moment.duration(timeLeft, 'seconds'),

                id: $(this).attr('data-id'),
            }
            timers.push(timer);
        })
    }

    function runTimers(){

        clearInterval(timers_interval);

        registerTimers();

        timers_interval = setInterval(function(){
            for(var i = 0; i < timers.length; i++){
                var timer = timers[i];
                timer.dt = moment.duration(timer.dt.asSeconds()-1, 'seconds');
                var text = timer.dt.days() + 'd '+timer.dt.hours()+'h '+timer.dt.minutes()+'m '+timer.dt.seconds()+'s';
                setCountDown(timer.id, text);
            }
        }, 1000)
    }

    $(document).ready(function(){
        runTimers();
    })


</script>
