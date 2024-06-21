<?php

if (!function_exists('diffForHumans')) {
    function diffForHumans($datetime)
    {
        $now = new DateTime();
        $target = new DateTime($datetime);
        $diff = $now->diff($target);

        if ($diff->y > 0) {
            return $diff->y . ' tahun' . ($diff->y > 1 ? '' : '') . ' lalu';
        }
        if ($diff->m > 0) {
            return $diff->m . ' bulan' . ($diff->m > 1 ? '' : '') . ' lalu';
        }
        if ($diff->d > 0) {
            return $diff->d . ' hari' . ($diff->d > 1 ? '' : '') . ' lalu';
        }
        if ($diff->h > 0) {
            return $diff->h . ' jam' . ($diff->h > 1 ? '' : '') . ' lalu';
        }
        if ($diff->i > 0) {
            return $diff->i . ' menit' . ($diff->i > 1 ? '' : '') . ' lalu';
        }
        if ($diff->s > 0) {
            return $diff->s . ' detik' . ($diff->s > 1 ? '' : '') . ' lalu';
        }

        return 'sekarang';
    }
}
