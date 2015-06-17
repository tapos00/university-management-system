<?php $this->load->view('header'); ?>
<script>
    $(document).ready(function() {
        $('#department').on('change', function(e) {
            var department = $(this).val();
            if (department == 0) {
                alert("please select a department first");
            }
            else {
                $.ajax(
                        {
                            type: "POST",
                            url: "<?php echo base_url(); ?>assing/getTecherOFDepartment",
                            data: "id=" + department,
                            success: function(data)
                            {
                                //alert(data.credit);
                                var mySelect = $('#teacherID');
                                $('#teacherID option').remove();
                                mySelect.append(
                                        $('<option></option>').val("").html("select a teacher")
                                        );
                                $.each(data, function(v, k) {
                                    mySelect.append(
                                            $('<option></option>').val(k.teacherId).html(k.teacherName)
                                            );
                                });

                            }, dataType: 'json'
                        });
            }
        });
        $('#teacherID').on('change', function(e) {
            var teacherId = $(this).val();
            if (teacherId == 0) {
                alert("please select a teacher first");
                $("#teacherCredit").val('');
                $("#remainingCredit").val('');
            }
            else {
                $.ajax(
                        {
                            type: "POST",
                            url: "<?php echo base_url(); ?>assing/getTeacherInfo",
                            data: "id=" + teacherId,
                            success: function(data)
                            {
                                $("#teacherCredit").val(data.credit);
                                $("#remainingCredit").val(data.rcredit);

                            }, dataType: 'json'
                        });
            }
        });
        $('#courseID').on('change', function(e) {
            var courseID = $(this).val();
            if (courseID == 0) {
                alert("please select a Course Code first");
                $("#courseName").val('');
                $("#courseCredit").val('');
            }
            else {
                $.ajax(
                        {
                            type: "POST",
                            url: "<?php echo base_url(); ?>assing/getCourseCredit",
                            data: "id=" + courseID,
                            success: function(data)
                            {
                                //alert(data.credit);
                                $("#courseName").val(data.courseName);
                                $("#courseCredit").val(data.credit);

                            }, dataType: 'json'
                        });
            }
        });
        $("#courseAssingEntry").submit(function(e) {
            var teacherRemain = parseInt($("#remainingCredit").val());
           
            var coruseCredit = parseInt($("#courseCredit").val());
           
            if (coruseCredit > teacherRemain) {
                var r = confirm("are you want to increase course!");
                if (r == true)
                {
                   
                }
                else
                {
                    return false;
                }
            }
        });
    });
</script>
<aside>   
    <div class="row">
        <div class="col-lg-12">
            <?phP
            echo validation_errors();
            $attributes = array('class' => 'form-horizontal', 'role' => 'form', 'id' => 'courseAssingEntry');
            echo form_open('assing/insertAssing', $attributes);
            ?>            
            <div class="form-group">
                <label for="department" class="col-sm-2 control-label">Department</label>
                <div class="col-sm-10">
                    <select class="form-control" name="department" id="department">
                        <option value="">Select a Department</option>
                        <?php
                        foreach ($departmentList as $aDepartment) {
                            ?>
                            <option value="<?php echo $aDepartment->departmentID; ?>"><?php echo $aDepartment->departmentCode; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="teacherID" class="col-sm-2 control-label">Teacher name</label>
                <div class="col-sm-10">
                    <select class="form-control" name="teacherID" id="teacherID">
                        <option value="">Select a Teacher Name</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="teacherCredit" class="col-sm-2 control-label">Teacher Credit</label>
                <div class="col-sm-10">
                    <input type="text" name="teacherCredit" class="form-control" id="teacherCredit" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="remainingCredit" class="col-sm-2 control-label">Remaining Credit</label>
                <div class="col-sm-10">
                    <input type="text" name="remainingCredit" class="form-control" id="remainingCredit" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="courseID" class="col-sm-2 control-label">Course Code</label>
                <div class="col-sm-10">
                    <select class="form-control" name="courseID" id="courseID">
                        <option value="">Select a Course</option>
                        <?php foreach ($courseList as $aCourse) {
                            ?>
                            <option value="<?php echo $aCourse->courseID; ?>"><?php echo $aCourse->code; ?></option>
                            <?php }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="courseName" class="col-sm-2 control-label">Course Name</label>
                <div class="col-sm-10">
                    <input type="text" name="courseName" class="form-control" id="courseName" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="courseCredit" class="col-sm-2 control-label">Course Credit</label>
                <div class="col-sm-10">
                    <input type="text" name="courseCredit" class="form-control" id="courseCredit" readonly>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Save">
                    <input type="reset" name="reset" class="btn btn-danger btn-lg" value="Reset">
                </div>
            </div>
            <?php echo form_close(); ?>             
        </div> 
    </div>

    <div class="row">
        <div class="col-lg-12 max_height">
            <table class="table table-bordered" id="showDepartment">
                <thead>
                    <tr>
                        <td class="col-lg-1">Serial No</td>
                        <td class="col-lg-1">Department Code</td>
                        <td class="col-lg-3">Teacher Name </td>
                        <td class="col-lg-1">Teacher Credit </td>
                        <td class="col-lg-1">Course code </td>
                        <td class="col-lg-3">Course Name </td>
                        <td class="col-lg-1">Course Credit</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($assignList == 0) {
                        echo 'No Data in database';
                    } else {
                        $i = 1;
                        foreach ($assignList as $aAssign) {
                            ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $aAssign->departmentCode; ?></td>
                                <td><?php echo $aAssign->teacherName; ?></td>
                                <td><?php echo $aAssign->teacherCredit; ?></td>
                                <td><?php echo $aAssign->code; ?></td>
                                <td><?php echo $aAssign->courseName; ?></td>
                                <td><?php echo $aAssign->credit; ?></td>

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