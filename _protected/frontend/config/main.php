<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [

        // 'assetManager' => [
		// 	'bundles' => [
		// 		'dosamigos\google\maps\MapAsset' => [
		// 		'options' => [
		// 			'key' => 'AIzaSyCP7RNiyWiYUj-4JrlrgvhXl2lRE4zIKlo',// ใส่ API ตรงนี้ครับ
		// 			'language' => 'th',
		// 			'version' => '3.1.18'
		// 			]
		// 		]
		// 	]
		// ], 

        'session' => [
            'name' => 'FRONTENDSESSION',//ชื่อ Session
          ],
          
       
        // here you can set theme used for your frontend application 
        // - template comes with: 'default', 'slate', 'spacelab' and 'cerulean'
        'view' => [
            'theme' => [
                'pathMap' => ['@app/views' => '@webroot/themes/material/views'],
                'baseUrl' => '@web/themes/material',
            ],
        ],
        'user' => [
            'identityClass' => 'common\models\UserIdentity',
            'enableAutoLogin' => true,
            'identityCookie' => [
                'name'     => '_frontendIdentity',
                'path'     => '/',
                'httpOnly' => true,
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
    ],
    'params' => $params,
];
