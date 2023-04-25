<?php
    function load_env($file_path) {
        if (!file_exists($file_path)) {
            throw new Exception("The .env file does not exist: {$file_path}");
        }

        $file = fopen($file_path, 'r');
        if (!$file) {
            throw new Exception("Failed to open the .env file: {$file_path}");
        }

        while (($line = fgets($file)) !== false) {
            $line = trim($line);

            if (substr($line, 0, 1) === '#' || strlen($line) == 0) {
                continue;
            }

            list($name, $value) = explode('=', $line, 2);
            if (empty($name) || empty($value)) {
                throw new Exception("Invalid .env line: {$line}");
            }

            putenv("{$name}={$value}");
        }

        fclose($file);
    }

    load_env($_SERVER['DOCUMENT_ROOT'].'/.env');
?>