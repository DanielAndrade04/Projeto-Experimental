document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'pt-br',
        plugins: ['interaction', 'dayGrid'],
        //defaultDate: '2019-04-12',
        editable: true,
        eventLimit: true,
        defaultTimedEventDuration:'01:00:00',
        businessHours: {
          // days of week. an array of zero-based day of week integers (0=Sunday)
          daysOfWeek: [ 1, 2, 3, 4, 5, 6 ], // Monday - Saturday

          startTime: '09:00', // a start time 
          endTime: '20:00', // an end time 
        },
        events: 'list_eventos.php',
        extraParams: function () {
            return {
                cachebuster: new Date().valueOf()
            };
        },
        eventClick: function (info) {
            info.jsEvent.preventDefault(); // don't let the browser navigate
            console.log(info.event);
            $('#visualizar #id').text(info.event.id);
            $('#visualizar #id').val(info.event.id);
            $('#visualizar #title').text(info.event.title);
            $('#visualizar #title').val(info.event.title);
            $('#visualizar #description').text(info.event.extendedProps.description);
            $('#visualizar #description').val(info.event.extendedProps.description);
            $('#visualizar #color').text(info.event.color);
            $('#visualizar #color').val(info.event.color);
            $('#visualizar #start').text(info.event.start.toLocaleString());
            $('#visualizar #start').val(info.event.start.toLocaleString());
            $('#visualizar #color').val(info.event.backgroundColor);
            $('#visualizar').modal('show');
        },
        selectable: true,
        select: function (info) {
            //alert('Início do evento: ' + info.start.toLocaleString());
            $('#cadastrar #start').val(info.start.toLocaleString());
            $('#cadastrar').modal('show');
        }
    });

    calendar.render();
});

//Mascara para o campo data e hora
function DataHora(evento, objeto) {
    var keypress = (window.event) ? event.keyCode : evento.which;
    campo = eval(objeto);
    if (campo.value == '00/00/0000 00:00:00') {
        campo.value = "";
    }

    caracteres = '0123456789';
    separacao1 = '/';
    separacao2 = ' ';
    separacao3 = ':';
    conjunto1 = 2;
    conjunto2 = 5;
    conjunto3 = 10;
    conjunto4 = 13;
    conjunto5 = 16;
    if ((caracteres.search(String.fromCharCode(keypress)) != -1) && campo.value.length < (19)) {
        if (campo.value.length == conjunto1)
            campo.value = campo.value + separacao1;
        else if (campo.value.length == conjunto2)
            campo.value = campo.value + separacao1;
        else if (campo.value.length == conjunto3)
            campo.value = campo.value + separacao2;
        else if (campo.value.length == conjunto4)
            campo.value = campo.value + separacao3;
        else if (campo.value.length == conjunto5)
            campo.value = campo.value + separacao3;
    } else {
        event.returnValue = false;
    }
}

$(document).ready(function () {
    $("#addevent").on("submit", function (event) {
        event.preventDefault();
            if($('#title').val() == ""){
                //Alerta de campo nome vazio
                $("#msg-error").html('<div class="alert alert-danger" role="alert">Necessário prencher o campo nome!</div>');
            }else if($('#description').val() == ""){
                //Alerta de campo email vazio
                $("#msg-error").html('<div class="alert alert-danger" role="alert">Necessário prencher o telefone !</div>');
            }else if(isNaN($('#description').val())){
                //Alerta de campo email vazio
                $("#msg-error").html('<div class="alert alert-danger" role="alert">O campo deve conter apenas numeros!</div>');    

            }else{
            $.ajax({
                method: "POST",
                url: "cad_event.php",
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (retorna) {
                    if (retorna['sit']) {
                        //$("#msg-cad").html(retorna['msg']);
                        location.reload();
                    } else {
                        $("#msg-cad").html(retorna['msg']);
                    }
                }
            })
        }        

    });
    
    $('.btn-canc-vis').on("click", function(){
        $('.visevent').slideToggle();
        $('.formedit').slideToggle();
    });
    
    $('.btn-canc-edit').on("click", function(){
        $('.formedit').slideToggle();
        $('.visevent').slideToggle();
    });
    
    $("#editevent").on("submit", function (event) {
        event.preventDefault();
                   $.ajax({
                method: "POST",
                url: "edit_event.php",
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (retorna) {
                    if (retorna['sit']) {
                        //$("#msg-cad").html(retorna['msg']);
                        location.reload();
                    } else {
                        $("#msg-edit").html(retorna['msg']);
                    }
                }
            }) 
    });
});