let upform = document.querySelector(".uploadform");
//jo ki start mei hidden;
let linktoshow = document.querySelector(".bringup");
let cls = document.querySelector(".clsform");
let chatsec = document.getElementById("gp-chats");
linktoshow.onclick = () => {
  chatsec.style.opacity = "0.5";
  upform.classList.add("active");
};
cls.onclick = () => {
  chatsec.style.opacity = "1";
  upform.classList.remove("active");
};

let pdf_show = document.querySelector(".all-pdfs-show");
let pdf_section = document.querySelector(".pdf-sec");
let pdf_hide = document.querySelector(".hide-pdf");

pdf_show.onclick = () => {
  chatsec.style.opacity = "0.5";
  pdf_section.classList.add("all-pdf-visible");
};
pdf_hide.onclick = () => {
  chatsec.style.opacity = "1";
  pdf_section.classList.remove("all-pdf-visible");
};
