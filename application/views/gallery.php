<div class="bg-theme page-header bg-section dark-section">
    <div class="container-fluid px-lg-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header-box">
                    <h1 class="text-anime-style-2" data-cursor="-opaque">Photo Gallery <br> - Kiara Battery Clinic, Coimbatore</h1>
                    <nav class="wow fadeInUp">
                        <ol class="breadcrumb mt-4">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Gallery</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-gallery">
    <div class="container-fluid px-lg-5">
        <!-- Section Intro -->
        <div class="row section-row mb-4">
            <div class="col-lg-12">
                <div class="section-title section-title-center wow fadeInUp">
                    <h3>Our Work & Installations</h3>
                    <h2>Explore our battery replacements, inverter setups & <span>solar installations</span></h2>
                    <p>Take a look at our latest doorstep battery service calls, automotive battery replacements, home UPS installations, and solar panel setups across Coimbatore, Ooty, Pollachi, and Tiruppur.</p>
                </div>
            </div>
        </div>

        <?php 
            if (!isset($galleryList) || empty($galleryList)) {
                $CI =& get_instance();
                if (isset($CI->webmodel)) {
                    $galleryList = $CI->webmodel->galleryList();
                }
            }
        ?>

        <div class="row g-4" id="gallery-container">
            <?php if (!empty($galleryList)): ?>
                <?php foreach ($galleryList as $index => $row): ?>
                    <?php 
                        $delay = ($index % 3) * 0.2;
                        $imgUrl = (strpos($row->gallery_img, 'http') === 0) ? $row->gallery_img : base_url($row->gallery_img);
                        $title = !empty($row->gallery_name) ? htmlspecialchars($row->gallery_name) : 'Kiara Battery Clinic Service';
                        $description = !empty($row->description) ? htmlspecialchars($row->description) : '';
                    ?>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <a href="<?php echo $imgUrl; ?>" class="gallery-popup-item gallery-card card border-0 shadow-sm rounded-4 overflow-hidden h-100 text-decoration-none d-block wow fadeInUp" title="<?php echo $title; ?>" data-wow-delay="<?php echo $delay; ?>s">
                            <div class="gallery-img-wrapper position-relative overflow-hidden">
                                <img src="<?php echo $imgUrl; ?>" class="card-img-top gallery-img" alt="<?php echo $title; ?>">
                                <div class="gallery-overlay d-flex align-items-center justify-content-center">
                                    <span class="btn btn-light rounded-circle shadow-lg p-3">
                                        <i class="fa-solid fa-magnifying-glass-plus fs-4 text-theme"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="card-body p-4 bg-white">
                                <h4 class="card-title fw-bold text-dark mb-2 fs-5"><?php echo $title; ?></h4>
                                <?php if (!empty($description)): ?>
                                    <p class="card-text text-muted fs-6 mb-0"><?php echo $description; ?></p>
                                <?php endif; ?>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center py-5">
                    <div class="p-5 bg-light rounded-4">
                        <i class="fa-regular fa-image text-muted display-3 mb-3"></i>
                        <h4 class="fw-bold text-dark">No Gallery Photos Yet</h4>
                        <p class="text-muted">Check back soon for photos of our battery and solar installation projects!</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<style>
.gallery-card {
    cursor: pointer;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.gallery-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 24px rgba(0,0,0,0.12) !important;
}
.gallery-img-wrapper {
    height: 250px;
    background-color: #f8f9fa;
}
.gallery-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}
.gallery-card:hover .gallery-img {
    transform: scale(1.08);
}
.gallery-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(5, 0, 8, 0.45);
    opacity: 0;
    transition: opacity 0.3s ease;
}
.gallery-card:hover .gallery-overlay {
    opacity: 1;
}
.text-theme {
    color: var(--accent-color, #d11400) !important;
}

/* Lightbox Preview Title Centering & Spacing */
.mfp-bottom-bar {
    margin-top: 1rem !important;
    position: absolute !important;
    top: 100% !important;
    left: 0 !important;
    width: 100% !important;
    text-align: center !important;
}

.mfp-title {
    text-align: center !important;
    margin-top: 1rem !important;
    padding-right: 0 !important;
    font-size: 16px !important;
    font-weight: 500 !important;
    color: #ffffff !important;
}

.mfp-counter {
    right: 0 !important;
    top: 1rem !important;
}
</style>

<script>
document.addEventListener("DOMContentLoaded", function() {
    if (typeof $.fn.magnificPopup !== 'undefined') {
        $('#gallery-container').magnificPopup({
            delegate: '.gallery-popup-item',
            type: 'image',
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0,1]
            },
            image: {
                tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
                titleSrc: function(item) {
                    return item.el.attr('title');
                }
            },
            zoom: {
                enabled: true,
                duration: 300,
                opener: function(element) {
                    return element.find('img').length ? element.find('img') : element;
                }
            }
        });
    }
});
</script>
