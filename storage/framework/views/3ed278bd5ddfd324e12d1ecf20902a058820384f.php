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

<!-- for photo slides -->
<div class="w3-content w3-display-container">
  <img class="mySlides" src="/images/slide1.jpg">
  <img class="mySlides" src="/images/slide2.jpg">
  <img class="mySlides" src="/images/slide3.jpg">
  <div class="w3-center w3-display-bottommiddle" style="width:100%">

</div>

<!-- for recent articles -->
<?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div class="recentArticles">
  <h1><a class="article-title-home" href="articles/<?php echo e($article->id); ?>"><?php echo e($article->title); ?></a></h2>
  <?php if($article->image): ?>
    <img src="<?php echo e(asset('images/' . $article->image)); ?>" height="100" width="200"/>
   <?php endif; ?>
  <p class="article-text-home"> <?php echo e(Str_limit( $article->body,150 )); ?></p>
    <!-- show read more -->
    <p><a class="btn btn-secondary" href="articles/<?php echo e($article->id); ?>" role="button">Read More »</a></p>
</div> 
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>