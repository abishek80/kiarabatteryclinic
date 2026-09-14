<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="seoForm" method="post" class="card p-3">
            <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center border-bottom mb-3 pb-3 sticky-head">
                <h4 class="fw-bold mb-0 text-dark">SEO Settings</h4>
                <div class="d-flex gap-3 justify-content-end">
                    <a href="<?php echo base_url(); ?>admin/settings/seo-settings" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save</button>
                </div>
            </div>
            <input name="seo_id" id="seo_id" type="hidden" class="form-control" value="<?php echo $seoId; ?>">
            <div class="row g-3">
                <div class="col-lg-12">
                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Header Link</label>
                    <textarea name="header_link" id="header_link" type="text" class="form-control" style="min-height: 150px;" placeholder="Enter Header Link"><?php echo $headerLink; ?></textarea>
                </div>
                <div class="col-lg-12">
                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Body Link</label>
                    <textarea name="body_link" id="body_link" type="text" class="form-control" style="min-height: 150px;" placeholder="Enter Body Link"><?php echo $bodyLink; ?></textarea>
                </div>
                <div class="col-lg-12">
                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Footer Link</label>
                    <textarea name="footer_link" id="footer_link" type="text" class="form-control" style="min-height: 150px;" placeholder="Enter Footer Link"><?php echo $footerLink; ?></textarea>
                </div>
            </div>
        </form>
    </div>
</section>


<script>
    // Product Save Function
    $("#seoForm").validate({
        submitHandler: function (form) {
            var data = new FormData($('#seoForm').get(0));
            $.ajax({
                url: '<?php echo base_url(); ?>admin/settings/seoFormSave',
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
                            window.location.href = "<?php echo base_url(); ?>admin/settings/seo-settings";
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });
</script>