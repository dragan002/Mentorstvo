<?php
$menu = [
    'Home' => 'index.php',
    'About' => 'about.php',
    'Services' => [
        'Web Development' => 'web.php',
        'Design' => 'design.php',
        'SEO' => 'seo.php'
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Domaci</title>
</head>
<body>
    <header>
        <nav>
            <?php foreach ($menu as $nav => $urlOrSubmenu) : ?>
                <li>
                    <?php if (is_array($urlOrSubmenu)) : ?>
                        <a href="#"><?= $nav; ?></a>
                        <ul>
                            <?php foreach ($urlOrSubmenu as $subNav => $subUrl) : ?>
                                <li><a href="<?= $subUrl; ?>"><?= $subNav; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else : ?>
                        <a href="<?= $urlOrSubmenu; ?>"><?= $nav; ?></a>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </nav>        
    </header>
</body>
</html>
