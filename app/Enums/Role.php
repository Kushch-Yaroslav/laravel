<?php

namespace App\Enums;
enum Role:string{
    case Admin = 'admin';
    case Moderator = 'moderator';
    case Guest = 'guest';
    public static function getValues():array{
        return array_map(fn($case)=>$case->value,self::cases());
    }
}
