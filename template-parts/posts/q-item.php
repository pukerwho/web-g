<div class="q-item relative bg-gray-100 dark:bg-dark-md text-gray-800 dark:text-gray-200 rounded-lg px-6 pt-4 pb-3 mb-4">
  <a href="<?php echo get_permalink(); ?>" class="absolute-link"></a>
  <div>
    <div class="mb-4"><?php the_title(); ?></div>
    <div class="flex flex-wrap text-sm -mx-2">
      <?php if (carbon_get_the_post_meta('crb_q_solved')): ?>
      <!-- Решено -->
      <div class="px-2">
        <div class="inline-flex items-center bg-green-500 text-white dark:text-gray-200 rounded px-2 py-1">
          <div class="mr-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
            </svg>
          </div>
          <div>Решено</div>
        </div>
      </div>
      <!-- END Решено -->
      <?php endif; ?>
      <!-- Ответов -->
      <div class="px-2">
        <div class="inline-flex items-center bg-orange-300 text-gray-800 rounded px-2 py-1">
          <div class="mr-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
            </svg>
          </div>
          <div>Ответов: <?php echo get_comments_number(); ?></div>
        </div>
      </div>
      <!-- END Ответов -->

    </div>
  </div>
</div>