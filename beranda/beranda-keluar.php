<?php 
	include'../connection/connect.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>INVENTARIS</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../fonts/font.css">

</head>
	
	<style>
		.navbar-default{
			background-image: linear-gradient(to right, #003e52, #0d6d85, #1a9cb7);
			border-radius: 0;
		}
		.navbar-nav{
			float: right;
		}
		.navbar-nav li a{
			color: white !important;
		}

		.navbar-nav li a:hover{
			color: orange !important;
		}

		.content-beranda h1{
			font-weight: bold;
			color: white;
		}
		.content-beranda b{
			color: orange;
		}
		.text-beranda h2{
			color: white;
		}
		.text-beranda h3{
			color: white;
		}
		.biodata-text{
			margin-left: 80px
		}
		.pu-satu{
			min-height: 80px;
			border: 1px solid white;
		}

		.header-content-tk h1{
			font-weight: bold;
			color: white;
		}

		.header-hk h1{
			font-weight: bold;
			color: white;
		}

		.tata-cara{
			min-height: 140px; 
			margin-bottom: 5px;
		}

		.prob-sol h3{
			color: white;
		}

		.snk-con{
			margin-bottom: 10px;
		}

		.button:focus {
  outline: none;
}

/*PROFILE*/
	.profile-beranda h1{
		color: white;
		font-size: 50px;
		line-height: 35px;
		font-family: "domine-bold", sans-serif !important;
	}
	.profile-beranda h3{
		color: white;
		font-size: 35px;
		margin-top: 15px;
		font-family: "metropolis-light", sans-serif;
	}
	.profile-beranda{
		margin-top: 200px;
	}
/*TUTP PROFILE*/
.home-sidelinks {
  list-style: none;
  font-family: "metropolis-regular", sans-serif;
  font-size: 1.4rem;
  line-height: 1.714;
  text-transform: uppercase;
  letter-spacing: 0.3rem;
  margin: 0;
  -webkit-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
  position: absolute;
  top: 50%;
  right: 0;
}
.home-sidelinks li {
  display: block;
  padding: 0;
  text-align: left;
  background-color: rgba(0, 0, 0, 0.2);
  border-top: 1px solid rgba(255, 255, 255, 0.05);
  -webkit-transition: all 0.5s ease-in-out;
  transition: all 0.5s ease-in-out;
  position: relative;
}
.home-sidelinks li:last-child {
  border-bottom: 1px solid rgba(255, 255, 255, 0.05);
}
.home-sidelinks li::before {
  content: "";
  display: block;
  height: 6px;
  width: 6px;
  background-color: orange;
  border-radius: 50%;
  position: absolute;
  top: 3rem;
  left: 2rem;
}
.home-sidelinks a {
  display: block;
  padding: 2.1rem 15rem 2.1rem 4rem;
  color: #ffffff;
}
.home-sidelinks span {
  display: block;
  font-family: "metropolis-regular", sans-serif;
  font-size: 1.5rem;
  line-height: 1.6rem;
  color: rgba(255, 255, 255, 0.5);
  text-transform: none;
  letter-spacing: 0;
}
.home-sidelinks li:hover {
  background-color: rgba(0, 0, 0, 0.5);
  border-top: 1px solid rgba(0, 0, 0, 0.1);
}

/*BUTTON*/
.button {
  text-transform: uppercase;
  float: left;
  min-width: 200px;
  max-width: 250px;
  display: block;
  padding: 1em 2em;
  background: none;
  vertical-align: middle;
  position: relative;
  z-index: 1;
  letter-spacing: 2px;
  color: #fff;
  font-weight: bold;
  font-size: 16px;
  border: 4px solid;
  cursor: pointer;
  margin-top: 40px;
  margin-left: 430px;
}

.button::after {
  content: "";
  background-color: transparent;
  position: absolute;
  top: -20px;
  left: -20px;
  right: -20px;
  bottom: -20px;
  opacity: 0;
  color: #3f51b5;
  z-index: -1;
}

.button:hover::after {
  opacity: 1;
  background-color: orange;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
}

.button,
.button:after {
  -webkit-transition: all 0.5s ease-out;
  -moz-transition: all 0.5s ease-out;
  -o-transition: all 0.5s ease-out;
  transition: all 0.5s ease-out;
}

.button:hover {
  border: 4px solid orange;
}

.button a{
	text-decoration: none;
}

/*TUTUP BUTTON*/
.carousel{

    margin-top: 20px;
}
.carousel .item{
    min-height: 280px; /* Prevent carousel from being distorted if for some reason image doesn't load */
}
.carousel .item img{
    margin: 0 auto; /* Align slide image horizontally center */
}
.bs-example{
	margin: 20px;
}

	</style>

<body>
	<div class="navbar navbar-default navbar-fixed-top">
		<div class="navbar-header">
	      <a class="navbar-brand" href="#"><h4 style="width: 150px; margin-top: 5px; color: white">INVENTARIS</h4></a>
	    </div>
	    <ul class="nav navbar-nav">
	      <li><a href="#">Beranda</a></li>
	      <li><a href="#">Kontak Kami</a></li>
	      <li><a href="../user/login.php">Masuk</a></li>
	    </ul>
	</div>
	<!-- TUTUP HEADER -->

	<!-- CONTENT -->

	<div class="content-beranda">
		<div class="col-sm-12" style="background-color: #003e52; height: 645px; margin-top: 50px;">
			
			<div class="col-sm-9 col-sm-offset-1">
				<!-- Profile -->
				<div class="profile-beranda">

					<h1>selamat datang di INVENTARIS</h1>
					<div class="col-sm-2" style="border-top: 1px orange solid; width: 5%; margin-top: 35px;"></div>	
					<div class="col-sm-8"><h3>Aplikasi peminjaman barang sarana dan prasarana</h3></div>
				</div>
				<!-- TUTUP PROFILE -->
				<a href="../jenis/tampil_jenis.php" style="margin-top: 250px; position: absolute;" class="button">Mulai pinjam</a>
			</div>

			<ul class="home-sidelinks">
				<!-- Trigger the modal with a button -->
	            <li><a href="../user/login.php">Masuk <span></span></a></li>
	           
	            <li><a href="#" data-toggle="modal" data-target="#modal-snk">SnK<span>Syarat dan <br>ketentuan berlaku</span></a></li>
	        </ul> 

		</div>

	</div>

	<!-- TUTUP CONTENT 1 -->

	<!-- CONTENT 2 TENTANG KAMI -->

	
			<!-- MODAL SNK -->

			<!-- Modal -->
			<div id="modal-snk" class="modal fade" role="dialog">
			  <div class="modal-dialog modal-lg">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h1 style="color: orange;" class="text-center">SYARAT & KETENTUAN INVENTARIS</h1>
			      </div>
			      <div class="modal-body">
			        <div class="col-sm-12 snk-con" style="background-color: orange; border: 1px white solid;">
					<h4>Selamat datang di INVENTARIS atau aplikasi peminjaman sarana dan prasarana sekolah, silahkan membaca Syarat Penggunaan INVENTARIS secara seksama, Syarat dan Ketentuan ini mengatur Penggunaan dan Akses INVENTARIS, dengan mengakses INVENTARIS dan menggunakan layana INVENTARIS maka anda telas setuju untuk terikat dengan Syarat dan Ketentuan ini.</h4>
					<h4>
						Akses atas password dan penggunaan password dilindungi dan Penggunaan Layanan dibatasi hanya untuk beberapa orang saja yang dapat menggunakan aplikasi INVENTARIS
					</h4>
					<h4>
						A.	Pedoman penggunaan INVENTARIS: Anda setuju untuk mematuhi setiap dan semua pedoman, pemberitahuan, aturan operasi dan kebijakan dan instruksi yang berkaitan dengan penggunaan Layanan dan/atau akses ke Platform, serta setiap perubahan-nya, yang dikeluarkan oleh kami, dari waktu ke waktu. Kami berhak untuk merevisi pedoman, pemberitahuan, aturan operasi, kebijakan dan instruksi sewaktu-waktu dan Anda dianggap mengetahui dan tunduk oleh setiap perubahan tersebut di atas. <br>
					</h4>
					<h4>
						<p>1. Tidak	berpura-pura sebagai orang lain, atau memberikan keterangan palsu, atau mengaku sebagai orang lain atau kelompok tertentu </p>
						<p>2. Tidak berusaha untuk mendapatkan akses tidak sah atau mengganggu atau mengacaukan sistem komputer atau jaringan yang terhubung dengan INVENTARIS</p>
						<p>3. Tidak menggunakan atau unggah atau meng-upload perangkat lunak atau material yang mengandung / dicurigai mengandung virus, komponen merusak, kode berbahaya atau komponen berbahaya dengan cara apapun yang dapat merusak data atau mengakibatkan kerusakan INVENTARIS atau mengganggu pengoperasian komputer Peminjma</p>
						<p>4. Hanya beberapa orang yang boleh menggunkan aplikasi ini diantaranya : Guru, Ketua OSIS, Ketua Kelas, Wakil Ketua Kelas</p>
						<p>5. Maksimal barang yang dipinjam hanya dei perbolehkan sebanyak 4 barang dalam 1 hari</p>
						<p>6. Jika barang hilang, yang bertanggung jawab atas barang tersebut adalah Peminjam yang terakhir kali meminjam barang tersebut jika dinyatakan hilang selama 7 hari maka Peminjam yang terakhir kali meminjam barang tersebut harus mengganti dengan uang tunai 70%(tujuh puluh persen) dari harga barang tersebut.</p>
						<p>7. Jika barang rusak, yang bertanggung jawab atas barang tersebut adalag peminjam yang terakhir kali meminjma barang tersebut, dan harus mengganti dengan uang tunai sebanyan 50%(lima puluh persen) dari harga barang tersebut</p>
					</h4>
				</div>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			    </div>

			  </div>
			</div>

			<!-- TUTUP MODAL SNK -->

		</div>
	</div>

	<!-- TUTUP CONTENT 2 TENTANG KAMI -->

	<!-- CONTENT HUBUNGI KAMI -->

	<div class="hubungi-kami">
		<div class="col-sm-12" style="background-color: #1a9cb7; min-height: 645px;">
			<div class="header-hk">
				<h1 class="text-center">HUBUNGI KAMI</h1>
			</div>

			<style>
				input[type=text], select, textarea {
				  width: 100%;
				  padding: 12px;
				  border: 1px solid #ccc;
				  border-radius: 4px;
				  box-sizing: border-box;
				  margin-top: 6px;
				  margin-bottom: 16px;
				  resize: vertical;
				}

				input[type=submit] {
				  background-color: #4CAF50;
				  color: white;
				  padding: 12px 20px;
				  border: none;
				  border-radius: 4px;
				  cursor: pointer;
				}

				input[type=submit]:hover {
				  background-color: #45a049;
				}

				.container {
				  border-radius: 5px;
				  background-color: #f2f2f2;
				  padding: 20px;
				}
			</style>

			<form action="user-contact.php" method="POST">
			    <label for="mn_lengkap">Nama Lengkap</label>
			    <input type="text" id="fname" name="nm_lengkap">

			     <label for="username">Username</label>
			    <input type="text" id="fname" name="username">

			    <label for="email">Email</label>
			    <input type="text" id="lname" name="email">

			    <label for="subject">Teks</label>
			    <textarea id="subject" name="teks" placeholder="tuliskan sesuatu...." style="height:200px"></textarea>

			    <input type="submit" value="Submit"><br><br>
			  </form>
		</div>
	</div>

	<!-- TUTUP CONTENT HUBUNGI KAMI -->
	<script type="text/javascript" src="../bootstrap/js/jquery-3.3.1"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
<?php 
 	include'../footer/footer.php';
 ?>