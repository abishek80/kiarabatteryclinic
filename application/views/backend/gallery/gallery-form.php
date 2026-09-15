<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="galleryForm" method="post" class="card p-3">
            <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center border-bottom mb-3 pb-3 sticky-head">
                <div class="d-flex gap-2 align-items-center">
                    <a href="<?php echo base_url(); ?>admin/gallery/gallery-list" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <h4 class="fw-bold mb-0 text-dark"><?php echo $formTitle; ?></h4>
                </div>
                <div class="d-flex gap-3 justify-content-end">
                    <a href="<?php echo base_url(); ?>admin/gallery/gallery-list" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save</button>
                </div>
            </div>
            <input name="gallery_id" id="gallery_id" type="hidden" class="form-control" value="<?php echo $galleryId; ?>">
            <input name="token" id="token" type="hidden" class="form-control" value="<?php echo $galleryToken; ?>">
            <div class="row g-3">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Gallery Name <span class="text-danger">*</span></label>
                    <input name="gallery_name" id="gallery_name" type="text" class="form-control generate_token" placeholder="Enter Gallery Name" value="<?php echo $galleryName; ?>">
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="d-flex jusify-content-between">
                        <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Gallery Img</label>
                        <?php if($galleryImg) { ?>
                            <a href="<?php echo base_url() . $galleryImg; ?>" data-lightbox="roadtrip"><i class="bx bx-show-alt"></i></a>
                        <?php } ?>
                    </div>
                    <input name="gallery_img" id="gallery_img" type="file" class="form-control" onchange="previewUploadImage(this, 'gallery_preview')">
                    <input type="hidden" value="<?php echo $galleryImg; ?>" name="alter_gallery_img">
                    <div class="mt-2" id="gallery_preview_container">
                        <?php if($galleryImg) { ?>
                            <img src="<?php echo base_url() . $galleryImg; ?>" id="gallery_preview" class="upload-preview" alt="Gallery Preview">
                        <?php } else { ?>
                            <img id="gallery_preview" class="upload-preview d-none" alt="Gallery Preview">
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
                <div class="col-lg-12">
                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Description <span class="text-danger">*</span></label>
                    <textarea name="description" id="description" type="text" class="form-control" style="min-height: 150px;" placeholder="Enter Description"><?php echo $description; ?></textarea>
                </div>
            </div>
        </form>
    </div>
</section>


<script>
    // Gallery Save Function
    $("#galleryForm").validate({
        rules: {
            gallery_name: {
                required: true
            },
            description: {
                required: true
            }
        },
        messages: {
            gallery_name: {
                required: "Please Enter Gallery Name",
            },
            description: {
                required: "Please Enter Description",
            }
        },
        submitHandler: function (form) {
            var data = new FormData($('#galleryForm').get(0));
            $.ajax({
                url: '<?php echo base_url(); ?>admin/gallery/galleryFormSave',
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
                            window.location.href = "<?php echo base_url(); ?>admin/gallery/gallery-list";
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });
</script>