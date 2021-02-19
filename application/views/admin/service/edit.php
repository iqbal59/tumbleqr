

<!-- Container fluid  -->

<div class="container-fluid">
    
    <!-- Bread crumb and right sidebar toggle -->
    
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Service</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Edit Service</li>
            </ol>
        </div>
        <div class="col-md-7 col-4 align-self-center">
            <div class="d-flex m-t-10 justify-content-end">

                
            </div>
        </div>
    </div>
    
    <!-- End Bread crumb and right sidebar toggle -->
    

    
    <!-- Start Page Content -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="m-b-0 text-white"> Edit Service <a href="<?php echo base_url('admin/service') ?>" class="btn btn-info pull-right"><i class="fa fa-list"></i> All Services </a></h4>

                </div>
                <div class="card-body">
                    

                <?php echo form_open('admin/service/edit/'.$service['id']); ?>

<div>
    Name : 
    <input type="text" name="name" value="<?php echo ($this->input->post('name') ? $this->input->post('name') : $service['name']); ?>" />
</div>
<div>
    <span class="text-danger">*</span>Code : 
    <input type="text" name="code" value="<?php echo ($this->input->post('code') ? $this->input->post('code') : $service['code']); ?>" />
    <span class="text-danger"><?php echo form_error('code');?></span>
</div>
<div>
    Sac Code : 
    <input type="text" name="sac_code" value="<?php echo ($this->input->post('sac_code') ? $this->input->post('sac_code') : $service['sac_code']); ?>" />
</div>
<div>
    Royality : 
    <input type="number" name="royality" value="<?php echo ($this->input->post('royality') ? $this->input->post('royality') : $service['royality']); ?>" required min=0 max=100 step=0.01   />
</div>

<button type="submit">Save</button>

<?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>


    <!-- End Page Content -->

</div>