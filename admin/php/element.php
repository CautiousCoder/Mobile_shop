<?php

function inputElementText($label_text, $input_type, $input_id, $name, $placeholder, $value, $required){
    $ele = "
        <div class=\"form-group\">
        <label for='$input_id'>$label_text</label>
        <input type='$input_type' name='$name' class=\"form-control\" id='$input_id' value='$value' placeholder='$placeholder' $required>
        </div>
    ";
    echo $ele;
}

function inputElementFile($input_id, $styleClass, $name, $placeholder, $value){
    $ele = "
        <div class=\"form-group w-100\">
            <div class=\"custom-file\">
            <input type=\"file\" name='$name' class=\"custom-file-input $styleClass \" id='$input_id' value='$value' placeholder='$placeholder'>
            <label class=\"custom-file-label\" for='$input_id'>Choose file</label>
            </div>
        </div>
    ";
    echo $ele;
}

function btnElement($btn_id, $btn_style, $btn_name, $btn_text, $attr){
    $btn = "
    <button id='$btn_id' class='$btn_style' name='$btn_name' $attr>$btn_text</button>
    ";
    echo $btn;
}