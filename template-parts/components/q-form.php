<div class="bg-white dark:bg-dark-xl custom-shadow rounded-lg px-2 lg:px-4 py-2 lg:py-4 lg:pb-2 mb-6">
  <div class="text-gray-800 dark:text-gray-200 text-2xl font-semibold text-center mb-6">
    <?php _e('Заполните форму', 'web-g'); ?> <span class="ml-2">👇</span>
  </div>
  <div>
    <form name="form_q">
      <div class="flex flex-col mb-3">
        <input type="text" name="Title" placeholder="<?php _e('Заголовок. В чем заключается ваш вопрос.', 'web-g'); ?>"  class="custom-input" required>
        <textarea name="Content" rows="5" class="custom-input" placeholder="<?php _e('Основная часть. Напишите всю информацию, чтобы получить точный ответ.', 'web-g'); ?>" required></textarea>
      </div>
      <button type="submit" class="w-full block bg-indigo-600 hover:bg-indigo-500 text-white rounded px-4 py-2 mb-2">
        <span><?php _e('Задать вопрос', 'web-g'); ?></span>
      </button>
    </form>
    <div class="form_q_success hidden text-gray-800 dark:text-gray-200 bg-yellow-200 dark:bg-dark-lg rounded px-4 py-2 mt-4"><?php _e('Мы получили ваш вопрос. Сейчас он на проверке у модератора.', 'web-g'); ?></div>
  </div>
</div>