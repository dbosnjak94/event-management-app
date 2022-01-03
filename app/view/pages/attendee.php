<form>
    <div class="card text-white bg-dark mb-3" style="max-width: auto;">
  <div class="card-header bg-transparent border-dark">    <h2><?php session_start();
     echo $_SESSION['username'];
    ?></h2>
    <h4>Attedee</h4></div>
    
  <div class="card-body text-white">
  <?php
    
    $content = "<table class='table'><tr><th>Event Name</th><th>Date Start</th><th>Date End</th><th>Maximum attendees</th><th>Venue</th><th>Manager</th></tr>\n";

    foreach ($data as $events) {
        $content .= "<tr><td><a href='" . URL_ROOT . "index.php?page=session&method=getAllEventSessions&param=" . $events->idevent . "'>" . $events->name . "</td>" .
                "<td>$events->datestart</td>" .
                "<td>$events->dateend</td>" .
                "<td>$events->numberallowed</td>" .
                "<td>$events->venue</td>" .
                "<td>$events->attendeeName</td></tr>\n";
    }
    $content .= "</table>\n";
    echo $content;
    ?>
  </div>

  
</div>
</form>