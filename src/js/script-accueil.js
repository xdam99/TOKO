let width = window.innerWidth
if(width >= 950){
    let connexion = document.querySelector('#connexion')
    let register = document.querySelector('#register')
    let home = document.querySelector('#home')
    let homeTitle = document.querySelector('#home-title-box')
    let homeBtn = document.querySelector('#home-btn')
    let boxBtn = document.querySelector('#box-btn')
    
    let registerHide = document.createElement('a')
    let registerHideImg = document.createElement('img')
    registerHide.setAttribute('id', 'registerHide')
    registerHideImg.setAttribute('src', './src/img/noir_avec_fond_blanc.png')
    
    let connexionHide = document.createElement('a')
    let connexionHideImg = document.createElement('img')
    connexionHide.setAttribute('id', 'connexionHide')
    connexionHideImg.setAttribute('src', './src/img/noir_avec_fond_blanc.png')
    
    
    //Création formulaire connexion
    let formConnexion = document.createElement('form')
    formConnexion.setAttribute('method', 'post')
    formConnexion.setAttribute('id', 'formConnexion')
    formConnexion.setAttribute('action', 'index.php?action=connexionsite')
    homeBtn.append(formConnexion)
    formConnexion.style.display = "none"
    formConnexion.style.flexDirection = "column"
    
    let titleconnexion = document.createElement('h1')
    titleconnexion.setAttribute('id', "titleConnexion")
    formConnexion.append(titleconnexion)
    titleconnexion.innerHTML = "CONNEXION"
    titleconnexion.style.backgroundColor = "#568EA3"
    titleconnexion.style.margin = "0 auto"
    titleconnexion.style.width = "50%"
    titleconnexion.style.textAlign = "center"
    titleconnexion.style.borderRadius = "20px"
    titleconnexion.style.marginBottom = "50px"
    titleconnexion.style.boxShadow = "0px 3px #00000011";
    titleconnexion.style.color = "white"
    titleconnexion.style.animation = "append-animate .3s linear"; 
    
    let connexionPseudo = document.createElement('input')
    formConnexion.append(connexionPseudo)
    connexionPseudo.setAttribute('class', 'connexion-txt')
    connexionPseudo.setAttribute('name', 'connexionPseudo')
    connexionPseudo.placeholder = "Pseudo"
    
    let connexionBoxMDP = document.createElement('div')
    let connexionMDP = document.createElement('input')
    connexionBoxMDP.setAttribute('id', 'connexionBoxMDP')
    connexionHideImg.setAttribute('id', 'connexionHideImg')
    connexionHideImg.style.width = '50px'
    formConnexion.append(connexionBoxMDP)
    connexionBoxMDP.append(connexionMDP)
    connexionBoxMDP.append(connexionHide)
    connexionHide.append(connexionHideImg)
    connexionMDP.setAttribute('class', 'connexion-txt')
    connexionMDP.setAttribute('id', 'connexionMDP')
    connexionMDP.setAttribute('name', 'connexionMDP')
    connexionMDP.setAttribute('type', 'password')
    connexionMDP.placeholder = "Mot de passe"
    
    let btnValidationConnexion = document.createElement('input')
    formConnexion.append(btnValidationConnexion)
    btnValidationConnexion.setAttribute('type', 'submit')
    btnValidationConnexion.setAttribute('id', 'validation-connexion')
    btnValidationConnexion.setAttribute('action', 'connexion')
    btnValidationConnexion.value = "Valider"
    
    //Création formulaire inscription
    let formRegister = document.createElement('form')
    formRegister.setAttribute('method', 'post')
    formRegister.setAttribute('id', 'formRegister')
    formRegister.setAttribute('action', 'index.php?action=inscription')
    homeBtn.append(formRegister)
    formRegister.style.display = "none"
    formRegister.style.flexDirection = "column"
    
    let titleRegister = document.createElement('h1')
    titleRegister.setAttribute('id', "titleRegister")
    formRegister.append(titleRegister)
    titleRegister.innerHTML = "INSCRIPTION"
    titleRegister.style.backgroundColor = "#568EA3"
    titleRegister.style.margin = "0 auto"
    titleRegister.style.width = "50%"
    titleRegister.style.textAlign = "center"
    titleRegister.style.borderRadius = "20px"
    titleRegister.style.marginTop = "30px"
    titleRegister.style.boxShadow = "0px 3px #00000011";
    titleRegister.style.color = "white"
    titleRegister.style.animation = "append-animate .3s linear"; 
    
    let boxRegisterFullName = document.createElement('div')
    formRegister.append(boxRegisterFullName)
    boxRegisterFullName.setAttribute("id", "box-register-fullname")
    
    let registerFirstName = document.createElement('input')
    boxRegisterFullName.append(registerFirstName)
    registerFirstName.setAttribute('class', 'register-txt')
    registerFirstName.setAttribute('name', 'registerFirstName')
    registerFirstName.placeholder = "Nom"
    
    let registerLastName = document.createElement('input')
    boxRegisterFullName.append(registerLastName)
    registerLastName.setAttribute('class', 'register-txt')
    registerLastName.setAttribute('name', 'registerLastName')
    registerLastName.placeholder = "Prénom"
    
    let registerPseudo = document.createElement('input')
    formRegister.append(registerPseudo)
    registerPseudo.setAttribute('class', 'register-txt')
    registerPseudo.setAttribute('name', 'registerPseudo')
    registerPseudo.placeholder = "Pseudo"
    
    let registerMail = document.createElement('input')
    formRegister.append(registerMail)
    registerMail.setAttribute('class', 'register-txt')
    registerMail.setAttribute('type', 'mail')
    registerMail.setAttribute('name', 'registerMail')
    registerMail.placeholder = "Mail"
    
    let registerBoxMDP = document.createElement('div')
    let registerMDP = document.createElement('input')
    registerBoxMDP.setAttribute('id', 'registerBoxMDP')
    registerHideImg.setAttribute('id', 'registerHideImg')
    registerHideImg.style.width = '50px'
    formRegister.append(registerBoxMDP)
    registerBoxMDP.append(registerMDP)
    registerBoxMDP.append(registerHide)
    registerHide.append(registerHideImg)
    registerMDP.setAttribute('class', 'register-txt')
    registerMDP.setAttribute('id', 'registerMDP')
    registerMDP.setAttribute('name', 'registerMDP')
    registerMDP.setAttribute('type', 'password')
    registerMDP.placeholder = "Mot de passe"
    
    let btnValidationRegister = document.createElement('input')
    formRegister.append(btnValidationRegister)
    btnValidationRegister.setAttribute('type', 'submit')
    btnValidationRegister.setAttribute('id', 'validation-register')
    btnValidationRegister.setAttribute('name', 'action')
    btnValidationRegister.value = "Valider"
    
    connexion.addEventListener('click', () =>{
        //déplacement btn et cacher les btn inutiles
        homeTitle.append(register)
        register.style.margin = "0 auto"
        register.style.width = "100%"
        register.style.marginTop = "50px"
        connexion.style.display = "none"
        register.style.display = "block"
        homeBtn.style.width = "40%"
        homeBtn.style.height = "600px"
        homeBtn.style.marginTop = "200px"
        homeBtn.style.borderRadius = "20px"
        boxBtn.style.display = "none"
    
        formConnexion.style.display = "flex"
        formRegister.style.display = "none"
    })
    
    register.addEventListener('click', ()=>{
        homeTitle.append(connexion)
        connexion.style.margin = "0 auto"
        connexion.style.width = "100%"
        connexion.style.marginTop = "50px"
        register.style.display = "none"
        connexion.style.display = "block"
        homeBtn.style.width = "40%"
        homeBtn.style.height = "600px"
        homeBtn.style.marginTop = "200px"
        homeBtn.style.borderRadius = "20px"
        boxBtn.style.display = "none"
        
        formRegister.style.display = "flex"
        formConnexion.style.display = "none"
    })  
    let clickHide = 0
    registerHide.addEventListener('click', () =>{
        clickHide++
        if(clickHide%2 == 0){
            registerHide.style.opacity = "100%"
            registerMDP.type = "password"
        } else {
            registerHide.style.opacity = "50%"
            registerMDP.type = "text"
        }
    })
    connexionHide.addEventListener('click', () =>{
        clickHide++
        if(clickHide%2 == 0){
            connexionHide.style.opacity = "100%"
            connexionMDP.type = "password"
        } else {
            connexionHide.style.opacity = "50%"
            connexionMDP.type = "text"
        }
    })
}
//Largeur < 950px
if(width < 950){
    let connexion = document.querySelector('#connexion')
    let register = document.querySelector('#register')
    let home = document.querySelector('#home')
    let homeTitle = document.querySelector('#home-title-box')
    let homeBtn = document.querySelector('#home-btn')
    let boxBtn = document.querySelector('#box-btn')
    
    let registerHide = document.createElement('a')
    let registerHideImg = document.createElement('img')
    registerHide.setAttribute('id', 'registerHide')
    registerHideImg.setAttribute('src', './src/img/noir_avec_fond_blanc.png')
    
    let connexionHide = document.createElement('a')
    let connexionHideImg = document.createElement('img')
    connexionHide.setAttribute('id', 'connexionHide')
    connexionHideImg.setAttribute('src', './src/img/noir_avec_fond_blanc.png')
    
    
    //Création formulaire connexion
    let formConnexion = document.createElement('form')
    formConnexion.setAttribute('method', 'post')
    formConnexion.setAttribute('id', 'formConnexion')
    formConnexion.setAttribute('action', 'index.php?action=connexionsite')
    homeBtn.append(formConnexion)
    formConnexion.style.display = "none"
    formConnexion.style.flexDirection = "column"
    
    let titleconnexion = document.createElement('h1')
    titleconnexion.setAttribute('id', "titleConnexion")
    formConnexion.append(titleconnexion)
    titleconnexion.innerHTML = "CONNEXION"
    titleconnexion.style.backgroundColor = "#568EA3"
    titleconnexion.style.margin = "0 auto"
    titleconnexion.style.width = "50%"
    titleconnexion.style.textAlign = "center"
    titleconnexion.style.borderRadius = "20px"
    titleconnexion.style.marginBottom = "50px"
    titleconnexion.style.boxShadow = "0px 3px #00000011";
    titleconnexion.style.color = "white"
    titleconnexion.style.animation = "append-animate .3s linear"; 
    
    let connexionPseudo = document.createElement('input')
    formConnexion.append(connexionPseudo)
    connexionPseudo.setAttribute('class', 'connexion-txt')
    connexionPseudo.setAttribute('name', 'connexionPseudo')
    connexionPseudo.placeholder = "Pseudo"
    
    let connexionBoxMDP = document.createElement('div')
    let connexionMDP = document.createElement('input')
    connexionBoxMDP.setAttribute('id', 'connexionBoxMDP')
    connexionHideImg.setAttribute('id', 'connexionHideImg')
    connexionHideImg.style.width = '50px'
    formConnexion.append(connexionBoxMDP)
    connexionBoxMDP.append(connexionMDP)
    connexionBoxMDP.append(connexionHide)
    connexionHide.append(connexionHideImg)
    connexionMDP.setAttribute('class', 'connexion-txt')
    connexionMDP.setAttribute('id', 'connexionMDP')
    connexionMDP.setAttribute('name', 'connexionMDP')
    connexionMDP.setAttribute('type', 'password')
    connexionMDP.placeholder = "Mot de passe"
    
    let btnValidationConnexion = document.createElement('input')
    formConnexion.append(btnValidationConnexion)
    btnValidationConnexion.setAttribute('type', 'submit')
    btnValidationConnexion.setAttribute('id', 'validation-connexion')
    btnValidationConnexion.setAttribute('action', 'connexion')
    btnValidationConnexion.value = "Valider"
    
    //Création formulaire inscription
    let formRegister = document.createElement('form')
    formRegister.setAttribute('method', 'post')
    formRegister.setAttribute('id', 'formRegister')
    formRegister.setAttribute('action', 'index.php?action=inscription')
    homeBtn.append(formRegister)
    formRegister.style.display = "none"
    formRegister.style.flexDirection = "column"
    
    let titleRegister = document.createElement('h1')
    titleRegister.setAttribute('id', "titleRegister")
    formRegister.append(titleRegister)
    titleRegister.innerHTML = "INSCRIPTION"
    titleRegister.style.backgroundColor = "#568EA3"
    titleRegister.style.margin = "0 auto"
    titleRegister.style.width = "50%"
    titleRegister.style.textAlign = "center"
    titleRegister.style.borderRadius = "20px"
    titleRegister.style.marginTop = "30px"
    titleRegister.style.boxShadow = "0px 3px #00000011";
    titleRegister.style.color = "white"
    titleRegister.style.animation = "append-animate .3s linear"; 
    
    let boxRegisterFullName = document.createElement('div')
    formRegister.append(boxRegisterFullName)
    boxRegisterFullName.setAttribute("id", "box-register-fullname")
    
    let registerFirstName = document.createElement('input')
    boxRegisterFullName.append(registerFirstName)
    registerFirstName.setAttribute('class', 'register-txt')
    registerFirstName.setAttribute('name', 'registerFirstName')
    registerFirstName.placeholder = "Nom"
    
    let registerLastName = document.createElement('input')
    boxRegisterFullName.append(registerLastName)
    registerLastName.setAttribute('class', 'register-txt')
    registerLastName.setAttribute('name', 'registerLastName')
    registerLastName.placeholder = "Prénom"
    
    let registerPseudo = document.createElement('input')
    formRegister.append(registerPseudo)
    registerPseudo.setAttribute('class', 'register-txt')
    registerPseudo.setAttribute('name', 'registerPseudo')
    registerPseudo.placeholder = "Pseudo"
    
    let registerMail = document.createElement('input')
    formRegister.append(registerMail)
    registerMail.setAttribute('class', 'register-txt')
    registerMail.setAttribute('type', 'mail')
    registerMail.setAttribute('name', 'registerMail')
    registerMail.placeholder = "Mail"
    
    let registerBoxMDP = document.createElement('div')
    let registerMDP = document.createElement('input')
    registerBoxMDP.setAttribute('id', 'registerBoxMDP')
    registerHideImg.setAttribute('id', 'registerHideImg')
    registerHideImg.style.width = '50px'
    formRegister.append(registerBoxMDP)
    registerBoxMDP.append(registerMDP)
    registerBoxMDP.append(registerHide)
    registerHide.append(registerHideImg)
    registerMDP.setAttribute('class', 'register-txt')
    registerMDP.setAttribute('id', 'registerMDP')
    registerMDP.setAttribute('name', 'registerMDP')
    registerMDP.setAttribute('type', 'password')
    registerMDP.placeholder = "Mot de passe"
    
    let btnValidationRegister = document.createElement('input')
    formRegister.append(btnValidationRegister)
    btnValidationRegister.setAttribute('type', 'submit')
    btnValidationRegister.setAttribute('id', 'validation-register')
    btnValidationRegister.setAttribute('name', 'action')
    btnValidationRegister.value = "Valider"
    
    connexion.addEventListener('click', () =>{
        //déplacement btn et cacher les btn inutiles
        homeTitle.append(register)
        register.style.margin = "0 auto"
        register.style.width = "100%"
        register.style.marginTop = "50px"
        connexion.style.display = "none"
        register.style.display = "block"
        boxBtn.style.display = "none"
        formConnexion.style.display = "flex"
        formRegister.style.display = "none"
    })
    
    register.addEventListener('click', ()=>{
        homeTitle.append(connexion)
        connexion.style.margin = "0 auto"
        connexion.style.width = "100%"
        connexion.style.marginTop = "50px"
        register.style.display = "none"
        connexion.style.display = "block"
        boxBtn.style.display = "none"
        
        formRegister.style.display = "flex"
        formConnexion.style.display = "none"
    })   
    let clickHide = 0
    registerHide.addEventListener('click', () =>{
        clickHide++
        if(clickHide%2 == 0){
            registerHide.style.opacity = "100%"
            registerMDP.type = "password"
        } else {
            registerHide.style.opacity = "50%"
            registerMDP.type = "text"
        }
    })
    connexionHide.addEventListener('click', () =>{
        clickHide++
        if(clickHide%2 == 0){
            connexionHide.style.opacity = "100%"
            connexionMDP.type = "password"
        } else {
            connexionHide.style.opacity = "50%"
            connexionMDP.type = "text"
        }
    })
}
