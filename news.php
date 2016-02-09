<?php

namespace spoxcli;

require_once './config.inc.php';

require_once CORE_PATH . '/getByXPathExpression.func.php';
require_once CORE_PATH . '/getAllTickerItemsFromRemote.func.php';
require_once CORE_PATH . '/getExistingTickerItemIds.func.php';
require_once CORE_PATH . '/getNewTickerItems.func.php';
require_once CORE_PATH . '/persistTickerItems.func.php';
require_once CORE_PATH . '/displayNewTickerItems.func.php';

# cli interface:

# php news.php -a | show all news, even though some may already been displayed - are then all marked as read?
# php news.php -c | clear all ticker days
# php news.php -f | fetch only, show nothing
# php news.php -l | limit output number of ticker items
# php news.php -p | option whether to persist or not

$arrOptions = \getopt('acfhn', [ 'all', 'clear', 'fetch', 'help', 'no-persistence' ]);

# if ticker folder does not exist, create one, otherwise fopen wont work
# ticker folder path is controlled by const in config file

# what if news gets an update? only id comparing would not recognize!

$strSpox = \file_get_contents(HOST);

if(true === empty($strSpox)) {

  print 'could not reach remote: ' . HOST;
  exit;

}

$objTickerLinks = core\getByXPathExpression($strSpox, TICKER_LINK_SELECTOR);

if(!DEVELOPER_MODE && 0 === $objTickerLinks->length) {

  print "\ncould not find ticker link. ticker maybe hasnt started. also on weekends there is no ticker\n\n";
  exit;

}

if(DEVELOPER_MODE)
  $strSpoxTicker = \file_get_contents(HOST_DEV);
else
  $strSpoxTicker = \file_get_contents(HOST . $objTickerLinks[0]->nodeValue);

if(true === empty($strSpoxTicker) || false === $strSpoxTicker) {

  print "\ncould not parse spox ticker: " . $objTickerLinks[0]->nodeValue . "\n\n";
  exit;

}

$objTickerItems           = core\getByXPathExpression($strSpoxTicker, TICKER_ITEMS_SELECTOR);
$arrAllNews               = core\getAllTickerItemsFromRemote($objTickerItems);
$arrExistingTickerItemIds = core\getExistingTickerItemIds(TICKER_NEWS_FILE_PATH);
$arrNewTickerItems        = core\getNewTickerItems($arrExistingTickerItemIds, $arrAllNews);

if(0 < sizeof($arrNewTickerItems))
  core\persistTickerItems($arrNewTickerItems, TICKER_DAY_STORAGE_PATH, TICKER_DAY_STORAGE_FILE_NAME);

core\displayNewTickerItems($arrNewTickerItems);
