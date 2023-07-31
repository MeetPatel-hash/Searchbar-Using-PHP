<?php
session_start();
include 'function.php';
$user = new user();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $page = isset($_POST['page']) ? $_POST['page'] : '';
    $recordsPerPage = isset($_POST['recordsPerPage']) ? $_POST['recordsPerPage'] : '';
    $searchQuery = isset($_POST['searchQuery']) ? $_POST['searchQuery'] : '';
    $sortColumn = isset($_POST['sortBy']) ? $_POST['sortBy'] : 'id';
    $sortOrder = isset($_POST['sortOrder']) ? $_POST['sortOrder'] : 'ASC';
    $offset = ($page - 1) * $recordsPerPage;

    $gender = $_SESSION['genders'];
    $hobbiesString = $_SESSION['hobby'];
    $hobbies = explode(',', $hobbiesString); 

    $sql ="SELECT * FROM user WHERE";

    $conditions = array();

    if ($gender == 'male' && !empty($hobbies)) {
        $hobbyConditions = array();

        foreach ($hobbies as $hobby) {
            $hobbyConditions[] = "hobbies LIKE '%$hobby%'";
        }

        $conditions[] = "(gender = 'female' AND (" . implode(' OR ', $hobbyConditions) . "))";
    }

    if ($gender == 'female' && !empty($hobbies)) {
        $hobbyConditions = array();

        foreach ($hobbies as $hobby) {
            $hobbyConditions[] = "hobbies LIKE '%$hobby%'";
        }

        $conditions[] = "(gender = 'male' AND (" . implode(' OR ', $hobbyConditions) . "))";
    }
    
    if (isset($_POST['range1']) && isset($_POST['range2'])) {
        $min = isset($_POST['range1']) ? $_POST['range1'] : '';
        $max = isset($_POST['range2']) ? $_POST['range2'] : '';

        $conditions[] = "age BETWEEN {$min} AND {$max}";
    } 

    if (!empty($conditions)) {
        $sql .= " " . implode(' AND ', $conditions);
    } else {
        $sql .= " 1"; // This will always evaluate to true, giving all records
    }

    if (!empty($searchQuery)) {
        // Add WHERE clause to filter based on search query
        $sql .= " AND (user.first_name LIKE '%$searchQuery%' OR user.last_name LIKE '%$searchQuery%' OR user.email LIKE '%$searchQuery%' OR user.gender LIKE '%$searchQuery%' OR user.age LIKE '%$searchQuery%' OR user.date_of_birth LIKE '%$searchQuery%' OR user.hobbies LIKE '%$searchQuery%')";
    }

    if (!empty($sortColumn) && !empty($sortOrder)) {
        $sql .= " ORDER BY $sortColumn $sortOrder";
    }
    
    // Add the LIMIT clause for pagination
    $sql .= " LIMIT $offset, $recordsPerPage";

    $results = $user->fetchUser($sql);

    $totalCount = $user->getUserRecord($searchQuery);

    // Prepare the response as JSON
    $response = [
        'results' => $results,
        'totalRecords' => $totalCount
    ];

    // Send the JSON response back to the client
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}

?>
