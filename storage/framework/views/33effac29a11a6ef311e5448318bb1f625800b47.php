
<html class="page">
    <head>
        <?php echo $__env->make('include.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </head>
    <header class="header"> 
        <!-- include HTML and CSS files -->  
        <?php echo $__env->make('include.loadingPage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('include.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
 
    </header>

    <body  class="content">
        <!-- content of page -->
        <?php echo $__env->yieldContent('content'); ?>
 
  
    <footer>
         <?php echo $__env->make('include.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>    
    </footer>

    </body>
</html>

