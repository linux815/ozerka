<?php
/**
 * v_main.php — основной пользовательский шаблон
 *
 * @var string $title
 * @var array $settings — настройки сайта
 * @var array $pages — все страницы
 * @var string $content — контент страницы
 * @var array $temp — данные текущей страницы
 */
$currentId = $_GET['id'] ?? 1;
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8"/>
    <title><?= htmlspecialchars($title) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="keywords" content="<?= htmlspecialchars($settings['keywords']) ?>"/>
    <meta name="description" content="<?= htmlspecialchars($settings['description']) ?>"/>
    <link rel="shortcut icon" href="templates/<?= htmlspecialchars($settings['template']) ?>/img/main_logo.ico"
          type="image/x-icon"/>

    <?= $viteAssets->css('css/main.css') ?>
    <script type="module" src="<?= htmlspecialchars($viteAssets->asset('js/main.js'), ENT_QUOTES, 'UTF-8') ?>"></script>
    <?= $viteAssets->css('css/custom.css') ?>
</head>
<body>

<div class="main-wrapper">

    <!-- Навигация -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm">
        <div class="container justify-content-center">
            <div class="collapse navbar-collapse justify-content-between">
                <ul class="navbar-nav mx-auto">
                    <?php
                    $excludePageIds = [];
                    if (empty($settings['news'])) $excludePageIds[] = 2;
                    if (empty($settings['ghost'])) $excludePageIds[] = 30;
                    if (empty($settings['review'])) $excludePageIds[] = 31;

                    foreach ($pages as $page) {
                        if (in_array((int)$page['id_page'], $excludePageIds, true)) {
                            continue;
                        }

                        $idPage = (int)$page['id_page'];
                        $title = htmlspecialchars($page['title']);

                        if (!in_array($idPage, [1, 2, 3, 30, 31], false)) {
                            continue;
                        }

                        $active = ($currentId == $idPage) ? 'active' : '';
                        echo "<li class='nav-item'><a class='nav-link $active' href='index.php?c=view&id=$idPage'>$title</a></li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Логотип -->
    <div class="logo text-center py-10">
        <img src="assets/img/logo.jpg" alt="Логотип сайта"/>
    </div>

    <!-- Контент и меню сайта -->
    <div class="container px-4">
        <div class="row">
            <!-- Меню сайта -->
            <aside class="col-md-3 mb-4">
                <div class="sidebar-menu">
                    <h5 class="mb-3">📂 Меню сайта</h5>
                    <ul class="list-unstyled mb-0">
                        <?php
                        foreach ($pages as $page):
                            $idPage = (int)$page['id_page'];
                            if (in_array($idPage, $excludePageIds, true)) continue;

                            $active = ($currentId == $idPage) ? 'active' : '';
                            ?>
                            <li>
                                <a class="<?= $active ?>"
                                   href="index.php?c=view&id=<?= $idPage ?>">
                                    <?= htmlspecialchars($page['title']) ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </aside>

            <!-- Основной контент -->
            <main class="col-md-9">
                <div class="content-box">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php?c=view&id=1">Главная</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?= htmlspecialchars($temp['title']) ?></li>
                        </ol>
                    </nav>

                    <?php if ((int)$currentId !== 1): ?>
                        <p class="text-end mb-3">
                            <a href="#" onclick="history.back(); return false;">Вернуться</a>
                        </p>
                    <?php endif; ?>

                    <div id="content"><?= $content ?></div>
                </div>
            </main>
        </div>
    </div>

    <!-- Футер: сохранённый старый -->
    <footer class="footer mt-5 py-4 bg-light text-center small border-top">
        <p>
            <a href="index.php?c=view&id=30">Задать вопрос в гостевой</a>
            &nbsp;-&nbsp;
            <a href="#" onclick="alert('Вопросы отсутствуют.')">Часто задаваемые вопросы</a>
            &nbsp;-&nbsp;
            <a href="index.php?c=view&id=31">Обратная связь</a>
            &nbsp;-&nbsp;
            <a href="/bcms">Администраторский раздел</a>
        </p>
        <p>Copyright © 2010–<?= date('Y') ?>. Баженов Иван & МОУ "Новоозерновская основная общеобразовательная школа".</p>
        <p>
            Адрес: 662820, Красноярский край,
            Ермаковский район,
            п. Новоозерное,
            ул. Центральная,10
        </p>
        <p>
            Телефон: (39138) 2-43-71, E-mail: <a href="mailto:oze@list.ru">oze@list.ru</a>
        </p>
    </footer>

</div>

<!-- Кнопка наверх -->
<div class="scrollup" onclick="window.scrollTo({top: 0, behavior: 'smooth'});" title="Наверх" role="button"
     aria-label="Наверх"></div>

</body>
</html>