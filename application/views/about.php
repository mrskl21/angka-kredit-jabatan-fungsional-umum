<!doctype html>
<html lang="en">

  <?php $this->load->view('partial/header');?>

  <body>

    <?php $this->load->view('partial/navbar');?>
    
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 mt-5">
                <h5 class="title mt-5">Tentang</h5>
								<p class="subtitle mt-4 text-muted text-justify">
									Aplikasi ini bertujuan untuk memberikan informasi angka kredit untuk ASN dengan Jabatan Fungsional Tertentu (JFT).
									Mempermudah dalam hal pencarian berdasarkan tabel yang dapat diurutkan dan pencarian dalam kolom tertentu.
									Jika terdapat kesalahan pada data, mohon diinformasikan lewat kontak dibawah. Tujuan aplikasi hanya untuk penyalur informasi semata.
									Mohon maaf bila ada JFT yang belum diisi di aplikasi ini, developer sangat mengharapkan untuk saran apa saja yang dapat disertakan dalam aplikasi.
									<br><br>
									Mohon follow akun sosial media saya agar saya lebih semangat dalam pengembangan project <i>open source</i> lainnya.
								</p>

								<div class="mt-5">
									<a class="btn btn-danger" href="https://lasahido.id/" target="_blank">
										<i class="fas fa-globe"></i> lasahido.id
									</a>
									<a class="btn btn-twitter" href="https://twitter.com/bayu_skl" target="_blank">
										<i class="fab fa-twitter"></i> bayu_skl
									</a>
									<a class="btn btn-instagram" href="https://www.instagram.com/lasahido.id/" target="_blank">
										<i class="fab fa-instagram"></i> lasahido.id
									</a>
									<a class="btn btn-github" href="https://github.com/mrskl21/" target="_blank">
										<i class="fab fa-github"></i> mrskl21
									</a>
									<a class="btn btn-github" href="https://github.com/mrskl21/angka-kredit-jabatan-fungsional-umum" target="_blank">
										<i class="fab fa-github"></i> Project Repository
									</a>
								</div>

            </div>
        </div>
    </div>
    
    <?php $this->load->view('partial/footer');?>
    
  </body>
</html>
