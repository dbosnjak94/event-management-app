<form>
    <div class="card text-white bg-dark mb-3" style="max-width: auto;">
  <div class="card-header bg-transparent bg-dark">
  <div class="text-center"><h1>Current Events</h1></div>
  
  <h2><?php session_start();
     echo $_SESSION['username'];
    ?></h2> 
    <h4>Event Manager</h4>
  </div>
  <div class="card-body text-white">
  <?php
    
    $content = "<table class='table'><tr><th>Event Name</th><th>Date Start</th><th>Date End</th><th>Maximum attendees</th><th>Venue</th><th>Manager</th></tr>\n";

    foreach ($data as $event) {
        $content .= "<tr><td><a href='" . URL_ROOT . "index.php?page=session&method=getAllEventSessions&param=" . $event->idevent . "'>" . $event->name . "</td>" .
                "<td>$event->datestart</td>" .
                "<td>$event->dateend</td>" .
                "<td>$event->numberallowed</td>" .
                "<td>$event->venue</td>" .
                "<td>$event->attendeeName</td>". 
                "<td> <a href='" . URL_ROOT . "index.php?page=session&method=unRegisterUser&param=" . $event->idsession . 
                "&param=" . $event->name .
                "&param=" . $event->datestart .
                "&param=" . $event->dateend .
                "&param=" . $event->numberallowed .
                "&param=" . $event->attendeeName . 
                "&param=" . $event->venue . "'> Edit Event </td>
                <td><a href='" . URL_ROOT . "index.php?page=event&method=deleteEvent&param=" . $event->idevent . "'> Delete Event </td></tr>\n";
    }

    $content .= "</table>\n";

    $content .="<a class='adminLink' href='" . URL_ROOT . "index.php?page=createnewevent&method=__construct'>       Add new event";
    
    $content .="<a class='adminLink' href='" . URL_ROOT . "index.php?page=createnewsession&method=__construct'>       Add new session";
    
    echo $content;
    ?>
</form>

