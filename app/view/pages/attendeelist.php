<form>
    <div class="card text-white bg-dark mb-3" style="max-width: auto;">
  <div class="card-header">
  <div class="text-center"><h1>List of all attendees</h1></div>
  <h2><?php session_start();
     echo $_SESSION['username'];
    ?></h2>
    
  </div>
  <div class="card-body">
  <h4 class="card-title">All Attendees</h4>
  <?php

      $content = "<table class='table'><tr><th>Attendee Name</th><th>Role</th><th>Attendee ID</th><th>Change Attendee's Role</th></tr>\n";

      foreach ($data as $attendees) {
        if ($attendees->role == 1) {
          $attendee = "admin";
        } else if ($attendees->role == 2) {
          $attendee = "event manager";
        } else {
          $attendee = "attendee";
        }

        $content .= "<tr><td>" . $attendees->name . "</td>"
          . "<td>$attendee</td>"
          . "<form action='index.php?page=attendeeList&method=updateAttendeeRole' method='POST'>"
          . "<td><input type='text'  placeholder='" . $attendees->idattnedee . "' name='idAttendee' id='idAttendee' value='" . $attendees->idattendee . "'></td>"
          . "<td><label>Choose a role:</label>
                      <select name='role' id='role'>
                        <option value='admin'>Admin</option>
                        <option value='eventManager'>Event Manager</option>
                        <option value='attendee'>Attendee</option>
                      </select> </td>"
          . "<td><input type='submit' value='Change Role'/></td>"
          . "</form>"
          . "<td><a href='" . URL_ROOT . "index.php?page=attendeeList&method=deleteAttendee&param=" . $attendees->idattendee . "'> Delete </td></tr>\n";
      }

      $content .= "</table>\n";
      echo $content;
    ?>
  </div>
</div>  
</form>