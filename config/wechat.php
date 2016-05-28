<?php

return [
    /**
     * Debug 模式，bool 值：true/false
     *
     * 当值为 false 时，所有的日志都不会记录
     */
    'debug'  => true,

    /**
     * 使用 Laravel 的缓存系统
     */
    'use_laravel_cache' => true,

    /**
     * 账号基本信息，请从微信公众平台/开放平台获取
     */
    //'app_id'  => env('WECHAT_APPID', 'wxcd17d64595cf2c1a'),         // AppID
    //'secret'  => env('WECHAT_SECRET', 'c6df6b4d395bd2c072c4514e3dbd7b43'),     // AppSecret
    //'token'   => env('WECHAT_TOKEN', '09fa172093d6c6ac8acac73960e8b2ea'),          // Token
    //'aes_key' => env('WECHAT_AES_KEY', 'zOBGCtFApcxMoQh2zUDgyyp8mHHex9SujS5p2ppK5mQ'),                    // EncodingAESKey
    /**
    * 测试公众号
    */
    'app_id'  => env('WECHAT_APPID', 'wx059c039dc2a5a6f0'),         // AppID
    'secret'  => env('WECHAT_SECRET', '9230db0ae215d4208532a9e781d06543'),     // AppSecret
    'token'   => env('WECHAT_TOKEN', '09fa172093d6c6ac8acac73960e8b2ea'),          // Token
    'aes_key' => env('WECHAT_AES_KEY', 'zOBGCtFApcxMoQh2zUDgyyp8mHHex9SujS5p2ppK5mQ'),                    // EncodingAESKey


    /**
     * 日志配置
     *
     * level: 日志级别，可选为：
     *                 debug/info/notice/warning/error/critical/alert/emergency
     * file：日志文件位置(绝对路径!!!)，要求可写权限
     */
    'log' => [
        'level' => env('WECHAT_LOG_LEVEL', 'debug'),
        'file'  => env('WECHAT_LOG_FILE', storage_path('logs/wechat.log')),
    ],

    /**
     * OAuth 配置
     *
     * scopes：公众平台（snsapi_userinfo / snsapi_base），开放平台：snsapi_login
     * callback：OAuth授权完成后的回调页地址(如果使用中间件，则随便填写。。。)
     */
     'oauth' => [
         'scopes'   => array_map('trim', explode(',', env('WECHAT_OAUTH_SCOPES', 'snsapi_userinfo'))),
         'callback' => env('WECHAT_OAUTH_CALLBACK', '/examples/oauth_callback.php'),
     ],

    /**
     * 微信支付
     */
    // 'payment' => [
    //     'merchant_id'        => env('WECHAT_PAYMENT_MERCHANT_ID', 'your-mch-id'),
    //     'key'                => env('WECHAT_PAYMENT_KEY', 'key-for-signature'),
    //     'cert_path'          => env('WECHAT_PAYMENT_CERT_PATH', 'path/to/your/cert.pem'), // XXX: 绝对路径！！！！
    //     'key_path'           => env('WECHAT_PAYMENT_KEY_PATH', 'path/to/your/key'),      // XXX: 绝对路径！！！！
    //     // 'device_info'     => env('WECHAT_PAYMENT_DEVICE_INFO', ''),
    //     // 'sub_app_id'      => env('WECHAT_PAYMENT_SUB_APP_ID', ''),
    //     // 'sub_merchant_id' => env('WECHAT_PAYMENT_SUB_MERCHANT_ID', ''),
    //     // ...
    // ],
];
