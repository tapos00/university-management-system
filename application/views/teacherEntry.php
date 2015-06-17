<?php $this->load->view('header'); ?>

<script>
    $(document).ready(function() {

    });
</script>
<aside>   
    <div class="row">
        <div class="col-lg-12">
            <?phP
            if ($this->session->flashdata('insert')) {
                echo $this->session->flashdata('insert');
            }

            echo validation_errors();
            $attributes = array('class' => 'form-horizontal', 'role' => 'form', 'id' => 'teacherEntry');
            echo form_open('teacher/insertTeacher', $attributes);
            ?>            
            <div class="form-group">
                <label for="teacherName" class="col-sm-2 control-label">Teacher Name</label>
                <div class="col-sm-10">
                    <input type="text" name="teacherName" class="form-control" id="teacherName" placeholder="Type Teacher Name...">
                </div>
            </div>
            <div class="form-group">
                <label for="teacherAddress" class="col-sm-2 control-label">Teacher Address</label>
                <div class="col-sm-10">
                    <input type="text" name="teacherAddress" class="form-control" id="teacherAddress" placeholder="Type Teacher Address...">
                </div>
            </div>
            <div class="form-group">
                <label for="teacherEmail" class="col-sm-2 control-label">Teacher Email</label>
                <div class="col-sm-10">
                    <input type="text" name="teacherEmail" class="form-control" id="teacherEmail" placeholder="Type Teacher Email...">
                </div>
            </div>
            <div class="form-group">
                <label for="teacherContactNO" class="col-sm-2 control-label">Teacher Contact NO</label>
                <div class="col-sm-10">
                    <input type="text" name="teacherContactNO" class="form-control" id="teacherContactNO" placeholder="Type Teacher Contact No...">
                </div>
            </div>
            <div class="form-group">
                <label for="designationID" class="col-sm-2 control-label">Designation</label>
                <div class="col-sm-10">
                    <select class="form-control" name="designationID">
                        <?php
                        foreach ($designationList as $aDesignation) {
                            ?>
                            <option value="<?php echo $aDesignation->designationID; ?>"><?php echo $aDesignation->designationName; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="department" class="col-sm-2 control-label">Department</label>
                <div class="col-sm-10">
                    <select class="form-control" name="department">
                        <?php
                        foreach ($departmentList as $aDepartment) {
                            ?>
                            <option value="<?php echo $aDepartment->departmentID; ?>"><?php echo $aDepartment->departmentCode; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="teacherCredit" class="col-sm-2 control-label">Teacher Credit</label>
                <div class="col-sm-10">
                    <input type="text" name="teacherCredit" class="form-control" id="teacherCredit" placeholder="Type Teacher Creadit...">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Save">
                    <input type="reset" name="reset" class="btn btn-danger btn-lg" value="Reset">
                </div>
            </div>
            </form>             
        </div> 
    </div>

    <div class="row">
        <div class="col-lg-12 max_height">
            <?php
            if ($teacherList == 0) {
                        echo 'No Data in database';
                    } else {
            ?>
            <table class="table table-bordered" id="showDepartment">
                <thead>
                    <tr>
                        <td class="col-lg-1">Serial No</td>
                        <td class="col-lg-1">Teacher Name</td>
                        <td class="col-lg-1">Teacher Address </td>
                        <td class="col-lg-2">Teacher Email </td>
                        <td class="col-lg-4">Teacher Contact </td>
                        <td class="col-lg-1">Designation Name </td>
                        <td class="col-lg-1">Department Code </td>
                        <td class="col-lg-1">Teacher Credit</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                        $i = 1;
                        foreach ($teacherList as $aTeacher) {
                            ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $aTeacher->teacherName; ?></td>
                                <td><?php echo $aTeacher->teacherAddress; ?></td>
                                <td><?php echo $aTeacher->teacherEmail; ?></td>
                                <td><?php echo $aTeacher->teacherContactNO; ?></td>
                                <td><?php echo $aTeacher->designationName; ?></td>
                                <td><?php echo $aTeacher->departmentCode; ?></td>
                                <td><?php echo $aTeacher->teacherCredit; ?></td>
                            </tr>
                        <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</aside>

<?php $this->load->view('footer'); ?>