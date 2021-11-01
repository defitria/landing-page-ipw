<?php
include '../koneksi.php';
include 'header-admin.php';
?>

<!-- fullcalendar css  -->
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.css' rel='stylesheet' />
</head>

<body>
    <div class="container mt-4" style="margin-top: 150px;">
        <div class="row">
            <div class="col-lg-4">
                <div class="alert alert-info" role="alert">
                    <h4>Form Agenda</h4>
                </div>
                <div class="card">
                    <form action="proses.php" method="POST">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="form-label">Judul Agenda</div>
                                <textarea name="kegiatan" class="form-control" id="kegiatan" cols="30" rows="2"></textarea>
                            </div>
                            <div class="form-group mt-4">
                                <div class="form-label">Tgl Mulai</div>
                                <input type="datetime-local" class="form-control" name="mulai" id="mulai">
                            </div>
                            <div class="form-group mt-4">
                                <div class="form-label">Tgl Selesai</div>
                                <input type="datetime-local" class="form-control" name="selesai" id="selesai">
                            </div>
                            <div class="form-group mt-4">
                                <div class="form-label">Detail Agenda</div>
                                <textarea name="nama" class="form-control" id="nama" cols="30" rows="2"></textarea>
                            </div>
                            <div class="form-group mt-4">
                                <div class="form-label">Tempat</div>
                                <textarea name="tempat" class="form-control" id="tempat" cols="30" rows="2"></textarea>
                            </div>
                            <div class="form-group mt-4">
                                <div class="form-label">Dihadiri Oleh</div>
                                <input type="text" class="form-control" name="peserta" id="peserta">
                            </div>
                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-8">
                <div id="calendar"></div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                dayMaxEvents: 1,
                events: [
                    <?php
                    //mengambil data dari tabel jadwal
                    $data       = mysqli_query($koneksi, 'SELECT * FROM agenda');
                    //melakukan looping
                    while ($d = mysqli_fetch_array($data)) {
                    ?> {
                            title: '<?php echo $d['kegiatan']; ?>', //menampilkan tgl mulai dari tabel
                            start: '<?php echo $d['mulai']; ?>', //menampilkan tgl mulai dari tabel
                            end: '<?php echo $d['selesai']; ?>', //menampilkan tgl selesai dari tabel
                            url: '<?php echo 'admin-view-detail-agenda.php?id=' . $d['id'] . ' '; ?>'
                        },
                    <?php } ?>
                ],
                selectOverlap: function(event) {
                    return event.rendering === 'background';
                }
            });

            calendar.render();
        });
    </script>