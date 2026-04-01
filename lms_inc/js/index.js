if (document.getElementById('hakkimizda-text')) {
  const textElement = document.getElementById('hakkimizda-text');
  const textContent = textElement.innerText;
  const characters = textContent.split('');

  textElement.innerHTML = '';

  characters.forEach((char) => {
    const span = document.createElement('span');
    span.innerText = char;
    span.style.transition = 'color 0.5s linear';
    textElement.appendChild(span);
  });

  window.addEventListener('scroll', () => {
    const scrollPosition = window.scrollY - 400;
    
    textElement.querySelectorAll('span').forEach((span, index) => {
      if (scrollPosition > index / 5) {
        span.style.color = '#fff';
      } else {
        span.style.color = ''; // Or use the original color
      }
    });
  });
}

  window.addEventListener('load', function() {
    if ($('.project_container').length) {
      $('.project_container').isotope({
        layoutMode: 'masonry',
        itemSelector: '.project-wrapper',
        transitionDuration: '1s',
      });
    }
    
    if ($('.project_filter').length) {
      // filter items on button click
      $('.project_filter').on('click', 'li', function() {
        var filterValue = $(this).attr('data-filter');
        $('.project_container').isotope({ filter: filterValue });
        $('.project_filter li').removeClass('current');
        $(this).addClass('current');
      });
  
      // Page load: trigger click on the current filter
      var $currentFilter = $('.project_filter li.current');
      if ($currentFilter.length) {
        var filterValue = $currentFilter.attr('data-filter');
        $('.project_container').isotope({ filter: filterValue });
      }
    }
  });
  if(document.getElementById("scrollLink")){
    document.getElementById("scrollLink").addEventListener("click", function () {
      const section = document.getElementById("aciklama");
        const offset = -150; // Yukarıdan 100 piksel mesafe
        const elementPosition = section.getBoundingClientRect().top + window.pageYOffset + offset;
        window.scrollTo({
          top: elementPosition,
          behavior: 'smooth'
        });
    });
  }
  
  

  function urunDetayButton(tabId) {
    // Tüm tab-pane'lerden show ve active sınıflarını kaldır
    document.querySelectorAll('.tab-pane').forEach(function(tab) {
        tab.classList.remove('show', 'active');
    });
    document.querySelectorAll('.nav-link').forEach(function(tab) {
        tab.classList.remove('show', 'active');
    });
    
    // İlgili tab-pane'e show ve active sınıflarını ekle
    var activeTab = document.getElementById(tabId + '-pane');
    if (activeTab) {
        activeTab.classList.add('show', 'active');
    }

    var activeItem = document.getElementById(tabId);
    if (activeItem) {
        activeItem.classList.add('active');
    }
}

tsParticles.load("tsparticles", {
    fpsLimit: 60,
    particles: {
      number: {
        value: 0,
        density: {
          enable: true,
          value_area: 800
        }
      },
      color: {
        value: "#ff0000",
        animation: {
          enable: true,
          speed: 20,
          sync: true
        }
      },
      shape: {
        type: "image",
        options: {
          image: {
            src:
              "lms_inc/img/backgrounds/smoke10.png",
            width: 256,
            height: 256
          }
        }
      },
      opacity: {
        value: 1,
        random: false,
        animation: {
          enable: true,
          speed: 0.5,
          minimumValue: 0,
          sync: false
        }
      },
      size: {
        value: 64,
        random: { enable: true, minimumValue: 32 },
        animation: {
          enable: false,
          speed: 20,
          minimumValue: 0.1,
          sync: false
        }
      },
      links: {
        enable: false,
        distance: 100,
        color: "#ffffff",
        opacity: 0.4,
        width: 1
      },
      life: {
        duration: {
          value: 20
        },
        count: 1
      },
      move: {
        enable: true,
        gravity: {
          enable: true,
          acceleration: -0.5
        },
        speed: 3,
        direction: "top",
        random: false,
        straight: false,
        outModes: {
          default: "destroy",
          bottom: "none"
        },
        attract: {
          enable: true,
          distance: 300,
          rotate: {
            x: 600,
            y: 1200
          }
        }
      }
    },
    interactivity: {
      detectsOn: "canvas",
      events: {
        resize: true
      }
    },
    detectRetina: true,
    // background: {
    //   color: "#000000"
    // },
    emitters: {
      direction: "top",
      rate: {
        quantity: 20,  //Dumanın sıklığı
        delay: 0.05
      },
      size: {
        width: 100,
        height: 10
      },
      position: {
        x: 50,
        y: 110
      }
    }
  });
  
  $(document).ready(function () {
    const owl = $('.banner_carousel.home-slider');

    const totalSlides = $('.banner_carousel.home-slider .slide-item-content').length;
    $('.count-field-homepage .total').text(totalSlides);

    function updateCurrentSlide(index) {
        $('.count-field-homepage .current').text(index + 1); 
    }

    // Slider değiştiğinde çalışacak olay dinleyicisi
    owl.on('changed.owl.carousel', function (event) {
        const currentIndex = event.item.index - event.relatedTarget._clones.length / 2;
        updateCurrentSlide((currentIndex % totalSlides + totalSlides) % totalSlides);
    });
});

// HEADER js
$(document).ready(function() {

	var $btns = $('.header-product-btn').mouseover(function() {

		if (this.id == 'all') {

			$('#parent-header-product > div').fadeIn(450);

		} else {

			var $el = $('.' + this.id).fadeIn(450);

			$('#parent-header-product  > div').not($el).hide();

		}

		$btns.removeClass('active-header-product');

		$(this).addClass('active-header-product');

	})

	$(".btm#a").trigger('click');

});