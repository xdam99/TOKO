let modifbox = document.querySelector('#modifUserBoxMDP')
let modifUserFirstName = document.querySelector('#modifUserFirstName')
let modifUserLastName = document.querySelector('#modifUserLastName')
let modifUserPseudo = document.querySelector('#modifUserPseudo')
let modifUserMail = document.querySelector('#modifUserMail')
let modifUsermdp1 = document.querySelector('#modifUsermdp1')
let modifUsermdp2 = document.querySelector('#modifUsermdp2')
let btnModif = document.querySelector('#btnModif')
let modifHide = document.querySelector('#modifHide')
let imgHide = document.querySelector('#imgHide')
modifbox.style.display = "none"
let btnValidation = document.querySelector('#btnValidation')
let clickModif = 0

btnModif.addEventListener('click', () =>{
    clickModif++
    if(clickModif%2 == 0){
        btnModif.value = "Modifier"
        modifbox.style.display = "none"
        modifUserFirstName.disabled = true
        modifUserFirstName.style.backgroundColor = "#fff4e8aa"
        modifUserLastName.disabled = true
        modifUserLastName.style.backgroundColor = "#fff4e8aa"
        modifUserMail.disabled = true
        modifUserMail.style.backgroundColor = "#fff4e8aa"
        modifUserPseudo.disabled = true
        modifUserPseudo.style.backgroundColor = "#fff4e8aa"
        modifUsermdp.style.backgroundColor = "#fff4e8aa"
        btnValidation.disabled = true
        btnValidation.style.backgroundColor = "#a35656"
        btnValidation.addEventListener('mouseover', ()=>{
            btnValidation.style.backgroundColor = "#7a2020"
        }) 
        btnValidation.addEventListener('mouseleave', ()=>{
            btnValidation.style.backgroundColor = "#a35656"
        }) 
    } else {
        btnModif.value = "Annuler"
        modifbox.style.display = "flex"
        modifUserFirstName.disabled = false
        modifUserFirstName.style.backgroundColor = "white"
        modifUserLastName.disabled = false
        modifUserLastName.style.backgroundColor = "white"
        modifUserMail.disabled = false
        modifUserMail.style.backgroundColor = "white"
        modifUserPseudo.disabled = false
        modifUserPseudo.style.backgroundColor = "white"
        modifUsermdp.style.backgroundColor = "white"
        btnValidation.disabled = false
        btnValidation.style.backgroundColor = "#56a35c"
        btnValidation.addEventListener('mouseover', ()=>{
            btnValidation.style.backgroundColor = "#3e7c43"
        }) 
        btnValidation.addEventListener('mouseleave', ()=>{
            btnValidation.style.backgroundColor = "#56a35c"
        }) 
    }
})
let clickHide = 0
modifHide.addEventListener('click', () =>{
    clickHide++
    if(clickHide%2 == 0){
        modifHide.style.opacity = "100%"
        modifUsermdp.type = "password"
    } else {
        modifHide.style.opacity = "50%"
        modifUsermdp.type = "text"
    }
})