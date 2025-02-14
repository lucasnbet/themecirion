<?php
/*
 * The template for displaying the footer.
 * Author & Copyright: Cirion
 * URL: https://cirion.com/
 */
?>
</div><!-- Main Wrap Inner -->
<!-- Footer -->
<!-- HTML 5 Common VideoPopup -->
<div class="cron-html-video slider-html-video  mfp-hide"><div id="cron-html5-popup"><div class="mfp-iframe" bis_skin_checked="1"><button title="Close (Esc)" type="button" class="mfp-close">×</button><video id="myVideo" style="width: 80%;" controls="" name="media"><source src="" type="video/mp4"></video></div></div></div>
<!-- HTML 5 Common VideoPopup -->
<footer class="cron-footer">
  <?php if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4') || is_active_sidebar('footer-5')) { ?>
      <div class="footer-wrap">
        <div class="container">
          <?php get_template_part( 'template-parts/footer/footer', 'widgets' );
          get_template_part( 'template-parts/footer/footer', 'copyright' ); ?>
        </div>
      </div>
  	<?php } else { ?>
      <div class="cron-copyright alt-copyright">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-12 aligncenter">
              <p>&copy; <?php esc_html_e('Cirion Technologies | ', 'cirion'); echo esc_html(date('Y')); esc_html_e(' - Todos los derechos reservados.', 'cirion'); ?></p>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
</footer>
<!-- Footer -->
</main>
<!-- Main Wrap -->
<!-- Cirion Back Top -->
<?php
wp_footer(); ?>
<?php
if( get_current_blog_id()=="4" ) { ?>
  <!-- Start of lumen1586 Zendesk Widget script -->
  <script id="ze-snippet" defer src="https://static.zdassets.com/ekr/snippet.js?key=3952f399-3287-4107-8c25-28366b8c3be0"> </script>
  <script type="text/javascript">
  window.zESettings = {
  webWidget: {
  chat: {
  concierge: {
            name: 'Live chat',
            title: { '*': 'Em que podemos ajudar?' }
          },

  offlineForm: {
            greeting: {
              '*': "No momento, não estamos conectados. Deixe-nos uma mensagem e responderemos em breve."
            }
          },
  departments: {
  enabled: []
  }
  }
  }
  };
  </script>
  <script>
  zE('webWidget:on', 'chat:departmentStatus', function(dept) {
    if (dept.name === 'BRASIL' && dept.status === 'online') {
      zE('webWidget', 'updateSettings', {
        webWidget: {
          chat: {
            departments: {
              enabled: [''],
              select: 'BRASIL'
            },
            suppress: false
          }
        }
      });
    } else if (dept.name === 'BRASIL' && dept.status !== 'online') {
      zE('webWidget', 'updateSettings', {
        webWidget: {
          chat: {
    departments: {
            enabled: [],
            select: 'BRASIL'
          }
        }
        }
      });
    }
  });
  </script>
  <!-- End of lumen1586 Zendesk Widget script -->
<?php } else { ?>
  <!-- Start of lumen1586 Zendesk Widget script -->
  <script id="ze-snippet" defer src="https://static.zdassets.com/ekr/snippet.js?key=3952f399-3287-4107-8c25-28366b8c3be0"></script>
  <script type="text/javascript">
  window.zESettings = {
  webWidget: {
  chat: {
  offlineForm: {
            greeting: {
              '*': "Lo sentimos, no estamos conectados en este momento. Déjenos un mensaje y nos pondremos en contacto con usted pronto."
            }
          },      
  departments: {
  enabled: []
  }
  }
  }
  };
  </script>
<!-- End of lumen1586 Zendesk Widget script -->
<?php } ?>
</body>
</html>
<?php