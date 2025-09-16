<?php ob_start(); ?>
<style>
  body > .container > h1 {
    display: none;
  }

  .dashboard-hero {
    position: relative;
    display: grid;
    grid-template-columns: minmax(280px, 360px) minmax(380px, 1fr);
    gap: 2.5rem;
    align-items: stretch;
    margin-top: 1.5rem;
  }

  @media (max-width: 1200px) {
    .dashboard-hero {
      grid-template-columns: minmax(260px, 320px) minmax(360px, 1fr);
      gap: 2rem;
    }
  }

  @media (max-width: 992px) {
    .dashboard-hero {
      grid-template-columns: 1fr;
    }
  }

  .wedding-card {
    position: relative;
    border-radius: 32px;
    overflow: hidden;
    min-height: 520px;
    box-shadow: 0 25px 55px rgba(0, 0, 0, 0.55);
    border: 1px solid rgba(255, 255, 255, 0.12);
    backdrop-filter: blur(6px);
  }

  .wedding-card::before {
    content: "";
    position: absolute;
    inset: 0;
    background: url('<?= base_url('images/wedding-hero.jpg') ?>') center top / cover no-repeat;
    transform: scale(1.02);
    filter: saturate(1.05);
  }

  .wedding-card::after {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, rgba(255, 255, 255, 0.18) 0%, rgba(17, 9, 44, 0.75) 75%, rgba(12, 7, 28, 0.95) 100%);
  }

  .wedding-card__content {
    position: relative;
    z-index: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: 100%;
    padding: 2.75rem 2.25rem;
    color: #fefefe;
    text-shadow: 0 12px 34px rgba(0, 0, 0, 0.6);
  }

  .wedding-card__names {
    font-family: 'Sirivennela', cursive;
    font-size: 3.4rem;
    line-height: 1.1;
    letter-spacing: 2px;
  }

  .wedding-card__names span {
    display: block;
  }

  .wedding-card__accent {
    width: 70px;
    height: 3px;
    border-radius: 999px;
    background: linear-gradient(90deg, rgba(255, 196, 224, 0.9), rgba(255, 132, 173, 0.5));
    margin: 1.5rem 0;
  }

  .wedding-card__date {
    font-size: 1.05rem;
    letter-spacing: 3px;
    text-transform: uppercase;
    color: rgba(255, 232, 242, 0.95);
  }

  .summary-panel {
    position: relative;
    border-radius: 32px;
    padding: 2.5rem;
    background: linear-gradient(145deg, rgba(16, 23, 52, 0.9), rgba(32, 16, 46, 0.85));
    border: 1px solid rgba(255, 255, 255, 0.12);
    box-shadow: 0 25px 55px rgba(0, 0, 0, 0.5);
    overflow: hidden;
    backdrop-filter: blur(5px);
  }

  .summary-panel::before {
    content: "";
    position: absolute;
    inset: 0;
    background: url('<?= base_url('images/donation_bg.png') ?>') center/cover no-repeat;
    opacity: 0.25;
    mix-blend-mode: screen;
  }

  .summary-panel > * {
    position: relative;
    z-index: 1;
  }

  .summary-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 1.5rem;
    flex-wrap: wrap;
  }

  .summary-title {
    margin: 0;
    font-family: 'Sirivennela', cursive;
    font-size: 3.25rem;
    color: #fff;
  }

  .summary-subtitle {
    margin: 0.35rem 0 0;
    font-size: 1.1rem;
    letter-spacing: 4px;
    text-transform: uppercase;
    color: rgba(255, 229, 247, 0.85);
  }

  .summary-actions {
    display: flex;
    gap: 0.75rem;
    flex-wrap: wrap;
  }

  .summary-action-btn {
    border: none;
    border-radius: 999px;
    padding: 0.75rem 1.75rem;
    font-weight: 600;
    letter-spacing: 1px;
    text-transform: uppercase;
    font-size: 0.95rem;
    cursor: pointer;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.25);
  }

  .summary-action-btn:focus {
    outline: none;
  }

  .summary-action-btn--register {
    background: linear-gradient(120deg, #ffd4e5, #ff9fc8);
    color: #3a1037;
  }

  .summary-action-btn--donate {
    background: linear-gradient(120deg, #66f1d9, #3ed5ff);
    color: #041428;
  }

  .summary-action-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 16px 30px rgba(0, 0, 0, 0.3);
  }

  .summary-grid {
    margin-top: 2.25rem;
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 1.75rem;
  }

  @media (max-width: 576px) {
    .summary-grid {
      grid-template-columns: 1fr;
    }
  }

  .summary-card {
    position: relative;
    border-radius: 26px;
    padding: 1.8rem 1.4rem;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 1.4rem;
    overflow: hidden;
    border: 1px solid rgba(255, 255, 255, 0.12);
    background: linear-gradient(145deg, rgba(255, 255, 255, 0.12), rgba(255, 255, 255, 0.03));
    min-height: 210px;
  }

  .summary-card::before {
    content: "";
    position: absolute;
    inset: 0;
    background: url('<?= base_url('images/donation_bg.png') ?>') center/cover no-repeat;
    opacity: 0.4;
    mix-blend-mode: lighten;
  }

  .summary-card::after {
    content: "";
    position: absolute;
    inset: 0;
    background: radial-gradient(circle at top right, rgba(255, 183, 214, 0.35), transparent 55%);
    opacity: 0.9;
  }

  .summary-card > * {
    position: relative;
    z-index: 1;
  }

  .summary-card__label {
    font-size: 1.15rem;
    letter-spacing: 3px;
    text-transform: uppercase;
    color: rgba(255, 231, 245, 0.95);
  }

  .summary-card__value {
    position: relative;
    width: 120px;
    height: 120px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 3.2rem;
    font-weight: 700;
    color: #ffffff;
    background: radial-gradient(circle at 50% 30%, #6bd9ff 0%, #1c79ff 70%);
    box-shadow: 0 18px 32px rgba(28, 121, 255, 0.35), inset 0 0 30px rgba(255, 255, 255, 0.18);
  }

  .summary-card__value::before {
    content: "";
    position: absolute;
    inset: -12px;
    border-radius: 50%;
    background: linear-gradient(135deg, rgba(109, 216, 255, 0.6), rgba(30, 105, 255, 0));
    box-shadow: 0 0 35px rgba(109, 216, 255, 0.45);
    z-index: -1;
  }

  .summary-card--total {
    background: linear-gradient(145deg, rgba(255, 255, 255, 0.18), rgba(255, 255, 255, 0.06));
  }

  .summary-card--total::after {
    background: radial-gradient(circle at bottom left, rgba(58, 241, 255, 0.45), transparent 60%);
  }

  .summary-card--total .summary-card__value {
    background: radial-gradient(circle at 50% 30%, #7df5e8 0%, #28d5ff 65%);
    box-shadow: 0 20px 34px rgba(41, 209, 255, 0.35), inset 0 0 30px rgba(255, 255, 255, 0.2);
  }

  .summary-card--total .summary-card__value::before {
    background: linear-gradient(135deg, rgba(109, 255, 241, 0.6), rgba(41, 209, 255, 0));
  }

  @media (max-width: 768px) {
    .wedding-card {
      min-height: 460px;
    }

    .wedding-card__content {
      padding: 2.25rem 1.75rem;
    }

    .wedding-card__names {
      font-size: 3rem;
    }

    .summary-panel {
      padding: 2rem 1.75rem;
    }

    .summary-title {
      font-size: 2.75rem;
    }

    .summary-card {
      padding: 1.6rem 1.25rem;
    }

    .summary-card__value {
      width: 110px;
      height: 110px;
      font-size: 2.8rem;
    }
  }
</style>

<div class="dashboard-hero">
  <section class="wedding-card">
    <div class="wedding-card__content">
      <div>
        <div class="wedding-card__names">.
        </div>
        <div class="wedding-card__accent">.</div>
      </div>
    </div>.
  </section>

  <section class="summary-panel">
    <div class="summary-header">
      <div>
        <h2 class="summary-title">Wedding Donation</h2>
        <p class="summary-subtitle">"ขอบคุณที่มาร่วมเป็นส่วนหนึ่งในวันสำคัญของเรา"</p>
      </div>
      <div class="summary-actions">
        <a href="<?= site_url('register') ?>" class="summary-action-btn summary-action-btn--register">ลงทะเบียน</a>
        <button type="button" class="summary-action-btn summary-action-btn--donate" data-toggle="modal" data-target="#donateModal">บริจาค</button>
      </div>
    </div>

    <div class="summary-grid">
      <article class="summary-card">
        <div class="summary-card__label">โรงเรียน</div>
        <div class="summary-card__value"><?= (int)$sum['SCHOOL'] ?></div>
      </article>
      <article class="summary-card">
        <div class="summary-card__label">โรงพยาบาล</div>
        <div class="summary-card__value"><?= (int)$sum['HOSPITAL'] ?></div>
      </article>
      <article class="summary-card">
        <div class="summary-card__label">วัด</div>
        <div class="summary-card__value"><?= (int)$sum['TEMPLE'] ?></div>
      </article>
      <article class="summary-card summary-card--total">
        <div class="summary-card__label">รวมทั้งหมด</div>
        <div class="summary-card__value"><?= (int)$total ?></div>
      </article>
    </div>
  </section>
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
