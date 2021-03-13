<?php 
function delete_class($class_id)
{
    global $db;
    $query = 'DELETE FROM classes
              WHERE class_id = :class_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':class_id', $class_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_class($class_name)
{
    global $db;
    $query = 'INSERT INTO classes
                (class)
              VALUES
                (:class_name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':class_name', $class_name);
    $statement->execute();
    $statement->closeCursor();
}

