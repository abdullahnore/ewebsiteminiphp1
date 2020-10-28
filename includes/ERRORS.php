
<?php

$ERRORS=array();
if(count($ERRORS)>0):?>
<div class="error "> 
    <?php foreach($ERRORS as $ERROR) ?>
    <p><?Php echo $ERROR ?> </p>

</div>
<?php endif ?>