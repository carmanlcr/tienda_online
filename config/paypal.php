<?php
	return array(
    // set your paypal credential
    'client_id' => 'AZVh-aLiLSOV7CrLj-cwBdGEJuODM8lqWs6E7_Zjej0todC6iiQoXzglo2hd7Xa4B0o51qYP8dL8mVfc',
    'secret' => 'EIEhiD_LqUJIK1lAmI9NbcnWVcfOaFw_4qMgzMY-1bkI2yHKCiWq_BQxeMSFTk5exZT4QE5pC7Tmx9Cy',
 
    /**
     * SDK configuration 
     */
    'settings' => array(
        /**
         * Available option 'sandbox' or 'live'
         */
        'mode' => 'sandbox',
 
        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 30,
 
        /**
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,
 
        /**
         * Specify the file that want to write on
         */
        'log.FileName' => storage_path() . '/logs/paypal.log',
 
        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE'
    ),
);