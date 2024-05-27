let logo = document.querySelector('#logo')
let lienLogo = document.querySelector('#lien-logo')
let click = 0
logo.addEventListener('click', () => {
    click++
    if(click>=10){
        lienLogo.href = "index.php?action=easterEgg"
    }
})
