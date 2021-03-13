<?php
function get_types() {
    global $db;
    $query = "SELECT * FROM type ORDER BY id ";
    $statement = $db->prepare($query);
    $statement->execute();
    $types = $statement->fetchAll();
    $statement->closeCursor();
    return $types;
};

function get_type_name($type_id) {
    global $db;
    $query = "SELECT * FROM type
                WHERE id = :type_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':type_id', $type_id);
    $statement->execute();
    $make = $statement->fetch();
    $statement->closeCursor();
    return $type['type_name'] ?? null;
}