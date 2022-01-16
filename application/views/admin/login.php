<!doctype html>
<html lang="en">

  <?php $this->load->view('partial/header');?>

  <body>

    <?php $this->load->view('partial/navbar');?>
    
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 mt-5">
                <?php $this->load->view('partial/alert');?>
                <div class="card">
                    <div class="card-body">
                        <form action="<?= base_url();?>admin/validate" method="post">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('partial/footer');?>
    
  </body>
</html>
