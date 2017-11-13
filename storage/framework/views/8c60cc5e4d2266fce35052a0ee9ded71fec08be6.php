<?php $__env->startSection('content'); ?>
<!-- page identificator -->
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
    <?php $segments = ''; ?>
    <?php $__currentLoopData = Request::segments(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $segment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $segments .= '/'.$segment; ?>
        <li>
            <a href="<?php echo e($segments); ?>"><?php echo e($segment); ?></a>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ol>
 
<div class = "row">
    <div class="col-md-8 col-md-offset-2">
        <h4 class="title">Create New Article </h4>
            <?php echo e(Form::open (array ('url' => '/articles/done', 'files' =>true))); ?>

            <p class = "create-article-title">Write a title: </p>
            <p><?php echo e(Form::text('title')); ?> </p>
            <div class="create-article">
            <p class = "create-article-title">Text: </p>
                <?php echo e(Form::textarea('body')); ?>

                </div>
                <div class="article-file">
                <p class = "create-article-title">Upload photo: </p>
                <?php echo Form::file('image'); ?>

                </div>
                
            <p class="donebtn"> <?php echo e(Form::submit ('Done')); ?> </p>
            <?php echo e(Form::close ()); ?>

    </div>  
</div>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>