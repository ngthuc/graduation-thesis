<?php
  $template = 'public/themes/basic_template';

  if(count($person_info) > 0) {
    foreach ($person_info as $key => $value) {
      // code...
      if($value['INFOTITLE'] == 'avatar') {
        $data['image'] = $value['INFOIMAGE'];
      } else if($value['INFOTITLE'] == 'birthday') {
        $data['dob'] = $value['INFODATE'];
      } else {
        $data[$value['INFOTITLE']] = $value['INFOCONTENT'];
      }
    }
  } else {
    $data['image'] = null;
    $data['name'] = null;
    $data['position'] = null;
    $data['dob'] = null;
    $data['gender'] = null;
    $data['email'] = null;
    $data['phone'] = null;
    $data['website'] = null;
    $data['address'] = null;
  }
?>
<div id="head">
    <img id="image" src="<?=$data['image'] ;?>">
    <div id="name"><?=$data['name'] ;?></div>
    <div id="position"><?=$data['position'] ;?></div>
    <table id="tb_ephone">
      <tbody>
        <tr>
          <td class="dob">
            <img class="icon" src="<?=base_url($template.'/images/dob.png'); ?>"> <?=$data['dob'] ;?>
          </td>
          <td class="sex">
            <img class="icon" src="<?=base_url($template.'/images/sex.png'); ?>"><?=$data['gender'] ;?>
          </td>
        </tr>
        <tr>
          <td class="email">
            <img class="icon" src="<?=base_url($template.'/images/mail.png'); ?>"><?=$data['email'] ;?>
          </td>
          <td class="phone">
            <img class="icon" src="<?=base_url($template.'/images/phone.png'); ?>"> <?=$data['phone'] ;?>
          </td>
        </tr>
        <tr>
          <td class="email">
            <img class="icon" src="<?=base_url($template.'/images/www.png'); ?>"> <?=$data['website'] ;?>
          </td>
        </tr>
        <tr>
          <td class="address" colspan="2">
            <img class="icon" src="<?=base_url($template.'/images/location.png'); ?>"> <?=$data['address'] ;?>
          </td>
        </tr>
      </tbody>
    </table>

    <div id="intro"></div>
</div>
