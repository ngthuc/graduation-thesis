<?php $template = 'public/themes/basic_template';?>
<div id="head">
    <img id="image" src="<?=$person_info_default['USERAVATAR'];?>">
    <div id="name"><?=$person_info_default['USERFULLNAME'];?></div>
    <div id="position"><?=$person_info_default['USERPOSITION'];?></div>
    <table id="tb_ephone">
      <tbody>
    <?php
      if(count($person_info_customize) > 0) {
        for($i=0;$i<count($person_info_customize);$i++) {
          if($person_info_customize[$i]['INFOTYPE'] == 'website' || $person_info_customize[$i]['INFOTYPE'] == 'address' || $person_info_customize[$i]['INFOTYPE'] == 'info') {
            echo '<tr>
              <td class="'.$person_info_customize[$i]['INFOTITLE'].'" colspan="2">
                <img class="icon" src="'.base_url($template.'/images/'.$person_info_customize[$i]['INFOTITLE'].'.png').'">'.$person_info_customize[$i]['INFOCONTENT'].'
              </td>
            </tr>';
          } else {
            if(($i == 0) || ($i % 2 == 0)) {
              echo '<tr>
                <td class="'.$person_info_customize[$i]['INFOTITLE'].'">
                  <img class="icon" src="'.base_url($template.'/images/'.$person_info_customize[$i]['INFOTITLE'].'.png').'">'.(($person_info_customize[$i]['INFOTYPE']=='dob') ? $person_info_customize[$i]['INFODATE'] : $person_info_customize[$i]['INFOCONTENT']).'
                </td>';
            } else {
              echo '<td class="'.$person_info_customize[$i]['INFOTITLE'].'">
                <img class="icon" src="'.base_url($template.'/images/'.$person_info_customize[$i]['INFOTITLE'].'.png').'">'.(($person_info_customize[$i]['INFOTYPE']=='dob') ? $person_info_customize[$i]['INFODATE'] : $person_info_customize[$i]['INFOCONTENT']).'
              </td>
            </tr>';
            }
          }
        }
      }
    ?>
      </tbody>
    </table>

    <div id="intro"></div>
</div>
