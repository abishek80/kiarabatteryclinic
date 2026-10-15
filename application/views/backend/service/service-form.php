<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="serviceForm" method="post" class="card p-4" enctype="multipart/form-data">
            <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center border-bottom mb-4 pb-3 sticky-head">
                <div class="d-flex gap-2 align-items-center">
                    <a href="<?php echo base_url(); ?>admin/service/service-list" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <h4 class="fw-bold mb-0 text-dark"><?php echo $formTitle; ?></h4>
                </div>
                <div class="d-flex gap-3 justify-content-end">
                    <a href="<?php echo base_url(); ?>admin/service/service-list" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save Service</button>
                </div>
            </div>

            <input name="service_id" id="service_id" type="hidden" class="form-control" value="<?php echo $serviceId; ?>">
            <input name="token" id="token" type="hidden" class="form-control" value="<?php echo $serviceToken; ?>">

            <!-- 1. Basic Service Information -->
            <div class="row g-3 mb-4">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <label class="w-100 fw-bold text-dark mb-2 fs-14px">Service Name <span class="text-danger">*</span></label>
                    <input name="service_name" id="service_name" type="text" class="form-control generate_token" placeholder="Enter Service Name" value="<?php echo $serviceName; ?>">
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <label class="fw-bold text-dark mb-2 fs-14px">Service Image</label>
                        <?php if($serviceImg) { ?>
                            <a href="<?php echo base_url() . $serviceImg; ?>" data-lightbox="roadtrip" class="text-primary fs-14px"><i class="bx bx-show-alt"></i> Preview</a>
                        <?php } ?>
                    </div>
                    <input name="service_img" id="service_img" type="file" class="form-control" accept="image/*">
                    <input type="hidden" value="<?php echo $serviceImg; ?>" name="alter_service_img">
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <label class="w-100 fw-bold text-dark mb-2 fs-14px">Status</label>
                    <select name="status" id="status" class="form-select">
                        <option value="active" <?php if($status == 'active') { echo 'selected'; } ?>>Active</option>
                        <option value="inactive" <?php if($status == 'inactive') { echo 'selected'; } ?>>Inactive</option>
                    </select>
                </div>
                <div class="col-12">
                    <label class="w-100 fw-bold text-dark mb-2 fs-14px">Short Description <span class="text-danger">*</span></label>
                    <input name="short_description" id="short_description" type="text" class="form-control" placeholder="Enter Short Description (shown in service list)" value="<?php echo $shortDescription; ?>">
                </div>
                <div class="col-12">
                    <label class="w-100 fw-bold text-dark mb-2 fs-14px">Main Overview Description <span class="text-danger">*</span></label>
                    <textarea name="description" id="description" class="form-control" style="min-height: 120px;" placeholder="Enter detailed main overview description"><?php echo $description; ?></textarea>
                </div>
            </div>

            <!-- 2. Feature Cards (2 Cards: Problem Solved & What You Get) -->
            <div class="row g-3 mb-4">
                <div class="col-12"><h5 class="fw-bold text-primary border-bottom pb-3 mb-0"><i class="bx bx-card me-1"></i> Highlights & Feature Cards (2 Cards)</h5></div>
                <div class="col-lg-6 col-md-12">
                    <div class="border rounded p-3 bg-white shadow-none">
                        <h6 class="fw-bold text-dark mb-2"><i class="bx bx-error-circle text-warning me-1"></i> Card 1 (e.g. The Problem We Solve)</h6>
                        <div class="mb-3">
                            <label class="fw-bold text-dark mb-1 fs-14px">Card 1 Title</label>
                            <input name="card1_title" id="card1_title" type="text" class="form-control" placeholder="e.g. The problem we solve" value="<?php echo $card1Title; ?>">
                        </div>
                        <div>
                            <label class="fw-bold text-dark mb-1 fs-14px">Card 1 Description</label>
                            <textarea name="card1_description" id="card1_description" class="form-control" rows="3" placeholder="Explain the problem or customer pain point"><?php echo $card1Description; ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="border rounded p-3 bg-white shadow-none">
                        <h6 class="fw-bold text-dark mb-2"><i class="bx bx-check-circle text-success me-1"></i> Card 2 (e.g. What You Get)</h6>
                        <div class="mb-3">
                            <label class="fw-bold text-dark mb-1 fs-14px">Card 2 Title</label>
                            <input name="card2_title" id="card2_title" type="text" class="form-control" placeholder="e.g. What you get" value="<?php echo $card2Title; ?>">
                        </div>
                        <div>
                            <label class="fw-bold text-dark mb-1 fs-14px">Card 2 Description</label>
                            <textarea name="card2_description" id="card2_description" class="form-control" rows="3" placeholder="Explain the solution or value delivered"><?php echo $card2Description; ?></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 3. Our Service Process -->
            <div class="row g-3 mb-4">
                <div class="col-12"><h5 class="fw-bold mb-0 text-primary border-bottom pb-3"><i class="bx bx-list-ol me-1"></i> Our Service Process</h5></div>
                <div class="col-12">
                    <label class="w-100 fw-bold text-dark mb-2 fs-14px">Process Steps (Enter each step on a new line)</label>
                    <textarea name="process_steps" id="process_steps" class="form-control" rows="4" placeholder="Step 1: Call or WhatsApp us with your vehicle/power issue&#10;Step 2: We confirm your location and dispatch a technician&#10;Step 3: On-site testing to confirm actual fault&#10;Step 4: Genuine battery fitted with warranty"><?php echo $processSteps; ?></textarea>
                    <small class="text-muted">Enter each step on a new line. They will be displayed as an ordered step-by-step list on the service detail page.</small>
                </div>
            </div>

            <!-- 4. Common Questions (FAQs) -->
            <div class="row g-3 mb-4">
                <div class="col-12 d-flex justify-content-between align-items-center border-bottom pb-3 mb-1">
                    <div>
                        <h5 class="fw-bold text-primary mb-1"><i class="bx bx-help-circle me-1"></i> Common Questions / FAQs</h5>
                        <p class="text-muted fs-13px mb-0">Add questions and answers for customer reference on the service detail page.</p>
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-primary fw-bold" id="addFaqBtn">
                        <i class="bx bx-plus me-1"></i> Add Question
                    </button>
                </div>
                <div class="col-12">
                    <!-- Column Header (Desktop) -->
                    <div class="d-none d-md-flex row g-2 px-2 text-muted fs-13px fw-bold text-uppercase mb-2">
                        <div class="col-auto text-center" style="width: 45px;">#</div>
                        <div class="col-md-5">Question</div>
                        <div class="col-md-5">Answer</div>
                        <div class="col-md-auto ms-auto text-end" style="width: 40px;"></div>
                    </div>

                    <div id="faqContainer">
                        <?php 
                            if (!empty($faqsList) && is_array($faqsList)) {
                                foreach ($faqsList as $index => $faqItem) {
                        ?>
                            <div class="faq-item p-2 mb-2 rounded border bg-white shadow-none">
                                <div class="row g-2 align-items-center">
                                    <div class="col-auto text-center" style="width: 45px;">
                                        <span class="badge bg-label-primary px-2 py-1 faq-badge">#<span class="faq-number"><?php echo $index + 1; ?></span></span>
                                    </div>
                                    <div class="col-md-5 col-12">
                                        <input type="text" name="faq_question[]" class="form-control" placeholder="Enter Question (e.g. Do you offer doorstep replacement?)" value="<?php echo isset($faqItem['question']) ? htmlspecialchars($faqItem['question']) : ''; ?>">
                                    </div>
                                    <div class="col-md-5 col-12">
                                        <textarea name="faq_answer[]" class="form-control" rows="1" placeholder="Enter Answer" style="min-height: 38px; resize: vertical;"><?php echo isset($faqItem['answer']) ? htmlspecialchars($faqItem['answer']) : ''; ?></textarea>
                                    </div>
                                    <div class="col-md-auto col-12 ms-auto text-end">
                                        <button type="button" class="btn btn-outline-danger btn-sm remove-faq-btn" title="Remove Question">
                                            <i class="bx bx-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <?php 
                                }
                            } else {
                        ?>
                            <!-- Default Initial Empty FAQ Item -->
                            <div class="faq-item p-2 mb-2 rounded border bg-white shadow-none">
                                <div class="row g-2 align-items-center">
                                    <div class="col-auto text-center" style="width: 45px;">
                                        <span class="badge bg-label-primary px-2 py-1 faq-badge">#<span class="faq-number">1</span></span>
                                    </div>
                                    <div class="col-md-5 col-12">
                                        <input type="text" name="faq_question[]" class="form-control" placeholder="Enter Question (e.g. Do you offer doorstep replacement?)">
                                    </div>
                                    <div class="col-md-5 col-12">
                                        <textarea name="faq_answer[]" class="form-control" rows="1" placeholder="Enter Answer" style="min-height: 38px; resize: vertical;"></textarea>
                                    </div>
                                    <div class="col-md-auto col-12 ms-auto text-end">
                                        <button type="button" class="btn btn-outline-danger btn-sm remove-faq-btn" title="Remove Question">
                                            <i class="bx bx-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

        </form>
    </div>
</section>

<!-- Dynamic FAQ Repeater Script -->
<script>
    $(document).ready(function() {
        // Function to update FAQ numbers
        function updateFaqNumbers() {
            $('.faq-item').each(function(index) {
                $(this).find('.faq-number').text(index + 1);
            });
        }

        // Add FAQ Item
        $('#addFaqBtn').click(function() {
            var count = $('.faq-item').length + 1;
            var faqHtml = `
                <div class="faq-item p-2 mb-2 rounded border bg-white shadow-none" style="display:none;">
                    <div class="row g-2 align-items-center">
                        <div class="col-auto text-center" style="width: 45px;">
                            <span class="badge bg-label-primary px-2 py-1 faq-badge">#<span class="faq-number">${count}</span></span>
                        </div>
                        <div class="col-md-5 col-12">
                            <input type="text" name="faq_question[]" class="form-control" placeholder="Enter Question">
                        </div>
                        <div class="col-md-5 col-12">
                            <textarea name="faq_answer[]" class="form-control" rows="1" placeholder="Enter Answer" style="min-height: 38px; resize: vertical;"></textarea>
                        </div>
                        <div class="col-md-auto col-12 ms-auto text-end">
                            <button type="button" class="btn btn-outline-danger btn-sm remove-faq-btn" title="Remove Question">
                                <i class="bx bx-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            `;
            $('#faqContainer').append(faqHtml);
            $('#faqContainer .faq-item:last').fadeIn(200);
            updateFaqNumbers();
        });

        // Remove FAQ Item
        $(document).on('click', '.remove-faq-btn', function() {
            if ($('.faq-item').length > 1) {
                $(this).closest('.faq-item').fadeOut(200, function() {
                    $(this).remove();
                    updateFaqNumbers();
                });
            } else {
                $(this).closest('.faq-item').find('input, textarea').val('');
            }
        });

        // Form Validation & Submission
        $("#serviceForm").validate({
            rules: {
                service_name: {
                    required: true
                },
                short_description: {
                    required: true
                },
                description: {
                    required: true
                }
            },
            messages: {
                service_name: {
                    required: "Please enter service name"
                },
                short_description: {
                    required: "Please enter short description"
                },
                description: {
                    required: "Please enter description"
                }
            },
            submitHandler: function (form) {
                var data = new FormData($('#serviceForm').get(0));
                $.ajax({
                    url: '<?php echo base_url(); ?>admin/service/serviceFormSave',
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
                                window.location.href = "<?php echo base_url(); ?>admin/service/service-list";
                            }, 1200);
                        } else {
                            toastr.error(data.message);
                        }
                    },
                    error: function() {
                        toastr.error("An error occurred while saving the service");
                    }
                });
                return false;
            }
        });
    });
</script>