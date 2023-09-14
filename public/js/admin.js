async function getAllUsers() {
    const response = await fetch('/module-connexion-b2/admin/users', {
        method: 'GET'
    })
    const users = await response.json();
    return users;
}

async function createUsersInTable() {
    const userBodyTable = document.querySelector('#users_table tbody');
    const users = await getAllUsers()

    users.forEach(user => {
        const line = document.createElement('tr')
        line.id = 'tr_user_' + user.id

        const idCell = document.createElement('td')
        idCell.className = "id_cell"
        idCell.textContent = user.id
        line.appendChild(idCell)

        const loginCell = document.createElement('td')
        loginCell.className = "login_cell"
        loginCell.textContent = user.login
        line.appendChild(loginCell)

        const firstnameCell = document.createElement('td')
        firstnameCell.className = "firstname_cell"
        firstnameCell.textContent = user.firstname
        line.appendChild(firstnameCell)

        const lastnameCell = document.createElement('td')
        lastnameCell.className = "lastname_cell"
        lastnameCell.textContent = user.lastname
        line.appendChild(lastnameCell)

        const deleteCell = document.createElement('td')
        deleteCell.className = "delete_cell"
        const delButton = document.createElement('button')
        delButton.className = "del_button"
        delButton.id = "del_" + user.id
        delButton.innerText = "Supprimer"
        deleteCell.appendChild(delButton)
        line.appendChild(deleteCell)

        userBodyTable.appendChild(line)
    });

    activeDelButtons()
}


function activeDelButtons() {
    const delButtons = document.querySelectorAll('.del_button')

    console.log(delButtons)

    delButtons.forEach(delButton => {
        delButton.addEventListener('click', (e) => {
            const id = e.target.id.split('_')[1]
            delUser(id)
        })
    })
}

async function delUser(id) {
    const response = await fetch('/module-connexion-b2/admin/users/' + id, {
        method: 'DELETE'
    })
    const text = await response.text()
    if (text === 'OK') {
        document.getElementById('tr_user_' + id).remove()
        document.getElementById('message').innerText = "Utilisateur supprimé"
        setTimeout(() => {
            document.getElementById('message').innerText = ""
        }, 2000)
    }
}

createUsersInTable()
