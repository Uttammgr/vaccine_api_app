<?php

namespace App\Helpers;

class responseHelpers {
     public static function createResponse($is_error, $status_Code, $status_message, $message, $content){
         $taskresponse =  [];

         if ($is_error){
             $taskresponse['Success'] = false;
             $taskresponse['Status_Code'] = $status_Code;
             $taskresponse['message'] = $message;
         }else{
             $taskresponse['Success'] = true;
             $taskresponse['Status_Code'] = $status_Code;
             $taskresponse['message'] = $status_message;
             if ($content === null){
                 $taskresponse['message'] = $message;
             }else{
                 $taskresponse['data'] = $content;
             }
         }
         return $taskresponse;
     }
}
