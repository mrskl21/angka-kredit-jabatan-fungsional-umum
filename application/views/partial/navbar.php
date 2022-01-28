<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <a class="navbar-brand mr-4 text-white" href="#"><b>Jabatan Fungsional Umum</b></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <?php if($this->session->userdata('logged_in')):?>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto ">
				<li class="nav-item <?= (isset($title) && $title == "Dashboard")? "active":"";?>">
					<a class="nav-link text-white" href="<?=base_url();?>admin">Dashboard</a>
				</li>
				<!-- <li class="nav-item <?= (isset($title) && $title == "Data")? "active":"";?>">
					<a class="nav-link" href="<?=base_url();?>admin/data">Data</a>
				</li> -->
			</ul>
		</div>
		<h5 class="mt-2 mr-3 text-white"><?= $this->session->userdata('logged_in')['fullname']?></h5>
		<a class="btn btn-danger my-2 my-sm-0" href="<?= base_url();?>admin/logout">Sign Out</a>
    <?php else:?>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item <?= (isset($title) && $title == "Home")? "active":"";?>">
					<a class="nav-link text-white" href="<?=base_url();?>">Beranda</a>
				</li>
				<li class="nav-item <?= (isset($title) && $title == "About")? "active":"";?>">
					<a class="nav-link text-white" href="<?=base_url();?>about">Tentang</a>
				</li>
			</ul>
		</div>
		<a class="btn btn-success my-2 my-sm-0" href="<?= base_url();?>admin/login">Sign In</a>

    <?php endif;?>
</nav>
