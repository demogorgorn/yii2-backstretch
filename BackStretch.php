<?php

/**
 * @copyright Copyright &copy; Oleg Martemjanov, foreign.by, 2015
 * @package yii2-backstretch
 * @version 1.0
 */

namespace demogorgorn\backstretch;

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

/**
 * The mobile-friendly, responsive, and lightweight jQuery date & time input picker.
 *
 * @see https://github.com/srobbin/jquery-backstretch
 * @author Oleg Martemjanov <demogorgorn@gmail.com>
 * @since 1.0
 */
class BackStretch extends \yii\base\Widget
{
    public $options = [];

    public $images = [];

    public $attachElement = null;

    public $imagePrefix = null;

    /**
     * Runs the widget
     *
     * @return string|void
     */
    public function run()
    {
        $this->registerAssets();

    }

    /**
     * Register client assets
     */
    public function registerAssets()
    {
        $view = $this->getView();
        BackStretchAsset::register($view);

        if ($this->imagePrefix != null) {
            foreach ($images as &$image) {
                $image = $this->imagePrefix . $image;
            }
        }

        $options = Json::encode($this->options, JSON_NUMERIC_CHECK);

        $js = ($this->attachElement) ? "$('{$this->attachElement}')" : "$"; 
        $js .= ".backstretch(";

        if (count($this->images) == 1)
            $js .= '"' . array_shift($this->images) . '"';
        else
            $js .= Json::encode($this->images);

        $js .= ",";
        $js .= $options;

        $js .= ");";

        $this->getView()->registerJs($js, \yii\web\View::POS_END);
    }
}