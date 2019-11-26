<!-- ============================================================== -->
<!-- left sidebar -->
<!-- ============================================================== -->
<div class="nav-left-sidebar sidebar-dark">
	<div class="menu-list">
		<nav class="navbar navbar-expand-lg navbar-light">
			<a class="d-xl-none d-lg-none" href="../index.html">Dashboard</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav flex-column">
					<li class="nav-divider">
						Menu
					</li>

					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('admin') ?>" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Dashboard</a>

					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('admin/data_user') ?>" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fas fa-users"></i>Data User</a>

					</li>

					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('admin/data_product') ?>" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fas fa-fw fa-shopping-cart"></i>Data Produk</a>
					</li>


					<li class="nav-item ">
						<a class="nav-link" href="<?= base_url('admin/data_trx') ?>" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="far fa-fw fa-money-bill-alt"></i>Data Transaksi</a>
					</li>

					<li class="nav-item ">
						<a class="nav-link" href="<?= base_url('auth/logout') ?>" aria-expanded="false" aria-controls="submenu-4"><i class="fas fa-fw fa-sign-out-alt"></i>LogOut</a>
						<!-- berubah -->
					</li>
					<!-- berubah -->
				</ul>
			</div>
		</nav>
	</div>
</div>
<!-- ============================================================== -->
<!-- end left sidebar -->
