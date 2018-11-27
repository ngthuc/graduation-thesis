<?php
$categories = $this->Mcategory->returnCategories($user,'info');
foreach ($categories as $key => $category) {
  // code...
  echo '<!-- '.convert_url($category['CATENAME']).' -->';
  echo '<div class="con">
    <div class="tb_title">'.$category['CATENAME'].'</div>';
    call_info($user,$category['CATEID']);
  echo '</div>';
 // else if($category['CATELEVEL'] == 2) {
 //   echo '<div class="tb">
 //     <span class="year"></span>
 //     <ul class="list">
 //       <li>
 //        <span class="title">'.$category['CATENAME'].'</span>
 //        <div class="info">
 //          <br>
 //         QIMIE 2015 is organized in association with the PAKDD 2015 conference, with Prof. P. Lenca, Prof. S. Lallich<br><br>
 //         IEEE-RIVF 2015 International Conference on Computing and Communication Technologies, Workshop chair<br><br>
 //         VisECD 2009  is organized in association with the EGC 2009 conference, with Prof. F. Poulet, Prof. B. Legrand, Prof. M-A. Aufaure<br><br>
 //         VisECD 2008  is organized in association with the EGC 2008 conference, with Prof. F. Poulet, Prof. B. Legrand
 //        </div>
 //       </li>
 //     </ul>
 //   </div>';
 //  }
}
?>
