<?php

namespace App\Enums;
enum Payment_method:string{
    case Cash = 'cash';
    case Credit_card = 'credit';
    case Debit_card = 'debit';
    public static function getValues():array{
        return array_map(fn($case)=>$case->value,self::cases());
    }
}
