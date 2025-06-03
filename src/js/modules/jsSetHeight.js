// The point of this function is to force the height of an element
// according to the height of its children.

// use case: section with only absolute children that must still have a height

window.addEventListener('load', setHeightOfElements);
window.addEventListener('resize', setHeightOfElements);

function setHeightOfElements() {
  const selectedElements = document.querySelectorAll('.jsSetHeight');

  selectedElements.forEach(element => {
    let maxHeight = 0;

    Array.from(element.children).forEach(child => {
      const elementBottom = child.offsetTop + child.offsetHeight;
      if (elementBottom > maxHeight) {
        maxHeight = elementBottom;
      }
    });

    const styles = window.getComputedStyle(element);
    const paddingTop = parseFloat(styles.paddingTop);
    const paddingBottom = parseFloat(styles.paddingBottom);
    const borderTop = parseFloat(styles.borderTopWidth);
    const borderBottom = parseFloat(styles.borderBottomWidth);

    element.style.height = `${maxHeight + paddingTop + paddingBottom + borderTop + borderBottom}px`;
  });
}
