<?php $__env->startSection('content'); ?>
<!-- page identificator -->
<ol class="breadcrumb">
    <li><a href="/"><i class="fa fa-dashboard"></i>Home</a></li>
    <?php $segments = ''; ?>
    <?php $__currentLoopData = Request::segments(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $segment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $segments .= '/'.$segment; ?>
        <li>
        <?php if($segment == 'login'): ?>
            <a href="<?php echo e($segments); ?>">Login</a>
            <?php endif; ?>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ol>

<div class="login">
<?php if($errors->any ()): ?>
<ul style="color:red">
<?php echo e(implode ('', $errors->all ('Invalid username or password'))); ?>

</ul>
<?php endif; ?>
<?php echo e(Form::open (array ('url' => 'login/logincheck'))); ?>

<p> <?php echo e(Form::text ('username', '', array ('placeholder'=>'Username','maxlength'=>30))); ?> </p>
<p> <?php echo e(Form::password ('password', array('placeholder'=>'Password','maxlength'=>30))); ?> </p>
<p> <?php echo e(Form::submit ('Login')); ?> </p>
<?php echo e(Form::close ()); ?>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>