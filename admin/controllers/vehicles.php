<?php

function add_vehicle($year, $model, $price, $make_id, $type_id, $class_id) {
    global $db;
    $count = 0;

    $query = "INSERT INTO vehicles (year, model, price, make_id, type_id, class_id)
                VALUES (:year, :model, :price, :make_id, :type_id, :class_id)";

    $statement = $db->prepare($query);
    $statement->bindValue(':year', $year);
    $statement->bindValue(':model', $model);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':make_id', $make_id);
    $statement->bindValue(':type_id', $type_id);
    $statement->bindValue(':class_id', $class_id);
    if ($statement->execute()) {
        $count = $statement->rowCount();
    }
    $statement->closeCursor();
    return $count;
};

function delete_vehicle($year, $model, $price, $ids) {
    global $db;
    $count = 0;
    $query = "DELETE FROM vehicles WHERE year = :year AND model = :model AND price = :price";

    $query_array = get_query_expressions($ids);

    if (count($query_array) > 0) {
        $query .= ' AND ';
        $query .= implode(' AND ', $query_array);
    }

    $query .= ' LIMIT 1';

    $statement = $db->prepare($query);
    $statement->bindValue(':year', $year);
    $statement->bindValue(':model', $model);
    $statement->bindValue(':price', $price);
    if ($statement->execute()) {
        $count = $statement->rowCount();
    }
    $statement->closeCursor();
    return $count;
}
