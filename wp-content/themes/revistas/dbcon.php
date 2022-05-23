<?php

$mysql = new mysqli("localhost", "andreiwalber", "Abw110197!@#", "revistas");

if ($mysql->connect_errno) {
    echo "Falha ao conectar";
}
