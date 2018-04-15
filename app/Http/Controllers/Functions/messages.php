<?php

namespace App\Http\Controllers\Functions;

function messages($type,$message)
{
    return \Session::flash($type,$message);    
}