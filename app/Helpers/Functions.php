<php 
function isUppercase($value, $message, $fail){
    
    if ($value != mb_strtoupper($value) ) {
            $fail($message);
        }
}

?></php>