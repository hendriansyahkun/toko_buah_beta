<div class="content-wrapper">
	<section class="content">
		<form action="<?php echo base_url().'buah/edit_data'; ?>" method="post">
			<div class="form-group">
				<input type="hidden" name="id" class="form-control" value="<?php echo $buah->id_buah ?>">
				<label>Nama Buah</label>
				<input type="text" name="nama_buah" class="form-control" value="<?php echo $buah->nama_buah ?>">
			</div>

			<div class="form-group">
				<label>Stok</label>
				<input type="text" name="stock" class="form-control" value="<?php echo $buah->stock ?>">
			</div>

			<div class="form-group">
				<label>Harga</label>
				<input type="text" name="harga" class="form-control" value="<?php echo $buah->harga ?>">
			</div>

			<button type="reset" class="btn btn-danger">Reset</button>
			<button type="submit" class="btn btn-primary">Simpan</button>
		</form>
	</section>
</div>