<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="changePassword" method="post" class="card p-3">
            <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center border-bottom mb-3 pb-3 sticky-head">
                <h4 class="fw-bold mb-0 text-dark">Change Password</h4>
                <div class="d-flex gap-3 justify-content-end">
                    <a href="<?php echo base_url(); ?>admin/change_password" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save</button>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-lg-6 col-md-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Old Password</label>
                    <input name="old_password" id="old_password" type="text" class="form-control" placeholder="Enter Old Password">
                </div>
                <div class="col-lg-6 col-md-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">New Password</label>
                    <input name="new_password" id="new_password" type="text" class="form-control" placeholder="Enter New Password">
                </div>
            </div>
        </form>
    </div>
</div>

<script>
  // Change Password Function
  $("#changePassword").validate({
        rules: {
            old_password: {
                required: true
            },
            new_password: {
                required: true
            }
        },
        messages: {
            old_password: {
                required: "Please Enter Old Password",
            },
            new_password: {
                required: "Please Enter New Password",
            }
        },
        submitHandler: function(form) {
            var data = new FormData($('#changePassword').get(0));
                  $.ajax({
                url: '<?php echo base_url(); ?>admin/changePassword',
                    data: data,
                    cache: false,
                    processData: false,
                    contentType: false,
                    method: 'POST',
                    dataType: 'json',
                    beforeSend: function() {
                      $(".loader").show();
                  },
                  success: function (data) {
                    toastr.options =
                    {
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
                        $(".loader").hide();
                        toastr.error(data['message']);
                    }
                    else {
                        $(".loader").hide();
                        toastr.success(data['message']);
                        setTimeout(function () {
                        window.location.href = "<?php echo base_url(); ?>admin/logout";
                        }, 1500);
                    }
                  }
              });
        return false;
        }
    });
</script>