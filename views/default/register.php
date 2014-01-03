<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var amnah\yii2\user\models\User $user
 * @var amnah\yii2\user\models\User $profile
 * @var string $userDisplayName
 */
$this->title = 'Register';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-register">
	<h1><?= Html::encode($this->title) ?></h1>

    <?php if ($userDisplayName = Yii::$app->session->getFlash("Register-success")): ?>

        <div class="alert alert-success">
            <p>Successfully registered [ <?= $userDisplayName ?> ]</p>

            <?php if (Yii::$app->user->isGuest): ?>

                <p>Please check your email to confirm your account</p>

            <?php endif; ?>
        </div>

    <?php else: ?>

        <p>Please fill out the following fields to register:</p>

        <?php $form = ActiveForm::begin([
            'id' => 'register-form',
            'options' => ['class' => 'form-horizontal'],
            'fieldConfig' => [
                'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-7\">{error}</div>",
                'labelOptions' => ['class' => 'col-lg-2 control-label'],
            ],
            'enableAjaxValidation' => true,
        ]); ?>

        <?php if (\Yii::$app->getModule("user")->requireEmail): ?>
            <?= $form->field($user, 'email') ?>
        <?php endif; ?>

        <?php if (\Yii::$app->getModule("user")->requireUsername): ?>
            <?= $form->field($user, 'username') ?>
        <?php endif; ?>

        <?= $form->field($user, 'newPassword')->passwordInput() ?>

        <?php /* uncomment if you want to add profile fields here
        <?= $form->field($profile, 'full_name') ?>
        */ ?>

        <div class="form-group">
            <div class="col-lg-offset-2 col-lg-10">
                <?= Html::submitButton('Register', ['class' => 'btn btn-primary']) ?>

                or <?= Html::a("Login", ["/user/login"]) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

    <?php endif; ?>

</div>
