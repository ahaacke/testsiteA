<?php
$sent = false;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $to      = 'test@example.com';
    $subject = 'Test from Site A';
    $body    = 'Sent at ' . date('Y-m-d H:i:s') . ' from Test Site A.';
    $headers = "From: siteA@devcontainer.local\r\nContent-Type: text/plain";

    if (mail($to, $subject, $body, $headers)) {
        $sent = true;
    } else {
        $error = 'mail() returned false — check SMTP config';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mail Test — Site A</title>
    <style>
        body { font-family: sans-serif; background: #1a1a2e; color: #eee; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        .card { background: #16213e; border: 2px solid #e94560; border-radius: 12px; padding: 2rem 3rem; max-width: 480px; width: 100%; }
        h1 { color: #e94560; margin-top: 0; }
        .ok  { color: #b7e4c7; } .err { color: #ffb3c1; }
        button { background: #e94560; color: #fff; border: none; padding: .6rem 1.4rem; border-radius: 6px; cursor: pointer; font-size: 1rem; }
        a { color: #e94560; }
    </style>
</head>
<body>
<div class="card">
    <h1>📧 Mail Test — Site A</h1>
    <?php if ($sent): ?>
        <p class="ok">✓ Email sent — check <a href="http://<?= $_SERVER['HTTP_HOST'] ?>:8025" target="_blank">Mailpit</a></p>
    <?php elseif ($error): ?>
        <p class="err">✗ <?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
    <form method="post">
        <button type="submit">Send test email</button>
    </form>
    <p><a href="index.php">← Back</a></p>
</div>
</body>
</html>
