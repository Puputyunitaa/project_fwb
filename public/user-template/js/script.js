const sidebarToggle = document.querySelector("#sidebar-toggle");
sidebarToggle.addEventListener("click", function() {
    document.querySelector("#sidebar").classList.toggle("collapsed");
});

document.querySelector(".theme-toggle").addEventListener("click", () => {
    toggleLocalStorage();
    toggleRootClass();
});

function toggleRootClass() {
    const current = document.documentElement.getAttribute('data-bs-theme');
    const inverted = current == 'dark' ? 'light' : 'dark';
    document.documentElement.setAttribute('data-bs-theme', inverted);
}

function toggleLocalStorage() {
    if (isLight()) {
        localStorage.removeItem("light");
    } else {
        localStorage.setItem("light", "set");
    }
}

function isLight() {
    return localStorage.getItem("light");
}

if  (isLight()) {
    toggleRootClass();
}

// content
document.getElementById('btnAdd').addEventListener('click', function () {
    let formContainer = document.getElementById('formContainer');
    let submitAdd = document.getElementById('submitAdd');
    let submitEdit = document.getElementById('submitEdit');

    if (formContainer.style.display === 'block') {
        formContainer.style.display = 'none';
    } else {
        formContainer.style.display = 'block';
        submitAdd.style.display = 'inline-block';
        submitEdit.style.display = 'none';
    }
});

document.getElementById('btnCancel').addEventListener('click', function () {
    document.getElementById('formContainer').style.display = 'none';
});

document.querySelectorAll('.btnEdit').forEach(function (btn) {
    btn.addEventListener('click', function () {
        document.getElementById('formContainer').style.display = 'block';
        document.getElementById('submitAdd').style.display = 'none';
        document.getElementById('submitEdit').style.display = 'inline-block';
    });
});