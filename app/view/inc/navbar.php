<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
      <a class="navbar-brand" href="<?php echo URL_ROOT; ?>">Event Manager App</a>

        <ul class="navbar-nav ml-auto">
        <span class="navbar-text">
          <?php session_start(); $username = $_SESSION['username'];  $content .="<h5 style='color:white;'> Welcome " . $username . "</h5>";  echo $content; ?></span>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URL_ROOT; ?>">Logout</a>
          </li>
        </ul>
    </nav>