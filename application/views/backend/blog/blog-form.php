<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="blogForm" method="post" class="card p-3">
            <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center border-bottom mb-3 pb-3 sticky-head">
                <div class="d-flex gap-2 align-items-center">
                    <a href="<?php echo base_url(); ?>admin/blog/blog-list" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <h4 class="fw-bold mb-0 text-dark"><?php echo $formTitle; ?></h4>
                </div>
                <div class="d-flex gap-3 justify-content-end">
                    <a href="<?php echo base_url(); ?>admin/blog/blog-list" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save</button>
                </div>
            </div>
            <input name="blog_id" id="blog_id" type="hidden" class="form-control" value="<?php echo $blogId; ?>">
            <input name="token" id="token" type="hidden" class="form-control" value="<?php echo $blogToken; ?>">
            <div class="row g-3">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Blog Date <span class="text-danger">*</span></label>
                    <input name="blog_date" id="blog_date" type="date" class="form-control" placeholder="Enter Blog Date" value="<?php echo $blogDate; ?>">
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Blog Name <span class="text-danger">*</span></label>
                    <input name="blog_name" id="blog_name" type="text" class="form-control generate_token" placeholder="Enter Blog Name" value="<?php echo $blogName; ?>">
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="d-flex jusify-content-between">
                        <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Blog Img</label>
                        <?php if($blogImg) { ?>
                            <a href="<?php echo base_url() . $blogImg; ?>" data-lightbox="roadtrip"><i class="bx bx-show-alt"></i></a>
                        <?php } ?>
                    </div>
                    <input name="blog_img" id="blog_img" type="file" class="form-control" onchange="previewUploadImage(this, 'blog_preview')">
                    <input type="hidden" value="<?php echo $blogImg; ?>" name="alter_blog_img">
                    <div class="mt-2" id="blog_preview_container">
                        <?php if($blogImg) { ?>
                            <img src="<?php echo base_url() . $blogImg; ?>" id="blog_preview" class="upload-preview" alt="Blog Preview">
                        <?php } else { ?>
                            <img id="blog_preview" class="upload-preview d-none" alt="Blog Preview">
                        <?php } ?>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Status</label>
                    <select name="status" id="status" class="form-select">
                        <option value="active" <?php if($status == 'active') { echo 'selected'; } ?>>Active</option>
                        <option value="inactive" <?php if($status == 'inactive') { echo 'selected'; } ?>>Inactive</option>
                    </select>
                </div>
                <div class="col-lg-8 col-md-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Short Description <span class="text-danger">*</span></label>
                    <input name="short_description" id="short_description" type="text" class="form-control" placeholder="Enter Short Description" value="<?php echo $shortDescription; ?>">
                </div>
                <div class="col-lg-12">
                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Description <span class="text-danger">*</span></label>
                    <textarea name="description" id="description" type="text" class="form-control" style="min-height: 150px;" placeholder="Enter Description"><?php echo $description; ?></textarea>
                </div>
            </div>
        </form>
    </div>
</section>


<script>
    // Blog Save Function
    $("#blogForm").validate({
        rules: {
            blog_date: {
                required: true
            },
            blog_name: {
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
            blog_date: {
                required: "Please Enter Blog Date",
            },
            blog_name: {
                required: "Please Enter Blog Name",
            },
            short_description: {
                required: "Please Enter Short Description",
            },
            description: {
                required: "Please Enter Description",
            }
        },
        submitHandler: function (form) {
            var data = new FormData($('#blogForm').get(0));
            $.ajax({
                url: '<?php echo base_url(); ?>admin/blog/blogFormSave',
                data: data,
                cache: false,
                processData: false,
                contentType: false,
                method: 'POST',
                dataType: 'json',
                beforeSend: function () {
                    $(".loader").show();
                },
                success: function (data) {
                    toastr.options = {
                        'closeButton': true,
                        'debug': false,
                        'newestOnTop': false,
                        'progressBar': false,
                        'positionClass': 'toast-top-right',
                        'preventDuplicates': false,
                        'showDuration': '1000',
                        'hideDuration': '1000',
                        'timeOut': '5000',
                        'extendedTimeOut': '1000',
                        'showEasing': 'swing',
                        'hideEasing': 'linear',
                        'showMethod': 'fadeIn',
                        'hideMethod': 'fadeOut',
                    }
                    if (data['isError']) {
                        toastr.error(data['message']);
                    }
                    else {
                        toastr.success(data['message']);
                        setTimeout(function () {
                            window.location.href = "<?php echo base_url(); ?>admin/blog/blog-list";
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });
</script>