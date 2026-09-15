<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
	<meta name="author" content="Kiara Battery Clinic">
<?php 
    if (!isset($meta) || empty($meta)) {
        $meta = get_seo_meta('home');
    }
    echo render_seo_tags($meta);
    echo render_schema_jsonld($meta);
?>
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>themes/images/fav-icon.png">
	<link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&amp;family=Onest:wght@100..900&amp;display=swap" rel="stylesheet">
	<link href="<?php echo base_url(); ?>themes/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="<?php echo base_url(); ?>themes/css/slicknav.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url(); ?>themes/css/swiper-bundle.min.css">
	<link href="<?php echo base_url(); ?>themes/css/all.min.css" rel="stylesheet" media="screen">
	<link href="<?php echo base_url(); ?>themes/css/animate.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url(); ?>themes/css/magnific-popup.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>themes/css/mousecursor.css">
	<link href="<?php echo base_url(); ?>themes/css/custom.css" rel="stylesheet" media="screen">
</head>

<body>
	<div class="preloader">
		<div class="loading-container">
			<div class="loading"></div>
			<div id="loading-icon"><img src="<?php echo base_url(); ?>themes/images/fav-icon-white.png" alt="Kiara Battery Clinic Loading"></div>
		</div>
	</div>
    <div class="topbar">
        <div class="container-fluid px-lg-5">
            <div class="row align-items-center">
                <div class="col-md-9">
                    <div class="topbar-contact-info">
                        <ul>
                            <li><img src="<?php echo base_url(); ?>themes/images/icon-location.svg" alt="Kiara Battery Clinic Location - Coimbatore">Tatabad, Coimbatore - Tamil Nadu</li>
                            <li><a href="mailto:enquiry@kiarabatteryclinic.com"><img src="<?php echo base_url(); ?>themes/images/icon-mail.svg" alt="Email Kiara Battery Clinic">enquiry@kiarabatteryclinic.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="topbar-social-links">
                        <ul>
                            <li><a href="https://wa.link/w646lw" target="_blank" rel="noopener" aria-label="WhatsApp Kiara Battery Clinic"><i class="fa-brands fa-whatsapp"></i></a></li>
                            <li><a href="https://www.instagram.com/kiara_battery_clinic/" target="_blank" rel="noopener" aria-label="Instagram Kiara Battery Clinic"><i class="fa-brands fa-instagram"></i></a></li>
                            <!-- <li><a href="https://wa.link/w646lw" target="_blank" rel="noopener" aria-label="Facebook Kiara Battery Clinic"><i class="fa-brands fa-facebook-f"></i></a></li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<header class="main-header">
		<div class="header-sticky">
			<nav class="navbar navbar-expand-lg">
				<div class="container-fluid px-lg-5">
					<a class="navbar-brand" href="<?php echo base_url(); ?>">
						<img src="<?php echo base_url(); ?>themes/images/logo.png" style="width: 250px;" alt="Kiara Battery Clinic Logo - Battery Shop Coimbatore">
					</a>
					<div class="collapse navbar-collapse main-menu  ">
                        <div class="nav-menu-wrapper">
                            <?php 
                                if (!isset($serviceList) || empty($serviceList)) {
                                    $CI =& get_instance();
                                    if (isset($CI->webmodel)) {
                                        $serviceList = $CI->webmodel->serviceList();
                                    }
                                }
                            ?>
                            <ul class="navbar-nav mr-auto" id="menu">
                                <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>">Home</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>about-us">About Us</a></li>
                                <li class="nav-item submenu"><a class="nav-link" href="<?php echo base_url(); ?>services">Our Services</a>
                                    <ul>
                                        <?php 
                                            if (!empty($serviceList)) {
                                                foreach ($serviceList as $sItem) {
                                                    $sToken = !empty($sItem->token) ? $sItem->token : $sItem->id;
                                        ?>
                                            <li class="nav-item"><a class="nav-link" href="<?php echo base_url('service/' . $sToken); ?>"><?php echo htmlspecialchars($sItem->service_name); ?></a></li>
                                        <?php 
                                                }
                                            }
                                        ?>
                                    </ul>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>gallery">Gallery</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>testimonials">Testimonials</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>contact-us">Contact Us</a></li>
                            </ul>
                        </div>
                        <div class="header-contact-btn">
                            <a href="tel:+919003811107" class="header-contact-now"><img src="<?php echo base_url(); ?>themes/images/icon-phone.svg" alt="Kiara Battery Clinic Call">+91 90038 11107</a>
                            <a href="javascript:void(0);" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" class="btn-default">enquiry now</a>
                        </div>
					</div>
					<div class="navbar-toggle"></div>
				</div>
			</nav>
			<div class="responsive-menu"></div>
		</div>
	</header>