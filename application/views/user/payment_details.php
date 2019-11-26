<br><br><br><br>
<!-- breadcrumb -->
<div class="container">
	<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
		<a href="<?= base_url('user') ?>" class="stext-109 cl8 hov-cl1 trans-04">
			Home
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>

		<span class="stext-109 cl4">
			Detail Transaksi
		</span>
	</div>
</div>

<!-- Shoping Cart -->
<div class="bg0 p-t-75 p-b-85">
	<div class="container">

		<?php $i=1 ?>
		<?php foreach ($trx_details as $td): ?>
		<div class="row">
			<div class="col-sm-11 col-lg-11 col-xl-11 m-lr-auto m-b-50">
				<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
					<div class="flex-w flex-t bor12 p-t-15 p-b-13">
						<div class="size-208">
							<span class="stext-110 cl2">
								<h4 class="mtext-109 cl2 p-b-30">
									Barang <?= $i ?>
								</h4>
							</span>
						</div>
					</div>
					<div class="flex-w flex-t bor12 p-t-15 p-b-13">
						<div class="size-208">
							<span class="stext-110 cl2">
								Nama
							</span>
						</div>

						<div class="size-209">
							<span class="mtext-110 cl2">
								<?= $td->product_name ?>
							</span>
						</div>
					</div>

					<div class="flex-w flex-t bor12 p-t-15 p-b-13">
						<div class="size-208">
							<span class="stext-110 cl2">
								Gambar
							</span>
						</div>

						<div class="size-209">
							<span class="mtext-110 cl2">
								<img src="<?= base_url('images/products/'.$td->image) ?>" alt="" height="250px">
							</span>
						</div>
					</div>
					<div class="flex-w flex-t bor12 p-t-15 p-b-13">
						<div class="size-208">
							<span class="stext-110 cl2">
								Jumlah
							</span>
						</div>

						<div class="size-209">
							<span class="mtext-110 cl2">
								<?= $td->amount ?>
							</span>
						</div>
					</div>
					<div class="flex-w flex-t bor12 p-t-15 p-b-13">
						<div class="size-208">
							<span class="stext-110 cl2">
								Harga Satuan
							</span>
						</div>

						<div class="size-209">
							<span class="mtext-110 cl2">
								<?= "Rp ". number_format($td->price,2,",",".") ?>
							</span>
						</div>
					</div>
					<?php if ($td->td_status == 1) {
						$status = "Belum dibayar";
					} elseif ($td->td_status == 2) {
						$status = "Menunggu konfirmasi";
					} elseif ($td->td_status == 3) {
						$status = "Penjual Sudah Menerima Pesanan";
					} elseif ($td->td_status == 4) {
						$status = "Barang Sedang Dikirim";
					} elseif ($td->td_status == 0) {
						$status = "Transaksi Selesai";
					}?>
					<div class="flex-w flex-t bor12 p-t-15 p-b-13">
						<div class="size-208">
							<span class="stext-110 cl2">
								Status
							</span>
						</div>

						<div class="size-209">
							<span class="mtext-110 cl2">
								<?= $status ?>
							</span>
						</div>

					</div>
				</div>
			</div>
		</div>
		<?php $i++ ?>
	<?php endforeach; ?>

		<div class="row">
				<div class="col-sm-10 col-lg-10 col-xl-10 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Pembayaran
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Total Harga Barang
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
									<?= "Rp ". number_format($trx['total']-$trx['cost'],2,",",".") ?>
								</span>
							</div>
						</div>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Biaya Pengiriman
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
									<?= "Rp ". number_format($trx['cost'],2,",",".") ?>
								</span>
							</div>
						</div>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Total Pembayaran
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
									<u> <?= "Rp ". number_format($trx['total'],2,",",".") ?> </u>
								</span>
							</div>
						</div>

						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									A/n
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<span class="stext-110 cl2">
									BatikIna
								</span>
							</div>
						</div>
						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Nomer Rekening
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<span class="stext-110 cl2">
									03627183479398 BRI
								</span>
							</div>
						</div>
						<div class=" bor12 p-t-15 p-b-30">
							<p>*Kirim Persis Sesuai Angka Total Pembayaran Di Atas.</p>
							<?php $payment_limit = $trx['date_created'] + 60*60*24 ?>
							<p>*Lakukan Pembayaran Sebelum Tanggal <?= date('d M Y', $payment_limit) ?> Jam <?= date('H:i:s', $payment_limit) ?>  (Terhitung 1 Hari Setelah Pembuatan Checkout).</p>
							<p>*Jika Melebihi Batas Pembayaran Transaksi Akan Dibatalkan.</p>
						</div>
						<?php if ($trx['status'] == 1) { ?>
							<a href="<?= base_url('user/payment_status/'.$trx['trx_id']) ?>"class="flex-c-m stext-101 cl0 size-116 bg1 bor14 hov-btn1 p-lr-15 trans-04 pointer">
								Saya Sudah Bayar
							</a>
						<?php } elseif ($trx['status'] == 4) { ?>
							<a href="<?= base_url('user/buyer_payment_received/'.$trx['trx_id']) ?>"class="flex-c-m stext-101 cl0 size-116 bg1 bor14 hov-btn1 p-lr-15 trans-04 pointer">
								Barang Sudah Sampai Semua
							</a>
						<?php } ?>

						 <br>
						<a href="<?= base_url('user/payment') ?>"class="flex-c-m stext-101 cl0 size-116 bg1 bor14 hov-btn1 p-lr-15 trans-04 pointer">
							Kembali
						</a>
					</div>
				</div>
			</div>
	</div>
</div>
