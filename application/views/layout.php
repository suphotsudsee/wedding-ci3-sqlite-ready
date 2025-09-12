
<!doctype html>
<html lang="th">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?= isset($title)?$title:'Wedding Donation' ?></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/custom.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css') ?>">
  <style>
    .card { border-radius: 1rem; }
    .grid-3 { display:grid; grid-template-columns: repeat(auto-fit,minmax(220px,1fr)); grid-gap:1rem; background-color:#000; }
    .btn-cat { padding:1.2rem; font-weight:600; }
  </style>
<!-- เรียกใช้ไลบรารี particles.js -->
  <script src="https://cdn.jsdelivr.net/npm/particles.js"></script>
</head>
<!-- <body class="bg-light"> -->
  <body class="text-light" style="background-color: #000;">
  <!-- พื้นหลังอนุภาค -->
  <div id="particles-js"></div>

  <div class="container py-4">
    <h1 class="mb-4">Wedding Donation</h1>
    <?= $content ?>
  </div>
  
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!-- ตั้งค่าพาร์ติเคิล -->
  <script>
    particlesJS('particles-js', {
      particles: {
        number: { value: 80 },
        color: { value: '#0ff' },
        shape: { type: 'circle' },
        opacity: { value: 0.3 },
        size: { value: 3 },
        line_linked: {
          enable: true,
          distance: 150,
          color: '#0ff',
          opacity: 0.4,
          width: 1
        },
        move: {
          enable: true,
          speed: 3
        }
      }
    });
  </script>
</body>
</html>
