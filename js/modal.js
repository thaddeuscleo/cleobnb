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
    // TODO: Go TO Sign Up Page
}

const onHostYourHomeClick = () => {
    // TODO: Go To Host Registration Page
}

const onLogOutClick = () => {
    // TODO: Log the user out
}

const onProfileClick = () => {
    // TODO: Go To Profile Page
}

const onManageStayClick = () => {
    // TODO: Go To Manage Spage Page
}

const onMyBooking = () => {
    // TODO: Go To Show Bookings Page
}