const ctn = document.getElementById('ctn');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () => {
    ctn.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    ctn.classList.remove("active");
});
