<?php

namespace spoxcli\core;

/**
  *
  *
  *
  *
  *
  **/
function getAllTickerItemsFromRemote(\DOMNodeList $objTickerItems) {

  if(0 >= $objTickerItems->length)
    return [];

  $arrAllNews = [];

  foreach($objTickerItems AS $intKey => $objTickerItem) {

    # without this tag, the encoding will be null and break the umlauts,
    # since the html is withouta <html> and <head> declaration.
    $strHtmlMetaEncoding = '<meta http-equiv="content-type" content="text/html; charset=UTF-8">';
    $strHtml = $strHtmlMetaEncoding . $objTickerItem->ownerDocument->saveHTML($objTickerItem);

    $arrNewsItem = [

      'id'      => \substr(getByXPathExpression($strHtml, TICKER_ITEM_ID)[0]->nodeValue, 4),
      'time'    => getByXPathExpression($strHtml, TICKER_ITEM_TIME)[0]->nodeValue,
      'heading' => getByXPathExpression($strHtml, TICKER_ITEM_HEADING)[0]->nodeValue,
      'news'    => getByXPathExpression($strHtml, TICKER_ITEM_NEWS)[0]->nodeValue

    ];

    $arrAllNews[] = $arrNewsItem;

  }

  return $arrAllNews;

}
