<?php $__env->startSection('content'); ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <img src="<?php echo e(asset('images/promotion_03.jpg')); ?>" alt="" class="img-fluid" width=100%  > 
            </div>                    
        </div>
                

        <div class="row" style="margin-top:20px;">
            <div class="col-sm-4" style="text-align: center;">
                <img src="<?php echo e(asset('images/samsungPhone.jpg')); ?>" width=50% alt="" class="img-fluid" > 
                <p>SAMSUNG</p>
            </div>
             <div class="col-sm-4" style="text-align: center">
                <img src="<?php echo e(asset('images/xiaomiPhone.jpg')); ?>" width=50% alt="" class="img-fluid"> 
                <p>XIAOMI</p>           
            </div>
            <div class="col-sm-4" style="text-align: center" >
                <img src="<?php echo e(asset('images/vivoPhone.jpg')); ?>" width=50% alt="" class="img-fluid" > 
                <p>VIVO</p>
            </div>                
        </div>
            
    </div>

    <div class="container-fluid">
        <div class="copyright text-center">
            &copy; Copyright <strong>ABC company</strong>. All Rights Reserved
        </div>
        <div class="credits text-center">
            Designed by <a href="https://ABC.com/">ABC Company</a>
        </div>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\MercuryMail\htdocs\2\Laravel-shopping-cart1\resources\views/welcome.blade.php ENDPATH**/ ?>