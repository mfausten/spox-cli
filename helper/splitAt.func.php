<?php

namespace spoxcli\helper;

/**
  *
  *
  *
  *
  **/
function splitAt($strToSplit, $intPositon) {

  if(false === \is_string($strToSplit) || false === \is_int($intPositon))
    return '';

  if(true === empty($strToSplit))
    return '';

  if(0 >= $intPositon)
    return '';

  $strResult   = '';
  $arrExploded = \explode(' ', $strToSplit);
  $intNewLine  = 0;

  foreach($arrExploded AS $intKey => $strExploded) {

    $strResult .= $strExploded . ' ';

    if(($intNewLine + 1) * $intPositon <= strlen($strResult)) {

      $strResult .= "\n";
      $intNewLine++;

    }

  }

  if($strResult[strlen($strResult) - 1] !== "\n")
    $strResult .= "\n";

  return $strResult;

}
