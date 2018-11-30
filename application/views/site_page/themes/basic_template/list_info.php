<?php
foreach ($person_research as $key => $category) {
  // code...
  echo '<!-- '.convert_url($category['CATENAME']).' -->';
  if($category['CATEHREF']) echo '<a name="'.catehref_format($category['CATEHREF']).'">';
  echo '<div class="con">
    <div class="tb_title">'.$category['CATENAME'].'</div>';
    call_info($user,$category['CATEID']);
  echo '</div>';
}
?>
