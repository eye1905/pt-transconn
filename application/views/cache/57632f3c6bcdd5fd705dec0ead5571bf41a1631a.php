<div class="d-flex justify-content-between align-items-center flex-wrap">
    <div class="d-flex align-items-center py-3">
        <label>Tampilkan Data : </label>
        <select class="form-control form-control-sm font-weight-bold mr-4 border-0 bg-light" id="select" name="select" style="margin-left: 10px; width: 75px;">
            <option value="50">50</option>
            <option value="100">100</option>
            <option value="500">500</option>
            <option value="1000">1000</option>
        </select>
    </div>
    
    <nav aria-label="Page navigation example">
        <?php echo get_instance()->pagination->create_links()  ?>
    </nav>
</div><?php /**PATH D:\xampp\htdocs\aplikasi-booking-lsj\application\views/metronic/pagination.blade.php ENDPATH**/ ?>