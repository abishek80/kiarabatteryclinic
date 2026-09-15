<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="categoryForm" method="post" class="card p-3">
            <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center border-bottom mb-3 pb-3 sticky-head">
                <div class="d-flex gap-2 align-items-center">
                    <a href="<?php echo base_url(); ?>admin/category/category-list" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <h4 class="fw-bold mb-0 text-dark">Category View</h4>
                </div>
                <div>
                    <?php if($status == 'active') { ?>
                        <a href="javascript:void(0);" data-value="inactive" data-rowid="<?php echo $categoryId; ?>" data-tablename="category" data-link="<?php echo base_url() . 'admin/category/category-view/' . $categoryId; ?>" class="px-4 py-2 rounded bg-success text-white changeStatus" data-toggle="tooltip" data-placement="top" title="Status Change"> Active </a>
                    <?php } elseif($status == 'inactive') { ?>
                        <a href="javascript:void(0);" data-value="active" data-rowid="<?php echo $categoryId; ?>" data-tablename="category" data-link="<?php echo base_url() . 'admin/category/category-view/' . $categoryId; ?>" class="px-4 py-2 rounded bg-danger text-white changeStatus" data-toggle="tooltip" data-placement="top" title="Status Change"> Inactive </a>
                    <?php } ?>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-1 fs-14px">Category Name</label>
                    <p class="mb-0 text-black"><?php echo $categoryName; ?></p>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-1 fs-14px">Category Img</label>
                    <a href="<?php echo base_url() . $categoryImg; ?>" class="fw-semibold" data-lightbox="roadtrip">View Category Image</a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-13 fw-bold text-dark mb-1 fs-14px">Created At</label>
                    <p class="mb-0 text-black"><?php $dateFormat = new DateTime($createdAt); echo $dateFormat->format('d-m-Y h:i A'); ?></p>
                </div>
                <div class="col-12">
                    <label class="w-100 fw-13 fw-bold text-dark mb-1 fs-14px">Short Description</label>
                    <p class="mb-0 text-black"><?php echo $shortDescription; ?></p>
                </div>
                <div class="col-12">
                    <label class="w-100 fw-13 fw-bold text-dark mb-1 fs-14px">Description</label>
                    <p class="mb-0 text-black"><?php echo $description; ?></p>
                </div>
            </div>
        </form>
        <div class="mt-3 card p-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3">
                <h4 class="fw-bold mb-0 text-dark">Product List</h4>
                <a href="<?php echo base_url(); ?>admin/product/product-add" class="btn btn-primary px-4 py-2 rounded text-white">Create Product</a>
            </div>
            <div class="table-responsive">
                <table class="data-table table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>S. No</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Product Price</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=1;
                            foreach($relatedProductList as $row) { 
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><img src="<?php echo base_url() . $row->product_img; ?>" class="table-card" style="width: 60px; height: 50px; object-fit: cover;" alt="Product Image"></td>
                            <td><?php echo $row->product_name; ?></td>
                            <td class="amount-format"><?php echo $row->product_price; ?></td>
                            <td><p class="one-line-clamp mb-0"><?php echo $row->short_description; ?></p></td>
                            <td>
                                <?php if($row->status == 'active') { ?>
                                    <a href="javascript:void(0);" data-value="inactive" data-rowid="<?php echo $row->id; ?>" data-tablename="product" data-link="<?php echo base_url() . 'admin/category/category-view/' . $row->category_id; ?>" class="text-success changeStatus" data-toggle="tooltip" data-placement="top" title="Status Change"> Active </a>
                                <?php } elseif($row->status == 'inactive') { ?>
                                    <a href="javascript:void(0);" data-value="active" data-rowid="<?php echo $row->id; ?>" data-tablename="product" data-link="<?php echo base_url() . 'admin/category/category-view/' . $row->category_id; ?>" class="text-danger changeStatus" data-toggle="tooltip" data-placement="top" title="Status Change"> Inactive </a>
                                <?php } ?>
                            </td>
                            <td><?php $dateFormat = new DateTime($row->created_at); echo $dateFormat->format('d-m-Y h:i A'); ?></td>
                            <td class="px-2">
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="<?php echo base_url() . 'admin/product/product-view/' . $row->id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="View"> <i class="bx bx-show-alt"></i> </a>
                                    <a href="<?php echo base_url() . 'admin/product/product-edit/' . $row->id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="Edit"> <i class="bx bx-edit-alt"></i> </a>
                                    <a href="javascript:void(0);" data-rowid="<?php echo $row->id; ?>" data-tablename="product" data-link="<?php echo base_url(); ?>admin/product/product-list" class="box-hover trashItem" data-toggle="tooltip" data-placement="top" title="Delete"> <i class="bx bx-trash"></i> </a>
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