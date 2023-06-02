const allDropdown = document.querySelectorAll('#sidebar .side-dropdown');
allDropdown.forEach(item => {
    const a = item.parentElement.querySelector('a:first-child');
    a.addEventListener('click', function (e) {
        e.preventDefault();

        if (!this.classList.contains('active')) {
            allDropdown.forEach(i => {
                const aLink = i.parentElement.querySelector('a:first-child');

                aLink.classList.remove('active')
                i.classList.remove('show')
            })
        }

        this.classList.toggle('active')
        item.classList.toggle('show')
    })
})


// PROFILE DROPDOWN
const profile = document.querySelector('nav .profile');
const imgProfile = profile.querySelector('img');
const textProfile = profile.querySelector('span');
const dropdownProfile = document.querySelector('.profile-link');

imgProfile.addEventListener('click', function () {
    dropdownProfile.classList.toggle('show');
})
textProfile.addEventListener('click', function () {
    dropdownProfile.classList.toggle('show');
})

window.addEventListener('click', function (e) {
    if (e.target !== (imgProfile, textProfile)) {
        if (e.target !== dropdownProfile) {
            if (dropdownProfile.classList.contains('show')) {
                dropdownProfile.classList.remove('show');
            }
        }
    }
})

// PROGRESSBAR
const allProgress = document.querySelectorAll('main .card .progress');

allProgress.forEach(item => {
    item.style.setProperty('--value', item.dataset.value)
})



