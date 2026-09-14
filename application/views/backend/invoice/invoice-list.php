<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex flex-wrap gap-2 gap-md-3 mb-3">
            <a href="<?php echo base_url(); ?>admin/invoice/invoice-list" class="<?php echo ($activeLink == '') ? 'bg-primary text-white' : 'bg-white text-primary'; ?> px-4 py-2 px-md-5 shadow shadow-sm fw-bold lh-1 rounded-2 border-primary border border-3 border-end-0 border-start-0 border-top-0">All</a>
            <a href="<?php echo base_url(); ?>admin/invoice/invoice-list/paid" class="<?php echo ($activeLink == 'paid') ? 'bg-success text-white' : 'bg-white text-success'; ?> px-4 py-2 px-md-5 shadow shadow-sm fw-bold lh-1 rounded-2 border-success border border-3 border-end-0 border-start-0 border-top-0">Paid</a>
            <a href="<?php echo base_url(); ?>admin/invoice/invoice-list/not_paid" class="<?php echo ($activeLink == 'not_paid') ? 'bg-danger text-white' : 'bg-white text-danger'; ?> px-4 py-2 px-md-5 shadow shadow-sm fw-bold lh-1 rounded-2 border-danger border border-3 border-end-0 border-start-0 border-top-0">Not Paid</a>
        </div>
        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3">
                <h4 class="fw-bold mb-0 text-dark">Invoice List</h4>
                <a href="<?php echo base_url(); ?>admin/invoice/invoice-add" class="btn btn-primary px-4 py-2 rounded text-white">Create Invoice</a>
            </div>
            <div class="table-responsive">
                <table class="data-table table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>S. No</th>
                            <th>Invoice No</th>
                            <th>Date</th>
                            <th>Vendor Name</th>
                            <th>Mobile & Email</th>
                            <th>Product Count</th>
                            <th>Invoice Amount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=1;
                            foreach($invoiceList as $row) { 
                                // Get the transaction date
                                $transactionDate = new DateTime($row->transaction_date);
                                $year = (int)$transactionDate->format('Y');
                                $month = (int)$transactionDate->format('m');

                                // India’s financial year runs from April 1 to March 31
                                if ($month >= 4) {
                                    // e.g., if date is June 2025 → FY 2025-2026
                                    $fyStart = $year;
                                    $fyEnd = $year + 1;
                                } else {
                                    // e.g., if date is February 2025 → FY 2024-2025
                                    $fyStart = $year - 1;
                                    $fyEnd = $year;
                                }
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row->invoice_number . '/' . $fyStart . '/' . $fyEnd; ?></td>
                            <td><?php $dateFormat = new DateTime($row->invoice_date); echo $dateFormat->format('d - m - Y'); ?></td>
                            <td><?php echo $row->vendor_name; ?></td>
                            <td>
                                <a href="<?php echo 'mailto:' . $row->vendor_email; ?>" class="text-lowercase a-hover"><?php echo $row->vendor_email; ?></a>
                                <a href="<?php echo 'tel:' . $row->vendor_mobile_number; ?>" class="a-hover"><?php echo $row->vendor_mobile_number; ?></a>
                            </td>
                            <td><?php echo $row->overall_product_quantity; ?></td>
                            <td class="amount-format"><?php echo $row->invoice_amount; ?></td>
                            <td>
                                <?php if($row->status == 'paid') { ?>
                                    <a href="javascript:void(0);" data-value="not_paid" data-rowid="<?php echo $row->id; ?>" data-tablename="invoice" data-link="<?php echo base_url(); ?>admin/invoice/invoice-list" class="text-success changeStatus" data-toggle="tooltip" data-placement="top" title="Status Change"> Paid </a>
                                <?php } elseif($row->status == 'not_paid') { ?>
                                    <a href="javascript:void(0);" data-value="paid" data-rowid="<?php echo $row->id; ?>" data-tablename="invoice" data-link="<?php echo base_url(); ?>admin/invoice/invoice-list" class="text-danger changeStatus" data-toggle="tooltip" data-placement="top" title="Status Change"> Not Paid </a>
                                <?php } ?>
                            </td>
                            <td class="px-2">
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="<?php echo base_url() . 'admin/invoice/invoice-view/' . $row->id; ?>" target="_blank" class="box-hover" data-toggle="tooltip" data-placement="top" title="View"> <i class="bx bx-show-alt"></i> </a>
                                    <a href="<?php echo base_url() . 'admin/invoice/invoice-edit/' . $row->id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="Edit"> <i class="bx bx-edit-alt"></i> </a>
                                    <a href="javascript:void(0);" data-rowid="<?php echo $row->id; ?>" data-tablename="invoice" data-link="<?php echo base_url(); ?>admin/invoice/invoice-list" class="box-hover trashItem" data-toggle="tooltip" data-placement="top" title="Delete"> <i class="bx bx-trash"></i> </a>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>