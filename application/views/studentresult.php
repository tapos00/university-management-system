<?php $this->load->view('header'); ?>

<script>
    $(document).ready(function() {
        $('#studentID').on('change', function(e) {
            var studentID = $(this).val();
            if (studentID == 0) {
                $("#studentName").val('');
                $("#studentEmail").val('');
                $("#studentdepartment").val('');
                alert("please select a student Registration NO");
            }
            else {
                $.ajax(
                        {
                            type: "POST",
                            url: "<?php echo base_url(); ?>result/getStudent",
                            data: "id=" + studentID,
                            success: function(data)
                            {
                                $("#studentName").val(data.basic.name);
                                $("#studentEmail").val(data.basic.email);
                                $("#studentdepartment").val(data.basic.code);
                                if (data.courseInfo.length == 0) {
                                    alert("no course assign");
                                } else {
                                    var mySelect = $('#courseID');
                                    $('#courseID option').remove();
                                    mySelect.append(
                                            $('<option></option>').val("").html("select a course")
                                            );
                                    $.each(data.courseInfo, function(v, k) {
                                        mySelect.append(
                                                $('<option></option>').val(k.id).html(k.code)
                                                );
                                    });
                                }
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
            if ($this->session->flashdata('reg')) {
                echo $this->session->flashdata('reg');
            }
            echo validation_errors();
            $attributes = array('class' => 'form-horizontal', 'role' => 'form', 'id' => 'courseEnrollEntry');
            echo form_open('result/insertResult', $attributes);
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
                    <input type="text" name="studentName" class="form-control" id="studentName" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="studentEmail" class="col-sm-2 control-label">Student Email</label>
                <div class="col-sm-10">
                    <input type="text" name="studentEmail" class="form-control" id="studentEmail" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="studentdepartment" class="col-sm-2 control-label">Student Department</label>
                <div class="col-sm-10">
                    <input type="text" name="studentdepartment" class="form-control" id="studentdepartment" readonly>
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
                <label for="greatletter" class="col-sm-2 control-label">Great Letter</label>
                <div class="col-sm-10">
                    <select class="form-control" name="greatletter" id="greatletter">
                        <option value=" ">Select a letter</option>
                        <?php
                        foreach ($greadList as $aGread) {
                            ?>
                            <option value="<?php echo $aGread->greadID; ?>"><?php echo $aGread->letter; ?></option>
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
            <?php echo form_close(); ?>             
        </div> 
    </div>

    
</aside>

<?php $this->load->view('footer'); ?>