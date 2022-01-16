<!doctype html>
<html lang="en">

  <?php $this->load->view('partial/header');?>

  <body>

    <?php $this->load->view('partial/navbar');?>
    
    <div class="container-fluid">
        <div class="row mb-5">
            <div class="col-12">
                <h5 class="title mt-5">Detail Regulasi</h5>
				<div class="float-right">

					<button href="" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Ubah Data</button>
					<button href="" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">Ubah File</button>
					<button href="" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Hapus Regulasi</button>
				</div>
                <p class="subtitle mb-2 text-muted">Metadata</p>
				<?php $this->load->view('partial/alert');?>

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
				<div class="float-right">
					<button href="" class="btn btn-warning" data-toggle="modal" data-target="#uploadElement">Upload File</button>
					<button href="" class="btn btn-danger" data-toggle="modal" data-target="#clearElement">Hapus Elemen</button>
				</div>
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

    <!-- Modal -->
    <div class="modal fade" id="uploadElement" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Upload Data Elemen</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="<?= base_url();?>admin/upload_element" enctype="multipart/form-data" class="form" method="POST">
              <div class="modal-body">
                
                <div class="form-group">
                    <label for="file">File</label>
                    <input id="regulation_id" class="form-control" type="text" name="regulation_id" value="<?=$data->id;?>" hidden>
                    <input id="file" class="form-control" type="file" name="file">
                    <small class="text-danger">format yang digunakan hanya .csv</small>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Save changes</button>
              </div>
          </form>
        </div>
      </div>
    </div>
    
    <?php $this->load->view('partial/footer');?>
    
  </body>
</html>
