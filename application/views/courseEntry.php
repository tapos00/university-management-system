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
            $attributes = array('class' => 'form-horizontal', 'role' => 'form', 'id' => 'courseEntry');
            echo form_open('course/insert', $attributes);
            ?>            
                <div class="form-group">
                    <label for="code" class="col-sm-2 control-label">Course Code</label>
                    <div class="col-sm-10">
                        <input type="text" name="code" class="form-control" id="code" placeholder="Type a Course Code...">
                    </div>
                </div>
                <div class="form-group">
                    <label for="credit" class="col-sm-2 control-label">Course Credit</label>
                    <div class="col-sm-10">
                        <input type="text" name="credit" class="form-control" id="credit" placeholder="Type a Course Creadit...">
                    </div>
                </div>
                <div class="form-group">
                    <label for="courseName" class="col-sm-2 control-label">Course Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="courseName" class="form-control" id="courseName" placeholder="Type a Course Name...">
                    </div>
                </div>
                <div class="form-group">
                    <label for="courseDescription" class="col-sm-2 control-label">Course Description</label>
                    <div class="col-sm-10">
                        <input type="text" name="courseDescription" class="form-control" id="courseDescription" placeholder="Type a Course Description...">
                    </div>
                </div>
                <div class="form-group">
                    <label for="department" class="col-sm-2 control-label">Department</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="department">
                            <?php
                            foreach ($departmentList as $aDepartment){
                            ?>
                            <option value="<?php echo $aDepartment->departmentID;?>"><?php echo $aDepartment->departmentCode;?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="semester" class="col-sm-2 control-label">Semester</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="semester">
                           <?php
                            foreach ($semesterList as $aSemester){
                            ?>
                            <option value="<?php echo $aSemester->semesterID;?>"><?php echo $aSemester->semesterName;?></option>
                            <?php } ?>
                        </select>
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
            if($courseList == 0){
                        echo 'No Data in database';
                    }  else {   
                        
            ?>
            <table class="table table-bordered" id="showDepartment">
                <thead>
                    <tr>
                        <td class="col-lg-1">Serial No</td>
                        <td class="col-lg-1">Course Code</td>
                        <td class="col-lg-1">Course Credit </td>
                        <td class="col-lg-2">Course Name </td>
                        <td class="col-lg-4">Course Description </td>
                        <td class="col-lg-1">Department Name </td>
                        <td class="col-lg-2">Semester</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i=1;
                        foreach ($courseList as $aCourse){
                    ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $aCourse->code; ?></td>
                            <td><?php echo $aCourse->credit; ?></td>
                            <td><?php echo $aCourse->name; ?></td>
                            <td><?php echo $aCourse->description; ?></td>
                            <td><?php echo $aCourse->dname; ?></td>
                            <td><?php echo $aCourse->semester; ?></td>
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