<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="productForm" method="post" class="card p-3">
            <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center border-bottom mb-3 pb-3 sticky-head">
                <div class="d-flex gap-2 align-items-center">
                    <a href="<?php echo base_url(); ?>admin/product/product-list" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <h4 class="fw-bold mb-0 text-dark">Product View</h4>
                </div>
                <div>
                    <?php if($status == 'active') { ?>
                        <a href="javascript:void(0);" data-value="inactive" data-rowid="<?php echo $productId; ?>" data-tablename="product" data-link="<?php echo base_url() . 'admin/product/product-view/' . $productId; ?>" class="px-4 py-2 rounded bg-success text-white changeStatus" data-toggle="tooltip" data-placement="top" title="Status Change"> Active </a>
                    <?php } elseif($status == 'inactive') { ?>
                        <a href="javascript:void(0);" data-value="active" data-rowid="<?php echo $productId; ?>" data-tablename="product" data-link="<?php echo base_url() . 'admin/product/product-view/' . $productId; ?>" class="px-4 py-2 rounded bg-danger text-white changeStatus" data-toggle="tooltip" data-placement="top" title="Status Change"> Inactive </a>
                    <?php } ?>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-lg-4 col-md-5">
                    <img src="<?php echo base_url() . $productImg; ?>" class="pe-lg-4 fw-semibold w-100 rounded-3">
                </div>
                <div class="col-lg-8 col-md-7">
                    <div class="row g-3">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <label class="w-100 fw-13 fw-bold text-dark mb-1 fs-14px">Product Name</label>
                            <p class="mb-0 text-black"><?php echo $productName; ?></p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <label class="w-100 fw-13 fw-bold text-dark mb-1 fs-14px">Product Category Name</label>
                            <p class="mb-0 text-black"><?php echo $categoryName; ?></p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <label class="w-100 fw-13 fw-bold text-dark mb-1 fs-14px">MRP Price</label>
                            <p class="mb-0 text-black amount-format"><?php echo $mrpPrice; ?></p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <label class="w-100 fw-13 fw-bold text-dark mb-1 fs-14px">Product Price</label>
                            <p class="mb-0 text-black amount-format"><?php echo $productPrice; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-1 fs-14px">HSN Number</label>
                    <p class="mb-0 text-black"><?php echo $hsnNumber; ?></p>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-1 fs-14px">Per Value</label>
                    <p class="mb-0 text-black"><?php echo $perValue; ?></p>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-1 fs-14px">CGST Percentage</label>
                    <p class="mb-0 text-black"><?php echo $cgstPercentage; ?></p>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-1 fs-14px">SGST Percentage</label>
                    <p class="mb-0 text-black"><?php echo $sgstPercentage; ?></p>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-1 fs-14px">Created At</label>
                    <p class="mb-0 text-black"><?php $dateFormat = new DateTime($createdAt); echo $dateFormat->format('d-m-Y h:i A'); ?></p>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-1 fs-14px">Updated At</label>
                    <p class="mb-0 text-black"><?php $dateFormat = new DateTime($updatedAt); echo $dateFormat->format('d-m-Y h:i A'); ?></p>
                </div>
                <div class="col-lg-12">
                    <label class="w-100 fw-13 fw-bold text-dark mb-1 fs-14px">Short Description</label>
                    <p class="mb-0 text-black"><?php echo $shortDescription; ?></p>
                </div>
                <div class="col-lg-12">
                    <label class="w-100 fw-13 fw-bold text-dark mb-1 fs-14px">Description</label>
                    <p class="mb-0 text-black"><?php echo $description; ?></p>
                </div>
            </div>
        </form>
        <div class="mt-3 card p-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3">
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