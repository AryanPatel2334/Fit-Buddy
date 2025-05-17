// 'use strict';

// ---------- Header and Back Top Btn Active

const header = document.querySelector("[data-header]");
const backTopBtn = document.querySelector("[data-back-top-btn]");

window.addEventListener("scroll", function () 
{
    if(this.window.scrollY >= 100)
    {
        header.classList.add("active");
        backTopBtn.classList.add("active");
    }
    else
    {
        header.classList.remove("active");
        backTopBtn.classList.remove("active");
    }
});
