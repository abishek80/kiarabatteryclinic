<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="<?php echo base_url(); ?>themes/backend/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Kiara Battery Clinic | Admin Dashboard</title>
    <link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>themes/backend/images/fav-icon.png" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/backend/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/backend/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/backend/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/backend/css/demo.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/backend/css/toast.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/backend/css/sweetalert.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/backend/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/backend/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/backend/css/select2.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/backend/css/lightbox.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/backend/css/dropzone.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/backend/css/jquery-ui.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/backend/css/flatpickr.css" />

    <script src="<?php echo base_url(); ?>themes/backend/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>themes/backend/js/validate.js"></script>
</head>
<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="px-3 py-2 text-center">
                    <a href="<?php echo base_url(); ?>admin">
                        <div class="logo-img" style="background-image: url('<?php echo base_url(); ?>themes/backend/images/logo.png');"></div>
                    </a>
                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-lg-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>
                <div class="menu-inner-shadow"></div>
                <ul id="RoseClosetMenu" class="menu-inner py-1">
                    <li class="menu-item <?php echo $menu_status == 'dashboard' ? 'active' : ''; ?>">
                        <a href="<?php echo base_url(); ?>admin" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-alt"></i>
                            <div data-i18n="Dashboard">Dashboard</div>
                        </a>
                    </li>
                    <li class="menu-item <?php echo $menu_status == 'InvoiceList' ? 'active' : ''; ?>">
                        <a href="<?php echo base_url(); ?>admin/invoice/invoice-list" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-rupee"></i>
                            <div data-i18n="Invoice List">Invoice List</div>
                        </a>
                    </li>
                    <li class="menu-item <?php echo $menu_status == 'VendorList' ? 'active' : ''; ?>">
                        <a href="<?php echo base_url(); ?>admin/vendor/vendor-list" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-user"></i>
                            <div data-i18n="Vendor List">Vendor List</div>
                        </a>
                    </li>
                    <li class="menu-item <?php echo $menu_status == 'ProductList' ? 'active' : ''; ?>">
                        <a href="<?php echo base_url(); ?>admin/product/product-list" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-cart-alt"></i>
                            <div data-i18n="Product List">Product List</div>
                        </a>
                    </li>
                    <li class="menu-item <?php echo $menu_status == 'CategoryList' ? 'active' : ''; ?>">
                        <a href="<?php echo base_url(); ?>admin/category/category-list" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-category"></i>
                            <div data-i18n="Category List">Category List</div>
                        </a>
                    </li>
                    <li class="menu-item <?php echo $menu_status == 'ServiceList' ? 'active' : ''; ?>">
                        <a href="<?php echo base_url(); ?>admin/service/service-list" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-spreadsheet"></i>
                            <div data-i18n="Service List">Service List</div>
                        </a>
                    </li>
                    <li class="menu-item <?php echo $menu_status == 'BlogList' ? 'active' : ''; ?>">
                        <a href="<?php echo base_url(); ?>admin/blog/blog-list" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-detail"></i>
                            <div data-i18n="Blog List">Blog List</div>
                        </a>
                    </li>
                    <li class="menu-item <?php echo $menu_status == 'GalleryList' ? 'active' : ''; ?>">
                        <a href="<?php echo base_url(); ?>admin/gallery/gallery-list" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-image"></i>
                            <div data-i18n="Gallery List">Gallery List</div>
                        </a>
                    </li>
                    <li class="menu-item <?php echo $menu_open == 'Enquiry' ? 'active open' : ''; ?>">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-message-detail"></i>
                            <div data-i18n="Enquiry">Enquiry</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item <?php echo $menu_status == 'ProductEnquiry' ? 'active' : ''; ?>">
                                <a href="<?php echo base_url(); ?>admin/enquiry/product-enquiry" class="menu-link">
                                    <div data-i18n="Product Enquiry">Product Enquiry</div>
                                </a>
                            </li>
                            <li class="menu-item <?php echo $menu_status == 'ContactEnquiry' ? 'active' : ''; ?>">
                                <a href="<?php echo base_url(); ?>admin/enquiry/contact-enquiry" class="menu-link">
                                    <div data-i18n="Contact Enquiry">Contact Enquiry</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item <?php echo $menu_open == 'Settings' ? 'active open' : ''; ?>">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-cog"></i>
                            <div data-i18n="Settings">Settings</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item <?php echo $menu_status == 'GeneralInformation' ? 'active' : ''; ?>">
                                <a href="<?php echo base_url(); ?>admin/settings/general-information" class="menu-link">
                                    <div data-i18n="General Information">General Information</div>
                                </a>
                            </li>
                            <li class="menu-item <?php echo $menu_status == 'SEOSettings' ? 'active' : ''; ?>">
                                <a href="<?php echo base_url(); ?>admin/settings/seo-settings" class="menu-link">
                                    <div data-i18n="SEO Settings">SEO Settings</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item <?php echo $menu_status == 'ChangePassword' ? 'active' : ''; ?>">
                        <a href="<?php echo base_url(); ?>admin/change-password" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-key"></i>
                            <div data-i18n="Change Password">Change Password</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="<?php echo base_url(); ?>admin/logout" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-power-off"></i>
                            <div data-i18n="Logout">Logout</div>
                        </a>
                    </li>
                </ul>
            </aside>
            <div class="layout-page">
                <nav class="d-xl-none d-flex px-4 layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="<?php echo base_url(); ?>themes/backend/images/avatar.png" alt class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="<?php echo base_url(); ?>admin/change-password">
                                            <i class="bx bx-key me-2"></i>
                                            <span class="align-middle">Change Password</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="<?php echo base_url(); ?>admin/logout">
                                            <i class="bx bx-power-off me-2"></i>
                                            <span class="align-middle">Log Out</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>