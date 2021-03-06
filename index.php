<?php

  require 'api/cora/setting.php';
  $setting = cora\setting::get_instance();

  // Dump you straight into the demo.
  if($setting->is_demo() === true) {
    setcookie(
      'session_key',
      'd31d3ef451fe65885928e5e1bdf4af321f702009',
      4294967295,
      '/',
      'demo.beestat.io',
      $setting->get('force_ssl'),
      true
    );

    // Just so I can make some simpler assumptions in app.php since the
    // superglobal is not updated when calling setcookie().
    $_COOKIE['session_key'] = 'd31d3ef451fe65885928e5e1bdf4af321f702009';
  }

  // Skip this page entirely if you're logged in.
  if($setting->is_demo() === true || preg_match('/app\.beestat\.io/', $_SERVER['HTTP_HOST']) !== 0) {
    require 'app.php';
  } else {
    require 'www.php';
  }
