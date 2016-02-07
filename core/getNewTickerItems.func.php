<?php

namespace spoxcli\core;

/**
  * @param $arrExistingTickerItemIds - an array, containing all known ticker item ids
  * @param $arrAllNewsItems          - all ticker items that were found while parsing
  *
  * @return (array) - an array containing all new ticker items
  *
  * this function iterates all found ticker items and will detect whether any ticker item id
  * is already known or not. the new, therefore unread, ticker items will be returned as an multi
  * dimensional array.
  *
  * [
  *   [ tickeritem ],
  *   [ tickeritem ],
  *   ...
  * ]
  *
  * if no new ticker items were found, an empty array is returned
  *
  **/
function getNewTickerItems(array $arrExistingTickerItemIds, array $arrAllNewsItems) {

  if(0 === sizeof($arrExistingTickerItemIds))
    return $arrAllNewsItems;

  if(0 === sizeof($arrAllNewsItems))
    return [];

  $arrNewTickerItems = [];

  foreach($arrAllNewsItems AS $intKey => $arrTickerItem)
    if(true === \array_key_exists('id', $arrTickerItem))
      if(false === \in_array($arrTickerItem['id'], $arrExistingTickerItemIds))
        $arrNewTickerItems[] = $arrTickerItem;

  return $arrNewTickerItems;

}
