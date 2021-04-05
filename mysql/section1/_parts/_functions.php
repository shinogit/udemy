<?php

function h($str)
{
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

define('SITE_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/udemy/mysql/section1');