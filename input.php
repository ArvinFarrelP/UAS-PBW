<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Input Data</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
        <form method="POST" action="input_data.php" class="container" autocomplete="off">
        <h1 class="mt-5">Masukan Data Buku</h1>
  <div class="form-group">
    <label for="judul">Judul</label>
    <input type="text" class="form-control" id="judul" name="judul"  placeholder="Masukan judul buku">
  </div>
  <div class="form-group">
    <label for="tahun">Tahun Terbit</label>
    <input type="text" class="form-control" name="tahun"  placeholder="Masukan tahun terbit">
  </div>
  <div class="form-group mb-3">
    <label for="exampleFormControlSelect1">Penulis</label>
    <select id="id_penulis" name="id_penulis" required>
      <option value="">Pilih Penulis</option>
        <?php
          include 'koneksi.php';
          $penulis = $koneksi->query("SELECT id_penulis,nama_penulis FROM penulis");
          while ($row = $penulis->fetch(PDO::FETCH_ASSOC)) {
              echo "<option value='{$row['id_penulis']}'>{$row['nama_penulis']}</option>";
           }
      ?>
     </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  <a href="homepage.php" class="btn btn-secondary">Kembali</a>
</form>
</body>
</html>