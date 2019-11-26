<br><br><br><br>
<!-- breadcrumb -->
<div class="container">
	<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
		<a href="<?= base_url('user') ?>" class="stext-109 cl8 hov-cl1 trans-04">
			Home
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>

		<span class="stext-109 cl4">
			Pesanan
		</span>
	</div>
</div>


<!-- Shoping Cart -->
<div class="bg0 p-t-75 p-b-85">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-xl-12 m-lr-auto m-b-50">
				<div class="m-l-25 m-r--38 m-lr-0-xl">
					<a class="btn btn-small bg1 hov-btn1 mr-2" href="<?= base_url('user/upload_product') ?>"><i class="fas fa-plus"></i> Tambah Produk</a>
					<a class="btn btn-small bg1 hov-btn1" href="<?= base_url('user/order_confirmation') ?>"><i class="fas fa-check-square"></i> Konfirmasi Pesanan</a>
					 <br> <br>
					<div class="wrap-table-shopping-cart">
						<table class="table-shopping-cart ">
							<tr class="table_head">
								<th class="my-column">No</th>
								<th class="my-column">Gambar</th>
								<th class="my-column" >Produk</th>
								<th class="my-column" width="150px" >Harga</th>
								<th class="my-column"> Deskripsi</th>
								<th class="my-column">Action</th>
							</tr>
							<?php $i = 1 ?>
              <?php foreach ($product as $pr): ?>
							<tr class="table_row">
								<td class="my-column"><?= $i ?></td>
								<td class="my-column">
									<div class="how-itemcart1">
										<img src="<?= base_url('images/products/'.$pr->image); ?>" alt="IMG">
									</div>
								</td>
								<td class="my-column"><?= $pr->name ?></td>
								<td class="my-column"><?= "Rp ". number_format($pr->price,2,",",".") ?></td>
								<td class="my-column"><?= $pr->details ?></td>
								<td class="my-column" align="left">
											<a href="<?= base_url('user/edit_product/'.$pr->id) ?>" class="btn btn-small bg1 hov-btn1"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?= base_url('user/delete_product/'.$pr->id) ?>')" href="#" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
										</td>
							</tr>
							<?php $i++; ?>
              <?php endforeach; ?>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Logout Delete Confirmation-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Data yang dihapus tidak bisa dikembalikan.</div>
      <div class="modal-footer">
        <button onclick="cancelButton()" class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
        <a id="btn-delete" class="btn btn-danger" href="#">Hapus</a>
      </div>
    </div>
  </div>
</div>

<script>
function deleteConfirm(url){
	document.getElementById("wrap-menu-desktop").style.position = "static";
$('#btn-delete').attr('href', url);
$('#deleteModal').modal();
}
function cancelButton() {
	document.getElementById("wrap-menu-desktop").style.position = "fixed";
}
</script>
