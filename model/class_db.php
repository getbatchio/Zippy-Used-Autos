<?php

function get_classes() {
    global $db;
    $query = "SELECT * FROM classes ORDER BY class_id ";
    $statement = $db->prepare($query);
    $statement->execute();
    $classes = $statement->fetchAll();
    $statement->closeCursor();
    return $classes;
};

function get_class_name($class_id) {
    global $db;
    $query = "SELECT * FROM classes
                WHERE class_id = :class_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':class_id', $class_id);
    $statement->execute();
    $class = $statement->fetch();
    $statement->closeCursor();
    return $class['class_name'] ?? null;
}