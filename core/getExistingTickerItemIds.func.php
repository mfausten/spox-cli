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

  if(null === $arrExistingTickerItems)
    return [];

  $arrExistingTickerItemIds = [];

  foreach($arrExistingTickerItems AS $intKey => $arrExistingTickerItem)
    if(\array_key_exists('id', $arrExistingTickerItem))
      $arrExistingTickerItemIds[] = $arrExistingTickerItem['id'];

  return $arrExistingTickerItemIds;

}
