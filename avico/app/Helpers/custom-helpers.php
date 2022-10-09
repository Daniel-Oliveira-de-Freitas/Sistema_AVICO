<?php

if(!function_exists('format_document')){
    function format_document(string $value) : string 
    {
        $value_length = 11;
        $value_replace = preg_replace("/\D/",'', $value);

        if(strlen($value_replace) === $value_length ){
            return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $value_replace);
        }
        
        return preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $value_replace);
    }
}