let userModal = document.getElementById("user-modal")
let loginModal = document.getElementById("login-modal")

const toggleModal = () => {
    const modalStyle = getComputedStyle(userModal)
    if (modalStyle.display === "block") {
        userModal.style.display = "none"
        return
    }
    userModal.style.display = "block"
}

const toggleLoginModal = () => {
    const modalStyle = getComputedStyle(loginModal)
    if (modalStyle.display === "flex") {
        loginModal.style.display = "none"
        return
    }
    loginModal.style.display = "flex"
}

const onLoginDialogClose = () => {
    loginModal.style.display = "none"
    window.history.replaceState(null, null, window.location.href);
}

const onLoginClick = () => {
    toggleModal()
    toggleLoginModal()
}

const onSignUpClick = () => {
    window.location.href = "/signUp.php";
}

const onHostYourHomeClick = () => {
    // TODO: Redirect User to Hosting Page
    window.location.href = "/host_register.php";
}

const onHelpClick = () => {
    // TODO: Redirect User to Help Page
}

const onLogOutClick = () => {
    // TODO: Go to log out
    window.location.href = "/controllers/auth/logout.php";
}

const onProfileClick = () => {
    // TODO: Go to profile
    window.location.href = "/profile.php";
}

const onManageStayClick = () => {
    window.location.href = "/manage_my_space.php";
}

const onMyBooking = () => {
    window.location.href = "/show_book.php";
}