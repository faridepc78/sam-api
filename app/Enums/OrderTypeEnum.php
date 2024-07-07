<?php

namespace App\Enums;

enum OrderTypeEnum: string
{
    case SHAB = 'shab';
    case JAJIGA = 'jajiga';
    case OTAGHAK = 'otaghak';
    case LIDOMATRIP = 'lidomatrip';
    case HOMSA = 'homsa';
    case ROOMTOOR = 'roomtoor';
    case PINOREST = 'pinorest';
    case SEPANJA = 'sepanja';
    case SAM = 'sam';
    case PHONE = 'phone';
    case OTHERS = 'others';
}
