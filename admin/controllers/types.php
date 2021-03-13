<?php 
function delete_type($type_id)
{
    global $db;
    $query = 'DELETE FROM types
              WHERE type_id = :type_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':type_id', $type_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_type($type_name)
{
    global $db;
    $query = 'INSERT INTO types
                (Type)
              VALUES
                (:type_name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':type_name', $type_name);
    $statement->execute();
    $statement->closeCursor();
}