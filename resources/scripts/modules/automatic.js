
export const automatic = () => {

  startScripts();
  window.addEventListener('resize', startScripts);



  function startScripts () {
    loading();
    windowSize();
    addMenuClasses();
    articleImageSizing();
    spacing();
  }

  function windowSize () {
    switch ( true ) {
      case window.innerWidth > 1024:
        window.vigia.deviceSize = 'desktop';
        break;
      case window.innerWidth > 768:
        window.vigia.deviceSize = 'tablet';
        break;
      default:
        window.vigia.deviceSize = 'mobile';
        break;
    }
  }


  /**========================
  *	Loading
  *========================*/
  function loading () {
    const loading = document.querySelector('.vigia-loading');

    if (!loading) return

    window.addEventListener("load", function () {
      setTimeout(() => {
        loading.style.pointerEvents = 'none';
        loading.style.opacity = '0';
      }, 300);
    });

    setTimeout(() => {
      loading.style.pointerEvents = 'none';
      loading.style.opacity = '0';
    }, 1000);
  }


  /**========================
  *	Add classes to menu
  *========================*/

  function addMenuClasses () {
    const isZeitschriften = window.location.href.includes('zeitschriften');
    const isArticle = document.querySelector('body').classList.contains('single-post');
    const isProduct = window.location.href.includes('produkt');
    const isCart = document.querySelector('body').classList.contains('page-id-8');
    const isCheckout = document.querySelector('body').classList.contains('page-id-9');

    if ( isZeitschriften || isArticle ) {
      document.querySelector('.menu-item-37').classList.add('current-menu-item');
    }

    if ( isProduct || isCart || isCheckout) {
      document.querySelector('.menu-item-41').classList.add('current-menu-item');
    }

    if (document.querySelector('#menu-item-home')) document.querySelector('#menu-item-home').remove()

    if ( window.vigia.deviceSize != 'desktop') {

      document.querySelector('#menu-header-menu').insertAdjacentHTML(
        'beforeend',
        '<li id="menu-item-home" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-41 vigia-menu-item border-black overflow-hidden"><a href="/">Vigia</a></li>'
      )
    }
  }


  /**========================
  *	Article Image Sizing
  *========================*/

  function articleImageSizing() {
    const images = document.querySelectorAll('.wp-block-image');

    images.forEach(image => {
      const imageNode = image.firstChild;
      const isPortrait = parseInt(imageNode.getAttribute('height')) > parseInt(imageNode.getAttribute('width'));

      if (isPortrait) {
        imageNode.style.maxHeight = image.offsetWidth * 0.75 + 'px';
        imageNode.style.width = 'auto';
      }
    });
  }


  /**========================
  *	Spacing
  *========================*/
  function spacing () {
    const subheader = document.querySelector('.vigia-simple-header');
    const menuItem = document.querySelector('.menu-item');
    const content = document.querySelector('.vigia-content');
    if ( !menuItem || !content) return

    setTimeout(() => {

      if ( window.vigia.deviceSize != 'desktop' ) {
        const menuHeight = subheader ? subheader.offsetHeight + menuItem.offsetHeight : menuItem.offsetHeight;
        content.style.paddingTop = menuHeight + 20 + 'px';
      } else {
        content.style.paddingTop = 0 + 'px';
      }

    }, 500);
  }

}
