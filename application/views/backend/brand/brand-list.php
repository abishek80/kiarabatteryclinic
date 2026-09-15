<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex flex-wrap gap-2 gap-md-3 mb-3">
            <a href="<?php echo base_url(); ?>admin/brand/brand-list" class="<?php echo ($activeLink == '') ? 'bg-primary text-white' : 'bg-white text-primary'; ?> px-4 py-2 px-md-5 shadow shadow-sm fw-bold lh-1 rounded-2 border-primary border border-3 border-end-0 border-start-0 border-top-0">All</a>
            <a href="<?php echo base_url(); ?>admin/brand/brand-list/active" class="<?php echo ($activeLink == 'active') ? 'bg-success text-white' : 'bg-white text-success'; ?> px-4 py-2 px-md-5 shadow shadow-sm fw-bold lh-1 rounded-2 border-success border border-3 border-end-0 border-start-0 border-top-0">Active</a>
            <a href="<?php echo base_url(); ?>admin/brand/brand-list/inactive" class="<?php echo ($activeLink == 'inactive') ? 'bg-danger text-white' : 'bg-white text-danger'; ?> px-4 py-2 px-md-5 shadow shadow-sm fw-bold lh-1 rounded-2 border-danger border border-3 border-end-0 border-start-0 border-top-0">Inactive</a>
        </div>
        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3">
                <h4 class="fw-bold mb-0 text-dark">Brand Master List</h4>
                <a href="<?php echo base_url(); ?>admin/brand/brand_add" class="btn btn-primary px-4 py-2 rounded text-white"><i class="bx bx-plus me-1"></i> Add New Brand</a>
            </div>
            <div class="table-responsive">
                <table class="data-table table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>S. No</th>
                            <th>Brand Logo / Image</th>
                            <th>Title / Name</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            if(!empty($brandList)) {
                                foreach($brandList as $row) { 
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td>
                                <?php if(!empty($row->brand_img)) { ?>
                                    <a href="<?php echo base_url() . $row->brand_img; ?>" data-lightbox="roadtrip">
                                        <img src="<?php echo base_url() . $row->brand_img; ?>" class="table-card" style="max-height: 50px; object-fit: contain;" alt="Brand Logo">
                                    </a>
                                <?php } else { ?>
                                    <span class="badge bg-label-secondary">No Image</span>
                                <?php } ?>
                            </td>
                            <td><strong class="text-dark"><?php echo $row->brand_name; ?></strong></td>
                            <td>
                                <?php if($row->status == 'active') { ?>
                                    <a href="javascript:void(0);" data-value="inactive" data-rowid="<?php echo $row->id; ?>" data-tablename="brand" data-link="<?php echo base_url(); ?>admin/brand/brand-list" class="text-success changeStatus" data-toggle="tooltip" data-placement="top" title="Status Change"> Active </a>
                                <?php } else { ?>
                                    <a href="javascript:void(0);" data-value="active" data-rowid="<?php echo $row->id; ?>" data-tablename="brand" data-link="<?php echo base_url(); ?>admin/brand/brand-list" class="text-danger changeStatus" data-toggle="tooltip" data-placement="top" title="Status Change"> Inactive </a>
                                <?php } ?>
                            </td>
                            <td><?php $dateFormat = new DateTime($row->created_at); echo $dateFormat->format('d-m-Y h:i A'); ?></td>
                            <td class="px-2 text-center">
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="<?php echo base_url() . 'admin/brand/brand_view/' . $row->id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="View"> <i class="bx bx-show-alt"></i> </a>
                                    <a href="<?php echo base_url() . 'admin/brand/brand_edit/' . $row->id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="Edit"> <i class="bx bx-edit-alt"></i> </a>
                                    <a href="javascript:void(0);" data-rowid="<?php echo $row->id; ?>" data-tablename="brand" data-link="<?php echo base_url(); ?>admin/brand/brand-list" class="box-hover trashItem" data-toggle="tooltip" data-placement="top" title="Delete"> <i class="bx bx-trash"></i> </a>
                                </div>
                            </td>
                        </tr>
                        <?php 
                                } 
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
