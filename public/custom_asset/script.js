
    // element Tags
    const tag= document.querySelector('html');
    const themeBtn=document.querySelector('.theme');

    // init theme
    theme('dark');

    //btn event
    themeBtn.addEventListener('click',()=>{
       if(tag.getAttribute('data-bs-theme')==='dark'){
           theme('light')
       }else{
            theme('dark')
       }
    })

     // init theme function
    function theme(mode) {
        if (mode==='dark') {
            tag.setAttribute('data-bs-theme','dark')
            themeBtn.innerHTML='<div class="btn btn-light"><i class="fa-solid m-2 fa-sun text-warning"></i></i>Light Mode</div>'
        }else{
            tag.setAttribute('data-bs-theme','light')
            themeBtn.innerHTML='<div class="btn btn-dark"><i class="fa-solid fa-moon m-2"></i>Dark Mode</div>'
        }
    }

