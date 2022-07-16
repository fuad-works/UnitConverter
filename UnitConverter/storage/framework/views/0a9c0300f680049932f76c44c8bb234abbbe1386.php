<?php
$req_url = Request::url();
?>
<div class="d-flex bg-white border border-primary rounded flex-column flex-shrink-0 p-3 bg-light">

    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <i class="fas fa-link ml-2"></i> &nbsp;
        <span class="fs-4">Sidebar</span>
    </a>


    <hr>

    <nav class="d-grid gap-2">

        <a href="<?php echo e(URL::to('/home')); ?>"
            class="btn <?php if (str_contains($req_url, 'home') == 1) {
                echo 'bg-primary text-white';
            } ?> btn-hover-light rounded-2 d-flex align-items-center gap-3 py-2 px-3 lh-sm text-start">
            <i class="fas fa-home ml-2"></i> &nbsp;
            <div>
                <strong class="d-block">Home</strong>
                <small>Start home page</small>
            </div>
        </a>

        <a href="<?php echo e(URL::to('/units_table')); ?>"
            class="btn <?php if (str_contains($req_url, 'unit') == 1) {
                echo 'bg-primary text-white';
            } ?> btn-hover-light rounded-2 d-flex align-items-center gap-3 py-2 px-3 lh-sm text-start">
            <i class="fas fa-cubes ml-2"></i> &nbsp;
            <div>
                <strong class="d-block">Units</strong>
                <small>Manage Units</small>
            </div>
        </a>

        <a href="<?php echo e(URL::to('/products_table')); ?>"
            class="btn <?php if (str_contains($req_url, 'product') == 1) {
                echo 'bg-primary text-white';
            } ?> btn-hover-light rounded-2 d-flex align-items-center gap-3 py-2 px-3 lh-sm text-start">
            <i class="fas fa-box-open ml-2"></i> &nbsp;
            <div>
                <strong class="d-block">Products</strong>
                <small>Manage Products</small>
            </div>
        </a>

    </nav>



    <hr>

    <div class="dropdown">
        <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle"
            id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="<?php echo e(asset('assets/images/user.png')); ?>" alt="" class="rounded-circle me-2" width="32"
                height="32">
            <strong>User Name</strong>
        </a>
        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2" style="">
            <li><a class="dropdown-item" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Sign out</a></li>
        </ul>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\UnitConverter\resources\views/layouts/parts/sidebar.blade.php ENDPATH**/ ?>