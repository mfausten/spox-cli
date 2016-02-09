<?php

namespace spoxcli\core;

function parseTickerItemNews(\DomNodeList $objTickerItemNews) {

  if(0 === $objTickerItemNews->length)
    return ''; # does that make sense?

  if(1 === $objTickerItemNews->length)
    return $objTickerItemNews[0]->nodeValue;

  $strTickerItemNews = '';

  foreach($objTickerItemNews AS $intKey => $objHtmlParagraph)
    $strTickerItemNews .= "\n" . $objHtmlParagraph->nodeValue;

  return $strTickerItemNews;

}
