<!-- MAIN CONTENT-->
<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="overview-wrap">
						<h2 class="title-1"><?= $title; ?> </h2>
					</div>
				</div>
			</div>

			<!-- ISI -->
			<div class="row">
				<div class="col-sm-9">
					<div class="row">
						<div class="col">
							<a href="<?= base_url('Student/InfoPembayaran') ?>" class="au-btn au-btn-icon au-btn--blue"><i class="zmdi zmdi-undo"></i> Back</a>
						</div>
					</div>

					<div class="table-responsive table--no-card m-b-30 mt-3">
						<table class="table table-borderless table-striped table-earning">
							<input type="hidden" name="ID" value="<?= $PersonalBayar['ID']; ?>">
							<?php $i = 1; ?>
							<tr>
								<td><strong>No</strong></td>
								<td><?= $i; ?></td>
							</tr>
							<tr>
								<td><strong>Payment Code</strong></td>
								<td><?= $PersonalBayar['Kode_Pembayaran']; ?> </td>
							</tr>
							<tr>
								<td><strong>Student Name</strong></td>
								<td><?= $PersonalBayar['Nama_Siswa']; ?> </td>
							</tr>
							<tr>
								<td><strong>Email</strong></td>
								<td><?= $PersonalBayar['Email']; ?> </td>
							</tr>
							<tr>
								<td><strong>Payment Name</strong></td>
								<td><?= $PersonalBayar['Nama_Pembayaran']; ?> </td>
							</tr>
							<tr>
								<td><strong>Type of Payment</strong></td>
								<?php foreach ($Jenis_Pembayaran as $JP) : ?>
									<?php if ($JP == $PersonalBayar['Jenis_Pembayaran']) : ?>
										<td>
											<?= $JP; ?>
										</td>
									<?php endif; ?>
								<?php endforeach; ?>
							</tr>
							<tr>
								<td><strong>Payment Name</strong></td>
								<td>Rp. <?= $PersonalBayar['Jumlah_Pembayaran']; ?></td>
							</tr>
							<tr>
								<td><strong>Payment Date</strong></td>
								<td><?= changeDateFormat('d F Y', $PersonalBayar['Tanggal_Pembayaran']); ?> </td>
							</tr>
							<?php $i++; ?>
						</table>
					</div>
				</div>
			</div>
			<!-- END USER DATA-->
		</div>
	</div>
	<!-- END ISI -->
</div>
<!-- END MAIN CONTENT-->

<!-- Button trigger modal -->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>