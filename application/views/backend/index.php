<section class="pt-5">
    <div class="container mt-5">
        <div class="bg-white rounded p-3">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0 fw-bold">Invoice List</h5>
                <a href="#" class="bg-primary px-4 py-2 rounded text-white text-decoration-none">Create Invoice</a>
            </div>
            <table class="table-hover table table-bordered m-0">
                <thead>
                    <th class="fs-7 w-75px">S.No</th>
                    <th class="fs-7">Invoice Number</th>
                    <th class="fs-7">Invoice Date</th>
                    <th class="fs-7">Name</th>
                    <th class="fs-7">Amount</th>
                    <th class="fs-7 w-150px">Action</th>
                </thead>
                <tbody>
                    <tr>
                        <td class="fs-7">1</td>
                        <td class="fs-7">24/0001</td>
                        <td class="fs-7">12/05/2024</td>
                        <td class="fs-7">Antony Abishek</td>
                        <td class="fs-7">25,000</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="<?php echo  base_url() . 'invoice_view'; ?>" class="text-dark text-decoration-none fs-7 py-1 px-3 rounded text-white bg-success">View</a>
                                <a href="<?php echo  base_url() . 'invoice_print'; ?>" class="text-dark text-decoration-none fs-7 py-1 px-3 rounded text-white bg-info">Print</a>
                                <a href="<?php echo  base_url() . 'invoice_delete'; ?>" class="text-dark text-decoration-none fs-7 py-1 px-3 rounded text-white bg-danger">Delete</a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>