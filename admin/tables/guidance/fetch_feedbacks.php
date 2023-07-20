<?php
include '../../../conn.php';

session_start();

// Retrieve the page number from the AJAX request
$page = isset($_POST['page']) ? $_POST['page'] : 1;

// Define the number of records per page
$recordsPerPage = 20;

// Calculate the starting record for the requested page
$startingRecord = ($page - 1) * $recordsPerPage;
$searchTerm = isset($_POST['searchTerm']) ? $_POST['searchTerm'] : '';

// Retrieve the sorting parameters from the AJAX request
$column = isset($_POST['column']) ? $_POST['column'] : 'feedback_id';
$order = isset($_POST['order']) ? $_POST['order'] : 'desc';

// Retrieve the document requests
$guidanceFeedbacksQuery = "SELECT guidance_feedbacks.email, feedback_text, DATE_FORMAT(submitted_on, '%M %e, %Y %l:%i:%s %p') as formatted_datetime, 
                        guidance_feedbacks.user_id, users.first_name, users.last_name, users.middle_name, users.extension_name
                        FROM guidance_feedbacks
                        INNER JOIN users ON guidance_feedbacks.user_id = users.user_id";

if (!empty($searchTerm)) {
    $guidanceFeedbacksQuery .= " AND (feedback_id LIKE '%$searchTerm%'
                                OR users.first_name LIKE '%$searchTerm%'
                                OR users.last_name LIKE '%$searchTerm%'
                                OR users.middle_name LIKE '%$searchTerm%'
                                OR users.extension_name LIKE '%$searchTerm%'
                                OR guidance_feedbacks.email LIKE '%$searchTerm%'
                                OR CONCAT(users.last_name, ', ', users.first_name, ' ', users.middle_name, ' ', users.extension_name) LIKE '%$searchTerm%'
                                OR CONCAT(users.first_name, ' ', users.middle_name, ' ', users.last_name, ' ', users.extension_name) LIKE '%$searchTerm%'
                                OR CONCAT(users.first_name, ' ', users.last_name, ' ', users.extension_name) LIKE '%$searchTerm%'
                                OR DATE_FORMAT(submitted_on, '%M %e, %Y') LIKE '%$searchTerm%')";
}

// Add the sorting parameters to the query
$guidanceFeedbacksQuery .= " ORDER BY $column $order
LIMIT $startingRecord, $recordsPerPage";

$result = mysqli_query($connection, $guidanceFeedbacksQuery);

if ($result) {
    $guidanceFeedbacks = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $guidanceFeedbacks[] = $row;
    }

    // Count the total number of records
    $totalRecordsQuery = "SELECT COUNT(*) AS total_records
                          FROM guidance_feedbacks
                          INNER JOIN users ON guidance_feedbacks.user_id = users.user_id";

    if (!empty($searchTerm)) {
        $totalRecordsQuery .= " AND (feedback_id LIKE '%$searchTerm%'
                                OR users.first_name LIKE '%$searchTerm%'
                                OR users.last_name LIKE '%$searchTerm%'
                                OR users.middle_name LIKE '%$searchTerm%'
                                OR users.extension_name LIKE '%$searchTerm%'
                                OR guidance_feedbacks.email LIKE '%$searchTerm%'
                                OR CONCAT(users.last_name, ', ', users.first_name, ' ', users.middle_name, ' ', users.extension_name) LIKE '%$searchTerm%'
                                OR CONCAT(users.first_name, ' ', users.middle_name, ' ', users.last_name, ' ', users.extension_name) LIKE '%$searchTerm%'
                                OR CONCAT(users.first_name, ' ', users.last_name, ' ', users.extension_name) LIKE '%$searchTerm%'
                                OR DATE_FORMAT(submitted_on, '%M %e, %Y') LIKE '%$searchTerm%')";
    }

    $totalRecordsResult = mysqli_query($connection, $totalRecordsQuery);
    $totalRecordsRow = mysqli_fetch_assoc($totalRecordsResult);
    $totalRecords = $totalRecordsRow['total_records'];

    // Calculate the total number of pages
    $totalPages = ceil($totalRecords / $recordsPerPage);

    // Prepare the JSON response
    $response = array(
        'guidance_feedbacks' => $guidanceFeedbacks,
        'total_records' => $totalRecords,
        'total_pages' => $totalPages,
        'current_page' => $page
    );

    // Send the JSON response
    echo json_encode($response);
}
else {
    echo "Error executing the query: " . mysqli_error($connection);
}
?>
