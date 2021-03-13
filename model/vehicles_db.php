<?php
function get_vehicles() {
    global $db;
    $query = "SELECT * FROM vehicles ORDER BY price DESC ";
    $statement = $db->prepare($query);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
};

function get_vehicles_filtered($sort_by, $filters) {
    global $db;
    $query = "SELECT * FROM vehicles";
    $query_array = get_query_expressions($filters);

    if (count($query_array) > 0) {
        $query .= ' WHERE ';
        $query .= implode(' AND ', $query_array);
    }

    $query .= " ORDER BY {$sort_by} DESC";

    $statement = $db->prepare($query);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
};


function get_query_expressions($arr) {
    $query_array = array();
    foreach($arr as $key => $value) {
        if ($value != '') {
            $query_array[] = $key . ' = ' . $value;
        }
    }
    return $query_array;
};