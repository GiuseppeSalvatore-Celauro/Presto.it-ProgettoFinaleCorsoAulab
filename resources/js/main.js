// Card Statistiche
let PrimoNumero = document.querySelector('#PrimoNumero');
let SecondoNumero = document.querySelector('#SecondoNumero');
let TerzoNumero = document.querySelector('#TerzoNumero');
let totProducts = document.querySelector('#totProducts');
let totUsers = document.querySelector('#totUsers');

// NavBar Scroll
let navbar = document.querySelector('#navbar');
let navbar2 = document.querySelector('#navbar2');

// Bottone scoll up
let BottoneScrollUp = document.querySelector("#BottoneScrollUp");


if (window.location.pathname == '/') {
    function createInterval(total, finalNumber, time) {
        let counter = 0;
        let interval = setInterval(()=>{
            if (counter< total ) {
                counter++;
                finalNumber.innerHTML= counter;
            }else{
                clearInterval(interval)
            }
        }, time)
    }

    let check = true;
    let observer = new IntersectionObserver((entries)=>{
        entries.forEach((el)=>{
            if (el.isIntersecting && check == true) {
                createInterval(totProducts.innerHTML,PrimoNumero, 250);
                createInterval(totUsers.innerHTML,SecondoNumero, 250);
                createInterval(17,TerzoNumero, 250 );
                check = false;
                setTimeout(() => {
                    check = true;
                }, 5000);
            }
        })
    })
    observer.observe(PrimoNumero)

    // gestione dello swiper

    let btnLeft = document.querySelector('.btn-before-custom')
    let btnRight = document.querySelector('.btn-after-custom')
    let allCard = document.querySelectorAll('.card-container-custom')
    let containerWrapper = document.querySelector('.container-wrapper')

    let count = 0

    function countSet(count) {
        allCard.forEach(card => {
            card.style.left = count + 'px'
            console.log( card.style.left)
        });
    }


    if(allCard.length > 3){
        if(window.screen.width <= 575){
            btnLeft.addEventListener('click', ()=>{
                if (count < 0) {
                    count += 270
                    countSet(count)
                }
            })
            btnRight.addEventListener('click', ()=>{
                if (count > -1350) {
                    count -= 270
                    countSet(count)
                }
            })
        }else if(window.screen.width <= 767 && window.screen.width >= 575){
            btnLeft.addEventListener('click', ()=>{
                if (count < 0) {
                    count += 270
                    countSet(count)
                }
            })
            btnRight.addEventListener('click', ()=>{
                if (count > -1350) {
                    count -= 270
                    countSet(count)
                }
            })
        }else if(window.screen.width <= 991 && window.screen.width >= 767){
            btnLeft.addEventListener('click', ()=>{
                if (count < 0) {
                    count += 600
                    countSet(count)
                }
            })
            btnRight.addEventListener('click', ()=>{
                if (count > -1200) {
                    count -= 600
                    countSet(count)
                }
            })
        }else if(window.screen.width <= 1199 && window.screen.width >= 991){
            btnLeft.addEventListener('click', ()=>{
                if (count < 0) {
                    count += 500
                    countSet(count)
                }
            })
            btnRight.addEventListener('click', ()=>{
                if (count > -1000) {
                    count -= 500
                    countSet(count)
                }
            })
        }else if(window.screen.width <= 1399 && window.screen.width >= 1199){
            btnLeft.addEventListener('click', ()=>{
                if (count < 0) {
                    count += 300
                    countSet(count)
                }
            })
            btnRight.addEventListener('click', ()=>{
                if (count > -900) {
                    count -= 300
                    countSet(count)
                }
            })
        }else if(window.screen.width >= 1399){
            btnLeft.addEventListener('click', ()=>{
                if (count < 0) {
                    count += 1320
                    countSet(count)
                }
            })
            btnRight.addEventListener('click', ()=>{
                if (count > -1100) {
                    count -= 1320
                    countSet(count)
                }
            })
        }
    }else{
        btnLeft.classList.add('d-none')
        btnRight.classList.add('d-none')

    }
}
// Nav Scroll

    window.addEventListener('scroll', () =>{
        if (window.scrollY > 150) {
            navbar.classList.add('navbar-scroll');
            navbar.classList.add('fixed-top');
            navbar2.classList.add('pt-4');
        } else {
            navbar.classList.remove('navbar-scroll');
            navbar.classList.remove('fixed-top');
            navbar2.classList.remove('pt-4');
        }
    })

// Bottone Scroll up
window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (
    document.body.scrollTop >  150 ||
    document.documentElement.scrollTop > 150
  ) {
    BottoneScrollUp.style.display = "block";
    BottoneScrollUp.classList.add('animate__animated', 'animate__bounceInRight');
    BottoneScrollUp.classList.remove('animate__bounceOutRight');

  } else {
    BottoneScrollUp.classList.remove('animate__bounceInRight');
    BottoneScrollUp.classList.add('animate__bounceOutRight');
  }
}
BottoneScrollUp.addEventListener("click", backToTop);

function backToTop() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}