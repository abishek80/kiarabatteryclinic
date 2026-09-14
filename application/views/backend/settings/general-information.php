<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="generalInfoForm" method="post" class="card p-3">
            <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center border-bottom mb-3 pb-3 sticky-head">
                <h4 class="fw-bold mb-0 text-dark">General Information</h4>
                <div class="d-flex gap-3 justify-content-end">
                    <a href="<?php echo base_url(); ?>admin/settings/general-information" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save</button>
                </div>
            </div>
            <input name="generalInfo_id" id="generalInfo_id" type="hidden" class="form-control" value="<?php echo $generalInfoId; ?>">
            <div class="row g-3">
                <div class="col-12">
                    <div class="row g-3">
                        <div class="col-lg-8">
                            <div class="row g-3">
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Company Name</label>
                                    <input name="company_name" id="company_name" type="text" class="form-control" placeholder="Enter Company Name" value="<?php echo $companyName; ?>">
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">GST Number</label>
                                    <input name="gst_number" id="gst_number" type="text" class="form-control" placeholder="Enter GST Number" value="<?php echo $gstNumber; ?>">
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Email</label>
                                    <input name="email" id="email" type="text" class="form-control" placeholder="Enter Email" value="<?php echo $email; ?>">
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Mobile Number</label>
                                    <input name="mobile_number" id="mobile_number" type="text" class="form-control" placeholder="Enter Mobile Number" value="<?php echo $mobileNumber; ?>">
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Phone Number</label>
                                    <input name="phone_number" id="phone_number" type="text" class="form-control" placeholder="Enter Phone Number" value="<?php echo $phoneNumber; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Address</label>
                            <textarea name="address" id="address" type="text" class="form-control" style="min-height: 125px;" placeholder="Enter Address"><?php echo $address; ?></textarea>
                        </div>
                        <div class="col-lg-8">
                            <div class="row g-3">
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Bank Name</label>
                                    <input name="bank_name" id="bank_name" type="text" class="form-control" placeholder="Enter Bank Name" value="<?php echo $bankName; ?>">
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Account Number</label>
                                    <input name="account_number" id="account_number" type="text" class="form-control" placeholder="Enter Account Number" value="<?php echo $accountNumber; ?>">
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Branch Name</label>
                                    <input name="branch_name" id="branch_name" type="text" class="form-control" placeholder="Enter Branch Name" value="<?php echo $branchName; ?>">
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">IFSC Code</label>
                                    <input name="ifsc_code" id="ifsc_code" type="text" class="form-control" placeholder="Enter IFSC Code" value="<?php echo $ifscCode; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Declaration Note</label>
                            <textarea name="declaration_note" id="declaration_note" type="text" class="form-control" style="min-height: 125px;" placeholder="Enter Declaration Note"><?php echo $declarationNote; ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Map Link</label>
                    <input name="map_link" id="map_link" type="text" class="form-control" placeholder="Enter Map Link" value="<?php echo $mapLink; ?>">
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Iframe Link</label>
                    <input name="iframe_link" id="iframe_link" type="text" class="form-control" placeholder="Enter Iframe Link" value="<?php echo $iframeLink; ?>">
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Whatsapp Number</label>
                    <input name="whatsapp_number" id="whatsapp_number" type="text" class="form-control" placeholder="Enter Whatsapp Number" value="<?php echo $whatsappNumber; ?>">
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Whatsapp Link</label>
                    <input name="whatsapp_link" id="whatsapp_link" type="text" class="form-control" placeholder="Enter Whatsapp Link" value="<?php echo $whatsappLink; ?>">
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Facebook Link</label>
                    <input name="facebook_link" id="facebook_link" type="text" class="form-control" placeholder="Enter Facebook Link" value="<?php echo $facebookLink; ?>">
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Instagram Link</label>
                    <input name="instagram_link" id="instagram_link" type="text" class="form-control" placeholder="Enter Instagram Link" value="<?php echo $instagramLink; ?>">
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Youtube Link</label>
                    <input name="youtube_link" id="youtube_link" type="text" class="form-control" placeholder="Enter Youtube Link" value="<?php echo $youtubeLink; ?>">
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Twitter Link</label>
                    <input name="twitter_link" id="twitter_link" type="text" class="form-control" placeholder="Enter Twitter Link" value="<?php echo $twitterLink; ?>">
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Linkedin Link</label>
                    <input name="linkedin_link" id="linkedin_link" type="text" class="form-control" placeholder="Enter Linkedin Link" value="<?php echo $linkedinLink; ?>">
                </div>
            </div>
        </form>
    </div>
</section>


<script>
    // Product Save Function
    $("#generalInfoForm").validate({
        submitHandler: function (form) {
            var data = new FormData($('#generalInfoForm').get(0));
            $.ajax({
                url: '<?php echo base_url(); ?>admin/settings/generalInfoFormSave',
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
                            window.location.href = "<?php echo base_url(); ?>admin/settings/general-information";
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });
</script>