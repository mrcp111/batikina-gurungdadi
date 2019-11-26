<!-- Header -->
<header>
	<!-- Header desktop -->
	<div class="container-menu-desktop">
		<!-- Topbar -->
		<div class="top-bar">
			<div class="content-topbar flex-sb-m h-full container">
				<div class="left-top-bar">
					Hai, <?= $user['name']; ?>
				</div>
				<div class="right-top-bar flex-w h-full">
					<a href="<?= base_url('user/account') ?>" class="flex-c-m trans-04 p-lr-25 hov-btn1">
						Akun Saya
					</a>
					<a href="<?= base_url('auth/logout') ?>" class="flex-c-m trans-04 p-lr-25 hov-btn1" >
						Keluar
					</a>
				</div>
			</div>
		</div>

		<div class="wrap-menu-desktop" id="wrap-menu-desktop">
			<nav class="limiter-menu-desktop container">
				<!-- Logo desktop -->
				<a href="<?= base_url('user') ?>" class="logo">
					<img src="<?= base_url('assets/') ?>images/logo.png" alt="IMG-LOGO" height="35px">
				</a>
				<!-- Menu desktop -->
				<div class="menu-desktop">
					<ul class="main-menu">
						<li class="active-menu">
							<a href="<?= base_url('user') ?>">Home</a>
							<!-- <ul class="sub-menu">
								<li><a href="index.html">Homepage 1</a></li>
								<li><a href="home-02.html">Homepage 2</a></li>
								<li><a href="home-03.html">Homepage 3</a></li>
							</ul> -->
						</li>

						<li>
							<a href="<?= base_url('user')."#shop" ?>">Shop</a>
						</li>

						<li>
							<a href="<?=base_url('user/info')?>">Informasi</a>
						</li>

					</ul>
				</div>

				<!-- Icon header -->
				<div class="wrap-icon-header flex-w flex-r-m">
					<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
						<i class="zmdi zmdi-search"></i>
					</div>
					<a href="<?= base_url('user/cart') ?>" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="<?= $sum_cart ?>">
						<i class="zmdi zmdi-shopping-cart" title="Keranjang"></i>
					</a>
					<a href="<?= base_url('user/payment') ?>" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="<?= $sum_trx ?>">
						<i class="fas fa-money-bill-wave" title="Transaksi"></i>
					</a>
					<a href="<?= base_url('user/order_confirmation') ?>" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="<?= $sum_order ?>">
						<i class="fas fa-exchange-alt" title="Pemesanan"></i>
					</a>
					<ul class="main-menu">
						<li class="">
							<a href="#">Hai, <?= $user['name'] ?></a>
							<ul class="sub-menu ">
								<li ><a  class="hov-btn1" href="<?= base_url('user/product_list') ?>">Jual</a></li>
								<li><a class="hov-btn1" href="<?= base_url('user/cart') ?>">Keranjang</a></li>
								<li><a class="hov-btn1" href="<?= base_url('auth/logout') ?>">Keluar</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</div>

	<!-- Header Mobile -->
	<div class="wrap-header-mobile">
		<!-- Logo moblie -->
		<div class="logo-mobile">
			<a href="index.html"><img src="<?= base_url('assets/') ?>images/logo.png" alt="IMG-LOGO"></a>
		</div>

		<!-- Icon header -->
		<div class="wrap-icon-header flex-w flex-r-m m-r-15">
			<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
				<i class="zmdi zmdi-search"></i>
			</div>

			<a href="<?= base_url('user/cart') ?>" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="<?= $sum_cart ?>">
				<i class="zmdi zmdi-shopping-cart" title="Keranjang"></i>
			</a>
			<a href="<?= base_url('user/payment') ?>" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="<?= $sum_trx ?>">
				<i class="fas fa-money-bill-wave" title="Transaksi"></i>
			</a>
			<a href="<?= base_url('user/order_confirmation') ?>" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="<?= $sum_order ?>">
				<i class="fas fa-exchange-alt" title="Pemesanan"></i>
			</a>
		</div>

		<!-- Button show menu -->
		<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
			<span class="hamburger-box">
				<span class="hamburger-inner"></span>
			</span>
		</div>
	</div>


	<!-- Menu Mobile -->
	<div class="menu-mobile">
		<ul class="topbar-mobile">
			<li>
				<div class="left-top-bar">
				</div>
			</li>
			<li>
				<div class="right-top-bar flex-w h-full">
					<a href="<?= base_url('user/account') ?>" class="flex-c-m p-lr-10 trans-04">
						Akun Saya
					</a>

					<a href="<?= base_url('auth/logout') ?>" class="flex-c-m p-lr-10 trans-04">
						Keluar
					</a>
				</div>
			</li>
		</ul>

		<ul class="main-menu-m">
			<li>
				<a href="<?= base_url('user') ?>">Home</a>
			</li>

			<li>
				<a href="<?= base_url('user')."#shop" ?>">Shop</a>
			</li>

			<li>
				<a href="<?= base_url('user/info') ?>">Features</a>
			</li>


		</ul>
	</div>

	<!-- Modal Search -->
	<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
		<div class="container-search-header">
			<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
				<img src="<?= base_url() ?>images/icons/icon-close2.png" alt="CLOSE">
			</button>

			<form class="wrap-search-header flex-w p-l-15" action="<?= base_url('user') ?>" method="get">
				<button type="submit" class="flex-c-m trans-04" >
					<i class="zmdi zmdi-search"></i>
				</button>
				<input class="plh3" type="text" name="search" placeholder="Search">
			</form>
		</div>
	</div>
</header>
