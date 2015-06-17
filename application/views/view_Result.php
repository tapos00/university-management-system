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
                            url: "<?php echo base_url(); ?>viewResult/getStudentView",
                            data: "id=" + studentID,
                            success: function(data)
                            {
                                $("#studentName").val(data.basic.name);
                                $("#studentEmail").val(data.basic.email);
                                $("#studentdepartment").val(data.basic.code);
                                
                                var mySelect = $('#viewResultTable tbody');
                                $('#viewResultTable tbody tr').remove(); 
                                $.each(data.result, function(v, k) {
                                    mySelect.append(
                                        "<tr><td>" + k.code + "</td><td>" + k.name + "</td><td>" + k.letter + "</td></tr>"
                                        );
                                });
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
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Make PDF">
                    <input type="reset" name="reset" class="btn btn-danger btn-lg" value="Reset">
                </div>
            </div>
            <?php echo form_close();?>             
        </div> 
    </div>

    <div class="row">
        <div class="col-lg-12 max_height">
            <table class="table table-bordered" id="viewResultTable">
                <thead>
                    <tr>                       
                        <td class="col-lg-4">Course Code</td>                        
                        <td class="col-lg-4">Course Name </td>
                        <td class="col-lg-4">Student Grade</td>                        
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>
</aside>

<?php $this->load->view('footer'); ?>