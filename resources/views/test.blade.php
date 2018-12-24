<html>
<head>
    <title>Ajax Example</title>

    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
    </script>

    <script>
        function getMessage() {
            $.ajax({
                type:'GET',
                url:'/ajax',
                data:'_token = <?php echo csrf_token() ?>',
                success:function(data) {
                    $("#msg").html(Math.floor(data.msg.progress_ms / 60000) + ":" + Math.floor(data.msg.progress_ms / 1000) % 60);
                }
            });
        }

        setInterval(getMessage, 1000)
    </script>
</head>

<body>
<div id = 'msg'>This message will be replaced using Ajax.
    Click the button to replace the message.</div>
<?php
echo Form::button('Replace Message',['onClick'=>'getMessage()']);
?>
</body>

</html>
