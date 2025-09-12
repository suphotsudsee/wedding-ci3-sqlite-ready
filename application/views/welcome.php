
<?php ob_start(); ?>
<div class="card p-4">
  <h4 class="mb-3">กรอกรหัสผู้เข้าร่วม (Guest Code)</h4>
  <form method="get" action="<?= site_url('donate') ?>" onsubmit="location=this.action + '/' + encodeURIComponent(document.getElementById('code').value.trim().toUpperCase());return false;">
    <div class="form-row">
      <div class="col-9 col-md-10">
        <input id="code" class="form-control form-control-lg" placeholder="เช่น ABC123" required>
      </div>
      <div class="col">
        <button class="btn btn-primary btn-lg btn-block">ไปต่อ</button>
      </div>
    </div>
  </form>
  <div class="mt-3"><a href="<?= site_url('dashboard') ?>">ดู Dashboard</a></div>
</div>
<?php $content = ob_get_clean(); include __DIR__.'/layout.php'; ?>
