function setupDeleteLinks() {
    let deleteLinks = document.querySelectorAll('a.link-delete');
        for (let link of deleteLinks) {
        link.addEventListener('click', function (event) {
            event.preventDefault();
            if (window.confirm('Do you want delete this?')) {
                location.assign(link.href);
            }
        });
    }
}
document.addEventListener("DOMContentLoaded", function () {
    setupDeleteLinks();
});
