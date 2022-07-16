<?php
$req_url = Request::url();
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="#">UnitConverter</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?php if (str_contains($req_url, 'home') == 1) {
                        echo 'active';
                    } ?>" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if (str_contains($req_url, 'unit') == 1) {
                        echo 'active';
                    } ?>" href="<?php echo e(URL::to('/units_table')); ?>">Units</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if (str_contains($req_url, 'product') == 1) {
                        echo 'active';
                    } ?>" href="<?php echo e(URL::to('/products_table')); ?>">Products</a>
                </li>
            </ul>
            <span class="navbar-text">
                a simple unit converter website
            </span>
        </div>
    </div>
</nav>
<?php /**PATH C:\xampp\htdocs\UnitConverter\resources\views/layouts/parts/navbar.blade.php ENDPATH**/ ?>