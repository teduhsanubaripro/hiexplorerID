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
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<style>
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
    .card {
    transition: transform 0.2s ease-in-out;
    }
    .card:hover {
    transform: translateY(-5px); /* Efek hover untuk memberikan tampilan interaktif */
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
												<a href="<?= site_url('cart') ?>" class="booking-link">
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
                <div class="col-12">
                    <div class="single_listing">
                        <!-- Info Hotel -->
                        <div class="hotel_info">
                            <h3>Your Bookings</h3>
                            
                            <!-- Cards for displaying bookings -->
                            <div class="row">
								<?php 
									// Pastikan data bookings sudah dikirim dari controller
									if (isset($bookings) && count($bookings) > 0) {
										foreach ($bookings as $row) {
											echo "
											<div class='col-md-4 col-sm-6 mb-4'>
												<div class='card'>
													<div class='card-header'>
														<h3 class='card-title'>Hotels {$row['name']}</h3>
													</div>
													<div class='card-body'>
														<p><strong>Booking Date:</strong> {$row['check_in_date']}</p>
														<p><strong>Check-Out Date:</strong> {$row['check_out_date']}</p>
														<p><strong>Room Type:</strong> {$row['room_type']}</p>
														<p><strong>Total Guest:</strong> {$row['number_of_guests']}</p>
														<p><strong>Total Amount:</strong> Rp " . number_format($row['total_amount'], 0, ',', '.') . "</p>
														<!-- Buttons for Pay and Detail -->
														<div class='d-flex justify-content-between'>";

											if ($row['status_booking'] === 'pending') {
												// Jika status pending, tampilkan tombol Confirm Pay
												echo "<a href='" . site_url('booking/payment/'.$row['booking_id']) . "' class='btn btn-primary'>Confirm Pay</a>";
											} else {
												// Jika sudah dikonfirmasi, tampilkan teks "Confirmed"
												echo "<span class='text-success fw-bold'>✔ Confirmed</span>";
											}

											echo "<a href='" . site_url('invoice/'.$row['booking_id']) . "' class='btn btn-secondary'>Detail</a>
														</div>
													</div>
													<div class='card-footer'>
														<small class='text-muted'>Booking ID: {$row['booking_id']}</small>
													</div>
												</div>
											</div>";
										}
									} else {
										echo "<div class='col-12'><p>No bookings found</p></div>";
									}
								?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<!-- Modal Popup -->
	<div class="modal fade" id="flashMessageModal" tabindex="-1" aria-labelledby="flashMessageLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="flashMessageLabel">Notification</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<p id="flashMessageText"></p>
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
<script src="<?= base_url('template/fe/assets/plugins/datatables/datatables.min.js'); ?>"></script>
<script>
    // Initialize DataTable for booking table
    $(document).ready(function() {
        $('#bookingTable').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
</script>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Cek apakah ada flashdata sukses
        <?php if (session()->getFlashdata('success')): ?>
            let flashMessage = "<?= session()->getFlashdata('success'); ?>";
            document.getElementById('flashMessageText').textContent = flashMessage;
            let flashModal = new bootstrap.Modal(document.getElementById('flashMessageModal'));
            flashModal.show(); // Tampilkan modal
        <?php endif; ?>
    });
</script>
</body>

</html>