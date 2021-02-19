

<!-- Container fluid  -->

<div class="container-fluid">
    
    <!-- Bread crumb and right sidebar toggle -->
    
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Store Royalty</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Add Royalty</li>
            </ol>
        </div>
        
    </div>
    
    <!-- End Bread crumb and right sidebar toggle -->
    

    
    <!-- Start Page Content -->

    <div class="row">
        <div class="col-lg-12">

            <?php $error_msg = $this->session->flashdata('error_msg'); ?>
            <?php if (isset($error_msg)): ?>
                <div class="alert alert-danger delete_msg pull" style="width: 100%"> <i class="fa fa-times"></i> <?php echo $error_msg; ?> &nbsp;
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
            <?php endif ?>
            
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">  Store Royalty <?php echo $store['store_crm_code']; ?><a href="<?php echo base_url('admin/store/') ?>" class="btn btn-info pull-right"><i class="fa fa-list"></i> All Store </a></h4>

                </div>
                <div class="card-body">
                <?php echo form_open('admin/store/royalty/'.$store['id']); ?>

                <table border="1" width="100%">
    <tr>
		
		<th>Service Code</th>
		<th>Service Name</th>
		<th>Defualt Royalty (%)</th>
		<th>Royalty (%)</th>
		
	
    </tr>
    <?php
    // print_r($services);
    foreach($services as $s){
    ?>
    
    <tr>
             <td><?php echo $s['code'];?></td>   
             <td><?php echo $s['name'];?></td>   
             <td><?php echo $s['royality'];?></td>   
             <td>
             
             <input type="hidden" name="royality[<?php echo $store['id']; ?>][<?php echo $s['id']; ?>]" value="<?php echo  $s['royality']; ?>" />
             <input type="number" name="store_royalty[<?php echo $store['id']; ?>][<?php echo $s['id']; ?>]" value="<?php echo ($this->input->post('store_royalty') ? $this->input->post('store_royalty') : $s['store_royalty']); ?>" required min=0 max=100 step=0.001  />
             
             </td>   
    </tr>
    <?php }?>

    </table> 
<br/><br />
                <button type="submit">Save</button>

                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>

    <!-- End Page Content -->

</div>