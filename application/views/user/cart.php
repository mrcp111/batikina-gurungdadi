<br><br><br><br>
<!-- breadcrumb -->
<div class="container">
	<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
		<a href="<?= base_url('user') ?>" class="stext-109 cl8 hov-cl1 trans-04">
			Home
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>

		<span class="stext-109 cl4">
			Keranjang
		</span>
	</div>
</div>

<!-- Shoping Cart -->
<form class="" action="<?= base_url('user/cart') ?>" method="post">
	<div class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
				<div class="col-lg-11 col-xl-11 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="my-column">No</th>
									<th class="my-column">Gambar</th>
									<th class="my-column">Produk</th>
									<th class="my-column">Harga</th>
									<th class="my-column">Jumlah</th>
									<th class="my-column">Total Harga</th>
									<th class="my-column">Action</th>
								</tr>
								<?php $total = 0 ?>
								<?php $i = 1 ?>
								<?php foreach ($cart as $cr): ?>

								<tr class="table_row">
									<input hidden type="text" name="id[]" value="<?= $cr->id ?>">
									<td class="my-column"><?= $i ?></td>
									<td class="my-column">
										<div class="how-itemcart1">
											<img src="<?= base_url('images/products/'.$cr->image); ?>" alt="IMG">
										</div>
									</td>
									<td class="my-column"><?= $cr->name ?></td>
									<td class="my-column"><?= "Rp ". number_format($cr->price,2,",",".") ?></td>
									<td class="my-column">
										<?= $cr->amount ?>
									</td>
									<td class="my-column"><?= "Rp ". number_format($cr->price*$cr->amount,2,",",".") ?></td>
									<?php $total+=$cr->price*$cr->amount ?>
									<td class="my-column"><a href="#">
											<a href="<?= base_url('user/edit_cart/'.$cr->cart_id) ?>" class="btn btn-small bg1 hov-btn1"><i class="fas fa-edit"></i> Ubah Jumlah</a>
											<a onclick="deleteConfirm('<?= base_url('user/delete_cart/'.$cr->cart_id) ?>')" href="#" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
										</a></td>
								</tr>
								<?php $i++; ?>
								<?php endforeach; ?>
							</table>
						</div>
					</div>
				</div>

			</div>
			<div class="row">
				<div class="col-sm-11 col-lg-11 col-xl-11 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Detail Pembayaran
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Subtotal:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
									<input readonly type="text" name="subtotal" value="<?= "Rp ". number_format($total,2,",",".") ?>">
								</span>
							</div>
						</div>

						<div class="flex-w flex-t bor12 p-t-15 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Biaya Pengiriman:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
									<?php if ($total != 0) {
									$shipping_costs = 20000;
								} else {
									$shipping_costs = 0;
								}?>
									<input type="text" name="cost" value="Rp <?=  number_format($shipping_costs,2,",",".") ?>" readonly>
								</span>
							</div>
						</div>

						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Pengiriman:
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<p class="stext-111 cl6 p-t-2">
									Tidak ada metode pengiriman yang tersedia. Pastikan alamat anda benar.
								</p>

								<div class="p-t-15">
									<span class="stext-112 cl8">
										Detail Pengiriman
									</span>

									<div class="bor8 bg0 m-b-12">
										<textarea class="stext-111 cl8 plh3 size-111 p-lr-15" name="address" rows="20" cols="80" placeholder="Alamat Lengkap" required></textarea>
									</div>

									<div class="bor8 bg0 m-b-22">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="postcode" placeholder="Kode Pos" onkeypress="return numberOnly(event)" required>
									</div>

									<div class="bor8 bg0 m-b-22">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="phone" placeholder="Nomer Hp" onkeypress="return numberOnly(event)" required>
									</div>

									<div class="bor8 bg0 m-b-22">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="receiver" placeholder="Nama Penerima" required>
									</div>

									<!-- <div class="flex-w">
									<div class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer">
										Update Totals
									</div>
								</div> -->

								</div>
							</div>
						</div>

						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2">
									<input type="text" name="total" value="<?= "Rp ". number_format($total+$shipping_costs,2,",",".") ?>" readonly>
								</span>
							</div>
						</div>
						<?php if ($total != 0) { ?>
						<button type="submit" class="flex-c-m stext-101 cl0 size-116 bg1 bor14 hov-btn1 p-lr-15 trans-04 pointer">
							Checkout
						</button>
						<?php } else { ?>
						
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>

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
	function deleteConfirm(url) {
		document.getElementById("wrap-menu-desktop").style.position = "static";
		$('#btn-delete').attr('href', url);
		$('#deleteModal').modal();
	}

	function cancelButton() {
		document.getElementById("wrap-menu-desktop").style.position = "fixed";
	}

	function numberOnly(evt) {
		var charCode = (evt.which) ? evt.which : event.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57))
			return false;
		return true;
	}
</script>
