

    

      <!-- Main Content -->
      <div id="content">

        

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?>
            
          </h1>

          <div class="card mb-3" style="max-width: 540px;">
          <div class="row no-gutters">
            <div class="col-md-4">
              <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title"><?= $user['name']; ?></h5>
                <p class="card-text"><?= $user['email']; ?></p>
                <p class="card-text"><small class="text-muted">Berabung Sejak <?= date('d F Y', $user['date_created']); ?></small></p>
              </div>
            </div>
          </div>
        </div>


   <!--  <section class="content">
      <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>&nbsp;Tambah Data Buah</button>
        <br>
        <br>
      <table class="table">
        <tr>
          <th>ID<a/th>
          <th>Nama Buah</th>
          <th>Stock</th>
          <th>Harga</th>
                <th colspan="2">AKSI</th>
        </tr>

        <?php 

          $no = 1;
          foreach ($buah as $bh):

         ?>

        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $bh->nama_buah ?></td>
          <td><?php echo $bh->stock ?></td>
          <td><?php echo $bh->harga ?></td>
                <td onclick="javascript: return confirm('Anda yakin ingin menghapus'); "><?php echo anchor('buah/hapus/'.$bh->id_buah, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>'); ?></td>
                <td><?php echo anchor('buah/edit/'.$bh->id_buah, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>'); ?></td>
        </tr>

      <?php endforeach; ?>
      </table>


      
    </section> -->


<!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>Form Input Data Buah
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url().'buah/tambah_aksi'; ?>">

          <div class="form-group">
            <label>Nama Buah</label>
            <input type="text" name="nama_buah" class="form-control">
          </div>

          <div class="form-group">
            <label>Stok</label>
            <input type="text" name="stock" class="form-control">
          </div>
          
          <div class="form-group">
            <label>Harga</label>
            <input type="text" name="harga" class="form-control">
          </div>

          <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div> -->


<?php 

  $no = 1;
  foreach ($buah as $bh):

 ?>


<div class="card" style="width: 18rem; display: inline-block; ">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title" hidden><?php echo $no++ ?></h5>
    <h4 class="card-title" style="color :black; font-weight: bold; font-family: sans-serif;"><?php echo $bh->nama_buah ?></h4>
    <p class="card-text">Stok : <?php echo $bh->stock ?></p>
    <p class="card-text" style="color: black;">Harga : Rp <?php echo $bh->harga ?></p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>


<?php endforeach; ?>


        </div>
        <!-- /.container-fluid -->

        

      </div>
      <!-- End of Main Content -->

      