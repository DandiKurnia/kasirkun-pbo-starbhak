<?php
function format_ulang ($angka){
    return number_format($angka,0,',','.');
}

function terbilang ($angka){
    $angka = abs($angka);
    $baca = array('','satu','dua','tiga','empat','lima','enam','tujuh','delapan','sembilan','sepuluh','sebelas');
    $terbilang = '';

    if ($angka < 12){
        $terbilang = '' . $baca[$angka];
    } else if ($angka < 20){
        $terbilang = terbilang($angka -10). 'belas';
    } else if ($angka < 100){
        $terbilang = terbilang($angka / 10). 'puluh' . terbilang($angka % 10);
    }

    return $terbilang;
}
?>