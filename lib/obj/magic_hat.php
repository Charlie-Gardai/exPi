<div id="magic_hat" class="slider_wrapper">
<?php
require_once(objPath('mod', 'search.php'));

forEach($slides AS $slide) {
  $slide->print();
} var_dump($slides);
?>
</div>
