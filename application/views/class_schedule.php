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
                            url: "<?php echo base_url(); ?>class_schedule/getSchedule",
                            data: "id=" + department,
                            success: function(data)
                            {
                                var mySelect = $("#showDepartment tbody");
                                $("#showDepartment tbody tr").remove();
                                $.each(data, function(v, k) {
                                    mySelect.append(
                                            "<tr><td>"+k.code+"</td><td>"+k.name+"</td><td>"+k.list+"</td></tr>"
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

            
            <?php echo form_close(); ?>             
        </div> 
    </div>

    <div class="row">
        <div class="col-lg-12 max_height">
            <table class="table table-bordered" id="showDepartment">
                <thead>
                    <tr>
                        
                        <td class="col-lg-1">Course code </td>
                        <td class="col-lg-2">Course Name </td>
                        <td class="col-lg-9">Schedule info</td>
                    </tr>
                </thead>
                <tbody>
                   
                </tbody>
            </table>
        </div>
    </div>
</aside>

<?php $this->load->view('footer'); ?>