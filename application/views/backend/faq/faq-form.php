<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="faqForm" method="post" class="card p-3">
            <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center border-bottom mb-3 pb-3 sticky-head">
                <div class="d-flex gap-2 align-items-center">
                    <a href="<?php echo base_url(); ?>admin/faq/faq-list" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <h4 class="fw-bold mb-0 text-dark"><?php echo $formTitle; ?></h4>
                </div>
                <div class="d-flex gap-3 justify-content-end">
                    <a href="<?php echo base_url(); ?>admin/faq/faq-list" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save FAQ</button>
                </div>
            </div>
            <input name="faq_id" id="faq_id" type="hidden" class="form-control" value="<?php echo $faqId; ?>">
            <input name="token" id="token" type="hidden" class="form-control" value="<?php echo $faqToken; ?>">
            
            <div class="row g-3">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <label class="w-100 fw-bold text-dark mb-2 fs-14px">Select Page Name <span class="text-danger">*</span></label>
                    <select name="page_name" id="page_name" class="form-select" required>
                        <option value="home" <?php echo ($pageName == 'home') ? 'selected' : ''; ?>>Home Page</option>
                        <option value="about" <?php echo ($pageName == 'about') ? 'selected' : ''; ?>>About Us Page</option>
                        <option value="services" <?php echo ($pageName == 'services') ? 'selected' : ''; ?>>Services Page</option>
                        <option value="contact" <?php echo ($pageName == 'contact') ? 'selected' : ''; ?>>Contact Us Page</option>
                        <option value="testimonial" <?php echo ($pageName == 'testimonial') ? 'selected' : ''; ?>>Testimonials Page</option>
                        <option value="terms_and_conditions" <?php echo ($pageName == 'terms_and_conditions') ? 'selected' : ''; ?>>Terms & Conditions Page</option>
                        <option value="privacy_policy" <?php echo ($pageName == 'privacy_policy') ? 'selected' : ''; ?>>Privacy Policy Page</option>
                        <option value="refund_policy" <?php echo ($pageName == 'refund_policy') ? 'selected' : ''; ?>>Refund Policy Page</option>
                        <option value="return_policy" <?php echo ($pageName == 'return_policy') ? 'selected' : ''; ?>>Return Policy Page</option>
                    </select>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <label class="w-100 fw-bold text-dark mb-2 fs-14px">Status</label>
                    <select name="status" id="status" class="form-select">
                        <option value="active" <?php echo ($status == 'active') ? 'selected' : ''; ?>>Active</option>
                        <option value="inactive" <?php echo ($status == 'inactive') ? 'selected' : ''; ?>>Inactive</option>
                    </select>
                </div>

                <div class="col-lg-12 col-sm-12">
                    <label class="w-100 fw-bold text-dark mb-2 fs-14px">FAQ Title / Question <span class="text-danger">*</span></label>
                    <input name="title" id="title" type="text" class="form-control" placeholder="Enter Question (e.g. Do you provide 24/7 doorstep battery service?)" value="<?php echo htmlspecialchars($title); ?>" required>
                </div>

                <div class="col-lg-12 col-sm-12">
                    <label class="w-100 fw-bold text-dark mb-2 fs-14px">FAQ Description / Answer <span class="text-danger">*</span></label>
                    <textarea name="description" id="description" class="form-control" rows="5" placeholder="Enter detailed answer for this FAQ..." required><?php echo htmlspecialchars($description); ?></textarea>
                </div>
            </div>
        </form>
    </div>
</section>

<script>
    // FAQ Form Save AJAX Handler
    $("#faqForm").validate({
        rules: {
            page_name: {
                required: true
            },
            title: {
                required: true
            },
            description: {
                required: true
            }
        },
        messages: {
            page_name: {
                required: "Please select a page name"
            },
            title: {
                required: "Please enter FAQ question / title"
            },
            description: {
                required: "Please enter FAQ description / answer"
            }
        },
        submitHandler: function (form) {
            var data = new FormData($('#faqForm').get(0));
            $.ajax({
                url: '<?php echo base_url(); ?>admin/faq/faqFormSave',
                data: data,
                cache: false,
                processData: false,
                contentType: false,
                method: 'POST',
                dataType: 'json',
                beforeSend: function () {
                    if (typeof $(".loader").show === 'function') {
                        $(".loader").show();
                    }
                },
                success: function (data) {
                    toastr.options = {
                        'closeButton': true,
                        'progressBar': true,
                        'positionClass': 'toast-top-right',
                        'timeOut': '3000'
                    };
                    if (data.isError == false) {
                        toastr.success(data.message);
                        setTimeout(function () {
                            window.location.href = '<?php echo base_url(); ?>admin/faq/faq-list';
                        }, 1000);
                    } else {
                        toastr.error(data.message);
                    }
                },
                error: function() {
                    toastr.error("An error occurred while saving the FAQ");
                }
            });
            return false;
        }
    });
</script>
