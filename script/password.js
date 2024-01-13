const senha = document.querySelector('.senha');
const btn = document.querySelector('.btn');

btn.onclick = () =>{
    if (senha.type === 'password') {
        senha.type = 'text'
    } else {
        senha.type = 'password'
    }
}