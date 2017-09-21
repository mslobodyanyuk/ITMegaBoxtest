<title>ITMegaBox test</title>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(document). ready( function() {
            var minDate = new Date();
            $( "#datepicker" ).datepicker({
                minDate: minDate,
                monthNames: ['Январь', 'Февраль', 'Март', 'Апрель',
                    'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь',
                    'Октябрь', 'Ноябрь', 'Декабрь'],
                dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
                dateFormat: 'dd.mm.yy',
                firstDay: 1,
                onClose: function(selectedDate){
                    $('#return').datepicker("option", "minDate", selectedDate);
                }
            })
        } );
    </script>
</head>
<h1>Welcome to test program!!!</h1>
<?php header('Content-Type: text/html; charset=utf-8');
/* Index - default
 * views/index.php - displays the result of the method index of controller
 */
?>

<form action="/view" method="post" enctype="multipart/form-data">
<?php
    $params = $controllerParams;

echo '<label for="price_type">Price Type: </label>';
    echo '<select name="price_type">';
            foreach ($params as $type) {
                echo "<option>",$type['price_type'],"</option>";
            }
    echo '</select>';

echo '<label for="datepicker">Date: </label>';

    $date = date('d.m.Y');
echo "<input type = 'text'  id = 'datepicker' name = 'date' value = $date>";

echo "<input type='submit' name='show' value='Show List'>"
?>
