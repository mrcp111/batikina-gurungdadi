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
								<th class="my-column" width="150px" >Jumlah</th>
								<th class="my-column" >Harga</th>
								<th class="my-column">Action</th>
							</tr>

							<?php $i=1 ?>
							<?php foreach ($trx as $tr): ?>
							<tr class="table_row">
								<td class="my-column"><?= $i ?></td>
								<td class="my-column">
									<div class="how-itemcart1">
										<img src="<?= base_url('images/products/'.$tr->image) ?>" alt="IMG">
									</div>
								</td>
								<td class="my-column"><?= $tr->product_name ?></td>
								<td class="my-column"><?= $tr->amount ?></td>
								<td class="my-column"><?= "Rp ". number_format($tr->price,2,",",".") ?></td>
								<td class="my-column" align="left">
											<a href="<?= base_url('user/order_details/'.$tr->td_id) ?>" class="btn btn-small bg1 hov-btn1"><i class="fas fa-info-circle"></i> Lihat Detail</a>
										</td>
							</tr>
							<?php $i++ ?>
						<?php endforeach; ?>

						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
