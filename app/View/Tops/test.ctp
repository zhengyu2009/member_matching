
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Test</title>
    <link href="../css/croppie.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript" src="../js/croppie.js"></script>
    <script type="text/javascript">
    $( document ).ready(function() {
    var $uploadCrop;

    function readFile(input) {
    if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
    $uploadCrop.croppie('bind', {
    url: e.target.result
    });
    $('.upload-demo').addClass('ready');
    }
    reader.readAsDataURL(input.files[0]);
    }
    }

    $uploadCrop = $('#upload-demo').croppie({
    viewport: {
    width: 200,
    height: 200,
    type: 'circle'
    },
    boundary: {
    width: 300,
    height: 300
    }
    });

        $('#upload').on('change', function () {
            readFile(this);
        });
        $('.upload-result').on('click', function (ev) {
            $uploadCrop.croppie('result', {
                type: 'canvas',
                size: 'original'
            }).then(function (resp) {
                $('#imagebase64').val(resp);
                $('#form').submit();
            });
        });

    });
    </script>
    </head>
    <body>
    <form action="test2" id="form" method="post">
    <input type="file" id="upload" value="Choose a file">
    <div id="upload-demo"></div>
    <input type="hidden" id="imagebase64" name="imagebase64">
    <a href="#" class="upload-result">Send</a>
    </form>
    </body>
    </html>
