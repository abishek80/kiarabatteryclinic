<style>
    table td,
    table td textarea,
    table td input,
    table th {
        font-size: 14px !important;
    }
</style>


<section class="content-wrapper">
    <div class="container-fluid flex-grow-1 container-p-y">
        <form id="invoiceForm" method="post" class="card p-3">
            <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center border-bottom mb-3 pb-3 sticky-head">
                <div class="d-flex gap-2 align-items-center">
                    <a href="<?php echo base_url(); ?>admin/invoice/invoice-list" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <h4 class="fw-bold mb-0 text-dark"><?php echo $formTitle; ?></h4>
                </div>
                <div class="d-flex gap-3 justify-content-end">
                    <a href="<?php echo base_url(); ?>admin/invoice/invoice-list" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save</button>
                </div>
            </div>
            <input name="invoice_id" id="invoice_id" type="hidden" class="form-control" value="<?php echo $invoiceId; ?>">
            <input name="token" id="token" type="hidden" class="form-control" value="<?php echo $invoiceToken; ?>">
            <div class="row g-3">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Invoice Number <span class="text-danger">*</span></label>
                    <input name="invoice_number" id="invoice_number" type="text" class="form-control generate_token" placeholder="Enter Invoice Number" value="<?php echo $invoiceNumber; ?>">
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Invoice Date <span class="text-danger">*</span></label>
                    <input name="invoice_date" id="invoice_date" type="date" class="form-control date-picker" placeholder="Enter Invoice Date" value="<?php echo $invoiceDate; ?>">
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Vendor Name <span class="text-danger">*</span></label>
                    <input name="vendor_name" id="vendor_name" type="hidden" readonly class="form-control vendorName" value="<?php echo $vendorName; ?>">
                    <select name="vendor_id" id="vendor_id" class="select2 selectVendorName">
                        <option value="">Select Vendor Name</option>
                        <?php foreach ($vendorList as $row) { ?>
                            <option value="<?php echo $row->id; ?>" <?php if ($row->id == $vendorId) { echo 'selected="true"'; } ?>><?php echo $row->vendor_name; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Vendor Address 1 </label>
                    <input name="vendor_address_1" id="vendor_address_1" type="text" readonly class="form-control vendorAddress1" placeholder="Enter Vendor Address" value="<?php echo $vendorAddress1; ?>">
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Vendor Address 2 </label>
                    <input name="vendor_address_2" id="vendor_address_2" type="text" readonly class="form-control vendorAddress2" placeholder="Enter Vendor Address" value="<?php echo $vendorAddress2; ?>">
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Vendor GST Number </label>
                    <input name="vendor_gst_number" id="vendor_gst_number" type="text" readonly class="form-control vendorGSTNumber" placeholder="Enter Vendor GST Number" value="<?php echo $vendorGSTNumber; ?>">
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Vendor Mobile Number </label>
                    <input name="vendor_mobile_number" id="vendor_mobile_number" type="text" readonly class="form-control vendorMobileNumber" placeholder="Enter Vendor Mobile Number" value="<?php echo $vendorMobileNumber; ?>">
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Vendor Email </label>
                    <input name="vendor_email" id="vendor_email" type="text" readonly class="form-control vendorEmail" placeholder="Enter Vendor Email" value="<?php echo $vendorEmail; ?>">
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Supplier Ref </label>
                    <input name="supplier_ref" id="supplier_ref" type="text" class="form-control" placeholder="Enter Supplier Ref" value="<?php echo $supplierRef; ?>">
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Other Reference </label>
                    <input name="other_reference" id="other_reference" type="text" class="form-control" placeholder="Enter Other Reference" value="<?php echo $otherReference; ?>">
                </div>
            </div>
            
            <div class="mt-4">
                <div class="table-responsive">
                    <table id="invoiceMainTable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>S. No</th>
                                <th>Product Name</th>
                                <th>Specification</th>
                                <th>Price</th>
                                <th>HSN & Per Value</th>
                                <th>Quantity</th>
                                <th>CGST % & Amt</th>
                                <th>SGST % & Amt</th>
                                <th>GST Amt</th>
                                <th>Subtotal & Total Amt</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="invoiceTable">
                            <?php if ($invoiceId <= 0) { ?>
                                <input type="hidden" value="1" id="invoiceHiddenId">
                                <tr class="invoiceTableRow1">
                                    <td>1</td>
                                    <td>
                                        <input name="product_name" id="product_name1" type="text" class="form-control productName" style="width: 200px;" placeholder="Product Name">
                                        <input name="product_id" id="product_id1" type="hidden" class="productId">
                                    </td>
                                    <td>
                                        <textarea name="product_specification" id="product_specification1" type="text" class="form-control productSpecification" style="min-height: 40px; width: 200px;" placeholder="Product Specification"></textarea>
                                    </td>
                                    <td>
                                        <input name="hsn_number" id="hsn_number1" type="text" readonly class="form-control mb-2 hsnNumber" placeholder="HSN Number">
                                        <input name="per_value" id="per_value1" type="text" readonly class="form-control perValue" placeholder="Per Value">
                                    </td>
                                    <td>
                                        <input name="product_price" id="product_price1" type="text" class="form-control productPrice" placeholder="Product Price">
                                    </td>
                                    <td>
                                        <input name="product_quantity" id="product_quantity1" type="text" class="form-control productQuantity decimal" style="width: 70px;" placeholder="Quantity">
                                    </td>
                                    <td>
                                        <input name="cgst_percentage" id="cgst_percentage" type="text" class="form-control mb-2 cgstPercentage" placeholder="CGST Percentage">
                                        <input name="cgst_amount" id="cgst_amount" type="text" readonly class="form-control cgstAmount" placeholder="CGST Amount">
                                    </td>
                                    <td>
                                        <input name="sgst_percentage" id="sgst_percentage" type="text" class="form-control mb-2 sgstPercentage" placeholder="SGST Percentage">
                                        <input name="sgst_amount" id="sgst_amount" type="text" readonly class="form-control sgstAmount" placeholder="SGST Amount">
                                    </td>
                                    <td>
                                        <input name="gst_amount" id="gst_amount" type="text" readonly class="form-control gstAmount" placeholder="GST Amount">
                                    </td>
                                    <td>
                                        <input name="product_subtotal_amount" id="product_subtotal_amount" type="text" readonly class="form-control mb-2 productSubtotalAmount" placeholder="Subtotal Amount">
                                        <input name="product_total_amount" id="product_total_amount1" type="text" readonly class="form-control productTotalAmount" placeholder="Total Amount">
                                    </td>
                                    <td class="px-2">
                                        <div class="">
                                            <button type="button" class="deleteTableRow border-0 box-hover" data-toggle="tooltip" data-placement="top" title="Remove"> <i class="bx bx-minus"></i> </button>
                                            <button type="button" class="increaseTableRow border-0 box-hover" data-toggle="tooltip" data-placement="top" title="Add"> <i class="bx bx-plus"></i> </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php } else {
                            $i = 1;
                            foreach ($invoiceItemsList as $row) {
                            ?>
                                <tr class="invoiceTableRow<?php echo $i; ?>">
                                    <td><?php echo $i; ?></td>
                                    <td>
                                        <input name="product_name" id="product_name<?php echo $i; ?>" type="text" class="form-control productName" style="width: 200px;" value="<?php echo $row->product_name; ?>" placeholder="Product Name">
                                        <input name="product_id" id="product_id<?php echo $i; ?>" type="hidden" class="productId" value="<?php echo $row->product_id; ?>">
                                    </td>
                                    <td>
                                        <textarea name="product_specification" id="product_specification<?php echo $i; ?>" type="text" class="form-control productSpecification" style="min-height: 40px; width: 200px;" placeholder="Product Specification"><?php echo $row->product_specification; ?></textarea>
                                    </td>
                                    <td>
                                        <input name="hsn_number" id="hsn_number<?php echo $i; ?>" type="text" readonly class="form-control mb-2 hsnNumber" value="<?php echo $row->hsn_number; ?>" placeholder="HSN Number">
                                        <input name="per_value" id="per_value<?php echo $i; ?>" type="text" readonly class="form-control perValue" value="<?php echo $row->per_value; ?>" placeholder="Per Value">
                                    </td>
                                    <td>
                                        <input name="product_price" id="product_price<?php echo $i; ?>" type="text" class="form-control productPrice" value="<?php echo $row->product_price; ?>" placeholder="Product Price">
                                    </td>
                                    <td>
                                        <input name="product_quantity" id="product_quantity<?php echo $i; ?>" type="text" class="form-control productQuantity decimal" style="width: 70px;" value="<?php echo $row->product_quantity; ?>" placeholder="Quantity">
                                    </td>
                                    <td>
                                        <input name="cgst_percentage" id="cgst_percentage<?php echo $i; ?>" type="text" class="form-control mb-2 cgstPercentage" value="<?php echo $row->cgst_percentage; ?>" placeholder="CGST Percentage">
                                        <input name="cgst_amount" id="cgst_amount<?php echo $i; ?>" type="text" readonly class="form-control cgstAmount" value="<?php echo $row->cgst_amount; ?>" placeholder="CGST Amount">
                                    </td>
                                    <td>
                                        <input name="sgst_percentage" id="sgst_percentage<?php echo $i; ?>" type="text" class="form-control mb-2 sgstPercentage" value="<?php echo $row->sgst_percentage; ?>" placeholder="SGST Percentage">
                                        <input name="sgst_amount" id="sgst_amount<?php echo $i; ?>" type="text" readonly class="form-control sgstAmount" value="<?php echo $row->sgst_amount; ?>" placeholder="SGST Amount">
                                    </td>
                                    <td>
                                        <input name="gst_amount" id="gst_amount<?php echo $i; ?>" type="text" readonly class="form-control gstAmount" value="<?php echo $row->gst_amount; ?>" placeholder="GST Amount">
                                    </td>
                                    <td>
                                        <input name="product_subtotal_amount" id="product_subtotal_amount<?php echo $i; ?>" type="text" readonly class="form-control mb-2 productSubtotalAmount" value="<?php echo $row->subtotal_amount; ?>" placeholder="Subtotal Amount">
                                        <input name="product_total_amount" id="product_total_amount<?php echo $i; ?>" type="text" readonly class="form-control productTotalAmount" value="<?php echo $row->total_amount; ?>" placeholder="Total Amount">
                                    </td>
                                    <td class="px-2">
                                        <div class="">
                                            <button type="button" class="deleteTableRow border-0 box-hover" data-toggle="tooltip" data-placement="top" title="Remove"> <i class="bx bx-minus"></i> </button>
                                            <button type="button" class="increaseTableRow border-0 box-hover" data-toggle="tooltip" data-placement="top" title="Add"> <i class="bx bx-plus"></i> </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php $i++;
                                }
                                echo '<input type="hidden" value="' . $i . '" id="invoiceHiddenId">';
                            } ?>
                        </tbody>
                    </table>
                </div>
                <div class="row g-3 mt-3">
                    <div class="col-lg col-md-4 col-sm-6 col-12">
                        <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Subtotal Amount</label>
                        <input name="subtotal_amount" id="subtotal_amount" type="text" class="form-control subtotalAmount" value="<?php echo $subtotalAmount; ?>" readonly>
                    </div>
                    <div class="col-lg col-md-4 col-sm-6 col-12">
                        <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Overall GST Amount</label>
                        <input name="overall_product_quantity" id="overall_product_quantity" type="hidden" class="form-control overallProductQuantity" value="<?php echo $overallProductQuantity; ?>" readonly>
                        <input name="overall_cgst_amount" id="overall_cgst_amount" type="hidden" class="form-control overallCGSTAmount" value="<?php echo $overallCGSTAmount; ?>" readonly>
                        <input name="overall_sgst_amount" id="overall_sgst_amount" type="hidden" class="form-control overallSGSTAmount" value="<?php echo $overallSGSTAmount; ?>" readonly>
                        <input name="overall_gst_amount" id="overall_gst_amount" type="text" class="form-control overallGSTAmount" value="<?php echo $overallGSTAmount; ?>" readonly>
                    </div>
                    <div class="col-lg col-md-4 col-sm-6 col-12">
                        <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Total Amount</label>
                        <input name="total_amount" id="total_amount" type="text" class="form-control totalAmount" value="<?php echo $totalAmount; ?>" readonly>
                    </div>
                    <div class="col-lg col-md-4 col-sm-6 col-12">
                        <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Discount Amount</label>
                        <input name="discount_amount" id="discount_amount" type="text" class="form-control discountAmount" value="<?php echo $discountAmount; ?>">
                    </div>
                    <div class="col-lg col-md-4 col-sm-6 col-12">
                        <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Round Off Amount</label>
                        <input name="roundoff_amount" id="roundoff_amount" type="text" class="form-control roundOffAmount" value="<?php echo $roundoffAmount; ?>">
                    </div>
                    <div class="col-lg col-md-4 col-sm-6 col-12">
                        <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Invoice Amount</label>
                        <input name="invoice_total_amount" id="invoice_total_amount" type="text" class="form-control invoiceAmount" value="<?php echo $invoiceAmount; ?>" readonly>
                    </div>
                </div>
                <div class="row g-3 mt-3">
                    <div class="col-12 col-md-6">
                        <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Subtotal In Amount</label>
                        <input name="gst_amount_in_words" id="gst_amount_in_words" type="text" class="form-control gstAmountInWords" value="<?php echo $gstAmountInWord; ?>" readonly>
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="w-100 fw-13 fw-bold text-dark mb-2 fs-14px">Total In Amount</label>
                        <input name="invoice_amount_in_words" id="invoice_amount_in_words" type="text" class="form-control invoiceAmountInWords" value="<?php echo $invoiceAmountInWord; ?>" readonly>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>


<script>
    $(document).ready(function () {
        $('.selectVendorName').change(function () {
            var selectVendorName = $(this).val();
            if (selectVendorName !== '') {
                $.ajax({
                    url: "<?php echo base_url('admin/vendor/getVendorData'); ?>",
                    type: "POST",
                    dataType: "json",
                    data: {
                        vendorName: selectVendorName
                    },
                    success: function (data) {
                        vendorName = data[0].vendor_name;
                        vendorEmail = data[0].vendor_email;
                        vendorMobileNumber = data[0].vendor_mobile_number;
                        vendorGSTNumber = data[0].vendor_gst_number;
                        vendorAddress1 = data[0].vendor_address_1;
                        vendorAddress2 = data[0].vendor_address_2;
                        $('.vendorName').val(vendorName);
                        $('.vendorEmail').val(vendorEmail);
                        $('.vendorMobileNumber').val(vendorMobileNumber);
                        $('.vendorGSTNumber').val(vendorGSTNumber);
                        $('.vendorAddress1').val(vendorAddress1);
                        $('.vendorAddress2').val(vendorAddress2);
                    }
                });
            } else {
                $('.vendorEmail').val('');
                $('.vendorMobileNumber').val('');
                $('.vendorGSTNumber').val('');
                $('.vendorAddress1').val('');
                $('.vendorAddress2').val('');
            }
        });

        // Recalculate invoice whenever any relevant field changes
        $(document).on("input", "#discount_amount, #roundoff_amount, .productQuantity, .productPrice", function () {
            updateProductTotals();
        });

        // Update subtotal when quantity, price, or tax changes
        $(document).on('input', '.productQuantity, .productPrice, .cgstPercentage, .sgstPercentage', function () {
            var $row = $(this).closest('tr');

            var productPrice = parseFloat($row.find('.productPrice').val()) || 0;
            var enteredQuantity = parseFloat($row.find('.productQuantity').val()) || 0;
            var cgstPercentage = parseFloat($row.find('.cgstPercentage').val()) || 0;
            var sgstPercentage = parseFloat($row.find('.sgstPercentage').val()) || 0;

            // Calculate subtotal
            var subTotal = enteredQuantity * productPrice;

            // Calculate CGST & SGST
            var cgstAmount = (subTotal * cgstPercentage) / 100;
            var sgstAmount = (subTotal * sgstPercentage) / 100;

            // Calculate total for this product (including tax)
            var totalWithTax = subTotal + cgstAmount + sgstAmount;
            var gstAmount = cgstAmount + sgstAmount;

            // Update fields in the current row
            $row.find('.cgstAmount').val(cgstAmount.toFixed(2));
            $row.find('.sgstAmount').val(sgstAmount.toFixed(2));
            $row.find('.gstAmount').val(gstAmount.toFixed(2));
            $row.find('.productSubtotalAmount').val(subTotal.toFixed(2));
            $row.find('.productTotalAmount').val(totalWithTax.toFixed(2));

            // Update overall totals
            updateProductTotals();
        });

        function numberToWordsIndian(input) {
    if (input === null || input === undefined || input === '') return '';

    // Normalize input to a string with 2 decimals
    var num;
    if (typeof input === 'number') {
        num = input.toFixed(2);
    } else {
        num = String(input).replace(/,/g, '').trim();
        if (!num.match(/^\-?\d+(\.\d+)?$/)) return '';
        if (num.indexOf('.') === -1) num = num + '.00';
        else {
            var partsNorm = num.split('.');
            partsNorm[1] = (partsNorm[1] + '00').slice(0,2);
            num = partsNorm.join('.');
        }
    }

    // Negative handling
    var negative = false;
    if (num.charAt(0) === '-') {
        negative = true;
        num = num.slice(1);
    }

    var parts = num.split('.');
    var intPart = parts[0].replace(/^0+/, '') || '0';
    var fracPart = (parts[1] || '00').slice(0,2);

    var small = [
        'zero','one','two','three','four','five','six','seven','eight','nine','ten',
        'eleven','twelve','thirteen','fourteen','fifteen','sixteen','seventeen','eighteen','nineteen'
    ];
    var tens = [
        '','','twenty','thirty','forty','fifty','sixty','seventy','eighty','ninety'
    ];
    var scale = ['', 'thousand', 'lakh', 'crore', 'arab']; // 0->units(hundreds),1->thousand,2->lakh,...

    function twoDigitToWords(n) {
        n = parseInt(n, 10);
        if (n < 20) return small[n];
        var t = Math.floor(n / 10);
        var u = n % 10;
        return tens[t] + (u > 0 ? ' ' + small[u] : '');
    }

    function threeDigitToWords(n) {
        n = parseInt(n, 10);
        var out = [];
        if (n >= 100) {
            var h = Math.floor(n / 100);
            out.push(small[h] + ' hundred');
            n = n % 100;
        }
        if (n > 0) {
            out.push(n < 100 ? twoDigitToWords(n) : '');
        }
        return out.join(' ').replace(/\s+/g,' ').trim();
    }

    // Create Indian-style groups (lowest-first): [last3, next2, next2, ...]
    function splitIndianGroups(s) {
        var groups = [];
        if (s.length > 3) {
            groups.push(s.slice(-3)); // last 3 digits
            var rest = s.slice(0, -3);
            while (rest.length > 0) {
                var len = rest.length;
                var start = Math.max(0, len - 2);
                groups.push(rest.slice(start, len));
                rest = rest.slice(0, start);
            }
        } else {
            groups.push(s);
        }
        return groups; // lowest-first: index 0 => hundreds group
    }

    var intWords = '';
    if (intPart === '0') {
        intWords = 'zero';
    } else {
        var groups = splitIndianGroups(intPart); // lowest-first
        var wordsArr = [];
        // iterate from highest group to lowest
        for (var i = groups.length - 1; i >= 0; i--) {
            var grp = groups[i];
            var grpVal = parseInt(grp, 10);
            if (grpVal === 0) continue;
            var w = '';
            if (i === 0) {
                // lowest group: can be up to 3 digits
                w = threeDigitToWords(grpVal);
            } else {
                // other groups: up to 2 digits
                w = twoDigitToWords(grpVal);
            }
            var scaleName = scale[i] ? ' ' + scale[i] : '';
            wordsArr.push((w + scaleName).trim());
        }
        intWords = wordsArr.join(' ').replace(/\s+/g,' ').trim();
    }

    // Fraction (paise)
    var fracVal = parseInt(fracPart, 10);
    var fracWords = '';
    if (fracVal > 0) {
        if (fracVal < 20) fracWords = small[fracVal];
        else {
            var ft = Math.floor(fracVal / 10);
            var fu = fracVal % 10;
            fracWords = tens[ft] + (fu > 0 ? ' ' + small[fu] : '');
        }
    }

    var result = (negative ? 'minus ' : '') + intWords;
    if (fracWords) result += ' and ' + fracWords + ' paise';

    // Title Case
    result = result.replace(/\w\S*/g, function(txt){
        return txt.charAt(0).toUpperCase() + txt.substr(1);
    });

    return result.trim();
}




        // Function to calculate and update totals
        function updateProductTotals() {
            var total = 0;
            var subtotal = 0;
            var cgstAmount = 0;
            var sgstAmount = 0;
            var gstAmount = 0;
            var productQuantity = 0;

            $('.productTotalAmount').each(function () {
                total += parseFloat($(this).val()) || 0;
            });

            $('.productSubtotalAmount').each(function () {
                subtotal += parseFloat($(this).val()) || 0;
            });

            $('.productQuantity').each(function () {
                productQuantity += parseFloat($(this).val()) || 0;
            });

            $('.cgstAmount').each(function () {
                cgstAmount += parseFloat($(this).val()) || 0;
            });

            $('.sgstAmount').each(function () {
                sgstAmount += parseFloat($(this).val()) || 0;
            });

            $('.gstAmount').each(function () {
                gstAmount += parseFloat($(this).val()) || 0;
            });

            $('#total_amount').val(total.toFixed(2));
            $('#subtotal_amount').val(subtotal.toFixed(2));
            $('#overall_product_quantity').val(productQuantity);
            $('#overall_cgst_amount').val(cgstAmount.toFixed(2));
            $('#overall_sgst_amount').val(sgstAmount.toFixed(2));
            $('#overall_gst_amount').val(gstAmount.toFixed(2));

            // Get discount and round off values
            var discountAmount = parseFloat($('#discount_amount').val()) || 0;
            var roundOffAmount = parseFloat($('#roundoff_amount').val()) || 0;

            // Calculate final invoice total
            var invoiceAmount = total - (discountAmount + roundOffAmount);

            // Ensure invoice total doesn’t go negative
            if (invoiceAmount < 0) invoiceAmount = 0;

            $('#invoice_total_amount').val(invoiceAmount.toFixed(2));

            $('.gstAmountInWords').val(numberToWordsIndian(gstAmount));
            $('.invoiceAmountInWords').val(numberToWordsIndian(invoiceAmount));
        }

        // Initialize autocomplete for product names
        productNameAutoComplete();
    });


    /* --------------------------- Invoice Increase FUNCTION STARTS --------------------------- */
    // Function to initialize autocomplete 
    function productNameAutoComplete() {
        $(".productName").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: '<?php echo base_url(); ?>admin/product/getProductNameList',
                    type: 'post',
                    dataType: "json",
                    data: {
                        product_name: request.term
                    },
                    success: function(data) {
                        if (data && data.length > 0) {
                            /*response(data);*/
                            // Limiting to the first 5 items
                            response(data.slice(0, 5));
                        } else {
                            // If no data is found, display a message
                            response([{ value: 'No data found' }]);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX Error:", status, error);
                        // Handle AJAX errors here
                    }
                });
            },
            minLength: 0,
            select: function(event, ui) {
                if (ui.item.value === 'No data found') {
                    $(this).val(''); // Clear the input field if "No data found" is selected
                    $(this).closest('tr').find('.productId'+invoiceRowCount).val('');
                    $(this).closest('tr').find('.productName'+invoiceRowCount).val('');
                    $(this).closest('tr').find('.productSpecification'+invoiceRowCount).val('');
                    $(this).closest('tr').find('.hsnNumber'+invoiceRowCount).val('');
                    $(this).closest('tr').find('.perValue'+invoiceRowCount).val('');
                    $(this).closest('tr').find('.productQuantity'+invoiceRowCount).val('');
                    $(this).closest('tr').find('.cgstPercentage'+invoiceRowCount).val('');
                    $(this).closest('tr').find('.cgstAmount'+invoiceRowCount).val('');
                    $(this).closest('tr').find('.sgstPercentage'+invoiceRowCount).val('');
                    $(this).closest('tr').find('.sgstAmount'+invoiceRowCount).val('');
                    $(this).closest('tr').find('.productPrice'+invoiceRowCount).val('');
                    $(this).closest('tr').find('.gstAmount'+invoiceRowCount).val('');
                    $(this).closest('tr').find('.productSubtotalAmount'+invoiceRowCount).val('');
                    $(this).closest('tr').find('.productTotalAmount'+invoiceRowCount).val('');
                }else{
                    $(this).closest('tr').find('.productId').val(ui.item.product_id);
                    $(this).closest('tr').find('.productName').val(ui.item.value);
                    $(this).closest('tr').find('.hsnNumber').val(ui.item.hsn_number);
                    $(this).closest('tr').find('.perValue').val(ui.item.per_value);
                    $(this).closest('tr').find('.productPrice').val(ui.item.product_price);
                    $(this).closest('tr').find('.cgstPercentage').val(ui.item.cgst_percentage);
                    $(this).closest('tr').find('.sgstPercentage').val(ui.item.sgst_percentage);
                }
            }
        });
        
        $(document).on('focusout', '.productName', function() {
            var $currentRow = $(this).closest('tr');
            var $inputField = $(this);
            var inputValue = $inputField.val();
            var matched = false;

            if (inputValue === 'No data found') {
                $inputField.val('');
                $currentRow.find('.productId, .productName, .productSpecification, .hsnNumber, .perValue, .productQuantity, .cgstPercentage, .cgstAmount, .sgstPercentage, .sgstAmount, .productPrice, .gstAmount, .productSubtotalAmount, .productTotalAmount').val('');
                return;
            }

            $(".productName").autocomplete("widget").children().each(function() {
                if ($(this).text() === inputValue) {
                    matched = true;
                    return false;
                }
            });

            // if (!matched) {
            //     $inputField.val('');
            //     $currentRow.find('.productId, .productName, .productSpecification, .hsnNumber, .perValue, .productQuantity, .cgstPercentage, .cgstAmount, .sgstPercentage, .sgstAmount, .productPrice, .gstAmount, .productSubtotalAmount, .productTotalAmount').val('');
            // }
        });
    }

    // Initialize autocomplete when the input field gains focus
    $(".productName").on("focus", function() {
        productNameAutoComplete();
        // Trigger autocomplete to show the initial suggestions
        $(this).autocomplete("search", "");
    });

    // Invoice Order Table Increment Function
    $(document).on('keydown', 'input[name="product_quantity"]:last', e => { if (e.which === 9) incrementInvoiceTableRow() });
    $(document).on('click', '.increaseTableRow', incrementInvoiceTableRow);
    
    var invoiceRowCount = parseInt($("#invoiceHiddenId").val()) || 0;

    function incrementInvoiceTableRow() {
        var html = 
        '<tr id="invoiceTableRow' + invoiceRowCount + '">' +
                '<td id="invoiceTableNo' + invoiceRowCount + '">' + invoiceRowCount + '</td>' +
                '<td>' +
                    '<input name="product_id" id="product_id' + invoiceRowCount + '" type="hidden" class="productId">' +
                    '<input name="product_name" id="product_name' + invoiceRowCount + '" type="text" class="form-control productName" style="width: 200px;" placeholder="Product Name">' +
                '</td>' +
                '<td>' +
                    '<textarea name="product_specification" id="product_specification' + invoiceRowCount + '" type="text" class="form-control productSpecification" style="min-height: 40px; width: 200px;" placeholder="Product Specification"></textarea>' +
                '</td>' +
                '<td>' +
                    '<input name="hsn_number" id="hsn_number' + invoiceRowCount + '" type="text" readonly class="form-control mb-2 hsnNumber" placeholder="HSN Number">' +
                    '<input name="per_value" id="per_value' + invoiceRowCount + '" type="text" readonly class="form-control perValue" placeholder="Per Value">' +
                '</td>' +
                '<td>' +
                    '<input name="product_price" id="product_price' + invoiceRowCount + '" type="text" class="form-control productPrice" placeholder="Product Price">' +
                '</td>' +
                '<td>' +
                    '<input name="product_quantity" id="product_quantity' + invoiceRowCount + '" type="text" class="form-control productQuantity decimal" style="width: 70px;" placeholder="Quantity">' +
                '</td>' +
                '<td>' +
                    '<input name="cgst_percentage" id="cgst_percentage' + invoiceRowCount + '" type="text" class="form-control mb-2 cgstPercentage" placeholder="CGST Percentage">' +
                    '<input name="cgst_amount" id="cgst_amount' + invoiceRowCount + '" type="text" readonly class="form-control cgstAmount" placeholder="CGST Amount">' +
                '</td>' +
                '<td>' +
                    '<input name="sgst_percentage" id="sgst_percentage' + invoiceRowCount + '" type="text" class="form-control mb-2 sgstPercentage" placeholder="SGST Percentage">' +
                    '<input name="sgst_amount" id="sgst_amount' + invoiceRowCount + '" type="text" readonly class="form-control sgstAmount" placeholder="SGST Amount">' +
                '</td>' +
                '<td>' +
                    '<input name="gst_amount" id="gst_amount' + invoiceRowCount + '" type="text" readonly class="form-control gstAmount" placeholder="GST Amount">' +
                '</td>' +
                '<td>' +
                    '<input name="product_subtotal_amount" id="product_subtotal_amount' + invoiceRowCount + '" type="text" readonly class="form-control mb-2 productSubtotalAmount" placeholder="Subtotal Amount">' +
                    '<input name="product_total_amount" id="product_total_amount' + invoiceRowCount + '" type="text" readonly class="form-control productTotalAmount" placeholder="Total Amount">' +
                '</td>' +
                '<td class="px-2">' +
                    '<div class="">' +
                        '<button type="button" class="deleteTableRow border-0 box-hover" data-toggle="tooltip" data-placement="top" title="Remove"> <i class="bx bx-minus"></i> </button>' +
                        '<button type="button" class="increaseTableRow border-0 box-hover" data-toggle="tooltip" data-placement="top" title="Add"> <i class="bx bx-plus"></i> </button>' +
                    '</div>' +
                '</td>' +
            '</tr>';
        $('#invoiceTable').append(html);
        updateInvoiceId();
        invoiceRowCount++;
        $("#invoiceSerialNo").val(invoiceRowCount);
    
        // Initialize autocomplete when the input field gains focus
        $(".productName").on("focus", function() {
            productNameAutoComplete();
            // Trigger autocomplete to show the initial suggestions
            $(this).autocomplete("search", "");
        });
    }

    $(document).on('click', '.deleteTableRow', function() {
        var rowCount = $('#invoiceMainTable tr').length - 1;
        if (rowCount > 1) {
            var tr = $(this).closest('tr');
            var ballRowId = tr.attr('id') || '';
            var descriptionNumber = ballRowId.replace('invoiceTableRow', '');
            tr.remove();

            var invoiceRowCount = parseInt($("#invoiceSerialNo").val()) || 0;
            $("#invoiceSerialNo").val(invoiceRowCount - 1);
            updateInvoiceId();
        }
    });

    function updateInvoiceId() {
        $('#invoiceTable tr').each(function(descriptionUpdateId) {
            $(this).attr('id', 'invoiceTableRow' + (descriptionUpdateId + 1));
            $(this).find('td:first').attr('id', 'invoiceTableNo' + (descriptionUpdateId + 1)).text(descriptionUpdateId + 1);
            $(this).find('input[name^="product_id"]').attr('id', 'product_id' + (descriptionUpdateId + 1));
            $(this).find('input[name^="product_name"]').attr('id', 'product_name' + (descriptionUpdateId + 1));
            $(this).find('input[name^="product_specification"]').attr('id', 'product_specification' + (descriptionUpdateId + 1));
            $(this).find('input[name^="hsn_number"]').attr('id', 'hsn_number' + (descriptionUpdateId + 1));
            $(this).find('input[name^="per_value"]').attr('id', 'per_value' + (descriptionUpdateId + 1));
            $(this).find('input[name^="product_price"]').attr('id', 'product_price' + (descriptionUpdateId + 1));
            $(this).find('input[name^="product_quantity"]').attr('id', 'product_quantity' + (descriptionUpdateId + 1));
            $(this).find('input[name^="cgst_percentage"]').attr('id', 'cgst_percentage' + (descriptionUpdateId + 1));
            $(this).find('input[name^="cgst_amount"]').attr('id', 'cgst_amount' + (descriptionUpdateId + 1));
            $(this).find('input[name^="sgst_percentage"]').attr('id', 'sgst_percentage' + (descriptionUpdateId + 1));
            $(this).find('input[name^="sgst_amount"]').attr('id', 'sgst_amount' + (descriptionUpdateId + 1));
            $(this).find('input[name^="gst_amount"]').attr('id', 'gst_amount' + (descriptionUpdateId + 1));
            $(this).find('input[name^="product_subtotal_amount"]').attr('id', 'product_subtotal_amount' + (descriptionUpdateId + 1));
            $(this).find('input[name^="product_total_amount"]').attr('id', 'product_total_amount' + (descriptionUpdateId + 1));
            productNameAutoComplete();
        });
    }
    
    function getInvoiceTableData() {
        invoiceData = [];
        $('#invoiceTable tr').each(function() {
            var productId = $(this).find('.productId').val();
            var productName = $(this).find('.productName').val();
            var productSpecification = $(this).find('.productSpecification').val();
            var hsnNumber = $(this).find('.hsnNumber').val();
            var perValue = $(this).find('.perValue').val();
            var productPrice = $(this).find('.productPrice').val();
            var cgstPercentage = $(this).find('.cgstPercentage').val();
            var cgstAmount = $(this).find('.cgstAmount').val();
            var sgstPercentage = $(this).find('.sgstPercentage').val();
            var sgstAmount = $(this).find('.sgstAmount').val();
            var productQuantity = $(this).find('.productQuantity').val();
            var gstAmount = $(this).find('.gstAmount').val();
            var productSubtotalAmount = $(this).find('.productSubtotalAmount').val();
            var productTotalAmount = $(this).find('.productTotalAmount').val();

            if (productId != '' || productName != '' || productSpecification != '' || hsnNumber != '' || perValue != '' || productPrice != '' || productQuantity != '' || gstAmount != '' || productSubtotalAmount != '' || productTotalAmount != '') {
                var tableDataObj = {
                    productId: productId,
                    productName: productName,
                    productSpecification: productSpecification,
                    hsnNumber: hsnNumber,
                    perValue: perValue,
                    productPrice: productPrice,
                    cgstPercentage: cgstPercentage,
                    cgstAmount: cgstAmount,
                    sgstPercentage: sgstPercentage,
                    sgstAmount: sgstAmount,
                    productQuantity: productQuantity,
                    gstAmount: gstAmount,
                    productSubtotalAmount: productSubtotalAmount,
                    productTotalAmount: productTotalAmount
                }
                invoiceData.push(tableDataObj);
            }
        });
    }
    // Invoice Save Function
    $("#invoiceForm").validate({
        rules: {
            invoice_number: {
                required: true
            },
            invoice_date: {
                required: true
            },
            vendor_id: {
                required: true
            }
        },
        messages: {
            invoice_number: {
                required: "Please Enter Invoice Name",
            },
            invoice_date: {
                required: "Please Enter Invoice Date",
            },
            vendor_id: {
                required: "Please Enter Invoice Price",
            }
        },
        submitHandler: function (form) {
            var data = new FormData($('#invoiceForm').get(0));
            
            getInvoiceTableData();
            data.append('invoiceDataArray', JSON.stringify(invoiceData));

            $.ajax({
                url: '<?php echo base_url(); ?>admin/invoice/invoiceFormSave',
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
                            window.location.href = "<?php echo base_url(); ?>admin/invoice/invoice-list";
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });
</script>