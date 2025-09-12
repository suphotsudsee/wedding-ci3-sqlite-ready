
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$active_group = 'default';
$query_builder = TRUE;

$SQLITE_PATH = FCPATH.'database/app.sqlite';

$db['default'] = array(
  'dsn'      => 'sqlite:'.$SQLITE_PATH,
  'hostname' => '',
  'username' => '',
  'password' => '',
  'database' => $SQLITE_PATH,
  'dbdriver' => 'pdo',
  'dbprefix' => '',
  'pconnect' => FALSE,
  'db_debug' => TRUE,
  'cache_on' => FALSE,
  'cachedir' => '',
  'char_set' => 'utf8',
  'dbcollat' => 'utf8_general_ci',
  'swap_pre' => '',
  'encrypt'  => FALSE,
  'compress' => FALSE,
  'stricton' => FALSE,
  'failover' => array(),
  'save_queries' => TRUE
);
