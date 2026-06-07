/*!
* Start Bootstrap - Clean Blog v6.0.9 (https://startbootstrap.com/theme/clean-blog)
* Copyright 2013-2023 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-clean-blog/blob/master/LICENSE)
*/
window.addEventListener('DOMContentLoaded', () => {
    let scrollPos = 0;
    const mainNav = document.getElementById('mainNav');
    const headerHeight = mainNav.clientHeight;
    window.addEventListener('scroll', function() {
        const currentTop = document.body.getBoundingClientRect().top * -1;
        if ( currentTop < scrollPos) {
            // Scrolling Up
            if (currentTop > 0 && mainNav.classList.contains('is-fixed')) {
                mainNav.classList.add('is-visible');
            } else {
                console.log(123);
                mainNav.classList.remove('is-visible', 'is-fixed');
            }
        } else {
            // Scrolling Down
            mainNav.classList.remove(['is-visible']);
            if (currentTop > headerHeight && !mainNav.classList.contains('is-fixed')) {
                mainNav.classList.add('is-fixed');
            }
        }
        scrollPos = currentTop;
    });

    // infinite load
    const postsContainer = document.getElementById('posts-container');
    const spinner = document.getElementById('loading-spinner');

    if (postsContainer && spinner) {
        let nextPageUrl = postsContainer.getAttribute('data-next-page-url');
        let loading = false;

        window.addEventListener('scroll', function() {
            // window.innerHeight - высота видимой области сайта
            // window.scrollY - кол-во пикселей, которые были проскроллены
            // document.body.offsetHeight - высота body, то есть всего сайта
            if (window.innerHeight + window.scrollY >= document.body.offsetHeight - 500 && nextPageUrl && !loading) {
                loadMore();
            }
        });

        async function loadMore() {
            loading = true;
            // убираем класс, который скрывает наш спиннер
            spinner.classList.remove('d-none');

            try {
                const response = await fetch(nextPageUrl, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });

                const data = await response.json();

                const div = document.createElement('div');
                div.innerHTML = data.html;

                while (div.firstChild) {
                    postsContainer.appendChild(div.firstChild);
                }

                nextPageUrl = data.nextPageUrl;
            } catch (error) {
                console.error('Error loading posts:', error);
            } finally {
                loading = false;
                spinner.classList.add('d-none');
            }
        }
    }
})
