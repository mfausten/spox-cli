<?php

namespace spoxcli\core;

/**
  *
  *
  *
  *
  *
  **/
function getExistingTickerItemIds($strNewsFile) {

  # todo: why cant we do \empty?
  if(true === empty($strNewsFile))
    return null;

  if(false === \file_exists($strNewsFile))
    return [];

  if(false === \is_readable($strNewsFile))
    return null;

  $strExistingTickerItems = \file_get_contents($strNewsFile);
  $arrExistingTickerItems = \json_decode($strExistingTickerItems, true);

  $arrExistingTickerItemIds = [];

  foreach($arrExistingTickerItems AS $intKey => $arrExistingTickerItem)
    if(\array_key_exists('id', $arrExistingTickerItem))
      $arrExistingTickerItemIds[] = $arrExistingTickerItem['id'];

  if(null === $arrExistingTickerItemIds)
    return [];

  return $arrExistingTickerItemIds;

}

function getExistingTickerItems($strNewsFile) {
#var_dump($strNewsFile);

  if(false === \file_exists($strNewsFile))
    return [];

  $strExistingTickerItems = \file_get_contents($strNewsFile);
#var_dump($strExistingTickerItems);
  return \json_decode($strExistingTickerItems, true);

}

#var_dump(getExistingTickerItems('/usr/local/www/cli-news/ticker/news.json'));