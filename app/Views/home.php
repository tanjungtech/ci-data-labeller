<!DOCTYPE html>

<html lang="en">
  <head>
    <title>Select Account - PDF Data Labeller</title>
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

    <div class='container-sm app-content'>
      <h2>Select Account</h2>
      <?php echo $error;?>

      <?php echo form_open('/', ['csrf_id' => 'my-id']);?>

      <select class="form-select" name="selected_account" aria-label="Default select example">
        <?php foreach( $accounts as $key => $label ): ?>
          <option value="<?php echo $label['id']; ?>" ><?php echo $label['name']; ?></option>
        <?php endforeach; ?>
      </select>

        <div class='btn-form-wrapper'>
          <button type="submit" class="btn btn-primary btn-app-style">Continue</button>
        </div>
      </form>
    </div>

    <!-- Jquery dan Bootsrap JS -->
    <script src="<?= base_url('js/jquery.js') ?>"></script>
    <script src="<?= base_url('js/bootstrap.min.js') ?>"></script>

  </body>
</html>