<!doctype html>
<html lang="en">

  <?php $this->load->view('partial/header');?>

  <body>

    <?php $this->load->view('partial/navbar');?>
    
    <div class="container-fluid">
        <div class="row mb-5">
            <div class="col-12">
                <h5 class="title mt-5">List Regulasi</h5>
                <p class="subtitle mb-2 text-muted">Total <?= number_format(count($data))?> record(s)</p>
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
																<td><a href="<?= base_url();?>home/detail/<?=$d->id;?>" class="btn btn-primary">Detail</a></td>
                            </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <?php $this->load->view('partial/footer');?>
    
  </body>
</html>
