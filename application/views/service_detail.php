<div class="bg-theme page-header bg-section dark-section">
    <div class="container-fluid px-lg-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header-box">
                    <h1 class="text-anime-style-2" data-cursor="-opaque"><?php echo !empty($serviceName) ? $serviceName : 'Battery, UPS & Solar Power Services'; ?></h1>
                    <nav class="wow fadeInUp">
                        <ol class="breadcrumb mt-4">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>services">Services</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo !empty($serviceName) ? $serviceName : 'Service Details'; ?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-service-single">
    <div class="container-fluid px-lg-5">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="page-single-sidebar">
                    <div class="mt-0 service-category-list bg-theme-light wow fadeInUp">
                        <h3 class="fw-semibold mb-4">Enquiry Now</h3>
                        <form id="contactForm" action="#" method="POST" data-toggle="validator" class="wow fadeInUp" data-wow-delay="0.4s">
                            <div class="form-group mb-3">
                                <input type="text" name="name" class="form-control rounded-3 p-3" id="name" placeholder="First name" required data-error="Please enter the first name">
                                <div class="help-block with-errors mt-1 ms-1"></div>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" name="phone" class="form-control rounded-3 p-3" id="phone" placeholder="Phone no." required data-error="Please enter the phone number">
                                <div class="help-block with-errors mt-1 ms-1"></div>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" name ="location" class="form-control rounded-3 p-3" id="location" placeholder="Location" required data-error="Please enter the location">
                                <div class="help-block with-errors mt-1 ms-1"></div>
                            </div>
                            <div class="form-group mb-4">
                                <textarea name="message" class="form-control rounded-3 p-3" id="message" rows="4" placeholder="Write message..."></textarea>
                                <div class="help-block with-errors mt-1 ms-1"></div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn-default"><span>submit message</span></button>
                                <div id="msgSubmit" class="h3 hidden"></div>
                            </div>
                        </form>
                    </div>
                    <div class="mt-5 service-category-list wow fadeInUp">
                        <h3>Our Valuable Services</h3>
                        <ul>
                            <?php if(!empty($serviceList)): ?>
                                <?php foreach($serviceList as $s): ?>
                                    <?php 
                                        $sToken = !empty($s->token) ? $s->token : $s->id;
                                        $isActive = (isset($serviceToken) && $serviceToken == $s->token) || (isset($serviceId) && $serviceId == $s->id);
                                    ?>
                                    <li>
                                        <a href="<?php echo base_url('service/' . $sToken); ?>" class="<?php echo $isActive ? 'active fw-bold' : ''; ?>">
                                            <?php echo htmlspecialchars($s->service_name); ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-md-6">
                <div class="service-single-content">
                    <div class="service-entry mt-0">
                        <h2 class="text-anime-style-2"><?php echo !empty($serviceName) ? $serviceName : 'How Our Service Works'; ?></h2>
                        <p class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;"><?php echo !empty($description) ? nl2br($description) : "Kiara Battery Clinic handles every battery, UPS, inverter and solar job with the same priority - genuine parts, correct fitment and a technician who tests before and after the job. Call or WhatsApp us and we take it from there."; ?></p>
                        
                        <!-- 2 Highlight Cards -->
                        <div class="project-result-video-content">
                            <div class="project-result-content">
                                <div class="project-result-content-item wow fadeInUp" data-wow-delay="0.2s">
                                    <h3><?php echo !empty($card1Title) ? $card1Title : 'The problem we solve'; ?></h3>
                                    <p><?php echo !empty($card1Description) ? nl2br($card1Description) : "A dead car or bike battery, a UPS that won't hold charge, or a home that needs reliable power backup - we diagnose the actual issue first instead of guessing."; ?></p>
                                </div>
                                <div class="project-result-content-item wow fadeInUp" data-wow-delay="0.4s">
                                    <h3><?php echo !empty($card2Title) ? $card2Title : 'What you get'; ?></h3>
                                    <p><?php echo !empty($card2Description) ? nl2br($card2Description) : "A genuine, correctly-matched battery or power unit installed at your doorstep, with manufacturer warranty and our own follow-up check."; ?></p>
                                </div>
                            </div>
                            <div class="project-video-box wow fadeInUp" data-wow-delay="0.6s">
                                <div class="project-video-image">
                                    <figure class="image-anime">
                                        <img src="<?php echo !empty($serviceImg) ? base_url() . $serviceImg : base_url() . 'themes/images/project-video-image.jpg'; ?>" alt="<?php echo !empty($serviceName) ? $serviceName : 'Kiara Battery Clinic Service'; ?>">
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Our Service Process -->
                    <div class="service-entry">
                        <div class="service-working-box">
                            <h2 class="text-anime-style-2 mb-4">Our Service <span>Process</span></h2>
                            <ul class="wow fadeInUp" data-wow-delay="0.4s">
                                <?php 
                                    $stepsList = array();
                                    if (!empty($processSteps)) {
                                        if (is_array($processSteps)) {
                                            $stepsList = $processSteps;
                                        } else {
                                            $decodedSteps = json_decode($processSteps, true);
                                            if (is_array($decodedSteps)) {
                                                $stepsList = $decodedSteps;
                                            } else {
                                                $stepsList = explode("\n", $processSteps);
                                            }
                                        }
                                    }

                                    if (!empty($stepsList)) {
                                        foreach ($stepsList as $step) {
                                            $stepTrim = trim($step);
                                            if (!empty($stepTrim)) {
                                                echo "<li>" . htmlspecialchars($stepTrim) . "</li>";
                                            }
                                        }
                                    } else {
                                ?>
                                    <li>Call or WhatsApp us with your vehicle, UPS or inverter issue.</li>
                                    <li>We confirm your location and dispatch a trained technician.</li>
                                    <li>On-site testing to confirm the actual fault before any replacement.</li>
                                    <li>Genuine battery or part fitted, tested and backed by manufacturer warranty.</li>
                                <?php } ?>
                            </ul>
                            <p class="wow fadeInUp" data-wow-delay="0.6s">Whether it's a bike battery, car battery, home or industrial UPS, inverter repair or solar panel installation, our technicians are trained on all major brands we stock - Amaron, Exide, Okaya, SF Sonic, Luminous, Microtek and Tata Green.</p>
                            <div class="working-box-list wow fadeInUp" data-wow-delay="0.8s">
                                <div class="working-box-item">
                                    <div class="icon-box">
                                        <img src="<?php echo base_url(); ?>themes/images/icon-working-box-1.svg" alt="Genuine battery brands Kiara Battery Clinic">
                                    </div>
                                    <div class="working-box-content">
                                        <h3>100% Genuine Products</h3>
                                        <p>Only original, warranty-backed batteries and power products from authorized brands - no counterfeits.</p>
                                    </div>
                                </div>
                                <div class="working-box-item">
                                    <div class="icon-box">
                                        <img src="<?php echo base_url(); ?>themes/images/icon-working-box-2.svg" alt="24/7 doorstep service Kiara Battery Clinic">
                                    </div>
                                    <div class="working-box-content">
                                        <h3>24/7 Doorstep Support</h3>
                                        <p>Available round the clock across Coimbatore, Ooty, Kotagiri, Pollachi and Tiruppur.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Common Questions / Dynamic FAQs -->
                    <div class="page-single-faqs">
                        <div class="section-title">
                            <h2 class="text-anime-style-2" data-cursor="-opaque">Common questions about <span>our services</span></h2>
                        </div>

                        <div class="faq-accordion" id="faqaccordion">
                            <?php 
                                $hasValidFaq = false;
                                if (!empty($faqsList) && is_array($faqsList)) {
                                    $idx = 1;
                                    foreach ($faqsList as $faq) {
                                        $q = isset($faq['question']) ? $faq['question'] : (isset($faq['q']) ? $faq['q'] : '');
                                        $a = isset($faq['answer']) ? $faq['answer'] : (isset($faq['a']) ? $faq['a'] : '');
                                        if (empty(trim($q))) continue;
                                        $hasValidFaq = true;
                                        $collapseId = "collapseFaq" . $idx;
                                        $headingId = "headingFaq" . $idx;
                                        $isFirst = ($idx === 1);
                            ?>
                                <div class="accordion-item wow fadeInUp" data-wow-delay="<?php echo ($idx * 0.2); ?>s">
                                    <h2 class="accordion-header" id="<?php echo $headingId; ?>">
                                        <button class="accordion-button <?php echo $isFirst ? '' : 'collapsed'; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $collapseId; ?>" aria-expanded="<?php echo $isFirst ? 'true' : 'false'; ?>" aria-controls="<?php echo $collapseId; ?>">
                                            <?php echo htmlspecialchars($q); ?>
                                        </button>
                                    </h2>
                                    <div id="<?php echo $collapseId; ?>" class="accordion-collapse collapse <?php echo $isFirst ? 'show' : ''; ?>" aria-labelledby="<?php echo $headingId; ?>" data-bs-parent="#faqaccordion">
                                        <div class="accordion-body">
                                            <p><?php echo nl2br(htmlspecialchars($a)); ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php 
                                        $idx++;
                                    }
                                }
                                
                                if (!$hasValidFaq) {
                            ?>
                                <div class="accordion-item wow fadeInUp">
                                    <h2 class="accordion-header" id="heading1">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                            Q1. Do you offer doorstep battery replacement in Coimbatore?
                                        </button>
                                    </h2>
                                    <div id="collapse1" class="accordion-collapse collapse" aria-labelledby="heading1" data-bs-parent="#faqaccordion">
                                        <div class="accordion-body">
                                            <p>Yes, we provide 24/7 doorstep battery replacement, testing and jumpstart service for cars and bikes across Coimbatore, Ooty, Kotagiri, Pollachi and Tiruppur.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item wow fadeInUp" data-wow-delay="0.2s">
                                    <h2 class="accordion-header" id="heading2">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                            Q2. Which battery and power brands do you service?
                                        </button>
                                    </h2>
                                    <div id="collapse2" class="accordion-collapse collapse show" aria-labelledby="heading2" data-bs-parent="#faqaccordion">
                                        <div class="accordion-body">
                                            <p>We sell and service Amaron, Exide, Okaya, SF Sonic, Luminous, Microtek and Tata Green batteries and power products for vehicles, homes and industries.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item wow fadeInUp" data-wow-delay="0.4s">
                                    <h2 class="accordion-header" id="heading3">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                            Q3. Do you install and repair home & industrial UPS or solar panels?
                                        </button>
                                    </h2>
                                    <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3" data-bs-parent="#faqaccordion">
                                        <div class="accordion-body">
                                            <p>Yes - we install and repair home UPS, industrial UPS with AMC support, inverters, and rooftop solar panel systems with government scheme assistance.</p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>