
	<header class="logo">
		<a href="<?= base_url('auth/home') ?>">
		<img src="<?= base_url('assets/') ?>images/logo.png" height="50px" alt="">
	</a>
	</header>
		<div class="form-container">
			<h3>Masuk</h3>
			<?= $this->session->flashdata('message'); ?>
			<form action="<?= base_url('auth') ?>" method="post">
				<div class="form-group">
					<label for="exampleInputEmail1">Email address</label>
					<input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>">
					<?= form_error('email', '<small class="text-danger pl-3"> ', '</small>'); ?>
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Password</label>
					<input type="password" class="form-control" id="password" name="password" placeholder="Password">
					<?= form_error('password', '<small class="text-danger pl-3"> ', '</small>'); ?>
				</div>
				<div class="form-group">
					<label for="">Belum punya akun? <a href="<?= base_url('auth/registration')  ?>">Daftar</a></label>
				</div>
				<button type="submit" class="btn btn-default btn-submit">Masuk</button>
			</form>
		</div>
