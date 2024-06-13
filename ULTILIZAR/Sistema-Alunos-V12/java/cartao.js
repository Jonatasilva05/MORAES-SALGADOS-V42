new Vue({
  el: "#app",
  data() {
    return {
      currentCardBackground: Math.floor(Math.random()* 25 + 1), // just for fun :D
      isCardFlipped: false,
      focusElementStyle: null,
    };
  }
});