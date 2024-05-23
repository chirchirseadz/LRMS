<?php

namespace App\Models;



class Utils {
    public function validatePhoneNumber($phoneNumber) {
 
        $expectedPattern = '/^254\d{9}$/';
        
        if (!preg_match($expectedPattern, $phoneNumber)) {
            throw new \InvalidArgumentException('Invalid phone number format.');
        }
        
        return $phoneNumber; // Validation passed
    }


}