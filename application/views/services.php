<div class="bg-theme page-header bg-section dark-section">
    <div class="container-fluid px-lg-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header-box">
                    <h1 class="text-anime-style-2" data-cursor="-opaque">Battery, UPS & Solar Services in Coimbatore</h1>
                    <nav class="wow fadeInUp">
                        <ol class="breadcrumb mt-4">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Services</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="our-services bg-section">
    <div class="container-fluid px-lg-5">
        <div class="row section-row justify-content-center align-items-center mb-5">
            <div class="col-lg-10">
                <div class="section-title text-center">
                    <h3 class="wow fadeInUp">What We Offer</h3>
                    <h2 class="text-anime-style-2" data-cursor="-opaque">Complete power solutions for <br> <span>homes, vehicles & industries</span></h2>
                    <p class="wow fadeInUp" data-wow-delay="0.2s">From a simple bike battery replacement to a complete solar power installation - Kiara Battery Clinic covers all your power needs with expert technicians, genuine products and 24/7 doorstep service across Coimbatore, Ooty, Pollachi, Tiruppur and Kotagiri.</p>
                </div>
            </div>
        </div>
        <div class="row g-3">
            <?php 
                if (!isset($serviceList) || empty($serviceList)) {
                    $CI =& get_instance();
                    if (isset($CI->webmodel)) {
                        $serviceList = $CI->webmodel->serviceList();
                    }
                }
            ?>
            <?php if(!empty($serviceList)): ?>
                <?php foreach($serviceList as $index => $s): ?>
                    <?php 
                        $num = sprintf('%02d', $index + 1);
                        $img_src = (strpos($s->service_img, 'http') === 0 || strpos($s->service_img, 'uploads/') === 0 || strpos($s->service_img, 'themes/') === 0) 
                            ? base_url($s->service_img) 
                            : base_url('uploads/services/' . $s->service_img);
                        $sToken = !empty($s->token) ? $s->token : $s->id;
                        $detail_url = base_url('service/' . $sToken);
                    ?>
                    <div class="col-lg-4 col-md-6 mb-15px">
                        <div class="service-item">
                            <div class="service-image">
                                <a href="<?php echo $detail_url; ?>" data-cursor-text="View">
                                    <figure class="image-anime">
                                        <img src="<?php echo $img_src; ?>" alt="<?php echo htmlspecialchars($s->service_name); ?> - Kiara Battery Clinic">
                                    </figure>
                                </a>
                            </div>
                            <div class="service-no">
                                <a href="<?php echo $detail_url; ?>">
                                    <h2><?php echo $num; ?></h2>
                                </a>
                            </div>
                            <div class="service-content">
                                <h3><a href="<?php echo $detail_url; ?>"><?php echo htmlspecialchars($s->service_name); ?></a></h3>
                                <a href="<?php echo $detail_url; ?>">
                                    <p class="mb-0 three-line-clamp"><?php echo htmlspecialchars($s->short_description ?? ''); ?></p>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center py-5">
                    <p>No services found.</p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Frequently Asked Questions Section -->
        <div class="row mt-5 pt-3 justify-content-center">
            <div class="col-lg-10">
                <div class="section-title text-center mb-4">
                    <h3 class="wow fadeInUp">Frequently Asked Questions</h3>
                    <h2 class="text-anime-style-2" data-cursor="-opaque">Everything You Need to Know About <span>Battery & Power Backup</span></h2>
                </div>

                <div class="faq-accordion" id="servicesFaqAccordion">
                    <?php 
                        if (!isset($faqList) || empty($faqList)) {
                            $CI =& get_instance();
                            if (isset($CI->webmodel)) {
                                $faqList = $CI->webmodel->getFaqsByPage('services');
                            }
                        }
                    ?>
                    <?php if (!empty($faqList)): ?>
                        <?php foreach ($faqList as $index => $faq): ?>
                            <?php 
                                $isFirst = ($index === 0);
                                $delay = number_format($index * 0.2, 1);
                            ?>
                            <div class="accordion-item wow fadeInUp" data-wow-delay="<?php echo $delay; ?>s">
                                <h2 class="accordion-header" id="headingS<?php echo $faq->id; ?>">
                                    <button class="accordion-button <?php echo $isFirst ? '' : 'collapsed'; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapseS<?php echo $faq->id; ?>" aria-expanded="<?php echo $isFirst ? 'true' : 'false'; ?>" aria-controls="collapseS<?php echo $faq->id; ?>">
                                        <?php echo htmlspecialchars($faq->title); ?>
                                    </button>
                                </h2>
                                <div id="collapseS<?php echo $faq->id; ?>" class="accordion-collapse collapse <?php echo $isFirst ? 'show' : ''; ?>" aria-labelledby="headingS<?php echo $faq->id; ?>" data-bs-parent="#servicesFaqAccordion">
                                    <div class="accordion-body">
                                        <p><?php echo htmlspecialchars($faq->description); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Services CTA -->
        <div class="row mt-4">
            <div class="col-lg-12 text-center">
                <div class="section-title section-title-center mb-0 mt-3 wow fadeInUp">
                    <h3>Ready to Book a Service?</h3>
                    <h2>Call us now or send a WhatsApp message - we respond <span>instantly!</span></h2>
                    <div class="mt-4">
                        <a href="tel:+919003811107" class="btn-default btn-highlighted me-3">Call Now: +91 90038 11107</a>
                        <a href="https://wa.link/w646lw" class="btn-default" target="_blank" rel="noopener">WhatsApp Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>