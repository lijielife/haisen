@REM<?php
@REM == '
@TITLE=CAI JI 4
@CD..
@CD php5
@SET PHPCLI=%CD%/php.exe
@%PHPCLI% %0
@PAUSE
@GOTO :EOF
';
@REM?>
<?php
require_once('../load_cmd.php');
$app->action('caiji44','ajax_caiji_goodsurl_start');
?>