<?php
    $this->load->view('Layout/header.php');

    $this->load->view('Layout/navbar.php');

   if(!empty($name))
   {
        $data['name'] = $name;
   }
   if(!empty($role))
   {
        $data['role'] = $role;
   }

    $this->load->view('Layout/sidebar.php', $data);
?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        
    </div>
<!-- content-wrapper ends -->
<?php
    $this->load->view('Layout/footer.php');
?>