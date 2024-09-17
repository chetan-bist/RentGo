//cursor
function cursorEffect() {
  var page1Content = document.querySelector("#page1-content");
  var cursor = document.querySelector("#cursor");

  page1Content.addEventListener("mousemove", function (dets) {
    gsap.to(cursor, {
      x: dets.x,
      y: dets.y,
    });
  });
  page1Content.addEventListener("mouseenter", function () {
    gsap.to(cursor, {
      scale: 1,
      opacity: 1,
    });
  });
  page1Content.addEventListener("mouseleave", function () {
    gsap.to(cursor, {
      scale: 0,
      opacity: 0,
    });
  });
}
cursorEffect();

//loader
var tl = gsap.timeline();

tl.from("#loader h3", {
  x: 40,
  opacity: 0,
  duration: 1,
  stagger: 0.1,
});

tl.to("#loader h3", {
  opacity: 0,
  x: -20,
  duration: 1,
  stagger: 0.1,
});

tl.to("#loader", {
  opacity: 0,
});
tl.to("#loader", {
  display: "none",
});
