<?php

namespace APHPUnit\Testcases;

require_once '../../config.inc.php';

require_once CORE_PATH . '/getNewTickerItems.func.php';

function getExistingTickerItemsMock() {

  return [ 1, 2, 4, 7 ];

}

function getAllNewsMockup() {

  return [

    [
      'id'      => 2,
      'time'    => '13:37 Uhr',
      'heading' => 'Foo',
      'news'    => 'foo bar baz qux'
    ]

  ];

}

function testEmptyExistingTickerItemIds() {

  $arrReal = core\getNewTickerItems([], getAllNewsMockup());

  assertEquals($arrReal, getAllNewsMockup());

}

function testEmptyNewNewsItems() {

  $arrReal = core\getNewTickerItems(getExistingTickerItemsMock, []);

  assertEquals($arrReal, []);

}

function testNoNewTickerItems() {

  $arrReal = core\getNewTickerItems([ 2 ], getAllNewsMockup());

  assertEquals($arrReal, []);

}

function testNewTickerItems(){

  $arrReal = core\getNewTickerItems([ 1, 4, 7 ], getAllNewsMockup());

  assertEquals($arrReal, getAllNewsMockup());

}
