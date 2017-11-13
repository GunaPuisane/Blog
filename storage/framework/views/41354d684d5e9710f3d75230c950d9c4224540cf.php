<?php $__env->startSection('content'); ?>
<div class="openArticle">
<!-- button: delete edit-->
<div class="editdelete">
    <button type="button" >Delete</button>
    <button type="button" >Edit</button>
    </div>
    <!-- open article title -->
    <p class="article-title"><?php echo e($article->title); ?></p>
    <h6 class="author">Author: <?php echo e($article->author); ?></h6>
   <article class="article-text"> <?php echo e($article->body); ?></article>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>