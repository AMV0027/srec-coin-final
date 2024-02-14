<!-- submit_request.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Processing</title>
    <style>
        *{
            text-align:center;
            font-family:sans-serif;
        }
    </style>
</head>
<body>
    
</body>
</html>
<?php
// Function to read requests from JSON file
function readRequests() {
    $requestsFile = 'requests.json';
    if (file_exists($requestsFile)) {
        $json = file_get_contents($requestsFile);
        return json_decode($json, true);
    } else {
        return [];
    }
}

// Function to save requests to JSON file
function saveRequests($requests) {
    $json = json_encode($requests, JSON_PRETTY_PRINT);
    if (file_put_contents('requests.json', $json) !== false) {
        echo "Requests saved successfully.";
    } else {
        echo "Failed to save requests.";
    }
}

// Function to save request to JSON file
function saveRequest($request) {
    $requests = readRequests();
    $requests[] = $request;
    saveRequests($requests);
}

// Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['certificate_type'])) {
    $requestType = $_POST['certificate_type'];
    
    // Define the request text based on the request type
    switch($requestType) {
        case 'bonafide':
            $requestText = 'Request for Bonafide Certificate';
            break;
        case 'no_objection':
            $requestText = 'Request for No Objection Certificate';
            break;
        case 'character':
            $requestText = 'Request for Character Certificate';
            break;
        case 'internship':
            $requestText = 'Request for Internship Certificate';
            break;
        case 'project_completion':
            $requestText = 'Request for Project Completion Certificate';
            break;
        case 'attendance':
            $requestText = 'Request for Attendance Certificate';
            break;
        case 'conduct':
            $requestText = 'Request for Conduct Certificate';
            break;
        case 'library_clearance':
            $requestText = 'Request for Library Clearance Certificate';
            break;
        case 'sports_participation':
            $requestText = 'Request for Sports Participation Certificate';
            break;
        case 'loan_availing_bonafide':
            $requestText = 'Request for Loan Availing Bonafide Certificate';
            break;
        default:
            $requestText = 'Unknown Request';
            break;
    }
    
    // Save the request to JSON file
    $request = [
        'studentName' => 'Arunmozhi varman',
        'requestText' => $requestText,
    ];
    saveRequest($request);
    
    echo "<h1>Request Submitted Successfully</h1>";
    echo "<p>Your request for \"$requestText\" has been submitted.</p>";
    echo "<a href='http://localhost/srec-hackathon-final/applied.php'>view certificate status</a>";
} else {
    echo "<h1>Error</h1>";
    echo "<p>No request type specified.</p>";
}
?>

