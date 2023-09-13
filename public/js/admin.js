const userTable = document.getElementById('users_table');

async function getAllUsers() {
    const response = await fetch('/module-connexion-b2/admin/users', {
        method: 'GET'
    })
    const users = await response.json();
    return users;
}

async function putInTable($) {
    const users = await getAllUsers()
    users.forEach(user => {
        const line = document.createElement('tr')
        
    });
}
