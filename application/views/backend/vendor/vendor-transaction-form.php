<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="transactionForm" method="post" class="card p-3">
            <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center border-bottom mb-3 pb-3 sticky-head">
                <div class="d-flex gap-2 align-items-center">
                    <a href="<?php echo base_url() . 'admin/vendor/vendor-view/' . $vendorId; ?>" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <h4 class="fw-bold mb-0 text-dark"><?php echo $formTitle; ?></h4>
                </div>
                <div class="d-flex gap-3 justify-content-end">
                    <a href="<?php echo base_url() . 'admin/vendor/vendor-view/' . $vendorId; ?>" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save</button>
                </div>
            </div>
            <input name="transaction_id" id="transaction_id" type="hidden" class="form-control" value="<?php echo $transactionId; ?>">
            <input name="vendor_id" id="vendor_id" type="hidden" class="form-control" value="<?php echo $vendorId; ?>">
            <div class="row g-3">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Vendor Name <span class="text-danger">*</span></label>
                    <input name="vendor_name" id="vendor_name" type="text" readonly class="form-control" placeholder="Enter vendor Name" value="<?php echo $vendorName; ?>">
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Transaction Date <span class="text-danger">*</span></label>
                    <input name="transaction_date" id="transaction_date" type="text" class="form-control date-picker" placeholder="Enter Transaction Date" value="<?php echo $transactionDate; ?>">
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Transaction Number <span class="text-danger">*</span></label>
                    <input name="transaction_number" id="transaction_number" type="text" class="form-control number-only" placeholder="Enter Transaction Number" value="<?php echo $transactionNumber; ?>">
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Transaction Amount <span class="text-danger">*</span></label>
                    <input name="transaction_amount" id="transaction_amount" type="text" class="form-control decimal" placeholder="Enter Transaction Amount" value="<?php echo $transactionAmount; ?>">
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Transaction Method <span class="text-danger">*</span></label>
                    <select name="transaction_method" id="transaction_method" class="form-select">
                        <option value="">Select Transaction Method</option>
                        <option value="cash" <?php if($transactionMethod == 'cash') { echo 'selected'; } ?>>Cash</option>
                        <option value="upi" <?php if($transactionMethod == 'upi') { echo 'selected'; } ?>>UPI</option>
                        <option value="bank" <?php if($transactionMethod == 'bank') { echo 'selected'; } ?>>Bank</option>
                    </select>
                </div>
            </div>
        </form>
    </div>
</section>


<script>
    // Vendor Transaction Save Function
    $("#transactionForm").validate({
        rules: {
            vendor_name: {
                required: true
            },
            transaction_date: {
                required: true
            },
            transaction_number: {
                required: true
            },
            transaction_amount: {
                required: true
            },
            transaction_method: {
                required: true
            }
        },
        messages: {
            vendor_name: {
                required: "Please Enter Vendor Name",
            },
            transaction_date: {
                required: "Please Enter Transaction Date",
            },
            transaction_number: {
                required: "Please Enter Transaction Number",
            },
            transaction_mobile_number: {
                required: "Please Enter Transaction Amount",
            },
            transaction_method: {
                required: "Please Select Transaction Method",
            }
        },
        submitHandler: function (form) {
            var data = new FormData($('#transactionForm').get(0));
            $.ajax({
                url: '<?php echo base_url(); ?>admin/vendor/vendorTransactionFormSave',
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
                            window.location.href = "<?php echo base_url() . 'admin/vendor/vendor-view/' . $vendorId; ?>";
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });
</script>