document.addEventListener('click', function (e) {
    const link = e.target.closest('a');
    if (!link) return;

    const href = link.getAttribute('href');
    if (!href) return;

    // Only intercept our two real routes
    const isHome = href === docsCloneData.homeUrl || href === docsCloneData.homeUrl.replace(/\/$/, '');
    const isGettingStarted = href === docsCloneData.gsUrl || href === docsCloneData.gsUrl.replace(/\/$/, '');

    if (!isHome && !isGettingStarted) return;

    e.preventDefault();

    fetch(href)
        .then(res => res.text())
        .then(html => {
            const parser = new DOMParser();
            const doc = parser.parseFromString(html, 'text/html');
            const newMain = doc.querySelector('main.site-main');
            const currentMain = document.querySelector('main.site-main');

            if (newMain && currentMain) {
                currentMain.innerHTML = newMain.innerHTML;
                document.title = doc.title;
                window.history.pushState({}, '', href);

                // update active nav link state
                // update active nav link state
                document.querySelectorAll('.navbar-links a').forEach(a => a.classList.remove('nav-active'));
                if (isHome) {
                    document.querySelector('.navbar-links a[href="' + docsCloneData.homeUrl + '"]').classList.add('nav-active');
                }
                if (isGettingStarted) {
                    const gsNavLink = document.querySelector('.navbar-links a.nav-getting-started');
                    if (gsNavLink) gsNavLink.classList.add('nav-active');
                }    
            }
        });
});

window.addEventListener('popstate', function () {
    fetch(window.location.href)
        .then(res => res.text())
        .then(html => {
            const parser = new DOMParser();
            const doc = parser.parseFromString(html, 'text/html');
            const newMain = doc.querySelector('main.site-main');
            const currentMain = document.querySelector('main.site-main');
            if (newMain && currentMain) {
                currentMain.innerHTML = newMain.innerHTML;
                document.title = doc.title;
            }
        });
});