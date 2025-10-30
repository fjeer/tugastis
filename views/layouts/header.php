<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi Pemerintahan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="bg-success bg-opacity-10">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="../../img/logo.png" alt="Logo" width="30" class="d-inline-block align-text-top">
      Sistem Informasi
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../person/index.php">Person</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../jabatan/index.php">Jabatan</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Alamat
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="../provinsi/index.php">Data Provinsi</a></li>
            <li><a class="dropdown-item" href="../kabupaten/index.php">Data Kabupaten</a></li>
            <li><a class="dropdown-item" href="../kecamatan/index.php">Data Kecamatan</a></li>
            <li><a class="dropdown-item" href="../desa/index.php">Data Desa</a></li>
          </ul>
        </li>
      </ul>
        <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
