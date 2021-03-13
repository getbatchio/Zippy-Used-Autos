<?php
require('model/database.php');
require('model/vehicles_db.php');
require('model/make_db.php');
require('model/type_db.php');
require('model/class_db.php');

$isAdmin = false;

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if (!$action) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
    if (!$action) {
        $action = 'vehicles_list';
    }
}

switch ($action) {
    case 'vehicles_list':
        $make_id = filter_input(INPUT_GET, 'make_id', FILTER_VALIDATE_INT);
        $type_id = filter_input(INPUT_GET, 'type_id', FILTER_VALIDATE_INT);
        $class_id = filter_input(INPUT_GET, 'class_id', FILTER_VALIDATE_INT);
        $sort_by = filter_input(INPUT_GET, 'sort_by', FILTER_SANITIZE_STRING) ?? 'price';

        if ($make_id || $type_id || $class_id || $sort_by) {
           
            $filters = [];
            if ($make_id) {
                $filters['make_id'] = $make_id;
            }

            if ($type_id) {
                $filters['type_id'] = $type_id;
            }

            if ($class_id) {
                $filters['class_id'] = $class_id;
            }

            $vehicles_list = get_vehicles();
        }

        $makes_list = get_makes();
        $types_list = get_types();
        $classes_list = get_classes();

        foreach($vehicles_list as $key => $vehicle) {
            $vehicles_list[$key]['make_name'] = get_make_name($vehicle['make_id']);
            $vehicles_list[$key]['type_name'] = get_type_name($vehicle['type_id']);
            $vehicles_list[$key]['class_name'] = get_class_name($vehicle['class_id']);
        }

        include('view/vehicles_list.php');
        break;
}


