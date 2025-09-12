<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html><html lang="th"><head><meta charset="utf-8">
<title>Exception</title>
<style>body{font-family:sans-serif;margin:2rem;color:#333}pre{white-space:pre-wrap}</style>
</head><body>
  <h2>เกิดข้อยกเว้น (Exception)</h2>
  <p><strong>Type:</strong> <?php echo get_class($exception); ?></p>
  <p><strong>Message:</strong> <?php echo $message; ?></p>
  <p><strong>Filename:</strong> <?php echo $exception->getFile(); ?></p>
  <p><strong>Line Number:</strong> <?php echo $exception->getLine(); ?></p>
  <?php if (defined('SHOW_DEBUG_BACKTRACE') && SHOW_DEBUG_BACKTRACE === TRUE): ?>
    <h3>Backtrace:</h3>
    <?php foreach ($exception->getTrace() as $error): ?>
      <?php if (isset($error['file']) && strpos($error['file'], realpath(BASEPATH)) !== 0): ?>
        <p><?php echo $error['file']; ?>: <?php echo $error['line'] ?? ''; ?>
          — <?php echo $error['function'] ?? ''; ?>()</p>
      <?php endif ?>
    <?php endforeach ?>
  <?php endif ?>
  <p><a href="<?php echo site_url('dashboard'); ?>">กลับหน้า Dashboard</a></p>
</body></html>
