<!DOCTYPE html>
<html lang="en">

<head>
<?php foreach ($profiles as $key => $value) : ?>
    <meta charset="utf-8">
    <title><?= is_array($value) ? $value['company'] : $value->company ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="template/afna.jpg" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url('template/assets/assets/lib/owlcarousel/assets/owl.carousel.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('template/assets/assets/lib/animate/animate.min.css'); ?>" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url('template/assets/assets/css/bootstrap.min.css'); ?>" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?= base_url('template/assets/assets/css/style.css'); ?>" rel="stylesheet">
<?php endforeach; ?>
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-dark px-5 d-none d-lg-block">
      <?php foreach ($profiles as $key => $value) : ?>
        <div class="row gx-0">
            <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                        <small class="me-3 text-light">
                            <i class="fa fa-building me-2"></i><?= is_array($value) ? $value['company'] : $value->company ?>
                            <i class="fa fa-map-marker-alt me-2"></i><?= is_array($value) ? $value['address'] : $value->address ?>
                            <i class="fa fa-phone-alt me-2"></i><?= is_array($value) ? $value['phone'] : $value->phone ?>
                            <i class="fa fa-envelope me-2"></i><?= is_array($value) ? $value['email'] : $value->email ?>
                        </small>
                </div>
            </div>

            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-twitter fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-facebook-f fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-linkedin-in fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-instagram fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href=""><i class="fab fa-youtube fw-normal"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar & Carousel Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
            <a href="index.html" class="navbar-brand p-0">
                <h1 class="m-0"><i><?= is_array($value) ? $value['company'] : $value->company ?></i></h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="index.html" class="nav-item nav-link active">Home</a>
                    <a href="login" class="nav-item nav-link">Sign In / Sign Up</a>
                    <!-- <a href="service.html" class="nav-item nav-link">Services</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Blog</a>
                        <div class="dropdown-menu m-0">
                            <a href="blog.html" class="dropdown-item">Blog Grid</a>
                            <a href="detail.html" class="dropdown-item">Blog Detail</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu m-0">
                            <a href="price.html" class="dropdown-item">Pricing Plan</a>
                            <a href="feature.html" class="dropdown-item">Our features</a>
                            <a href="team.html" class="dropdown-item">Team Members</a>
                            <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                            <a href="quote.html" class="dropdown-item">Free Quote</a>
                        </div>
                    </div>
                    <a href="contact.html" class="nav-item nav-link">Contact</a> -->
                </div>
                <!-- <butaton type="button" class="btn text-primary ms-3" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></butaton> -->
            </div>
        </nav>

        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <div class="d-flex justify-content-center">
                    <img class="img-fluid w-50" src="template/afna.jpg" alt="Image">
                </div>
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h1 class="text-white text-uppercase mb-3 animated slideInDown"><?= is_array($value) ? $value['company'] : $value->company ?></h1>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn"><?= is_array($value) ? $value['tagline'] : $value->tagline ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      <?php endforeach; ?>
    </div>
    <!-- Navbar & Carousel End -->


    <!-- Full Screen Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="text" class="form-control bg-transparent border-primary p-3" placeholder="Type search keyword">
                        <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Full Screen Search End -->


    <!-- Facts Start -->
    <div class="container-fluid facts py-5 pt-lg-0">
        <div class="container py-5 pt-lg-0">
            <div class="row gx-0">
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.1s">
                    <div class="bg-primary shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                        <div class="bg-white d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                            <i class="fa fa-users text-primary"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-white mb-0">Happy Clients</h5>
                            <h1 class="text-white mb-0" data-toggle="counter-up">12345</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.3s">
                    <div class="bg-light shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                            <i class="fa fa-check text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-primary mb-0">Projects Done</h5>
                            <h1 class="mb-0" data-toggle="counter-up">12345</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.6s">
                    <div class="bg-primary shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                        <div class="bg-white d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                            <i class="fa fa-award text-primary"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-white mb-0">Win Awards</h5>
                            <h1 class="text-white mb-0" data-toggle="counter-up">12345</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Facts Start -->


    <!-- About Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <?php foreach ($aboutus as $key => $value) : ?>
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-7">
                        <div class="section-title position-relative pb-3 mb-5">
                            <h1 class="fw-bold text-primary text-uppercase">About Us</h1>
                        </div>
                        <p class="mb-4" style="text-align: justify;">
                            <?= is_array($value) ? $value['description'] : $value->description ?>
                        </p>
                    </div>
                    <div class="col-lg-5" style="min-height: 100px;">
                        <div class="position-relative h-100">
                            <img class="img-fluid rounded wow zoomIn" data-wow-delay="0.9s" src="<?= base_url('template/wifi.png'); ?>" style="object-fit: contain;">
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- About End -->

    <!-- About Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <!-- Visions Section -->
                <div class="col-lg-6">
                    <div class="section-title position-relative pb-3 mb-5">
                        <h1 class="fw-bold text-primary text-uppercase">Visions & Missions</h1>
                    </div>
                    <?php foreach ($vision as $key => $value) : ?>
                        <h4>Visions</h4>
                        <p class="mb-4" style="text-align: justify;">
                            <?= is_array($value) ? $value['description'] : $value->description ?>
                        </p>
                        <img class="rounded wow zoomIn img-fluid" data-wow-delay="0.9s" src="<?= base_url('template/vm.png'); ?>" style="object-fit: contain;">
                    <?php endforeach; ?>
                </div>

                <!-- Missions Section -->
                <div class="col-lg-6">
                    <div class="position-relative h-100">
                        <br><br><br>
                        <h4 class="mt-5">Missions</h4>
                        <?php foreach ($missions as $key => $value) : ?>
                            <p class="mb-4" style="text-align: justify;">
                                ✔️ <?= is_array($value) ? $value['description'] : $value->description ?>
                            </p>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Features Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h1 class="fw-bold text-primary text-uppercase">Key Features</h1>
            </div>
            <div class="row g-4 justify-content-center">
                <?php foreach ($keys as $key => $value) : ?>
                    <div class="col-md-4 col-sm-6 col-12 wow zoomIn" data-wow-delay="0.2s">
                        <div class="d-flex flex-column align-items-center text-center">
                            <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="<?= is_array($value) ? $value['icon'] : $value->icon ?> text-white"></i>
                            </div>
                            <p class="mb-4" style="text-align: justify;">
                                <?= is_array($value) ? $value['description'] : $value->description ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!-- Features Start -->


    <!-- Service Start -->
    <div class="container py-5">
        <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            <h1 class="fw-bold text-primary text-uppercase">Product And Solutions</h1>
        </div>
        <div class="row g-5">
            <?php 
            $processedCategories = []; // Array untuk menyimpan kategori yang sudah diproses
            foreach ($kategori_layanan as $item) : 
                // Cek apakah kategori sudah pernah diproses
                if (in_array($item['title'], $processedCategories)) {
                    continue; // Lewatkan kategori yang sudah diproses
                }
                // Tambahkan kategori yang sedang diproses ke dalam array
                $processedCategories[] = $item['title'];
            ?>
                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.3s">
                    <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon">
                            <i class="<?= $item['icon'] ?> text-white"></i>
                        </div>
                        <h4 class="mb-3"><?= $item['title'] ?></h4>
                        <p class="m-0"><?= $item['description'] ?></p>
                        <?php if (isset($item['id_layanan_isp'])): ?>
                            <a class="btn btn-lg btn-primary rounded" href="<?= base_url('welcome/detail_service/' . $item['id_layanan_isp']) ?>">
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        <?php else: ?>
                            <span class="btn btn-lg btn-secondary rounded">No Service Available</span>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <!-- Service End -->


    <!-- Pricing Plan Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h1 class="mb-0">Internet Service Provider</h1>
            </div>
            <div class="row g-4">
                <?php foreach ($layanan as $key => $value) : ?>
                    <div class="col-lg-4 col-md-6 wow slideInUp" data-wow-delay="0.<?= $key + 1 ?>s">
                        <div class="bg-light rounded h-100">
                            <div class="border-bottom py-4 px-5 mb-4">
                                <h4 class="text-primary mb-1">
                                    <?= is_array($value) ? $value['title'] : $value->title ?>
                                </h4>
                                <small class="text-uppercase">
                                    <?= is_array($value) ? $value['description'] : $value->description ?>
                                </small>
                            </div>
                            <div class="p-5 pt-0">
                                <h1 class="display-5 mb-3">
                                    <small class="align-top" style="font-size: 22px; line-height: 45px;">Rp. </small>
                                    <?= is_array($value) ? number_format($value['price'], 0, ',', '.') : number_format($value->price, 0, ',', '.') ?>
                                    <small class="align-bottom" style="font-size: 16px; line-height: 40px;">/ Month</small>
                                </h1>

                                <!-- Tampilkan Features dari JSON -->
                                <h5 class="mt-4">Features:</h5>
                                <ul class="list-unstyled">
                                    <?php 
                                        $features = is_array($value) ? $value['features'] : $value->features;
                                        $featuresArray = json_decode($features, true); // Decode JSON menjadi array
                                        if (!empty($featuresArray)) :
                                            foreach ($featuresArray as $feature) :
                                    ?>
                                        <li><i class="fa fa-check text-primary"></i> <?= htmlspecialchars($feature) ?></li>
                                    <?php 
                                            endforeach;
                                        else :
                                    ?>
                                        <li><i class="fa fa-times text-danger"></i> No features available</li>
                                    <?php endif; ?>
                                </ul>
                                
                                <a href="" class="btn btn-primary py-2 px-4 mt-4">Order Now</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!-- Pricing Plan End -->


    <!-- Quote Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title position-relative pb-3 mb-5">
                        <h1 class="fw-bold text-primary text-uppercase">Need A Free Quote? Please Feel Free to Contact Us</h1>
                    </div>
                    <div class="row gx-3">
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                            <h5 class="mb-4"><i class="fa fa-reply text-primary me-3"></i>Reply within 24 hours</h5>
                        </div>
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                            <h5 class="mb-4"><i class="fa fa-phone-alt text-primary me-3"></i>24 hrs telephone support</h5>
                        </div>
                    </div>

                    <!-- WhatsApp Icon with Link -->
                    <div class="d-flex align-items-center mt-4 wow zoomIn" data-wow-delay="0.8s">
                        <div class="bg-success d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                            <!-- WhatsApp Icon -->
                            <img src="<?= base_url('template/wa.png'); ?>" alt="WhatsApp" style="width: 80px; height: 80px;">
                        </div>
                        <div class="ps-4">
                            <div class="ps-4">
                                <?php if (!empty($profiles)) : ?>
                                    <!-- Mengambil nomor telepon dari profil pertama jika ada lebih dari satu -->
                                    <h5 class="mb-2">Chat with us on WhatsApp</h5>
                                    <a href="https://wa.me/<?= is_array($profiles[0]) ? $profiles[0]['phone'] : $profiles[0]->phone ?>" target="_blank" class="text-success">
                                        <h4 class="text-success mb-0">
                                            <?= is_array($profiles[0]) ? $profiles[0]['phone'] : $profiles[0]->phone ?>
                                        </h4>
                                    </a>
                                <?php else : ?>
                                    <!-- Menampilkan pesan jika profil tidak ada -->
                                    <p>No contact number available.</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="bg-primary rounded h-100 d-flex align-items-center p-5 wow zoomIn" data-wow-delay="0.9s">
                        <form>
                            <div class="row g-3">
                                <div class="col-xl-12">
                                    <input type="text" class="form-control bg-light border-0" placeholder="Your Name" style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <input type="email" class="form-control bg-light border-0" placeholder="Your Email" style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <select class="form-select bg-light border-0" style="height: 55px;">
                                        <option selected>Select A Service</option>
                                        <option value="1">Service 1</option>
                                        <option value="2">Service 2</option>
                                        <option value="3">Service 3</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control bg-light border-0" rows="3" placeholder="Message"></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-dark w-100 py-3" type="submit">Request A Quote</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quote End -->

    <!-- Vendor Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5 mb-5">
            <div class="bg-white">
                <div class="owl-carousel vendor-carousel">
                    <img src="template/img/vendor-1.jpg" alt="">
                    <img src="template/img/vendor-2.jpg" alt="">
                    <img src="template/img/vendor-3.jpg" alt="">
                    <img src="template/img/vendor-4.jpg" alt="">
                    <img src="template/img/vendor-5.jpg" alt="">
                    <img src="template/img/vendor-6.jpg" alt="">
                    <img src="template/img/vendor-7.jpg" alt="">
                    <img src="template/img/vendor-8.jpg" alt="">
                    <img src="template/img/vendor-9.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->
    

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light mt-5 wow fadeInUp" data-wow-delay="0.1s">
        <?php foreach ($profiles as $key => $value) : ?>
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-4 col-md-6 footer-about">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center h-100 bg-primary p-4">
                        <a href="index.html" class="navbar-brand">
                            <h1 class="m-0 text-white"><i class="fa fa-user-tie me-2"></i><?= is_array($value) ? $value['company'] : $value->company ?></h1>
                        </a>
                        <p class="mt-3 mb-4"><?= is_array($value) ? $value['tagline'] : $value->tagline ?></p>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6">
                    <div class="row gx-5">
                        <div class="col-lg-4 col-md-12 pt-5 mb-5">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">Address</h3>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-geo-alt text-primary me-2"></i>
                                <p class="mb-0"><?= is_array($value) ? $value['address'] : $value->address ?></p>
                            </div>
                            <div class="d-flex mt-4">
                                <a class="btn btn-primary btn-square me-2" href="#"><i class="fab fa-twitter fw-normal"></i></a>
                                <a class="btn btn-primary btn-square me-2" href="#"><i class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-primary btn-square me-2" href="#"><i class="fab fa-linkedin-in fw-normal"></i></a>
                                <a class="btn btn-primary btn-square" href="#"><i class="fab fa-instagram fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">Email</h3>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-geo-alt text-primary me-2"></i>
                                <p class="mb-0"><?= is_array($value) ? $value['email'] : $value->email ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">Phone</h3>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-geo-alt text-primary me-2"></i>
                                <p class="mb-0"><?= is_array($value) ? $value['phone'] : $value->phone ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <div class="container-fluid text-white" style="background: #061429;">
        <div class="container text-center">
            <div class="row justify-content-end">
                <div class="col-lg-8 col-md-6">
                    <div class="d-flex align-items-center justify-content-center" style="height: 75px;">
                        <p class="mb-0">&copy; <a class="text-white border-bottom" href="#">PT. AFNA DIGITAL INDONESIA</a> <?= date('Y'); ?>. All Rights Reserved.</p> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('template/assets/assets/lib/wow/wow.min.js'); ?>"></script>
    <script src="<?= base_url('template/assets/assets/lib/easing/easing.min.js'); ?>"></script>
    <script src="<?= base_url('template/assets/assets/lib/waypoints/waypoints.min.js'); ?>"></script>
    <script src="<?= base_url('template/assets/assets/lib/counterup/counterup.min.js'); ?>"></script>
    <script src="<?= base_url('template/assets/assets/lib/owlcarousel/owl.carousel.min.js'); ?>"></script>

    <!-- Template Javascript -->
    <script src="<?= base_url('template/assets/assets/js/main.js'); ?>"></script>

</body>

</html>