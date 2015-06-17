<?php $this->load->view('header'); ?>

<aside>   
    <div class="row">
        <div class="col-lg-12">
            <?php
            if($this->session->flashdata('reg')){
                echo $this->session->flashdata('reg');
            }
            echo validation_errors();
            $attributes = array('class' => 'form-horizontal', 'role' => 'form', 'id' => 'studentEntry');
            echo form_open('student/insertStuden', $attributes);
            ?>            
                <div class="form-group">
                    <label for="studentName" class="col-sm-2 control-label">Student Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="studentName" class="form-control" id="studentName" placeholder="Type Student Name...">
                    </div>
                </div>
                <div class="form-group">
                    <label for="studentEmail" class="col-sm-2 control-label">Student Email</label>
                    <div class="col-sm-10">
                        <input type="text" name="studentEmail" class="form-control" id="studentEmail" placeholder="Type Student Email...">
                    </div>
                </div>
                <div class="form-group">
                    <label for="studentContact" class="col-sm-2 control-label">Student Contact</label>
                    <div class="col-sm-10">
                        <input type="text" name="studentContact" class="form-control" id="studentContact" placeholder="Type Student Contact...">
                    </div>
                </div>
                <div class="form-group">
                    <label for="studentAddress" class="col-sm-2 control-label">Student Address</label>
                    <div class="col-sm-10">
                        <input type="text" name="studentAddress" class="form-control" id="studentAddress" placeholder="Type Student Address...">
                    </div>
                </div>
               
                <div class="form-group">
                    <label for="department" class="col-sm-2 control-label">Department</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="department" id="department">
                            <?php
                            foreach ($departmentList as $aDepartment){
                            ?>
                            <option value="<?php echo $aDepartment->departmentID;?>"><?php echo $aDepartment->departmentCode;?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Registration">
                        <input type="reset" name="reset" class="btn btn-danger btn-lg" value="Reset">
                    </div>
                </div>
            <?php echo form_close();?>             
        </div> 
    </div>

    <div class="row">
        <div class="col-lg-12 max_height">
            <table class="table table-bordered" id="showDepartment">
                <thead>
                    <tr>
                        <td class="col-lg-1">Serial No</td>
                        <td class="col-lg-1">Student Registration NO</td>
                        <td class="col-lg-2">Student Name</td>
                        <td class="col-lg-2">Student Email </td>
                        <td class="col-lg-1">Student Contact </td>
                        <td class="col-lg-1">Student Date </td>
                        <td class="col-lg-3">Student Address </td>            
                        <td class="col-lg-1">Department Code </td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if($studentList == 0){
                        echo 'No Data in database';
                    }  else {
                        $i=1;
                        foreach ($studentList as $aStudent){
                    ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $aStudent->studentRegNO; ?></td>
                            <td><?php echo $aStudent->studentName; ?></td>
                            <td><?php echo $aStudent->studentEmail; ?></td>
                            <td><?php echo $aStudent->studentContact; ?></td>
                            <td><?php echo $aStudent->studentAdmitDate; ?></td>
                            <td><?php echo $aStudent->studentAddress; ?></td>
                            <td><?php echo $aStudent->departmentCode; ?></td>
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