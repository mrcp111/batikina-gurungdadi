<!-- Slider -->
<section class="section-slide">
	<div class="wrap-slick1">
		<div class="slick1">
			<div class="item-slick1" style="background-image: url(<?= base_url() ?>/images/slide-01.jpg);">
				<div class="container h-full">
					<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
						<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
							<span class="ltext-101 cl2 respon2">
								Motif Batik Solo
							</span>
						</div>

						<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
							<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
								BARU
							</h2>
						</div>
						<a href="<?= base_url() ?>" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
							Beli Sekarang
						</a>
					</div>
				</div>
			</div>

			<div class="item-slick1" style="background-image: url(<?= base_url() ?>images/slide-02.jpg);">
				<div class="container h-full">
					<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
						<div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
							<span class="ltext-101 cl2 respon2">
								Motif Mega Mendung (Biru)
							</span>
						</div>

						<div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
							<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
								Kain Batik Terbaru
							</h2>
						</div>
						<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
							<a href="<?= base_url() ?>" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
								Beli Sekarang
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Product -->
<section class="bg0 p-t-23 p-b-140">
	<div class="container">
		<div class="p-b-10">
			<h3 class="ltext-103 cl5">
				Product Overview
			</h3>
		</div>

		<div class="flex-w flex-sb-m p-b-52">
			<div class="flex-w flex-l-m filter-tope-group m-tb-10">
				<a class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*" href="<?= base_url('auth/home') ?>">
					All Products
				</a>
			</div>

			<div class="flex-w flex-c-m m-tb-10">

				<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search bg-primary2">
					<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
					<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
					Search
				</div>
			</div>

			<!-- Search product -->
			<form class="dis-none panel-search w-full p-t-10 p-b-15" action="<?= base_url('auth/home') ?>" method="get">
				<div class="bor8 dis-flex p-l-15">
					<button type="submit" class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search" placeholder="Search">
				</div>
			</form>
		</div>

		<div class="row isotope-grid">
			<?= $this->session->flashdata('message'); ?>
			<?php foreach ($product as $pr): ?>
			<a href="<?= base_url() ?>">
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item product-box">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="<?= base_url('images/products/'.$pr->image); ?>" alt="IMG-PRODUCT">
						</div>
						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="<?= base_url() ?>" class="stext-104 hov-cl1 trans-04 js-name-b2 p-b-6" style="color: #333">
									<b> <?= $pr->name ?> </b>
								</a>
								<span class="stext-105 cl3" style="color: #37797b">
									<b><?= "Rp ". number_format($pr->price,2,",",".") ?></b>
								</span>
							</div>
						</div>
					</div>
				</div>
			</a>
			<?php endforeach; ?>
		</div>

		<!-- Load more -->
		<!-- <div class="flex-c-m flex-w w-full p-t-45">
			<a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
				Load More
			</a>
		</div> -->
	</div>
</section>
