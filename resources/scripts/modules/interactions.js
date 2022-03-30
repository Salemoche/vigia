
export const interactions = () => {

  const addEventListeners = () => {
    setTimeout(() => {
      menu();
      refreshCart();
    }, 500);
  }

  addEventListeners();

  /**========================
  *	Menu
  *========================*/

  function menu () {

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
        header.styles.maxHeight = currentMenuItemHeight;
      } else {
        header.styles.maxHeight = headerHeight;
      }

      menuOpen = !menuOpen;
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
}
