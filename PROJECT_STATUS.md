# Akorn - Status Projektu

## Stack
- WordPress 6.9 + Bedrock (Composer)
- Sage 11 + Acorn 5 (Blade, View Composers)
- Tailwind CSS 4 + Vite 6
- ACF Pro
- Rank Math SEO (breadcrumby)
- PHP 8.3+ (staging), PHP 8.4 (local)

## Środowiska
| Env | URL | Repo |
|-----|-----|------|
| Local | `http://akorn.local` | `E:/LocalSites/akorn/app/akorn` |
| Staging | `https://wdb-creative.pl` | SSH: `wiktor1249@wiktor1249.ssh.dhosting.pl` → `wdb-creative.pl/bedrock/` |
| GitHub | — | `https://github.com/wdabek85/akorn.git` (branch: main) |

### Deploy na staging
```bash
ssh wiktor1249@wiktor1249.ssh.dhosting.pl
cd wdb-creative.pl/bedrock
git pull origin main
php83 ~/composer.phar install --no-dev
cd web/app/themes/akron-theme
php83 ~/composer.phar install --no-dev --ignore-platform-req=php
npm install && npm run build
```

### Uwagi staging
- PHP www: 8.3 (ustawione przez hosting)
- Theme composer: `--ignore-platform-req=php` (lock wymaga 8.4, serwer ma 8.3)
- `.htaccess` w `public_html/` zawiera basic auth (user: wiktor, pass: staging2026)
- Symlinki: `public_html/app` → `bedrock/web/app`, `public_html/wp` → `bedrock/web/wp`
- `wp-config.php` w `public_html/` — ścieżki do `bedrock/vendor/` i `bedrock/config/`
- Obrazy: `get_theme_file_uri()` zamiast `Vite::asset()` (Vite nie przetwarza images)

---

## Komponenty gotowe

### Blade Components
| Komponent | Plik | Opis |
|-----------|------|------|
| `<x-button>` | `components/button.blade.php` | Przycisk/link z wariantami (primary/secondary), rozmiarami (sm/md/lg), slotami na ikony |
| `<x-alert>` | `components/alert.blade.php` | Alert z wariantami (success/caution/warning) |
| `<x-blog-posts>` | `components/blog-posts.blade.php` | Reużywalny blok postów (propsy: category, count, heading, label, description, exclude). Auto reading time |
| `<x-icon.*>` | `components/icon/*.blade.php` | SVG ikony: arrow-down, arrow-circle-right, chevron-down, chevron-right, chevron-up, diamond, document, hamburger, location, mail, minus-circle, phone, plus-circle, support |

### Sekcje (reużywalne)
| Sekcja | Plik | Typ | Opis |
|--------|------|-----|------|
| Header | `sections/header/` | Layout | Top bar, nav bar, mega menu (ACF Options), mobile drawer |
| Footer | `sections/footer/index.blade.php` | Hardcode | 4 kolumny (dane, kontakt, usługi), copyright |
| Hero (główna) | `sections/hero/index.blade.php` | ACF | Breadcrumby, tytuł, opis, CTA, obraz + panel statystyk |
| Page Hero | `sections/page-hero/index.blade.php` | ACF | Hero podstron (tytuł, opis, 2 panele zdjęć) |
| Usługi | `sections/uslugi/index.blade.php` | ACF | Akordeon usług z CTA |
| Usługi Grid | `sections/uslugi-grid/` | Hardcode | 6 kart usług (2 warianty: white/orange), `card.blade.php` |
| Portfolio | `sections/portfolio/index.blade.php` | ACF | Rozwijane projekty z animacją zdjęcia |
| Jak działamy | `sections/jak-dzialamy/index.blade.php` | Hardcode | Timeline pionowy 4 kroków + CTA + zdjęcie |
| Proces | `sections/proces/index.blade.php` | Hardcode | 4 kroki horyzontalnie (desktop) / pionowo z linią (mobile) |
| Benefits | `sections/benefits/` | ACF / FC | Karty z 2 wariantami (`default` / `features`), `card.blade.php` |
| Opinie | `sections/opinie/index.blade.php` | ACF Options | Slider opinii z drag-scroll |
| CTA | `sections/cta/index.blade.php` | Hardcode | Banner z logo |
| Newsletter | `sections/newsletter/index.blade.php` | Hardcode | Formularz email, tło w containerze |
| Kontakt | `sections/kontakt/index.blade.php` | Hardcode | Dane kontaktowe + formularz AJAX |
| Stats | `sections/stats/index.blade.php` | FC | Statystyki z wykresami (3 kolumny rosnącej wysokości) |
| Platforms | `sections/platforms/index.blade.php` | FC | Grid logotypów platform |
| Highlights | `sections/highlights/index.blade.php` | FC | Punkty z opisem + zdjęcie |
| Flexible | `sections/flexible/` | FC | Router Flexible Content (switch po layoutach) |

### Sekcje O nas
| Sekcja | Plik | Typ |
|--------|------|-----|
| Hero | `sections/about/hero.blade.php` | Hardcode |
| Story | `sections/about/story.blade.php` | Hardcode |
| Stats | `sections/about/stats.blade.php` | ACF |
| Honesty | `sections/about/honesty.blade.php` | Hardcode |
| Partner | `sections/about/partner.blade.php` | Hardcode |
| CTA | `sections/about/cta.blade.php` | Hardcode |

### Mega Menu
| Element | Źródło |
|---------|--------|
| Główne linki (Strona główna, Portfolio, Blog, Kontakt) | WP Admin → Wygląd → Menu (Primary Navigation) |
| Usługi dropdown (opisy, zdjęcia, hover preview) | WP Admin → Mega Menu (ACF Options Page) |
| Mobile akordeon usług | Automatycznie z ACF Options |
| Rozpoznanie itemu "Usługi" | `str_contains(strtolower($item['title']), 'usług')` |

### View Composers
| Composer | Widoki | Dane |
|----------|--------|------|
| `App.php` | `*` | `siteName` |
| `Hero.php` | `sections.hero.index` | `hero` (title, text, tagText, image) |
| `Uslugi.php` | `sections.uslugi.index` | `uslugi` (heading, description, ctaText, ctaLink, items[]) |
| `Portfolio.php` | `sections.portfolio.index` | `portfolio` (label, heading, items[]) |
| `Benefits.php` | `sections.benefits.index` | `benefits` (label, heading, description, variant, items[]) |
| `Opinie.php` | `sections.opinie.index` | `opinie` (heading, description, items[]) — ACF Options |
| `Navigation.php` | `sections.header.*` | `menuItems` (z wp_nav_menu), `menuServices` (ACF Options) |
| `PageHero.php` | `sections.page-hero.index` | `pageHero` (title, description, images, captions) |
| `PageSections.php` | `sections.flexible.index` | `flexSections` (Flexible Content layouts) |
| `AboutStats.php` | `sections.about.stats` | `aboutStats` (repeater: value, label, link) |
| `Post.php` | `partials.*` | `title`, `pagination` |
| `Comments.php` | `partials.comments` | comments data |

### JS Moduły
| Moduł | Opis |
|-------|------|
| `mobile-menu.js` | Toggle mobile menu + akordeon usług |
| `accordion.js` | Akordeon (sekcja usługi) |
| `portfolio.js` | Portfolio toggle z animacją width/height |
| `drag-scroll.js` | Drag-to-scroll na desktop (opinie slider) |
| `mega-menu.js` | Hover mega menu z preview zdjęciem |
| `forms.js` | AJAX submit formularzy (kontakt + newsletter) |

### Backend formularzy
| Handler | Endpoint | Zabezpieczenia |
|---------|----------|----------------|
| `akorn_contact` | `admin-ajax.php` | Nonce, honeypot, rate limit (5/h per IP), sanitization, walidacja |
| `akorn_newsletter` | `admin-ajax.php` | Nonce, honeypot, rate limit (3/h per IP), sanitization |

### ACF Field Groups
| Grupa | Lokalizacja | Pola |
|-------|-------------|------|
| Main-Hero | Front page | hero-tiitle, hero-desc, hero-tag-text, hero-img |
| Usługi | Front page | uslugi_heading, uslugi_description, uslugi_cta_*, uslugi_items (repeater) |
| Portfolio | Front page | portfolio_label, portfolio_heading, portfolio_items (repeater) |
| Benefits | Front page, template-uslugi, template-usluga, template-o-nas | benefits_label, benefits_heading, benefits_items (repeater z wariantami kolorów) |
| Statystyki O nas | template-o-nas | about_stats_items (repeater: value, label, link) |
| Hero Podstrony | template-uslugi, template-usluga | page_hero_title, page_hero_description, images, captions |
| Sekcje strony (FC) | template-usluga | Flexible Content: benefits, opinie, cta, kontakt, newsletter, proces, uslugi_grid, blog, stats, platforms, highlights |

### ACF Options Pages
| Strona | Slug | Opis |
|--------|------|------|
| Opinie klientów | `opinie-klientow` | Globalne opinie (image, quote, author, video_url) |
| Mega Menu | `mega-menu` | Usługi w nawigacji (title, subtitle, description, url, image) |

### Szablony stron
| Szablon | Plik | Sekcje |
|---------|------|--------|
| Strona główna | `front-page.blade.php` | Hero, usługi, portfolio, jak-działamy, benefits, opinie, CTA, blog, newsletter, kontakt |
| Usługi (zbiorcza) | `template-uslugi.blade.php` | Page Hero, usługi-grid, proces, CTA, kontakt, newsletter |
| Usługa (pojedyncza) | `template-usluga.blade.php` | Page Hero + Flexible Content |
| O nas | `template-o-nas.blade.php` | About hero/story/stats, benefits, honesty, partner, CTA, kontakt |
| Domyślna strona | `page.blade.php` | Standardowa WP |
| Single post | `single.blade.php` | Post content |
| Blog index | `index.blade.php` | Lista postów |
| Szukaj | `search.blade.php` | Wyniki |
| 404 | `404.blade.php` | Strona błędu |

### CSS Design Tokens
| Plik | Opis |
|------|------|
| `base/color.css` | primary (100-500), blue (100-500), orange (100-500) |
| `base/typography.css` | display-lg/md/sm/xs, text-xl/lg/md/sm/xs + klasy wag |
| `components/menu.css` | Separator menu |
| `app.css` | Base: forced scrollbar, link styles, opinie scrollbar hide |

---

## W trakcie / Do zrobienia
- [x] Strona główna (wszystkie sekcje)
- [x] Mega menu (ACF Options + WP Menu)
- [x] Backend formularzy (AJAX + zabezpieczenia)
- [x] Podstrona Usługi (zbiorcza)
- [x] Podstrona Usługa (pojedyncza z FC)
- [x] Strona O nas
- [x] Footer
- [x] Deploy na staging (wdb-creative.pl)
- [ ] Strona kontakt (osobna)
- [ ] Blog (archiwum + single post design)
- [ ] SEO (meta tagi, schema, sitemap)
- [ ] Performance (lazy load, cache, minification)
- [ ] Testy cross-browser
