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
					<h2 class="pageheader-title">Data Transaksi</h2>
					<div class="page-breadcrumb">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="<?= base_url('admin') ?>" class="breadcrumb-link">Dashboard</a></li>
								<li class="breadcrumb-item" aria-current="page">Data Transaksi</li>
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
										<th width="30px">No</th>
										<th>Tanggal Transaksi</th>
										<th>Batas Pembayaran</th>
										<th>Total</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1 ?>
									<?php foreach ($trx as $tr): ?>
									<tr>
										<td>
											<?= $i ?>
										</td>
										<td>
											<?= date('d M Y', $tr->date_created) ?> <br>
											Jam <?= date('h:i', $tr->date_created) ?>
										</td>
										<td>
											<?php if ($tr->status == 0) {
												echo "Transaksi Selesai";
											} else { ?>
												<?php $payment_limit = $tr->date_created + 60*60*24 ?>
												<?= date('d M Y', $payment_limit) ?> <br>
												Jam <?= date('h:i', $payment_limit) ?>
											<?php }?>
										</td>
										<td>
											<?= "Rp ". number_format($tr->total,2,",",".") ?>
										</td>
										<td width="250">
											<?php if ($tr->status != 0) { ?>
												<a href="<?= base_url('admin/trx_details/'.$tr->id) ?>" class="btn btn-small text-primary"><i class="fas fa-info-circle"></i> Detail</a>
												<a onclick="deleteConfirm('<?= base_url('admin/delete_trx/'.$tr->id) ?>')" href="#" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
											<?php } else {?>
												<a href="<?= base_url('admin/trx_details/'.$tr->id) ?>" class="btn btn-small text-primary"><i class="fas fa-info-circle"></i> Detail</a>
											<?php } ?>

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
