<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="productForm" method="post" class="card p-3">
            <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center border-bottom mb-3 pb-3 sticky-head">
                <div class="d-flex gap-2 align-items-center">
                    <a href="<?php echo base_url(); ?>admin/product/product-list" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <h4 class="fw-bold mb-0 text-dark"><?php echo $formTitle; ?></h4>
                </div>
                <div class="d-flex gap-3 justify-content-end">
                    <a href="<?php echo base_url(); ?>admin/product/product-list" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save</button>
                </div>
            </div>
            <input name="product_id" id="product_id" type="hidden" class="form-control" value="<?php echo $productId; ?>">
            <input name="token" id="token" type="hidden" class="form-control" value="<?php echo $productToken; ?>">
            <div class="row g-3">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Category <span class="text-danger">*</span></label>
                    <select name="category_id" id="category_id" class="select2">
                        <option value="">Select Category</option>
                        <?php foreach ($categoryDropdown as $row) { ?>
                            <option value="<?php echo $row->id; ?>" <?php if ($row->id == $categoryId) { echo 'selected="true"'; } ?>><?php echo $row->category_name; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Product Name <span class="text-danger">*</span></label>
                    <input name="product_name" id="product_name" type="text" class="form-control generate_token" placeholder="Enter Product Name" value="<?php echo $productName; ?>">
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="d-flex jusify-content-between">
                        <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Product Img</label>
                        <?php if($productImg) { ?>
                            <a href="<?php echo base_url() . $productImg; ?>" data-lightbox="roadtrip"><i class="bx bx-show-alt"></i></a>
                        <?php } ?>
                    </div>
                    <input name="product_img" id="product_img" type="file" class="form-control">
                    <input type="hidden" value="<?php echo $productImg; ?>" name="alter_product_img">
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">MRP Price <span class="text-danger">*</span></label>
                    <input name="mrp_price" id="mrp_price" type="text" class="form-control decimal" placeholder="Enter MRP Price" value="<?php echo $mrpPrice; ?>">
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Product Price <span class="text-danger">*</span></label>
                    <input name="product_price" id="product_price" type="text" class="form-control decimal" placeholder="Enter Product Price" value="<?php echo $productPrice; ?>">
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">HSN / SAC <span class="text-danger">*</span></label>
                    <input name="hsn_number" id="hsn_number" type="text" class="form-control number-only" placeholder="Enter HSN / SAC" value="<?php echo $hsnNumber; ?>">
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Per / Each <span class="text-danger">*</span></label>
                    <input name="per_value" id="per_value" type="text" class="form-control" placeholder="Enter Per / Each" value="<?php echo $perValue; ?>">
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">CGST Percentage <span class="text-danger">*</span></label>
                    <input name="cgst_percentage" id="cgst_percentage" type="text" class="form-control number-only" placeholder="Enter CGST Percentage" value="<?php echo $cgstPercentage; ?>">
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">SGST Percentage <span class="text-danger">*</span></label>
                    <input name="sgst_percentage" id="sgst_percentage" type="text" class="form-control number-only" placeholder="Enter SGST Percentage" value="<?php echo $sgstPercentage; ?>">
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Status</label>
                    <select name="status" id="status" class="form-select">
                        <option value="active" <?php if($status == 'active') { echo 'selected'; } ?>>Active</option>
                        <option value="inactive" <?php if($status == 'inactive') { echo 'selected'; } ?>>Inactive</option>
                    </select>
                </div>
                <div class="col-lg-8 col-md-12">
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
    // Product Save Function
    $("#productForm").validate({
        rules: {
            category_id: {
                required: true
            },
            product_name: {
                required: true
            },
            mrp_price: {
                required: true
            },
            product_price: {
                required: true
            },
            hsn_number: {
                required: true
            },
            per_value: {
                required: true
            },
            cgst_percentage: {
                required: true
            },
            sgst_percentage: {
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
            category_id: {
                required: "Please Select Category",
            },
            product_name: {
                required: "Please Enter Product Name",
            },
            mrp_price: {
                required: "Please Enter MRP Price",
            },
            product_price: {
                required: "Please Enter Product Price",
            },
            hsn_number: {
                required: "Please Enter GST Percentage",
            },
            per_value: {
                required: "Please Enter GST Percentage",
            },
            cgst_percentage: {
                required: "Please Enter GST Percentage",
            },
            sgst_percentage: {
                required: "Please Enter GST Percentage",
            },
            short_description: {
                required: "Please Enter Short Description",
            },
            description: {
                required: "Please Enter Description",
            }
        },
        submitHandler: function (form) {
            var data = new FormData($('#productForm').get(0));
            $.ajax({
                url: '<?php echo base_url(); ?>admin/product/productFormSave',
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
                            window.location.href = "<?php echo base_url(); ?>admin/product/product-list";
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });
</script>