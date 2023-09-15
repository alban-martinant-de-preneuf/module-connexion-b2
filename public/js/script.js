const signInBtn = document.getElementById('sign_in');
const logInBtn = document.getElementById('log_in');
const logOutBtns = document.querySelectorAll('.log_out');

function displaySignInForm() {
    const popUpDiv = document.createElement('div');
    popUpDiv.className = 'pop_up';
    const form = signInForm();
    form.prepend(closeBtn(popUpDiv));
    popUpDiv.appendChild(form);
    document.body.appendChild(popUpDiv);
    activeVerifyPwd();
    form.addEventListener('submit', (ev) => {
        ev.preventDefault()
        const data = new FormData(form);
        fetch('/module-connexion-b2/register', {
            method: 'POST',
            body: data
        }).then(response => {
            if (response.ok) {
                popUpDiv.remove();
                displayLoginForm();
            }
        })
    })
}

signInBtn?.addEventListener('click', (e) => {
    e.preventDefault();
    displaySignInForm();
})

function displayLoginForm() {
    const popUpDiv = document.createElement('div');
    popUpDiv.className = 'pop_up';
    const form = logInForm();
    form.prepend(closeBtn(popUpDiv));
    popUpDiv.appendChild(form);
    document.body.appendChild(popUpDiv);
    activeVerifyPwd();
    form.addEventListener('submit', (ev) => {
        ev.preventDefault()
        const data = new FormData(form);
        fetch('/module-connexion-b2/login', {
            method: 'POST',
            body: data
        }).then(response => {
            if (response.ok) {
                window.location.reload();
            }
        })
    })
}

logInBtn?.addEventListener('click', (e) => {
    e.preventDefault();
    displayLoginForm();
})

logOutBtns.forEach(logOutBtn => {
    logOutBtn.addEventListener('click', (e) => {
        e.preventDefault();
        fetch('/module-connexion-b2/logout', {
            method: 'GET'
        }).then(response => {
            if (response.ok) {
                window.location.reload();
            }
        })
    })
})

function signInForm() {
    const form = document.createElement('form');
    form.setAttribute('id', 'sign_in_form');
    const inputs = ['login', 'firstname', 'lastname', 'password', 'password2'];
    const labels = ['Login', 'Prénom', 'Nom', 'Mot de passe', 'Confirmation du mot de passe'];
    const types = ['text', 'text', 'text', 'password', 'password'];
    const ids = ['login', 'firstname', 'lastname', 'password', 'password2'];
    const names = ['login', 'firstname', 'lastname', 'password', 'password2'];
    const placeholders = ['Enter login', 'Enter first name', 'Enter last name', 'Enter password', 'Confirm password'];
    const btn = document.createElement('button');
    btn.setAttribute('type', 'submit')
    btn.innerText = 'S\'inscrire';

    for (let i = 0; i < inputs.length; i++) {
        const label = document.createElement('label');
        const labelText = document.createTextNode(labels[i]);
        const input = document.createElement('input');
        label.appendChild(labelText);
        input.setAttribute('type', types[i]);
        input.setAttribute('id', ids[i]);
        input.setAttribute('name', names[i]);
        input.setAttribute('placeholder', placeholders[i]);
        form.appendChild(label);
        form.appendChild(input);
    }
    form.appendChild(btn);

    return form;
}

function activeVerifyPwd() {
    const pwd = document.getElementById('password');
    const pwd2 = document.getElementById('password2');
    const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,}$/;
    pwd.addEventListener('input', (e) => {
        if (regex.test(pwd.value)) {
            pwd.style.border = '1px solid green';
            pwd.style.backgroundColor = 'lightgreen';
        } else {
            pwd.style.border = '1px solid red';
            pwd.style.backgroundColor = 'pink';
        }
    })
    pwd2?.addEventListener('input', (e) => {
        if (pwd.value === pwd2.value) {
            pwd2.style.border = '1px solid green';
            pwd2.style.backgroundColor = 'lightgreen';
        } else {
            pwd2.style.border = '1px solid red';
            pwd2.style.backgroundColor = 'pink';
        }
    })
}

function logInForm() {
    const form = document.createElement('form');
    form.setAttribute('id', 'log_in_form');
    const inputs = ['login', 'password'];
    const labels = ['Login', 'Mot de passe'];
    const types = ['text', 'password'];
    const ids = ['login', 'password'];
    const names = ['login', 'password'];
    const placeholders = ['Enter login', 'Enter password'];
    const btn = document.createElement('button');
    btn.setAttribute('type', 'submit')
    btn.innerText = 'Se connecter';

    for (let i = 0; i < inputs.length; i++) {
        const label = document.createElement('label');
        const labelText = document.createTextNode(labels[i]);
        const input = document.createElement('input');
        label.appendChild(labelText);
        input.setAttribute('type', types[i]);
        input.setAttribute('id', ids[i]);
        input.setAttribute('name', names[i]);
        input.setAttribute('placeholder', placeholders[i]);
        form.appendChild(label);
        form.appendChild(input);
    }
    form.appendChild(btn);

    return form;
}

function closeBtn(elementToClose) {
    const closeBtn = document.createElement('button');
    closeBtn.className = 'close_btn';
    closeBtn.innerText = 'X';
    closeBtn.addEventListener('click', (e) => {
        elementToClose.remove();
    })

    return closeBtn;
}