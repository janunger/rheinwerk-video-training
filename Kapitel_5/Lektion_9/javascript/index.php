<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Suche</title>
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .ui-autocomplete-loading {
            background: white url("img/ui-anim_basic_16x16.gif") right center no-repeat;
        }
    </style>
    <script src="js/jquery-1.12.4.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script>
        $(function () {
            function log(message) {
                $("<div>").text(message).prependTo("#log");
                $("#log").scrollTop(0);
            }

            $("#suchbegriff").autocomplete({
                source: function (request, response) {
                    $.ajax({
                        type: 'POST',
                        url: 'suche.php',
                        data: JSON.stringify({"suchbegriff": request.term}),
                        success: response,
                        dataType: 'json'
                    });
                },
                minLength: 2,
                select: function (event, ui) {
                    log(ui.item ?
                    "Gewählt: " + ui.item.value :
                    "Nichts gewählt, Eingabe war " + this.value);
                }
            });
        });
    </script>
</head>
<body>

<div class="ui-widget">
    <label for="suchbegriff">Suchbegriff Land:</label>
    <input id="suchbegriff">
</div>

<div class="ui-widget" style="margin-top:2em; font-family:sans-serif">
    Protokoll:
    <div id="log" style="height: 200px; width: 300px; overflow: auto;" class="ui-widget-content"></div>
</div>

</body>
</html>
