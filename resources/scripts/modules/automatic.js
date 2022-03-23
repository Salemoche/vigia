
export const automatic = () => {

  startScripts();

  window.addEventListener('resize', startScripts);

  function startScripts () {
    windowSize();
    addMenuClasses();
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

    if ( isZeitschriften ) {
      document.querySelector('.menu-item-37').classList.add('current-menu-item');
    }
  }

}
