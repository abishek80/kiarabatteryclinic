<div class="bg-theme page-header bg-section dark-section">
    <div class="container-fluid px-lg-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header-box">
                    <h1 class="text-anime-style-2" data-cursor="-opaque">Refund Policy</h1>
                    <nav class="wow fadeInUp">
                        <ol class="breadcrumb mt-4">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Refund Policy</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="policy-content-section py-5">
    <div class="container-fluid px-lg-5">
        <div class="card border-0 shadow-sm p-4 p-md-5 rounded-4 bg-white">
            <div class="section-title mb-4">
                <h3 class="wow fadeInUp">Refund Policy</h3>
                <h2 class="text-anime-style-2 mb-3" data-cursor="-opaque" style="font-size: 2.2rem; font-weight: 600;">Refund Rules and <span>Service Charge Policies</span></h2>
                <p class="text-muted">Last Updated: June 2026</p>
            </div>

            <div class="policy-body" style="font-size: 17px; color: #555; line-height: 1.8;">
                <p>At <strong>Kiara Battery Clinic</strong>, we strive to maintain transparency in all our business transactions and doorstep services. Below are the terms under which refunds, order cancellations, and technician visiting charges are managed.</p>

                <h4 class="mt-4 pt-3 fw-bold text-dark h5 mb-3">1. Refund Eligibility</h4>
                <p>Refunds are initiated only under the following specific circumstances:</p>
                <ul class="ps-4 mb-4" style="list-style-type: disc;">
                    <li class="mb-2"><strong>Unavailability of Stock:</strong> In the rare event that the specific battery model or power unit you paid for online/in-advance is out of stock and an acceptable alternative cannot be provided.</li>
                    <li class="mb-2"><strong>Pre-Dispatch Cancellation:</strong> If you cancel your product order before our service van or delivery technician has departed from our store.</li>
                    <li class="mb-2"><strong>Double Payments:</strong> Any accidental duplicate transactions processed via our payment gateway or UPI system.</li>
                </ul>

                <h4 class="mt-4 pt-3 fw-bold text-dark h5 mb-3">2. Processing Timeline and Method</h4>
                <ul class="ps-4 mb-4" style="list-style-type: disc;">
                    <li class="mb-2">Approved refunds will be processed back to the customer's original mode of payment (UPI, Netbanking, Debit/Credit Card).</li>
                    <li class="mb-2">Refund transactions are typically settled and credited within <strong>5 to 7 business days</strong>, depending on bank processing schedules.</li>
                </ul>

                <h4 class="mt-4 pt-3 fw-bold text-dark h5 mb-3">3. Doorstep Visit and Service Charges</h4>
                <p>Our doorstep technician service incurs direct travel and time expenses. Therefore:</p>
                <ul class="ps-4 mb-4" style="list-style-type: disc;">
                    <li class="mb-2">If our mobile service van is dispatched to your location for emergency jump-starting, roadside assistance, or testing, and the technician successfully diagnoses that your battery is in healthy condition but you decline any further service (such as battery recharging or replacement), a nominal diagnostic/visiting fee of <strong>Rs. 150 to Rs. 300</strong> (depending on distance) will apply. This visiting fee is strictly <strong>non-refundable</strong>.</li>
                    <li class="mb-2">Once a battery has been unboxed, fitted, and successfully configured in your vehicle or home UPS system, the installation service fee component cannot be refunded.</li>
                </ul>

                <h4 class="mt-4 pt-3 fw-bold text-dark h5 mb-3">4. Contact Us for Refund Enquiries</h4>
                <p>If you have a query about a payment or need to request a refund, please contact us immediately with your invoice number:</p>
                <ul class="ps-4 mb-4" style="list-style-type: none;">
                    <li class="mb-2"><strong>Phone:</strong> <a href="tel:+919003811107" class="text-danger" style="color: var(--accent-color) !important;">+91 90038 11107</a> (Available 24/7)</li>
                    <li class="mb-2"><strong>Email:</strong> <a href="mailto:enquiry@kiarabatteryclinic.com" class="text-danger" style="color: var(--accent-color) !important;">enquiry@kiarabatteryclinic.com</a></li>
                    <li class="mb-2"><strong>Address:</strong> 36, 9th Street, Tatabad, Coimbatore - 641 012, Tamil Nadu</li>
                </ul>
            </div>
        </div>

        <?php 
            if (!isset($faqList) || empty($faqList)) {
                $CI =& get_instance();
                if (isset($CI->webmodel)) {
                    $faqList = $CI->webmodel->getFaqsByPage('refund_policy');
                }
            }
        ?>
        <?php if (!empty($faqList)): ?>
            <div class="faq-policy-section mt-5">
                <div class="card border-0 shadow-sm p-4 p-md-5 rounded-4 bg-white">
                    <div class="section-title mb-4">
                        <h3 class="wow fadeInUp" style="color: var(--accent-color);">Frequently Asked Questions</h3>
                        <h2 class="text-anime-style-2 mb-3" data-cursor="-opaque" style="font-size: 2rem; font-weight: 600;">Refund Policy <span>FAQ</span></h2>
                    </div>
                    <div class="faq-accordion" id="policyAccordion">
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
                            <div class="accordion-item border rounded-3 mb-3 p-2 wow fadeInUp" data-wow-delay="<?php echo $delay; ?>s">
                                <h2 class="accordion-header" id="headingPolicy<?php echo $faq->id; ?>">
                                    <button class="accordion-button fw-bold text-dark fs-5 <?php echo $isFirst ? '' : 'collapsed'; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePolicy<?php echo $faq->id; ?>" aria-expanded="<?php echo $isFirst ? 'true' : 'false'; ?>" aria-controls="collapsePolicy<?php echo $faq->id; ?>">
                                        <?php echo $titleText; ?>
                                    </button>
                                </h2>
                                <div id="collapsePolicy<?php echo $faq->id; ?>" class="accordion-collapse collapse <?php echo $isFirst ? 'show' : ''; ?>" aria-labelledby="headingPolicy<?php echo $faq->id; ?>" data-bs-parent="#policyAccordion">
                                    <div class="accordion-body text-secondary fs-6" style="line-height: 1.7;">
                                        <p class="mb-0"><?php echo htmlspecialchars($faq->description); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>