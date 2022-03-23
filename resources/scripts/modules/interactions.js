
export const interactions = () => {
  /**========================
  *	Menu
  *========================*/
  const currentMenuItem = document.querySelector('.current-menu-item');
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
