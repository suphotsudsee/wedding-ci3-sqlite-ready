
<?php ob_start(); ?>
<div class="card p-4 mb-3">
  <div class="d-flex justify-content-between flex-wrap">
    <div>สวัสดีคุณ <b><?= htmlspecialchars($guest->name) ?></b> (รหัส <?= htmlspecialchars($guest->code) ?>)</div>
    <div>สิทธิที่เหลือ: <b><?= (int)$guest->credits_remaining ?></b> / 2</div>
  </div>
  <small class="text-muted">เลือกได้ 2 ปุ่ม ห้ามซ้ำหัวข้อ</small>
</div>

<div class="grid-3">
  <?php
    $cats = array('SCHOOL'=>'โรงเรียน','HOSPITAL'=>'โรงพยาบาล','TEMPLE'=>'วัด');
    foreach($cats as $k=>$label):
      $disabled = in_array($k,$donated) || $guest->credits_remaining<=0 || count($donated)>=2;
  ?>
  <div class="card p-4 text-center">
   <?php if ($k == 'SCHOOL'): ?>
      <img src="<?= base_url('images/school.png') ?>" alt="โรงเรียน" class="mb-2 icon-img">
  <?php elseif ($k == 'HOSPITAL'): ?>
      <img src="<?= base_url('images/hospital.png') ?>" alt="โรงพยาบาล" class="mb-2 icon-img">
  <?php elseif ($k == 'TEMPLE'): ?>
      <img src="<?= base_url('images/temple.png') ?>" alt="วัด" class="mb-2 icon-img">
  <?php endif; ?>
    <button class="engine-btn" onclick="donate('<?= $k ?>')">
      <span class="main-text">กดเพื่อบริจาค</span>
    </button>
  </div>
  <?php endforeach; ?>
</div>
<div class="mt-4 text-center">
  <a href="<?= site_url('dashboard') ?>" class="btn btn-secondary">
    กลับ Dashboard
  </a>
</div>


<div id="msg" class="mt-3"></div>

<script>
function getCookie(name){
  const v = document.cookie.match('(?:^|; )' + name.replace(/([.$?*|{}()\[\]\\/+^])/g, '\\$1') + '=([^;]*)');
  return v ? decodeURIComponent(v[1]) : '';
}

function donate(cat){
  fetch('<?= site_url('api/donate') ?>', {
    method:'POST',
    headers:{
      'Content-Type':'application/json',
      'X-CSRF-TOKEN': getCookie('csrf_cookie_name')
    },
    body: JSON.stringify({
      code: '<?= htmlspecialchars($code) ?>',
      category: cat,
      amount: 1
    })
  })
  .then(r => r.json())
  .then(j => {
    if(!j.ok){
      document.getElementById('msg').innerHTML =
        '<div class="alert alert-danger">'+(j.error||'ผิดพลาด')+'</div>';
    } else {
      // ✅ ถ้ามีเหรียญเหลือ ยังอยู่ในหน้าเดิม
      if(j.credits_remaining > 0){
        document.getElementById('msg').innerHTML =
          '<div class="alert alert-success">บริจาคสำเร็จ เหรียญคงเหลือ: ' + j.credits_remaining + '</div>';
      } else {
        // ✅ ถ้าเหรียญหมด → กลับไป Dashboard
        window.location.href = "<?= site_url('dashboard') ?>";
      }
    }
  })
  .catch(() => {
    document.getElementById('msg').innerHTML =
      '<div class="alert alert-danger">ผิดพลาด</div>';
  });
}

</script>

<?php $content = ob_get_clean(); include __DIR__.'/layout.php'; ?>

