<?php
/**
 * @link http://www.simpleforum.org/
 * @copyright Copyright (c) 2015 Simple Forum
 * @author Jiandong Yu admin@simpleforum.org
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

extract($check->result);

$this->title = '环境检测';
?>

<div class="row">
<!-- sf-left start -->
<div class="col-md-8 sf-left">
	<div class="box">
		<div class="inner">
			<?= Html::a('极简论坛安装', ['install/install']), '&nbsp;/&nbsp;', $this->title ?>
		</div>
		<div class="cell bg-info" id="activate"><strong>服务器环境</strong></div>
		<div class="cell">
        	<p><?php echo $check->getServerInfo() . ' ' . $check->getNowDate() ?></p>
		</div>
		<div class="cell bg-info" id="activate"><strong>检测结果</strong></div>
		<div class="cell">
	        <?php if ($summary['errors'] > 0): ?>
	            <div class="alert alert-danger">
	                <strong>您的网站空间不符合要求，具体查看下面的列表</strong>
	            </div>
	        <?php elseif ($summary['warnings'] > 0): ?>
	            <div class="alert alert-info">
	                <strong>您的网站空间符合最基本的要求，请确认下面列表中的警告项目</strong>
	            </div>
	        <?php else: ?>
	            <div class="alert alert-success">
	                <strong>恭喜，您的网站空间符合要求。</strong>
	            </div>
	        <?php endif; ?>
	        <?php
				if ($summary['errors'] == 0) {
					Yii::$app->getSession()->set('install-step', 1);
					echo Html::a('下一步：数据库设置', ['db-setting'], ['class'=>'btn btn-primary']);
				}
	        ?>
		</div>
		<div class="cell bg-info" id="activate"><strong>详情</strong></div>
		<div class="cell">
	        <table class="table table-bordered">
	            <tr><th>条件</th><th>结果</th><th>备注</th></tr>
	            <?php foreach ($requirements as $requirement): ?>
	            <tr class="<?php echo $requirement['condition'] ? 'success' : ($requirement['mandatory'] ? 'danger' : 'warning') ?>">
	                <td>
	                <?php echo $requirement['name'] ?>
	                </td>
	                <td>
	                <span class="result"><?php echo $requirement['condition'] ? '通过' : ($requirement['mandatory'] ? '失败' : '警告') ?></span>
	                </td>
	                <td>
	                <?php echo $requirement['memo'] ?>
	                </td>
	            </tr>
	            <?php endforeach; ?>
	        </table>
		</div>
	</div>
</div>
<!-- sf-left end -->

</div>
