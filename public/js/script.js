const signInBtn = document.getElementById('sign_in');
const logInBtn = document.getElementById('log_in');

signInBtn?.addEventListener('click', (e) => {
    e.preventDefault();
    const popUpDiv = document.createElement('div');
    popUpDiv.className = 'pop_up';
    const form = signInForm();
    form.prepend(closeBtn(popUpDiv));
    popUpDiv.appendChild(form);
    document.body.appendChild(popUpDiv);
    form.addEventListener('submit', (ev) => {
        ev.preventDefault()
        const data = new FormData(form);
        fetch('/module-connexion-b2/register', {
            method: 'POST',
            body: data
        }).then(response => {
            if (response.status === 200) {
                console.log('ok');
            }
        })
    })
})

logInBtn?.addEventListener('click', (e) => {
    e.preventDefault();
    const popUpDiv = document.createElement('div');
    popUpDiv.className = 'pop_up';
    const form = logInForm();
    form.prepend(closeBtn(popUpDiv));
    popUpDiv.appendChild(form);
    document.body.appendChild(popUpDiv);
    form.addEventListener('submit', (ev) => {
        ev.preventDefault()
        const data = new FormData(form);
        fetch('/module-connexion-b2/login', {
            method: 'POST',
            body: data
        }).then(response => {
            if (response.status === 200) {
                console.log('ok');
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