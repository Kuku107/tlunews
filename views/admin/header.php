<?php
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'];
    $request_uri = $_SERVER['REQUEST_URI'];
    $base_url = $protocol . '://' . $host . "/tlunews";
?>

<header class="p-3 text-bg-dark">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <i class="bi bi-bootstrap fs-1"></i>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="<?php echo $base_url; ?>/controllers/AdminController.php?view=dashboard" class="nav-link px-2 text-secondary">Dashboard</a></li>
                <li><a href="<?php echo $base_url; ?>/controllers/AdminController.php?view=index" class="nav-link px-2 text-white">News</a></li>
            </ul>
            <div class="text-end">
                <a href="<?php echo $base_url; ?>/controllers/AdminController.php?action=logout">
                    <button type="button" class="btn btn-outline-light me-2">Logout</button>
                </a>
            </div>
        </div>
    </div>
</header>