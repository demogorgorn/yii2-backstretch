<?php

/**
 * @copyright Copyright &copy; Oleg Martemjanov, foreign.by, 2015
 * @package yii2-backstretch
 * @version 1.0
 */

namespace demogorgorn\backstretch;

/**
 * @author Oleg Martemjanov <demogorgorn@gmail.com>
 * @since 1.0
 */
class BackStretchAsset extends \yii\web\AssetBundle
{

    public $sourcePath = '@bower/jquery-backstretch/';
    public $js = [ 'jquery.backstretch.min.js' ];
	
	public $depends = [
        'yii\web\JqueryAsset',
    ];
}