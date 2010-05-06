/**
 * author a9b
 * @date 2008/05/01 11:55
 * 多次元配列に対応
 *
    # 文字列中のゴミ削除 デフォルト：$dust[] = "\n"; $dust[] = "\t";
    $dust[] = "\n";
    $dust[] = "\t";
    dustdel($mix,$dust=null);
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

