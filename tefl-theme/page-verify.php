<?php

get_header();

?>

<div class="verify--title">Verify Course Completion</div>

<div class="verify--container">
<form id="verify-form">
  <div>
    <label for="code">Input Verification Code: </label>
    <input type="text" id="verify-code" name="code" required size="8"
           placeholder=""
           minlength="8" maxlength="8">
    <span class="verify__validity"></span>
  </div>
  <div class="verify--button">
    <button type="submit">Submit</button>
  </div>
</form>
</div>

<div id="verify-target" class="verify--target">
  <div id="verify-name" class="verify--target--text verify--target--text__strong"></div>
  <div class="verify--target--text">Completed the Tefl Education Institute 120 Hour Online TEFl Course</div>
  <div id="verify-date" class="verify--target--text verify--target--text__strong"></div>
</div>

<div id="verify-invalid" class="verify--invalid">Invalid Code</div>



<?php

get_footer();
