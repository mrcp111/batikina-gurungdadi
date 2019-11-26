<!-- ============================================================== -->
<!-- wrapper  -->
<!-- ============================================================== -->
<div class="dashboard-wrapper">
	<div class="container-fluid  dashboard-content">
		<!-- ============================================================== -->
		<!-- pageheader -->
		<!-- ============================================================== -->
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="page-header">
					<h2 class="pageheader-title">Data Users</h2>
					<p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
					<div class="page-breadcrumb">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="<?= base_url('admin') ?>" class="breadcrumb-link">Dashboard</a></li>
								<li class="breadcrumb-item" aria-current="page">Data User</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
		<!-- ============================================================== -->
		<!-- end pageheader -->
		<!-- ============================================================== -->
		<?= $this->session->flashdata('message'); ?>
		<div class="row">
			<!-- ============================================================== -->
			<!-- basic table  -->
			<!-- ============================================================== -->
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="card">

					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-striped table-bordered first">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Email</th>
										<th>Tanggal Daftar</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1 ?>
									<?php foreach ($user as $us): ?>
									<tr>
										<td>
											<?= $i ?>
										</td>
										<td>
											<?= $us->name ?>
										</td>
										<td>
											<?= $us->email ?>
										</td>
										<td>
											<?= date('d M Y', $us->date_created) ?>
										</td>
										<td width="250">
											<a href="#" class="btn btn-small text-primary"><i class="fas fa-info-circle"></i> Detail</a>
											<a onclick="deleteConfirm('<?= base_url('admin/delete_user/'.$us->id) ?>')" href="#" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
										</td>
									</tr>
									<?php $i++ ?>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<!-- ============================================================== -->
			<!-- end basic table  -->
			<!-- ============================================================== -->
		</div>


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
		        <button onclick="cancelButton()" class="btn btn" type="button" data-dismiss="modal">Batal</button>
		        <a id="btn-delete" class="btn btn-danger" href="#">Hapus</a>
		      </div>
		    </div>
		  </div>
		</div>

		<script>
		function deleteConfirm(url){
		$('#btn-delete').attr('href', url);
		$('#deleteModal').modal();
		}
		</script>
