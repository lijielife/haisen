<?php
echo "1";
fastcgi_finish_request();
sleep(2);
file_put_contents("./test.log", "yes");
