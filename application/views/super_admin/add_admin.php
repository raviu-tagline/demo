<div class="main-panel">
<div class="content-wrapper d-flex align-items-center card auth theme-one">
        <div class="row w-100">
            <div class="col-lg-4 mx-auto">
            <h2 class="text-center mb-4">Add Admin</h2>
            <div class="auto-form-wrapper">

                <?php if(!empty($error))
                        {
                            echo $error;
                        }

                        echo validation_errors();
                ?>

                <?php $data = array('enctype' => 'multipart/form-data'); ?>

                <?php echo form_open(base_url('super_admin/add_admin_data'), $data);?>

                <div class="form-group">
                    <div class="input-group">
                    <input type="text" class="form-control" name="reg_first_name" id="firstName" value="<?php echo set_value('reg_first_name')?>" placeholder="Enter your name">
                    <div class="input-group-append">
                        <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                    <input type="text" class="form-control" name="reg_last_name" id="reg_last_name" value="<?php echo set_value('reg_last_name')?>" placeholder="Enter your surname">
                    <div class="input-group-append">
                        <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                    <input type="email" class="form-control" name="reg_email" id="reg_email" value="<?php echo set_value('reg_email')?>" placeholder="Enter your mail address">
                    <div class="input-group-append">
                        <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                    </div>
                    </div>
                </div>
                <!-- <div class="form-group" style="margin: 0">
                    <div class="custom-file mb-3">
                        <input type="file" class="custom-file-input" id="imgUpload" name="imgUpload">
                        <label class="custom-file-label py-2" for="customFile" id="imgName" style="color: darkgrey;padding-top: 10px !important;">No File Choosen</label>
                    </div>
                </div> -->
                <?php

                    if(isset($_SESSION['role_id']))
                    { 
                        ?>
                    <div class="emp_role" style='margin: auto'>
                        <div class="form-group row">
                            <?php
                                if($_SESSION['role_id'] == 1)
                                {
                                    ?>
                                <div class="col-4 mx-auto">
                                    <div class="form-radio form-radio-flat">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" id="admin" name="role_id" value="2" checked> Admin <i class='input-helper'></i></label>
                                    </div>
                                </div>
                            <?php
                                }
                            ?>
                            
                        </div>
                    </div>
                <?php } ?>
                <div class="form-group">
                    <input type="submit" id="submit" class="btn btn-primary submit-btn btn-block" value="Register">
                </div>
                
                </form>
            </div>
            </div>
        </div>
        </div>
        
        
<script>
// Add the following code if you want the name of the file appear on select
$(document).ready(function (){
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
})
</script>
<?php
    $this->load->view('Layout/footer.php');
?>