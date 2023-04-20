<?php 
// Limpa o cache do PHP
$cache_directory = __DIR__ . '/cache';
array_map('unlink', glob($cache_directory . '/*.php'));