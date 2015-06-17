<?php $this->load->view('header'); ?>
<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.22/themes/redmond/jquery-ui.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/jquery.ptTimeSelect.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.ptTimeSelect.js"></script>
<script type="text/javascript">
    var k = null;
    $(document).ready(function() {
        $('input[name="from"]').ptTimeSelect();
        $('input[name="to"]').ptTimeSelect();
        var bootstrap_alert = function() {
        }
        function tapos() {
            $("#allocate").submit();
        }
        bootstrap_alert.warning = function(message) {
            $('#alert_placeholder').html(message);
        }
        $('#allocate').on('submit', function(e) {
            $("#alert_placeholder").html('');
            $("#myyy").hide();
           var m= true;
            $.ajax({
                type: "POST",
                async: false,
                url: "<?php echo base_url(); ?>allocate/getMydata",
                data: $("#allocate").serialize(),
                dataType: 'json',
                success: function(data) {
                    var mm = "<table class='table'><thead><tr><th>room</th><th>day</th><th>dep</th><th>cou</th><th>start</th><th>end</th></tr></thead><tbody>";
                    if (data.error == true) { 
                        $.each(data.msg, function(v, k) {
                            mm = mm + "<tr><th>" + k.room + "</th><th>" + k.day + "</th><th>" + k.dname + "</th><th>" + k.code + "</th><th>" + k.start + "</th><th>" + k.end + "</th></tr>";
                            
                            
                        });
                         m = false;
                        mm = mm + "</tbody></table>";
                            bootstrap_alert.warning(mm);
                    } else {
                        
                    }
                }
                
            });
            if(m==false){
            e.preventDefault(); 
            }
        });
    });
</script>
<aside>   
    <div class="row">
        <div class="col-lg-12">
            <div id="myyy">
            <?php
            if($this->session->flashdata('insert')){
                echo $this->session->flashdata('insert');
            }
            echo validation_errors();
            ?>
</div>
            <div id = "alert_placeholder"></div>
            <?php
            $attributes = array('class' => 'form-horizontal', 'role' => 'form', 'id' => 'allocate');
            echo form_open('allocate/newAllocate', $attributes);
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
                <label for="roomNo" class="col-sm-2 control-label">Room NO</label>
                <div class="col-sm-10">
                    <select class="form-control" name="roomNo" id="roomNo">
                        <option value="">Select a Room</option>
                        <?php foreach ($roomList as $aRoom) {
                            ?>
                            <option value="<?php echo $aRoom->roomID; ?>"><?php echo $aRoom->roomNumber; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="timeDay" class="col-sm-2 control-label">Day</label>
                <div class="col-sm-10">
                    <select class="form-control" name="timeDay" id="timeDay">
                        <option value="">Select a Course</option>
                        <?php foreach ($dayList as $aDay) {
                            ?>
                            <option value="<?php echo $aDay->dayID; ?>"><?php echo $aDay->dayName; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="from" class="col-sm-2 control-label">From</label>
                <div class="col-sm-10">
                    <input type="from" name="from" class="form-control" id="from" placeholder="from">
                </div>

            </div>
            <div class="form-group">
                <label for="to" class="col-sm-2 control-label">To</label>
                <div class="col-sm-10">
                    <input type="to" name="to" class="form-control" id="to" placeholder="to">
                </div>

            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" name="submit" id="submitButton" class="btn btn-primary btn-lg" value="Save">
                    <input type="reset" name="reset" class="btn btn-danger btn-lg" value="Reset">
                </div>
            </div>
            <?php echo form_close(); ?>             
        </div> 
    </div>

   
</aside>
<div style="height: 200px"></div>
<?php $this->load->view('footer'); ?>