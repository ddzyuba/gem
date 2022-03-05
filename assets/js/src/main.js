( function() {

	// Scroll header menu
	if ( document.addEventListener ) {
		document.addEventListener( 'scroll', onScrollEventHandler, false );
	} else if ( document.attachEvent ) {
		document.attachEvent( 'onscroll', onScrollEventHandler );
	}

	function onScrollEventHandler( event ) {
		let scroll;
		let header = document.querySelector( '.site-header' );

		scroll = document.body.scrollTop || document.documentElement.scrollTop;

		if ( scroll >= 50 ) {
			header.classList.add( 'scrolling' );
		} else {
			header.classList.remove( 'scrolling' );
		}
	}

} )();

( function( $ ) {

	
	jQuery( document ).ready( function () {

		// Toggle hamburger menu icon
		function closeMenu() {
			$( 'body' ).removeClass( "menu-expanded" );
			setTimeout( function () {
				$( '.mobile-nav' ).hide( 10 );
			}, 500 );
		}

		function expandMenu() {
			$( '.mobile-nav' ).show( 10, function () {
				$( "body" ).addClass( "menu-expanded" );
			} );
		}

		$( "#js-navigation-button" ).click( function ( event ) {
			event.preventDefault();
			expandMenu();
			$( this ).attr( 'aria-expanded', 'true' );
			$( "#js-close-menu" ).attr( 'aria-expanded', 'true' );
		} );

		$( '#js-close-menu' ).click( function () {
			closeMenu();
			$( "#js-navigation-button" ).attr( 'aria-expanded', 'false' );
			$( this ).attr( 'aria-expanded', 'false' );
		} );

		$( '.mobile-menu__item-sorting' ).on( 'click', function() {
			closeMenu();
		} );

		$( '.mobile-menu__item-cutting' ).on( 'click', function() {
			closeMenu();
		} );

		$( document ).keyup( function ( event ) {
			if ( event.keyCode == 27 ) {
				closeMenu();
			}
		} );
		// Toggle hamburger menu icon

		// Toggle submenu in mobile menu
		$( '.mobile-nav li.menu-item-has-children > a' ).append( '<span class="menu-item-has-children__button">+</span>' );

		$( '.menu-item-has-children__button' ).on( 'click', function( event ) {
			event.preventDefault();
			$( this ).toggleClass( 'open' );

			if ( $( this ).hasClass( 'open' ) ) {
				$( this ).text( '-' );
			} else {
				$( this ).text( '+' );
			}

			$( this ).parent().next().slideToggle();
		} );
		// Toggle submenu in mobile menu

		// Toggle Read More button on the Our Story page
		const underHeroReadMore = $( '.story__under-hero-more' );
		if ( underHeroReadMore.length ) {
			$( underHeroReadMore ).on( 'click', function( event ) {
				event.preventDefault();
				console.log("under hero click");
				$( this ).parent().prev().slideToggle();
				$( this ).children().toggleClass( 'story__under-hero-more-icon-open' );
			} );
		}

		const storyReadMore = $( '.story__middle-info-more' );
		if ( storyReadMore.length ) {
			$( storyReadMore ).on( 'click', function( event ) {
				event.preventDefault();
				$( this ).parent().prev().slideToggle();
				$( this ).children().toggleClass( 'story__middle-info-more-icon-open' );
			} );
		}
		// Toggle Read More button on the Our Story page

		let url = window.location.href;
		// Scroll up after opening anchor links
		if ( url.indexOf( 'sorting' ) || url.indexOf( 'cutting' ) ) {
			window.scrollBy( 0, -150 );
		}
		// Scroll up after opening anchor links

		// Footer subscribe form label handler
		$( '.site-footer input:checkbox' ).on( 'focus', function() {
			$( '.site-footer .mc4wp-checkbox label' ).css( 'outline', '1px dotted' );
		} );
		$( '.site-footer input:checkbox' ).on( 'blur', function() {
			$( '.site-footer .mc4wp-checkbox label' ).css( 'outline', 'none' );
		} );
		// Footer subscribe form label handler

		// Single stone page, subscribe form label handler
		$( '.stone input:checkbox' ).on( 'focus', function() {
			$( '.stone .mc4wp-checkbox label' ).css( 'outline', '1px dotted' );
		} );
		$( '.stone input:checkbox' ).on( 'blur', function() {
			$( '.stone .mc4wp-checkbox label' ).css( 'outline', 'none' );
		} );
		// Single stone page, subscribe form label handler

		// Load images after document is ready
		$( '.home-hero-slider__item' ).each( function( index, element ) {
			if ( 1 == index || 2 == index ) {
				imageURL = $( this ).attr( 'data-image' );
				$( this ).css( 'background-image', 'url(' + imageURL + ')' );	
			}
		} );

		// Load images after document is ready
		$( '.country-hero-slider__item' ).each( function( index, element ) {
			if ( index >= 1 ) {
				imageURL = $( this ).attr( 'data-image' );
				$( this ).css( 'background-image', 'url(' + imageURL + ')' );	
			}
		} );


		let whoWeAreImage = $( '.home-who-we-are__image' );
		let whoWeAreImageURL = $( whoWeAreImage ).attr( 'data-image' );
		$( whoWeAreImage ).css( 'background-image', 'url(' + whoWeAreImageURL + ')' );
		
		/*
		let storyResponsibilityImage = $( '.story__responsibility-image' );
		let storyResponsibilityImageURL = $( storyResponsibilityImage ).attr( 'data-image' );
		$( storyResponsibilityImage ).css( 'background-image', 'url(' + storyResponsibilityImageURL + ')' );
		*/
		/*
		$( '.home-services__image' ).each( function() {
			imageURL = $( this ).attr( 'data-image' );
			$( this ).css( 'background-image', 'url(' + imageURL + ')' );
		} );
		*/
		/*
		$( '.responsibilities__item-image' ).each( function( index, element ) {
			imageURL = $( this ).attr( 'data-image' );
			$( this ).css( 'background-image', 'url(' + imageURL + ')' );
		} );
		*/
		/*
		$( '.service-list__item-image' ).each( function( index, element ) {
			imageURL = $( this ).attr( 'data-image' );
			$( this ).css( 'background-image', 'url(' + imageURL + ')' );
		} );
		*/
		$( '.stone__tab-image' ).each( function( index, element ) {
			imageURL = $( this ).attr( 'data-image' );
			$( this ).css( 'background-image', 'url(' + imageURL + ')' );
		} );

		$( '.stone-list__item-slide' ).each( function( index, element ) {
			imageURL = $( this ).attr( 'data-image' );
			$( this ).css( 'background-image', 'url(' + imageURL + ')' );
		} );

		// Load images after document is ready

	} );

}( jQuery ) );

( function() {

	// Slider for the hero section on the homepage.

	let slides = document.querySelectorAll( '.home-hero-slider__item' );
	let prevSlideButton = document.querySelector( '.home-hero-slider__arrow-left' );
	let nextSlideButton = document.querySelector( '.home-hero-slider__arrow-right' );
	let sliderDots = document.querySelectorAll( '.home-hero-slider__dots-item' );
	let currentSlide = 0;

	function nextSlide() {
		goToSlide( currentSlide + 1 );
	}

	function previousSlide() {
		goToSlide( currentSlide - 1 );
	}

	function goToSlide( n ) {
		slides[ currentSlide ].className = 'home-hero-slider__item';
		currentSlide = ( n + slides.length ) % slides.length;
		slides[ currentSlide ].className = 'home-hero-slider__item home-hero-slider__item-showing';

		if ( sliderDots.length > 0 ) {
			for ( let i = 0; i < sliderDots.length; i++ ) {
				sliderDots[ i ].className = sliderDots[ i ].className.replace( ' active', '' );
			}

			sliderDots[ currentSlide ].className += ' active';
		}
	}

	if ( sliderDots.length > 0 ) {
		for ( let i = 0; i < sliderDots.length; i++ ) {
			sliderDots[ i ].addEventListener( 'click', function( event ) {
				event.preventDefault();
				goToSlide( i );
			} );
		}
	}

	function autoSlide() {
		setTimeout( autoSlide, 6000 );
		goToSlide( currentSlide + 1 );
	}

	/*
	if ( slides.length > 0 ) {
		autoSlide();
	}
	*/
	
	if ( null === prevSlideButton ) {
		return;
	}

	prevSlideButton.addEventListener( 'click', function( event ) {
		event.preventDefault();
		previousSlide();
	} );

	nextSlideButton.addEventListener( 'click', function( event ) {
		event.preventDefault();
		nextSlide();
	} );

} )();

/*
( function() {

	// Slider for the hero section on the country pages.

	let slides = document.querySelectorAll( '.country-hero-slider__item' );
	let prevSlideButton = document.querySelector( '.country-hero-slider__arrow-left' );
	let nextSlideButton = document.querySelector( '.country-hero-slider__arrow-right' );
	let sliderDots = document.querySelectorAll( '.country-hero-slider__dots-item' );
	let currentSlide = 0;

	function nextSlide() {
		goToSlide( currentSlide + 1 );
	}

	function previousSlide() {
		goToSlide( currentSlide - 1 );
	}

	function goToSlide( n ) {
		slides[ currentSlide ].className = 'country-hero-slider__item';
		currentSlide = ( n + slides.length ) % slides.length;
		slides[ currentSlide ].className = 'country-hero-slider__item country-hero-slider__item-showing';

		if ( sliderDots.length > 0 ) {
			for ( let i = 0; i < sliderDots.length; i++ ) {
				sliderDots[ i ].className = sliderDots[ i ].className.replace( ' active', '' );
			}

			sliderDots[ currentSlide ].className += ' active';
		}
	}

	if ( sliderDots.length > 0 ) {
		for ( let i = 0; i < sliderDots.length; i++ ) {
			sliderDots[ i ].addEventListener( 'click', function( event ) {
				event.preventDefault();
				goToSlide( i );
			} );
		}
	}

	function autoSlide() {
		setTimeout( autoSlide, 6000 );
		goToSlide( currentSlide + 1 );
	}

	
	//if ( slides.length > 0 ) {
	//	autoSlide();
	//}
	
	
	if ( null === prevSlideButton ) {
		return;
	}

	prevSlideButton.addEventListener( 'click', function( event ) {
		event.preventDefault();
		previousSlide();
	} );

	nextSlideButton.addEventListener( 'click', function( event ) {
		event.preventDefault();
		nextSlide();
	} );

} )();
*/

( function( $ ) {

	jQuery( document ).ready( function () {

		// Carousel on the home page, Our Stones section
		const homeStones = $( '.home-our-stones__wrapper' );

		if ( homeStones.length !== 0 ) {
			homeStones.slick( {
				slidesToShow: 4,
				slidesToScroll: 1,
				infinite: true,
				autoplay: false,
				dots: true,
				prevArrow: '.home-our-stones__arrow-left',
				nextArrow: '.home-our-stones__arrow-right',
				responsive: [
					{
						breakpoint: 1300,
						settings: {
							slidesToShow: 3
						}
					},
					{
						breakpoint: 800,
						settings: {
							slidesToShow: 2
						}
					}
				]
			} );
		}
		// Carousel on the home page, Our Stones section

		// Carousel on Our Stones page
		const stoneList = $( '.stone-list__carousel-wrapper' );

		if ( stoneList.length !== 0 ) {
			stoneList.slick( {
				slidesToShow: 4,
				slidesToScroll: 1,
				infinite: true,
				autoplay: false,
				prevArrow: '.stone-list__arrow-left',
				nextArrow: '.stone-list__arrow-right',
				dots: true,
				responsive: [
					{
						breakpoint: 1400,
						settings: {
							slidesToShow: 3
						}
					},
					{
						breakpoint: 1150,
						settings: {
							slidesToShow: 2
						}
					},
					{
						breakpoint: 767,
						settings: {
							slidesToShow: 1
						}
					}
				]
			} );
		}
		// Carousel on Our Stones page

		// Carousel on Our Factory page
		const factoryItems = $( '.factory__carousel' );

		if ( factoryItems.length !== 0 ) {
			factoryItems.slick( {
				slidesToShow: 3,
				slidesToScroll: 1,
				infinite: true,
				autoplay: false,
				arrows: false,
				dots: true,
				responsive: [
					{
						breakpoint: 1300,
						settings: {
							slidesToShow: 2
						}
					},
					{
						breakpoint: 767,
						settings: {
							slidesToShow: 1
						}
					}
				]
			} );
		}
		// Carousel on Our Factory page

		// Slider on single stone page
		const singleStoneSlider = $( '.stone__slider-wrapper' );

		if ( singleStoneSlider.length !== 0 ) {
			singleStoneSlider.slick( {
				slidesToShow: 1,
				slidesToScroll: 1,
				infinite: true,
				autoplay: false,
				arrows: false,
				dots: true
			} );
		}
		// Slider on single stone page

		// Slider on single stone page
		const countryHeroSlider = $( '.country-hero-slider__wrapper' );

		if ( countryHeroSlider.length !== 0 ) {
			countryHeroSlider.slick( {
				slidesToShow: 1,
				slidesToScroll: 1,
				infinite: true,
				autoplay: false,
				prevArrow: '.country-hero-slider__arrow-left',
				nextArrow: '.country-hero-slider__arrow-right',
				dots: true
			} );
		}

		let slickDotsArray = $( '.slick-dots li' );
		//console.log("slickDotsArray length", slickDotsArray.length);
		if ( slickDotsArray.length === 1 ) {
			slickDotsArray.hide();
		}
		// Slider on single stone page

	} );

}( jQuery ) );

( function() {

	// Slider for Our Stones page, bottom sliders
	function OurStonesSlider( slideItem, prevButton, nextButton, count ) {

		let self = this;

		this.slideItem = slideItem;
		this.slides = document.querySelectorAll( '.' + slideItem );
		this.prevSlideButton = document.querySelector( '.' + prevButton );
		this.nextSlideButton = document.querySelector( '.' + nextButton );
		this.count = document.querySelector( '.' + count );
		this.currentSlide = 0;

		this.nextSlide = function() {
			this.goToSlide( this.currentSlide + 1 );
		};

		this.previousSlide = function() {
			this.goToSlide( this.currentSlide - 1 );
		};

		this.goToSlide = function( n ) {
			this.slides[ this.currentSlide ].className = 'stone-list__item-slide ' + this.slideItem;
			this.currentSlide = ( n + this.slides.length ) % this.slides.length;
			this.slides[ this.currentSlide ].className = 'stone-list__item-slide ' + this.slideItem + ' stone-list__item-slide-showing';
			this.count.textContent = this.currentSlide + 1;
		};

		this.run = function() {
			if ( null !== this.prevSlideButton ) {

				this.prevSlideButton.addEventListener( 'click', function( event ) {
					event.preventDefault();
					self.previousSlide();
				} );

				this.nextSlideButton.addEventListener( 'click', function( event ) {
					event.preventDefault();
					self.nextSlide();
				} );
			}
		};
	}

	let stoneSlider1 = new OurStonesSlider( 
		'stone-list__item-slide-1', 
		'stone-list__item-arrow-left-1', 
		'stone-list__item-arrow-right-1', 
		'stone-list__item-slide-count-1' 
	);
	stoneSlider1.run();

	let stoneSlider2 = new OurStonesSlider( 
		'stone-list__item-slide-2', 
		'stone-list__item-arrow-left-2', 
		'stone-list__item-arrow-right-2', 
		'stone-list__item-slide-count-2' 
	);
	stoneSlider2.run();

	let stoneSlider3 = new OurStonesSlider( 
		'stone-list__item-slide-3', 
		'stone-list__item-arrow-left-3', 
		'stone-list__item-arrow-right-3', 
		'stone-list__item-slide-count-3' 
	);
	stoneSlider3.run();

	let stoneSlider4 = new OurStonesSlider( 
		'stone-list__item-slide-4', 
		'stone-list__item-arrow-left-4', 
		'stone-list__item-arrow-right-4', 
		'stone-list__item-slide-count-4' 
	);
	stoneSlider4.run();

	let stoneSlider5 = new OurStonesSlider( 
		'stone-list__item-slide-5', 
		'stone-list__item-arrow-left-5', 
		'stone-list__item-arrow-right-5', 
		'stone-list__item-slide-count-5' 
	);
	stoneSlider5.run();

	let stoneSlider6 = new OurStonesSlider( 
		'stone-list__item-slide-6', 
		'stone-list__item-arrow-left-6', 
		'stone-list__item-arrow-right-6', 
		'stone-list__item-slide-count-6' 
	);
	stoneSlider6.run();

	let stoneSlider7 = new OurStonesSlider( 
		'stone-list__item-slide-7', 
		'stone-list__item-arrow-left-7', 
		'stone-list__item-arrow-right-7', 
		'stone-list__item-slide-count-7' 
	);
	stoneSlider7.run();

	let stoneSlider8 = new OurStonesSlider( 
		'stone-list__item-slide-8', 
		'stone-list__item-arrow-left-8', 
		'stone-list__item-arrow-right-8', 
		'stone-list__item-slide-count-8' 
	);
	stoneSlider8.run();
	// Slider for Our Stones page, bottom sliders

} )();

( function( $ ) {

	jQuery( document ).ready( function () {

		// Tabs on single stone page on desktop screen

		let stoneTabWrapper = $( '.stone__tab-wrapper' );

		$( '.stone__tab-button' ).on( 'click', function( event ) {

			event.preventDefault();
			let index = $( this ).data( 'tab-content-index' );
			let tabImage = $( this ).data( 'tab-image' );
			$( '.stone__tab-button' ).removeClass( 'stone__tab-button-active' );
			$( this ).addClass( 'stone__tab-button-active' );
			$( '.stone__tab-content' ).removeClass( 'stone__tab-content-active' );
			$( '.stone__tab-content-' + index ).addClass( 'stone__tab-content-active' );

			if ( '1' == tabImage ) {
				if ( ! $( stoneTabWrapper ).hasClass( 'stone__tab-wrapper-img' ) ) {
					$( stoneTabWrapper ).addClass( 'stone__tab-wrapper-img' );
				}
			} else {
				$( stoneTabWrapper ).removeClass( 'stone__tab-wrapper-img' );
			}
		} );

		// Tabs on single stone page on desktop screen

		// Tabs on single stone page on mobile screen

		let stoneTabButtonMobile = $( '.stone__tab-button-mobile' );

		$( stoneTabButtonMobile ).on( 'click', function( event ) {
			event.preventDefault();
			$( stoneTabButtonMobile ).not( $( this ) ).removeClass( 'stone__tab-button-mobile-active' );
			
			$( this ).toggleClass( 'stone__tab-button-mobile-active' );

			$( '.stone__tab-content-wrapper' ).not( $( this ).next() ).slideUp().removeClass( 'stone__tab-content-wrapper-active' );
			$( this ).next().slideToggle();

			$( '.stone__tab-content' ).not( $( this ).parent() ).removeClass( 'stone__tab-content-active' );
			$( this ).parent().toggleClass( 'stone__tab-content-active' );
		} );

		let url = window.location.href;
		if ( -1 !== url.indexOf( 'fancy_sapphires' ) ) {
			let fancySapphiresButton = document.getElementById( 'fancy_sapphires' );
			if ( null !== fancySapphiresButton ) {
				fancySapphiresButton.click();

				$( [document.documentElement, document.body] ).animate( {
					scrollTop: $( ".stone__heading-2" ).offset().top
				}, 500 );
			}
		}

		if ( -1 !== url.indexOf( 'padparadscha' ) ) {
			let padparadschaButton = document.getElementById( 'padparadscha' );
			if ( null !== padparadschaButton ) {
				padparadschaButton.click();
				
				$( [document.documentElement, document.body] ).animate( {
					scrollTop: $( ".stone__heading-2" ).offset().top
				}, 500 );
			}
		}

		// Tabs on single stone page on mobile screen

		// Show video on single stone page
		if ( $( '.overlay-modal' ).length > 0 ) {
			var player = videojs( 'my-video' );
			player.responsive( true );
			player.fluid( true );
		}

		$( '.stone__tab-play' ).on( 'click', function( event ) {
			event.preventDefault();
			let videoURL = $( this ).attr( 'data-video' );
			$( '.overlay-modal video' ).attr( 'src', videoURL );
			player.currentTime( 0 );
			player.play();
			$( '.overlay-modal' ).show();
		} );

		$( '.story__under-hero-play' ).on( 'click', function( event ) {
			event.preventDefault();
			let videoURL = $( this ).attr( 'data-video' );
			$( '.overlay-modal video' ).attr( 'src', videoURL );
			player.currentTime( 0 );
			player.play();
			$( '.overlay-modal' ).show();
		} );

		$( '.close-overlay' ).on( 'click', function( event ) {
			event.preventDefault();
			player.currentTime( 0 );
			player.pause();
			$( '.overlay-modal' ).hide();
		} );
		// Show video on single stone page

	} );

}( jQuery ) );

