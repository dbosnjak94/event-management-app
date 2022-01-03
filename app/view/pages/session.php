<form>
<div class="card text-white bg-dark mb-3" style="max-width: auto;">
<div class="text-center"><h1>Register Page</h1></div>
  <div class="card-header bg-dark">   <h2> Sessions </h2></div>
  <div class="card-body text-white">
  <?php
      $content = "<table class='table'><tr><th>ID Session</th><th>Session Name</th><th>Number Allowed</th><th>Event</th><th>Start Date</th><th>End Date</th></tr>\n";

      foreach ($data as $session) {
          $content .=
              "<tr><td>" . $session->name . "</td>" .
              "<td>$session->name</td>" .
              "<td>$session->numberallowed</td>" .
              "<td>$session->event</td>" .
              "<td>$session->startdate</td>" .
              "<td>$session->enddate</td>" .
              "<td> <a href='" . URL_ROOT . "index.php?page=session&method=registerUser&param=" . $session->idsession . "'> Register </td>" .
              "<td> <a href='" . URL_ROOT . "index.php?page=session&method=unRegisterUser&param=" . $session->idsession . "'> Unregister </td></tr>\n";
      }

      $content .= "</table>\n";
      echo $content;
?>
  </div>
</div>
</form>