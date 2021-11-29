<?php

require_once 'database.php';

# Colors model
function all_colors() {
    return db_rows_all('Colors');
}