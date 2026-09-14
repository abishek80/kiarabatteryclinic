<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card p-3">
            <div class="border-bottom mb-3 pb-3">
                <h4 class="fw-bold mb-0 text-dark">Product Enquiry List</h4>
            </div>
            <div class="table-responsive">
                <table class="data-table table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>S. No</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile Number</th>
                            <th>Description</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=1;
                            foreach($productEnquiryList as $row) { 
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row->product_name; ?></td>
                            <td><?php echo $row->quantity; ?></td>
                            <td><?php echo $row->name; ?></td>
                            <td><a href="mailto:<?php echo $row->email; ?>" class="text-lowercase"><?php echo $row->email; ?></a></td>
                            <td><a href="tel:<?php echo $row->mobile_number; ?>"><?php echo $row->mobile_number; ?></a></td>
                            <td><?php echo $row->message; ?></td>
                            <td><?php $dateFormat = new DateTime($row->created_at); echo $dateFormat->format('d-m-Y h:i A'); ?></td>
                            <td>
                                <a href="javascript:void(0);" data-rowid="<?php echo $row->id; ?>" data-tablename="product_enquiry" data-link="<?php echo base_url(); ?>admin/enquiry/product-enquiry" class="box-hover trashItem" data-toggle="tooltip" data-placement="top" title="Delete"> <i class="bx bx-trash"></i> </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>