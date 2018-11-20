<?php $space = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; ?>
<div align="right">
<?php
$menu = $this->Menu->getSortByParent($user,0,'MENUPOSITION','ASC');
foreach ($menu as $key => $row_menu) {
  // code...
  echo $space.'|<a href="'.$row_menu['MENULINK'].'">'.$row_menu['MENUNAME'].'</a>|';
}
?>
</div>
