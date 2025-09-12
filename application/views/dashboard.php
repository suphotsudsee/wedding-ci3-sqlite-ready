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

<!-- Modal ใส่รหัสแขก - Enhanced Design -->
<div class="modal fade" id="donateModal" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 420px;">
    <div class="modal-content modern-modal">
      <div class="modal-header modern-header">
        <h5 class="modal-title" id="donateModalLabel">
          <i class="fas fa-keyboard"></i> ใส่รหัส
        </h5>
      </div>
      
      <div class="modal-body modern-body">
        <!-- Enhanced Display -->
        <div class="display-container">
          <input id="codeDisplay" class="modern-display" placeholder="ใส่รหัส" inputmode="numeric" pattern="[0-9]*" readonly>
          <div class="display-glow"></div>
        </div>

        <!-- Enhanced Keypad -->
        <div class="modern-keypad">
          <button type="button" class="keypad-btn number-btn" onclick="pressDigit('1')" data-number="1">
            <span class="btn-content">1</span>
            <div class="btn-ripple"></div>
          </button>
          <button type="button" class="keypad-btn number-btn" onclick="pressDigit('2')" data-number="2">
            <span class="btn-content">2</span>
            <div class="btn-ripple"></div>
          </button>
          <button type="button" class="keypad-btn number-btn" onclick="pressDigit('3')" data-number="3">
            <span class="btn-content">3</span>
            <div class="btn-ripple"></div>
          </button>

          <button type="button" class="keypad-btn number-btn" onclick="pressDigit('4')" data-number="4">
            <span class="btn-content">4</span>
            <div class="btn-ripple"></div>
          </button>
          <button type="button" class="keypad-btn number-btn" onclick="pressDigit('5')" data-number="5">
            <span class="btn-content">5</span>
            <div class="btn-ripple"></div>
          </button>
          <button type="button" class="keypad-btn number-btn" onclick="pressDigit('6')" data-number="6">
            <span class="btn-content">6</span>
            <div class="btn-ripple"></div>
          </button>

          <button type="button" class="keypad-btn number-btn" onclick="pressDigit('7')" data-number="7">
            <span class="btn-content">7</span>
            <div class="btn-ripple"></div>
          </button>
          <button type="button" class="keypad-btn number-btn" onclick="pressDigit('8')" data-number="8">
            <span class="btn-content">8</span>
            <div class="btn-ripple"></div>
          </button>
          <button type="button" class="keypad-btn number-btn" onclick="pressDigit('9')" data-number="9">
            <span class="btn-content">9</span>
            <div class="btn-ripple"></div>
          </button>

          <button type="button" class="keypad-btn clear-btn" onclick="clearCode()">
            <span class="btn-content">C</span>
            <div class="btn-ripple"></div>
          </button>
          <button type="button" class="keypad-btn number-btn zero-btn" onclick="pressDigit('0')" data-number="0">
            <span class="btn-content">0</span>
            <div class="btn-ripple"></div>
          </button>
          <button type="button" class="keypad-btn delete-btn" onclick="backspace()">
            <span class="btn-content">⌫</span>
            <div class="btn-ripple"></div>
          </button>
        </div>

        <div id="modalMsg" class="error-message"></div>
      </div>
      
      <div class="modal-footer modern-footer">
        <button type="button" class="action-btn cancel-btn" data-dismiss="modal">
          <i class="fas fa-times"></i> ยกเลิก
        </button>
        <button type="button" class="action-btn confirm-btn" onclick="submitCode()">
          <i class="fas fa-check"></i> ยืนยัน
        </button>
      </div>
    </div>
  </div>
</div>

<style>
/* Modern Modal Styles */
.modern-modal {
  background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
  border: 2px solid #00e5ff;
  border-radius: 20px;
  box-shadow: 
    0 20px 40px rgba(0, 0, 0, 0.8),
    0 0 30px rgba(0, 229, 255, 0.3),
    inset 0 0 20px rgba(0, 229, 255, 0.1);
  overflow: hidden;
}

.modern-header {
  background: linear-gradient(135deg, #00e5ff, #00b7ff);
  border-bottom: none;
  padding: 20px 25px;
  color: #000;
}

.modern-header .modal-title {
  font-weight: bold;
  font-size: 20px;
  text-shadow: none;
}

.modern-close {
  color: #000;
  font-size: 28px;
  font-weight: bold;
  opacity: 0.8;
  transition: all 0.3s ease;
}

.modern-close:hover {
  opacity: 1;
  transform: scale(1.1);
  color: #ff4757;
}

.modern-body {
  padding: 30px 25px;
  background: transparent;
}

/* Enhanced Display */
.display-container {
  position: relative;
  margin-bottom: 25px;
}

.modern-display {
  width: 100%;
  height: 70px;
  background: rgba(0, 0, 0, 0.7);
  border: 3px solid #00e5ff;
  border-radius: 15px;
  color: #00e5ff;
  font-size: 28px;
  text-align: center;
  font-weight: bold;
  letter-spacing: 3px;
  transition: all 0.3s ease;
  box-shadow: 
    0 0 20px rgba(0, 229, 255, 0.3),
    inset 0 0 15px rgba(0, 229, 255, 0.1);
}

.modern-display:focus {
  outline: none;
  border-color: #40e0d0;
  box-shadow: 
    0 0 30px rgba(64, 224, 208, 0.5),
    inset 0 0 20px rgba(64, 224, 208, 0.2);
}

.modern-display::placeholder {
  color: rgba(0, 229, 255, 0.5);
  font-size: 20px;
}

.display-glow {
  position: absolute;
  top: -2px;
  left: -2px;
  right: -2px;
  bottom: -2px;
  background: linear-gradient(45deg, #00e5ff, #40e0d0, #00e5ff);
  border-radius: 15px;
  z-index: -1;
  opacity: 0;
  transition: opacity 0.3s ease;
}

.modern-display:focus + .display-glow {
  opacity: 0.3;
}

/* Enhanced Keypad */
.modern-keypad {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 12px;
  margin-bottom: 20px;
}

.keypad-btn {
  position: relative;
  height: 65px;
  border: none;
  border-radius: 15px;
  font-size: 24px;
  font-weight: bold;
  cursor: pointer;
  transition: all 0.3s ease;
  overflow: hidden;
  user-select: none;
}

.btn-content {
  position: relative;
  z-index: 2;
  display: block;
  transition: transform 0.2s ease;
}

.btn-ripple {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 0;
  height: 0;
  border-radius: 50%;
  background: rgba(255, 255, 255, 0.3);
  transform: translate(-50%, -50%);
  transition: width 0.3s, height 0.3s;
  z-index: 1;
}

/* Number Buttons */
.number-btn {
  background: linear-gradient(135deg, #0066cc, #003366);
  color: #fff;
  border: 2px solid #00b7ff;
  box-shadow: 
    0 4px 15px rgba(0, 183, 255, 0.3),
    inset 0 0 10px rgba(0, 183, 255, 0.1);
}

.number-btn:hover {
  background: linear-gradient(135deg, #0080ff, #0066cc);
  box-shadow: 
    0 6px 20px rgba(0, 183, 255, 0.5),
    inset 0 0 15px rgba(0, 183, 255, 0.2);
  transform: translateY(-2px);
}

.number-btn:active {
  transform: translateY(0);
}

.number-btn:active .btn-ripple {
  width: 100px;
  height: 100px;
}

/* Zero Button (Special) */
.zero-btn {
  background: linear-gradient(135deg, #4a90e2, #357abd);
}

/* Clear Button */
.clear-btn {
  background: linear-gradient(135deg, #ffa500, #ff8c00);
  color: #fff;
  border: 2px solid #ffb347;
  box-shadow: 
    0 4px 15px rgba(255, 165, 0, 0.3),
    inset 0 0 10px rgba(255, 165, 0, 0.1);
}

.clear-btn:hover {
  background: linear-gradient(135deg, #ffb347, #ffa500);
  box-shadow: 
    0 6px 20px rgba(255, 165, 0, 0.5),
    inset 0 0 15px rgba(255, 165, 0, 0.2);
  transform: translateY(-2px);
}

/* Delete Button */
.delete-btn {
  background: linear-gradient(135deg, #ff4757, #ff3742);
  color: #fff;
  border: 2px solid #ff6b7a;
  box-shadow: 
    0 4px 15px rgba(255, 71, 87, 0.3),
    inset 0 0 10px rgba(255, 71, 87, 0.1);
}

.delete-btn:hover {
  background: linear-gradient(135deg, #ff6b7a, #ff4757);
  box-shadow: 
    0 6px 20px rgba(255, 71, 87, 0.5),
    inset 0 0 15px rgba(255, 71, 87, 0.2);
  transform: translateY(-2px);
}

/* Error Message */
.error-message {
  min-height: 20px;
  color: #ff4757;
  font-size: 14px;
  text-align: center;
  font-weight: 500;
  background: rgba(255, 71, 87, 0.1);
  border-radius: 8px;
  padding: 8px;
  border: 1px solid rgba(255, 71, 87, 0.3);
  display: none;
}

.error-message:not(:empty) {
  display: block;
  animation: shake 0.5s ease-in-out;
}

/* Modern Footer */
.modern-footer {
  background: rgba(0, 0, 0, 0.3);
  border-top: 1px solid rgba(0, 229, 255, 0.3);
  padding: 20px 25px;
  display: flex;
  gap: 15px;
}

.action-btn {
  flex: 1;
  height: 50px;
  border: none;
  border-radius: 25px;
  font-size: 16px;
  font-weight: bold;
  cursor: pointer;
  transition: all 0.3s ease;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
}

.cancel-btn {
  background: linear-gradient(135deg, #6c757d, #495057);
  color: #fff;
  border: 2px solid #adb5bd;
}

.cancel-btn:hover {
  background: linear-gradient(135deg, #adb5bd, #6c757d);
  transform: translateY(-2px);
  box-shadow: 0 4px 15px rgba(173, 181, 189, 0.4);
}

.confirm-btn {
  background: linear-gradient(135deg, #28a745, #20c997);
  color: #fff;
  border: 2px solid #40e0d0;
  box-shadow: 
    0 4px 15px rgba(64, 224, 208, 0.3),
    inset 0 0 10px rgba(64, 224, 208, 0.1);
}

.confirm-btn:hover {
  background: linear-gradient(135deg, #40e0d0, #28a745);
  box-shadow: 
    0 6px 20px rgba(64, 224, 208, 0.5),
    inset 0 0 15px rgba(64, 224, 208, 0.2);
  transform: translateY(-2px);
}

/* Animations */
@keyframes shake {
  0%, 100% { transform: translateX(0); }
  25% { transform: translateX(-5px); }
  75% { transform: translateX(5px); }
}

@keyframes pulse {
  0% { transform: scale(1); }
  50% { transform: scale(1.05); }
  100% { transform: scale(1); }
}

/* Responsive */
@media (max-width: 480px) {
  .modal-dialog {
    max-width: 95%;
    margin: 10px;
  }
  
  .modern-body {
    padding: 20px 15px;
  }
  
  .modern-keypad {
    gap: 8px;
  }
  
  .keypad-btn {
    height: 55px;
    font-size: 20px;
  }
  
  .modern-display {
    height: 60px;
    font-size: 24px;
  }
}

/* Dark theme compatibility */
.modal-backdrop {
  background-color: rgba(0, 0, 0, 0.8);
}
</style>

<script>
  // กำหนดความยาวสูงสุดของรหัส
  var CODE_MAX_LEN = 16;

  // เสียงคลิก
  function playClickSound(type = 'default') {
    try {
      const audioContext = new (window.AudioContext || window.webkitAudioContext)();
      const oscillator = audioContext.createOscillator();
      const gainNode = audioContext.createGain();
      
      oscillator.connect(gainNode);
      gainNode.connect(audioContext.destination);
      
      // เสียงที่แตกต่างกันตามประเภทปุ่ม
      switch(type) {
        case 'number':
          oscillator.frequency.setValueAtTime(800, audioContext.currentTime);
          break;
        case 'clear':
          oscillator.frequency.setValueAtTime(600, audioContext.currentTime);
          break;
        case 'delete':
          oscillator.frequency.setValueAtTime(400, audioContext.currentTime);
          break;
        case 'confirm':
          oscillator.frequency.setValueAtTime(1000, audioContext.currentTime);
          break;
        default:
          oscillator.frequency.setValueAtTime(700, audioContext.currentTime);
      }
      
      gainNode.gain.setValueAtTime(0.1, audioContext.currentTime);
      gainNode.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + 0.1);
      
      oscillator.start(audioContext.currentTime);
      oscillator.stop(audioContext.currentTime + 0.1);
    } catch (e) {
      // ไม่สามารถเล่นเสียงได้
    }
  }

  // เอฟเฟกต์ vibration (สำหรับมือถือ)
  function vibrate(pattern = [50]) {
    if (navigator.vibrate) {
      navigator.vibrate(pattern);
    }
  }

  function pressDigit(d) {
    var el = document.getElementById('codeDisplay');
    var v = (el.value || '').toString();
    
    if (v.length >= CODE_MAX_LEN) {
      // แสดงเอฟเฟกต์เมื่อเต็มแล้ว
      el.style.animation = 'shake 0.5s ease-in-out';
      setTimeout(() => el.style.animation = '', 500);
      vibrate([100, 50, 100]);
      return;
    }
    
    el.value = v + d;
    playClickSound('number');
    vibrate([30]);
    
    // เอฟเฟกต์แสงกระพริบ
    el.style.boxShadow = '0 0 30px rgba(0, 229, 255, 0.8), inset 0 0 20px rgba(0, 229, 255, 0.3)';
    setTimeout(() => {
      el.style.boxShadow = '0 0 20px rgba(0, 229, 255, 0.3), inset 0 0 15px rgba(0, 229, 255, 0.1)';
    }, 200);
  }

  function backspace() {
    var el = document.getElementById('codeDisplay');
    var v = (el.value || '').toString();
    
    if (v.length === 0) {
      // ไม่มีอะไรให้ลบ
      el.style.animation = 'pulse 0.3s ease-in-out';
      setTimeout(() => el.style.animation = '', 300);
      return;
    }
    
    el.value = v.slice(0, -1);
    playClickSound('delete');
    vibrate([50]);
    
    // เอฟเฟกต์แสงแดง
    el.style.boxShadow = '0 0 25px rgba(255, 71, 87, 0.6), inset 0 0 15px rgba(255, 71, 87, 0.2)';
    setTimeout(() => {
      el.style.boxShadow = '0 0 20px rgba(0, 229, 255, 0.3), inset 0 0 15px rgba(0, 229, 255, 0.1)';
    }, 200);
  }

  function clearCode() {
    var el = document.getElementById('codeDisplay');
    
    if (!el.value) {
      return;
    }
    
    el.value = '';
    playClickSound('clear');
    vibrate([80, 50, 80]);
    
    // เอฟเฟกต์แสงส้ม
    el.style.boxShadow = '0 0 25px rgba(255, 165, 0, 0.6), inset 0 0 15px rgba(255, 165, 0, 0.2)';
    setTimeout(() => {
      el.style.boxShadow = '0 0 20px rgba(0, 229, 255, 0.3), inset 0 0 15px rgba(0, 229, 255, 0.1)';
    }, 200);
    
    // ซ่อนข้อความผิดพลาด
    document.getElementById('modalMsg').innerText = '';
  }

  function submitCode() {
    var code = (document.getElementById('codeDisplay').value || '').toString().trim();
    var msgEl = document.getElementById('modalMsg');
    
    if (!code) {
      msgEl.innerText = 'กรุณาใส่รหัสแขก';
      msgEl.style.display = 'block';
      
      // เอฟเฟกต์เตือน
      var el = document.getElementById('codeDisplay');
      el.style.animation = 'shake 0.5s ease-in-out';
      el.style.borderColor = '#ff4757';
      setTimeout(() => {
        el.style.animation = '';
        el.style.borderColor = '#00e5ff';
      }, 500);
      
      vibrate([100, 100, 100]);
      return;
    }
    
    // เอฟเฟกต์สำเร็จ
    playClickSound('confirm');
    vibrate([50, 50, 100]);
    
    var el = document.getElementById('codeDisplay');
    el.style.boxShadow = '0 0 30px rgba(64, 224, 208, 0.8), inset 0 0 20px rgba(64, 224, 208, 0.3)';
    
    // แสดง loading
    var confirmBtn = document.querySelector('.confirm-btn');
    var originalText = confirmBtn.innerHTML;
    confirmBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> กำลังตรวจสอบ...';
    confirmBtn.disabled = true;
    
    // ไปหน้า donate/{CODE}
    setTimeout(() => {
      var url = '<?= rtrim(site_url('donate'), '/') ?>' + '/' + encodeURIComponent(code);
      window.location.href = url;
    }, 800);
  }

  // รองรับคีย์บอร์ดจริง
  document.addEventListener('keydown', function(e) {
    if (!$('#donateModal').hasClass('show')) return;
    
    e.preventDefault();
    
    if (e.key >= '0' && e.key <= '9') {
      pressDigit(e.key);
    } else if (e.key === 'Backspace') {
      backspace();
    } else if (e.key === 'Delete' || e.key === 'Clear') {
      clearCode();
    } else if (e.key === 'Enter') {
      submitCode();
    } else if (e.key === 'Escape') {
      $('#donateModal').modal('hide');
    }
  });

  // เอฟเฟกต์เมื่อเปิด/ปิด modal
  $('#donateModal').on('shown.bs.modal', function() {
    // Focus ที่ display
    document.getElementById('codeDisplay').focus();
    
    // เคลียร์ข้อมูลเก่า
    document.getElementById('codeDisplay').value = '';
    document.getElementById('modalMsg').innerText = '';
    
    // เอฟเฟกต์เปิด
    $('.modern-modal').css('transform', 'scale(0.8)').animate({
      transform: 'scale(1)'
    }, 300);
  });

  $('#donateModal').on('hidden.bs.modal', function() {
    // รีเซ็ตปุ่มยืนยัน
    var confirmBtn = document.querySelector('.confirm-btn');
    confirmBtn.innerHTML = '<i class="fas fa-check"></i> ยืนยัน';
    confirmBtn.disabled = false;
  });

  // เอฟเฟกต์ hover สำหรับปุ่ม
  document.addEventListener('DOMContentLoaded', function() {
    const buttons = document.querySelectorAll('.keypad-btn');
    
    buttons.forEach(button => {
      button.addEventListener('mouseenter', function() {
        this.style.transform = 'translateY(-2px) scale(1.02)';
      });
      
      button.addEventListener('mouseleave', function() {
        this.style.transform = 'translateY(0) scale(1)';
      });
      
      button.addEventListener('mousedown', function() {
        this.style.transform = 'translateY(0) scale(0.98)';
      });
      
      button.addEventListener('mouseup', function() {
        this.style.transform = 'translateY(-2px) scale(1.02)';
      });
    });
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
