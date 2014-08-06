<?php
//This deployment script changes file permission for /data/sqlite.db file to enable modifications after deployment
if (! chmod(getenv("ZS_APPLICATION_BASE_DIR") . "/data", 0777) || ! chmod(getenv("ZS_APPLICATION_BASE_DIR") . "/data/sqlite.db", 0777))
    throw new Exception("chmod for " . getenv("ZS_APPLICATION_BASE_DIR") . "/data/sqlite.db failed.");
