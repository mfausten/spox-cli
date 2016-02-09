<?php

namespace spoxcli\core;

function getExistingTickerItems($strNewsFile) {

  if(false === \file_exists($strNewsFile))
    return [];

  $strExistingTickerItems = \file_get_contents($strNewsFile);

  if(false === is_array($arrExistingTickerItems = \json_decode($strExistingTickerItems, true)))
    return [];

  return $arrExistingTickerItems;

}
