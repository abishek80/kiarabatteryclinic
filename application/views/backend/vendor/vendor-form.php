<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="vendorForm" method="post" class="card p-3">
            <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center border-bottom mb-3 pb-3 sticky-head">
                <div class="d-flex gap-2 align-items-center">
                    <a href="<?php echo base_url(); ?>admin/vendor/vendor-list" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <h4 class="fw-bold mb-0 text-dark"><?php echo $formTitle; ?></h4>
                </div>
                <div class="d-flex gap-3 justify-content-end">
                    <a href="<?php echo base_url(); ?>admin/vendor/vendor-list" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save</button>
                </div>
            </div>
            <input name="vendor_id" id="vendor_id" type="hidden" class="form-control" value="<?php echo $vendorId; ?>">
            <input name="token" id="token" type="hidden" class="form-control" value="<?php echo $vendorToken; ?>">
            <div class="row g-3">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Vendor Name <span class="text-danger">*</span></label>
                    <input name="vendor_name" id="vendor_name" type="text" class="form-control generate_token" placeholder="Enter Vendor Name" value="<?php echo $vendorName; ?>">
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Vendor Email <span class="text-danger">*</span></label>
                    <input name="vendor_email" id="vendor_email" type="text" class="form-control" placeholder="Enter Vendor Email" value="<?php echo $vendorEmail; ?>">
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Vendor Mobile Number <span class="text-danger">*</span></label>
                    <input name="vendor_mobile_number" id="vendor_mobile_number" type="text" class="form-control number-only" placeholder="Enter Vendor Mobile Number" value="<?php echo $vendorMobileNumber; ?>">
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Vendor GST Number <span class="text-danger">*</span></label>
                    <input name="vendor_gst_number" id="vendor_gst_number" type="text" class="form-control" placeholder="Enter Vendor GST Number" value="<?php echo $vendorGSTNumber; ?>">
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Vendor Address 1 <span class="text-danger">*</span></label>
                    <input name="vendor_address_1" id="vendor_address_1" type="text" class="form-control" placeholder="Enter Vendor Address 1" value="<?php echo $vendorAddress1; ?>">
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Vendor Address 2</label>
                    <input name="vendor_address_2" id="vendor_address_2" type="text" class="form-control" placeholder="Enter Vendor Address 2" value="<?php echo $vendorAddress2; ?>">
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
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
    // Vendor Save Function
    $("#vendorForm").validate({
        rules: {
            vendor_name: {
                required: true
            },
            vendor_email: {
                required: true
            },
            vendor_mobile_number: {
                required: true
            },
            vendor_gst_number: {
                required: true
            },
            vendor_address_1: {
                required: true
            }
        },
        messages: {
            vendor_name: {
                required: "Please Enter Vendor Name",
            },
            vendor_email: {
                required: "Please Enter Vendor Email",
            },
            vendor_mobile_number: {
                required: "Please Enter Vendor Mobile Number",
            },
            vendor_gst_number: {
                required: "Please Enter Vendor GST Percentage",
            },
            vendor_address_1: {
                required: "Please Enter Vendor Address",
            }
        },
        submitHandler: function (form) {
            var data = new FormData($('#vendorForm').get(0));
            $.ajax({
                url: '<?php echo base_url(); ?>admin/vendor/vendorFormSave',
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
                            window.location.href = "<?php echo base_url(); ?>admin/vendor/vendor-list";
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });
</script>