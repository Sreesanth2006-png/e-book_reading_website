<?php
include 'db_connect.php';  // Include database connection

$sql = "SELECT * FROM books";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<div class="popular-novels">';
    while ($row = $result->fetch_assoc()) {
        echo '
        <div class="novel">
            <a href="' . $row['file_path'] . '" target="_blank">
                <img src="path_to_thumbnail_image" alt="' . $row['book_name'] . '">
                <p>' . $row['book_name'] . '</p>
            </a>
        </div>';
    }
    echo '</div>';
} else {
    echo "No books found.";
}

$conn->close();
?>
