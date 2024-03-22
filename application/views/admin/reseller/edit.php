<div class="page-title">
	<div class="row">
		<div class="col-12 col-md-6 order-md-1 order-last">
			<h3>Edit reseller</h3>
		</div>
	</div>
</div>
<section class="section">
	<div class="card">
		<div class="card-content">
			<div class="card-body">
				<form class="form form-vertical" id="formInput">
					<input type="hidden" name="idInput" value="<?=$list->id_reseller?>">
					<div class="form-body">
						<div class="row">
							<div class="col-12">
								<div class="form-group mandatory">
									<label for="flName" class="form-label">Full Name</label>
									<input type="text" id="flName" class="form-control" name="fname" placeholder="Fullname" value="<?=$list->name?>">
								</div>
							</div>
							<div class="col-12">
								<div class="form-group mandatory">
									<label for="email" class="form-label">Email</label>
									<input type="email" id="email" class="form-control" name="email" placeholder="Email" autocomplete="off" value="<?=$list->email?>">
								</div>
							</div>
							<div class="col-12">
								<div class="form-group mandatory">
									<label for="company" class="form-label">Company</label>
									<input type="text" id="company" class="form-control" name="company" placeholder="company" value="<?=$list->company?>">
								</div>
							</div>
							<div class="col-12">
								<div class="form-group mandatory">
									<label for="address" class="form-label">Address</label>
									<textarea class="form-control" id="address" rows="3" name="address"><?=$list->address?></textarea>
								</div>
							</div>

							<div class="col-12">
								<div class="form-group mandatory">
									<label for="country" class="form-label">Country</label>
									<select class="choices form-select" id="country" name="country">
										<?php foreach ($country as $row):?>
												<?php if($list->country == $row->id):?>
													<option value="<?=$row->id?>" selected><?= $row->name?></option>
												<?php else:?>
													<option value="<?=$row->id?>"><?= $row->name?></option>
												<?php endif;?>
										<?php endforeach;?>
									</select>
								</div>
							</div>

							<div class="col-12">
								<div class="form-group mandatory">
									<label for="phone" class="form-label">Phone</label>
									<input type="text" id="phone" class="form-control" name="phone" placeholder="phone" value="<?=$list->phone_number?>">
								</div>
							</div>

							<div class="col-12 mt-4">
								<div class="form-group">
									<label for="website">Website</label>
									<input type="url" id="website" class="form-control" name="website" placeholder="https://" value="<?=$list->website?>">
								</div>
							</div>

							<div class="col-12">
								<div class="form-group">

									<div class="d-flex justify-content-between">
										<label for="payment">Payment Option</label>
										<ul class="list-unstyled mb-0 mt-2">
											<li class="d-inline-block me-2 mb-1">
												<div class="form-check">
													<div class="custom-control custom-checkbox">
														<input type="checkbox" class="form-check-input form-check-primary" name="customCheck" id="customColorCheck1" value="Paypal" onclick="handleCheckboxClick(this)">
														<label class="form-check-label" for="customColorCheck1">Paypal</label>
													</div>
												</div>
											</li>
											<li class="d-inline-block me-2 mb-1">
												<div class="form-check">
													<div class="custom-control custom-checkbox">
														<input type="checkbox" class="form-check-input form-check-success" name="customCheck" id="customColorCheck2" value="Crypto" onclick="handleCheckboxClick(this)">
														<label class="form-check-label" for="customColorCheck2">Crypto</label>
													</div>
												</div>
											</li>
											<li class="d-inline-block me-2 mb-1">
												<div class="form-check">
													<div class="custom-control custom-checkbox">
														<input type="checkbox" class="form-check-input form-check-secondary" name="customCheck" id="customColorCheck3" value="Visa" onclick="handleCheckboxClick(this)">
														<label class="form-check-label" for="customColorCheck3">Visa</label>
													</div>
												</div>
											</li>
											<li class="d-inline-block me-2 mb-1">
												<div class="form-check">
													<div class="custom-control custom-checkbox">
														<input type="checkbox" class="form-check-input form-check-danger" name="customCheck" id="customColorCheck4" value="Mastercard" onclick="handleCheckboxClick(this)">
														<label class="form-check-label" for="customColorCheck4">Mastercard</label>
													</div>
												</div>
											</li>
											<li class="d-inline-block me-2 mb-1">
												<div class="form-check">
													<div class="custom-control custom-checkbox">
														<input type="checkbox" class="form-check-input form-check-warning" name="customCheck" id="customColorCheck5" value="WesternUnion" onclick="handleCheckboxClick(this)">
														<label class="form-check-label" for="customColorCheck5">WesternUnion</label>
													</div>
												</div>
											</li>
										</ul>
									</div>

									<input type="text" id="payment" class="form-control" name="payment" placeholder="payment" value="<?=$list->payment_option?>">
								</div>
							</div>

							<div class="col-12">
								<div class="form-group">
									<label for="facebook">Facebook</label>
									<input type="url" id="facebook" class="form-control" name="facebook" placeholder="https://" value="<?=$list->facebook?>">
								</div>
							</div>

							<div class="col-12">
								<div class="form-group">
									<label for="instagram">Instagram</label>
									<input type="url" id="instagram" class="form-control" name="instagram" placeholder="https://" value="<?=$list->instagram?>">
								</div>
							</div>

							<div class="col-12">
								<div class="form-group">
									<label for="telegram">Telegram</label>
									<input type="url" id="telegram" class="form-control" name="telegram" placeholder="https://t.me/username" value="<?=$list->telegram?>">
								</div>
							</div>

							<div class="col-12">
								<div class="form-group">
									<label for="whatsapp">Whatsapp</label>
									<input type="url" id="whatsapp" class="form-control" name="whatsapp" placeholder="https://wa.me/1XXXXXXXXXX" value="<?=$list->whatsapp?>">
								</div>
							</div>



							<div class="col-12 d-flex justify-content-end">
								<button type="submit" class="btn btn-primary me-1 mb-1" id="btnsbmt">Submit</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>


<script src="<?=base_url('assets/template/dist/')?>assets/extensions/choices.js/public/assets/scripts/choices.js"></script>
<script src="<?=base_url('assets/template/dist/')?>assets/static/js/pages/form-element-select.js"></script>
<script>
	$('#resellerNAV').addClass('active');
</script>


<script>
	$(document).ready(function() {
		paymentInclude()
	});
	function handleCheckboxClick(checkbox) {
		var payement = document.getElementById("payment");

		if (checkbox.checked) {
			payement.value += checkbox.value + ', ';
		} else {
			var valueToRemove = checkbox.value + ', ';
			payement.value = payement.value.replace(valueToRemove, '');
		}
	}

	$('#formInput').submit(function(e) {
		e.preventDefault();
		$('#btnsbmt').prop('disabled', true);
		var formData = $(this).serialize();

		var base_url = "<?= base_url() ?>";
		$.ajax({
			url: base_url + 'Admin/resellerAjax_put',
			type: 'post',
			dataType: 'json',
			data: formData,
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
	})

	function paymentInclude(){
		var payement = document.getElementById("payment");
		var inputValue = payement.value;
		if (inputValue.includes("Paypal")) {
			$('#customColorCheck1').prop('checked', true);
		}
		if (inputValue.includes("Crypto")) {
			$('#customColorCheck2').prop('checked', true);
		}
		if (inputValue.includes("Visa")) {
			$('#customColorCheck3').prop('checked', true);
		}
		if (inputValue.includes("Mastercard")) {
			$('#customColorCheck4').prop('checked', true);
		}
		if (inputValue.includes("WesternUnion")) {
			$('#customColorCheck5').prop('checked', true);
		}

	}

</script>
