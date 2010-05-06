/**
 *
 * @author a9b
 * @date 2008/04/26
 *
 *
    # エンコード処理
    $to = "UTF-8";
    $arr = ConvertEncoding($mix,$to,$from=null);
 */
function convertencoding($mix,$to,$from=null){
$from_org = $from;
    if(is_array($mix)){
        foreach($mix as $key => $val){
        $from = $from_org;
            if(is_array($val)){
                $mix[$key] = mb_convert_encoding_array($val,$to);
            }else{
                if(is_null($from)){$from=mb_detect_encoding($val);}
                if($from != $to){$mix[$key]=mb_convert_encoding($val,$to,$from);}
            }
        }
    }
    else{
        if(is_null($from)){$from=mb_detect_encoding($mix);}
        $mix = mb_convert_encoding($mix,$to,$from);
    }
    return $mix;
}

