<?php 
/** @var $this - is an instance of \thecore\phpmvc\View */

$this->title = 'Profile'; 
?>

<h1>Profile</h1>
<form action="/contact" method="POST">
    <div class="form-group">
        <label>Subject</label>
        <input type="text" class="form-control" name="subject">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="text" class="form-control" name="subject">
    </div>
    <div class="form-group">
       <button class="btn btn-primary" type="submit">Submit</button>
    </div>
</form>