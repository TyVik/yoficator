<?php
if (isset($_POST["text"])) {
    $PATH_YOFICATOR = "Text_Yoficator-1.0.7" . DIRECTORY_SEPARATOR;
    include $PATH_YOFICATOR . "Text" . DIRECTORY_SEPARATOR . "Yoficator.php";
    include $PATH_YOFICATOR . "ReflectionTypeHint.php";
    include $PATH_YOFICATOR . "UTF8.php";

    $yo = new Text_Yoficator();
    $text = $yo->parse($_POST['text']);
    echo $text;
    die();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ё-фикатор</title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
</head>
<body>
<h1>Ё-фикатор</h1>
<form method="post">
    <textarea name="msg" id="id_text" cols="65" rows="15" style="width:100%; height:15em" placeholder="Вставьте плохой текст сюда"></textarea>
    <input name="decode" id="yo" value="ё-кнем" type="submit">
</form>
<script type="text/javascript">
    $(document).ready(
        function () {
            $("form").submit( function () {
                if($('#id_text').val()){
                    $.ajax({
                        type: 'POST',
                        url: "http://yo.local",
                        error: function (r) { alert("Всё плохо :( Сервер не смог переварить этот текст."); },
                        success: function (r) {
                            $('#id_text').val(r);
                        },
                        data: {
                            text: $('#id_text').val(),
                        }
                    })
                }
                return false;
            });
        }
    );
</script>
</body>
</html>
