const signup = document.querySelector('.t-signup');
const login = document.querySelector('.t-login');
const addclass = document.querySelector('.site');

signup.addEventListener('click', function() {
    addclass.className = 'site signup-show';
})

login.addEventListener('click', function() {
    addclass.className = 'site login-show';
})