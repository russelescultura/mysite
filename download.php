<?php
// Set the path to your PDF file
$file = 'images/Russel_esculturaCV.pdf';

// Check if the file exists
if (file_exists($file)) {
    // Set headers to initiate file download
    header('Content-Description: File Transfer');
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="' . basename($file) . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    // Clear the output buffer
    ob_clean();
    // Read the file and output it to the browser
    readfile($file);
    exit;
} else {
    echo "The file does not exist.";
}
?>
