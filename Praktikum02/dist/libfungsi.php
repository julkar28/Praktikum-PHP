<?php
 function kelulusan($_nilai) {
    if ($_nilai > 55) {
        return 'LULUS';
    }else {
        return 'TIDAK LULUS';
    }
 }
 function grade($_nilai) {
    if ($_nilai < 0 or $_nilai > 100) {
        return 'I';
    }elseif ($_nilai <= 35) {
        return 'E';
    }elseif ($_nilai <= 55) {
        return 'D';
    }elseif ($_nilai <= 69) {
        return 'C';
    }elseif ($_nilai <= 84) {
        return 'B';
    }elseif ($_nilai <= 100) {
        return 'A';
    }
 }
 function predikat($_grade) { // argumen nya E,D,C,B,A
    switch ($_grade) {
        case 'A':
            return 'Sangat Memuaskan';
            break;
        case 'B':
            return 'Memuaskan';
            break;
        case 'C':
            return 'Cukup';
            break;
        case 'D':
            return 'Kurang';
            break;
        case 'E':
            return 'Sangat Kurang';
            break;
        default:
            return 'Tidak Ada';
            break;
    }
 }