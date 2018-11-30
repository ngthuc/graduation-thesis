<?php $space = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; ?>
<div <?=($menu_style=='home') ? 'align="right"' : 'style="text-align: center;"'; ?>>
  <?=($menu_style=='subpage') ? '<hr style="width: 100%; height: 2px;"><span style="color: rgb(255, 204, 0);">' : ''; ?>
<?php
$menu = get_menu($user,$menu_type);
foreach ($menu as $key => $row_menu) {
  // code...
  if($menu_style=='home') {
    echo $space.'|<a href="'.$row_menu['MENULINK'].'">'.$row_menu['MENUNAME'].'</a>|';
  } else if($menu_style=='subpage') {
    echo $space.'[<a href="'.$row_menu['MENULINK'].'">'.$row_menu['MENUNAME'].'</a>]';
  }
}
?>
  <?=($menu_style=='subpage') ? '</span><br><hr style="width: 100%; height: 2px;"><br><br>' : ''; ?>
</div>
