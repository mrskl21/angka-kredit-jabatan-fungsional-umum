<!doctype html>
<html lang="en">

  <?php $this->load->view('partial/header');?>

  <body>

    <?php $this->load->view('partial/navbar');?>
    
    <div class="container-fluid">
        <div class="row mb-5">
            <div class="col-12">
                <h5 class="title mt-5">Detail Regulasi</h5>
                <p class="subtitle mb-2 text-muted">Metadata</p>
				<div class="mt-5">
					<table class="table">
						<tbody>
							<tr>
								<td>Nomor</td>
								<td><?=$data->number;?></td>
							</tr>
							<tr>
								<td>Tahun</td>
								<td><?=$data->year;?></td>
							</tr>
							<tr>
								<td>Judul</td>
								<td><?=$data->title;?></td>
							</tr>
							<tr>
								<td>Kategori</td>
								<td><?=$data->category;?></td>
							</tr>
							<tr>
								<td>Entitas</td>
								<td><?=$data->entity;?></td>
							</tr>
							<tr>
								<td>Tanggal Rilis</td>
								<td><?=$data->publish_date;?></td>
							</tr>
							<tr>
								<td>Tanggal Input</td>
								<td><?=$data->created_date;?></td>
							</tr>
							<tr>
								<td>Dokumen</td>
								<td>
									<?php if($data->file == "" || $data->file == null):?>
										<i>Dokumen tidak tersedia</i>
									<?php else:?>
										<a href="<?=base_url();?>assets/uploads/files/<?=$data->file;?>" target="_blank"><?=$data->file;?></a>
									<?php endif;?>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
						
				<h5 class="title mt-5">Tabel Elemen</h5>
                <p class="subtitle mb-2 text-muted">Elemen Angka Kredit</p>
                <div class="table-responsive mt-5">
                    <table class="table table-sm text-nowrap" id="elementTable">
                        <thead>
                            <tr>
                                <th>Unsur</th>
                                <th>Sub-unsur</th>
                                <th>Uraian Kegiatan/Tugas</th>
                                <th>Hasil Kerja/Output</th>
                                <th>Angka Kredit</th>
								<th>Pelaksana Kegiatan</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no=1;foreach ($element as $e):?>
                            <tr>
                                <td><?=$e->unsur;?></td>
                                <td><?=$e->sub_unsur;?></td>
                                <td><?=$e->uraian;?></td>
                                <td><?=$e->output;?></td>
                                <td><?=$e->kredit;?></td>
                                <td><?=$e->pelaksana;?></td>
                            </tr>
						<?php endforeach;?>
						</tbody>
						<tfoot>
                            <tr>
                                <th>Unsur</th>
                                <th>Sub-unsur</th>
                                <th>Uraian Kegiatan/Tugas</th>
                                <th>Hasil Kerja/Output</th>
                                <th>Angka Kredit</th>
								<th>Pelaksana Kegiatan</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <?php $this->load->view('partial/footer');?>
    
  </body>
</html>
