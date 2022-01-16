<!doctype html>
<html lang="en">

  <?php $this->load->view('partial/header');?>

  <body>

    <?php $this->load->view('partial/navbar');?>
    
    <div class="container-fluid">
        <div class="row mb-5">
            <div class="col-12">
                <h5 class="title mt-5">List Regulasi</h5>
                <button href="" class="btn btn-danger float-right" data-toggle="modal" data-target="#exampleModal">Tambah +</button>
                <p class="subtitle mb-2 text-muted">Total <?= number_format(count($data))?> record(s)</p>
								<?php $this->load->view('partial/alert');?>
								
                <div class="table-responsive mt-5">
                    <table class="table table-sm text-nowrap" id="myTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nomor</th>
                                <th>Tahun</th>
                                <th>Judul</th>
                                <th>Tanggal Edaran</th>
                                <th>Tanggal Input</th>
																<th></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no=1;foreach ($data as $d):?>
                            <tr>
                                <td><?=$no++;?></td>
                                <td><?=$d->number;?></td>
                                <td><?=$d->year;?></td>
                                <td><?=$d->title;?></td>
                                <td><?=date("Y-m-d",strtotime($d->publish_date));?></td>
                                <td><?=date("Y-m-d",strtotime($d->created_date));?></td>
																<td><a href="<?= base_url();?>admin/detail/<?=$d->id;?>" class="btn btn-primary">Detail</a></td>
                            </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Regulasi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="<?= base_url();?>admin/add" enctype="multipart/form-data" class="form" method="POST">
              <div class="modal-body">
                <div class="form-group">
                    <label for="title">Judul</label>
                    <input id="title" class="form-control" type="text" name="title" required>
                </div>
                <div class="form-group">
                    <label for="number">Nomor</label>
                    <input id="number" class="form-control" type="text" name="number" required>
                </div>
                <div class="form-group">
                    <label for="year">Tahun</label>
										<select name="year" id="year" class="form-control">
											<?php for ($i=date("Y"); $i > 2000; $i--):?>
												<option value="<?=$i;?>"><?=$i;?></option>
											<?php endfor;?>
										</select>
                </div>
                <div class="form-group">
                    <label for="category">Kategori</label>
                    <input id="category" class="form-control" type="text" name="category">
                </div>
                <div class="form-group">
                    <label for="entity">Entitas</label>
                    <input id="entity" class="form-control" type="text" name="entity">
                </div>
                <div class="form-group">
                    <label for="description">Keterangan</label>
										<textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="source">Tanggal Rilis</label>
                    <input id="publish_date" class="form-control" type="date" name="publish_date" required>
                </div>
                <div class="form-group">
                    <label for="source">Sumber</label>
                    <input id="source" class="form-control" type="text" name="source" required>
                </div>
                <div class="form-group">
                    <label for="file">File</label>
                    <input id="file" class="form-control" type="file" name="file">
                    <small class="text-danger">opsional | format hanya .pdf</small>
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
