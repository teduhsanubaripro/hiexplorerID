<!DOCTYPE html>
<html lang="en">
<head>
<title>Single Listing</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Travelix Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="<?= base_url('template/fe/assets/styles/bootstrap4/bootstrap.min.css'); ?>" rel="stylesheet">
<link href="<?= base_url('template/fe/assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css'); ?>" rel="stylesheet">
<link href="<?= base_url('template/fe/assets/plugins/colorbox/colorbox.css'); ?>" rel="stylesheet">
<link href="<?= base_url('template/fe/assets/plugins/OwlCarousel2-2.2.1/owl.carousel.css'); ?>" rel="stylesheet">
<link href="<?= base_url('template/fe/assets/plugins/OwlCarousel2-2.2.1/owl.theme.default.css'); ?>" rel="stylesheet">
<link href="<?= base_url('template/fe/assets/plugins/OwlCarousel2-2.2.1/animate.css'); ?>" rel="stylesheet">
<link href="<?= base_url('template/fe/assets/styles/single_listing_styles.css'); ?>" rel="stylesheet">
<link href="<?= base_url('template/fe/assets/styles/single_listing_responsive.css'); ?>" rel="stylesheet">
<link href="<?= base_url('template/fe/assets/styles/elements_styles.css'); ?>" rel="stylesheet">
<link href="<?= base_url('template/fe/assets/styles/elements_responsive.css'); ?>" rel="stylesheet">

<style>
	.offers_icon_black .offers_icons_lists {
    display: flex; /* Membuat elemen anak berjajar secara horizontal */
    gap: 10px; /* Jarak antar ikon */
    list-style: none; /* Menghilangkan bullet pada daftar */
    padding: 0;
    margin: 0;
	}

	.offers_icon_black .offers_icons_items i {
		color: #000; /* Warna hitam */
		font-size: 18px; /* Ukuran font ikon */
	}
    .booking_button {
    color: #000; /* Sesuaikan dengan warna teks */
    font-size: 16px; /* Sesuaikan ukuran font */
    padding: 10px 20px; /* Sesuaikan padding */
    border: none;
    cursor: pointer;
    color: white;
    font-weight: bold;
    text-align: center;
    }

    .booking_button span {
    }
    .room-image {
    width: 100%;  /* Gambar akan menyesuaikan dengan lebar container */
    max-width: 400px; /* Ukuran maksimal lebar gambar */
    height: auto; /* Menjaga rasio aspek gambar */
    }
	/* Style dropdown */
.dropdown {
    position: relative;
    display: inline-block;
}

.dropbtn {
    text-decoration: none;
    color: white;
    padding: 10px;
    /* background: #333; */
    border-radius: 5px;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #fff;
    min-width: 150px;
    z-index: 1;
    border-radius: 5px;
}

	/* Style dropdown link */
	.dropdown-content a {
		color: black;
		padding: 10px 15px;
		display: block;
		text-decoration: none;
}

	/* Hover effect */
	.dropdown:hover .dropdown-content {
		display: block;
}

	.dropdown-content a:hover {
		background-color: #f1f1f1;
}
.booking-link {
    position: relative;
    display: inline-block;
    font-size: 16px; /* Sesuaikan ukuran font jika perlu */
}

.badge {
    position: absolute;
    top: -8px; /* Sesuaikan posisi vertikal badge, sedikit di atas kata "Booking" */
    right: 0; /* Posisi badge pada akhir kata "Booking" */
    background-color: red; /* Ganti dengan warna sesuai keinginan */
    color: white;
    padding: 3px 8px;
    border-radius: 50%;
    font-size: 12px;
}
</style>
</head>

<body>

<div class="super_container">
	
	<!-- Header -->

	<header class="header">

		<!-- Main Navigation -->

		<nav class="main_nav">
			<div class="container">
				<div class="row">
					<div class="col main_nav_col d-flex flex-row align-items-center justify-content-start">
						<div class="logo_container">
							<div class="logo"><a href="#"><img src="images/logo.png" alt="">travelix</a></div>
						</div>
						<div class="main_nav_container ml-auto">
							<ul class="main_nav_list">
								<li class="main_nav_item"><a href="index.html">home</a></li>
								<li class="main_nav_item"><a href="about.html">about us</a></li>
								<li class="main_nav_item"><a href="offers.html">offers</a></li>
								<li class="main_nav_item"><a href="blog.html">news</a></li>
								<li class="main_nav_item"><a href="contact.html">contact</a></li>
								<li class="main_nav_item">
									<?php if (!session()->get('id_user')): ?>
										<!-- Jika belum login, hanya tampilkan Login / Register -->
										<a href="<?= site_url('login') ?>">Login / Register</a>
									<?php else: ?>
										<!-- Jika sudah login, tampilkan dropdown menu -->
										<div class="dropdown">
											<a href="#" class="dropbtn">Account</a>
											<div class="dropdown-content">
												<a href="<?= site_url('setting') ?>">Setting</a>
												<a href="<?= site_url('booking') ?>" class="booking-link">
													Your Booking
													<span class="badge"><?= isset($booking_count) ? $booking_count : 0 ?></span>
												</a>
												<a href="<?= site_url('auth/logout') ?>">Logout</a>
											</div>
										</div>
									<?php endif; ?>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>	
		</nav>

	</header>

	<div class="menu trans_500">
		<div class="menu_content d-flex flex-column align-items-center justify-content-center text-center">
			<div class="menu_close_container"><div class="menu_close"></div></div>
			<div class="logo menu_logo"><a href="#"><img src="images/logo.png" alt=""></a></div>
			<ul>
				<li class="menu_item"><a href="index.html">home</a></li>
				<li class="menu_item"><a href="about.html">about us</a></li>
				<li class="menu_item"><a href="offers.html">offers</a></li>
				<li class="menu_item"><a href="blog.html">news</a></li>
				<li class="menu_item"><a href="contact.html">contact</a></li>
			</ul>
		</div>
	</div>

	<!-- Home -->

	<div class="homes">
	</div>

	<!-- Offers -->

	<div class="listing">

    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="single_listing">
                    <!-- Info Hotel -->
                    <div class="hotel_info">
                        <h1><strong>Detail Pemesanan</strong></h1>
                        <div class="room_details">
                            <h3>Tipe Kamar: <?= esc($room['room_type']) ?></h3>
                            <p>Harga per malam: Rp <?= number_format($room['price_per_night'], 0, ',', '.') ?></p>
                                <div class="offers_icon_black">
                                    <ul class="offers_icons_lists">
                                        <h4>Facilities :</h4>
                                            <?php 
                                                $amenities = explode(',', $room['amenities']);
                                            ?>
                                            <?php foreach ($amenities as $amenity): ?>
                                                <li class="offers_icons_items">
                                                    <i class="<?= trim(esc($amenity)) ?>" aria-hidden="true"></i>
                                                </li>
                                            <?php endforeach; ?>
                                    </ul>
                                </div>
                            <img src="<?= base_url('uploads/rooms/' . esc($room['image_url'])) ?>" alt="<?= esc($room['room_type']) ?>" class="img-fluid room-image">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Input di Sebelah Kanan -->
            <div class="col-lg-4">
                <div class="booking_form">
                    <h3>Form Pemesanan</h3>
                    <form id="bookingForm" action="<?= base_url('offers/confirm') ?>" method="POST">
                        <?= csrf_field() ?>
                        <input type="hidden" name="id_user" value="<?= session()->get('id_user') ?>">
                        <input type="hidden" name="room_id" value="<?= esc($room['room_id']) ?>">
                        <input type="hidden" id="price_per_night" value="<?= esc($room['price_per_night']) ?>">

                            <!-- Jumlah Tamu -->
                            <div class="form-group">
                                <label for="number_of_guests">Jumlah Tamu</label>
                                <input type="number" id="number_of_guests" name="number_of_guests" class="form-control" required min="1">
                                <?php if (isset($errors['number_of_guests'])): ?>
                                    <div class="alert alert-danger"><?= $errors['number_of_guests'] ?></div>
                                <?php endif; ?>
                            </div>

                            <div class="form-row d-flex align-items-center justify-content-between">
                                <!-- Tanggal Check-in -->
                                <div class="form-group col-md-5">
                                    <label for="checkin_date">Tanggal Check-in</label>
                                    <input type="date" id="check_in_date" name="check_in_date" class="form-control" required>
                                    <?php if (isset($errors['check_in_date'])): ?>
                                        <div class="alert alert-danger"><?= $errors['check_in_date'] ?></div>
                                    <?php endif; ?>
                                </div>

                                <!-- Arrow -->
                                <div class="col-md-2 text-center">
                                    <span class="h3">→</span>
                                </div>

                                <!-- Tanggal Check-out -->
                                <div class="form-group col-md-5">
                                    <label for="checkout_date">Tanggal Check-out</label>
                                    <input type="date" id="check_out_date" name="check_out_date" class="form-control" required>
                                    <?php if (isset($errors['check_out_date'])): ?>
                                        <div class="alert alert-danger"><?= $errors['check_out_date'] ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea id="description" name="description" class="form-control" rows="4" required></textarea>
                            </div>

                                <!-- Total Harga -->
                                <p><strong>Total Harga:</strong> <span id="display_total_amount">Rp 0</span></p>
                                        <input type="hidden" id="total_amount" name="total_amount" value="0">


                            <!-- Tombol Pemesanan -->
                            <div class="button">
                                <div class="button_bcg"></div>
                                <div class="booking_button" onclick="document.getElementById('bookingForm').submit();">
                                Pesan Sekarang
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

	</div>

	<!-- Footer -->

	<footer class="footer">
		<div class="container">
			<div class="row">

				<!-- Footer Column -->
				<div class="col-lg-3 footer_column">
					<div class="footer_col">
						<div class="footer_content footer_about">
							<div class="logo_container footer_logo">
								<div class="logo"><a href="#"><img src="images/logo.png" alt="">travelix</a></div>
							</div>
							<p class="footer_about_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus quis vu lputate eros, iaculis consequat nisl. Nunc et suscipit urna. Integer eleme ntum orci eu vehicula pretium.</p>
							<ul class="footer_social_list">
								<li class="footer_social_item"><a href="#"><i class="fa fa-pinterest"></i></a></li>
								<li class="footer_social_item"><a href="#"><i class="fa fa-facebook-f"></i></a></li>
								<li class="footer_social_item"><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li class="footer_social_item"><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li class="footer_social_item"><a href="#"><i class="fa fa-behance"></i></a></li>
							</ul>
						</div>
					</div>
				</div>

				<!-- Footer Column -->
				<div class="col-lg-3 footer_column">
					<div class="footer_col">
						<div class="footer_title">tags</div>
						<div class="footer_content footer_tags">
							<ul class="tags_list clearfix">
								<li class="tag_item"><a href="#">design</a></li>
								<li class="tag_item"><a href="#">fashion</a></li>
								<li class="tag_item"><a href="#">music</a></li>
								<li class="tag_item"><a href="#">video</a></li>
								<li class="tag_item"><a href="#">party</a></li>
								<li class="tag_item"><a href="#">photography</a></li>
								<li class="tag_item"><a href="#">adventure</a></li>
								<li class="tag_item"><a href="#">travel</a></li>
							</ul>
						</div>
					</div>
				</div>

				<!-- Footer Column -->
				<div class="col-lg-3 footer_column">
					<div class="footer_col">
						<div class="footer_title">contact info</div>
						<div class="footer_content footer_contact">
							<ul class="contact_info_list">
								<li class="contact_info_item d-flex flex-row">
									<div><div class="contact_info_icon"><img src="images/placeholder.svg" alt=""></div></div>
									<div class="contact_info_text">4127 Raoul Wallenber 45b-c Gibraltar</div>
								</li>
								<li class="contact_info_item d-flex flex-row">
									<div><div class="contact_info_icon"><img src="images/phone-call.svg" alt=""></div></div>
									<div class="contact_info_text">2556-808-8613</div>
								</li>
								<li class="contact_info_item d-flex flex-row">
									<div><div class="contact_info_icon"><img src="images/message.svg" alt=""></div></div>
									<div class="contact_info_text"><a href="mailto:contactme@gmail.com?Subject=Hello" target="_top">contactme@gmail.com</a></div>
								</li>
								<li class="contact_info_item d-flex flex-row">
									<div><div class="contact_info_icon"><img src="images/planet-earth.svg" alt=""></div></div>
									<div class="contact_info_text"><a href="https://colorlib.com">www.colorlib.com</a></div>
								</li>
							</ul>
						</div>
					</div>
				</div>

			</div>
		</div>
	</footer>

</div>

<script src="<?= base_url('template/fe/assets/js/jquery-3.2.1.min.js'); ?>"></script>
<script src="<?= base_url('template/fe/assets/styles/bootstrap4/popper.js'); ?>"></script>
<script src="<?= base_url('template/fe/assets/styles/bootstrap4/bootstrap.min.js'); ?>"></script>
<script src="<?= base_url('template/fe/assets/plugins/Isotope/isotope.pkgd.min.js'); ?>"></script>
<script src="<?= base_url('template/fe/plugins/easing/easing.js'); ?>"></script>
<script src="<?= base_url('template/fe/assets/plugins/parallax-js-master/parallax.min.js'); ?>"></script>
<script src="<?= base_url('template/fe/assets/js/offers_custom.js'); ?>"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const checkinInput = document.getElementById("check_in_date");
    const checkoutInput = document.getElementById("check_out_date");
    const totalPriceInput = document.getElementById("total_amount");
    const displayTotalPrice = document.getElementById("display_total_amount"); // Untuk tampilan
    const pricePerNight = parseFloat(document.getElementById("price_per_night").value);

    function calculateTotalPrice() {
        if (checkinInput.value && checkoutInput.value) {
            const checkinDate = new Date(checkinInput.value);
            const checkoutDate = new Date(checkoutInput.value);
            const timeDiff = checkoutDate - checkinDate;
            const days = timeDiff / (1000 * 3600 * 24);

            if (days > 0) {
                const basePrice = days * pricePerNight;
                const tax = basePrice * 0.1; // 10% PPN
                const totalPrice = basePrice + tax;

                // Generate random 3-digit number
                const randomDigits = Math.floor(100 + Math.random() * 900);

                // Final price with random 3 digits
                const finalPrice = Math.floor(totalPrice) + randomDigits;

                // Simpan angka murni ke dalam input (untuk dikirim ke database)
                totalPriceInput.value = finalPrice;

                // Tampilkan dalam format Rupiah untuk pengguna
                displayTotalPrice.textContent = "Rp " + finalPrice.toLocaleString("id-ID");
            } else {
                totalPriceInput.value = 0;
                displayTotalPrice.textContent = "Rp 0";
            }
        }
    }

    checkinInput.addEventListener("change", calculateTotalPrice);
    checkoutInput.addEventListener("change", calculateTotalPrice);
});

</script>

</body>

</html>