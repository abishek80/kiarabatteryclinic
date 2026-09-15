                </div>
            </div>
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>

    <script src="<?php echo base_url(); ?>themes/backend/js/toastr.js"></script>
    <script src="<?php echo base_url(); ?>themes/backend/js/admin.js"></script>
    <script src="<?php echo base_url(); ?>themes/backend/js/jquery.sweet-alert.custom.js"></script>
    <script src="<?php echo base_url(); ?>themes/backend/js/sweetalert.min.js"></script>
    <script src="<?php echo base_url(); ?>themes/backend/js/lightbox-plus-jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>themes/backend/js/dropzone.js"></script>
    
    <script src="<?php echo base_url(); ?>themes/backend/vendor/js/helpers.js"></script>
    <script src="<?php echo base_url(); ?>themes/backend/js/config.js"></script>
    <script src="<?php echo base_url(); ?>themes/backend/js/jquery.ajax.js"></script>
    <script src="<?php echo base_url(); ?>themes/backend/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?php echo base_url(); ?>themes/backend/vendor/js/menu.js"></script>
    <script src="<?php echo base_url(); ?>themes/backend/js/main.js"></script>
    <script src="<?php echo base_url(); ?>themes/backend/js/ui-popover.js"></script>
    <script src="<?php echo base_url(); ?>themes/backend/vendor/libs/popper/popper.js"></script>
    <script src="<?php echo base_url(); ?>themes/backend/vendor/js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>themes/backend/js/datatables.min.js"></script>
    <script src="<?php echo base_url(); ?>themes/backend/js/select2.full.js"></script>
    <script src="<?php echo base_url(); ?>themes/backend/js/lightbox.min.js"></script>
    <script src="<?php echo base_url(); ?>themes/backend/js/jquery-ui.min.js"></script>
    <script src="<?php echo base_url(); ?>themes/backend/js/flatpickr.js"></script>
    <script src="<?php echo base_url(); ?>themes/backend/js/date-picker.js"></script>
    <script src="<?php echo base_url(); ?>themes/backend/js/html2pdf.min.js"></script>

    <script>
        $('.data-table').DataTable();

        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });

        $(".select2").select2({
            allowClear: true
        });
        $(".multiple.select2").select2({
            allowClear: true
        });

        $(document).on("input", ".decimal", function(evt){
            var self = $(this);
            var currentValue = self.val();
            var sanitizedValue = currentValue.replace(/[^0-9.]/g, '');
            var decimalIndex = sanitizedValue.indexOf('.');

            if (decimalIndex !== -1) {
                var beforeDecimal = sanitizedValue.substr(0, decimalIndex);
                var afterDecimal = sanitizedValue.substr(decimalIndex + 1);
                afterDecimal = afterDecimal.replace('.', '');
                sanitizedValue = beforeDecimal + '.' + afterDecimal;
            }
            if (decimalIndex !== -1 && sanitizedValue.length - decimalIndex > 3) {
                sanitizedValue = sanitizedValue.substr(0, decimalIndex + 3);
            }
        
            self.val(sanitizedValue);
            if ((evt.which !== 46 || sanitizedValue.indexOf('.') !== -1) && (evt.which < 48 || evt.which > 57)) {
                evt.preventDefault();
            }
        });
        
        $(document).on("input", ".text-only", function(evt) {
            var self = $(this);
            var currentValue = self.val();
            var sanitizedValue = currentValue.replace(/[0-9]/g, '');
            self.val(sanitizedValue);
        });

        $(document).on("input", ".number-only", function(evt) {
            var self = $(this);
            self.val(self.val().replace(/\D/g, ""));
            if ((evt.which < 48 || evt.which > 57)) {
                evt.preventDefault();
            }
        });
        
        // Function to format number as Indian numbering system
        function formatIndianNumber(number) {
            const parts = number.split(".");
            const intPart = parts[0];
            const decPart = parts.length > 1 ? "." + parts[1] : "";
            const lastThree = intPart.substring(intPart.length - 3);
            const otherNumbers = intPart.substring(0, intPart.length - 3);
            const formattedNumber = otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + "," + lastThree + decPart;
            return formattedNumber.startsWith(",") ? formattedNumber.substring(1) : formattedNumber;
        }

        $(document).ready(function() {
            // Get the div and format its content
            $('.amount-format').each(function() {
                var number = $(this).text();
                var formattedNumber = formatIndianNumber(number);
                $(this).text(formattedNumber);
            });
        });

        $(document).on('click', '.trashItem', function(e) {
            var fieldId = $(this).data("rowid");
            var tableName = $(this).data("tablename");
            var link = $(this).data("link");
            swal({
                title: "Are you sure delete?",
                text: "You will not be able to recover this data!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }, function() {
                $.ajax({
                    type: "POST",
                    headers: {
                        "X-CSRFToken": csrftoken
                    },
                    url: '<?php echo base_url(); ?>admin/deleteRecord',
                    dataType: "json",
                    data: {
                        fieldId, 
                        tableName
                    },
                    success: function(data) {
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
                        } else {
                            swal("Deleted!", (data['message']), "success");
                            setTimeout(function () {
                                window.location.href = link;
                            }, 1500);
                        }
                    }
                });
            });
        });
        
        $(document).on('click', '.changeStatus', function(e) {
            var fieldId = $(this).data("rowid");
            var tableName = $(this).data("tablename");
            var statusValue = $(this).data("value");
            var link = $(this).data("link");
            swal({
                title: "Change The Status?",
                text: "You Will Change The Status!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Changed!",
                closeOnConfirm: false
            }, function() {
                $.ajax({
                    type: "POST",
                    headers: {
                        "X-CSRFToken": csrftoken
                    },
                    url: '<?php echo base_url(); ?>admin/changeStatus',
                    dataType: "json",
                    data: {
                        fieldId, 
                        tableName,
                        statusValue
                    },
                    success: function(data) {
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
                        } else {
                            swal("Changed!", (data['message']), "success");
                            setTimeout(function () {
                                window.location.href = link;
                            }, 1500);
                        }
                    }
                });
            });
        });

        function previewUploadImage(input, previewId) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#' + previewId).attr('src', e.target.result).removeClass('d-none');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>

</html>