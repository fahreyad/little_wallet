<?php

/**
 * Database connection test for shared hosting.
 * Upload this file to your server root (same folder as .env) and open it in a browser.
 * Delete it after you confirm the connection works.
 */

function envFromFile(string $file): array
{
    $env = [];
    $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {
        $line = trim($line);
        if (str_starts_with($line, '#') || !str_contains($line, '=')) {
            continue;
        }

        [$key, $value] = explode('=', $line, 2);
        $key = trim($key);
        $value = trim($value);

        // Remove surrounding quotes
        if ((str_starts_with($value, '"') && str_ends_with($value, '"')) ||
            (str_starts_with($value, "'") && str_ends_with($value, "'"))) {
            $value = substr($value, 1, -1);
        }

        $env[$key] = $value;
    }

    return $env;
}

$envFile = __DIR__ . '/.env';

if (!file_exists($envFile)) {
    die('.env file not found.');
}

$env = envFromFile($envFile);

$connection = $env['DB_CONNECTION'] ?? 'mysql';
$host = $env['DB_HOST'] ?? 'localhost';
$port = $env['DB_PORT'] ?? '3306';
$database = $env['DB_DATABASE'] ?? '';
$username = $env['DB_USERNAME'] ?? '';
$password = $env['DB_PASSWORD'] ?? '';

?>
<!DOCTYPE html>
<html>
<head>
    <title>Database Connection Test</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 700px; margin: 40px auto; padding: 20px; }
        .box { border: 1px solid #ddd; padding: 20px; border-radius: 8px; background: #f9f9f9; }
        .ok { color: green; font-weight: bold; }
        .error { color: red; font-weight: bold; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        td { padding: 8px; border-bottom: 1px solid #ddd; }
        code { background: #eee; padding: 2px 6px; border-radius: 4px; }
    </style>
</head>
<body>
    <div class="box">
        <h1>Database Connection Test</h1>
        <p>Reading credentials from <code>.env</code></p>
        <table>
            <tr><td>DB_CONNECTION</td><td><code><?php echo htmlspecialchars($connection); ?></code></td></tr>
            <tr><td>DB_HOST</td><td><code><?php echo htmlspecialchars($host); ?></code></td></tr>
            <tr><td>DB_PORT</td><td><code><?php echo htmlspecialchars($port); ?></code></td></tr>
            <tr><td>DB_DATABASE</td><td><code><?php echo htmlspecialchars($database); ?></code></td></tr>
            <tr><td>DB_USERNAME</td><td><code><?php echo htmlspecialchars($username); ?></code></td></tr>
            <tr><td>DB_PASSWORD</td><td><code>********</code></td></tr>
        </table>

        <?php
        try {
            $dsn = sprintf('%s:host=%s;port=%s;dbname=%s;charset=utf8mb4', $connection, $host, $port, $database);
            $pdo = new PDO($dsn, $username, $password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);

            $stmt = $pdo->query("SELECT COUNT(*) as total FROM users");
            $result = $stmt->fetch();

            echo '<p class="ok">Connection successful!</p>';
            echo '<p>Total users in database: <strong>' . $result['total'] . '</strong></p>';
        } catch (PDOException $e) {
            echo '<p class="error">Connection failed.</p>';
            echo '<p><strong>Error:</strong> ' . htmlspecialchars($e->getMessage()) . '</p>';
            echo '<hr>';
            echo '<h3>How to fix</h3>';
            echo '<ol>';
            echo '<li>Go to cPanel &gt; MySQL Databases.</li>';
            echo '<li>Make sure the user <code>' . htmlspecialchars($username) . '</code> is added to database <code>' . htmlspecialchars($database) . '</code> with ALL PRIVILEGES.</li>';
            echo '<li>If you are unsure of the password, reset the MySQL user password in cPanel.</li>';
            echo '<li>Update <code>DB_PASSWORD</code> in your <code>.env</code> file with the exact password.</li>';
            echo '<li>Refresh this page.</li>';
            echo '</ol>';
        }
        ?>
    </div>
</body>
</html>
