<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html><html lang="th"><head><meta charset="utf-8"><title>ไม่พบหน้า</title>
<style>body{font-family:sans-serif;margin:2rem;color:#333}</style></head>
<body>
  <h2>ไม่พบหน้า (404)</h2>
  <p><?php echo isset($heading)?$heading:''; ?></p>
  <p><?php echo isset($message)?$message:'ไม่พบหน้าที่ร้องขอ'; ?></p>
  <p><a href="<?php echo site_url('dashboard'); ?>">กลับหน้า Dashboard</a></p>
</body></html>
