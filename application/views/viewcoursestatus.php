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
                            url: "<?php echo base_url(); ?>viewcourse/viewcourseStatusInfo",
                            data: "id=" + department,
                            success: function(data)
                            {
                                if(data.msg==true){
                                    $('#showCourseStatus tbody tr').remove();
                                    alert("no course is assign this department");
                                    
                                }else{
                                //alert(data.credit);
                                var mySelect = $('#showCourseStatus tbody');
                                $('#showCourseStatus tbody tr').remove();
                                var i  = 0;
                                $.each(data, function(v, k) {

                                    mySelect.append(
                                            "<tr><td>"+(++i)+"</td><td>" + k.Code + "</td><td>" + k.Name + "</td><td>" + k.Semester + "</td><td>" + k.Assign + "</td></tr>"

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
            <?phP
            echo validation_errors();
//            $attributes = array('class' => 'form-horizontal', 'role' => 'form', 'id' => 'courseAssingEntry');
//            echo form_open('viewcourse/insertAssing', $attributes);
            ?>            
            <div class="form-group">
                <label for="department" class="col-sm-2 control-label">Department</label>
                <div class="col-sm-10">
                    <select class="form-control" name="department"  id="department">
                        <option value="">Select a department</option>
                        <?php
                        foreach ($departmentList as $aDepartment) {
                            ?>
                            <option value="<?php echo $aDepartment->departmentID; ?>"><?php echo $aDepartment->departmentCode; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <?php echo form_close();?>            
        </div> 
    </div><br><br>

    <div class="row">
        <div class="col-lg-12 max_height">
            <table class="table table-bordered" id="showCourseStatus">
                <thead>
                    <tr>
                        <td class="col-lg-1">Serial No</td>
                        <td class="col-lg-1">Course Code</td>
                        <td class="col-lg-3">Course Name </td>
                        <td class="col-lg-1">Course Semester</td>
                        <td class="col-lg-1">Assign To</td>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</aside>

<?php $this->load->view('footer'); ?>