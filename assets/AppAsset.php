<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'theme/plugins/vectormap/jquery-jvectormap-2.0.2.css',
        'theme/plugins/simplebar/css/simplebar.css',
        'theme/plugins/perfect-scrollbar/css/perfect-scrollbar.css',
        'theme/plugins/metismenu/css/metisMenu.min.css',
        //'theme/assets/plugins/datatable/css/dataTables.bootstrap5.min.css',
        'https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css',
        'theme/css/pace.min.css',
        'theme/css/bootstrap.min.css',
        'https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap',
        'theme/css/app.css',
        'theme/css/icons.css',
    ];
    public $js = [
      'theme/js/pace.min.js',
      'theme/js/bootstrap.bundle.min.js',
      'theme/js/jquery.min.js',
      'theme/plugins/simplebar/js/simplebar.min.js',
      'theme/plugins/metismenu/js/metisMenu.min.js',
      'theme/plugins/perfect-scrollbar/js/perfect-scrollbar.js',
      'theme/plugins/vectormap/jquery-jvectormap-2.0.2.min.js',
      'theme/plugins/vectormap/jquery-jvectormap-world-mill-en.js',
      'theme/plugins/chartjs/js/Chart.min.js',
      'theme/plugins/chartjs/js/Chart.extension.js',
      'theme/js/index.js',
      'theme/plugins/datatable/js/jquery.dataTables.min.js',
      //'https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js',
      'theme/plugins/datatable/js/dataTables.bootstrap5.min.js',
      //'https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js',
      'theme/plugins/datatable/js/datatableRendering.js',
      'theme/js/app.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
