<br><br><br><br>
<!-- breadcrumb -->
<div class="container">
	<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
		<a href="<?= base_url('user') ?>" class="stext-109 cl8 hov-cl1 trans-04">
			Home
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>

		<span class="stext-109 cl4">
			Detail Pemesanan
		</span>
	</div>
</div>

<!-- Shoping Cart -->
<div class="bg0 p-t-75 p-b-85">
	<div class="container">

		<div class="row">
			<div class="col-sm-11 col-lg-11 col-xl-11 m-lr-auto m-b-50">
				<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
					<div class="flex-w flex-t bor12 p-t-15 p-b-13">
						<div class="size-208">
							<span class="stext-110 cl2">
								<h4 class="mtext-109 cl2 p-b-30">
									Pesanan
								</h4>
							</span>
						</div>
					</div>
					<div class="flex-w flex-t bor12 p-t-15 p-b-13">
						<div class="size-208">
							<span class="stext-110 cl2">
								Nama Pembeli
							</span>
						</div>

						<div class="size-209">
							<span class="mtext-110 cl2">
								<?= $order_details['receiver'] ?>
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
								<img src="<?= base_url('images/products/'.$order_details['image']) ?>" alt="" height="250px">
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
								<?= $order_details['amount'] ?>
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
								<?= "Rp ". number_format($order_details['price'],2,",",".") ?>
							</span>
						</div>
					</div>
					<div class="flex-w flex-t bor12 p-t-15 p-b-13">
						<div class="size-208">
							<span class="stext-110 cl2">
								Harga Total
							</span>
						</div>
						<div class="size-209">
							<span class="mtext-110 cl2">
								<?= "Rp ". number_format($order_details['price']*$order_details['amount'],2,",",".") ?>
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
									Detail Pemesanan
								</p>

								<div class="p-t-15">
									<span class="stext-112 cl8">
										Alamat
									</span>

									<div class="bor8 bg0 m-b-12">
										<textarea class="stext-111 cl8 plh3 size-111 p-lr-15" name="address" rows="20" cols="80" placeholder="Alamat Lengkap" readonly><?= $order_details['address'] ?></textarea>
									</div>

									<span class="stext-112 cl8">
										Kode Pos
									</span>
									<div class="bor8 bg0 m-b-22">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="postcode" placeholder="Kode Pos" onkeypress="return numberOnly(event)" required="" readonly value="<?= $order_details['postcode'] ?>">
									</div>

									<span class="stext-112 cl8">
										Nomer Hp
									</span>
									<div class="bor8 bg0 m-b-22">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="phone" placeholder="Nomer Hp" onkeypress="return numberOnly(event)" readonly value="<?= $order_details['phone'] ?>">
									</div>

									<span class="stext-112 cl8">
										Nama Penerima
									</span>
									<div class="bor8 bg0 m-b-22">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="receiver" readonly value="<?= $order_details['receiver'] ?>">
									</div>
								</div>
							</div>
						</div>
					<div class="flex-w flex-t bor12 p-t-15 p-b-13">
						<div class="size-208">
							<span class="stext-110 cl2">
								Status
							</span>
						</div>
						<?php if ($order_details['td_status'] == 1 || $order_details['td_status'] == 2) {
							$status = "Menunggu Pembayaran";
						} elseif ($order_details['td_status'] == 3) {
							$status = "Pembeli Sudah Melakukan Pembayaran, silahkan melakukan pengiriman barang";
						} elseif ($order_details['td_status'] == 4) {
							$status = "Barang Sudah Dikirim, menunggu barang diterima pembeli.";
						} elseif ($order_details['td_status'] == 0) {
							$status = "Barang Sudah Diterima";
						}?>
						<div class="size-209">
							<span class="mtext-110 cl2">
								<?= $status ?>
							</span>
						</div>
					</div>
					<?php if ($order_details['td_status'] == 3) { ?>
						<a href="<?= base_url('user/seller_payment_status/'.$order_details['td_id']) ?>" class="flex-c-m stext-101 cl0 size-116 bg1 bor14 hov-btn1 p-lr-15 trans-04 pointer">
								Barang Sudah Dikirim
						</a>
					<?php } ?>
					<br>
					<a href="<?= base_url('user/order_confirmation') ?>" class="flex-c-m stext-101 cl0 size-116 bg1 bor14 hov-btn1 p-lr-15 trans-04 pointer">
							Kembali
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
