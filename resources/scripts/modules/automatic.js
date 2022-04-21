
export const automatic = () => {

  startScripts();

  window.addEventListener('resize', startScripts);

  function startScripts () {
    windowSize();
    addMenuClasses();
    articleImageSizing();
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
  *	Add classes to menu
  *========================*/

  function addMenuClasses () {
    const isZeitschriften = window.location.href.includes('zeitschriften');
    const isProduct = window.location.href.includes('produkt');

    if ( isZeitschriften ) {
      document.querySelector('.menu-item-37').classList.add('current-menu-item');
    }

    if ( isProduct ) {
      document.querySelector('.menu-item-41').classList.add('current-menu-item');
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



}
