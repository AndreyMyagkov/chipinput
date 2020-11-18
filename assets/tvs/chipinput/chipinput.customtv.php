<?php
    $data = $modx->runSnippet("DocLister", [
        'parents'=>'0',
        'idType'=>'parents',
        'depth'=>1,
        'api'=>'id,pagetitle',
        'JSONformat'=>'old',
        'orderBy'=>'pagetitle ASC',
    ]);

    $data = json_decode($data, true);
    $out='';

    $valuesArr = explode ('||', $field_value);

    if (count($data)) {
        foreach($data as $item){
            if (in_array($item['id'], $valuesArr)) {
                $selected = 'selected';
            } else {
                $selected = '';
            }
                $out.='<option value="'.$item['id'].'" '.$selected.'>'.$item['pagetitle'].'</option>'.PHP_EOL;
        }
    }

?>


<select id="tv<?=$field_id?>" name="tv<?=$field_id?>[]" multiple  onchange="documentDirty=true;">
    <?=$out;?>
</select>

<link rel="stylesheet" href="./../assets/tvs/chipinput/selectize/selectize.default.css"/>
<script src="./../assets/tvs/chipinput/selectize/selectize.js"></script>

<script>
    jQuery(document).ready(function(){
        jQuery('#tv<?=$field_id?>').selectize({ plugins: ['remove_button']});
    });
</script>