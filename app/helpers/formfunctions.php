<?php

// require_once ("../config/application.php");

// read function htmlspecial_utf8

require_once 'mylibraryfunctions.php';


// start form; use table to align form entries
function form_start($action,$name="") {
    echo '<table class="myformtable" align="center">', "\n";
    echo '<form method="post" onsubmit="prepSelObject(document.getElementById(\'dest_users\'));prepSelObject(document.getElementById(\'dest_forumsType\'));prepSelObject(document.getElementById(\'dest_managersType\'));" '.
        html_attribute("action", $action),
    html_attribute("name", $name),
    ">\n";

}
/***************************************************************************************/
function form_start2($action,$name="") {
    echo '<table class="myformtable" align="center" border=0>', "\n";
    echo '<form method="post" ',
    html_attribute("action", $action),
    html_attribute("name", $name),
    ">\n";
}

/*****************************************************************************************************/
function form_start3($action,$name="") {

    echo '<form method="post" ',
    html_attribute("action", $action),
    html_attribute("name", $name),
    ">\n";
}

/*****************************************************************************************************/


function form_hidden($name, $value) {
    echo '<input type="hidden" ',
    html_attribute("name", "form[$name]"),
    html_attribute("value", $value),
    " />\n";
}

/***********************************************************************/


function form_hidden2($name,$value,$mode,$value1) {
    echo '<input type="hidden" '.
        html_attribute("name", "form[$name]"),
    html_attribute("value", $value),
    html_attribute("mode", "$value1"),

    " />\n";
}


/**********************************************************************/

function form_hidden3($name, $value,$with_form_as_name=1, $free_text) {


    echo '<input type="hidden" ',

    html_attribute("name", ($with_form_as_name)?"form[$name]":"$name"),
    html_attribute("value", $value),
    $free_text,
    " />\n";
}
/********************************************************************/

function form_button($name, $txt, $type="submit", $free_text="") {
    echo '<td class="myformtd"><input ',

    html_attribute("class", "mybutton"),
    html_attribute("type", $type),
    html_attribute("value", $txt),
    html_attribute("name", "form[$name]"),
    $free_text,
    ' /></td>', "\n";
}
/******************************************************************************/

//form_button1(submitbutton", "שמור","Submit", "OnClick=\"return document.getElementById('mode').value='delete'\";");
function form_button1($name, $txt, $type="button",$id="", $free_text="") {
    echo '<td class="myformtd"><input ',

    html_attribute("class", "mybutton"),
    html_attribute("type", $type),
    html_attribute("value", $txt),
    html_attribute("id", $id),
    html_attribute("name", "form[$name]"),
    $free_text,
    ' /></td>', "\n";
}
/******************************************************************************/
function form_button_img_nt($name, $txt, $type="button",$id="", $free_text="") {
    echo '<button ',

    html_attribute("class",  "green90x24"),
    html_attribute("type", $type),
    html_attribute("value", $txt),
    html_attribute("id", $id),
    html_attribute("name", "form[$name]"),
    $free_text,
    ' />', htmlspecial_utf8($txt),'</button>', "\n";
}
/******************************************************************************/

//form_button1("btnDelete", "מחק החלטה", "Submit", "OnClick=\"return document.getElementById('mode').value='delete'\";");
function form_button_no_td($name, $txt, $type="button", $free_text="") {
    echo  '<input ',

    html_attribute("class", "mybutton"),
    html_attribute("type", $type),
    html_attribute("value", $txt),
    html_attribute("name", "form[$name]"),
    $free_text,
    ' />', "\n";
}
/******************************************************************************/
function form_button_no_td2($name, $txt, $type="button",$free_text="") {
    echo  '<button ',

    html_attribute("class",  "green90x24"),
    html_attribute("type", $type),
    html_attribute("value", $txt),
    html_attribute("name", "form[$name]"),
    $free_text,
    ' >', htmlspecial_utf8($txt),'</button>', "\n";

}
/******************************************************************************/
function form_button_no_td3($name, $txt, $type="button",$id,$free_text="") {
    echo  '<button ',

    html_attribute("class",  "green90x24"),
    html_attribute("type", $type),
    html_attribute("value", $txt),
    html_attribute("name", "form[$name]"),
    html_attribute("id", $id),
    $free_text,
    ' >', htmlspecial_utf8($txt),'</button>', "\n";

}
/******************************************************************************/
function form_button2($name, $txt, $type="submit") {
    echo '<input ',
    html_attribute("class", "mybutton"),
    html_attribute("type", $type),
    html_attribute("value", $txt),
    html_attribute("name", "form[$name]"),
    ' />', "\n";
}
/******************************************************************************/
function form_button3($name, $txt, $type="submit", $with_form_as_name=1) {

    echo '<td class="myformtd"><input ',
    html_attribute("class", "mybutton"),
    html_attribute("type", $type),
    html_attribute("value", $txt),
    html_attribute("name", ($with_form_as_name)?"form[$name]":"$name"),

    ' /></td>', "\n";

}

/******************************************************************************/
function form_button4($name, $txt, $type="submit", $free_text="") {
    echo '<input ',

    html_attribute("class", "mybutton"),
    html_attribute("type", $type),
    html_attribute("value", $txt),
    html_attribute("name", "form[$name]"),
    $free_text,
    ' />', "\n";
}
/******************************************************************************/
function form_button5($name, $txt, $type="submit",$id="", $free_text="") {
    echo '<input ',

    html_attribute("class", "mybutton"),
    html_attribute("type", $type),
    html_attribute("value", $txt),
    html_attribute("name", "form[$name]"),
    html_attribute("id", $id),
    $free_text,
    ' />', "\n";
}
/******************************************************************************/

// close form
function form_end() {
    echo "</form></table>\n\n"; }


/*****************************************************************************************************/

// new line (row) in table
function form_new_line() {
    echo "<tr>"; }
/**********************************************************************************/
// end line (row)
function form_end_line() {
    echo "</tr>\n\n"; }
/**********************************************************************************/
function form_label_span($caption, $necessary=FALSE) {
    echo '<td align="right" class="myformtd">';
    echo ' <div class="form-row"> ';
    if($necessary)
        echo '<span class="h">', htmlspecial_utf8($caption), '</span>';
    else
        echo htmlspecial_utf8($caption);
    echo '<div></td>', "\n";
}
/**********************************************************************************/
// show right-aligned text in form cell
function form_label($caption, $necessary=FALSE) {

    echo '<td align="right" class="myformtd">';
//   form_empty_cell_no_td(4);
    if($necessary)

        echo '<span class="red1" style="color:yellow;">', htmlspecial_utf8($caption), '</span>';
    else
        echo htmlspecial_utf8($caption);

    echo '</td>', "\n";
}
/**********************************************************************************/
function form_label_noformtd($caption, $necessary=FALSE) {

    echo '<td align="right">';
//    form_empty_cell_no_td(5);
    if($necessary)

        echo '<span class="red1" style="color:yellow">', htmlspecial_utf8($caption), '</span>';
    else
        echo htmlspecial_utf8($caption);

    echo '</td>', "\n";
}
/**********************************************************************************/

function form_label1($caption, $necessary=FALSE) {

    if($necessary)
        echo '<span class="red1" style="color:yellow;">' . htmlspecial_utf8($caption) . '</span>';
    else
        echo htmlspecial_utf8($caption);

}
/**********************************************************************************/
/**********************************************************************************/

function form_label_short($caption, $necessary=FALSE) {
    echo '<td align="right" class="myformtd" style="width:40px;">';
    if($necessary)
        echo '<span class="red1" style="color:yellow;">', htmlspecial_utf8($caption), '</span>';
    else
        echo htmlspecial_utf8($caption);
    echo '</td>', "\n";
}
/**********************************************************************************/

function form_label_short2($caption, $necessary=FALSE) {
    echo '<td align="right"  style="width:14px;overflow:hidden;">';
    if($necessary)
        echo '<span class="red1" style="color:yellow;">', htmlspecial_utf8($caption), '</span>';
    else
        echo htmlspecial_utf8($caption);
    echo '</td>', "\n";
}
/**********************************************************************************/
function form_label_short3($caption, $necessary=FALSE) {
    echo '<td align="right"  style="width:30px; ">';
    if($necessary)
        echo '<span class="red1" style="color:yellow;">', htmlspecial_utf8($caption), '</span>';
    else
        echo htmlspecial_utf8($caption);
    echo '</td>', "\n";
}
/**********************************************************************************/

function form_label_red($caption, $necessary=FALSE) {
    echo '<td align="right" class="myformtd">';
    if($necessary)
        echo '<span class="red1" style="color:yellow;">', htmlspecial_utf8($caption), '</span>';
    else
        echo htmlspecial_utf8($caption);
    echo '</td>', "\n";
}
/**********************************************************************************/

function form_label_red1($caption, $necessary=FALSE) {

    if($necessary)
        echo '<span class="red1" style="color:yellow;">', htmlspecial_utf8($caption), '</span>';
    else
        echo htmlspecial_utf8($caption);

}
/**********************************************************************************/


function form_label2($caption, $necessary=FALSE) {
    echo '<td align="right">';
    if($necessary)
        echo '<span class="red1" style="color:yellow;">', htmlspecial_utf8($caption), '</span>';
    else
        echo htmlspecial_utf8($caption);

}
/**********************************************************************************/
// show text in form cell
function form_caption($caption, $colspan=1) {
    if($colspan>1)
        echo '<td class="myformtd" ',
        html_attribute("colspan", $colspan), '>';
    else
        echo '<td class="myformtd">';
    echo htmlspecial_utf8($caption), '</td>', "\n";
}
/**********************************************************************************/
// show text as is in form cell
function form_asis($txt, $colspan=1) {
    if($colspan>1)
        echo '<td class="myformtd" ',
        html_attribute("colspan", $colspan), '>';
    else
        echo '<td class="myformtd">';
    echo $txt, '</td>', "\n";
}
/**********************************************************************************/
// show URL in form cell
function form_url($url, $txt, $colspan=1) {
    if($colspan>1)
        echo '<td class="myformtd" ',
        html_attribute("colspan", $colspan), '>';
    else
        echo '<td class="myformtd">';
    echo "<a href=\"$url\" class='form_href'>" . htmlspecial_utf8($txt) . " </a></td>\n";
}

/**********************************************************************************/
function form_url_noformtd($url, $txt, $colspan=1) {
    if($colspan>1){
        echo '<td',
        html_attribute("colspan", $colspan), '>';
    }else{
        echo '<td>';
    }
    //form_empty_cell_no_td(4);
    echo "<a href=\"$url\" class='form_href'>" . htmlspecial_utf8($txt) . " </a></td>\n";
}

/**********************************************************************************/
// show URL in form cell
function form_url1($url, $txt, $colspan=1) {
    if($colspan>1)
        echo '<td class="myformtd" ',
        html_attribute("colspan", $colspan), '>';
    else
        echo '<td class="myformtd">';
    echo "<a href=\"$url\" class='form_href'>" . htmlspecial_utf8($txt) . "</a></td>\n";
}

/**********************************************************************************/
function form_url2($url, $txt, $colspan=1) {


    echo "<a href=\"$url\" class='form_href'>" . htmlspecial_utf8($txt) . "</a> \n";
}

/**********************************************************************************/
function form_url3($url, $txt, $colspan=1) {


    echo "<a href=\"$url\" class='form_href_forum'>" . htmlspecial_utf8($txt) . "</a> \n";
}

/**********************************************************************************/
// create $n empty cells
function form_empty_cell($n=1) {
    echo str_repeat('<td class="myformtd">&nbsp;</td>', $n) . "\n";
}
/**********************************************************************************/
function form_empty_cell_noformtd($n=1) {
    echo str_repeat('<td>&nbsp;</td>', $n) . "\n";
}
/**********************************************************************************/
function form_empty_cell_no_td($n=1) {
    echo str_repeat('&nbsp;', $n) . "\n";
}
/**********************************************************************************/

function form_text($name, $value="", $size=40, $maxlength=40, $colspan=1,$id="") {
    if($colspan>1)
        echo '<td class="myformtd" ',
        html_attribute("colspan", $colspan), '>';
    else
        echo '<td class="myformtd" align="right"> ';
    echo '<input class="mycontrol" ',
    html_attribute("name", "form[$name]"),
    html_attribute("value", $value),
    html_attribute("size", $size),
    html_attribute("maxlength", $maxlength),
    html_attribute("id", $id) ;
    echo ' /></td>', "\n";
}


/**********************************************************************************/
function form_text_a($name, $value, $size=40, $maxlength=40, $colspan=1,$id="") {
    if($colspan>1)

        html_attribute("colspan", $colspan) ;
    else

        echo '<input class="mycontrol" ',
        html_attribute("name", "form[$name]"),
        html_attribute("value", $value),
        html_attribute("size", $size),
        html_attribute("maxlength", $maxlength),
        html_attribute("id", $id),
        ' />', "\n";
}

/**********************************************************************************/
function form_text_b($name, $value, $size=40, $maxlength=40, $colspan=1,$id="entry") {
    if($colspan>1)

        html_attribute("colspan", $colspan) ;
    else

        echo '<input class="mycontrol" ',
        html_attribute("name","$name" ),
        html_attribute("value", $value),
        html_attribute("size", $size),
        html_attribute("maxlength", $maxlength),
        ' />', "\n";
}


/**********************************************************************************/
/**********************************************************************************/
// create text input field for form
function form_text1($name, $value, $size=40, $maxlength=40, $colspan=1) {

    echo '<input class="mycontrol" ',
    html_attribute("name", "form[$name]"),
    html_attribute("size", $size),
    html_attribute("maxlength", $maxlength);
    if($value)
        echo html_attribute("value", $value);
    echo ' /> ', "\n";
}
/**********************************************************************************/


function form_text2($name, $value, $size=40, $maxlength=40, $colspan=1) {

    echo '<input class="mycontrol" ',
    html_attribute("name", "form[$name]"),
    html_attribute("size", $size),
    html_attribute("maxlength", $maxlength);
    ?> <tr>
        <td>שם פורום</td>
        <td><input type="text" name="forum_decName" size=20
                   value="<?php echo $frm->forum_decName ?>" /></td>
    </tr>
    <?php
    if($value)
        echo html_attribute("value", $value);

}
/*************************************************************************************************/
function form_text3($name, $value, $size=40, $maxlength=40, $colspan=1,$id="") {

    if($colspan>1)

        html_attribute("colspan", $colspan) ;
    else

        echo '<input class="mycontrol" ',
        html_attribute("name", "form[$name]"),
        html_attribute("value", $value),
        html_attribute("size", $size),
        html_attribute("maxlength", $maxlength),
        html_attribute("id", $id) ;
    echo ' />', "\n";
}
/*************************************************************************************************/
function form_text_noformtd($name, $value, $size=40, $maxlength=40, $colspan=1,$id="") {

    if($colspan>1)
        echo '<td align="right" ',
        html_attribute("colspan", $colspan), '>';
    else
        echo '<td align="right"> ';
    echo '<input class="mycontrol" ',
    html_attribute("name", "form[$name]"),
    html_attribute("value", $value),
    html_attribute("size", $size),
    html_attribute("maxlength", $maxlength),
    html_attribute("id", $id) ;
    echo ' /></td>', "\n";
}
/**********************************************************************************/
// create text input field for form
function form_password($name, $value, $size=40, $maxlength=40, $colspan=1) {
    if($colspan>1)
        echo '<td class="myformtd" ',
        html_attribute("colspan", $colspan), '>';
    else
        echo '<td class="myformtd"> ';
    echo '<input class="mycontrol" ',
    html_attribute("type", "password"),
    html_attribute("name", "form[$name]"),
    html_attribute("size", $size),
    html_attribute("maxlength", $maxlength);
    if($value)
        echo html_attribute("value", $value);
    echo ' /></td>', "\n";
}
/**********************************************************************************/
// create text input field for form
function form_textarea($name, $value, $cols=70, $rows=6, $colspan=2,$id="") {
    if($colspan>1)
        echo '<td class="myformtd" ',
        html_attribute("colspan", $colspan), '>';
    else
        echo '<td class="myformtd"> ';
    echo '<textarea class="mycontrol" ',
    html_attribute("name", "form[$name]"),
    html_attribute("rows", $rows),
    html_attribute("cols", $cols),
    html_attribute("id", $id), '>';
    if($value)
        echo htmlspecial_utf8($value);
    echo '</textarea></td>', "\n";
}
/**********************************************************************************/
// create text input field for form
function form_textarea_noformtd($name, $value, $cols=70, $rows=6, $colspan=2,$id="") {
    if($colspan>1)
        echo '<td " ',
        html_attribute("colspan", $colspan), '>';
    else
        echo '<td> ';
    echo '<textarea class="mycontrol" ',
    html_attribute("name", "form[$name]"),
    html_attribute("rows", $rows),
    html_attribute("cols", $cols),
    html_attribute("id", $id), '>';
    if($value)
        echo htmlspecial_utf8($value);
    echo '</textarea></td>', "\n";
}
/**********************************************************************************/

function form_textarea1($name, $value, $cols=70, $rows=6, $colspan=1,$id="") {


    echo '<textarea class="mycontrol" ',
    html_attribute("name", "form[$name]"),
    html_attribute("rows", $rows),
    html_attribute("cols", $cols),
    html_attribute("id", $id), '>';
    if($value)
        echo htmlspecial_utf8($value);
    echo '</textarea>', "\n";
}
/**********************************************************************************/

function mkSelectBox1($name, $arr_name, $arr_id, $selected, $str="") {
    if( !is_array($selected) )
        $selected = array($selected);

    $data = "\n<select name='$name' dir=rtl $str >\n";

    if( is_array($arr_id) && count($arr_id) ) {
        foreach ($arr_id as $i=>$id)    {
            if( in_array($id, $selected) )
                $data.=  "<option value='$id' selected>$arr_name[$i]</option>";
            else
                $data.=  "<option value='$id'>htmlspecial_utf8($arr_name[$i])</option>";
            $data.=  "\n";
        }
    }
    $data.=  "</select>\n";
    return $data;
}

/**********************************************************************************/
function create_dropdown($identifier,$pairs,$firstentry,$multiple="")
{

    $dropdown = "<select name=\"$identifier\" multiple=\"$multiple\">";
    $dropdown .= "<option name=\"\">$firstentry</option>";

    // Create the dropdown elements
    foreach($pairs AS $value => $name)
    {
        $dropdown .= "<option name=\"$value\">$name</option>";
    }
    // Conclude the dropdown and return it
    echo "</select>";
    return $dropdown;
}
/**********************************************************************************/
function create_dropdown1($identifier, $pairs, $firstentry,$multiple="", $key="")
{
    $dropdown = "<select name=\"$identifier\" multiple=\"$multiple\">";
    $dropdown .= "<option name=\"\">$firstentry</option>";

    foreach($pairs AS $value => $name)
    {
        $dropdown .= ($value == $key) ?
            "<option name=\"$value\" selected=\"selected\">$name</option>" :
            "<option name=\"$value\">$name</option>";
    }
    echo "</select>";
    return $dropdown;
}

/******************************************************************************/
// create select list
/**********************************************************************************/
/**********************************************************************************/

function form_list13($name,$rows,$selected=-1) {
    echo '<select class="mycontrol" ',
    html_attribute("name", "form[$name]"),'>', "\n";
    echo '<option value="none">(בחר אופציה)</option>';
    foreach($rows as $row) {
        echo '<option ', html_attribute("value", $row[1]);
        if($selected==$row[1]){
            echo 'selected="selected" ';
        }
        $listentry = str_replace(" ", "&nbsp;", htmlspecial_utf8($row[0]));
        echo ">$listentry</option>\n";
    }
    echo '</select>', "\n";
}

/*******************************************************************************************/
function form_list5($name, $rows,$this_date=NULL, $selected=-1, $str="") {
    echo '<select class="mycontrol" '.$str.' ',
    html_attribute("name", "form[$name][]"), '>', "\n";
    echo '<option value="none">(בחר אופציה)</option>';
    foreach($rows as $key => $value) {
        echo '<option ', html_attribute("value", $key);
        if($value==$this_date){
            echo 'selected="selected" ';
        }
        echo ">$value</option>\n";

    }
    echo '</select>', "\n";
}


/***************************************************/
// create select list form_list3($name ,$date_array, array_item($formdata, $name) );
/***************************************************/


function form_list3($name, $rows,$this_date=NULL, $selected=-1) {

    echo '<select class="mycontrol" ',
    html_attribute("name", "form[$name]"),'>', "\n";
    foreach($rows as $key => $value) {
        echo '<option ', html_attribute("value", $key);
        if($value==$this_date){
            echo 'selected="selected" ';
        }
        echo ">$value</option>\n";

    }
    echo '</select>';
}

/*******************************************************************************/
function form_list33($name, $rows, $selected=-1) {

    echo '<select class="mycontrol" ',
    html_attribute("name", "form[$name]"),'>', "\n";
    echo '<option value="none"></option>';
    foreach($rows as $key => $value) {
        echo '<option ', html_attribute("value", $key);
        if($value==$this_date){
            echo 'selected="selected" ';
        }

        $listentry = str_replace(" ", "&nbsp;", htmlspecial_utf8($value));
        echo ">$listentry</option>\n";
    }
    echo '</select>';
}

/******************************************************************************/

function form_list2($name, $rows, $selected=-1, $str="") {
    echo '<select class="mycontrol" '.$str.' ',
    html_attribute("name", "form[$name]"), '>', "\n";
    echo '<option value="none">(choose)</option>';
    foreach($rows as $row) {
        echo '<option ', html_attribute("value", $row);
        if($selected==$row)
            echo 'selected="selected" ';
        $listentry = str_replace(" ", "&nbsp;", htmlspecial_utf8($row));
        echo ">$listentry</option>\n";
    }
    echo '</select>', "\n";
}
/**********************************************************************************/


function form_list1($name, $rows, $selected=-1, $str="") {

    echo '<td class="myformtd">';
    echo '<select class="mycontrol" '.$str.' ',
    html_attribute("name", "form[$name][]"), '>', "\n";
    echo '<option value="none">(בחר אופציה)</option>';
    foreach($rows as $row) {
        echo '<option ', html_attribute("value", $row[1]);
        if($selected==$row[1]){
            echo 'selected="selected" ';
        }
        $listentry = str_replace(" ", "&nbsp;", htmlspecial_utf8($row[0]));
        echo ">$listentry</option>\n";
    }
    echo '</select></td>', "\n";
}
/**********************************************************************************/
function form_list1idx($name, $rows, $selected=-1, $str="") {

    echo '<td class="myformtd">';
    echo '<select class="mycontrol" '.$str.' ',
    html_attribute("name", "form[$name][]"), '>', "\n";
    echo '<option value="none">(בחר אופציה)</option>';
    foreach($rows as $row) {
        echo '<option ', html_attribute("value", $row[1]);
        if(is_array($selected)){
            if(in_array ($row[1],  $selected )  ){
                echo 'selected="selected" ';
            }
        }
        $listentry = str_replace(" ", "&nbsp;", htmlspecial_utf8($row[0]));
        echo ">$listentry</option>\n";
    }
    echo '</select></td>', "\n";
}


/********************************************************************************/




// create select list
function form_list01($name, $rows, $selected=-1, $str="") {

    echo '<select class="mycontrol" '.$str.' ',
    html_attribute("name", "form[$name][]"),'>', "\n";
    echo '<option value="none">(choose)</option>';
    foreach($rows as $key => $value) {
        echo '<option ', html_attribute("value", $key);
        if($selected==$value){
            echo 'selected="selected" ';
        }
        echo ">$value</option>\n";

    }
    echo '</select>';
}
/******************************************************************************/
function list11($name, $rows, $selected=-1, $str="") {
    if( !is_array($selected))
        $selected=array($selected);


    echo '<select class="mycontrol" '.$str.' ',
    html_attribute("name", "form[$name][]"), '>', "\n";
    echo '<option value="none">(בחר אופציה)</option>';

    foreach($rows as $index=>$value) {
        $sel = ( in_array($index, $selected)) ? "selected":"";
        echo "<option value='$index' $sel>$value</option>\n";

    }
    echo '</select>' ;
}
////////////////////////////////////////////////////////////////////////////
function form_list111($name, $rows, $selected=-1, $str="") {


    echo '<select class="mycontrol" '.$str.' ',
    html_attribute("name", "form[$name][]"), '>', "\n";

    //echo '<option value="none">(בחר אופציה)</option>';
    foreach($rows as $row) {
        echo '<option ', html_attribute("value", $row[1]);
        if($selected==$row[1]){
            echo 'selected="selected" ';
        }
        $listentry = str_replace(" ", "&nbsp;", htmlspecial_utf8($row[0]));
        echo ">$listentry</option>\n";
    }
    echo '</select>', "\n";
}


/*******************************************************************************************/

function list11_td($name, $rows, $selected=-1, $str="") {
    if( !is_array($selected))
        $selected=array($selected);

    echo '<td class="myformtd">';
    echo '<select class="mycontrol" '.$str.' ',
    html_attribute("name", "form[$name][]"), '>', "\n";
    echo '<option value="none">(בחר אופציה)</option>';

    foreach($rows as $index=>$value) {
        $sel = ( in_array($index, $selected)) ? "selected":"";
        echo "<option value='$index' $sel>$value</option>\n";

    }
    echo '</select></td>', "\n";
}
////////////////////////////////////////////////////////////////////////////

function list11_ctrl2($name, $rows, $selected=-1, $str="") {
    if( !is_array($selected))
        $selected=array($selected);


    echo '<select class="mycontrol" '.$str.' ',
    html_attribute("name", "form[$name][]"), '>', "\n";
    echo '<option value="none">(בחר אופציה)</option>';

    foreach($rows as $index=>$value) {
        $sel = ( in_array($index, $selected)) ? "selected":"";
        echo "<option value='$index' $sel>$value</option>\n";

    }
    echo '</select>' ;
}

/******************************************************************************/

function form_list11($name, $rows=null, $selected=-1, $str="") {
    if( !is_array($selected))
        $selected=array($selected);

    echo '<td class="myformtd"  style="width:9px;">';
    echo '<select class="mycontrol" '.$str.' ',
    html_attribute("name", "form[$name][]"), '>', "\n";
    echo '<option value="none">(בחר אופציה)</option>';

    foreach($rows as $index=>$value) {
        $sel = ( in_array($index, $selected)) ? "selected":"";

        echo "<option  value='$index' $sel>$value</option>\n";
    }
    echo '</select></td>', "\n";
}

/******************************************************************************/

function form_list_no_formtd($name, $rows=null, $selected=-1, $str="") {
    if( !is_array($selected))
        $selected=array($selected);

    echo '<td  style="width:9px;">';
    echo '<select class="mycontrol" '.$str.' ',
    html_attribute("name", "form[$name][]"), '>', "\n";
    echo '<option value="none">(בחר אופציה)</option>';

    foreach($rows as $index=>$value) {
        $sel = ( in_array($index, $selected)) ? "selected":"";

        echo "<option  value='$index' $sel>$value</option>\n";
    }
    echo '</select></td>', "\n";
}

/****************************************************************/
/****************************************************************/

function form_list_noformtd($name, $rows=null, $selected=-1, $str="") {
    if( !is_array($selected))
        $selected=array($selected);

    echo '<td  style="width:9px;">';
    echo '<select class="mycontrol" '.$str.' ',
    html_attribute("name", "form[$name][]"), '>', "\n";
    echo '<option value="none">(בחר אופציה)</option>';

    foreach($rows as $index=>$value) {
        $sel = ( in_array($index, $selected)) ? "selected":"";

        echo "<option  value='$index' $sel>$value</option>\n";
    }
    echo '</select></td>', "\n";
}

/****************************************************************/

function form_list_idx($name, $rows, $selected=-1, $str="") {
    if( !is_array($selected))
        $selected=array($selected);


    echo '<select class="change_user" '.$str.' ',
    html_attribute("name", "form[$name][]"), '>', "\n";
    echo '<option value="none">(בחר אופציה)</option>';

    foreach($rows as $index=>$value) {
        $sel = ( in_array($index, $selected)) ? "selected":"";
        echo "<option  value='$index' $sel>$value</option>\n";

    }
    echo '</select>';
}




/*******************************************************************************************/
function form_list_idx_one($name, $rows, $selected=-1, $str="") {
    if( !is_array($selected))
        $selected=array($selected);


    echo '<select class="change_user" '.$str.' ',
    html_attribute("name", "form[$name]"), '>', "\n";
    echo '<option value="none">(בחר אופציה)</option>';

    foreach($rows as $index=>$value) {
        $sel = ( in_array($index, $selected)) ? "selected":"";
        echo "<option  value='$index' $sel>$value</option>\n";

    }
    echo '</select>';
}




/*******************************************************************************************/

// create select list
function form_list001($name, $rows, $selected=-1) {

    echo '<select class="mycontrol" ',
    html_attribute("name", "form[$name]"), '>', "\n";
    echo '<option value="none">(choose)</option>';
    foreach($rows as $key=>$value) {
        echo '<option ', html_attribute("value", $key);
        if($selected==$value){
            echo 'selected="selected" ';
        }
        echo ">$value</option>\n";

    }
    echo '</select>', "\n";
}
/**********************************************************************************/

function form_list0($name, $rows, $selected=-1, $str="") {


    echo '<select class="mycontrol" '.$str.' ',
    html_attribute("name", "form[$name][]"), '>', "\n";
    echo '<option value="none">(בחר אופציה)</option>';
    foreach($rows as $row) {
        echo '<option ', html_attribute("value", $row);
        if($selected==$row)
            echo 'selected="selected" ';
        $listentry = str_replace(" ", "&nbsp;", htmlspecial_utf8($row));
        echo ">$listentry</option>\n";
    }
    echo '</select>', "\n";
}


/******************************************************************************/
function form_list_find($name ,$id, $rows, $selected=-1) {



    echo '<td class="myformtd">';
    echo '<select class="mycontrol"  ' ,
    html_attribute("name", "$name"),
    html_attribute("id", "$id"),  '>', "\n";

    echo '<option value="none">(choose)</option>';
    foreach($rows as $row) {
        echo '<option ', html_attribute("value", $row[1]);
        if($selected==$row[1])
            echo 'selected="selected" ';
        $listentry = str_replace(" ", "&nbsp;", htmlspecial_utf8($row[0]));
        echo ">$listentry</option>\n";
    }
    echo '</select></td>', "\n";
}
/******************************************************************************/
function form_list_find_no_form_td($name ,$id, $rows, $selected=-1) {



    echo '<td>';
    echo '<select class="mycontrol"  ' ,
    html_attribute("name", "$name"),
    html_attribute("id", "$id"),  '>', "\n";

    echo '<option value="none">(choose)</option>';
    foreach($rows as $row) {
        echo '<option ', html_attribute("value", $row[1]);
        if($selected==$row[1])
            echo 'selected="selected" ';
        $listentry = str_replace(" ", "&nbsp;", htmlspecial_utf8($row[0]));
        echo ">$listentry</option>\n";
    }
    echo '</select></td>', "\n";
}
///////////////////////////////////////////////
function form_list_find_notd($name ,$id, $rows, $selected=-1) {



    echo '<select class="mycontrol"  ' ,
    html_attribute("name", "$name"),
    html_attribute("id", "$id"),  '  style="width:160px">', "\n";

    echo '<option value="none">(choose)</option>';
    foreach($rows as $row) {
        echo '<option ', html_attribute("value", $row[1]);
        if($selected==$row[1])
            echo 'selected="selected" ';
        $listentry = str_replace(" ", "&nbsp;", htmlspecial_utf8($row[0]));
        echo ">$listentry</option>\n";
    }
    echo '</select>', "\n";
}
/******************************************************************************/
function form_list_find_notd_no_choose($name ,$id, $rows, $selected=-1) {


    echo '<select class="mycontrol" style="margin-top:4px;"  ' ,
    html_attribute("name", "$name"),

    html_attribute("id", "$id"),  '>', "\n";


    foreach($rows as $row) {
        echo '<option ', html_attribute("value", $row[1]);
        if($selected==$row[1]){
            echo 'selected="selected" ';
        }
        $listentry = str_replace(" ", "&nbsp;", htmlspecial_utf8($row[0]));
        echo ">$listentry</option>\n";
    }
    echo '</select>', "\n";
}
/******************************************************************************/
function form_list_find_notd_no_choose2($name, $rows, $selected=-1, $str="") {
    echo '<select class="mycontrol" '.$str.' ',
        //echo '<select class="mycontrol" ',
    html_attribute("name", "form[$name]"), '>', "\n";

    foreach($rows as $row) {
        echo '<option ', html_attribute("value", $row[1]);
        if($selected==$row[1]){
            echo 'selected="selected" ';
        }
        $listentry = str_replace(" ", "&nbsp;", htmlspecial_utf8($row[0]));
        echo ">$listentry</option>\n";
    }
    echo '</select>', "\n";
}
/******************************************************************************/
function form_list_jtd($name, $rows, $selected=-1) {
    echo '<td>';
    echo '<select class="mycontrol" ',
    html_attribute("name", "form[$name]"), '>', "\n";
    echo '<option value="none">(choose)</option>';
    foreach($rows as $row) {
        echo '<option ', html_attribute("value", $row[1]);
        if($selected==$row[1])
            echo 'selected="selected" ';
        $listentry = str_replace(" ", "&nbsp;", htmlspecial_utf8($row[0]));
        echo ">$listentry</option>\n";
    }
    echo '</select></td>', "\n";
}
/******************************************************************************/
// create select list
function form_list_a($name, $rows, $selected=-1) {

    echo '<select class="mycontrol" ',
    html_attribute("name", "form[$name]"), '>', "\n";
    echo '<option value="none">(choose)</option>';
    foreach($rows as $row) {
        echo '<option ', html_attribute("value",$row[$name]);
        if($selected==$row[0])
            echo 'selected="selected" ';
        $listentry = str_replace(" ", "&nbsp;", htmlspecial_utf8($row[0]));
        echo ">$listentry</option>\n";

    }
    echo '</select>', "\n";

}
/******************************************************************************/
function form_list_b($name, $rows, $selected=-1, $str="") {
    echo '<select class="mycontrol" '.$str.' ',

    html_attribute("name", "form[$name]"), ' style="width:160px;">', "\n";
    echo '<option value="none">(choose)</option>';
    foreach($rows as $row) {
        echo '<option ', html_attribute("value", $row[1]);
        if($selected==$row[1])
            echo 'selected="selected" ';
        $listentry = str_replace(" ", "&nbsp;", htmlspecial_utf8($row[0]));
        echo ">$listentry</option>\n";
    }
    echo '</select>', "\n";
}
/******************************************************************************/
function form_list_demo($name, $rows, $selected=-1, $str="") {
    echo '<select class="mycontrol" '.$str.' ',

    html_attribute("name", "form[$name]"), ' style="width:160px;">', "\n";
    echo '<option value="none">(choose)</option>';
    foreach($rows as $row) {
        echo '<option ', html_attribute("value", $row);
        if($selected==$row)
            echo 'selected="selected" ';
        $listentry = str_replace(" ", "&nbsp;", htmlspecial_utf8($row));
        echo ">$listentry</option>\n";
    }
    echo '</select>', "\n";
}
/******************************************************************************/

function form_list($name, $rows, $selected=-1) {
    echo '<td class="myformtd" colspan="2">';
    echo '<select class="mycontrol"  ' ,
    html_attribute("name", "form[$name]"), '>', "\n";
    echo '<option value="none">(choose)</option>';
    foreach($rows as $row) {
        echo '<option ', html_attribute("value", $row[1]);
        if($selected==$row[1])
            echo 'selected="selected" ';
        $listentry = str_replace(" ", "&nbsp;", htmlspecial_utf8($row[0]));
        echo ">$listentry</option>\n";
    }
    echo '</select></td>', "\n";
}
/******************************************************************************/

function form_list_11($name, $rows, $selected=-1, $str="") {

    echo '<select class="mycontrol" '.$str.' ',
    html_attribute("name", "form[$name]"), '>', "\n";
    echo '<option value="none">(בחר אופציה)</option>';
    foreach($rows as $row) {
        echo '<option ', html_attribute("value", $row[1]);
        if($selected==$row[1])
            echo 'selected="selected" ';
        $listentry = str_replace(" ", "&nbsp;", htmlspecial_utf8($row[0]));
        echo ">$listentry</option>\n";
    }

    echo '</select>', "\n";
}
/******************************************************************************/

// build name="value"
function html_attribute($name, $value) {
    return $name . '="' . htmlspecial_utf8($value) . '" ';
}
/**********************************************************************************/
// show red error message
function show_error_msg($txt) {
    echo '<p><span class="red1">', htmlspecial_utf8($txt), '</span></p>', "\n";
}

