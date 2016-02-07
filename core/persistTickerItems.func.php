<?php

namespace spoxcli\core;

/**
  * @param $arrNewTickerItems - the new ticker items to store
  *
  * @return (void) ?
  *
  * 
  *
  **/
function persistTickerItems(array $arrNewTickerItems, $strTickerDayStoragePath, $strTickerFileName) {

  # argument validation
  if(0 === sizeof($arrNewTickerItems))
    return;
  
  if(true === empty($strTickerDayStoragePath) || true === empty($strTickerFileName))
    return false; # not cool
  
  # validate whether ticker path and/or ticker file exists
    # create path and/or file
  
  $strTickerFilePath = $strTickerDayStoragePath . '/' . $strTickerFileName;
  
  if(false === \file_exists($strTickerFilePath)) {
  
    if(false === \is_dir($strTickerDayStoragePath)) {
      
      if(false === is_writable($strTickerDayStoragePath . '/..'))
        # real error
      
      mkdir($strTickerDayStoragePath, 0755);
      
    }
    
    if(false === \is_writable($strTickerDayStoragePath)){}
      # another real error

  }

  $arrExistingTickerItems = getExistingTickerItems($strTickerFilePath);
  $arrMergedTickerItems = \array_merge($arrNewTickerItems, $arrExistingTickerItems);

  # maybe readable/writable check? (again)
  # persist merge result in file
  #var_dump($arrNewTickerItems);
  $resFile = fopen($strTickerFilePath, 'w');
  fwrite($resFile, json_encode($arrMergedTickerItems, JSON_PRETTY_PRINT));
  fclose($resFile);

}
