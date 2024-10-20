<?php

session_start();

$conn = mysqli_connect("localhost", "tiara", "Tiaracantik06#", "tugas_pwd");

if(!$conn) {
    echo "Gagal konek!";
}

$country = ['Indonesia', 'Malaysia', 'Nigeria', 'Kolombia', 'Singapura', 'China', 'Jepang', 'Korea'];