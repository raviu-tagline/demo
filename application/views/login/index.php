<?php
    $this->load->view('Layout/header.php');
?>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
        <div class="row w-100">
        <div class="col-lg-4 mx-auto">
            <div class="auto-form-wrapper">
            <?php
                if(!empty($error))
                {
                    echo $error;
                }
            ?>
            <?php echo validation_errors()?>
            <?php echo form_open(base_url('login'))?>
                <div class="form-group">
                    <label class="label">Username</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="user_email" value="<?php echo set_value('user_email')?>" placeholder="Username">
                        <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="label">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" name="user_password" placeholder="*********">
                        <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <input type="submit" name="login" class="btn btn-primary submit-btn btn-block" value="Login">
                </div>

                <div class="form-group d-flex justify-content-between">
                    <div class="form-check form-check-flat mt-0">
                        <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" checked> Keep me signed in <i class='input-helper'></i></label>
                    </div>
                <!-- <a href="#" class="text-small forgot-password text-black">Forgot Password</a> -->
                </div>
            </form>

            <div class="form-group">
                <button class="btn btn-block g-login">
                    <img class="mr-3" src="<?php echo base_url('assets/images/file-icons/icon-google.svg')?>" alt="">Log in with Google
                </button>
                
                <div class="text-block text-center my-3">
                    <span class="text-small font-weight-semibold">Not a member ?</span>
                    <a href="<?php echo base_url('register')?>" class="text-black text-small">Create new account</a>
                </div>
            </div>

            </div>
            <!-- <ul class="auth-footer">
            <li>
                <a href="#">Conditions</a>
            </li>
            <li>
                <a href="#">Help</a>
            </li>
            <li>
                <a href="#">Terms</a>
            </li>
            </ul>
            <p class="footer-text text-center">copyright © 2020 Bootstrapdash. All rights reserved.</p>
            <p class="footer-text text-center text-center"><a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank"> Free Bootstrap template </a> from BootstrapDash templates</p> -->

        </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>

<?php
    $this->load->view('Layout/footer_include.php');
?>