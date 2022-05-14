<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js" integrity="sha512-iusSCweltSRVrjOz+4nxOL9OXh2UA0m8KdjsX8/KUUiJz+TCNzalwE0WE6dYTfHDkXuGuHq3W9YIhDLN7UNB0w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/gcal.min.js" integrity="sha512-X22wrzog4NcL9NM97PKUVhWH4K6MSp9f6iIYHtXkKVwEXZ8GqkWOkLWdBeStyPuuKRkNzkkGVr5v++qMoYM5Fg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/locale/bg.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</head>

<style>
    #calendar .fc-toolbar { text-transform: capitalize; }
    #calendar .fc-day-header { text-transform: capitalize; }
</style>


<!-- Modal -->
<div class="modal fade" id="bookingEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Добави събитие</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="">
                @csrf
                <div class="modal-body">
                    <label class="form-label">Начален час:</label>
                    <input type = "text"  class="form-control" id="start" readonly="readonly">
                </div>
                <div class="modal-body">
                    <label class="form-label">Краен час:</label>
                    <input type = "text" class="form-control" id="end" readonly="readonly">
                </div>
                <div class="modal-body">
                    <label class="form-label">Дейност:</label>
                    <input type = "text" class="form-control" id="title" />
                </div>
                <div class="modal-body">
                    <label class="form-label">Клиент:</label>
                    <select name="client_id" id="client_id" class="form-control">
                        <option value="">Зареждане...</option>
                    </select>
                </div>
                <div class="modal-body">
                    <label class="form-label">Специалист:</label>
                    <select name="user_id" id="user_id" class="form-control">
                        <option value="">Зареждане...</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <input onClick="edit" type="button" class="btn btn-primary" value="Редактирай">
                    <input onClick="delete" type="button" class="btn btn-danger" value="Изтрий">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Изход</button>
                </div>
            </form>

        </div>
    </div>
</div>

<div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Добави събитие</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="" onsubmit="return modalsubmit()">
                @csrf
            <div class="modal-body">
                <label class="form-label">Начален час:</label>
                <input type = "text"  class="form-control" id="start" readonly="readonly">
            </div>
            <div class="modal-body">
                <label class="form-label">Краен час:</label>
                <input type = "text" class="form-control" id="end" readonly="readonly">
            </div>
            <div class="modal-body">
                <label class="form-label">Дейност:</label>
                <input type = "text" class="form-control" id="title" />
            </div>
            <div class="modal-body">
                <label class="form-label">Клиент:</label>
                <select name="client_id" id="client_id" class="form-control">
                   <option value="">Зареждане...</option>
                </select>
            </div>
            <div class="modal-body">
                <label class="form-label">Специалист:</label>
                <select name="user_id" id="user_id" class="form-control">
                    <option value="">Зареждане...</option>
                </select>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary" value="Добави">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Изход</button>
            </div>
            </form>

        </div>
    </div>
</div>
</form>

<div class="container">
    <div id="calendar"></div>
</div>


<script>

    $(document).ready(function () {


        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            },
        });

        /*var clients = $.get('calender/full-calender', (data,status) => {
            console.log(data);
        })*/

        var calendar = $('#calendar').fullCalendar({
            editable:true,
            header:{
                left:'prev,next today',
                center:'title',
                right:'month,agendaWeek,agendaDay'
            },
            locale:'bg',
            events:'calender/full-calender',
            selectable:true,
            selectHelper: true,
            select:function(start, end, allDay)
            {
                $('#bookingModal').modal('show');

                var start = $.fullCalendar.formatDate(start, 'Y-MM-DD HH:mm:ss');
                var end = $.fullCalendar.formatDate(end, 'Y-MM-DD HH:mm:ss');
                $('#start').val(start);
                $('#end').val(end);

            },



            /*
                            $.ajax({
                                url:"/full-calender/action",
                                type:"POST",
                                data:{
                                    title: title,
                                    client_id: client_id,
                                    user_id: user_id,
                                    start: start,
                                    end: end,
                                    type: 'add'
                                },
                                success:function(data)
                                {
                                    calendar.fullCalendar('refetchEvents');
                                    alert("Успешно създадено събитие");
                                }
                            })
               */


            editable:true,
            eventResize: function(event, delta)
            {
                var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
                var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
                var title = event.title;
                var id = event.id;
                $.ajax({
                    url:"/full-calender/action",
                    type:"POST",
                    data:{
                        title: title,
                        start: start,
                        end: end,
                        id: id,
                        type: 'update'
                    },
                    success:function(response)
                    {
                        calendar.fullCalendar('refetchEvents');
                        alert("Успешно обновяване");
                    }
                })
            },
            eventDrop: function(event, delta)
            {
                var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
                var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
                var title = event.title;
                var id = event.id;
                $.ajax({
                    url:"/full-calender/action",
                    type:"POST",
                    data:{
                        title: title,
                        start: start,
                        end: end,
                        id: id,
                        type: 'update'
                    },
                    success:function(response)
                    {
                        calendar.fullCalendar('refetchEvents');
                        alert("Успешно обновяване");
                    }
                })
            },

            eventClick:function(event)
            {
                var id = event.id;

                console.log(event);

                $('#bookingEditModal').modal('show');

                setTimeout(() => {
                    $('#bookingEditModal #start').val(event.start._i);
                    $('#bookingEditModal #end').val(event.end._i);
                    $('#bookingEditModal #title').val(event.title);
                    $('#bookingEditModal #client_id').val(event['client_id']);
                    $('#bookingEditModal #user_id').val(event['user_id']);
                }, 1000);




                // if(confirm("Желаете ли да бъде изтрито?"))
                // {
                //     $.ajax({
                //         url:"/full-calender/action",
                //         type:"POST",
                //         data:{
                //             id:id,
                //             type:"delete"
                //         },
                //         success:function(response)
                //         {
                //             calendar.fullCalendar('refetchEvents');
                //             alert("Успешно изтрито събитие");
                //         }
                //     })
                // }
            }


        });

        $.ajax({
            url:"/calender/clients",
            type:"GET",
            data:{

            },
            success:function(data)
            {
                $('#bookingModal #client_id').html('<option value="">Изберете</option>');
                $('#bookingEditModal #client_id').html('<option value="">Изберете</option>');

                data.forEach(function(element){
                    $('#bookingModal #client_id').append('<option value="'+element.id+'">'+element.name+'</option>');
                    $('#bookingEditModal #client_id').append('<option value="'+element.id+'">'+element.name+'</option>');
                });
            }
        });

        $.ajax({
            url:"/calender/specialists",
            type:"GET",
            data:{

            },
            success:function(data)
            {
                $('#bookingModal #user_id').html('<option value="">Изберете</option>');
                $('#bookingEditModal #user_id').html('<option value="">Изберете</option>');

                data.forEach(function(element){
                    $('#bookingModal #user_id').append('<option value="'+element.id+'">'+element.name+'</option>');
                    $('#bookingEditModal #user_id').append('<option value="'+element.id+'">'+element.name+'</option>');
                });
            }
        });

        $('#bookingModal').on('shown.bs.modal',function(){

            $('#bookingModal #client_id').val("");
            $('#bookingModal #user_id').val("");
            $('#bookingModal #title').val('');

        });


    });

    function edit(e) {

    }

    /*function delete (e) {

    }*/

        function modalsubmit(){
                 $.ajax({
                    url:"/full-calender/action",
                    type:"POST",
                    data:{
                        title: $('#title').val(),
                        client_id: $('#client_id').val(),
                        user_id: $('#user_id').val(),
                        start: $('#start').val(),
                        end: $('#end').val(),
                        type: 'add'
                    },

           success:function(data)
            {
                $('#calendar').fullCalendar('refetchEvents');
                alert("Успешно създадено събитие");
                $('#bookingModal').modal('hide');
            }
        })
        return false;
    }

</script>



