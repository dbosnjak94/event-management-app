<form action="index.php?page=createnewevent&method=addNewEvent" method="POST">
<div class="card text-white bg-dark mb-3" style="max-width: auto;">
  <div class="card-header">
  <div class="text-center"><h1>Add new Event</h1></div>
   <h2><?php session_start(); echo $_SESSION['username'];?></h2>
   </div>
  <div class="card-body">
    <h5 class="card-title"><h3>Events</h3></h5>
    <div class="form-group">
      <label for="user_id">Event Name</label>
      <input type="text" class="form-control" placeholder="Example: RIT anual BBQ " name="eventName" id="eventName" required="required">
   </div>
   <div class="form-group">
      <label for="user_pass">Date Start</label>
      <input type="text" class="form-control" placeholder="Example: 2020-04-05" name="dateStart" id="dateStart" required="required">
   </div>
   <div class="form-group">
      <label for="user_pass">Date End</label>
      <input type="text" class="form-control" placeholder="Example: 2020-05-05" name="dateEnd" id="dateEnd" required="required">
   </div>
   <div class="form-group">
      <label for="user_pass">Number Allowed</label>
      <input type="number" class="form-control" placeholder="Example: 600" name="numberAllowed" id="numberAllowed" required="required">
   </div>
   <div class="form-group">
      <label>Venue</label>
        <select name="venue" id="venue">
            <option value="HNK">Hrvatsko Narodno Kazaliste</option>
            <option value="Westin">Westin</option>
        </select>
   </div>
   <div class="form-group">
   <button type="submit" class="btn btn-secondary btn-lg">Submit</button>
    <button type="reset" class="btn btn-secondary btn-lg">Reset</button>
   </div>
  </div>
</div>
  </div>
</div>
</form>