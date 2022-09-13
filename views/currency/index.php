<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Currency;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CurrencySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Currencies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="currency-index">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

      <div class="ms-auto">
        <div class="btn-group">
          <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">Actions	<span class="visually-hidden">Toggle Dropdown</span>
          </button>
          <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">
            <a class="dropdown-item" href="<?=Url::to(['/currency'])?>"><i class='bx bx-list-ul'></i> All Currencies</a>
            <a class="dropdown-item" href="<?=Url::to(['currency/create'])?>"><i class='bx bx-plus'></i> Add Currency</a>
          </div>
        </div>
      </div>
    </div>
    <!--end breadcrumb-->

    <h6 class="mb-0 text-uppercase">List Of Currencies</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="currency" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>SN</th>
										<th>Symbol</th>
										<th>Name</th>
										<th>Description</th>
                    <th>Actions</th>
									</tr>
								</thead>
								<tbody>
                  <?php
                      $currencies = $model->find()->currencyAll();
                      foreach ($currencies as $key => $currency) {
                        echo '<tr>
            										<td>'.++$key.'</td>
            										<td>'.$currency['symbol'].'</td>
            										<td>'.$currency['name'].'</td>
            										<td>'.$currency['description'].'</td>
                                <td>
                                  <button type="button" class="btn btn-dark px-4 py-1">Edit</button>
                                  <button type="button" class="btn btn-danger px-4 py-1">Delete</button>
                                </td>
            									</tr>';
                      }
                  ?>
								</tbody>
								<tfoot>
									<tr>
                    <th>SN</th>
										<th>Symbol</th>
										<th>Name</th>
										<th>Description</th>
                    <th>Actions</th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>

</div>
