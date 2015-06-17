<?php $this->load->view('header'); ?>

<script>
    $(document).ready(function() {
        
    });
</script>
<aside>   
    <div class="row">
        <div class="col-lg-12">
            <?php
            if($this->session->flashdata('insert')){
                echo $this->session->flashdata('insert');
            }
            echo validation_errors();
            $attributes = array('class' => 'form-horizontal', 'role' => 'form', 'id' => 'depatrmentEntry');
            echo form_open('department/insert', $attributes);
            ?>	
            <form class="form-horizontal" role="form" method="post">
                <div class="form-group">
                    <label for="departmentCode" class="col-sm-2 control-label">Department Code</label>
                    <div class="col-sm-10">
                        <input type="text" name="departmentCode" class="form-control" id="departmentCode" placeholder="Type a Department Name...">
                    </div>
                </div>
                <div class="form-group">
                    <label for="departmentName" class="col-sm-2 control-label">Department Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="departmentName" class="form-control" id="departmentName" placeholder="Type a Department Code...">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Submit">
                        <input type="reset" name="reset" class="btn btn-danger btn-lg" value="Reset">
                    </div>
                </div>
            </form>             
        </div> 
    </div>

    <div class="row">
        <div class="col-lg-12 max_height">
            <?php
                     if($departmentList == 0){
                        echo 'No Data in database';
                    }  else {
                    $i = 1;
                    ?>
            <table class="table table-bordered" id="showDepartment">
                <thead>
                    <tr>
                        <td class="col-lg-1">Serial No</td>
                        <td class="col-lg-4">Department Code</td>
                        <td class="col-lg-7">Department Name</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                     
                    foreach ($departmentList as $aDepartment) {
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo strtoupper($aDepartment->departmentCode); ?></td>
                            <td><?php echo $aDepartment->departmentName; ?></td>
                        </tr>
                    <?php } 
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</aside>

<?php $this->load->view('footer'); ?>