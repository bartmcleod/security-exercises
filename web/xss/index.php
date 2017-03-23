<?php
$q = $_GET['q'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search</title>
</head>
<body>
<h1>Search</h1>
<form method="get">
    <label for="search-input"><input id="search-input" type="text" name="q"></label>
</form>
<?php if ($q): ?>
    <h2>Search results for "<?= $q ?>"</h2>
<?php endif ?>
</body>
</html>
