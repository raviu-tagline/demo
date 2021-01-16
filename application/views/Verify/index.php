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
            <?php echo form_open(base_url('change_password'))?>
                <input type='hidden' value="<?php echo $token?>" name='hdnToken'/>
                <div class="form-group">
                    <label class="label">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" name="user_password" value="<?php echo set_value('user_password')?>" placeholder="*********">
                        <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="label">Confirm Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" name="conf_password" value="<?php echo set_value('conf_password')?>" placeholder="*********">
                        <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <input type="submit" name="login" class="btn btn-primary submit-btn btn-block" value="Change Password">
                </div>
            </form>
            </div>
            <ul class="auth-footer">
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