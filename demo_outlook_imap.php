<?php
require 'vendor/autoload.php';

ini_set('display_errors', true);
error_reporting(E_ALL);
// change these 3 lines
// the path to the peeker.php class file
use Deltagestor\Peeker\Peeker;
// this can also be a Outlook email account
$config['login']='your_outlook_address@gmail.com';
$config['pass']='your_outlook_password';

// do not change these lines
// this should not change unless you are having problems
$config['host']='outlook.office365.com';
$config['port']='993';
$config['service_flags'] = '/imap/notls';
$config['search'] = 'UNSEEN';

// you can definitely change these lines!
// because your application code goes here
try {
    $peeker = new Peeker($config);
    $cnt = $peeker->get_message_count();
    echo $cnt . ' message waiting';
}catch (\Exception $e){
    echo $e->getMessage();
}

// EOF