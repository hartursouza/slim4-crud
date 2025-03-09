<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Página estruturada com Bootstrap 5">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/home/css/style.css">

    <!-- Title -->
    <title><?=$this->e($title)?></title>
</head>
<body class="d-flex flex-column min-vh-100">

    <!-- Header -->
    <?= $this->insert('partials/header') ?>

    <!-- Conteúdo principal -->
    <main class="container flex-grow-1 mt-4">
        <?= $this->section('content') ?>
    </main>

    <!-- Footer -->
    <?= $this->insert('partials/footer') ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>