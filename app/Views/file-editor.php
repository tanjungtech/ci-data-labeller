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
        <h2>Create Question Panel</h2>
      </div>

      <div id='pdf-viewer'>

        <div id='canvas-container'>
          <canvas id='pdf-wrap'>
          </canvas>
          <div id='selector' hidden></div>
        </div>

        <div id="navigation_controls">
          <button id="go_previous">Previous</button>
          <input id="current_page" value="1" type="number"/>
          <button id="go_next">Next</button>
        </div>
      </div>
      <input type="hidden" class="txt_csrfname" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />

    </div>

    <!-- Jquery dan Bootsrap JS -->
    <script src="<?= base_url('js/jquery.js') ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.943/pdf.min.js"></script>
    <script src="<?= base_url('js/bootstrap.min.js') ?>"></script>

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
          let canvas = document.getElementById("pdf-wrap");
          const ctx = canvas.getContext('2d');

          const viewport = page.getViewport(my_state.zoom);

          canvas.width = viewport.width;
          canvas.height = viewport.height;
    
          page.render({
            canvasContext: ctx,
            viewport: viewport
          });
        });
      }

    </script>

    <script>
      let div = document.getElementById('selector'), x1 = 0, y1 = 0, x2 = 0, y2 = 0;

      function reCalc() {
        let x3 = Math.min(x1,x2);
        let x4 = Math.max(x1,x2);
        let y3 = Math.min(y1,y2);
        let y4 = Math.max(y1,y2);
        div.style.left = x3 + 'px';
        div.style.top = y3 + 'px';
        div.style.width = x4 - x3 + 'px';
        div.style.height = y4 - y3 + 'px';
      }

      let is_dragging = false

      $('#canvas-container').on('mousedown', (e) => {
        is_dragging = true;
        div.hidden = 0;
        x1 = e.originalEvent.layerX;
        y1 = e.originalEvent.layerY;
        x2 = x1;
        y2 = y1;
        if (is_dragging) {
          console.log('recalc')
          reCalc();          
        }
      }).on('mousemove', (e) => {
        x2 = e.originalEvent.layerX;
        y2 = e.originalEvent.layerY;
        if (is_dragging) {
          console.log('mousemove')
          console.log('x2', x2)
          console.log('y2', y2)
          reCalc();
        }
      }).on('mouseup', (e) => {
        div.hidden = 0;
        is_dragging = false;
        console.log('trigger ajax');
         // CSRF Hash
        const csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
        const csrfHash = $('.txt_csrfname').val(); // CSRF hash
        $.ajax({
          url: "<?php echo base_url();?>/api/file/extract",
          type: 'POST',
          data: {
            'x1': x1,
            'x2': x2,
            'y1': y1,
            'y2': y2,
            'file_target': '<?php echo base_url('uploads/'.$file_source); ?>',
            [csrfName]: csrfHash
          },
          dataType: "json",  
          success: function(data) {
            //Success Message
            console.log('data', data)
          },  
          error: function(req, status, error) {
            alert(req.responseText);
            console.log('error', req.responseText)   
          }  
        })
      })
    </script>
  </body>
</html>