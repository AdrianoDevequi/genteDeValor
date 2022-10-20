<?php
/**
 * DATABASE
 */
define("CONF_DB_HOST", "67.23.238.71");
define("CONF_DB_USER", "user_gentedevalor");
define("CONF_DB_PASS", "l!cB[FD88wX31b");
define("CONF_DB_NAME", "bd_gentedevalor");

/**
 * PROJECT URLs
 */
define("CONF_URL_BASE", "https://www.localhost/cms");
define("CONF_URL_ADMIN", CONF_URL_BASE . "/admin");
define("CONF_URL_ERROR", CONF_URL_BASE . "/404");

/**
 * DATES
 */
define("CONF_DATE_BR", "d/m/Y H:i:s");
define("CONF_DATE_APP", "Y-m-d H:i:s");

/**
 * SESSION
 */
define("CONF_SES_PATH", __DIR__ . "/../../storage/sessions/");

/**
 * PASSWORD
 */
define("CONF_PASSWD_MIN_LEN", 8);
define("CONF_PASSWD_MAX_LEN", 40);
define("CONF_PASSWD_ALGO", PASSWORD_DEFAULT);
define("CONF_PASSWD_OPTION", ["cost" => 10]);

/**
 * MESSAGE
 */
define("CONF_MESSAGE_CLASS", "trigger");
define("CONF_MESSAGE_INFO", "info");
define("CONF_MESSAGE_SUCCESS", "success");
define("CONF_MESSAGE_WARNING", "warning");
define("CONF_MESSAGE_ERROR", "error");