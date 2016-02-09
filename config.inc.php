<?php

const PERSIST_NEWS   = true;
const DEVELOPER_MODE = false;

const HOST     = 'http://www.spox.com';
const HOST_DEV = 'http://spox.dev';

const PROJECT_PATH = __DIR__;

const TICKER_DAY_STORAGE_PATH = PROJECT_PATH . '/ticker';

const CORE_PATH  = PROJECT_PATH . '/core';
const TESTS_PATH = PROJECT_PATH . '/tests';

const TICKER_DAY_STORAGE_FILE_NAME = 'news.json';

const TICKER_NEWS_FILE_PATH = TICKER_DAY_STORAGE_PATH . '/' . TICKER_DAY_STORAGE_FILE_NAME;

define('TICKER_LINK_SELECTOR', '//a[contains(@href, "rundumdenball/' . date('ym') . '/' . date('dm') . '")]/@href');

const TICKER_ITEMS_SELECTOR = '//div[@class="tickeritem"]';

const TICKER_ITEM_ID      = '//div[@class="wrp2"]/a[@class="date"]/@id';
const TICKER_ITEM_TIME    = '//div[@class="wrp2"]/a[@class="date"]';
const TICKER_ITEM_HEADING = '//div[@class="wrp3"]/h2';
const TICKER_ITEM_NEWS    = '//div[@class="wrp3"]/div[@class="text"]/p[1]';