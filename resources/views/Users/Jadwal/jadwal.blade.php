@extends('Users.index')
@section('title', 'Users | Jadwal')
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

        li.customStyle {
            list-style-type: none;
            margin-left: -33%;
            margin-bottom: 5%;
            padding: 5%;
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
            <label for='drop-remove'>Keterangan Warna</label>
        <ol>
            @foreach ($bidangs as $bidang)
                <li class="customStyle"
                    style="background-color: {{ $bidang->warna_bidang }}; color: {{ $bidang->warna_text }}">
                    {{ $bidang->nama_bidang }}</li>
            @endforeach
        </ol>
        </p>
    </div>


    <div id='calendar-wrap'>
        <div class="alert alert-success" id="msg" hidden></div>
        <div class="alert alert-danger" id="msg_error" hidden></div>
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
        var keg_id;
        var tahun_id;

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
                data: {
                    cal: cal
                },
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
                    var keg = arg.draggedEl.innerText;
                    var allDay = arg.allDay;
                    if (allDay == true) {
                        var waktu_mulai = arg.dateStr;
                        var waktu_berakhir = arg.dateStr;
                    }
                    $.ajax({
                        type: 'GET',
                        async: false,
                        data: {
                            keg_id: keg_id
                        },
                        url: '{{ url('kegiatan') }}/' + keg,
                        success: function(data) {
                            keg_id = data;
                        }
                    });
                    $.ajax({
                        type: 'GET',
                        async: false,
                        data: {
                            tahun_id: tahun_id
                        },
                        url: '{{ url('tahun') }}/' + tahun,
                        success: function(data) {
                            tahun_id = data;
                        }
                    });
                    if (confirm('anda yakin?')) {
                        $.ajax({
                            type: "post",
                            async: true,
                            data: {
                                keg_id: keg_id,
                                tahun_id: tahun_id,
                                waktu_mulai: waktu_mulai,
                                waktu_berakhir: waktu_berakhir,
                                bidang_id: bidang_id,
                                users_id: users_id,
                                keterangan: keg
                            },
                            url: '{{ url('jadwal') }}',
                            success: function(data) {
                                $('#msg').removeAttr('hidden');
                                $('#msg').text('Kegiatan berhasil dibuat!');
                                setTimeout(() => {
                                    location.reload();
                                }, 1);
                            },
                            error: function(error) {
                                console.log(error);
                            }
                        });
                    }
                },
                eventDrop: function(info) {
                    if (!confirm("Apa anda yakin mengubah jadwal?")) {
                        info.revert();
                    } else {
                        $.ajax({
                            type: 'PUT',
                            url: '{{ url('updateJadwals') }}/' + info.event.id,
                            data: {
                                allDay: info.event.allDay,
                                date: info.event.startStr,
                                waktu_mulai: info.event.start,
                                waktu_berakhir: info.event.end,
                                keterangan: info.event.title
                            },
                            success: function(data) {
                                console.log('success');
                            }
                        });
                    }
                },
                select: function(arg) {
                    var keg_id;
                    var tahun_id;
                    var waktu_mulai = arg.startStr;
                    var waktu_berakhir = arg.endStr;
                    let keg = prompt("Masukkan Jenis Kegiatan");

                    if (keg != "") {
                        $.ajax({
                            type: 'GET',
                            async: false,
                            data: {
                                keg_id: keg_id
                            },
                            url: '{{ url('kegiatan') }}/' + keg,
                            success: function(data) {
                                keg_id = data;
                            }
                        });
                        $.ajax({
                            type: 'GET',
                            async: false,
                            data: {
                                tahun_id: tahun_id
                            },
                            url: '{{ url('tahun') }}/' + tahun,
                            success: function(data) {
                                tahun_id = data;
                            }
                        });
                        if (keg_id != 'false') {
                            if (confirm('anda yakin?')) {
                                $.ajax({
                                    type: "post",
                                    async: true,
                                    data: {
                                        keg_id: keg_id,
                                        tahun_id: tahun_id,
                                        waktu_mulai: waktu_mulai,
                                        waktu_berakhir: waktu_berakhir,
                                        bidang_id: bidang_id,
                                        users_id: users_id,
                                        keterangan: keg
                                    },
                                    url: '{{ url('jadwal') }}',
                                    success: function(data) {
                                        $('#msg').removeAttr('hidden');
                                        $('#msg').text('Kegiatan berhasil dibuat!');
                                        setTimeout(() => {
                                            location.reload();
                                        }, 1500);
                                    },
                                    error: function(error) {
                                        console.log(error);
                                    }
                                });
                            }
                        } else {
                            $('#msg_error').removeAttr('hidden');
                            $('#msg_error').text('jenis kegiatan tidak ditemukan!');
                        }
                    } else {
                        $('#msg_error').removeAttr('hidden');
                        $('#msg_error').text('silahkan masukkan kegiatan!');
                    }
                },
                eventClick: function(arg) {
                    var bidang;
                    $.ajax({
                        type: 'GET',
                        async: false,
                        data: {
                            bidang: bidang
                        },
                        url: '{{ url('cekBidang') }}/' + arg.event.id,
                        success: function(data) {
                            bidang = data;
                        }
                    });
                    if (bidang == bidang_id) {
                        if (confirm("Apakah anda yakin hapus kegiatan?")) {
                            $.ajax({
                                type: 'GET',
                                url: '{{ url('deleteJadwal') }}/' + arg.event.id,
                                success: function(data) {
                                    $('#msg').removeAttr('hidden');
                                    $('#msg').text('Kegiatan berhasil dihapus!');
                                    setTimeout(() => {
                                        location.reload();
                                    }, 1500);
                                }
                            });
                            arg.event.remove();
                        }
                    } else {
                        $('#msg_error').removeAttr('hidden');
                        $('#msg_error').text('Maaf, ini bukan kegiatan anda!');
                        setTimeout(() => {
                            $('#msg_error').hide('slow');
                        }, 1500);
                    }
                },
                eventResize: function(arg) {
                    if (!confirm("Apa anda yakin mengubah jadwal?")) {
                        arg.revert();
                    } else {
                        $.ajax({
                            type: 'PUT',
                            url: '{{ url('ubahJadwalResize') }}/' + arg.event.id,
                            data: {
                                allDay: arg.event.allDay,
                                date: arg.event.startStr,
                                waktu_mulai: arg.event.startStr,
                                waktu_berakhir: arg.event.endStr,
                                keterangan: arg.event.title
                            },
                            success: function(data) {
                                $('#msg').removeAttr('hidden');
                                $('#msg').text('Kegiatan berhasil diubah!');
                                setTimeout(() => {
                                    location.reload();
                                }, 1500);
                            },
                            error: function(error) {
                                console.log(error);
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
