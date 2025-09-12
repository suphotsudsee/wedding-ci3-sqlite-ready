<?php ob_start(); ?>
<div class="d-flex justify-content-between align-items-center mb-3">
  <h4 class="mb-0">ภาพรวมเหรียญ</h4>
  <div style="display: flex; justify-content: flex-start; gap: 8px;">
    <a href="<?= site_url('register') ?>" class="btn btn-info">ลงทะเบียน</a>
    <button class="btn btn-success" data-toggle="modal" data-target="#donateModal">บริจาค</button>
  </div>
</div>

<div class="grid-3">
  <div class="card p-4 text-center">
    <div class="text-muted">โรงเรียน</div>
    <div class="display-4">
    <button class="engine-btn">
      <span class="big-text"><?= (int)$sum['SCHOOL'] ?></span>
    </button>
  </div>
  </div>
  <div class="card p-4 text-center">
    <div class="text-muted">โรงพยาบาล</div>
    <div class="display-4">
          <button class="engine-btn">
      <span class="big-text"><?= (int)$sum['HOSPITAL'] ?></span>
    </button></div>
  </div>
  <div class="card p-4 text-center">
    <div class="text-muted">วัด</div>
    <div class="display-4">
      <button class="engine-btn">
      <span class="big-text"><?= (int)$sum['TEMPLE'] ?></span>
    </button></div>
  </div>
</div>

<div class="card p-4 mt-3 text-center">
  <div class="text-muted">รวมทั้งหมด</div>
  <div class="display-4">
    <button class="engine-btn">
      <span class="big-text"><?= (int)$total ?></span>
    </button></div>
</div>

<!-- Modal ใส่รหัสแขก -->
<div class="modal fade" id="donateModal" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
    <div class="modal-content" style="border-radius:1rem;">
      <div class="modal-header">
        <h5 class="modal-title" id="donateModalLabel">กรอกรหัสแขก</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span>&times;</span></button>
      </div>
      <div class="modal-body">

        <!-- display -->
        <div class="form-group">
          <input id="codeDisplay" class="form-control form-control-lg text-center" placeholder="ใส่รหัส" inputmode="numeric" pattern="[0-9]*" readonly>
        </div>

        <!-- keypad -->
        <div class="d-grid" style="display:grid; grid-template-columns:repeat(3,1fr); gap:.5rem;">
          <button type="button" class="btn btn-light py-3 font-weight-bold" onclick="pressDigit('1')">1</button>
          <button type="button" class="btn btn-light py-3 font-weight-bold" onclick="pressDigit('2')">2</button>
          <button type="button" class="btn btn-light py-3 font-weight-bold" onclick="pressDigit('3')">3</button>

          <button type="button" class="btn btn-light py-3 font-weight-bold" onclick="pressDigit('4')">4</button>
          <button type="button" class="btn btn-light py-3 font-weight-bold" onclick="pressDigit('5')">5</button>
          <button type="button" class="btn btn-light py-3 font-weight-bold" onclick="pressDigit('6')">6</button>

          <button type="button" class="btn btn-light py-3 font-weight-bold" onclick="pressDigit('7')">7</button>
          <button type="button" class="btn btn-light py-3 font-weight-bold" onclick="pressDigit('8')">8</button>
          <button type="button" class="btn btn-light py-3 font-weight-bold" onclick="pressDigit('9')">9</button>

          <button type="button" class="btn btn-warning py-3 font-weight-bold" onclick="clearCode()">C</button>
          <button type="button" class="btn btn-light py-3 font-weight-bold" onclick="pressDigit('0')">0</button>
          <button type="button" class="btn btn-danger py-3 font-weight-bold" onclick="backspace()">⌫</button>
        </div>

        <div id="modalMsg" class="text-danger small mt-2" style="min-height:1.25rem;"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
        <button type="button" class="btn btn-primary" onclick="submitCode()">ยืนยัน</button>
      </div>
    </div>
  </div>
</div>

<script>
  // กำหนดความยาวสูงสุดของรหัส ถ้ามี (เปลี่ยนได้)
  var CODE_MAX_LEN = 16;

  function pressDigit(d){
    var el = document.getElementById('codeDisplay');
    var v = (el.value || '').toString();
    if (v.length >= CODE_MAX_LEN) return;
    el.value = v + d;
  }

  function backspace(){
    var el = document.getElementById('codeDisplay');
    var v = (el.value || '').toString();
    el.value = v.slice(0, -1);
  }

  function clearCode(){
    document.getElementById('codeDisplay').value = '';
  }

  function submitCode(){
    var code = (document.getElementById('codeDisplay').value || '').toString().trim();
    if (!code){
      document.getElementById('modalMsg').innerText = 'กรุณาใส่รหัสแขก';
      return;
    }
    // ไปหน้า donate/{CODE}
    var url = '<?= rtrim(site_url('donate'), '/') ?>' + '/' + encodeURIComponent(code);
    window.location.href = url;
  }

  // กด Enter ใน modal (เผื่อใช้คีย์บอร์ดจริง)
  document.addEventListener('keydown', function(e){
    if (e.key === 'Enter' && $('#donateModal').hasClass('show')) {
      e.preventDefault();
      submitCode();
    }
  });

</script>
<script>
  window.addEventListener('load', function () {
    var modalError = <?= json_encode($this->session->flashdata('modal_error')) ?>;
    if (modalError) {
      $('#donateModal').on('shown.bs.modal', function(){
        document.getElementById('modalMsg').innerText = modalError;
      });
      $('#donateModal').modal('show');
    }
  });
</script>



<?php $content = ob_get_clean(); include __DIR__.'/layout.php'; ?>
