<?php

include_once('SCMerchantClient/components/FormattingUtil.php');

echo 'null => '.FormattingUtil::formatCurrency(null).'<br/>';
echo '0 => '.FormattingUtil::formatCurrency(0).'<br/>';
echo '0.0 => '.FormattingUtil::formatCurrency(0.0).'<br/>';
echo '1.1 => '.FormattingUtil::formatCurrency(1.1).'<br/>';
echo '1.123 => '.FormattingUtil::formatCurrency(1.123).'<br/>';
echo '123.123 => '.FormattingUtil::formatCurrency(123.123).'<br/>';
echo '123456789.123 => '.FormattingUtil::formatCurrency(123456789.123).'<br/>';
echo '123456789.12345678 => '.FormattingUtil::formatCurrency(123456789.12345678).'<br/>';