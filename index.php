<?php
$file = 'file.csv';

if (file_exists($file)) {
    if (($fp = fopen($file, 'r')) !== false) {  
        echo "<table border='2' width='20%' height='100px;'>";

        $headers = fgets($fp);
        $headers = explode(' ', trim($headers));

        if ($headers) {
            echo "<tr>";
            foreach ($headers as $header) {
                echo "<th>" . htmlspecialchars($header) . "</th>";
            }
            echo "</tr>";
        }

        while (($line = fgets($fp)) !== false) {
            $data = explode(' ', trim($line)); 
            echo "<tr>";
            foreach ($data as $cell) {
                echo "<td>" . htmlspecialchars($cell) . "</td>";
            }
            echo "</tr>";
        }

        fclose($fp); 
        echo "</table>";
    } else {
        echo "Не вдається відкрити файл.";
    }
}
?>