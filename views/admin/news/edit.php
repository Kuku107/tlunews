<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit news</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<?php
    session_start();
    if (!isset($_SESSION['user_id']) || (isset($_SESSION["role"]) && $_SESSION['role'] != 1)) {
        header ("Location: login.php");
        exit();
    }

    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'];
    $request_uri = $_SERVER['REQUEST_URI'];
    $base_url = $protocol . '://' . $host . "/tlunews";
?>

<div class="container mt-5">
    <form action="../../../controllers/NewsController.php?action=edit" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $news["id"]?>">
        <div data-mdb-input-init class="form-outline mb-4">
            <label class="form-label" for="form6Example1">Tiêu đề</label>
            <input name="title" type="text" id="form6Example1" class="form-control"
                   value="<?= htmlspecialchars($news["title"])?>"/>
        </div>

        <div data-mdb-input-init class="form-outline mb-4">
            <label class="form-label" for="form6Example1">Danh mục</label>
            <select name="category" class="form-select" aria-label="Default select example">
                <?php foreach ($categoriesList as $category) { ?>
                    <option
                        <?php if ($category_name === $category["name"]) echo "selected";?>
                        value="<?= $category["name"]?>"><?= $category["name"]?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label" for="anh">Ảnh: </label>
            <div class="mb-3">
                <img src="<?= $base_url . "/" . $news["image"]?>" id="anhEl" alt="Image" style="max-width: 100px; height: auto;">
            </div>
            <input type="hidden" name="anh-notset" value="<?= $news["image"]?>">
            <input class="form-control" type="file" name="anh" id="anh">
        </div>

        <!-- Message input -->
        <div data-mdb-input-init class="form-outline mb-4">
            <label class="form-label" for="form6Example7">Nội dung</label>
            <textarea name="content" class="form-control" id="form6Example7" rows="4"><?= $news["content"]?></textarea>
        </div>

        <!-- Submit button -->
        <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">
            Sửa bài viết
        </button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
    let imgElement = document.getElementById("anhEl");
    let imgInput = document.getElementById("anh");

    imgInput.addEventListener("change", (event) => {
        let file = event.target.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function(e) {
                imgElement.src = e.target.result;
                imgElement.style.display = "block";
            };
            reader.readAsDataURL(file);
        }
    });
</script>
</body>
</html>