<?php
/*
Template Name: CSS тест - Результат
*/
?>

<?php get_header(); ?>

<?php
            
    $answer1 = $_POST['question-1-answers'];
    $answer2 = $_POST['question-2-answers'];
    $answer3 = $_POST['question-3-answers'];
    $answer4 = $_POST['question-4-answers'];
    $answer5 = $_POST['question-5-answers'];
    $answer6 = $_POST['question-6-answers'];
    $answer7 = $_POST['question-7-answers'];
    $answer8 = $_POST['question-8-answers'];
    $answer9 = $_POST['question-9-answers'];
    $answer10 = $_POST['question-10-answers'];

    $totalCorrect = 0;
    
    if ($answer1 == "B") { $totalCorrect++; }
    if ($answer2 == "C") { $totalCorrect++; }
    if ($answer3 == "D") { $totalCorrect++; }
    if ($answer4 == "B") { $totalCorrect++; }
    if ($answer5 == "B") { $totalCorrect++; }
    if ($answer6 == "D") { $totalCorrect++; }
    if ($answer7 == "D") { $totalCorrect++; }
    if ($answer8 == "B") { $totalCorrect++; }
    if ($answer9 == "C") { $totalCorrect++; }
    if ($answer10 == "A") { $totalCorrect++; }
    
?>

<main id="primary" class="bg-white dark:bg-dark-lg">
  <div class="container pt-24 lg:pt-32">
    <h1 class="text-4xl font-black text-gray-800 dark:text-gray-200 text-center mb-12">
      <span class="sketch-underline"><?php the_title(); ?></span>
    </h1>
    <div class="flex flex-col lg:flex-row flex-wrap lg:-mx-4">
      <div class="w-full lg:w-2/3 lg:px-4">
        <div class="flex flex-wrap flex-col mb-6">
          <div class="content">
            <!-- 9-10 -->
            <?php if ($totalCorrect >= 9) {
              $answer_text = __("Да вы мастер по CSS! Вы должны задавать вопросы, а не отвечать на них. Поздравляем!", "web-g");
              $answer_emoji = "😎 ";
            } ?>
            <!-- 6-8 -->
            <?php if ($totalCorrect >= 6 && $totalCorrect < 9) {
              $answer_text = __("Неплохой результат, но вы можете лучше, уверены! Почитайте дополнительную информацию и возвращайтесь.", "web-g");
              $answer_emoji = "🧑‍💻 ";
            } ?>
            <!-- 3-5 -->
            <?php if ($totalCorrect >= 3 && $totalCorrect < 6) {
              $answer_text = __("Так себе результат, давай будем откровенны. Читай, верстай и результат улучшится!", "web-g");
              $answer_emoji = "😐 ";
            } ?>
            <!-- 0-2 -->
            <?php if ($totalCorrect >= 0 && $totalCorrect < 3) {
              $answer_text = __("Это провал, друг. Попробуй подтянуть знания. На сайте есть много полезного материала. Рекомендую.", "web-g");
              $answer_emoji = "😪 ";
            } ?>
            <div class="text-gray-800 dark:text-gray-200 bg-gray-300 dark:bg-dark-md rounded px-6 py-3 mb-6">
              <div class="text-xl font-bold mb-2"><?php _e("Правильных ответов", "web-g"); ?>: <?php echo $totalCorrect; ?>/10</div>
              <div class="mb-4"><?php echo $answer_emoji; echo $answer_text; ?></div>
              <div>
                <a href="https://t.me/css_golovolomki" target="_blank" class="text-indigo-500 border-b-2 border-indigo-500 not-content"><?php _e("У нас есть Telegram канал - подписывайся!", "web-g"); ?></a>
              </div>
            </div>
            <!-- Ответы -->
            <div>
              <!-- question-1 -->           
              <div class="bg-white dark:bg-dark-xl custom-shadow rounded-lg px-2 lg:px-6 py-2 lg:py-4 mb-6">
                <h3>#1. <?php _e("Какое значение установлено по умолчанию для opacity?", "web-g"); ?></h3>  
                <div class="text-gray-700 dark:text-gray-200 opacity-50">
                  <?php if ($answer1 == "A") { echo "❌"; } ?>
                  100
                </div>
                <div class="text-gray-700 dark:text-gray-200">
                  ✅ 1
                </div>
                <div class="text-gray-700 dark:text-gray-200 opacity-50">
                  <?php if ($answer1 == "C") { echo "❌"; } ?>
                  0
                </div>
                <div class="text-gray-700 dark:text-gray-200 opacity-50">
                  <?php if ($answer1 == "D") { echo "❌"; } ?>
                  auto
                </div>
              </div>
              <!-- end question-1 -->

              <!-- question-2 -->           
              <div class="bg-white dark:bg-dark-xl custom-shadow rounded-lg px-2 lg:px-6 py-2 lg:py-4 mb-6">
                <h3>#2. <?php _e("Какого псевдоэлемента не существует в CSS?", "web-g"); ?></h3>  
                <div class="text-gray-700 dark:text-gray-200 opacity-50">
                  <?php if ($answer2 == "A") { echo "❌"; } ?>
                  ::after
                </div>
                <div class="text-gray-700 dark:text-gray-200 opacity-50">
                  <?php if ($answer2 == "B") { echo "❌"; } ?>
                  ::first-letter
                </div>
                <div class="text-gray-700 dark:text-gray-200">
                  ✅ ::last-letter
                </div>
                <div class="text-gray-700 dark:text-gray-200 opacity-50">
                  <?php if ($answer2 == "D") { echo "❌"; } ?>
                  ::selection
                </div>
              </div>
              <!-- end question-2 -->

              <!-- question-3 -->           
              <div class="bg-white dark:bg-dark-xl custom-shadow rounded-lg px-2 lg:px-6 py-2 lg:py-4 mb-6">
                <h3>#3. <?php _e("Как правильно объявить переменную в CSS?", "web-g"); ?></h3>  
                <div class="text-gray-700 dark:text-gray-200 opacity-50">
                  <?php if ($answer3 == "A") { echo "❌"; } ?>
                  $main-color: black;
                </div>
                <div class="text-gray-700 dark:text-gray-200 opacity-50">
                  <?php if ($answer3 == "B") { echo "❌"; } ?>
                  $mainColor: black;
                </div>
                <div class="text-gray-700 dark:text-gray-200 opacity-50">
                  <?php if ($answer3 == "C") { echo "❌"; } ?>
                  @main-color: black;
                </div>
                <div class="text-gray-700 dark:text-gray-200">
                  ✅ --main-color: black;
                </div>
                <div class="text-gray-700 dark:text-gray-200 opacity-50">
                  <?php if ($answer3 == "E") { echo "❌"; } ?>
                  <?php _e("Только с помощью препроцессоров", "web-g"); ?>
                </div>
              </div>
              <!-- end question-3 -->

              <!-- question-4 -->           
              <div class="bg-white dark:bg-dark-xl custom-shadow rounded-lg px-2 lg:px-6 py-2 lg:py-4 mb-6">
                <h3>#4. <?php _e("Если у элемента значение position установлено как static, сработает ли для него z-index?", "web-g"); ?></h3>  
                <div class="text-gray-700 dark:text-gray-200 opacity-50">
                  <?php if ($answer4 == "A") { echo "❌"; } ?>
                  <?php _e("Да", "web-g"); ?>
                </div>
                <div class="text-gray-700 dark:text-gray-200">
                  ✅ <?php _e("Нет", "web-g"); ?>
                </div>
              </div>
              <!-- end question-4 -->

              <!-- question-5 -->           
              <div class="bg-white dark:bg-dark-xl custom-shadow rounded-lg px-2 lg:px-6 py-2 lg:py-4 mb-6">
                <h3>#5. <?php _e("С помощью какого тега можно сделать нумерованный список?", "web-g"); ?></h3>  
                <div class="text-gray-700 dark:text-gray-200 opacity-50">
                  <?php if ($answer5 == "A") { echo "❌"; } ?>
                  ul
                </div>
                <div class="text-gray-700 dark:text-gray-200">
                  ✅ ol
                </div>
                <div class="text-gray-700 dark:text-gray-200 opacity-50">
                  <?php if ($answer5 == "C") { echo "❌"; } ?>
                  dl
                </div>
                <div class="text-gray-700 dark:text-gray-200 opacity-50">
                  <?php if ($answer5 == "D") { echo "❌"; } ?>
                  dd
                </div>
              </div>
              <!-- end question-5 -->

              <!-- question-6 -->           
              <div class="bg-white dark:bg-dark-xl custom-shadow rounded-lg px-2 lg:px-6 py-2 lg:py-4 mb-6">
                <h3>#6. <?php _e("Какой псевдокласс сработает при установке курсора в текстовом поле (input)?", "web-g"); ?></h3>  
                <div class="text-gray-700 dark:text-gray-200 opacity-50">
                  <?php if ($answer6 == "A") { echo "❌"; } ?>
                  :hover
                </div>
                <div class="text-gray-700 dark:text-gray-200 opacity-50">
                  <?php if ($answer6 == "B") { echo "❌"; } ?>
                  :active
                </div>
                <div class="text-gray-700 dark:text-gray-200 opacity-50">
                  <?php if ($answer6 == "C") { echo "❌"; } ?>
                  :not(:active)
                </div>
                <div class="text-gray-700 dark:text-gray-200">
                  ✅ :focus
                </div>
              </div>
              <!-- end question-6 -->

              <!-- question-7 -->           
              <div class="bg-white dark:bg-dark-xl custom-shadow rounded-lg px-2 lg:px-6 py-2 lg:py-4 mb-6">
                <h3>#7. <?php _e("Какой из перечисленных ниже селекторов имеет самый высокий приоритет?", "web-g"); ?></h3>  
                <div class="text-gray-700 dark:text-gray-200 opacity-50">
                  <?php if ($answer7 == "A") { echo "❌"; } ?>
                  #text { color: red; }
                </div>
                <div class="text-gray-700 dark:text-gray-200 opacity-50">
                  <?php if ($answer7 == "B") { echo "❌"; } ?>
                  .text { color: blue; }
                </div>
                <div class="text-gray-700 dark:text-gray-200 opacity-50">
                  <?php if ($answer7 == "C") { echo "❌"; } ?>
                  div#text { color: yellow; }
                </div>
                <div class="text-gray-700 dark:text-gray-200">
                  ✅ div#text { color: black; }
                </div>
              </div>
              <!-- end question-7 -->

              <!-- question-8 -->           
              <div class="bg-white dark:bg-dark-xl custom-shadow rounded-lg px-2 lg:px-6 py-2 lg:py-4 mb-6">
                <h3>#8. <?php _e("Как сделать так, чтобы каждое слово в тексте начиналось с прописной буквы?", "web-g"); ?></h3>  
                <div class="text-gray-700 dark:text-gray-200 opacity-50">
                  <?php if ($answer8 == "A") { echo "❌"; } ?>
                  text-style: capitalize;
                </div>
                <div class="text-gray-700 dark:text-gray-200">
                  ✅ text-transform: capitalize;
                </div>
                <div class="text-gray-700 dark:text-gray-200 opacity-50">
                  <?php if ($answer8 == "C") { echo "❌"; } ?>
                  style: capitalize;
                </div>
                <div class="text-gray-700 dark:text-gray-200 opacity-50">
                  <?php if ($answer8 == "D") { echo "❌"; } ?>
                  transform: capitalize;
                </div>
                <div class="text-gray-700 dark:text-gray-200 opacity-50">
                  <?php if ($answer8 == "E") { echo "❌"; } ?>
                  <?php _e("Это невозможно в CSS", "web-g"); ?>
                </div>
              </div>
              <!-- end question-8 -->

              <!-- question-9 -->           
              <div class="bg-white dark:bg-dark-xl custom-shadow rounded-lg px-2 lg:px-6 py-2 lg:py-4 mb-6">
                <h3>#9. <?php _e("Какова ширина HTML-элемента div без содержания?", "web-g"); ?></h3>  
                <div class="text-gray-700 dark:text-gray-200 opacity-50">
                  <?php if ($answer9 == "A") { echo "❌"; } ?>
                  100px
                </div>
                <div class="text-gray-700 dark:text-gray-200 opacity-50">
                  <?php if ($answer9 == "B") { echo "❌"; } ?>
                  0px
                </div>
                <div class="text-gray-700 dark:text-gray-200">
                  ✅ 100%
                </div>
                <div class="text-gray-700 dark:text-gray-200 opacity-50">
                  <?php if ($answer9 == "D") { echo "❌"; } ?>
                  0%
                </div>
              </div>
              <!-- end question-9 -->

              <!-- question-10 -->           
              <div class="bg-white dark:bg-dark-xl custom-shadow rounded-lg px-2 lg:px-6 py-2 lg:py-4 mb-6">
                <h3>#10. <?php _e("CSS-свойство background-image может содержать несколько изображений.", "web-g"); ?></h3>  
                <div class="text-gray-700 dark:text-gray-200">
                  ✅ <?php _e("Да", "web-g"); ?>
                </div>
                <div class="text-gray-700 dark:text-gray-200 opacity-50">
                  <?php if ($answer10 == "B") { echo "❌"; } ?>
                  <?php _e("Нет", "web-g"); ?>
                </div>
              </div>
              <!-- end question-10 -->

            </div>
            <!-- END Ответы -->
          </div>
        </div>  
      </div>
      <div class="w-full lg:w-1/3 lg:px-4">
        <?php get_template_part('template-parts/sidebar/sidebar-posts'); ?>
      </div>
      
    </div>
  </div>
  
</main><!-- #main -->

<?php get_footer(); ?>
