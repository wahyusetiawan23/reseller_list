<?php
$assets = base_url('assets/home/');

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Seller Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=$assets?>/css/style.css">
	<script src="https://code.jquery.com/jquery-3.7.0.js"
			integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
</head>

<body class="d-flex flex-column min-vh-100">
    <section class="header">
        <div class="container">
            <div class="content-header">
                <div class="image">
                    <img src="<?=$assets?>/image/logo.png" alt="">
                </div>
                <div class="text">
                    <p class="title">Our Seller</p>
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-5">
                            <p class="desc">Find a seller near you. Contact them for support or to purchase our
                                products.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="list-seller">
        <div class="container">
            <div class="header-list">
                <div class="row">
                    <div class="col-md-8">
                        <div class="country">
                            <iconify-icon icon="ic:round-flag"></iconify-icon>
                            <span id="countrySUB">UNDEFINED</span>
                        </div>
                    </div>
                    <div class="col-md-4">
<!--                        <form id="searchForm">-->
<!--                            <div class="search">-->
<!--                                <div class="searchbar">-->
<!--                                    <div class="searchbar-wrapper">-->
<!--                                            <div class="searchbar-center">-->
<!--                                                <div class="searchbar-input-spacer"></div>-->
<!--                                                <input type="text" class="searchbar-input" id="searchFormValue" name="search" autocapitalize="off"-->
<!--                                                       autocomplete="off" title="Search" role="combobox"-->
<!--                                                       placeholder="Search name">-->
<!--                                            </div>-->
<!--                                            <div class="searchbar-right">-->
<!--                                                <a href="">-->
<!--                                                    <iconify-icon class="voice-search" icon="mingcute:search-line" width="22" height="22"></iconify-icon>-->
<!--                                                </a>-->
<!--                                            </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </form>-->
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center" >
                <div class="notfound text-center" style="display: none;" id="searchNOTFOUND">
                    <img src="<?=$assets?>/image/notfound.png" alt="">
                    <div>
                        <p class="text-notfound">Sorry, No results found for <span id="keySearch">"XXXXX"</span> </p>
                        <a href="<?= base_url()?>" class="btn btn-home">Refresh Page</a>
                    </div>
                </div>
            </div>
            <div class="card-list">
                <div class="row">

					<?php for ($i=0; $i<3; $i++):?>
						<div class="col-md-4 loadingCARD">
							<div class="card cardss">
								<div class="card__skeleton card__title"></div>
								<div class="card__skeleton card__description"> </div>
								<div class="card__skeleton card__title"></div>
							</div>
						</div>
					<?php endfor;?>
                </div>
				<div class="row" id="contentList">

				</div>
            </div>
        </div>
    </section>

    <footer class="mt-auto">
        <section class="footer">
            <div class="container">
                <p class="content"> Copyright &copy; 2024
                    PT. Borneo World Wide.
                    All rights reserved.</p>
        </section>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@2.0.0/dist/iconify-icon.min.js"></script>


	<script>
		let cardNo_1 = '<div class="col-md-4"><div class="card"><div class="cards"><div class="header-card">';
		let card_company = '';
		let cardNo_2 = '</div><div class="content-card"><div class="list-card"><p class="title-list">Full Name :</p><p class="dynamic-list">';
		let card_fullname = '';
		let cardNo_3 = '</p></div><div class="list-card"><p class="title-list">Phone Number : </p><p class="dynamic-list">';
		let card_phone = '';
		let cardNo_4 = '</p></div><div class="list-card"><p class="title-list">Email : </p><p class="dynamic-list">';
		let card_email = '';
		let cardNo_5 = '</p></div><div class="list-card"><p class="title-list">Website : </p><p class="dynamic-list">';
		let card_website = '';
		let cardNo_6 = '</p></div><div class="list-card"><p class="title-list">Payment Method : </p><p class="dynamic-list">';
		let card_payment = '';
		let cardNo_7 = '</p></div><div class="list-card"><p class="title-list">Address :</p><p class="dynamic-list">';
		let card_address = '';
		let cardNo_8 = '</p></div></div></div><div class="card-footer">';

		let footer_wa = '<iconify-icon icon="mingcute:whatsapp-fill" width="24" height="24"></iconify-icon>';
		let footer_fb = '<iconify-icon icon="ic:outline-facebook" width="24" height="24"></iconify-icon>';
		let footer_tele = '<iconify-icon icon="ic:outline-telegram" width="24" height="24"></iconify-icon>';
		let footer_ig 	= '<iconify-icon icon="ant-design:instagram-filled" width="24" height="24"></iconify-icon>';

		let cardNo_9 = '</div></div></div>';

		let bronze = 999;

		function loadingCard(type){
			if(type == 1){
				$('.loadingCARD').css('display', 'block');
			}else{
				$('.loadingCARD').css('display', 'none');
			}
		}

		function notFoundResult(type){
			if(type == 1){
				$('#searchNOTFOUND').css('display', 'block');
			}else{
				$('#searchNOTFOUND').css('display', 'none');
			}
		}

		function metaResponse(response){
			let html = '';
			response.list.forEach(function(item) {
				bronze = item.country;
				html += cardNo_1;
				html += item.company;
				html += cardNo_2;
				html += item.name;
				html += cardNo_3;
				html += item.phone_number;
				html += cardNo_4;
				html += item.email;
				html += cardNo_5;
				html += item.website;
				html += cardNo_6;
				html += item.payment_option;
				html += cardNo_7;
				html += item.address;
				html += cardNo_8;
				if(item.whatsapp !== ''){
					html += '<a href="'+item.whatsapp+'" title="Whatsapp" target="_blank">';
					html += footer_wa;
					html += '</a>'
				}
				if(item.facebook !== ''){
					html += '<a href="'+item.facebook+'" title="Facebook" target="_blank">';
					html += footer_fb;
					html += '</a>'
				}
				if(item.telegram !== ''){
					html += '<a href="'+item.telegram+'" title="telegram" target="_blank">';
					html += footer_tele;
					html += '</a>'
				}
				if(item.instagram !== ''){
					html += '<a href="'+item.instagram+'" title="instagram" target="_blank">';
					html += footer_ig;
					html += '</a>'
				}
				html += cardNo_9;
			});
			if(html !== ''){
				$('#contentList').html(html)
				loadingCard(0)
			}
		}

		function listreseller(){
			var base_url = "<?= base_url() ?>";
			$.ajax({
				url: base_url + 'Home/list',
				type: 'post',
				dataType: 'json',
				success: function(response) {
					$('#countrySUB').html(response.country)

					metaResponse(response)
				}
			});
		}

		// $('#searchForm').submit(function(e) {
		// 	e.preventDefault();
        //
		// 	let searchVal = $('#searchFormValue').value;
		// 	$.ajax({
		// 		url: base_url + 'Home/search',
		// 		type: 'post',
		// 		dataType: 'json',
		// 		data:{
		// 			id: bronze,
		// 			search: searchVal
		// 		}
		// 		success: function(response) {
        //
        //
		// 			metaResponse(response)
		// 		}
		// 	});
		// })
		$(document).ready(function(){
			loadingCard(1)
			listreseller()
		})
	</script>
</body>

</html>
