<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Html;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<!--wrapper-->
<div class="wrapper">
    <!--start header wrapper-->
    <div class="header-wrapper">
      <!--start header -->
      <header>
        <div class="topbar d-flex align-items-center">
          <nav class="navbar navbar-expand">
            <div class="topbar-logo-header">
              <div class="">
                <img src="theme/images/ct2.png" class="logo-icon" alt="Chekii Logo">
              </div>
            </div>
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i></div>
            <div class="top-menu ms-auto">
              <ul class="navbar-nav align-items-center">
                <li class="nav-item mobile-search-icon">
                  <a class="nav-link" href="#">	<i class='bx bx-search'></i>
                  </a>
                </li>
                <li class="nav-item dropdown dropdown-large">
                  <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">	<i class='bx bx-category'></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-end">
                    <div class="row row-cols-3 g-3 p-3">
                      <a class="app-link" href="<?=Url::to(['/employee'])?>">
                        <div class="col text-center">
                          <div class="app-box mx-auto bg-gradient-cosmic text-white"><i class='bx bx-group'></i>
                          </div>
                          <div class="app-title">Employees</div>
                        </div>
                      </a>
                      <a class="app-link" href="<?=Url::to(['/currency'])?>">
                        <div class="col text-center">
                          <div class="app-box mx-auto bg-gradient-burning text-white"><i class='bx bx-money'></i></div>
                          <div class="app-title">Currency</div>
                        </div>
                      </a>
                      <div class="col text-center">
                        <div class="app-box mx-auto bg-gradient-lush text-white"><i class='bx bx-cabinet'></i>
                        </div>
                        <div class="app-title">Category</div>
                      </div>
                      <div class="col text-center">
                        <div class="app-box mx-auto bg-gradient-kyoto text-dark"><i class='bx bx-box'></i>
                        </div>
                        <div class="app-title">Products</div>
                      </div>
                      <div class="col text-center">
                        <div class="app-box mx-auto bg-gradient-blues text-dark"><i class='bx bx-task'></i>
                        </div>
                        <div class="app-title">Inventory</div>
                      </div>
                      <div class="col text-center">
                        <div class="app-box mx-auto bg-gradient-moonlit text-white"><i class='bx bx-export'></i>
                        </div>
                        <div class="app-title">Sales</div>
                      </div>
                      <div class="col text-center">
                        <div class="app-box mx-auto bg-gradient-lush text-white"><i class='bx bx-user-check'></i>
                        </div>
                        <div class="app-title">Customers</div>
                      </div>
                      <div class="col text-center">
                        <div class="app-box mx-auto bg-gradient-cosmic text-white"><i class='bx bx-cycling'></i>
                        </div>
                        <div class="app-title">Suppliers</div>
                      </div>
                      <div class="col text-center">
                        <div class="app-box mx-auto bg-gradient-kyoto text-white"><i class='bx bx-trending-up'></i>
                        </div>
                        <div class="app-title">Reports</div>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="nav-item dropdown dropdown-large">
                  <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">7</span>
                    <i class='bx bx-bell'></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-end">
                    <a href="javascript:;">
                      <div class="msg-header">
                        <p class="msg-header-title">Notifications</p>
                        <p class="msg-header-clear ms-auto">Marks all as read</p>
                      </div>
                    </a>
                    <div class="header-notifications-list">
                      <a class="dropdown-item" href="javascript:;">
                        <div class="d-flex align-items-center">
                          <div class="notify bg-light-primary text-primary"><i class="bx bx-group"></i>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="msg-name">New Customers<span class="msg-time float-end">14 Sec
                          ago</span></h6>
                            <p class="msg-info">5 new user registered</p>
                          </div>
                        </div>
                      </a>

                    </div>
                    <a href="javascript:;">
                      <div class="text-center msg-footer">View All Notifications</div>
                    </a>
                  </div>
                </li>
                <li class="nav-item dropdown dropdown-large">
                  <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">8</span>
                    <i class='bx bx-comment'></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-end">
                    <a href="javascript:;">
                      <div class="msg-header">
                        <p class="msg-header-title">Messages</p>
                        <p class="msg-header-clear ms-auto">Marks all as read</p>
                      </div>
                    </a>
                    <div class="header-message-list">
                      <a class="dropdown-item" href="javascript:;">
                        <div class="d-flex align-items-center">
                          <div class="user-online">
                            <img src="theme/images/avatars/avatar.png" class="msg-avatar" alt="user">
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="msg-name">Daisy Anderson <span class="msg-time float-end">5 sec
                          ago</span></h6>
                            <p class="msg-info">The standard chunk of lorem</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <a href="javascript:;">
                      <div class="text-center msg-footer">View All Messages</div>
                    </a>
                  </div>
                </li>
              </ul>
            </div>
            <div class="user-box dropdown">
              <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="theme/images/avatars/avatar.png" class="user-img" alt="user avatar">
                <div class="user-info ps-3">
                  <p class="user-name mb-0">Administrator</p>
                  <p class="designattion mb-0">Super User</p>
                </div>
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="javascript:;"><i class="bx bx-user"></i><span>Profile</span></a>
                </li>
                <li><a class="dropdown-item" href="javascript:;"><i class="bx bx-cog"></i><span>Settings</span></a>
                </li>
                <li>
                  <div class="dropdown-divider mb-0"></div>
                </li>
                <li><a class="dropdown-item" href="javascript:;"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </header>
      <!--end header -->

    </div>
    <!--end header wrapper-->

    <!--start page wrapper -->
    <div class="page-wrapper">
      <div class="page-content">
        <?= Alert::widget() ?>
        <?= $content ?>
      </div>
    </div>
    <!--end page wrapper -->
    <!--start overlay-->
    <div class="overlay toggle-icon"></div>
    <!--end overlay-->
    <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    <!--End Back To Top Button-->
    <footer class="page-footer">
    <p class="mb-0">Copyright © <?= date('Y') ?>. All right reserved.</p>
    </footer>
</div>
<!--end wrapper-->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
