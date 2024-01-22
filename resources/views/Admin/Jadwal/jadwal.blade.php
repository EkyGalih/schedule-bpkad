@extends('Admin.index')
@section('title', 'Admin | Jadwal')
@section('additional-css')
<style>

    body {
      margin-top: 40px;
      font-size: 14px;
      font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    }

    #external-events {
      position: absolute;
      width: 150px;
      padding: 0 10px;
      border: 1px solid #ccc;
      background: #eee;
      text-align: left;
    }

    #external-events h4 {
      font-size: 16px;
      margin-top: 0;
      padding-top: 1em;
    }

    #external-events .fc-event {
      margin: 3px 0;
      cursor: move;
    }

    #external-events p {
      margin: 1.5em 0;
      font-size: 11px;
      color: #666;
    }

    #external-events p input {
      margin: 0;
      vertical-align: middle;
    }

    #calendar-wrap {
      margin-left: 200px;
    }

    #calendar {
      max-width: 1100px;
      margin: 0 auto;
    }

  </style>
@endsection
@section('content')
<h1 class="mt-4">Kalender</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Kalender</li>
    </ol>

        <div id='external-events'>
          <h4>Kegiatan</h4>

            @php
                $tahun = date('Y');
                $users_id = Auth::user()->id;
                $bidang_id = Auth::user()->bidang_id;
            @endphp
        <div id="tahun" hidden>{{ $tahun }}</div>
        <div id="users_id" hidden>{{ $users_id }}</div>
        <div id="bidang_id" hidden>{{ $bidang_id }}</div>

          <div id='external-events-list'>
            @foreach ($kegiatans as $kegiatan)
            <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
                <div class='fc-event-main' id="kegiatan">{{ $kegiatan->kegiatan }}</div>
              </div>
            @endforeach
          </div>

          <p>
            <input type='checkbox' id='drop-remove' />
            <label for='drop-remove'>remove after drop</label>
          </p>
        </div>

        <div id='calendar-wrap'>
          <div id='calendar'></div>
        </div>

@endsection
@section('additional-js')
<script src="{{ asset('js/jquery.min.js') }}"></script>
   <script src="{{ asset('js/index.global.js') }}"></script>
   <script>

       var tahun = $('#tahun').text();
       var bidang_id = $('#bidang_id').text();
       var users_id = $('#users_id').text();

       document.addEventListener('DOMContentLoaded', function() {

      /* initialize the external events
      -----------------------------------------------------------------*/

      var containerEl = document.getElementById('external-events-list');
      new FullCalendar.Draggable(containerEl, {
        itemSelector: '.fc-event',
        eventData: function(eventEl) {
          return {
            title: eventEl.innerText.trim()
          }
        }
      });

            /* initialize the calendar
      -----------------------------------------------------------------*/

        var cal;

        $.ajax({
        type: "GET",
        async: false,
        data: {cal:cal},
        url: '{{ url('jadwals') }}',
        success: function(data) {
            cal = data;
        }
        });

      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
          headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        navLinks: true,
        selectable: true,
        selectMirror: true,
        editable: true,
        droppable: true, // this allows things to be dropped onto the calendar
        drop: function(arg) {
            var keg_id;
            var tahun_id;
            var keg = arg.draggedEl.innerText;
            var allDay = arg.allDay;
            if (allDay == true) {
                var waktu_mulai = arg.dateStr;
                var waktu_berakhir = arg.dateStr;
            }
            $.ajax({
                type: 'GET',
                async: false,
                data: {keg_id:keg_id},
                url: '{{ url('kegiatan') }}/'+keg,
                success: function(data){
                    keg_id = data;
                }
            });
            $.ajax({
                type: 'GET',
                async: false,
                data: {tahun_id:tahun_id},
                url: '{{ url('tahun') }}/'+tahun,
                success: function(data){
                    tahun_id = data;
                }
            });
            if (confirm('anda yakin?')) {
                $.ajax({
                    type: "post",
                    async: true,
                    data: {keg_id:keg_id, tahun_id: tahun_id, waktu_mulai: waktu_mulai, waktu_berakhir:waktu_berakhir, bidang_id: bidang_id, users_id: users_id, keterangan: keg},
                    url: '{{ url('jadwal') }}',
                    success: function(data){
                        windows.alert("Jadwal berhasil dibuat!");
                    }, error: function (error) {
                        console.log(error);
                    }
                });
            }
        },
        eventDrop: function(info)
        {
            if (!confirm("Apa anda yakin mengubah jadwal?")) {
                info.revert();
            } else {
                $.ajax({
                    type: 'PUT',
                    url: '{{ url('updateJadwals') }}/'+info.event.id,
                    data: {allDay: info.event.allDay, date: info.event.startStr, waktu_mulai : info.event.start, waktu_berakhir:info.event.end, keterangan: info.event.title},
                    success: function (data) {
                        console.log('success');
                    }
                });
            }
        },
        events: cal,
      });
      calendar.render();

    });

  </script>
@endsection
