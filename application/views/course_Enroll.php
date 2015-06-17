<?php $this->load->view('header'); ?>

<script>
    $(document).ready(function() {
        $('#studentID').on('change', function(e) {
            var studentID = $(this).val();
            if (studentID == 0) {
                alert("please select a student Registration NO");
            }
            else {
                $.ajax(
                        {
                            type: "POST",
                            url: "<?php echo base_url(); ?>index.php/enrollCourse/getStudenInfo",
                            data: "id=" + studentID,
                            success: function(data)
                            {
                                $("#studentName").val(data.name);
                                $("#studentEmail").val(data.email);
                                $("#studentdepartment").val(data.code);

                            }, dataType: 'json'
                        });
            }
        });
    });
</script>
<aside>   
    <div class="row">
        <div class="col-lg-12">
            <?php
            if($this->session->flashdata('reg')){
                echo $this->session->flashdata('reg');
            }
            echo validation_errors();
            $attributes = array('class' => 'form-horizontal', 'role' => 'form', 'id' => 'courseEnrollEntry');
            echo form_open('enrollCourse/insertCourseEnroll', $attributes);
            ?>            
            <div class="form-group">
                <label for="studentID" class="col-sm-2 control-label">Student Registration No</label>
                <div class="col-sm-10">
                    <select class="form-control" name="studentID" id="studentID">
                        <option value=" ">Select a Registration NO</option>
                        <?php
                        foreach ($studentList as $aStudent) {
                            ?>
                            <option value="<?php echo $aStudent->studentID; ?>"><?php echo $aStudent->studentRegNO; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="studentName" class="col-sm-2 control-label">Student Name</label>
                <div class="col-sm-10">
                    <input type="text" name="studentName" class="form-control" id="studentName" disabled>
                </div>
            </div>
            <div class="form-group">
                <label for="studentEmail" class="col-sm-2 control-label">Student Email</label>
                <div class="col-sm-10">
                    <input type="text" name="studentEmail" class="form-control" id="studentEmail" disabled>
                </div>
            </div>
            <div class="form-group">
                <label for="studentdepartment" class="col-sm-2 control-label">Student Department</label>
                <div class="col-sm-10">
                    <input type="text" name="studentdepartment" class="form-control" id="studentdepartment" disabled>
                </div>
            </div>
            <div class="form-group">
                <label for="courseID" class="col-sm-2 control-label">Course Code</label>
                <div class="col-sm-10">
                    <select class="form-control" name="courseID" id="courseID">
                        <option value=" ">Select a Course Code</option>
                        <?php
                        foreach ($courseList as $aCourse) {
                            ?>
                            <option value="<?php echo $aCourse->courseID; ?>"><?php echo $aCourse->code; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Enroll">
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
                        <td class="col-lg-1">Student Reg No</td>
                        <td class="col-lg-3">Student Name </td>
                        <td class="col-lg-1">Student Email </td>
                        <td class="col-lg-1">Student Department </td>
                        <td class="col-lg-3">Course Name </td>
                        <td class="col-lg-1">Enroll Date</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if($enrollList == 0){
                        echo 'No Data in database';
                    }  else {
                        $i = 1;
                    foreach ($enrollList as $aEnroll) {
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $aEnroll->studentRegNO; ?></td>
                            <td><?php echo $aEnroll->studentName; ?></td>
                            <td><?php echo $aEnroll->studentEmail; ?></td>
                            <td><?php echo $aEnroll->departmentCode; ?></td>
                            <td><?php echo $aEnroll->code; ?></td>
                            <td><?php echo $aEnroll->enrollDate; ?></td>

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