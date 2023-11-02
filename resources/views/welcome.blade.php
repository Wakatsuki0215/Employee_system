<!DOCTYPE html>
<html>
<head>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function(){
        $("p").click(function(){
            $(this).hide();
        });
    });
</script>
</head>
    <body>
        <h2>タイトル</h2>
        <p>ここをクリックするとテキストが非表示になります。</p>
    </body>
</html>