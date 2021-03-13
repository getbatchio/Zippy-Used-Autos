<?php
function get_makes() {
    global $db;
    $query = "SELECT * FROM make ORDER BY id ";
    $statement = $db->prepare($query);
    $statement->execute();
    $makes = $statement->fetchAll();
    $statement->closeCursor();
    return $makes;
};

function get_make_name($make_id) {
    global $db;
    $query = "SELECT * FROM make
                WHERE id = :make_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':make_id', $make_id);
    $statement->execute();
    $make = $statement->fetch();
    $statement->closeCursor();
    return $make['make_name'] ?? null;
}