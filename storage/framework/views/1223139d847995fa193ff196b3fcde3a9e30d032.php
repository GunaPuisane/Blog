<?php $__env->startSection('content'); ?>
<div class="openArticle">
<!-- button: delete edit-->
<div class="editdelete">
    <button type="button" >Delete</button>
    <button type="button" >Edit</button>
    </div>
    <!-- open article title -->
     
    <h6><?php echo e($article->title); ?></h6>
   <article> <?php echo e($article->body); ?></article>


    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>