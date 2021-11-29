<?php

require_once 'database.php';

function valid_color($color) {

    # Return whether $color is a string that matches the pattern below

    # Best-effort definition of a valid color:
    # a single sentence-case word 1-255 chars long
    $sentence_case = '/^[A-Z][a-z]{0,254}$/';

    # Valid   :  'Red' , 'Yellow'  , 'Blue'
    # Invalid :  'red' , 'Yellow ' , 'CornflowerBlue'

    $is_valid = is_string($color) && (preg_match($sentence_case, $color) === 1);

    return $is_valid;
}

# Votes model
function all_city_votes_for_color($color) {

    # Always return an array
    # Return empty array for bad input

    $table  = 'Votes';
    $column = 'Color';
    $value  = $color;

    $results = valid_color($color) ? db_rows_where($table, $column, $value) : array();

    return array('results' => $results);
}