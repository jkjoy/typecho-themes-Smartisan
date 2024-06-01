<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="site-header">
  <div class="container header-container">
  <a class="title-container" href="<?php $this->options->siteUrl(); ?>">
    <?php if ($this->options->logoUrl): ?>
      <img class="avatar" src="<?php $this->options->logoUrl(); ?>" alt="<?php $this->options->title(); ?>">
    <?php else: ?>
      <h1 class="site-title"><?php $this->options->title(); ?></h1>
    <?php endif; ?>
  </a>
  <button class="menu-toggle" aria-label="Toggle menu">
    <svg viewBox="0 0 24 24">
      <path fill="currentColor" d="M3 6h18v2H3V6zm0 5h18v2H3v-2zm0 5h18v2H3v-2z"/>
    </svg>
  </button>
    <div class="menu-container">
        <?php if ($this->is('index')): ?> 
            <?php endif; ?>
            <a href="<?php $this->options->siteUrl(); ?> " class="menu">
            <?php _e('首页'); ?>
        </a>
          <?php \Widget\Contents\Page\Rows::alloc()->to($pages); ?>
                    <?php while ($pages->next()): ?>
                       <?php if ($this->is('page', $pages->slug)): ?> 
                        <?php endif; ?>
                        <a href="<?php $pages->permalink(); ?>" class="menu" title="<?php $pages->title(); ?>"> 
                            <?php $pages->title(); ?>
                        </a>  
       <?php endwhile; ?>        
    </div>
    </div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
      const menuToggle = document.querySelector('.menu-toggle');
      const menuContainer = document.querySelector('.menu-container');

      // 默认隐藏菜单
      if (window.innerWidth <= 800) {
        menuContainer.style.display = 'none';
      }

      menuToggle.addEventListener('click', function() {
        menuContainer.classList.toggle('show');
        if (menuContainer.classList.contains('show')) {
          menuContainer.style.display = 'flex';
        } else {
          menuContainer.style.display = 'none';
        }
      });

      // 监听窗口大小变化
      window.addEventListener('resize', function() {
        if (window.innerWidth > 800) {
          menuContainer.style.display = 'flex';
          menuContainer.classList.remove('show');
        } else if (!menuContainer.classList.contains('show')) {
          menuContainer.style.display = 'none';
        }
      });
    });
  </script>
<style>
  /* 基本样式 */
  .menu-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
  }
  .menu {
    padding: 10px 20px;
    text-decoration: none;
    color: #333;
    transition: background-color 0.3s ease;
  }
  .menu:hover {
    background-color: #f0f0f0;
  }
  /* 菜单切换按钮样式 */
  .menu-toggle {
    display: none;
    cursor: pointer;
    padding: 10px;
    background: none;
    border: none;
  }
  .menu-toggle svg {
    width: 30px;
    height: 30px;
  }
  /* 当屏幕宽度小于等于800px时应用的样式 */
  @media (max-width: 800px) {
    .menu-container {
      display: none; /* 隐藏菜单 */
      flex-direction: column;
      background-color: #fff;
      position: absolute;
      top: 50px;
      left: 0;
      width: 100%;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    .menu-container.show {
      display: flex; /* 显示菜单 */
    }
    .menu-toggle {
      display: block; /* 显示菜单切换按钮 */
    }
  }
</style>
</div>