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

        userBodyTable.appendChild(line)
    });
}

createUsersInTable()
