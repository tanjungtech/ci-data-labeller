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
      <h2>Upload your course (in pdf format)</h2>
      <?php if(strlen($error) > 0): ?>
        <div class="alert alert-warning" role="alert">
          <?php echo $error;?>
        </div>
      <?php endif; ?>

      <?php var_dump($account_id); ?>
      <?php var_dump($account_name); ?>

      <?php if($account_id): ?>
        <?php echo form_open_multipart('/upload/upload_course');?>

          <div class="input-group mb-3">
            <label class="input-group-text" for="coursefile">Upload PDF File</label>
            <input type="file" class="form-control" name="coursefile" id="coursefile" accept='application/pdf' >
          </div>

          <div class='btn-form-wrapper'>
            <button type="submit" class="btn btn-primary btn-app-style">Upload</button>
          </div>
        </form>
      <?php endif; ?>

    </div>

    <!-- Jquery dan Bootsrap JS -->
    <script src="<?= base_url('js/jquery.js') ?>"></script>
    <script src="<?= base_url('js/bootstrap.min.js') ?>"></script>

  </body>
</html>