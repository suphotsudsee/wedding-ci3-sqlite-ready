
<!doctype html>
<html lang="th">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?= isset($title)?$title:'Wedding Donation' ?></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/custom.css') ?>">
  <style>
    .card { border-radius: 1rem; }
    .grid-3 { display:grid; grid-template-columns: repeat(auto-fit,minmax(220px,1fr)); grid-gap:1rem; }
    .btn-cat { padding:1.2rem; font-weight:600; }
  </style>
</head>
<body class="bg-light">
  <div class="container py-4">
    <h1 class="mb-4">Wedding Donation</h1>
    <?= $content ?>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
