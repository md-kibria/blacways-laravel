const userMenu = document.querySelector('.user-menu');
const userMenuBtn = document.querySelector('.user-menu-btn');
const userMenuBtnClose = document.querySelector('.user-menu-close');



let x = false;
let y = false;
window.addEventListener('load', () => {
    document.querySelector('#nav-menu').addEventListener('click', function() {
        if(!x) {
            document.querySelector('.nav-items').style.right = '0';
            x = true;
        } else {
            document.querySelector('.nav-items').style.right = '100%';
            x = false;
        }
    })
    
    userMenuBtn.addEventListener('click', () => {
        userMenu.classList.remove('hidden')
    })
    
    userMenuBtnClose.addEventListener('click', () => {
        userMenu.classList.add('hidden')
    })
    
    


   
})


window.addEventListener('load', () => {
    const favBtn = document.querySelectorAll('.hit-fav');

    favBtn.forEach(e => {
        e.addEventListener('click', () => {
            let id = e.dataset.id;

            try {
                (async () => {
                    const rawResponse = await fetch(`/beat/fav/${id}`, {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    });

                    const content = await rawResponse.json();
                    console.log(content.status);
            
                    if(content.status === 201) {
                        document.querySelector(`#loves-${id}`).innerHTML = content.favs.length < 10 ? '0'+content.favs.length : content.favs.length;
                        document.querySelector(`#fav-${id}`).innerHTML = `<ion-icon name="heart" role="img" class="md hydrated"></ion-icon>`
                    }
                    
                    if(content.status === 200) {
                        document.querySelector(`#loves-${id}`).innerHTML = content.favs.length < 10 ? '0'+content.favs.length : content.favs.length;
                        document.querySelector(`#fav-${id}`).innerHTML = `<ion-icon name="heart-outline" role="img" class="md hydrated"></ion-icon>`
                    }
                })();
              } catch (error) {
                console.log(error)
              }

        })
    })

    document.querySelector('#menu').addEventListener('click', function() {
        if(!y) {
            document.querySelector('.sidebar').style.right = '0';
            y = true;
        } else {
            document.querySelector('.sidebar').style.right = '100%';
            y = false;
        }
    })
})