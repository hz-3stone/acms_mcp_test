<?php
echo "Sendmail Path: " . ini_get('sendmail_path') . "\n";
$parts = explode(' ', ini_get('sendmail_path'));
$cmd = $parts[0];
if (file_exists($cmd)) {
    echo "Binary exists: Yes\n";
    echo "Permissions: " . substr(sprintf('%o', fileperms($cmd)), -4) . "\n";
} else {
    echo "Binary exists: NO\n";
}

echo "Testing connection to mailpit:1025...\n";
$fp = @fsockopen("mailpit", 1025, $errno, $errstr, 5);
if (!$fp) {
    echo "Connection failed: $errstr ($errno)\n";
} else {
    echo "Connection successful!\n";
    fwrite($fp, "QUIT\r\n");
    fclose($fp);
}
?>