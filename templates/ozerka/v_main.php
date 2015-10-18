<?php
/**
 * v_main.php - основной шаблон
 * ================
 *  $content - массив, содержащий текущую страницу (таблица page)
 *  Содержит: 
 *  id_page - номер страницы
 *  title - заголовок страницы
 *  text - текст страницы, созданный в редакторе TinyMCE
 *  date - дата последнего изменения/создания страницы
 * 	review - модуль обратная связь (0 выключен, 1 включен)
 *  news - модуль новости (0 выключен, 1 включен)
 *  ghost - модуль гостевая книга (0 выключен, 1 включен)
 *  ================
 *  $settings - массив, содержащий загруженную таблицу settings
 *  Содержит:
 * 	review - модуль обратная связь (0 выключен, 1 включен)
 *  news - модуль новости (0 выключен, 1 включен)
 *  ghost - модуль гостевая книга (0 выключен, 1 включен)
 */
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="templates/ozerka/img/main_logo.ico" type="image/x-icon">
    <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <title><?= $title ?></title>
    <meta name="keywords" content="<?= $settings['keywords'] ?>" />
    <meta name="description" content="<?= $settings['description'] ?>" />
    <link href="templates/<?= $settings['template'] ?>/css/style.css" rel="stylesheet">
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(window).scroll(function () {
                if ($(this).scrollTop() > 100) {
                    $('.scrollup').fadeIn();
                } else {
                    $('.scrollup').fadeOut();
                }
            });
            $('.scrollup').click(function () {
                $("html, body").animate({scrollTop: 0}, 600);
                return false;
            });
        });
    </script>
  </head>
  <body>
    <div class="wrapper">
      <div class="box effect8">
        <header class="header">
          <div class="headNav">
            <a href="index.php?c=view&id=1">главная</a>
            <a href="index.php?c=view&id=2">новости</a>
            <a href="index.php?c=view&id=30">гостевая книга</a>
            <a href='index.php?c=view&id=31' >обратная связь</a>
          </div><!-- #headNav-->	

          <div class="logo"></div><!-- .logo -->		
        </header><!-- .header-->

        <div class="middle">
          <div class="container">
            <main class="content">
              <h1 class="boxTitle"><?= $temp['title'] ?></h1>	
              <?php if ($_GET['id'] == 1): echo "";
              else: ?>
                  <p align="right" style="margin-right: 10px;"><a href="#" onclick='history.back();
                              return false;'>Вернуться</a></p>
              <?php endif; ?>

              <div id="content">
                <?php echo $content; ?>
              </div> 

            </main><!-- .content -->
          </div><!-- .container-->

          <aside class="left-sidebar">
              <?php
              if ($_GET['id'] > 1):
                  ?>
<?php else: echo "";
endif; ?>
            <h1 class="boxTitle">Меню сайта</h1>
            <div id="menuDiv">
              <ul class="me"> 
                      <?php foreach ($pages as $page): ?>
                    <li class=m>
                      <a class=m href="index.php?c=view&id=<?= $page['id_page'] ?>">
                      <?= $page['title'] ?>
                      </a>
<?php endforeach; ?>
              </ul> 
              <script type="text/javascript" src="templates/<?= $settings['template'] ?>/js/script.js"></script> 
            </div><!-- #menuDiv -->
          </aside><!-- .left-sidebar -->
          <!--
          <aside class="right-sidebar">
            <h1 class="boxTitle">Новости</h1>
          </aside><!-- .right-sidebar -->
        </div><!-- .middle-->

      </div><!-- .wrapper -->

      <footer class="footer">
        <p>
          <a href="index.php?c=view&id=30">Задать вопрос в гостевой</a>
          &nbsp;-&nbsp;
          <a href="" onClick="alert('Вопросы отсутствуют.')">Часто задаваемые вопросы</a>
          &nbsp;-&nbsp;
          <a href="index.php?c=view&id=31">Обратная связь</a>
          &nbsp;-&nbsp;
          <a href="/bcms">Администраторский раздел</a>
        </p>  
        <p>Copyright © 2010-2015. Баженов Иван & МОУ "Новоозерновская основная общеобразовательная школа".</p>  
        <p>
          Адрес: 662820, Красноярский край,
          Ермаковский район,
          п. Новоозерное,
          ул. Центральная,10
        </p>
        <p>
          Телефон: (39138) 2-43-71,  E-mail: <a href="mailto: oze@list.ru">oze@list.ru</a>
        </p>
    </div><!-- .effect8 -->
  </footer><!-- .footer -->
  <a href="#" class="scrollup">Наверх</a>
</body>
</html>
