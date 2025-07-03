<?php
// Enable error reporting (for debugging, remove in production)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Database credentials — replace with your own
$servername = "localhost";
$username = "your_db_username";
$password = "your_db_password";
$dbname = "your_db_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sanitize and assign POST data
$first_name = $conn->real_escape_string($_POST['first_name']);
$last_name = $conn->real_escape_string($_POST['last_name']);
$email = $conn->real_escape_string($_POST['email']);
$mobile = $conn->real_escape_string($_POST['mobile']);
$gender = $conn->real_escape_string($_POST['gender']);
$dob = $conn->real_escape_string($_POST['dob']);
$address = $conn->real_escape_string($_POST['address']);
$city = $conn->real_escape_string($_POST['city']);
$pin_code = $conn->real_escape_string($_POST['pin_code']);
$state = $conn->real_escape_string($_POST['state']);
$country = $conn->real_escape_string($_POST['country']);
$qualification = $conn->real_escape_string($_POST['qualification']);

// Convert arrays (checkbox inputs) to comma-separated strings
$hobbies = isset($_POST['hobbies']) ? implode(",", $_POST['hobbies']) : "";
$courses_applied = isset($_POST['courses_applied']) ? implode(",", $_POST['courses_applied']) : "";

// Prepare SQL with placeholders
$stmt = $conn->prepare("INSERT INTO students (first_name, last_name, email, mobile, gender, dob, address, city, pin_code, state, country, hobbies, qualification, courses_applied) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

// Bind parameters: all strings except dob (date stored as string) and everything else as string
$stmt->bind_param(
    "ssssssssssssss",
    $first_name,
    $last_name,
    $email,
    $mobile,
    $gender,
    $dob,
    $address,
    $city,
    $pin_code,
    $state,
    $country,
    $hobbies,
    $qualification,
    $courses_applied
);

// Execute and check
if ($stmt->execute()) {
    echo "Registration successful!";
} else {
    echo "Error: " . $stmt->error;
}

// Close connections
$stmt->close();
$conn->close();
?>
<?php
// DB config - update these
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

// Connect
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// Query all registrations
$sql = "SELECT * FROM registrations"; // or students if that's your table
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output rows
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " - Name: " . $row["first_name"] . " " . $row["last_name"] . " - Email: " . $row["email"] . "<br>";
    }
} else {
    echo "No registrations found.";
}

$conn->close();
?>
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
}
// Close the connection
$conn->close();
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully<br>";
}
$stmt = $conn->prepare("INSERT INTO students (...) VALUES (?, ?, ...)");
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

if (!$stmt->bind_param(...)) {
    die("Bind failed: " . $stmt->error);
}
echo "Data prepared, attempting insert...<br>";
