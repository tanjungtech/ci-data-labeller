<nav class="navbar navbar-expand-lg navbar-dark bg-primary app-nav">
  <div class="container">
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link <?php if($uri_param === '/'){ echo 'active'; }?>" href="<?= base_url() ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($uri_param === '/files'){ echo 'active'; }?>" href="<?= base_url('files') ?>">Files</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('questions') ?>">Question Set</a>
        </li>
      </ul>
    </div>
  </div>
</nav>