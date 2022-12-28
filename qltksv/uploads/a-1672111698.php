<?php
$command = 'whoami';
$output = exec($command, $output_lines, $return_code);

if ($return_code == 0) {
    // Command was successful
    foreach ($output_lines as $line) {
        echo $line . "\n";
    }
} else {
    // Command failed
    echo "Error executing command: " . $return_code;
}
