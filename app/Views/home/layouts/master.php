<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- BOOSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/home/css/style.css">
    <title><?=$this->e($title)?></title>
  </head>
  <body>
    <div class="container">
      <?= $this->insert('partials/header') ?>

      <?= $this->section('content') ?>

      <?= $this->insert('partials/footer') ?>
    </div>
  </body>
</html>
