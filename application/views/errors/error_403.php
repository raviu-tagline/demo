<?php
    $this->load->view('Layout/header.php');
?>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center text-center error-page bg-primary">
            <div class="row flex-grow">
            <div class="col-lg-7 mx-auto text-white">
                <div class="row align-items-center d-flex flex-row">
                <div class="col-lg-6 text-lg-right pr-lg-4">
                    <h1 class="display-1 mb-0">403</h1>
                </div>
                <div class="col-lg-6 error-page-divider text-lg-left pl-lg-4">
                    <h2>SORRY!</h2>
                    <h3 class="font-weight-light">You don't have access for file.</h3>
                </div>
                </div>
                <br>
                <a href="#" class="text-white text-decoration-none"><i class='fa fa-angle-left'></i><i class='fa fa-angle-left'></i><span class='pl-3'>Back to page.</span></a>
            </div>
            </div>
        </div>
    <!-- content-wrapper ends -->
    </div>
<?php 
    $this->load->view('Layout/footer_include.php');
?>