<?php


/**
 * author a9b
 * 多次元配列に対応
 *
    # 文字列中のゴミ削除 デフォルト：$dust[] = "\n"; $dust[] = "\t";
    $dust[] = "\n";
    $dust[] = "\t";
    $mix = dustdel($mix,$dust=null);
 *
 */
function dustdel($mix,$dust=null){
        if(empty($dust)){
        $dust[] = "\n";
        $dust[] = "\t";
        }
        if(is_array($mix)){
        foreach($mix as $k => $v){
        if(is_array($v)){
            $mix[$k] = dustdel($v);
        }
        else{
            $mix[$k] = str_replace($dust,"",$v);
        }
        }//foreach
        }else{
        $mix = str_replace($dust,"",$mix);
        }
        return $mix;
}


/*
 * auther a9b
 * サブネットマスクも考慮したIPチェック
 * Mix ($allow_ip)
 * 返り値 bool
 *
    # IPチェック
    $ip = "192.168.0.10";
    if(is_access($ip){
        echo "access ok";
    }else{
        echo "no access"
    }
 *
 */
function is_access($allow_ip){

        if(is_array($allow_ip)){

        foreach($allow_ip as $k=>$v){
        if(is_numeric(strpos($v,'/'))){
            if(mask_check($v)){
                return true;
            }
        }
        else{
            if($_SERVER["REMOTE_ADDR"] == $v){
                return true;
            }
        }
        }//foreach

        }else{
            if($_SERVER["REMOTE_ADDR"] == $allow_ip){
                return true;
            }
        }

        return false;
}

function mask_check($mask_ip){
        list($ip, $mask_bit) = explode("/", $mask_ip);
        $ip_long = ip2long($ip) >> (32 - $mask_bit);
        $p_ip_long = ip2long($_SERVER["REMOTE_ADDR"]) >> (32 - $mask_bit);
        if ($p_ip_long == $ip_long) {
        return true;
        }
        else {
        return false;
        }
}



?>
