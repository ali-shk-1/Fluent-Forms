document.addEventListener('click', function (e) {
    const link = e.target.closest('a');
    if (!link) return;

    const href = link.getAttribute('href');
    if (!href) return;

    const url = new URL(href, window.location.origin);
    if (url.origin !== window.location.origin) return;
    const path = url.pathname.replace(/^\/|\/$/g, '');

    const isDocsRoute = docsCloneData.allSlugs.includes(path) || path === '';

    if (!isDocsRoute) return;

    const isHome = href === docsCloneData.homeUrl || href === docsCloneData.homeUrl.replace(/\/$/, '');
    const isGettingStarted = href === docsCloneData.gsUrl || href === docsCloneData.gsUrl.replace(/\/$/, '');
    
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
                document.querySelectorAll('.sidebar-link.active').forEach(function (link) {
                    const section = link.closest('.sidebar-section');
                    if (section) section.classList.add('open');
                    const subgroup = link.closest('.sidebar-subgroup');
                    if (subgroup) subgroup.classList.add('open');
                });
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
                document.querySelectorAll('.sidebar-link.active').forEach(function (link) {
                    const section = link.closest('.sidebar-section');
                    if (section) section.classList.add('open');
                    const subgroup = link.closest('.sidebar-subgroup');
                    if (subgroup) subgroup.classList.add('open');
                });
                document.title = doc.title;
            }
        });
});

document.addEventListener('click', function (e) {
    const btn = e.target.closest('.js-toggle');
    if (!btn) return;
    e.stopPropagation();

    if (btn.classList.contains('sidebar-heading')) {
        btn.closest('.sidebar-section').classList.toggle('open');
    } else {
        btn.closest('.sidebar-subgroup').classList.toggle('open');
    }
});

// Auto-open the section containing the active link on load
document.querySelectorAll('.sidebar-link.active').forEach(function (link) {
    const section = link.closest('.sidebar-section');
    if (section) section.classList.add('open');
    const subgroup = link.closest('.sidebar-subgroup');
    if (subgroup) subgroup.classList.add('open');
});