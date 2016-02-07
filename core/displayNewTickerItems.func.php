<?php

namespace spoxcli\core;

/**
  * @param $arrNewTickerItems - 
  *
  *
  *
  *
  *
  **/
function displayNewTickerItems(array $arrNewTickerItems) {

  if(0 === sizeof($arrNewTickerItems)) {

      print "\n no unread ticker items\n\n";
      return;

  }

  foreach($arrNewTickerItems AS $inKey => $arrNewTickerItem) {

    $strHeading = trim($arrNewTickerItem['time']) . ' - ' . trim($arrNewTickerItem['heading']);

    print "\n" . \str_repeat('#', strlen($strHeading));
    print "\n" . $strHeading;
    print "\n" . \str_repeat('#', strlen($strHeading)) . "\n\n";
    print $arrNewTickerItem['news'] . "\n";

  }

}
