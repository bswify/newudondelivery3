<?php

/**
 * @link      https://github.com/kv4nt/yii2-sweet-alert
 * @license   https://github.com/kv4nt/yii2-sweet-alert/blob/master/LICENSE.md
 */

namespace kv4nt\sweetalert;

use yii\web\AssetBundle;

/**
 * SweetAlert asset for yii2
 *
 * @author Victor Shumeyko <kvant90@gmail.com>
 * @see http://lipis.github.io/bootstrap-sweetalert/
 */
class SweetAlertAsset extends AssetBundle
{

    /**
     * @var string the directory that contains the source asset files for this asset bundle.
     */
    public $sourcePath = '@bower/bootstrap-sweetalert';

    /**
     * @var array list of JavaScript files that this bundle contains.
     */
    public $js = [
        'dist/sweetalert.min.js',
    ];

    /**
     * @var array list of CSS files that this bundle contains.
     */
    public $css = [
        'dist/sweetalert.css'
    ];

}
