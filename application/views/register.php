<!-- application/views/register.php -->
<?php ob_start(); ?>
<div class="card p-4">
  <h4>ลงทะเบียนแขก</h4>
  <?php if($this->session->flashdata('msg')): ?>
    <div class="alert alert-info"><?= $this->session->flashdata('msg') ?></div>
  <?php endif; ?>

  <form method="post" class="mb-4">
    <?php
      $csrf_name = $this->security->get_csrf_token_name();
      $csrf_hash = $this->security->get_csrf_hash();
    ?>
    <input type="hidden" name="<?= $csrf_name ?>" value="<?= $csrf_hash ?>">

    <div class="form-row">
      <div class="form-group col-md-5">
        <label>ชื่อแขก</label>
        <input type="text" name="name" id="guestName" class="form-control" required>
      </div>
      <div class="form-group col-md-5">
        <label>รหัสแขก</label>
        <input type="text" name="code" id="guestCode" class="form-control" required readonly>
      </div>
      <div class="form-group col-md-2 d-flex align-items-end">
        <button type="submit" class="btn btn-primary btn-block">บันทึก</button>
      </div>
    </div>
  </form>
  <div class="mt-3">
    <a href="<?= site_url('dashboard') ?>" class="btn btn-secondary">กลับ Dashboard</a>
  </div>
  <div class="d-flex justify-content-between align-items-center mb-2">
    <h5 class="mb-0">รายชื่อที่ลงทะเบียนแล้ว</h5>
    <input id="guestSearch" class="form-control" placeholder="ค้นหาชื่อหรือรหัส..." style="max-width:280px;">
  </div>

  <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
    <table class="table table-hover  table-striped black-table table-bordered mb-0" id="guestTable">
      <thead class="thead-light">
        <tr class="text-center">
          <th style="width:64px;">#</th>
          <th>ชื่อ</th>
          <th>รหัส</th>
          <th style="width:140px;">ใช้ไป</th>
          <th style="width:140px;">สิทธิที่เหลือ</th>
          <th style="width:180px;">สถานะ</th>
        </tr>
      </thead>
      <tbody>
        <?php
          // $guests มาจาก Controller: each has ->name, ->code, ->credits_remaining, ->picked
          $i = 1;
          foreach($guests as $g):
            $picked = (int)$g->picked;                   // จำนวนหัวข้อที่กดไปแล้ว
            $left   = (int)$g->credits_remaining;        // สิทธิที่เหลือ (เริ่มที่ 2)
            $status = 'ยังไม่ใช้สิทธิ';
            $badge  = 'secondary';

            if ($picked >= 2 || $left <= 0) { $status = 'ใช้ครบ 2 สิทธิแล้ว'; $badge='success'; }
            elseif ($picked >= 1 || $left < 2) { $status = 'ใช้สิทธิบางส่วน'; $badge='warning'; }
        ?>
        <tr>
          <td class="text-center"><?= $i++ ?></td>
          <td><?= htmlspecialchars($g->name) ?></td>
          <td class="text-center"><code><?= htmlspecialchars($g->code) ?></code></td>
          <td class="text-center"><?= $picked ?> / 2</td>
          <td class="text-center"><?= $left ?></td>
          <td class="text-center"><span class="badge badge-<?= $badge ?> p-2"><?= $status ?></span></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>


</div>

<script>
// สร้างรหัสแขก 3 หลักอัตโนมัติ
function generateGuestCode() {
  // สร้างเลข 3 หลักแบบสุ่ม (100-999)
  const code = Math.floor(Math.random() * 900) + 100;
  return code.toString();
}

// เมื่อกรอกชื่อแขกเสร็จ ให้สร้างรหัสอัตโนมัติ
document.getElementById('guestName').addEventListener('blur', function(){
  const nameInput = this.value.trim();
  const codeInput = document.getElementById('guestCode');
  
  if (nameInput && !codeInput.value) {
    // ตรวจสอบว่ารหัสที่สร้างไม่ซ้ำกับที่มีอยู่แล้ว
    let newCode;
    let isUnique = false;
    const existingCodes = Array.from(document.querySelectorAll('#guestTable tbody tr td:nth-child(3) code'))
                              .map(el => el.textContent.trim());
    
    // สร้างรหัสใหม่จนกว่าจะไม่ซ้ำ
    do {
      newCode = generateGuestCode();
      isUnique = !existingCodes.includes(newCode);
    } while (!isUnique && existingCodes.length < 900); // ป้องกัน infinite loop
    
    codeInput.value = newCode;
    codeInput.removeAttribute('readonly'); // ให้สามารถแก้ไขได้หากต้องการ
  }
});

// เมื่อเคลียร์ชื่อ ให้เคลียร์รหัสด้วย
document.getElementById('guestName').addEventListener('input', function(){
  if (!this.value.trim()) {
    document.getElementById('guestCode').value = '';
    document.getElementById('guestCode').setAttribute('readonly', 'readonly');
  }
});

// ค้นหาในตารางแบบง่าย ๆ
document.getElementById('guestSearch').addEventListener('input', function(){
  const q = this.value.toLowerCase();
  const rows = document.querySelectorAll('#guestTable tbody tr');
  rows.forEach(tr => {
    const name = tr.children[1].innerText.toLowerCase();
    const code = tr.children[2].innerText.toLowerCase();
    tr.style.display = (name.includes(q) || code.includes(q)) ? '' : 'none';
  });
});
</script>

<?php $content = ob_get_clean(); include __DIR__.'/layout.php'; ?>
