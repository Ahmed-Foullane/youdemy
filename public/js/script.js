let humbergerBar = document.querySelector(".humberger");

let navMenu = document.querySelector("nav");

let navItems = document.querySelectorAll(".navItem");


let openEye = document.querySelectorAll(".open");
let closeEye = document.querySelectorAll(".close");

let myalert = document.querySelector(".alert")

let teahcerBox = document.querySelector(".teach")
let studentBox = document.querySelector(".stud")


    setTimeout(() => {
      myalert.styel.display = "none";
    }, 1000);





let user = {
  isUserExist: false,
};



humbergerBar.addEventListener("click", () => {
  humbergerBar.classList.toggle("active");
  navMenu.classList.toggle("active");
});

navItems.forEach((e) => {
  e.addEventListener("click", () => {
    navItems.forEach((i) => {
      i.classList.remove("activeColor");
    });
    e.classList.add("activeColor");
  });
});

navItems.forEach((e) => {
  e.addEventListener("click", () => {
    humbergerBar.classList.remove("active");
    navMenu.classList.remove("active");
  });
});



function handleChange(check){
  teahcerBox.checked = false
  studentBox.checked = false
  check.checked = true
}
  
function show(e,show = true){
  if (show) {
    e.style.display = "none";
    e.previousElementSibling.style.display = "block";
    e.previousElementSibling.previousElementSibling.type = "text";
  }else{
    e.style.display = "none";
    e.nextElementSibling.style.display = "block";
    e.previousElementSibling.type = "password";
  }
}


// function handleChange(checkbox) {
//   if(checkbox.checked == true){
//       document.getElementById("submit").removeAttribute("disabled");
//   }else{
//       document.getElementById("submit").setAttribute("disabled", "disabled");
//  }

// console.log(checkbox);

// }

// const signUp = document.getElementById('sign-up'),
//     signIn = document.getElementById('sign-in'),
//     loginIn = document.getElementById('login-in'),
//     loginUp = document.getElementById('login-up')


// signUp.addEventListener('click', ()=>{
//     loginIn.classList.remove('block')
//     loginUp.classList.remove('none')

//     loginIn.classList.toggle('none')
//     loginUp.classList.toggle('block')
// })

// signIn.addEventListener('click', ()=>{
//     loginIn.classList.remove('none')
//     loginUp.classList.remove('block')

//     loginIn.classList.toggle('block')
//     loginUp.classList.toggle('none')
// })

//dark mode
