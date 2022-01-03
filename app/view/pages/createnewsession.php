
<form action="index.php?page=createnewsession&method=addNewSession" method="POST">
   <div class="card text-white bg-dark mb-3" style="max-width: auto;">
  <div class="card-header">
  <div class="text-center"><h1>Add new session</h1></div>
  <h2><?php session_start(); echo $_SESSION['username'];?></h2></div>
  <div class="card-body">
    <h5 class="card-title">Events</h5>
    <div class="form-group">
      <label for="user_id">Event Name</label>
      <input type="text" class="form-control" placeholder="Example: Orientation day " name="eventName" id="eventName" required="required">
   </div>
   <div class="form-group">
      <label for="user_pass">Number Allowed</label>
      <input type="number" class="form-control" placeholder="Example: 300" name="numberAllowed" id="numberAllowed" required="required">
   </div>
   <div class="form-group">
      <label>Event</label>
        <select name="event" id="event">
            <option value="Career Education Day">CED</option>
            <option value="Evelina Class">Theathre with prof. Evelina</option>
        </select>
   </div>
   <div class="form-group">
      <label for="user_pass">Date Start</label>
      <input type="text" class="form-control" placeholder="Example: 2020-05-05" name="dateStart" id="dateStart" required="required">
   </div>
   <div class="form-group">
      <label for="user_pass">Date End</label>
      <input type="text" class="form-control" placeholder="Example: 2020-05-05" name="dateEnd" id="dateEnd" required="required">
   </div>
   <div class="form-group">
   <button type="submit" class="btn btn-secondary btn-lg">Submit</button>
    <button type="reset" class="btn btn-secondary btn-lg">Reset</button>
   </div>
  </div>
</div>
</form>
