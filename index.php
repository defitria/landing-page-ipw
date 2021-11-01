<?php
include 'header-home.php';
include 'koneksi.php';
?>

<!-- HOME SECTION -->
<section id="home">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<hr>
				<h3><span class="bold">Official Website</h3>
				<h1 class="heading">BIDANG IPW BAPPEDA SUMSEL</h1>
			</div>
		</div>
	</div>
</section>

<!-- ABOUT SECTION -->
<section id="about" style="color: #14213d;">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 text-center">
				<h1 class="heading bold">TENTANG KAMI</h1> <br>
				<p>
					Bappeda adalah kependekan dari Badan Perencanaan Pembangunan Daerah yang memiliki tugas pokok
					Melaksanakan Penyusunan dan Pelaksanaan Kebijakan Daerah di Bidang Perencanaan dan Penelitian
					Pembangunan Daerah Serta Penyiapan Bahan Perumusan Kebijakan Umum Pemerintahan Daerah di Bidang
					Perencanaan Pembangunan Daerah.
				</p> <br>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.6s">
				<i class="fas fa-bars"></i>
				<h3>VISI</h3>
				<p>
					Terwujudnya lembaga perencana yang andal, Akuntabel dan Partisipatif dalam mendukung Percepatan
					Pembangunan Daaerah secara merata dan Berkelanjutan

				</p>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.9s">
				<i class="fas fa-list-ol"></i>
				<h3>MISI</h3>
				<p>
					Mengembangkan sistem dan mekanisme perencanaan berbasis data, informasi, pengetahuan, dan tat
					ruang wilayah dalam penyusunan rencana pembangunan. <br> <br>
					Memantapkan koordinasi, kerjasama, kemitraan dan keterlibatan para pemangku kepentingan dalam
					forum musyawarah perencanaan pembangunan daerah. <br> <br>
					Mengoptimalkan perecanaan dan penganggaran berbasis kinerja dalam percepatan peningkatan
					kesejahteraan rakyat dan kemajuan daerah. <br> <br>
					Mengembangkan rencana percepatan pembangun daerah secara terpadu, komprehensif dan
					berkelanjutan.

				</p>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="1s">
				<i class="far fa-building"></i>
				<h3>Bidang IPW</h3>
				<p>Bidang Infrastruktur dan Pengembangan Wilayah merupakan salah satu bidang yang melaksanakan tugas
					pokok membuat rumusan kebijakan teknis perencanaan bidang infrastruktur dan pengembangan
					wilayah, pelaksanaan manajemen strategis bidang perencanaan teknis urusan pekerjaan umum dan
					penataan ruang, pertanahan, perumahan dan permukiman, perhubungan, komunikasi dan informatika,
					statistik, persandian, dan kecamatan
				</p>
				<a href="bid-ipw.php" class="smoothScroll btn btn-danger">Selanjutnya Bid. IPW</a>
			</div>
			<hr>
		</div>
	</div>
	</div>
</section>

<!-- AGENDA SECTION -->
<section id="team">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<h1 class=" heading bold" style="text-align: center;">AGENDA</h1>
			</div>
		</div> <br>
		<div class="col-md-12 col-sm-12 wow fadeInUp" data-wow-delay="0.6s">
			<!-- CAROUSEL -->
			<div id="myCarousel" class="carousel slide" data-ride="carousel" style="width: 550px; margin-left:270px;">
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
				</ol>
				<!-- deklarasi carousel -->
				<div class="carousel-inner" role="listbox">
					<div class="item active">
						<img src="images/IMG_20210412_091338.jpg" style="width: 550px;">
						<div class="carousel-caption">
							<!-- <h3>lorem ipsum</h3>
							<p>lorem ipsum.</p> -->
						</div>
					</div>
					<div class="item">
						<img src="images/IMG_20210405_093525.jpg" style="width: 550px;">
						<div class="carousel-caption">
							<!-- <h3>lorem ipsum</h3>
							<p>lorem ipsum</p> -->
						</div>
					</div>
					<div class="item">
						<img src="images/IMG_20210421_101749.jpg" style="width: 550px;">
						<div class="carousel-caption">
							<!-- <h3>lorem ipsum</h3>
							<p>lorem ipsum</p> -->
						</div>
					</div>
				</div>
				<!-- Button of Carousel -->
				<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
			<!-- END OF CAROUSEL -->
		</div>
		<div class="col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.6s" style="margin-top: 30px;">
			<?php
			error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
			$i = 1;
			$sql = mysqli_query($koneksi, "SELECT * FROM berita WHERE terbit='Y' ORDER BY id ASC LIMIT 2");
			while ($r = mysqli_fetch_array($sql)) {
				extract($r);

			?>
				<table class="table" style="border: 1px solid #bdbcb9;">
					<tr>
						<td scope="col">
							<img src="images/<?php echo $gambar; ?>" class="card-img-top" width="540px"> <br> <br>
							<h4 class="bold"><?php echo $judul ?></h4>
						</td>
					</tr>
					<tr>
						<td scope="col">
							<i class="far fa-calendar-alt"></i> &nbsp;<?= date('d F Y', strtotime($tanggal)) ?>
							&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
							<a href="view-berita-ipw.php?id=<?= $id ?>" class="btn btn-primary btn-sm">Lihat</a>
						</td>
					</tr>
				</table>
			<?php } ?>
			<a href="berita-ipw.php" class="btn btn-danger"> Lihat Lebih &nbsp; <i class="fas fa-arrow-right"></i> </a>
		</div>
		<div class="col-md-6 col-sm-6 wow fadeInUp">
			<p class="bold" style="font-size: 22px; margin-top:30px;">JAM</p>
			<div class="jam-digital">
				<div class="kotak">
					<p id="jam"></p>
				</div>
				<div class="kotak">
					<p id="menit"></p>
				</div>
				<div class="kotak">
					<p id="detik"></p>
				</div>
			</div> <br> <br>
			<div id="calendar"></div>
		</div>
	</div>
</section>

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
						url: '<?php echo 'view-detail-agenda.php?id=' . $d['id'] . ' '; ?>'

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

<script>
	window.setTimeout("waktu()", 1000);

	function waktu() {
		var waktu = new Date();
		setTimeout("waktu()", 1000);
		document.getElementById("jam").innerHTML = waktu.getHours();
		document.getElementById("menit").innerHTML = waktu.getMinutes();
		document.getElementById("detik").innerHTML = waktu.getSeconds();
	}
</script>

<?php
include 'footer.php';
?>