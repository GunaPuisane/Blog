<?php $__env->startSection('content'); ?>
<div class="articlePage">
<!-- button: create new article -->
<!-- is aviable only for sign in users -->
<?php if(auth()->user()): ?>
    <button type="button" class="createbtn"> <a href="/articles/createArticle">Create article</a></button>
<?php endif; ?>
<div class="container">
    <div class="row">
        <div class="col-md-8">   
            <div class="list-of-articles">
              
                
    <!-- shows all article in list -->
    <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <article class="post-item">
        <?php if($article->image): ?>
          <div class="post-item-image">
              <a href="post.html">
                 <img src="<?php echo e($post->image); ?> alt="" "> 
              </a>   
          </div>
        <?php endif; ?>  
          <div class="post-item-body">
              <div class="padding-10">
                  <h2><a class="article-title" href="/articles/open"><?php echo e($article->title); ?></a></h2>
                 <!-- Show article in limited length  -->
                  <p class="article-text"> <?php echo e(Str_limit($article->body,1000)); ?></p>        
                 <!-- show article author by username -->
                  <h6>Author: <?php echo e($article->author); ?> <?php echo e($article->created_at->format('M j, Y')); ?></h6>
              </div>    
          </div>         
          <div class="post-meta padding-10 clearfix">   
          </div>    
    </article>  
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   <div class="paginate">
    <?php echo e($articles->links()); ?> 
    </div>         
            </div>    
        </div>   
    </div>    
</div>    

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>