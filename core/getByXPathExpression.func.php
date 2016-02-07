<?php

namespace spoxcli\core;

/**
  *
  * @param $strHtml     - 
  * @param $strSelector - 
  *
  * @return 
  *
  *
  **/
function getByXPathExpression($strHtml, $strSelector) {

  if(true === empty($strHtml) || true === empty($strSelector))
    return null;

  $objDomDocument = new \DomDocument();
  @$objDomDocument->loadHTML($str . $strHtml);

  $objDomXPath = new \DOMXPath($objDomDocument);

  return $objDomXPath->query($strSelector);

}
