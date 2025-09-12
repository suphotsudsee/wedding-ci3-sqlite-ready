<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html><html lang="th"><head><meta charset="utf-8"><title>เกิดข้อผิดพลาด</title>
<style>body{font-family:sans-serif;margin:2rem;color:#333}</style></head>
<body>
  <h2><?php echo $heading; ?></h2>
  <div><?php echo $message; ?></div>
  <p><a href="<?php echo site_url('dashboard'); ?>">กลับหน้า Dashboard</a></p>
</body></html>
