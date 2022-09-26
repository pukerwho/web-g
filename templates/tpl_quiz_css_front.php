<?php
/*
Template Name: CSS тест
*/
?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<main id="primary" class="bg-white dark:bg-dark-lg">
  <div class="container pt-24 lg:pt-32">
    <h1 class="text-4xl font-black text-gray-800 dark:text-gray-200 text-center mb-12">
      <span class="sketch-underline"><?php the_title(); ?></span>
    </h1>
    <div class="flex flex-col lg:flex-row flex-wrap lg:-mx-4">
      <div class="w-full lg:w-2/3 lg:px-4">
        <div class="flex flex-wrap flex-col mb-6">
          <div class="content mb-10">
            <?php the_content(); ?>
          </div>
          <div class="content">
            <form action="/css-quiz-results" method="POST" id="quiz"> 
              <!-- question-1 -->           
              <div class="bg-white dark:bg-dark-xl custom-shadow rounded-lg px-2 lg:px-6 py-2 lg:py-4 mb-6">
                <h3>#1. <?php _e("Какое значение установлено по умолчанию для opacity?", "web-g"); ?></h3>  
                <div class="text-gray-700 dark:text-gray-200">
                  <input type="radio" name="question-1-answers" id="question-1-answers-A" value="A" />
                  <label for="question-1-answers-A">100</label>
                </div>
                <div class="text-gray-700 dark:text-gray-200">
                  <input type="radio" name="question-1-answers" id="question-1-answers-B" value="B" />
                  <label for="question-1-answers-B">1</label>
                </div>
                <div class="text-gray-700 dark:text-gray-200">
                  <input type="radio" name="question-1-answers" id="question-1-answers-C" value="C" />
                  <label for="question-1-answers-C">0</label>
                </div>
                <div class="text-gray-700 dark:text-gray-200">
                  <input type="radio" name="question-1-answers" id="question-1-answers-D" value="D" />
                  <label for="question-1-answers-D">auto</label>
                </div>
              </div>
              <!-- end question-1 -->

              <!-- question-2 -->           
              <div class="bg-white dark:bg-dark-xl custom-shadow rounded-lg px-2 lg:px-6 py-2 lg:py-4 mb-6">
                <h3>#2. <?php _e("Какого псевдоэлемента не существует в CSS?", "web-g"); ?></h3>  
                <div class="text-gray-700 dark:text-gray-200">
                  <input type="radio" name="question-2-answers" id="question-2-answers-A" value="A" />
                  <label for="question-2-answers-A">::after </label>
                </div>
                <div class="text-gray-700 dark:text-gray-200">
                  <input type="radio" name="question-2-answers" id="question-2-answers-B" value="B" />
                  <label for="question-2-answers-B">::first-letter</label>
                </div>
                <div class="text-gray-700 dark:text-gray-200">
                  <input type="radio" name="question-2-answers" id="question-2-answers-C" value="C" />
                  <label for="question-2-answers-C">::last-letter</label>
                </div>
                <div class="text-gray-700 dark:text-gray-200">
                  <input type="radio" name="question-2-answers" id="question-2-answers-D" value="D" />
                  <label for="question-2-answers-D">::selection</label>
                </div>
              </div>
              <!-- end question-2 -->

              <!-- question-3 -->           
              <div class="bg-white dark:bg-dark-xl custom-shadow rounded-lg px-2 lg:px-6 py-2 lg:py-4 mb-6">
                <h3>#3. <?php _e("Как правильно объявить переменную в CSS?", "web-g"); ?></h3>  
                <div class="text-gray-700 dark:text-gray-200">
                  <input type="radio" name="question-3-answers" id="question-3-answers-A" value="A" />
                  <label for="question-3-answers-A">$main-color: black;</label>
                </div>
                <div class="text-gray-700 dark:text-gray-200">
                  <input type="radio" name="question-3-answers" id="question-3-answers-B" value="B" />
                  <label for="question-3-answers-B">$mainColor: black;</label>
                </div>
                <div class="text-gray-700 dark:text-gray-200">
                  <input type="radio" name="question-3-answers" id="question-3-answers-C" value="C" />
                  <label for="question-3-answers-C">@main-color: black;</label>
                </div>
                <div class="text-gray-700 dark:text-gray-200">
                  <input type="radio" name="question-3-answers" id="question-3-answers-D" value="D" />
                  <label for="question-3-answers-D">--main-color: black;</label>
                </div>
                <div class="text-gray-700 dark:text-gray-200">
                  <input type="radio" name="question-3-answers" id="question-3-answers-E" value="E" />
                  <label for="question-3-answers-E"><?php _e("Только с помощью препроцессоров", "web-g"); ?></label>
                </div>
              </div>
              <!-- end question-3 -->

              <!-- question-4 -->           
              <div class="bg-white dark:bg-dark-xl custom-shadow rounded-lg px-2 lg:px-6 py-2 lg:py-4 mb-6">
                <h3>#4. <?php _e("Если у элемента значение position установлено как static, сработает ли для него z-index?", "web-g"); ?></h3>  
                <div class="text-gray-700 dark:text-gray-200">
                  <input type="radio" name="question-4-answers" id="question-4-answers-A" value="A" />
                  <label for="question-4-answers-A"><?php _e("Да", "web-g"); ?></label>
                </div>
                <div class="text-gray-700 dark:text-gray-200">
                  <input type="radio" name="question-4-answers" id="question-4-answers-B" value="B" />
                  <label for="question-4-answers-B"><?php _e("Нет", "web-g"); ?></label>
                </div>
              </div>
              <!-- end question-4 -->

              <!-- question-5 -->           
              <div class="bg-white dark:bg-dark-xl custom-shadow rounded-lg px-2 lg:px-6 py-2 lg:py-4 mb-6">
                <h3>#5. <?php _e("С помощью какого тега можно сделать нумерованный список?", "web-g"); ?></h3>  
                <div class="text-gray-700 dark:text-gray-200">
                  <input type="radio" name="question-5-answers" id="question-5-answers-A" value="A" />
                  <label for="question-5-answers-A">ul</label>
                </div>
                <div class="text-gray-700 dark:text-gray-200">
                  <input type="radio" name="question-5-answers" id="question-5-answers-B" value="B" />
                  <label for="question-5-answers-B">ol</label>
                </div>
                <div class="text-gray-700 dark:text-gray-200">
                  <input type="radio" name="question-5-answers" id="question-5-answers-C" value="C" />
                  <label for="question-5-answers-C">dl</label>
                </div>
                <div class="text-gray-700 dark:text-gray-200">
                  <input type="radio" name="question-5-answers" id="question-5-answers-D" value="D" />
                  <label for="question-5-answers-D">dd</label>
                </div>
              </div>
              <!-- end question-5 -->

              <!-- question-6 -->           
              <div class="bg-white dark:bg-dark-xl custom-shadow rounded-lg px-2 lg:px-6 py-2 lg:py-4 mb-6">
                <h3>#6. <?php _e("Какой псевдокласс сработает при установке курсора в текстовом поле (input)?", "web-g"); ?></h3>  
                <div class="text-gray-700 dark:text-gray-200">
                  <input type="radio" name="question-6-answers" id="question-6-answers-A" value="A" />
                  <label for="question-6-answers-A">:hover</label>
                </div>
                <div class="text-gray-700 dark:text-gray-200">
                  <input type="radio" name="question-6-answers" id="question-6-answers-B" value="B" />
                  <label for="question-6-answers-B">:active</label>
                </div>
                <div class="text-gray-700 dark:text-gray-200">
                  <input type="radio" name="question-6-answers" id="question-6-answers-C" value="C" />
                  <label for="question-6-answers-C">:not(:active)</label>
                </div>
                <div class="text-gray-700 dark:text-gray-200">
                  <input type="radio" name="question-6-answers" id="question-6-answers-D" value="D" />
                  <label for="question-6-answers-D">:focus</label>
                </div>
              </div>
              <!-- end question-6 -->

              <!-- question-7 -->           
              <div class="bg-white dark:bg-dark-xl custom-shadow rounded-lg px-2 lg:px-6 py-2 lg:py-4 mb-6">
                <h3>#7. <?php _e("Какой из перечисленных ниже селекторов имеет самый высокий приоритет?", "web-g"); ?></h3>  
                <div class="text-gray-700 dark:text-gray-200">
                  <input type="radio" name="question-7-answers" id="question-7-answers-A" value="A" />
                  <label for="question-7-answers-A">#text { color: red; }</label>
                </div>
                <div class="text-gray-700 dark:text-gray-200">
                  <input type="radio" name="question-7-answers" id="question-7-answers-B" value="B" />
                  <label for="question-7-answers-B">.text { color: blue; }</label>
                </div>
                <div class="text-gray-700 dark:text-gray-200">
                  <input type="radio" name="question-7-answers" id="question-7-answers-C" value="C" />
                  <label for="question-7-answers-C">div#text { color: yellow; }</label>
                </div>
                <div class="text-gray-700 dark:text-gray-200">
                  <input type="radio" name="question-7-answers" id="question-7-answers-D" value="D" />
                  <label for="question-7-answers-D">div#text { color: black; }</label>
                </div>
              </div>
              <!-- end question-7 -->

              <!-- question-8 -->           
              <div class="bg-white dark:bg-dark-xl custom-shadow rounded-lg px-2 lg:px-6 py-2 lg:py-4 mb-6">
                <h3>#8. <?php _e("Как сделать так, чтобы каждое слово в тексте начиналось с прописной буквы?", "web-g"); ?></h3>  
                <div class="text-gray-700 dark:text-gray-200">
                  <input type="radio" name="question-8-answers" id="question-8-answers-A" value="A" />
                  <label for="question-8-answers-A">text-style: capitalize;</label>
                </div>
                <div class="text-gray-700 dark:text-gray-200">
                  <input type="radio" name="question-8-answers" id="question-8-answers-B" value="B" />
                  <label for="question-8-answers-B">text-transform: capitalize;</label>
                </div>
                <div class="text-gray-700 dark:text-gray-200">
                  <input type="radio" name="question-8-answers" id="question-8-answers-C" value="C" />
                  <label for="question-8-answers-C">style: capitalize;</label>
                </div>
                <div class="text-gray-700 dark:text-gray-200">
                  <input type="radio" name="question-8-answers" id="question-8-answers-D" value="D" />
                  <label for="question-8-answers-D">transform: capitalize;</label>
                </div>
                <div class="text-gray-700 dark:text-gray-200">
                  <input type="radio" name="question-8-answers" id="question-8-answers-E" value="E" />
                  <label for="question-8-answers-E"><?php _e("Это невозможно в CSS", "web-g"); ?></label>
                </div>
              </div>
              <!-- end question-8 -->

              <!-- question-9 -->           
              <div class="bg-white dark:bg-dark-xl custom-shadow rounded-lg px-2 lg:px-6 py-2 lg:py-4 mb-6">
                <h3>#9. <?php _e("Какова ширина HTML-элемента div без содержания?", "web-g"); ?></h3>  
                <div class="text-gray-700 dark:text-gray-200">
                  <input type="radio" name="question-9-answers" id="question-9-answers-A" value="A" />
                  <label for="question-9-answers-A">100px</label>
                </div>
                <div class="text-gray-700 dark:text-gray-200">
                  <input type="radio" name="question-9-answers" id="question-9-answers-B" value="B" />
                  <label for="question-9-answers-B">0px</label>
                </div>
                <div class="text-gray-700 dark:text-gray-200">
                  <input type="radio" name="question-9-answers" id="question-9-answers-C" value="C" />
                  <label for="question-9-answers-C">100%</label>
                </div>
                <div class="text-gray-700 dark:text-gray-200">
                  <input type="radio" name="question-9-answers" id="question-9-answers-D" value="D" />
                  <label for="question-9-answers-D">0%</label>
                </div>
              </div>
              <!-- end question-9 -->

              <!-- question-10 -->           
              <div class="bg-white dark:bg-dark-xl custom-shadow rounded-lg px-2 lg:px-6 py-2 lg:py-4 mb-6">
                <h3>#10. <?php _e("CSS-свойство background-image может содержать несколько изображений.", "web-g"); ?></h3>  
                <div class="text-gray-700 dark:text-gray-200">
                  <input type="radio" name="question-10-answers" id="question-10-answers-A" value="A" />
                  <label for="question-10-answers-A"><?php _e("Да", "web-g"); ?></label>
                </div>
                <div class="text-gray-700 dark:text-gray-200">
                  <input type="radio" name="question-10-answers" id="question-10-answers-B" value="B" />
                  <label for="question-10-answers-B"><?php _e("Нет", "web-g"); ?></label>
                </div>
              </div>
              <!-- end question-10 -->

              <input type="submit" value="<?php _e("Результати", "web-g"); ?>" class="bg-indigo-600 text-center text-white font-light rounded cursor-pointer px-6 py-2" />
            </form>
          </div>
        </div>  
      </div>
      <div class="w-full lg:w-1/3 lg:px-4">
        <?php get_template_part('template-parts/sidebar/sidebar-posts'); ?>
      </div>
      
    </div>
  </div>
  
</main><!-- #main -->

<?php endwhile; else: ?>
  <p><?php _e('Ничего не найдено'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>
