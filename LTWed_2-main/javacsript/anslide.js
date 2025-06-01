// Nếu URL không phải là trang chủ thì ẩn slide
if (
  window.location.pathname !== "/" &&
  window.location.pathname !== "/index.html"
) {
  const banner = document.querySelector(".br-color");
  const slide = document.querySelector(".slide");
  if (banner) banner.style.display = "none";
  if (slide) slide.style.display = "none";
}
