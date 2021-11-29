<?php

require_once dirname(__DIR__).'/config/database.php';

#global $dbauth;

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$db = new mysqli(
    $dbauth['DB_HOST'],
    $dbauth['DB_USER'],
    $dbauth['DB_PASSWORD'],
    $dbauth['DB_DBNAME']
);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

# Convenience function
# Get all rows of a table
function db_rows_all($table) {

    global $db;

    # Caller is responsible for passing in SQL-safe strings
    $query_str = "SELECT * FROM {$table}";

    $param_query = $db->prepare($query_str);
    $param_query->execute();
    return $param_query->get_result()->fetch_all(MYSQLI_ASSOC);
}

# Convenience function
# Get all rows of a table with a give column value
function db_rows_where($table, $column, $value) {

    global $db;

    # Caller is responsible for passing in SQL-safe strings
    $query_str = "SELECT * FROM {$table} WHERE {$column} = ?";

    $param_query = $db->prepare($query_str);
    $param_query->bind_param('s', $value);
    $param_query->execute();
    return $param_query->get_result()->fetch_all(MYSQLI_ASSOC);
}