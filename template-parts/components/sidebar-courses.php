<div class="bg-white dark:bg-dark-xl custom-shadow rounded-lg px-2 lg:px-4 py-2 lg:py-4 lg:pb-2 mb-6">
  <div class="text-center text-lg text-indigo-600 dark:text-indigo-400 mb-2">Где учиться</div>
  <div class="text-xl text-gray-800 dark:text-gray-200 text-center mb-4"><span class="mr-2">🧑‍🎓</span>Рекомендуемые курсы</div>
  <div>
    <?php
    // $PublicIP = $_SERVER['REMOTE_ADDR'];
    // $json     = file_get_contents("http://ipinfo.io/$PublicIP/geo");
    // $json     = json_decode($json, true);
    // $country  = $json['country'];
    $country = 'UA';
    
    $best_courses = carbon_get_theme_option('crb_best_courses'); 
    foreach ($best_courses as $course): 
    ?>
    <!-- item -->
    <?php 
      if ($country == 'UA') {
        $course_link = $course['crb_best_course_link_ua'];
      } else {
        $course_link = $course['crb_best_course_link_ru'];
      }
    ?>
    <div class=" w-full relative cursor-pointer mb-2">
      <a href="<?php echo $course_link; ?>" class="absolute-link js-analytics" target="_blank" data-analytics-category="Клик" data-analytics-action="Курсы (сайдбар)"></a>
      <div class="flex items-center justify-between text-gray-800 dark:text-gray-200 bg-gray-300 dark:bg-dark-md rounded px-4 py-3">
        <div class="text-lg font-light mr-2"><?php echo $course['crb_best_course_name']; ?></div>
        <div class="text-green-600 rotate-45">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
          </svg>
        </div>
      </div>
    </div>
    <!-- end item -->
    <?php endforeach; ?>
  </div>
</div>