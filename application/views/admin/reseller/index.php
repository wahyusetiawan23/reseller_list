<div class="page-title">
	<div class="row">
		<div class="col-12 col-md-6 order-md-1 order-last">
			<h3>List reseller</h3>
		</div>
	</div>
</div>
<section class="section">
	<div class="card">
		<div class="card-header">
			<a href="<?= base_url('Admin/reseller_post')?>" class="btn icon icon-left btn-primary"><i data-feather="user-plus"></i> New</a>
		</div>
		<div class="card-body">
			<div class="table-responsive datatable-minimal">
				<table class="table" id="table1">
					<thead>
						<tr>
							<th>Date</th>
							<th>Name</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Company</th>
							<th>Sosial Media</th>
							<th>Country</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($list as $row):?>
							<?php
								$status  = 'active';
								$badgeBG = 'success';
								if($row->status == 0){
									$status = 'Banned';
									$badgeBG = 'danger';
								}
								$statBadge = '<span class="badge bg-'.$badgeBG.'">'.$status.'</span>';
							?>
							<tr>
								<td><?=$row->date_created?></td>
								<td><?=$row->name?></td>
								<td><?=$row->email?></td>
								<td><?=$row->phone_number?></td>
								<td><?=$row->company?></td>
								<td>
									<div class="btn-group">
										<?php if(!empty($row->facebook)): ?>
											<a href="<?=$row->facebook?>" target="_blank" class="btn btn-sm icon btn-primary"><i class="bi bi-facebook"></i></a>
										<?php endif;?>
										<?php if(!empty($row->instagram)): ?>
											<a href="<?=$row->instagram?>" target="_blank" class="btn btn-sm  icon btn-danger"><i class="bi bi-instagram"></i></a>
										<?php endif;?>
										<?php if(!empty($row->telegram)): ?>
											<a href="<?=$row->telegram?>" target="_blank" class="btn btn-sm  icon btn-info"><i class="bi bi-telegram"></i></a>
										<?php endif;?>
										<?php if(!empty($row->whatsapp)): ?>
											<a href="<?=$row->whatsapp?>" target="_blank" class="btn btn-sm  icon btn-success"><i class="bi bi-whatsapp"></i></a>
										<?php endif;?>
									</div>
								</td>
								<td><?=$row->flag?></td>
								<td><?=$statBadge?></td>
								<td>
									<div class="btn-group">
										<a href="<?= base_url('Admin/reseller_put/'.$row->id_reseller)?>" class="btn icon btn-primary"><i class="bi bi-pencil"></i></a>
										<a href="javascript:void(0)" class="btn icon btn-warning" onclick="handleClick(event, <?=$row->id_reseller?>)"><i class="bi bi-exclamation-triangle"></i></a>
										<a href="javascript:void(0)" class="btn icon btn-danger" onclick="deleteClick(event, <?=$row->id_reseller?>)"><i class="bi bi-trash-fill"></i></a>
									</div>
								</td>
							</tr>
						<?php endforeach;?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>

<script>
	$('#resellerNAV').addClass('active');
	function handleClick(event, link) {
		event.preventDefault();

		Swal.fire({
			title: "Are you sure?",
			text: "Status akan di ganti",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Yes!"
		}).then((result) => {
			if (result.isConfirmed) {
				var base_url = "<?= base_url() ?>";
				$.ajax({
					url: base_url + 'Admin/resellerStatusAjax_put',
					type: 'post',
					dataType: 'json',
					data: {
						id: link
					},
					success: function(response) {
						if (response.status == false) {
							Swal.fire(
								'Error!',
								response.message,
								'error'
							)
						} else {
							Swal.fire({
								title: 'Success!',
								text: response.message,
								icon: 'success',
								confirmButtonText: 'OK'
							}).then((result) => {
								if (result.isConfirmed) {
									location.reload();
								}
							});
						}

						$('#btnsbmt').prop('disabled', false);

					}
				});
			}
		});

	}


	function deleteClick(event, link) {
		event.preventDefault();

		Swal.fire({
			title: "Are you sure?",
			text: "Reseller akan di hapus",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Yes!"
		}).then((result) => {
			if (result.isConfirmed) {
				var base_url = "<?= base_url() ?>";
				$.ajax({
					url: base_url + 'Admin/resellerAjax_del',
					type: 'post',
					dataType: 'json',
					data: {
						id: link
					},
					success: function(response) {
						if (response.status == false) {
							Swal.fire(
								'Error!',
								response.message,
								'error'
							)
						} else {
							Swal.fire({
								title: 'Success!',
								text: response.message,
								icon: 'success',
								confirmButtonText: 'OK'
							}).then((result) => {
								if (result.isConfirmed) {
									location.reload();
								}
							});
						}

						$('#btnsbmt').prop('disabled', false);

					}
				});
			}
		});

	}

</script>
