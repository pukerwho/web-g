<div class="bg-white dark:bg-dark-xl custom-shadow rounded-lg px-2 lg:px-4 py-2 lg:py-4 lg:pb-2 mb-6 js-sidebar-vote">
  <div class="text-center text-lg text-indigo-600 dark:text-indigo-400 mb-2"><?php _e('Проверка знаний', 'web-g'); ?></div>
  <div class="text-xl text-gray-800 dark:text-gray-200 text-center mb-4"><span class="mr-2">🤔</span><?php _e('Хорошо ли вы знаете CSS?', 'web-g'); ?></div>
  <div class="text-gray-800 dark:text-gray-200">
    <div class="mb-2">Есть два блочных элемента, которые идут друг за другом в html. Какой будет оступ (margin) между ними, если задать им такие стили: </div>
    <pre><code class="language-css">
.top {
  height: 30px;
  background-color: blue;
  margin-bottom: 10px;
}
.bottom {
  height: 30px;
  background-color: red;
  margin-top: 20px;
}
    </code></pre>
  </div>
  <div class="js-analytics" data-analytics-category="Клик" data-analytics-action="Сss викторина (сайдбар)">
    <div class="bg-gray-300 dark:bg-dark-md dark:text-gray-200 rounded text-center cursor-pointer p-2 mb-2 js-sidebar-item" data-q-css="1">10px</div>
    <div class="bg-gray-300 dark:bg-dark-md dark:text-gray-200 rounded text-center cursor-pointer p-2 mb-2  js-sidebar-item" data-q-css="2">20px</div>
    <div class="bg-gray-300 dark:bg-dark-md dark:text-gray-200 rounded text-center cursor-pointer p-2 mb-2  js-sidebar-item" data-q-css="3">30px</div>
  </div>

  <!-- Telegram -->
  <div class="hidden sidebar-vote-js">
    <div class="bg-dark-lg dark:bg-dark-xl custom-shadow rounded-lg p-4">
      <div class="text-gray-200 mb-6"><?php _e('Больше интересных задачек по CSS в нашем', 'weg-g'); ?> <span class="text-indigo-500"><?php _e('Telegram канале', 'web-g'); ?><span> 👇</div>
      <div class="mb-2 js-analytics" data-analytics-category="Клик" data-analytics-action="Telegram-канал (vote)">
        <a href="https://t.me/css_golovolomki" class="block bg-indigo-600 text-gray-200 text-center rounded px-6 py-3" target="_blank"><?php _e('Перейти в Telegram', 'web-g'); ?></a>
      </div>
    </div>
  </div>
</div>