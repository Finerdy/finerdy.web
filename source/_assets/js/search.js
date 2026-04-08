// Client-side docs search powered by Fuse.js over a static JSON index
// generated at build time by App\Listeners\GenerateSearchIndex.

const FUSE_OPTIONS = {
    keys: [
        { name: 'title', weight: 0.5 },
        { name: 'headings', weight: 0.3 },
        { name: 'description', weight: 0.15 },
        { name: 'body', weight: 0.05 },
    ],
    threshold: 0.35,
    ignoreLocation: true,
    minMatchCharLength: 2,
    includeMatches: true,
};

let fuseInstance = null;
let loadPromise = null;
let activeIndex = -1;

async function loadFuse(input) {
    if (fuseInstance) return fuseInstance;
    if (loadPromise) return loadPromise;

    loadPromise = (async () => {
        const [{ default: Fuse }, indexResponse] = await Promise.all([
            import('fuse.js'),
            fetch('/search-index.json', { cache: 'force-cache' }),
        ]);

        if (!indexResponse.ok) {
            throw new Error('search index not available');
        }

        const lang = input.dataset.lang || document.documentElement.lang || 'en';
        const index = (await indexResponse.json()).filter(entry => entry.lang === lang);

        fuseInstance = new Fuse(index, FUSE_OPTIONS);
        return fuseInstance;
    })();

    try {
        return await loadPromise;
    } catch (err) {
        loadPromise = null;
        throw err;
    }
}

function escapeHtml(str) {
    return String(str ?? '')
        .replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;')
        .replace(/'/g, '&#39;');
}

function renderResults(results, resultsEl, emptyText) {
    activeIndex = -1;

    if (results.length === 0) {
        resultsEl.innerHTML = `<div class="px-4 py-6 text-center text-sm text-gray-500">${escapeHtml(emptyText)}</div>`;
        return;
    }

    resultsEl.innerHTML = results
        .slice(0, 8)
        .map((result, i) => {
            const item = result.item;
            const headingMatch = (result.matches || []).find(m => m.key === 'headings');
            const bodyMatch = (result.matches || []).find(m => m.key === 'body');
            const snippetSource = headingMatch
                ? item.headings[headingMatch.refIndex ?? 0]
                : (bodyMatch ? item.body : item.description);
            const snippet = snippetSource
                ? escapeHtml(String(snippetSource).slice(0, 140))
                : '';

            return `
                <a href="${escapeHtml(item.url)}"
                   role="option"
                   data-index="${i}"
                   class="block px-4 py-3 border-b border-gray-100 last:border-b-0 hover:bg-gray-50 focus:bg-gray-50 focus:outline-none">
                    <div class="text-sm font-medium text-gray-900">${escapeHtml(item.title)}</div>
                    ${snippet ? `<div class="mt-0.5 text-xs text-gray-500 line-clamp-2">${snippet}</div>` : ''}
                </a>
            `;
        })
        .join('');
}

function showResults(input, resultsEl) {
    resultsEl.classList.remove('hidden');
    input.setAttribute('aria-expanded', 'true');
}

function hideResults(input, resultsEl) {
    resultsEl.classList.add('hidden');
    input.setAttribute('aria-expanded', 'false');
    activeIndex = -1;
}

function setActive(resultsEl, index) {
    const items = resultsEl.querySelectorAll('[role="option"]');
    if (items.length === 0) return;

    activeIndex = (index + items.length) % items.length;
    items.forEach((el, i) => {
        if (i === activeIndex) {
            el.classList.add('bg-gray-50');
            el.scrollIntoView({ block: 'nearest' });
        } else {
            el.classList.remove('bg-gray-50');
        }
    });
}

function initSearch() {
    const input = document.getElementById('docs-search-input');
    const resultsEl = document.getElementById('docs-search-results');
    if (!input || !resultsEl) return;

    const runSearch = async () => {
        const query = input.value.trim();
        if (query.length < 2) {
            hideResults(input, resultsEl);
            return;
        }

        try {
            const fuse = await loadFuse(input);
            const results = fuse.search(query);
            renderResults(results, resultsEl, input.dataset.empty || 'No results');
            showResults(input, resultsEl);
        } catch (err) {
            resultsEl.innerHTML = `<div class="px-4 py-6 text-center text-sm text-gray-500">${escapeHtml(input.dataset.unavailable || 'Search unavailable')}</div>`;
            showResults(input, resultsEl);
        }
    };

    // Warm up the index on first focus so the first keystroke is snappy.
    input.addEventListener('focus', () => {
        loadFuse(input).catch(() => {});
    }, { once: true });

    input.addEventListener('input', runSearch);

    input.addEventListener('keydown', (e) => {
        const items = resultsEl.querySelectorAll('[role="option"]');

        if (e.key === 'ArrowDown') {
            e.preventDefault();
            if (items.length > 0) setActive(resultsEl, activeIndex + 1);
        } else if (e.key === 'ArrowUp') {
            e.preventDefault();
            if (items.length > 0) setActive(resultsEl, activeIndex - 1);
        } else if (e.key === 'Enter') {
            if (activeIndex >= 0 && items[activeIndex]) {
                e.preventDefault();
                window.location.href = items[activeIndex].getAttribute('href');
            }
        } else if (e.key === 'Escape') {
            hideResults(input, resultsEl);
            input.blur();
        }
    });

    document.addEventListener('click', (e) => {
        if (!input.contains(e.target) && !resultsEl.contains(e.target)) {
            hideResults(input, resultsEl);
        }
    });

    // Global shortcut: Cmd/Ctrl+K focuses the search input.
    document.addEventListener('keydown', (e) => {
        if ((e.metaKey || e.ctrlKey) && e.key.toLowerCase() === 'k') {
            e.preventDefault();
            input.focus();
            input.select();
        }
    });
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initSearch);
} else {
    initSearch();
}
