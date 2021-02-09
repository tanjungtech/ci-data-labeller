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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-jcrop/0.9.15/css/jquery.Jcrop.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>" />
  </head>
  <body>
    <?php echo view('header');?>

    <div class='container app-content'>
      <div class='header-app-content'>
        <h2>Create Question Panel</h2>
      </div>

      <?php var_dump($file_source); ?>

      <div id='pdf-viewer'>

        <div id='canvas-container'>
          <canvas id='pdf-wrap'>
          </canvas>
        </div>

        <div id="navigation_controls">
          <button id="go_previous">Previous</button>
          <input id="current_page" value="1" type="number"/>
          <button id="go_next">Next</button>
        </div>
      </div>

    </div>

    <!-- Jquery dan Bootsrap JS -->
    <script src="<?= base_url('js/jquery.js') ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.943/pdf.min.js"></script>
    <script src="<?= base_url('js/bootstrap.min.js') ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-jcrop/0.9.15/js/jquery.Jcrop.min.js"></script>

    <script>
      var my_state = {
        pdf: null,
        current_page: 1,
        zoom: 1
      };

      pdfjsLib.getDocument("<?php echo base_url('uploads/'.$file_source); ?>").then((pdf) => {
        my_state.pdf = pdf;
        render();
      });

      console.log( "ready!" );

      function render() {
        my_state.pdf.getPage(my_state.current_page).then((page) => {
          var canvas = document.getElementById("pdf-wrap");
          var ctx = canvas.getContext('2d');

          var viewport = page.getViewport(my_state.zoom);

          canvas.width = viewport.width;
          canvas.height = viewport.height;
    
          page.render({
            canvasContext: ctx,
            viewport: viewport
          });
        });
      }

    </script>
  </body>
</html>