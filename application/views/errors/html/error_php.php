<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html><html lang="th"><head><meta charset="utf-8"><title>PHP Error</title>
<style>body{font-family:sans-serif;margin:2rem;color:#333}pre{white-space:pre-wrap}</style></head>
<body>
  <h2>เกิดข้อผิดพลาด (PHP)</h2>
  <p><strong>Severity:</strong> <?php echo $severity; ?></p>
  <p><strong>Message:</strong> <?php echo $message; ?></p>
  <p><strong>Filename:</strong> <?php echo $filepath; ?></p>
  <p><strong>Line Number:</strong> <?php echo $line; ?></p>
  <?php if (defined('SHOW_DEBUG_BACKTRACE') && SHOW_DEBUG_BACKTRACE === TRUE): ?>
    <h3>Backtrace:</h3>
    <?php foreach (debug_backtrace() as $error): ?>
      <?php if (isset($error['file']) && strpos($error['file'], realpath(BASEPATH)) !== 0): ?>
        <p><?php echo $error['file']; ?>: <?php echo $error['line']; ?> — <?php echo $error['function']; ?>()</p>
      <?php endif ?>
    <?php endforeach ?>
  <?php endif ?>
</body></html>
