
export const automatic = () => {

  startScripts();

  window.addEventListener('resize', startScripts);

  function startScripts () {
    windowSize();
    console.log(window.vigia.deviceSize)
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

}
