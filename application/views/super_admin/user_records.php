<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">User Records</h4>
                <p class="card-description"> Number of Records <?php echo count($rec); ?> </p>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $count = 0;
                        foreach($rec as $key => $val)
                        { 
                            $count++; ?>
                        <tr>
                            <?php   
                                foreach($val as $sub_k => $sub_val)
                                {
                                    if($sub_k == 'reg_first_name')
                                    {
                                        $fname = $sub_val;
                                        continue;
                                    }

                                    if($sub_k == 'reg_last_name')
                                    {
                                        $lname = $sub_val;
                                        echo "<td>$fname $lname</td>";
                                        continue;
                                    }

                                    if($sub_k == 'reg_token' || $sub_k == 'reg_image' || $sub_k == 'role_id')
                                    {
                                        continue;
                                    }
                                    else
                                    {?>
                                        <td><?php echo $sub_val; ?>   
                            <?php   }
                                }
                            } ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php
    $this->load->view('Layout/footer.php');
?>