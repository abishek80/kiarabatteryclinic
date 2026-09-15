<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="brandForm" method="post" class="card p-3" enctype="multipart/form-data">
            <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center border-bottom mb-3 pb-3 sticky-head">
                <div class="d-flex gap-2 align-items-center">
                    <a href="<?php echo base_url(); ?>admin/brand/brand-list" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <h4 class="fw-bold mb-0 text-dark"><?php echo $formTitle; ?></h4>
                </div>
                <div class="d-flex gap-3 justify-content-end">
                    <a href="<?php echo base_url(); ?>admin/brand/brand-list" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save</button>
                </div>
            </div>
            <input name="brand_id" id="brand_id" type="hidden" class="form-control" value="<?php echo $brandId; ?>">
            <input name="token" id="token" type="hidden" class="form-control" value="<?php echo $brandToken; ?>">
            <div class="row g-3">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Brand Title / Name <span class="text-danger">*</span></label>
                    <input name="brand_name" id="brand_name" type="text" class="form-control generate_token" placeholder="Enter Brand Title (e.g. Amaron, Exide, Okaya)" value="<?php echo $brandName; ?>">
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <label class="fw-13 fw-bold text-dark mb-2 fs-14px">Brand Image / Logo</label>
                        <?php if(!empty($brandImg)) { ?>
                            <a href="<?php echo base_url() . $brandImg; ?>" data-lightbox="roadtrip" class="text-primary fs-14px fw-bold"><i class="bx bx-show-alt me-1"></i> Preview Current Image</a>
                        <?php } ?>
                    </div>
                    <input name="brand_img" id="brand_img" type="file" class="form-control" accept="image/*">
                    <input type="hidden" value="<?php echo $brandImg; ?>" name="alter_brand_img">
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Status</label>
                    <select name="status" id="status" class="form-select">
                        <option value="active" <?php if($status == 'active') { echo 'selected'; } ?>>Active</option>
                        <option value="inactive" <?php if($status == 'inactive') { echo 'selected'; } ?>>Inactive</option>
                    </select>
                </div>
            </div>
        </form>
    </div>
</section>

<script>
    // Brand Form Save AJAX Handler
    $("#brandForm").validate({
        rules: {
            brand_name: {
                required: true
            }
        },
        messages: {
            brand_name: {
                required: "Please enter brand title / name"
            }
        },
        submitHandler: function (form) {
            var data = new FormData($('#brandForm').get(0));
            $.ajax({
                url: '<?php echo base_url(); ?>admin/brand/brandFormSave',
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
                            window.location.href = '<?php echo base_url(); ?>admin/brand/brand-list';
                        }, 1000);
                    } else {
                        toastr.error(data.message);
                    }
                },
                error: function() {
                    toastr.error("An error occurred while saving the brand");
                }
            });
            return false;
        }
    });
</script>
