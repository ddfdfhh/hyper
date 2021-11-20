<?php 
return [ 
    'client_id' => 'ASHEa4tFaKeBnpmtq0qilGP9uMXi6hLz6UozlUBkjU5lUBb84sBQZmrLBbzaCMFEQu-uKaRSF63sbv2I',
	'secret' => 'EFuUeCQme001RUnpLm218zqx7OqW3J_TuNXZpLPw2n9ID-CqOjyylJIFSknrtdYQ7A8fOze2d1GTBrQe',
    'settings' => array(
        'mode' => 'sandbox',
        'http.ConnectionTimeOut' => 1000,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path() . '/logs/paypal.log',
        'log.LogLevel' => 'FINE'
    ),
];