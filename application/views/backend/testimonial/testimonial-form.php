<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="testimonialForm" method="post" class="card p-3" enctype="multipart/form-data">
            <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center border-bottom mb-3 pb-3 sticky-head">
                <div class="d-flex gap-2 align-items-center">
                    <a href="<?php echo base_url(); ?>admin/testimonial/testimonial-list" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <h4 class="fw-bold mb-0 text-dark"><?php echo $formTitle; ?></h4>
                </div>
                <div class="d-flex gap-3 justify-content-end">
                    <a href="<?php echo base_url(); ?>admin/testimonial/testimonial-list" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save Testimonial</button>
                </div>
            </div>
            <input name="testimonial_id" id="testimonial_id" type="hidden" class="form-control" value="<?php echo $testimonialId; ?>">
            <input name="token" id="token" type="hidden" class="form-control" value="<?php echo $testimonialToken; ?>">
            
            <div class="row g-3">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <label class="w-100 fw-bold text-dark mb-2 fs-14px">Testimonial Title / Headline <span class="text-danger">*</span></label>
                    <input name="title" id="title" type="text" class="form-control" placeholder="Enter Title (e.g. Fast Emergency Car Battery Service!)" value="<?php echo htmlspecialchars($title); ?>" required>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <label class="w-100 fw-bold text-dark mb-2 fs-14px">Reviewer Name <span class="text-danger">*</span></label>
                    <input name="reviewer_name" id="reviewer_name" type="text" class="form-control" placeholder="Enter Reviewer Name (e.g. Karthik Subramanian)" value="<?php echo htmlspecialchars($reviewerName); ?>" required>
                </div>

                <div class="col-lg-12 col-sm-12">
                    <label class="w-100 fw-bold text-dark mb-2 fs-14px">Client Feedback / Description <span class="text-danger">*</span></label>
                    <textarea name="description" id="description" class="form-control" rows="4" placeholder="Enter full client feedback or review comment..." required><?php echo htmlspecialchars($description); ?></textarea>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <label class="w-100 fw-bold text-dark mb-2 fs-14px">Location</label>
                    <input name="location" id="location" type="text" class="form-control" placeholder="Enter Location (e.g. Peelamedu, Coimbatore)" value="<?php echo htmlspecialchars($location); ?>">
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <label class="w-100 fw-bold text-dark mb-2 fs-14px">Review Date</label>
                    <input name="review_date" id="review_date" type="date" class="form-control" value="<?php echo !empty($reviewDate) ? date('Y-m-d', strtotime($reviewDate)) : date('Y-m-d'); ?>">
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <label class="w-100 fw-bold text-dark mb-2 fs-14px">Star Rating</label>
                    <select name="star" id="star" class="form-select">
                        <option value="5" <?php echo ($star == 5) ? 'selected' : ''; ?>>5 Stars (★★★★★)</option>
                        <option value="4" <?php echo ($star == 4) ? 'selected' : ''; ?>>4 Stars (★★★★☆)</option>
                        <option value="3" <?php echo ($star == 3) ? 'selected' : ''; ?>>3 Stars (★★★☆☆)</option>
                        <option value="2" <?php echo ($star == 2) ? 'selected' : ''; ?>>2 Stars (★★☆☆☆)</option>
                        <option value="1" <?php echo ($star == 1) ? 'selected' : ''; ?>>1 Star (★☆☆☆☆)</option>
                    </select>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <label class="fw-bold text-dark mb-2 fs-14px">Reviewer Image / Avatar (Optional)</label>
                        <?php if(!empty($reviewerImg)) { ?>
                            <a href="<?php echo (strpos($reviewerImg, 'http') === 0) ? $reviewerImg : base_url() . $reviewerImg; ?>" target="_blank" class="text-primary fs-14px fw-bold"><i class="bx bx-show-alt me-1"></i> Preview Current Image</a>
                        <?php } ?>
                    </div>
                    <input name="reviewer_img" id="reviewer_img" type="file" class="form-control" accept="image/*">
                    <input type="hidden" value="<?php echo $reviewerImg; ?>" name="alter_reviewer_img">
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <label class="w-100 fw-bold text-dark mb-2 fs-14px">Status</label>
                    <select name="status" id="status" class="form-select">
                        <option value="active" <?php echo ($status == 'active') ? 'selected' : ''; ?>>Active</option>
                        <option value="inactive" <?php echo ($status == 'inactive') ? 'selected' : ''; ?>>Inactive</option>
                    </select>
                </div>
            </div>
        </form>
    </div>
</section>

<script>
    // Testimonial Form Save AJAX Handler
    $("#testimonialForm").validate({
        rules: {
            title: {
                required: true
            },
            reviewer_name: {
                required: true
            },
            description: {
                required: true
            }
        },
        messages: {
            title: {
                required: "Please enter testimonial title"
            },
            reviewer_name: {
                required: "Please enter reviewer name"
            },
            description: {
                required: "Please enter client feedback"
            }
        },
        submitHandler: function (form) {
            var data = new FormData($('#testimonialForm').get(0));
            $.ajax({
                url: '<?php echo base_url(); ?>admin/testimonial/testimonialFormSave',
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
                            window.location.href = '<?php echo base_url(); ?>admin/testimonial/testimonial-list';
                        }, 1000);
                    } else {
                        toastr.error(data.message);
                    }
                },
                error: function() {
                    toastr.error("An error occurred while saving the testimonial");
                }
            });
            return false;
        }
    });
</script>
