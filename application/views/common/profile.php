<?php
    $arr = array();
    $mail = '';
    if(!empty($records) || isset($records))
    {
        foreach($records as $key => $val)
        {
            foreach($val as $sub_key => $sub_val)
            {
                if($sub_key == 'role_id')
                {
                    $sub_key = 'user_role';
                }

                if($sub_key == 'reg_token')
                {
                    continue;
                }
                $arr[$sub_key] = $sub_val;
            }
        }
        $mail = $arr['reg_email'];
        $user = $arr['reg_image'];
        $name = $arr['reg_first_name']." ".$arr['reg_last_name'];
        $date = $arr['reg_birth_date'];
    }
?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="card m-auto px-auto col-6">
            <div class="card-body">
                <h4 class="card-title"><b>PROFILE</b></h4>
                <table class="table table-reponsive">
                    <tbody>
                        <?php
                            $this->form_validation->set_error_delimiters("<p class='error'>",'</p>');
                            echo validation_errors();

                            if($_SESSION['role_id'] == 1)
                            {
                                echo form_open_multipart('super_admin/update_profile');
                            }
                            
                            if($_SESSION['role_id'] == 2)
                            {
                                echo form_open_multipart('admin/update_profile');
                            }

                            if($_SESSION['role_id'] == 3)
                            {
                                echo form_open_multipart('employee/update_profile');
                            }
                        ?>
                            <tr>
                                <td rowspan=3>
                                    <div class="card" style="width: 250px;height: auto;" id='profile'>
                                        <div class="card-body" style="padding: 0 0px;width: auto;">
                                            <img src="<?php echo !empty($arr)?base_url().'images/'.$user:base_url().'images/man_avtar.png'?>" id='image' alt="no-image" style="border-radius: 5px;width: 250px;height: inherit;"/>
                                        </div>
                                    </div>
                                    <br>
                                    <input type="file" name="profile_pic" id="profile_pic" class="form-control" style="width: 250px;" accept="image/*"/>
                                </td>
                                <td>
                                    <b>NAME</b>
                                </td>
                                <td>
                                    <input type="text" id="name" name="name" value="<?php echo !empty($arr)?$name : set_value('name')?>" class="form-control"/>
                                </td>
                            </tr>
                            <tr>
                                <!-- <td>2.1</td> -->
                                <td>
                                    <b>EMAIL</b>
                                </td>
                                <td>
                                    <input type="text" id="email" name="email" value="<?php echo $mail?>" disabled class="form-control"/>
                                </td>
                            </tr>
                            <tr>
                                <!-- <td>3.1</td> -->
                                <td>
                                    <b>BIRTH DATE</b>
                                </td>
                                <td>
                                    <input type="text" id="bdate" name="bdate" value="<?php echo !empty($arr)?$date:set_value('bdate')?>" class="form-control"/>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=3>
                                    <input type="submit" class="btn btn-primary w-100" id='update_profile' value='Update Profile'>
                                </td>
                            </tr>
                        </form>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function readURL(input) 
        {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                    $('#image').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $(document).ready(function (){
            $('#bdate').get(0).type = 'date';
            $('#profile_pic').on('change',function(){
                readURL(this);
            });
        })
    </script>
<?php
    $this->load->view('layout/footer.php');
?>



