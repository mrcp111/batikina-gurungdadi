<br> <br> <br> <br>
<!-- breadcrumb -->
<div class="container">
	<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
		<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
			Home
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>

		<span class="stext-109 cl4">
			Akun Saya
		</span>
	</div>
</div>


<!-- Shoping Cart -->
<form class="bg0 p-t-75 p-b-85" action="<?= base_url('user/account') ?>" method="post">
	<div class="container">
		<div class="row">
			<div class="col-sm-10 col-lg-10 col-xl-10 m-lr-auto m-b-50">
				<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
					<h4 class="mtext-109 cl2 p-b-30">
						Akun Saya
					</h4>
					<?= $this->session->flashdata('message'); ?>
					<div class="flex-w flex-t bor12 p-b-13">
					</div>

					<div class="row">
						<div class="flex-w flex-t p-t-15 p-b-30 col-md-12">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Email
								</span>
							</div>
							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm col-md-7">
								<div class="bor8 bg0 m-b-12">
									<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" id="email" name="email" readonly value="<?= $user['email'] ?>">
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="flex-w flex-t p-t-15 p-b-30 col-md-12">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Nama
								</span>
							</div>
							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm col-md-7">
								<div class="bor8 bg0 m-b-12">
									<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" id="name" name="name" value="<?= $user['name'] ?>">
								</div>
								<?= form_error('name', '<small class="text-danger pl-3"> ', '</small>'); ?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="flex-w flex-t p-t-15 p-b-30 col-md-12">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Password Lama
								</span>
								<small class="text-danger pl-3"> *wajib diisi</small>
							</div>
							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm col-md-7">
								<div class="bor8 bg0 m-b-12">
									<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="password" id="password1" name="password1" placeholder="">
								</div>
								<?= form_error('password1', '<small class="text-danger pl-3"> ', '</small>'); ?>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="flex-w flex-t p-t-15 p-b-30 col-md-12">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Password Baru
								</span>
							</div>
							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm col-md-7">
								<div class="bor8 bg0 m-b-12">
									<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="password"  id="password2" name="password2" placeholder="">
								</div>
							</div>
						</div>
					</div>

					<button type="submit" class="flex-c-m stext-101 cl0 size-116 bg1 bor14 hov-btn1 p-lr-15 trans-04 pointer">
						Perbarui
					</button>
					<br>
					<a href="<?= base_url('user') ?>" class="flex-c-m stext-101 cl0 size-116 bg2 bor14 hov-btn2 p-lr-15 trans-04 pointer" style="color: #fff">Kembali</a>
					<br>
				</div>
			</div>
		</div>
	</div>
</form>
