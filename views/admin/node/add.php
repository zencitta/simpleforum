<?php
/**
 * @link http://www.simpleforum.org/
 * @copyright Copyright (c) 2015 Simple Forum
 * @author Jiandong Yu admin@simpleforum.org
 */

use yii\helpers\Html;

$this->title = '创建新节点';
?>

<div class="row">
<!-- sf-left start -->
<div class="col-md-8 sf-left">

<div class="box">
	<div class="cell">
		<?php
			echo Html::a('论坛管理', ['admin/setting/all']), '&nbsp;/&nbsp;', Html::a('节点管理', ['index']), '&nbsp;/&nbsp;', $this->title;
		?>
	</div>
	<div class="cell">
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>
	</div>
</div>

</div>
<!-- sf-left end -->

<!-- sf-right start -->
<div class="col-md-4 sf-right">
<?= $this->render('@app/views/common/_admin-right') ?>
</div>
<!-- sf-right end -->

</div>
