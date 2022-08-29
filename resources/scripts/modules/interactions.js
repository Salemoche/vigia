
export const interactions = () => {

  const addEventListeners = () => {
    setTimeout(() => {
      menuBehavior();
      menuScroll();
      refreshCart();
      newsletterButton();
      accordion();
    }, 500);
  }

  addEventListeners();

  /**========================
  *	Menu
  *========================*/

  function menuBehavior () {

    const currentMenuItem = document.querySelector('.current-menu-item');
    if (!currentMenuItem) return
    const currentMenuItemHeight = currentMenuItem.scrollHeight;
    const header = document.querySelector('.vigia-header');
    const headerHeight = header.scrollHeight;
    let menuOpen = false;

    currentMenuItem.addEventListener('click', () => {

      if ( window.vigia.deviceSize == 'large' ) return

      header.classList.toggle('active');

      if ( menuOpen ) {
        header.style.maxHeight = currentMenuItemHeight;
      } else {
        header.style.maxHeight = headerHeight;
      }

      menuOpen = !menuOpen;
    })

    const isMagazine = window.location.href.includes('/zeitschriften/');
    const isArticle = document.querySelector('body').classList.contains('single-post');
    if ( !isMagazine && !isArticle ) return

    const magazineMenuItem = document.querySelector('#menu-item-37 a');

    magazineMenuItem.style.pointerEvents = 'all'
    document.querySelector('#menu-item-37').style.pointerEvents = 'all'

    magazineMenuItem.addEventListener( 'click', (e) => {
      e.preventDefault();
      if ( window.vigia.deviceSize !== 'desktop' ) return

      window.location = '/'
    })
  }

  let scrollDist;
  const menu = document.querySelector('.vigia-header:not(.vigia-header-front)');

  function menuScroll (e) {

    window.addEventListener( 'wheel', e => {
      const scrollingDown = e.deltaY > 0;

      if (window.vigia.deviceSize != 'desktop' || !menu ) return menu.style.top = '0px';

      if ( scrollingDown ) {
        menu.style.top = '-100%';
      } else {
        menu.style.top = '0px';
      }
    })
  }


  /**========================
  *	Refresh Cart
  *========================*/

  function refreshCart () {

    const refreshButton = document.querySelector('.vigia-refresh-button')
    const qtyChanges = document.querySelectorAll('input.qty')

    if ( !refreshButton ) return

    qtyChanges.forEach(qtyChange => {
      qtyChange.addEventListener( 'change', () => {
        refreshButton.classList.add('visible');
      })
    });
  }


  /**========================
  *	Newsletter
  *========================*/

  function newsletterButton () {
    const input = document.querySelector('.mailerlite-form input[type="email"]');
    const newsletterButton = document.querySelector('.mailerlite-subscribe-submit');

    if ( !input || !newsletterButton ) return

    input.addEventListener( 'keyup', () => {

      const value = input.value
      const isMail = value.match(/[\w\n]+@[\w\n]+\.\w+/gi)

      if ( isMail) {
        newsletterButton.classList.add('active')
      } else {
        newsletterButton.classList.remove('active')
      }


    })
  }
  /**========================
  *	Accordion
  *========================*/

  function accordion () {
    const accordions = document.querySelectorAll('.vigia-accordion');

    if (accordions.length == 0) return

    accordions.forEach(accordion => {

      const accordionContent = accordion.querySelector('center') || accordion.querySelector('p');
      console.log( accordionContent );
      const accordionButton = accordion.querySelector('.vigia-accordion-button');
      const lines = accordionContent.getClientRects().length
      accordionContent.style.maxHeight = window.innerWidth > 1024 ? 'calc(5 * 1.875rem' : 'calc(5 * 1.375rem';

      accordionButton.removeEventListener('click', () => { accordionButtonFunctions(accordion, accordionContent, accordionButton) })

      // if (lines < 8) {
      //   accordionButton.style.display = 'none';
      // }

      accordionButton.addEventListener('click', () => { accordionButtonFunctions(accordion, accordionContent, accordionButton) })
    });
  }

  function accordionButtonFunctions (accordion, accordionContent, accordionButton) {

    const isOpen = accordion.getAttribute('open') == 'true' ? true : false;
    const height = accordionContent.scrollHeight;
    console.log(height)

    if (isOpen) {
      accordionContent.style.maxHeight = window.innerWidth > 1024 ? 'calc(5 * 1.875rem' : 'calc(5 * 1.375rem';
      accordion.classList.remove('open')
      accordionButton.classList.remove('after:rotate-180')
    } else {
      accordionContent.style.maxHeight = height + 'px';
      accordion.classList.add('open')
      accordionButton.classList.add('after:rotate-180')
    }

    console.log(isOpen)

    accordion.setAttribute('open', !isOpen)
  }
}
