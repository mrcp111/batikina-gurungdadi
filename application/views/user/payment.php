<br><br><br><br>
<!-- breadcrumb -->
<div class="container">
	<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
		<a href="<?= base_url('user') ?>" class="stext-109 cl8 hov-cl1 trans-04">
			Home
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>

		<span class="stext-109 cl4">
			Pembayaran
		</span>
	</div>
</div>

<!-- Shoping Cart -->
<div class="bg0 p-t-75 p-b-85">
	<div class="container">
		<div class="row">
			<div class="col-lg-11 col-xl-11 m-lr-auto m-b-50">
				<div class="m-l-25 m-r--38 m-lr-0-xl">
					<a class="btn btn-small bg1 hov-btn1 mr-2" onclick="process()" id="tab-process" href="#proses" >Sedang Dalam Proses</a>
					<a class="btn btn-small bg1 hov-btn1 mr-2" onclick="history()" id="tab-history" href="#history">History</a>
					<br><br>

					<div class="wrap-table-shopping-cart" id="process">
						<table class="table-shopping-cart">
							<tr class="table_head">
								<th class="my-column">No</th>
								<!-- <th class="my-column">Produk</th> -->
								<th class="my-column">Total Harga</th>
								<th class="my-column">Tanggal Transaksi</th>
								<th class="my-column">Batas Transaksi</th>
								<th class="my-column">Action</th>
							</tr>
							<?php $i=1;?>
							<?php foreach ($trx as $tr):?>
							<tr class="table_row">
								<td class="my-column"><?= $i ?></td>
								<!-- <td class="my-column"><?= $product_total ?></td>  -->
								<td class="my-column"><?= "Rp ". number_format($tr->total,2,",",".") ?></td>
								<td class="my-column"><?= date('d M Y', $tr->date_created) ?></td>
								<td class="my-column"><?= date('d M Y', $tr->date_created + 60*60*24) ?></td>
								<td class="my-column"><a href="#">
									<a href="<?= base_url('user/payment_details/'.$tr->id) ?>" class="btn btn-small bg1 hov-btn1"><i class="fas fa-info-circle"> </i> Lihat Detail</a>
							</a></td>
							</tr>
							<?php $i++; ?>
						<?php endforeach; ?>
						</table>
					</div>

					<div class="wrap-table-shopping-cart" id="history" style="display: none">
						<table class="table-shopping-cart">
							<tr class="table_head">
								<th class="my-column">No</th>
								<!-- <th class="my-column">Produk</th> -->
								<th class="my-column">Total Harga</th>
								<th class="my-column">Tanggal Transaksi</th>
								<th class="my-column">Status</th>
								<th class="my-column">Action</th>
							</tr>
							<?php $i=1;?>
							<?php foreach ($trx_0 as $tr):?>
							<tr class="table_row">
								<td class="my-column"><?= $i ?></td>
								<!-- <td class="my-column"><?= $product_total ?></td>  -->
								<td class="my-column"><?= "Rp ". number_format($tr->total,2,",",".") ?></td>
								<td class="my-column"><?= date('d M Y', $tr->date_created) ?></td>
								<td class="my-column">Transaksi Selesai</td>
								<td class="my-column"><a href="#">
									<a href="<?= base_url('user/payment_details/'.$tr->id) ?>" class="btn btn-small bg1 hov-btn1"><i class="fas fa-info-circle"> </i> Lihat Detail</a>
							</a></td>
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

<script type="text/javascript">
function process() {
	document.getElementById("process").style.display = "block";
	document.getElementById("history").style.display = "none";
};
function history() {
	document.getElementById("history").style.display = "block";
	document.getElementById("process").style.display = "none";
};
document.getElementById("process").click();
</script>
