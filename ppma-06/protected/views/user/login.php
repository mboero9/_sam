<?php /* @var LoginForm $model */ ?>

<?php $form = $this->beginWidget('ActiveForm', array(
    'id'    => 'login-form',
    'focus' => array($model, 'username'),
    'htmlOptions' => array('class' => 'custom'),
)); ?>

    <?php echo $form->labelEx($model, 'username'); ?>
    <?php echo $form->textField($model, 'username'); ?>
    <?php echo $form->error($model, 'username'); ?>

    <?php echo $form->labelEx($model, 'password'); ?>

    <div class="row collapse">
        <div class="ten columns">
            <?php echo $form->passwordField($model, 'password'); ?>
        </div>
        <div class="two columns">
            <a class="postfix button secondary expand"><i class="foundicon-right-arrow"></i></a>
        </div>
    </div>
    <?php echo $form->error($model, 'password'); ?>

    <label for="<?php echo CHtml::activeId($model, 'rememberMe') ?>">
        <?php echo $form->checkBox($model, 'rememberMe', array('class' => 'hide')); ?>
        <span class="custom checkbox <?php echo ($model->rememberMe ? 'checked' : '') ?>"></span> Guardar contraseña
    </label>
<img src="css/Microempresas1.png" align="right" alt="W3C_validator" title"imagen Prome">
<?php $this->endWidget(); ?>
