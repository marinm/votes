<?php
    require dirname(__DIR__).'/src/colors.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Votes</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="assets/css/style.css">
    </head>

    <body>

        <a class="source-code" href="https://github.com/marinm/votes">Source code</a>

        <p class="instructions">Click on the Color Name to see how many votes there are for that color.<br>
        When you click on TOTAL, the sum of above numbers will show.</p>

        <table>
            <thead>
                <th>Color</th>
                <th colspan="2">Votes</th>
            </thead>
            <tbody>

                <?php
                    foreach (all_colors() as $row) {
                        $color = $row['Color'];
                        echo '
                            <tr>
                                <td class="color-name" data-color="'.$color.'"><span class="link">'.$color.'</span></td>
                                <td class="color-votes" data-color="'.$color.'"><span></span></td>
                                <td class="color-votes-total" data-color="'.$color.'"><span class="hidden"></span></td>
                            </tr>
                        ';
                    }
                ?>

                <tr>
                    <td><span class="link" id="total-link">TOTAL</span></td>
                    <td></td>
                    <td class="color-votes-total" id="votes-total"><span class="hidden"></span></td>
                </tr>

            </tbody>
        </table>

        <script src="assets/js/votes.js"></script>
    </body>

</html>



