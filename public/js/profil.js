const changeProfilForm = document.getElementById('change_profil');
const changePasswordForm = document.getElementById('change_pwd');

function handleChangeProfilSubmit(e) {
    e.preventDefault();
    const data = new FormData(changeProfilForm);
    fetch('/module-connexion-b2/profil', {
        method: 'POST',
        body: data
    })
        .then(response => response.text())
        .then(text => {
            const updateMessage = document.getElementById('update_message');
            updateMessage.innerHTML = text;
            setTimeout(() => {
                updateMessage.innerHTML = '';
            }, 2000)
        })
        .catch(error => {
            console.error(error);
        })
}

function handleChangePasswordSubmit(e) {
    e.preventDefault();
    const data = new FormData(changePasswordForm);
    fetch('/module-connexion-b2/profil/pwd', {
        method: 'POST',
        body: data
    })
        .then(response => response.text())
        .then(text => {
            const updatePwd = document.getElementById('update_pwd_message');
            updatePwd.innerHTML = text;
            setTimeout(() => {
                updatePwd.innerHTML = '';
            }, 2000)
        })
        .catch(error => {
            console.error(error);
        })
}

changeProfilForm?.addEventListener('submit', handleChangeProfilSubmit)
changePasswordForm?.addEventListener('submit', handleChangePasswordSubmit)
