<?php $this->load->view('header'); ?>
<script>
    $(document).ready(function() {
        $("#course").click(function() {
            $.ajax(
                    {
                        type: "POST",
                        url: "<?php echo base_url(); ?>unassign/unassignCourse",
                        success: function(data)
                        {
                           alert(data.msg);
                           window.location.href = 'http://127.0.0.1/codeIgniter_UniversitySystem/assing';
                        }, dataType: 'json'
                    });

        });
         $("#classromm").click(function() {
            $.ajax(
                    {
                        type: "POST",
                        url: "<?php echo base_url(); ?>allocate/unassignclassroom",
                        success: function(data)
                        {
                           alert(data.msg);
                           window.location.href = 'http://127.0.0.1/codeIgniter_UniversitySystem/assing';
                        }, dataType: 'json'
                    });

        });
    });
</script>
<aside style="height: 500px;">   
    <div class="row">
        <div class="col-lg-12">
            <button type="button" class="btn btn-primary btn-lg btn-block" id="course">Unassign Course</button>
            <button type="button" class="btn btn-default btn-lg btn-block" id="classromm">Unassign Class Room</button>
        </div>

    </div>

</aside>

<?php $this->load->view('footer'); ?>