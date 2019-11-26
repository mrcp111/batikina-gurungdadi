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
                        <!-- valifation types -->
                        <!-- ============================================================== -->

														<div class="col col-sm-10 col-lg-9 ">
																<a class="btn btn-primary" href="<?= base_url('admin/data_trx') ?>" ><i class="fas fa-arrow-left"></i> Kembali</a>
														</div>
														<br> <br> <br>

												<?php $i=1 ?>
												<?php foreach ($trx_details as $td): ?>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Barang <?= $i ?></h5>
                                <div class="card-body">
																	<div class="form-group row">
																			<label class="col-12 col-sm-3 col-form-label text-sm-right">Email Penjual :</label>
																			<div class="col-12 col-sm-8 col-lg-6 col-form-label">
																					<?= $td->email ?>
																			</div>
																	</div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Nama :</label>
                                            <div class="col-12 col-sm-8 col-lg-6 col-form-label">
                                                <?= $td->product_name ?>
                                            </div>
                                        </div>
																				<div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Gambar :</label>
                                            <div class="col-12 col-sm-8 col-lg-6 col-form-label">
                                                <img src="<?= base_url('images/products/'.$td->image) ?>" alt="" height="250px">
                                            </div>
                                        </div>
																				<div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Jumlah : </label>
                                            <div class="col-12 col-sm-8 col-lg-6 col-form-label">
                                                <?= $td->amount ?>
                                            </div>
                                        </div>
																				<div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Harga Satuan :</label>
                                            <div class="col-12 col-sm-8 col-lg-6 col-form-label">
                                                <?= "Rp ". number_format($td->price,2,",",".") ?>
                                            </div>
                                        </div>
																				<?php if ($td->td_status == 1) {
																					$status = "Menunggu Pembayaran";
																					$href = "#";
																					$status_action = "Teruskan Ke Penjual";
																				} elseif ($td->td_status == 2) {
																					$status = "Pembeli Sudah Melakukan Pembayaran";
																					$status_action = "Teruskan Ke Penjual";
																				} elseif ($td->td_status == 3) {
																					$status = "Penjual Sudah Menerima Pesanan";
																					$status_action = "";
																				} elseif ($td->td_status == 4) {
																					$status = "Barang Sudah Dikirim, Menunggu Konfirmasi Pembeli Menerima Barang";
																				} elseif ($td->td_status == 0) {
																					$status = "Transaksi Selesai";
																					$status_action = "Kembali";
																				}?>
																				<div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Status :</label>
                                            <div class="col-12 col-sm-8 col-lg-6 col-form-label">
                                                <?= $status ?>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
												<?php $i++; ?>
											<?php endforeach; ?>
											<?php if ($trx['status'] == 1) { ?>

											<?php } elseif ($trx['status'] == 2) { ?>

											<div class="card-body">
												<div class="form-group row text-center">
													<div class="col col-sm-10 col-lg-9 ">
														<a class="btn btn-primary" href="<?= base_url('admin/payment_status/'.$trx['trx_id']) ?>"><?= $status_action ?></a>
													</div>
												</div>
                      </div>
										<?php } elseif ($trx['status'] == 0) { ?>
											<div class="card-body">
												<div class="form-group row text-center">
													<div class="col col-sm-10 col-lg-9 ">
														<a class="btn btn-primary" href="<?= base_url('admin/data_trx') ?>"><?= $status_action ?></a>
													</div>
												</div>
                      </div>
										<?php} else { ?>

										<?php } ?>
                    </div>
