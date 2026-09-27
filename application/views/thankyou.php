<div class="bg-theme page-header bg-section dark-section">
    <div class="container-fluid px-lg-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header-box">
                    <h1 class="text-anime-style-2" data-cursor="-opaque">Thank You for <span>Contacting Us</span></h1>
                    <nav class="wow fadeInUp">
                        <ol class="breadcrumb mt-4">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Thank You</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.thank-you-page { padding: 100px 0; }
.thank-you-box { max-width: 820px; margin: 0 auto; text-align: center; }
.thank-you-icon {
    width: 110px;
    height: 110px;
    margin: 0 auto 30px;
    border-radius: 50%;
    background: var(--accent-light-color);
    color: var(--accent-color);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 54px;
}
.thank-you-box .section-title { margin-bottom: 20px; }
.thank-you-box > p { font-size: 18px; margin-bottom: 40px; }
.thank-you-steps { margin-bottom: 50px; text-align: left; }
.thank-you-step {
    height: 100%;
    padding: 30px 25px;
    border-radius: 20px;
    background: var(--secondary-color);
}
.thank-you-step span {
    display: inline-block;
    font-family: var(--accent-font);
    font-size: 28px;
    font-weight: 700;
    color: var(--accent-color);
    margin-bottom: 10px;
}
.thank-you-step h3 { font-size: 20px; margin-bottom: 8px; }
.thank-you-step p { margin: 0; }
.thank-you-actions { display: flex; flex-wrap: wrap; gap: 15px; justify-content: center; }
@media only screen and (max-width: 767px) {
    .thank-you-page { padding: 60px 0; }
    .thank-you-icon { width: 90px; height: 90px; font-size: 44px; }
    .thank-you-box > p { font-size: 16px; }
}
</style>

<div class="thank-you-page">
    <div class="container-fluid px-lg-5">
        <div class="thank-you-box">
            <div class="thank-you-icon wow fadeInUp"><i class="fa-solid fa-check"></i></div>
            <div class="section-title">
                <h2 class="text-anime-style-2" data-cursor="-opaque">Your enquiry has been <span>received</span></h2>
            </div>
            <p class="wow fadeInUp" data-wow-delay="0.2s">Thank you for choosing Kiara Battery Clinic. Our team will call you back shortly to confirm your requirement. For urgent battery, UPS or inverter help, call or WhatsApp us directly - we are available 24/7.</p>

            <div class="row g-4 thank-you-steps">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="thank-you-step">
                        <span>01</span>
                        <h3>We review</h3>
                        <p>Our team checks the service and location you shared.</p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="thank-you-step">
                        <span>02</span>
                        <h3>We call you</h3>
                        <p>We contact you on the number you gave to confirm details.</p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="thank-you-step">
                        <span>03</span>
                        <h3>We fix it</h3>
                        <p>A technician visits or we get your order ready at the shop.</p>
                    </div>
                </div>
            </div>

            <div class="thank-you-actions wow fadeInUp" data-wow-delay="0.4s">
                <a href="tel:+919003811107" class="btn-default">Call +91 90038 11107</a>
                <a href="https://wa.link/w646lw" target="_blank" rel="noopener" class="btn-default btn-highlighted">WhatsApp Us</a>
                <a href="<?php echo base_url(); ?>" class="btn-default btn-highlighted">Back to Home</a>
            </div>
        </div>
    </div>
</div>
