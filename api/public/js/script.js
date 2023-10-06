document.addEventListener("DOMContentLoaded", function () {
    
    

    $('.account-open-trigger').onclick = function () {
        if (document.querySelector('.account-open-box').style.display == 'none') {
            document.querySelector('.account-open-box').style.display = 'block';
        } else {
            document.querySelector('.account-open-box').style.display = 'none';
        }
    }
})
console.log('Loading script.js 2022-01-08')
