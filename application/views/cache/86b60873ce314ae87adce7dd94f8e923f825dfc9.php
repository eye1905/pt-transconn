<div id="accordion" style="margin-top: -10px;">
  <div id="headingOne" class="text-right">
    <button type="button" class="btn btn-md btn-primary" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
      <i class="fa fa-filter"> </i> Filter
    </button>
  </div>

  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
    <div class="row">
      <?php echo $__env->yieldContent("filter"); ?>
      <input type="hidden" name="_method" value="GET">
    </div>
  </div>
</div><?php /**PATH D:\xampp\htdocs\aplikasi-booking-lsj\application\views/metronic/filter/collapse.blade.php ENDPATH**/ ?>