<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="categoryForm" method="post" class="card p-3">
            <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center border-bottom mb-3 pb-3 sticky-head">
                <div class="d-flex gap-2 align-items-center">
                    <a href="<?php echo base_url(); ?>admin/category/category-list" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <h4 class="fw-bold mb-0 text-dark"><?php echo $formTitle; ?></h4>
                </div>
                <div class="d-flex gap-3 justify-content-end">
                    <a href="<?php echo base_url(); ?>admin/category/category-list" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save</button>
                </div>
            </div>
            <input name="category_id" id="category_id" type="hidden" class="form-control" value="<?php echo $categoryId; ?>">
            <input name="token" id="token" type="hidden" class="form-control" value="<?php echo $categoryToken; ?>">
            <div class="row g-3">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Category Name <span class="text-danger">*</span></label>
                    <input name="category_name" id="category_name" type="text" class="form-control generate_token" placeholder="Enter Category Name" value="<?php echo $categoryName; ?>">
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="d-flex jusify-content-between">
                        <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Category Img</label>
                        <?php if($categoryImg) { ?>
                            <a href="<?php echo base_url() . $categoryImg; ?>" data-lightbox="roadtrip"><i class="bx bx-show-alt"></i></a>
                        <?php } ?>
                    </div>
                    <input name="category_img" id="category_img" type="file" class="form-control">
                    <input type="hidden" value="<?php echo $categoryImg; ?>" name="alter_category_img">
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Status</label>
                    <select name="status" id="status" class="form-select">
                        <option value="active" <?php if($status == 'active') { echo 'selected'; } ?>>Active</option>
                        <option value="inactive" <?php if($status == 'inactive') { echo 'selected'; } ?>>Inactive</option>
                    </select>
                </div>
                <div class="col-12">
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
    // Category Save Function
    $("#categoryForm").validate({
        rules: {
            category_name: {
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
            category_name: {
                required: "Please Enter Category Name",
            },
            short_description: {
                required: "Please Enter Short Description",
            },
            description: {
                required: "Please Enter Description",
            }
        },
        submitHandler: function (form) {
            var data = new FormData($('#categoryForm').get(0));
            $.ajax({
                url: '<?php echo base_url(); ?>admin/category/categoryFormSave',
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
                            window.location.href = "<?php echo base_url(); ?>admin/category/category-list";
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });
</script>