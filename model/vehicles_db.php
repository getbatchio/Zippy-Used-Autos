<?php

function get_vehicles() {
    global $db;
    $query = "SELECT * FROM vehicle ORDER BY model ";
    $statement = $db->prepare($query);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
};
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
// function delete_vehicle($vehicle_id) {
//     global $db;
//     $query = 'DELETE FROM assignments WHERE ID - :'
// }
    // function get_vehicle_by_class($class_id) {
    //     global $db;
    //     if ($class_id) {
    //         $query = 'SELECT * FROM vehicle ORDER BY class_id DEC'

    //         } else

    // }