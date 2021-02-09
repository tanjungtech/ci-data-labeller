<!DOCTYPE html>

<html lang="en">
  <head>
    <title>Upload PDF - PDF Data Labeller</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>" />
  </head>
  <body>
    <?php echo view('header');?>

    <div class='container app-content'>
      <div class='header-app-content'>
        <h2>File List</h2>
        <a class="btn btn-primary btn-app-style" href="/files/upload">Upload New File</a>
      </div>

      <?php if($account_id): ?>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Filename</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($files as $file): ?>
              <tr>
                <th scope="row"><?php echo $file['id']; ?></th>
                <td><?php echo $file['filename']; ?></td>
                <td><a href="/files/editor/<?php echo $file['id']; ?>">Create question</a></td>
              </tr>
            <?php endforeach;?>
          </tbody>
        </table>
      <?php endif; ?>

    </div>

    <!-- Jquery dan Bootsrap JS -->
    <script src="<?= base_url('js/jquery.js') ?>"></script>
    <script src="<?= base_url('js/bootstrap.min.js') ?>"></script>

  </body>
</html>