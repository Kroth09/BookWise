<?php

dump($_SESSION);

$mensagem = $_REQUEST["mensagem"] ?? '';

view('login', compact('mensagem'));