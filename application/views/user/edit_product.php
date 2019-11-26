<br><br><br><br>
<!-- breadcrumb -->
<div class="container">
	<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
		<a href="<?= base_url('user/upload_product') ?>" class="stext-109 cl8 hov-cl1 trans-04">
			Home
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>

		<span class="stext-109 cl4">
			Upload Produk
		</span>
	</div>
</div>
<br><br>

<!-- Shoping Cart -->
<?= form_open_multipart('user/edit_product/'.$product['id']); ?>
<div class="container">
	<div class="row">
		<div class="col-sm-10 col-lg-10 col-xl-10 m-lr-auto m-b-50">
			<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
				<a href="<?= base_url('user/product_list') ?>" class="btn btn-small bg1 hov-btn1"><i class="fas fa-arrow-left"></i> Kembali</a>
				<br> <br>
				<h4 class="mtext-109 cl2 p-b-30">
					Edit Produk
				</h4>
				<?= $this->session->flashdata('message'); ?>
				<div class="flex-w flex-t bor12 p-b-13">
				</div>

				<div class="row">
					<div class="flex-w flex-t p-t-15 p-b-30 col-md-12">
						<div class="size-208 w-full-ssm">
							<span class="stext-110 cl2">
								Nama Produk
							</span>
						</div>
						<div class="size-209 p-r-18 p-r-0-sm w-full-ssm col-md-7">
							<div class="bor8 bg0 m-b-12">
								<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="name" id="name" value="<?= $product['name'] ?>">
								<?= form_error('name', '<small class="text-danger pl-3"> ', '</small>'); ?>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="flex-w flex-t p-t-15 p-b-30 col-md-12">
						<div class="size-208 w-full-ssm">
							<span class="stext-110 cl2">
								Harga
							</span>
						</div>
						<div class="size-209 p-r-18 p-r-0-sm w-full-ssm col-md-7">
							<div class="bor8 bg0 m-b-12">
								<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="price" id="price" value="<?= number_format($product['price'],0,"",".") ?>">
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="flex-w flex-t p-t-15 p-b-30 col-md-12">
						<div class="size-208 w-full-ssm">
							<span class="stext-110 cl2">
								Foto
							</span>
						</div>
						<div class="size-209 p-r-18 p-r-0-sm w-full-ssm col-md-7">
							<div class="bor8 bg0 m-b-12">
								<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="file" name="image" id="image" value="<?= $product['image'] ?>">
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="flex-w flex-t p-t-15 p-b-30 col-md-12">
						<div class="size-208 w-full-ssm">
							<span class="stext-110 cl2">
								Details
							</span>
						</div>
						<div class="size-209 p-r-18 p-r-0-sm w-full-ssm col-md-7">
							<div class="bor8 bg0 m-b-12">
								<textarea rows="8" cols="80" name="details" id="details" class="stext-111 cl8 plh3 size-111 p-lr-15" ><?= $product['details'] ?></textarea>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<button type="submit" class="flex-c-m stext-101 cl0 size-116 bg1 bor14 hov-btn1 p-lr-15 trans-04 pointer">
						Ubah
					</button>
				</div>
			</div>
		</div>
	</div>
</div>
</form>

<script type="text/javascript">

		var rupiah = document.getElementById('price');
		rupiah.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			rupiah.value = formatRupiah(this.value, ' ');
		});
		/* Fungsi formatRupiah */
		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? rupiah : '');
		}
	</script>
