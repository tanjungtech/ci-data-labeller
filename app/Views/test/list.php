<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="wrapper">

		<div id="content-wrapper">

      <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Created At</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($tests as $test): ?>
          <tr>
            <td width="150">
              <?php echo $test->id ?>
            </td>
            <td>
              <?php echo $test->name ?>
            </td>
            <td>
              <?php echo $test->description ?>
            </td>
            <td width="250">
              <?php echo $test->created_at ?>
            </td>
          </tr>
          <?php endforeach; ?>

        </tbody>
      </table>

			<!-- Sticky Footer -->
			<?php $this->load->view("admin/_partials/footer.php") ?>

		</div>
		<!-- /.content-wrapper -->

	</div>
	<!-- /#wrapper -->

	<?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>