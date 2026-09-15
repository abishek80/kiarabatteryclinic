

<div class="bg-theme page-header bg-section dark-section">
    <div class="container-fluid px-lg-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header-box">
                    <h1 class="text-anime-style-2" data-cursor="-opaque">Customer Reviews <br> - Kiara Battery Clinic, Coimbatore</h1>
                    <nav class="wow fadeInUp">
                        <ol class="breadcrumb mt-4">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Testimonials</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-testimonials">
    <div class="container-fluid px-lg-5">

        <!-- Section Intro -->
        <div class="row section-row mb-4">
            <div class="col-lg-12">
                <div class="section-title section-title-center wow fadeInUp">
                    <h3>What Our Customers Say</h3>
                    <h2>Real reviews from real customers across <span>Coimbatore & Tamil Nadu</span></h2>
                    <p>We have proudly served thousands of customers across Coimbatore, Ooty, Pollachi, Tiruppur and Kotagiri. Read what they have to say about our battery, UPS, inverter and solar services.</p>
                </div>
            </div>
        </div>

        <?php 
            if (!isset($testimonialList) || empty($testimonialList)) {
                $CI =& get_instance();
                if (isset($CI->webmodel)) {
                    $testimonialList = $CI->webmodel->testimonialList();
                }
            }
        ?>
        <div class="row">
            <?php if(!empty($testimonialList)): ?>
                <?php foreach($testimonialList as $index => $row): ?>
                    <?php 
                        $delay = ($index % 3) * 0.2;
                        $img_src = !empty($row->reviewer_img) 
                            ? ((strpos($row->reviewer_img, 'http') === 0 || strpos($row->reviewer_img, './') === 0 || strpos($row->reviewer_img, 'uploads/') === 0) 
                                ? base_url(ltrim($row->reviewer_img, './')) 
                                : base_url('uploads/testimonials/' . $row->reviewer_img))
                            : base_url('themes/images/author-' . (($index % 4) + 1) . '.jpg');
                        $stars = (int)($row->star ?? 5);
                        $timeline = !empty($row->location) ? $row->location : (!empty($row->review_date) ? date('M Y', strtotime($row->review_date)) : 'Verified Customer');
                    ?>
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="testimonial-item wow fadeInUp" data-wow-delay="<?php echo $delay; ?>s">
                            <div class="testimonial-quote">
                                <img src="<?php echo base_url(); ?>themes/images/testimonial-quote.svg" alt="Customer review quote">
                            </div>
                            <div class="testimonial-content">
                                <?php if(!empty($row->title)): ?>
                                    <h5 class="fw-bold mb-2 text-dark"><?php echo htmlspecialchars($row->title); ?></h5>
                                <?php endif; ?>
                                <p><?php echo htmlspecialchars($row->description); ?></p>
                                <div class="my-2 text-warning">
                                    <?php 
                                        for($s = 1; $s <= 5; $s++) {
                                            echo ($s <= $stars) ? '★' : '☆';
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="testimonial-body">
                                <div class="author-image">
                                    <figure class="image-anime">
                                        <img src="<?php echo $img_src; ?>" alt="<?php echo htmlspecialchars($row->reviewer_name); ?> - Customer Review">
                                    </figure>
                                </div>            
                                <div class="author-content">
                                    <h3><?php echo htmlspecialchars($row->reviewer_name); ?></h3>
                                    <p class="mb-0 text-muted small"> <?php echo htmlspecialchars($timeline); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="cta-box bg-section dark-section parallaxie">
    <div class="container-fluid px-lg-5">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-7">
                <div class="cta-box-content">
                    <div class="section-title">
                        <h3 class="wow fadeInUp">Join Thousands of Satisfied Customers</h3>
                        <h2 class="text-anime-style-2" data-cursor="-opaque">Book your battery or UPS service today - <span>we come to you!</span></h2>
                        <p class="wow fadeInUp" data-wow-delay="0.2s">Fast doorstep service &nbsp;·&nbsp; Genuine products &nbsp;·&nbsp; 24/7 support &nbsp;·&nbsp; Best price guaranteed across Coimbatore, Ooty, Pollachi, Tiruppur and Kotagiri.</p>
                    </div>
                    <div class="cta-box-body wow fadeInUp" data-wow-delay="0.4s">
                        <div class="cta-box-btn">
                            <a href="tel:+91 90038 11107" class="btn-default btn-highlighted">Call Now: +91 90038 11107</a>
                        </div>
                        <span>or</span>
                        <div class="contact-now-box">
                            <div class="icon-box">
                                <img src="<?php echo base_url(); ?>themes/images/icon-phone.svg" alt="Call Kiara Battery Clinic 24/7">
                            </div>
                            <div class="contact-now-box-content">
                                <span>Send Us an Enquiry</span>
                                <p><a href="<?php echo base_url(); ?>contact-us">Contact Us →</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-5">
                <div class="cta-box-image">
                    <img src="<?php echo base_url(); ?>themes/images/cta-box-img.png" alt="Kiara Battery Clinic doorstep service - call us anytime">
                </div>
            </div>
        </div>
    </div>
</div>



<section class="our-testimonial">
    <div class="container-fluid px-lg-5">
        <div class="row section-row align-items-center">
            <div class="col-lg-6">
                <div class="section-title">
                    <h3 class="wow fadeInUp">Frequently Asked Questions</h3>
                    <h2 class="text-anime-style-2" data-cursor="-opaque">Common questions about our <span>battery & power services</span></h2>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="section-title-content wow fadeInUp" data-wow-delay="0.2s">
                    <p>Have a question about battery service, UPS installation or solar panels? Find quick answers below - or call us anytime, we're happy to help!</p>
                </div>
            </div>
        </div>

        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="faqs-image">
                    <figure class="image-anime reveal">
                        <img src="<?php echo base_url(); ?>themes/images/faqs-image.jpg" alt="FAQs - Kiara Battery Clinic Coimbatore battery UPS solar service">
                    </figure>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="faq-accordion" id="accordion">
                    <?php 
                        if (!isset($faqList) || empty($faqList)) {
                            $CI =& get_instance();
                            if (isset($CI->webmodel)) {
                                $faqList = $CI->webmodel->getFaqsByPage('testimonial');
                            }
                        }
                    ?>
                    <?php if (!empty($faqList)): ?>
                        <?php foreach ($faqList as $index => $faq): ?>
                            <?php 
                                $isFirst = ($index === 0);
                                $delay = number_format($index * 0.2, 1);
                                $qNum = 'Q' . ($index + 1) . '. ';
                                $titleText = htmlspecialchars($faq->title);
                                if (stripos($titleText, 'Q') !== 0) {
                                    $titleText = $qNum . $titleText;
                                }
                            ?>
                            <div class="accordion-item wow fadeInUp" data-wow-delay="<?php echo $delay; ?>s">
                                <h2 class="accordion-header" id="heading<?php echo $faq->id; ?>">
                                    <button class="accordion-button <?php echo $isFirst ? '' : 'collapsed'; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $faq->id; ?>" aria-expanded="<?php echo $isFirst ? 'true' : 'false'; ?>" aria-controls="collapse<?php echo $faq->id; ?>">
                                        <?php echo $titleText; ?>
                                    </button>
                                </h2>
                                <div id="collapse<?php echo $faq->id; ?>" class="accordion-collapse collapse <?php echo $isFirst ? 'show' : ''; ?>" aria-labelledby="heading<?php echo $faq->id; ?>" data-bs-parent="#accordion">
                                    <div class="accordion-body">
                                        <p><?php echo htmlspecialchars($faq->description); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-12">
                <div class="our-features-list">
                    <div class="features-item wow fadeInUp">
                        <div class="icon-box">
                            <img src="<?php echo base_url(); ?>themes/images/icon-features-list-1.svg" alt="24/7 emergency battery service Coimbatore">
                        </div>
                        <div class="features-item-content">
                            <h3>24/7 Emergency Service</h3>
                            <p>Dead battery at midnight? We're available round the clock for emergency doorstep battery service anywhere in Coimbatore.</p>
                        </div>
                    </div>
                    <div class="features-item wow fadeInUp" data-wow-delay="0.2s">
                        <div class="icon-box">
                            <img src="<?php echo base_url(); ?>themes/images/icon-features-list-2.svg" alt="Genuine batteries all brands Coimbatore">
                        </div>
                        <div class="features-item-content">
                            <h3>100% Genuine Products</h3>
                            <p>Only original, warranty-backed batteries and UPS products from authorized dealers - no counterfeits, ever.</p>
                        </div>
                    </div>
                    <div class="features-item wow fadeInUp" data-wow-delay="0.4s">
                        <div class="icon-box">
                            <img src="<?php echo base_url(); ?>themes/images/icon-features-list-3.svg" alt="Best price battery Coimbatore">
                        </div>
                        <div class="features-item-content">
                            <h3>Best Price Guaranteed</h3>
                            <p>We offer the most competitive prices on batteries, UPS systems and solar installations in Coimbatore - no hidden charges.</p>
                        </div>
                    </div>
                    <div class="features-item wow fadeInUp" data-wow-delay="0.6s">
                        <div class="icon-box">
                            <img src="<?php echo base_url(); ?>themes/images/icon-features-list-4.svg" alt="All battery types serviced Coimbatore">
                        </div>
                        <div class="features-item-content">
                            <h3>All Brands & All Types Serviced</h3>
                            <p>From two-wheelers to heavy trucks, home inverters to industrial UPS - we service, repair and replace all battery types.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>